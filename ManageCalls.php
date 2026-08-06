<?php
namespace App\Http\Controllers\lead_management;

use App\Http\Controllers\Controller;
use App\Models\ManageTeamModel;
use App\Models\LeadModel;
use App\Models\BranchModel;
use App\Models\LeadTransferLogModel;
use App\Models\SpamReasonModel;
use App\Models\CallTrackerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class ManageCalls extends Controller
{


    

     public function index(Request $request){

        //  return "dsghh";

        $page = $request->input('page', 1);
        $perpage = (int) $request->input('sorting_filter', 25);
        $offset = ($page - 1) * $perpage;
        $search_filter = $request->search_filter ?? '';
        $branch_id = $request->user()->branch_id ;
        $user_id = $request->user()->user_id;

        $call_fill        = $request->input('call_fill', '');
        $staff_fill       = $request->input('staff_fill', '');
        $status_fill      = $request->input('status_fill', '');
        $from_date_filter = $request->input('from_date_fillter_textbox');
        $to_date_filter   = $request->input('to_date_fillter_textbox');

        $monthFilter = $request->get('month_filter', now()->format('M-Y'));
        try {
            $parsedDate = Carbon::createFromFormat('!M-Y', $monthFilter);
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        } catch (\Exception $e) {
            $parsedDate = now()->startOfMonth();
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        }

        
        $helper = new \App\Helpers\Helpers();
    
        if ($request->ajax()) {

            $idQuery = DB::table('et_call_tracker as ct')
                    ->select('ct.sno')
                    ->where('ct.branch_id', $branch_id)
                    ->whereIn('ct.call_status',[0,1,2,3,4]);

            if (!$from_date_filter && !$to_date_filter) {
                $start = Carbon::create($year,$month,1)->startOfMonth();
                $end = Carbon::create($year,$month,1)->endOfMonth();
                $idQuery->whereBetween('ct.call_start_date',[$start,$end]);
            }else{
                $idQuery->whereBetween('ct.call_start_date', [$from_date_filter,$to_date_filter]);
            }

            // if(auth()->user()->hasPermissionradio('Lead Management','Manage Calls','view_self_lead')){
            //     $idQuery->where('ct.branch_staff_id',$user_id);
            // }

            if($staff_fill!=''){
                $idQuery->where('ct.branch_staff_id', $staff_fill );
            }

            if ($status_fill) {
                $idQuery->where('ct.call_status', $status_fill);
            }elseif ($status_fill === '0') {
                $idQuery->where('ct.call_status', $status_fill);
            }

            if($call_fill!=''){
                $idQuery->where(function($q)use($call_fill){
                    $q->where('ct.customer_phone_no','like',"%{$call_fill}%")
                    ->orWhere('ct.staff_phone_no','like', "%{$call_fill}%")
                    ->orWhere('ct.customer_name','like',"%{$call_fill}%");
                });
            }

            $ids=$idQuery
                ->orderByDesc('ct.call_start_date')
                ->orderByDesc('ct.call_start_time')
                ->paginate($perpage,['ct.sno']);

           

            $callIds=$ids->pluck('sno')->toArray();

             return $callIds;


            $calls = DB::table('et_call_tracker as ct')
                    ->select(
                        'ct.sno',
                        'ct.call_status',
                        'ct.staff_phone_no',
                        'ct.customer_name',
                        'ct.customer_phone_no',
                        'ct.call_start_date',
                        'ct.call_start_time',
                        'ct.call_end_time',
                        'ct.call_duration',
                        'ct.latitude',
                        'ct.longitude',
                        'ct.audio_file',

                        'l.lead_name',
                        'l.drop_verified',
                        'l.drop_tl_verified',
                        'l.spam_verified',
                        'l.spam_tl_verified',
                        'l.status as lead_status',

                        's.staff_name',

                        'sb.staff_name as lead_staff',

                        'l.created_by',

                        'ic.user_name as internal_user_name'
                    )
                    ->join('et_staff as s','s.sno','=','ct.branch_staff_id')
                    ->leftJoin('et_lead as l',function($join){
                            $join->on('l.lead_mobile', '=', DB::raw('RIGHT(ct.customer_phone_no,10)'));
                        })
                    ->leftJoin('et_Internal_cugs as ic',function($join){
                            $join->on('ic.cug_mobile_no', '=', DB::raw('RIGHT(ct.customer_phone_no,10)'));
                        }
                    )
                    ->leftJoin('et_staff as sb','sb.sno','=','l.created_by')
                    ->whereIn('ct.sno',$callIds )
                    ->orderByDesc('ct.call_start_date')
                    ->orderByDesc('ct.call_start_time')
                    ->get();

                $calls = new LengthAwarePaginator(
                            $calls,
                            $ids->total(),
                            $ids->perPage(),
                            $ids->currentPage(),
                            [
                                'path'=>request()->url(),
                                'query'=>request()->query()
                            ]
                        );

            
                
        
            $staffPhones = $calls->pluck('staff_phone_no')->filter()->unique()->values();

             $monthStart = Carbon::create($year, $month, 1)->startOfMonth();
            $monthEnd   = Carbon::create($year, $month, 1)->endOfMonth();

            $cacheKey = 'manage_calls_dashboard_' .
            $branch_id . '_' .
            $user_id . '_' .
            $month . '_' .
            $year . '_' .
            $staff_fill . '_' .
            $status_fill;

        $call_counts = Cache::remember(
        $cacheKey,
        now()->addMinutes(2),
        function () use (
            $branch_id,
            $user_id,
            $staff_fill,
            $status_fill,
            $from_date_filter,
            $to_date_filter,
            $monthStart,
            $monthEnd
        ) {

            $query = DB::table('et_call_tracker')
                ->selectRaw("
                    COUNT(CASE WHEN call_status = 1 THEN 1 END) AS incoming_call_count,
                    COUNT(CASE WHEN call_status = 0 THEN 1 END) AS outgoing_call_count,
                    COUNT(CASE WHEN call_status = 2 THEN 1 END) AS missedcall_count,
                    COUNT(CASE WHEN call_status = 3 THEN 1 END) AS rejected_call_count,
                    COUNT(CASE WHEN call_status = 4 THEN 1 END) AS dialedcall_count
                ")
                ->where('branch_id', $branch_id);

            if (!$from_date_filter && !$to_date_filter) {

                $query->whereBetween(
                    'call_start_date',
                    [$monthStart, $monthEnd]
                );

            } else {

                $query->whereBetween(
                    'call_start_date',
                    [$from_date_filter, $to_date_filter]
                );

            }

            if (auth()->user()->hasPermissionradio('Lead Management','Manage Calls','view_self_lead')) {
                $query->where('branch_staff_id',$user_id);
            }

            if ($staff_fill != '') {
                $query->where('branch_staff_id',$staff_fill);
            }

            if ($status_fill) {
                $query->where('call_status', $status_fill);
            }elseif ($status_fill === '0') {
                $query->where('call_status', $status_fill);
            }

            

            return $query->first();
        }
        );
        
            $incoming_call_count = (int) ($call_counts->incoming_call_count ?? 0);
            $outgoingcall_count  = (int) ($call_counts->outgoing_call_count ?? 0);
            $missedcall_count    = (int) ($call_counts->missedcall_count ?? 0);
            $rejected_call_count = (int) ($call_counts->rejected_call_count ?? 0);
            $dialedcall_count    = (int) ($call_counts->dialedcall_count ?? 0);
        
            $missed_call_ratio = ($incoming_call_count + $missedcall_count + $rejected_call_count > 0)
                ? ($missedcall_count / ($incoming_call_count + $missedcall_count + $rejected_call_count)) * 100
                : 0;
        
            $outgoing_call_ratio = ($incoming_call_count + $missedcall_count + $rejected_call_count + $outgoingcall_count + $dialedcall_count > 0)
                ? ($outgoingcall_count / ($incoming_call_count + $missedcall_count + $rejected_call_count + $outgoingcall_count + $dialedcall_count)) * 100
                : 0;
        
                //  $loginData = DB::connection('mysql_secondary')
                //     ->table('user as u')
                //     ->select('u.phone_no', 'u.last_sync_date', 'u.last_sync_time')
                //     ->whereIn('u.phone_no', $staffPhones)
                //     ->get()
                //     ->keyBy('phone_no');
            $lastLoginDataMap = [];

            if (!empty($staffPhones)) {

                $lastLoginDataMap = DB::table('mobile_user_login_logs as l')
                    ->select(
                        'l.mobile_no',
                        'l.login_at'
                    )
                    ->join(
                        DB::raw("
                            (
                                SELECT
                                    mobile_no,
                                    MAX(login_at) AS last_login
                                FROM mobile_user_login_logs
                                WHERE type = 0
                                GROUP BY mobile_no
                            ) latest
                        "),
                        function ($join) {
                            $join->on('latest.mobile_no', '=', 'l.mobile_no')
                                ->on('latest.last_login', '=', 'l.login_at');
                        }
                    )
                    ->whereIn('l.mobile_no', $staffPhones)
                    ->get()
                    ->keyBy('mobile_no');
            }

            $data = $calls->map(function ($item) use ($helper) {

                // Call icon
                switch ($item->call_status) {
                    case 0:
                        $bgColor = "";
                        $img = "outgoing_call.ico";
                        break;
                    case 1:
                        $bgColor = "";
                        $img = "incoming_call.ico";
                        break;
                    case 2:
                        $bgColor = "#ffcf9f";
                        $img = "missed_call.ico";
                        break;

                    case 3:
                        $bgColor = "#FF7979";
                        $img = "rejected_call.ico";
                        break;
                    default:
                        $bgColor = "";
                        $img = "dialed_call.ico";
                }

               $lastLogin = $lastLoginDataMap[$item->staff_phone_no] ?? null;

                $lastLoginDate = null;
                $lastLoginTime = null;
                $duration = '';

                if ($lastLogin && $lastLogin->login_at) {

                    $loginAt = Carbon::parse($lastLogin->login_at);

                    $lastLoginDate = $loginAt->format('Y-m-d');

                    $lastLoginTime = $loginAt->format('H:i:s');

                    $duration = $loginAt->diffForHumans([
                        'parts' => 2,
                        'short' => true,
                    ]);
                }

                $audioSize = '';

                if (!empty($item->audio_file)) {
                    $path = public_path('call_audios/'.$item->audio_file);
                    if (file_exists($path)) {
                        $bytes = filesize($path);
                        if ($bytes >= 1048576) {
                            $audioSize = round($bytes / 1048576, 2).' MB';
                        } else {
                            $audioSize = round($bytes / 1024, 2).' KB';
                        }
                    }
                }

                return [
                    'sno' => $item->sno,
                    'encrypted_id' => $helper->encrypt_decrypt($item->sno, 'encrypt'),

                    'bgColor' => $bgColor,
                    'img' => $img,
                    'audio_size' => $audioSize,
                    'last_login_date' => optional($lastLogin)->last_sync_date,
                    'last_login_time' => optional($lastLogin)->last_sync_time,
                    // 'duration' => $this->getDuration(optional($lastLogin)->last_sync_date, optional($lastLogin)->last_sync_time),
                    'duration' => '',

                    'data' => $item,
                ];
            });

            $month_name=Carbon::createFromFormat('m', $month)->format('F');

            return response()->json([
                'data' => $data,
                'current_page' => $calls->currentPage(),
                'last_page' => $calls->lastPage(),
                'total' => $calls->total(),
                'incoming_call_count' => $incoming_call_count,
                'outgoingcall_count'  => $outgoingcall_count,
                'missedcall_count'    => $missedcall_count,
                'rejected_call_count' => $rejected_call_count,
                'dialedcall_count'    => $dialedcall_count,
                'missed_call_ratio'   => $missed_call_ratio,
                'outgoing_call_ratio' => $outgoing_call_ratio,
                'month_name' => $month_name,
            ]);
        }

    
            $staff_list = Cache::remember("staff_list_branch_{$branch_id}", 300, function () {
                return DB::table('et_cug_management')
                    ->select(
                        'et_cug_management.staff_id',
                        'et_staff.staff_name',
                        'et_staff.nick_name',
                        'et_staff.staff_image',
                        'et_staff.gender',
                        'et_staff.mobile_no',
                        'et_department.department_name'
                    )
                    ->join('et_staff', 'et_staff.sno', '=', 'et_cug_management.staff_id')
                    ->leftJoin('et_department', 'et_department.sno', '=', 'et_staff.department_id')
                    ->where('et_staff.status', '!=', 2)
                    ->where('et_department.sno', 1)
                    ->distinct()
                    ->get();
            });
        
            $reasonList = SpamReasonModel::where('status', 0)
                ->orderBy('sno', 'desc')
                ->get();

        return view('content.lead_management.manage_calls.call_list',[
            'perpage' => $perpage,
            'staff_list' => $staff_list,
            'reasonList'          => $reasonList,
        ]);
    }

    public function indexnew(Request $request){

        $page = $request->input('page', 1);
        $perpage = (int) $request->input('sorting_filter', 25);
        $offset = ($page - 1) * $perpage;
        $search_filter = $request->search_filter ?? '';
        $branch_id = $request->user()->branch_id ;
            $user_id = $request->user()->user_id;

        $call_fill        = $request->input('call_fill', '');
        $staff_fill       = $request->input('staff_fill', '');
        $status_fill      = $request->input('status_fill', '');
        $from_date_filter = $request->input('from_date_fillter_textbox');
        $to_date_filter   = $request->input('to_date_fillter_textbox');

        $monthFilter = $request->get('month_filter', now()->format('M-Y'));
        try {
            $parsedDate = Carbon::createFromFormat('!M-Y', $monthFilter);
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        } catch (\Exception $e) {
            $parsedDate = now()->startOfMonth();
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        }


        $helper = new \App\Helpers\Helpers();
    
        if ($request->ajax()) {

            $calls = DB::table('et_call_tracker as ct')
                ->select(
                    'ct.sno',
                    'ct.call_status',
                    'ct.staff_phone_no',
                    'ct.customer_name',
                    'ct.customer_phone_no',
                    'ct.call_start_date',
                    'ct.call_start_time',
                    'ct.call_end_time',
                    'ct.call_duration',
                    'ct.latitude',
                    'ct.longitude',
                    'ct.audio_file',

                    'l.lead_name',
                    'l.drop_verified',
                    'l.drop_tl_verified',
                    'l.spam_verified',
                    'l.spam_tl_verified',
                    'l.status as lead_status',

                    's.staff_name',

                    'sb.staff_name as lead_staff',
                    'l.created_by',
                    'ic.user_name as internal_user_name'
                )
                ->join('et_staff as s', 's.sno', '=', 'ct.branch_staff_id')
                ->leftJoin(DB::raw("(
                        SELECT *
                        FROM et_lead l1
                        WHERE l1.sno IN
                        (
                            SELECT MAX(sno)
                            FROM et_lead
                            GROUP BY lead_mobile
                        )
                    ) AS l
                    "), function ($join) {
                        $join->on('l.lead_mobile', '=', DB::raw('RIGHT(ct.customer_phone_no,10)'));
                    })
                ->leftJoin(DB::raw("
                (
                    SELECT *
                    FROM et_Internal_cugs i1
                    WHERE i1.sno IN
                    (
                        SELECT MAX(sno)
                        FROM et_Internal_cugs
                        GROUP BY cug_mobile_no
                    )
                ) ic
                "), function ($join) {

                    $join->on(
                        'ic.cug_mobile_no',
                        '=',
                        DB::raw('RIGHT(ct.customer_phone_no,10)')
                    );

                })
                ->leftJoin('et_staff as sb', 'sb.sno', '=', 'l.created_by')
                ->whereYear('ct.call_start_date', $year)
                ->whereMonth('ct.call_start_date', $month)
                ->whereIn('ct.call_status', [0,1,2,3,4])
                ->where('ct.branch_id', $branch_id);

              

                if (!$from_date_filter && !$to_date_filter) {
                    $start = Carbon::create($year, $month, 1)->startOfMonth();
                    $end = $start->copy()->addMonth();
                    $calls->whereBetween('ct.call_start_date', [$start, $end]);
                }
                if ($from_date_filter && $to_date_filter) {
                    $calls->whereBetween('ct.call_start_date', [$from_date_filter, $to_date_filter]);
                }

                if (auth()->user()->hasPermissionradio('Lead Management','Manage Calls','view_self_lead')) {
                    $calls->where('ct.branch_staff_id', $user_id);
                }
                
                if ($staff_fill != '') {
                    $calls->where('ct.branch_staff_id', $staff_fill);
                }
                if ($status_fill) {
                    $calls->where('ct.call_status', $status_fill);
                }elseif ($status_fill === '0') {
                    $calls->where('ct.call_status', $status_fill);
                }
                // else{
                //     $calls->whereNotIn('ct.call_status', [0,1,2,3,4]);
                // }

                if ($call_fill != '') {
                    $calls->where(function ($q) use ($call_fill) {
                        $q->where('ct.customer_phone_no', 'LIKE', "%{$call_fill}%")
                            ->orWhere('ct.staff_phone_no', 'LIKE', "%{$call_fill}%")
                            ->orWhere('s.staff_name', 'LIKE', "%{$call_fill}%")
                            ->orWhere('s.nick_name', 'LIKE', "%{$call_fill}%")
                            ->orWhere('ct.customer_name', 'LIKE', "%{$call_fill}%");
                    });
                }
                
                $calls = $calls
                ->orderByDesc('ct.call_start_date')
                ->orderByDesc('ct.call_start_time')
                ->paginate($perpage);
        
            $staffPhones = $calls->pluck('staff_phone_no')->filter()->unique()->values();

            $cacheKey = 'manage_calls_dashboard_' .
            $branch_id . '_' .
            $user_id . '_' .
            $month . '_' .
            $year . '_' .
            $staff_fill . '_' .
            $status_fill;

        $call_counts = Cache::remember($cacheKey, now()->addMinutes(2), function () use (
            $branch_id,
            $user_id,
            $month,
            $year,
            $staff_fill,
            $status_fill,
            $from_date_filter,
            $to_date_filter
        ) {

            $query = DB::table('et_call_tracker')
                ->selectRaw("
                    SUM(call_status = 1) AS incoming_call_count,
                    SUM(call_status = 0) AS outgoing_call_count,
                    SUM(call_status = 2) AS missedcall_count,
                    SUM(call_status = 3) AS rejected_call_count,
                    SUM(call_status = 4) AS dialedcall_count
                ")
                ->where('branch_id', $branch_id);

            // Month Filter
            if (!$from_date_filter && !$to_date_filter) {

                $start = Carbon::create($year, $month, 1)->startOfMonth();

                $end = $start->copy()->addMonth();

                $query->whereBetween('call_start_date', [$start, $end]);
            }

            // Date Filter
            if ($from_date_filter && $to_date_filter) {

                $query->whereBetween(
                    'call_start_date',
                    [$from_date_filter, $to_date_filter]
                );

            }

            if (auth()->user()->hasPermissionradio(
                'Lead Management',
                'Manage Calls',
                'view_self_lead'
            )) {

                $query->where('branch_staff_id', $user_id);

            }

            if ($staff_fill != '') {

                $query->where('branch_staff_id', $staff_fill);

            }

            

            if ($status_fill) {
                $query->where('call_status', $status_fill);
            }elseif ($status_fill === '0') {
                $query->where('call_status', $status_fill);
            }

            return $query->first();

        });
        
            $incoming_call_count = $call_counts->incoming_call_count ?? 0;
            $outgoingcall_count  = $call_counts->outgoing_call_count ?? 0;
            $missedcall_count    = $call_counts->missedcall_count ?? 0;
            $rejected_call_count = $call_counts->rejected_call_count ?? 0;
            $dialedcall_count    = $call_counts->dialedcall_count ?? 0;
        
            $missed_call_ratio = ($incoming_call_count + $missedcall_count + $rejected_call_count > 0)
                ? ($missedcall_count / ($incoming_call_count + $missedcall_count + $rejected_call_count)) * 100
                : 0;
        
            $outgoing_call_ratio = ($incoming_call_count + $missedcall_count + $rejected_call_count + $outgoingcall_count + $dialedcall_count > 0)
                ? ($outgoingcall_count / ($incoming_call_count + $missedcall_count + $rejected_call_count + $outgoingcall_count + $dialedcall_count)) * 100
                : 0;
        
                //  $loginData = DB::connection('mysql_secondary')
                //     ->table('user as u')
                //     ->select('u.phone_no', 'u.last_sync_date', 'u.last_sync_time')
                //     ->whereIn('u.phone_no', $staffPhones)
                //     ->get()
                //     ->keyBy('phone_no');
            $lastLoginDataMap =[];

            $data = $calls->map(function ($item) use ($helper, $lastLoginDataMap) {

                // Call icon
                switch ($item->call_status) {
                    case 0:
                        $bgColor = "";
                        $img = "outgoing_call.ico";
                        break;
                    case 1:
                        $bgColor = "";
                        $img = "incoming_call.ico";
                        break;
                    case 2:
                        $bgColor = "#ffcf9f";
                        $img = "missed_call.ico";
                        break;

                    case 3:
                        $bgColor = "#FF7979";
                        $img = "rejected_call.ico";
                        break;
                    default:
                        $bgColor = "";
                        $img = "dialed_call.ico";
                }

                $lastLogin = $lastLoginDataMap[$item->staff_phone_no] ?? null;

                $audioSize = '';

                if (!empty($item->audio_file)) {
                    $path = public_path('call_audios/'.$item->audio_file);
                    if (file_exists($path)) {
                        $bytes = filesize($path);
                        if ($bytes >= 1048576) {
                            $audioSize = round($bytes / 1048576, 2).' MB';
                        } else {
                            $audioSize = round($bytes / 1024, 2).' KB';
                        }
                    }
                }

                return [
                    'sno' => $item->sno,
                    'encrypted_id' => $helper->encrypt_decrypt($item->sno, 'encrypt'),

                    'bgColor' => $bgColor,
                    'img' => $img,
                    'audio_size' => $audioSize,
                    'last_login_date' => optional($lastLogin)->last_sync_date,
                    'last_login_time' => optional($lastLogin)->last_sync_time,
                    // 'duration' => $this->getDuration(optional($lastLogin)->last_sync_date, optional($lastLogin)->last_sync_time),
                    'duration' => '',

                    'data' => $item,
                ];
            });

        $month_name=Carbon::createFromFormat('m', $month)->format('F');

        return response()->json([
            'data' => $data,
            'current_page' => $calls->currentPage(),
            'last_page' => $calls->lastPage(),
            'total' => $calls->total(),
            'incoming_call_count' => $incoming_call_count,
            'outgoingcall_count'  => $outgoingcall_count,
            'missedcall_count'    => $missedcall_count,
            'rejected_call_count' => $rejected_call_count,
            'dialedcall_count'    => $dialedcall_count,
            'missed_call_ratio'   => $missed_call_ratio,
            'outgoing_call_ratio' => $outgoing_call_ratio,
            'month_name' => $month_name,
        ]);
        }

    
        $staff_list = Cache::remember("staff_list_branch_{$branch_id}", 300, function () {
                return DB::table('et_cug_management')
                    ->select(
                        'et_cug_management.staff_id',
                        'et_staff.staff_name',
                        'et_staff.nick_name',
                        'et_staff.staff_image',
                        'et_staff.gender',
                        'et_staff.mobile_no',
                        'et_department.department_name'
                    )
                    ->join('et_staff', 'et_staff.sno', '=', 'et_cug_management.staff_id')
                    ->leftJoin('et_department', 'et_department.sno', '=', 'et_staff.department_id')
                    ->where('et_staff.status', '!=', 2)
                    ->where('et_department.sno', 1)
                    ->distinct()
                    ->get();
            });
        
            $reasonList = SpamReasonModel::where('status', 0)
                ->orderBy('sno', 'desc')
                ->get();

        return view('content.lead_management.manage_calls.call_list',[
            'perpage' => $perpage,
            'staff_list' => $staff_list,
            'reasonList'          => $reasonList,
        ]);
    }

    public function indexOld(Request $request)
    {
    
        $monthFilter = $request->get('month_filter', now()->format('M-Y'));

        try {
            // Parse month-year safely
            $parsedDate = Carbon::createFromFormat('!M-Y', $monthFilter);
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        } catch (\Exception $e) {
            $parsedDate = now()->startOfMonth();
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        }
    
        $page      = $request->input('page', 1);
        $perpage   = (int) $request->input('sorting_filter', 25);
        $branch_id = $request->user()->branch_id;
        $user_id   = $request->user()->user_id;
    
        
    
        $month_chk = ($month . $year == date('mY') || $year > date('Y')) ? 0 : 1;
    
        // Staff list cache
        $staff_list = Cache::remember("staff_list_branch_{$branch_id}", 300, function () {
            return DB::table('et_cug_management')
                ->select(
                    'et_cug_management.staff_id',
                    'et_staff.staff_name',
                    'et_staff.nick_name',
                    'et_staff.staff_image',
                    'et_staff.gender',
                    'et_staff.mobile_no',
                    'et_department.department_name'
                )
                ->join('et_staff', 'et_staff.sno', '=', 'et_cug_management.staff_id')
                ->leftJoin('et_department', 'et_department.sno', '=', 'et_staff.department_id')
                ->where('et_staff.status', '!=', 2)
                ->where('et_department.sno', 1)
                ->distinct()
                ->get();
        });
    
        // Filters
        $call_fill        = $request->input('call_fill', '');
        $staff_fill       = $request->input('staff_fill', '');
        $status_fill      = $request->input('status_fill', '');
        $from_date_filter = $request->input('from_date_fillter_textbox');
        $to_date_filter   = $request->input('to_date_fillter_textbox');
    
        $startTime = microtime(true);
    
        /**
         * Step 1: Query only IDs for pagination
         */
        $callIdQuery = DB::table('et_call_tracker')
            ->where('et_call_tracker.branch_id', $branch_id);
    
        // Month filter (only if no date range is given)
        if (!$from_date_filter && !$to_date_filter) {
            $callIdQuery->whereYear('et_call_tracker.call_start_date', $year)
                ->whereMonth('et_call_tracker.call_start_date', $month);
        }
    
        // Date range filter
        if ($from_date_filter && $to_date_filter) {
            $callIdQuery->whereBetween('et_call_tracker.call_start_date', [$from_date_filter, $to_date_filter]);
        }
    
        // Permission check
        if (auth()->user()->hasPermissionradio('Lead Management', 'Manage Calls', 'view_self_lead')) {
            $callIdQuery->where('et_call_tracker.branch_staff_id', $user_id);
        }
    
            if ($status_fill) {
            $callIdQuery->where('et_call_tracker.call_status', $status_fill);
        }elseif ($status_fill === '0') {
            $callIdQuery->where('et_call_tracker.call_status', $status_fill);
        }
        if ($staff_fill) {
            $callIdQuery->where('et_call_tracker.branch_staff_id', $staff_fill);
        }
        if ($call_fill != '') {
            $callIdQuery->join('et_staff', 'et_staff.sno', '=', 'et_call_tracker.branch_staff_id')
                ->where(function ($query) use ($call_fill) {
                    $query->where('et_call_tracker.customer_phone_no', 'LIKE', "%{$call_fill}%")
                        ->orWhere('et_call_tracker.staff_phone_no', 'LIKE', "%{$call_fill}%")
                        ->orWhere('et_staff.staff_name', 'LIKE', "%{$call_fill}%")
                        ->orWhere('et_staff.nick_name', 'LIKE', "%{$call_fill}%")
                        ->orWhere('et_call_tracker.customer_name', 'LIKE', "%{$call_fill}%");
                });
        }
    
        // Get paginated IDs
        $paginatedIds = $callIdQuery
            ->orderBy('et_call_tracker.call_start_date', 'desc')
            ->orderBy('et_call_tracker.call_start_time', 'desc')
            ->paginate($perpage, ['et_call_tracker.sno']);
    
        $callIds = $paginatedIds->pluck('sno')->toArray();
    
        /**
         * Step 2: Fetch full data with same filters
         */
        $calls = DB::table('et_call_tracker')
            ->select(
                'et_call_tracker.call_status',
                'et_call_tracker.sno',
                'et_call_tracker.staff_phone_no',
                'et_call_tracker.customer_name',
                'et_call_tracker.customer_phone_no',
                'et_call_tracker.call_start_date',
                'et_call_tracker.call_start_time',
                'et_call_tracker.call_end_time',
                'et_call_tracker.call_duration',
                'et_call_tracker.latitude',
                'et_call_tracker.longitude',
                'et_lead.lead_name',
                'et_lead.drop_verified',
                'et_lead.drop_tl_verified',
                'et_lead.spam_verified',
                'et_lead.spam_tl_verified',
                'et_lead.status AS lead_status',
                'et_staff.staff_name',
                'sb.staff_name AS lead_staff',
                'et_Internal_cugs.user_name as internal_user_name',
                'et_lead.created_by'
            )
            ->join('et_staff', 'et_staff.sno', '=', 'et_call_tracker.branch_staff_id')
            ->leftJoin('et_lead', function ($join) {
                $join->on('et_lead.lead_mobile', '=', DB::raw("RIGHT(et_call_tracker.customer_phone_no, 10)"));
            })
            ->leftJoin('et_Internal_cugs', function ($join) {
                $join->on('et_Internal_cugs.cug_mobile_no', '=', DB::raw("RIGHT(et_call_tracker.customer_phone_no, 10)"));
            })
            ->leftJoin('et_staff as sb', 'sb.sno', '=', 'et_lead.created_by')
            ->whereIn('et_call_tracker.sno', $callIds)
            ->orderBy('et_call_tracker.call_start_date', 'desc')
            ->orderBy('et_call_tracker.call_start_time', 'desc')
            ->get();
    
        /**
         * Step 3: Aggregate counts
         */
        $call_counts = DB::table('et_call_tracker')
            ->selectRaw('
                COUNT(CASE WHEN call_status = 1 THEN 1 END) as incoming_call_count,
                COUNT(CASE WHEN call_status = 0 THEN 1 END) as outgoing_call_count,
                COUNT(CASE WHEN call_status = 2 THEN 1 END) as missedcall_count,
                COUNT(CASE WHEN call_status = 3 THEN 1 END) as rejected_call_count,
                COUNT(CASE WHEN call_status = 4 THEN 1 END) as dialedcall_count
            ')
            ->where('branch_id', $branch_id)
            ->whereYear('call_start_date', $year)
            ->whereMonth('call_start_date', $month);
    
        if (auth()->user()->hasPermissionradio('Lead Management', 'Manage Calls', 'view_self_lead')) {
            $call_counts->where('branch_staff_id', $user_id);
        }
        if ($staff_fill) {
            $call_counts->where('branch_staff_id', $staff_fill);
        }
        if ($status_fill !== '') {
            $call_counts->where('call_status', $status_fill);
        }
    
        $call_counts = $call_counts->first();
    
        $incoming_call_count = $call_counts->incoming_call_count ?? 0;
        $outgoingcall_count  = $call_counts->outgoing_call_count ?? 0;
        $missedcall_count    = $call_counts->missedcall_count ?? 0;
        $rejected_call_count = $call_counts->rejected_call_count ?? 0;
        $dialedcall_count    = $call_counts->dialedcall_count ?? 0;
    
        $missed_call_ratio = ($incoming_call_count + $missedcall_count + $rejected_call_count > 0)
            ? ($missedcall_count / ($incoming_call_count + $missedcall_count + $rejected_call_count)) * 100
            : 0;
    
        $outgoing_call_ratio = ($incoming_call_count + $missedcall_count + $rejected_call_count + $outgoingcall_count + $dialedcall_count > 0)
            ? ($outgoingcall_count / ($incoming_call_count + $missedcall_count + $rejected_call_count + $outgoingcall_count + $dialedcall_count)) * 100
            : 0;
    
        $reasonList = SpamReasonModel::where('status', 0)
            ->orderBy('sno', 'desc')
            ->get();
    
        /**
         * Step 4: Fetch loginData (mysql_secondary)
         */
        $staffPhones = $calls->pluck('staff_phone_no')->filter()->unique()->values();
    
        // $loginData = DB::connection('mysql_secondary')
        //     ->table('user as u')
        //     ->select('u.phone_no', 'u.last_sync_date', 'u.last_sync_time')
        //     ->whereIn('u.phone_no', $staffPhones)
        //     ->get()
        //     ->keyBy('phone_no');
        $loginData=[];
    
        // If you want to debug just like indexold
        // if ($user_id == 0) {
        //     return $loginData;
        // }
    
        $callsPaginator = new LengthAwarePaginator(
            $calls,
            $paginatedIds->total(),
            $paginatedIds->perPage(),
            $paginatedIds->currentPage(),
            ['path' => request()->url(), 'query' => request()->query()]
        );
    
        return view('content.lead_management.manage_calls.call_list', [
            'calls'               => $callsPaginator,
            'month_chk'           => $month_chk,
            'month'               => $month,
            'year'                => $year,
            'staff_list'          => $staff_list,
            'staff_fill'          => $staff_fill,
            'month_filter'        => $month_filter,
            'call_fill'           => $call_fill,
            'perpage'             => $perpage,
            'reasonList'          => $reasonList,
            'incoming_call_count' => $incoming_call_count,
            'outgoingcall_count'  => $outgoingcall_count,
            'missedcall_count'    => $missedcall_count,
            'rejected_call_count' => $rejected_call_count,
            'dialedcall_count'    => $dialedcall_count,
            'missed_call_ratio'   => $missed_call_ratio,
            'outgoing_call_ratio' => $outgoing_call_ratio,
            'status_fill'         => $status_fill,
            'lastLoginDataMap'    => $loginData,
        ]);
    }



    public function lead_call_history($id, $status, Request $request)
    {
        // return $status;
        $page      = $request->input('page', 1);
        $perpage   = (int) $request->input('sorting_filter', 10);
        $offset    = ($page - 1) * $perpage;
        $branch_id = $request->user()->branch_id ?? 1;

        $helper          = new \App\Helpers\Helpers();
        $decryptedValue  = $helper->encrypt_decrypt($id, 'decrypt');
        $lead_id     = $decryptedValue;
        $call_start_date = date('Y-m-01'); // Start date (first day of the month)
        $call_end_date   = date('Y-m-t');

        // Filters
        $status_fill      = $request->input('status_fill', '');
        $date_filter      = $request->input('dt_fill_issue_rpt');
        $from_date_filter = $request->input('from_date_fillter_textbox');
        $to_date_filter   = $request->input('to_date_fillter_textbox');
        $fin_yr_fill      = $request->input('fin_yr_fill', '');



        // $lead = DB::table('et_call_tracker')->where('customer_phone_no', $lead_mobile)
        //     ->orWhere('customer_phone_no', $phoneWithCountryCode)->orderBy('sno', 'desc')->first();

        $caller = DB::table('et_lead')->select('et_lead.*')
            ->where('et_lead.sno', $lead_id)
            ->first();

            $lead_mobile =$caller->lead_mobile;
            $normalizedPhoneNo    = ltrim($lead_mobile, '0');   // Remove leading zero if present
            $phoneWithCountryCode = '+91' . $normalizedPhoneNo; // Add the country code

            // return  $caller ;


        $incoming_call_count = DB::table('et_call_tracker')
            ->where('customer_phone_no', $lead_mobile)        
            ->orWhere('customer_phone_no', $phoneWithCountryCode)       
              ->whereYear('et_call_tracker.call_start_date', $year)
        ->whereMonth('et_call_tracker.call_start_date', $month)// End date filter 
            ->where('et_call_tracker.call_status', 1)                             // Status is 1
            ->count();

        $incoming_call_count = $incoming_call_count ?? 0;

        // Get the outgoing call count excluding the phone numbers in company_cug_detail
        $outgoingcall_count = DB::table('et_call_tracker')
            ->where('customer_phone_no', $lead_mobile)        
            ->orWhere('customer_phone_no', $phoneWithCountryCode)                // Filter by user ID
            ->whereDate('et_call_tracker.call_start_date', '>=', $call_start_date) // Start date filter
            ->whereDate('et_call_tracker.call_start_date', '<=', $call_end_date)
            ->where('et_call_tracker.call_status', 0)                             // Status is 0
            // ->where('et_call_tracker.call_duration', '!=', '00:00:00')            // Duration is not '00:00:00'
            ->count();

        // Assign the result to a variable
        $outgoingcall_count = $outgoingcall_count ?? 0;

        // missed call
        $missedcall_count = DB::table('et_call_tracker')
        ->where('customer_phone_no', $lead_mobile)        
        ->orWhere('customer_phone_no', $phoneWithCountryCode)                 // Filter by user ID
              ->whereYear('et_call_tracker.call_start_date', $year)
        ->whereMonth('et_call_tracker.call_start_date', $month)// End date filter  
            ->where('et_call_tracker.call_status', 2)                             // Status is 2 for missed calls
            ->count();

        $rejected_call_count = DB::table('et_call_tracker')
            ->where('customer_phone_no', $lead_mobile)        
            ->orWhere('customer_phone_no', $phoneWithCountryCode)                   // Filter by user ID
              ->whereYear('et_call_tracker.call_start_date', $year)
        ->whereMonth('et_call_tracker.call_start_date', $month)// End date filter
            
            ->where('et_call_tracker.call_status', 3)                             // Status is 3 for rejected calls
            ->count();

        // Assign the result to a variable
        $rejected_call_count = $rejected_call_count ?? 0;

        // Assign the result to a variable
        $missedcall_count = $missedcall_count ?? 0;

        $missed_call_ratio = 0;

        if ($incoming_call_count > 0 || $missedcall_count >= 0 || $rejected_call_count >= 0) {
            $total_calls = $incoming_call_count + $missedcall_count + $rejected_call_count;
            if ($total_calls > 0) {
                $missed_call_ratio = ($missedcall_count / $total_calls) * 100;
                $missed_call_ratio = $missed_call_ratio;
            } else {
                $missed_call_ratio = 0;
            }
        }

        $outgoing_call_ratio = 0;

        if ($incoming_call_count > 0 || $missedcall_count >= 0 || $rejected_call_count >= 0) {
            $total_calls_all = $incoming_call_count + $missedcall_count + $rejected_call_count + $outgoingcall_count;
            if ($total_calls > 0) {
                $outgoing_call_ratio = ($outgoingcall_count / $total_calls_all) * 100;
                $outgoing_call_ratio = $outgoing_call_ratio;
            } else {
                $outgoing_call_ratio = 0;
            }
        }

        $calls = DB::table('et_call_tracker')->select('et_call_tracker.*','et_staff.staff_name')
            ->join('et_staff', 'et_staff.sno', '=', 'et_call_tracker.branch_staff_id')
            ->where('customer_phone_no', $lead_mobile)        
            ->orWhere('customer_phone_no', $phoneWithCountryCode)    ;            // Filter by user ID
         

            
        // Date Filtering
        if ($date_filter === "today") {
            $calls->whereDate('et_call_tracker.call_start_date', now()->toDateString());
        } elseif ($date_filter === "week") {
            $calls->whereBetween('et_call_tracker.call_start_date', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($date_filter === "monthly") {
            $calls->whereMonth('et_call_tracker.call_start_date', now()->month)
                ->whereYear('et_call_tracker.call_start_date', now()->year);
        } elseif ($date_filter === "custom_date") {
            if ($from_date_filter && $to_date_filter) {
                $calls->whereBetween('et_call_tracker.call_start_date', [Carbon::parse($from_date_filter), Carbon::parse($to_date_filter)]);
            } elseif ($from_date_filter) {
                $calls->where('et_call_tracker.call_start_date', '>=', Carbon::parse($from_date_filter));
            } elseif ($to_date_filter) {
                $calls->where('et_call_tracker.call_start_date', '<=', Carbon::parse($to_date_filter));
            }
        }else{
            $calls->where('et_call_tracker.call_start_date', '>=', $call_start_date) // Start date filter
            ->where('et_call_tracker.call_start_date', '<=', $call_end_date);
        }

        // return $status;
        if (isset($status) && $status !='0') {
            if ($status == '2') {
                $calls->whereIn('et_call_tracker.call_status', [2, 3]);
            } elseif ($status == '1') {
                $calls->where('et_call_tracker.call_status', $status);
            }
        } else {
            $calls->where('et_call_tracker.call_status', 0);
        }

        $calls = $calls->orderBy('et_call_tracker.sno', 'desc')->paginate($perpage);

        $filter = false;
       
        return view('content.sales.manage_calls.lead_call_history', [
            'calls'               => $calls,
            'status'               => $status,
            'perpage'             => $perpage,
            'caller'              => $caller,
            'incoming_call_count' => $incoming_call_count,
            'outgoingcall_count'  => $outgoingcall_count,
            'missedcall_count'    => $missedcall_count,
            'rejected_call_count' => $rejected_call_count,
            'missed_call_ratio'   => $missed_call_ratio,
            'outgoing_call_ratio' => $outgoing_call_ratio,
            'date_filter'         => $date_filter,
            'status_fill'         => $status_fill,
            'fin_yr_fill'         => $fin_yr_fill,
            'from_date_filter'    => $from_date_filter,
            'to_date_filter'      => $to_date_filter,
            'filter'              => $filter,
        ]);
    }
    //manage team
    public function Add(Request $request)
    {
        $branch_id = $request->user()->branch_id;
        $validator = Validator::make($request->all(), [
            'head_staff_add' => 'required|max:255',
            'memb_staff_add' => 'required|array', // Ensure this is an array for proper handling
        ]);
        if ($validator->fails()) {
            return response([
                'status'    => 401,
                'message'   => 'Incorrect format input feilds',
                'error_msg' => $validator->messages()->get('*'),
                'data'      => null,
            ], 200);
        } else {
            $team_head_id   = $request->head_staff_add;
            $team_staff_ids = $request->memb_staff_add;
            $user_id        = $request->user()->user_id;

            $team_staff_ids = json_encode($team_staff_ids);

            $team_chk = ManageTeamModel::where('status', '!=', 2)->orderBy('sno', 'desc')->first();

            if (! $team_chk) {

                $year    = substr(date('y'), -2);
                $team_id = 'TMCL-0001/' . $year;
            } else {

                $data   = $team_chk->team_id;
                $slice  = explode('/', $data);
                $result = preg_replace('/[^0-9]/', '', $slice[0]);

                $next_number = (int) $result + 1;
                $request     = sprintf('TMCL-%04d', $next_number);

                $year    = substr(date('y'), -2);
                $team_id = $request . '/' . $year;
            }

            $add_team                = new ManageTeamModel();
            $add_team->team_id       = $team_id;
            $add_team->team_head_id  = $team_head_id;
            $add_team->team_staff_id = $team_staff_ids;
            $add_team->branch_id     = $branch_id;
            $add_team->created_by    = $user_id;
            $add_team->updated_by    = $user_id;

            $add_team->save();

            if ($add_team) {
                // If category added successfully, return success response and display Toastr message
                session()->flash('toastr', [
                    'type'    => 'success',
                    'message' => 'Team added Successfully!',
                ]);
            } else {
                session()->flash('toastr', [
                    'type'    => 'error',
                    'message' => 'Could not add the Team!',
                ]);
            }

            return redirect('manage_calls');

        }
    }
    public function Update(Request $request, $teamId)
    {
        $branchId = $request->user()->branch_id;

        $validator = Validator::make($request->all(), [
            'head_staff_edit' => 'required|max:255',
            'memb_staff_edit' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response([
                'status'    => 401,
                'message'   => 'Incorrect format input fields',
                'error_msg' => $validator->messages()->get('*'),
                'data'      => null,
            ], 200);
        }

        $teamHeadId   = $request->head_staff_edit;
        $teamStaffIds = json_encode($request->memb_staff_edit);
        $userId       = $request->user()->user_id;

        // Find the team by ID
        $team = ManageTeamModel::where('team_id', $teamId)->where('branch_id', $branchId)->first();

        if (! $team) {
            session()->flash('toastr', [
                'type'    => 'error',
                'message' => 'Team not found!',
            ]);
            return redirect('manage_calls');
        }

        // Update team details
        $team->team_head_id  = $teamHeadId;
        $team->team_staff_id = $teamStaffIds;
        $team->updated_by    = $userId;

        if ($team->update()) {
            session()->flash('toastr', [
                'type'    => 'success',
                'message' => 'Team updated successfully!',
            ]);
        } else {
            session()->flash('toastr', [
                'type'    => 'error',
                'message' => 'Could not update the team!',
            ]);
        }

        return redirect('manage_calls');
    }
    //staff_list
    public function StaffList(Request $request)
    {
        $branch_id = $request->user()->branch_id;
        $dept_id   = $request->input('dept_id');
        $staff     = StaffModel::where('et_staff.status', '!=', 2)->join('et_team', 'et_staff.sno', '=', 'et_team.', 'left');
        // ->where('branch_id', $branch_id)
        if ($branch_id != 0) {
            $staff->where('et_staff.branch_id', $branch_id);
        }
        $staff = $staff->orderBy('et_staff.staff_name', 'asc')
            ->distinct() // Ensure unique rows
            ->get();

        return response([
            'status'    => 200,
            'message'   => null,
            'error_msg' => null,
            'data'      => $staff,
        ], 200);
    }

    public function getCallHistory(Request $request)
    {
        $leadId = $request->lead_id;
        $status = $request->status;


        $caller = DB::table('et_lead')->select('et_lead.*')
        ->where('et_lead.sno', $leadId)
        ->first();

        $lead_mobile =$caller->lead_mobile;
        $normalizedPhoneNo    = ltrim($lead_mobile, '0');   // Remove leading zero if present
        $phoneWithCountryCode = '+91' . $normalizedPhoneNo;
        // return $phoneWithCountryCode ;

       $calls = DB::table('et_call_tracker')
                ->select('et_call_tracker.*', 'et_staff.staff_name')
                ->join('et_staff', 'et_staff.sno', '=', 'et_call_tracker.branch_staff_id')
                ->where(function($query) use ($lead_mobile, $phoneWithCountryCode) {
                    $query->where('customer_phone_no', $lead_mobile)
                          ->orWhere('customer_phone_no', $phoneWithCountryCode);
                })
                ->where('count_status', 1);

                if ($status == "Incoming") {
                    $calls->where('et_call_tracker.call_status', 1);
                } elseif ($status == "Outgoing") {
                    $calls->where('et_call_tracker.call_status', 0);
                } elseif ($status == "Dialed") {
                    $calls->where('et_call_tracker.call_status', 4);
                } elseif ($status == "Missed & Rejected") {
                    $calls->whereIn('et_call_tracker.call_status', [2, 3]);
                }
                
                $calls = $calls->orderBy('et_call_tracker.sno', 'desc')->get();
          

        return response()->json([
            'calls' => $calls,
            'caller' => $caller,
            'status'=> $status,
        ]);
    }

    public function staffCallHistory(Request $request)
    {
        $staff_id = $request->staff_id;
        $year = $request->year;
        $month = $request->month;
    

        $caller = DB::table('et_staff')->select('et_staff.*')
        ->where('et_staff.sno', $staff_id)
        ->first();

        $calls = DB::table('et_call_tracker')->select('et_call_tracker.*')
            ->where('et_call_tracker.branch_staff_id', $staff_id)
            ->whereYear('et_call_tracker.call_start_date', $year)
            ->whereMonth('et_call_tracker.call_start_date', $month)
            ->orderBy('et_call_tracker.sno', 'desc')->get();  

        return response()->json([
            'calls' => $calls,
            'caller' => $caller,
        ]);
    }
    
    public function spamLeadConvertCalls(Request $request)
    {
        $converted_to = $request->lead_convert_to;
        $call_tracker_id = $request->cloud_call_id;
        $created_by = $request->sales_staff_add;
        $lead_name = $request->lead_name;
        $spam_reason = $request->spam_reason;
        $reason_text = $request->reason_text;
        $spam_comments = $request->spam_comments;
        // return $request;

        $cloud_call = CallTrackerModel::select('customer_phone_no', 'call_start_date')->where('sno', $call_tracker_id)->first();
        // return $cloud_call;

        if (strpos($cloud_call->customer_phone_no, '+91') === 0) {
            $country_code = '91';
            $lead_mobile = substr($cloud_call->customer_phone_no, 3); // Remove the '+91' part
        } else {
            $country_code = '';
            $lead_mobile = $cloud_call->customer_phone_no; // No country code
        }

        $registered_date    = date('Y-m-d', strtotime($cloud_call->call_start_date));
        $user_id            = $request->user()->user_id;
        $branch_id          = $request->user()->branch_id;
    
        // return $lead_mobile;

            $chk = LeadModel::where('lead_mobile', $lead_mobile)->where('et_lead.branch_id', $branch_id)->where('status', '!=', 2)->first();
            // return $chk;
            
            if ($chk) {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Mobile Number already created!'
            ]);
            } else {
                $branch_check = BranchModel::where('sno', $request->user()->branch_id)->orderBy('sno', 'desc')->first();
        
                $branch_code = $branch_check->city_short_code;
        
                $category_check = LeadModel::where('status', '!=', 2)->orderBy('sno', 'desc')->first();
                $year = date("Y");
                if (!$category_check) {
                    $lead_id = $year . '/' . $branch_code . '/' . "LED0001";
                } else {
                    $data = $category_check->lead_id;
                    $slice = explode("/", $data);
                    $resultcus = preg_replace('/[^0-9]/', '', $slice[2]);
                    $next_number = (int)$resultcus + 1;
                    $request_pay = sprintf("LED%04d", $next_number);
                    $lead_id = $year . '/' . $branch_code . '/' . $request_pay;
                }
    
                if($converted_to == 1){

                    $add_category = new LeadModel();
                    $add_category->lead_id                 = $lead_id;
                    $add_category->lead_name               = Ucfirst($lead_name);
                    $add_category->lead_mobile             = $lead_mobile;
                    $add_category->inter_calls             = $country_code;
                    $add_category->registered_date         = $registered_date;
                    $add_category->branch_id               = $branch_id;
                    $add_category->lead_source_id          = 1;
                    $add_category->call_tracker_id         = $call_tracker_id;
                    $add_category->created_by              = $created_by;
                    $add_category->updated_by              = $user_id;
                    $add_category->lead_status_id          = 1; 
                    $add_category->lead_condition          = 2; 

                    // return $add_category;
                    $add_category->save();
                    
                    if ($add_category) {
                        // return $add_category;
                        $add_history = new LeadTransferLogModel();
                        $add_history->lead_id = $add_category->sno;
                        $add_history->branch_id = $add_category->branch_id;
                        $add_history->start_date = date('Y-m-d', strtotime($add_category->created_at));
                        $add_history->current_staff_id = $add_category->created_by;
                        $add_history->change_staff_id = 0;
                        $add_history->end_date = null;
                        $add_history->transferred_from = 10; // from Cloud Call
                        $add_history->created_by = $user_id;
                        $add_history->updated_by = $user_id;
                        // return $add_history;
                        $add_history->save();
                        
                    }
                    if ($add_category) {
                        session()->flash('toastr', [
                          'type' => 'success',
                          'message' => 'Lead added Successfully!'
                        ]);
                      } else {
                        session()->flash('toastr', [
                          'type' => 'error',
                          'message' => 'Could not add the Lead!'
                        ]);
                      }
                } else if($converted_to == 2){
                    $add_category = new LeadModel();
                    $add_category->lead_id                 = $lead_id;
                    $add_category->lead_name               = Ucfirst($lead_name);
                    $add_category->lead_mobile             = $lead_mobile;
                    $add_category->inter_calls             = $country_code;
                    $add_category->registered_date         = $registered_date;
                    $add_category->branch_id               = $branch_id;
                    $add_category->lead_source_id          = 1;
                    $add_category->call_tracker_id         = $call_tracker_id;
                    $add_category->created_by              = $created_by;
                    $add_category->updated_by              = $user_id;
                    $add_category->status                  = 7;
                    $add_category->lead_status_id          = 6;
                    $add_category->spam_verified           = 0;
                    $add_category->spam_tl_verified        = 0;
                    $add_category->lead_condition          = 2; 
                    if ($spam_reason == 1) {
                        $add_category->spam_reason = $request->reason_text;  // Set drop_reason from drop_reason_text
                     } else {
                       $spam = SpamReasonModel::where('reason_name', $spam_reason)->first();
                      // return $spam;
                       if ($spam->comments_check == 1) {
                         $add_category->spam_comments = $request->spam_comments;
                       }
                       $add_category->spam_reason = $spam_reason;
                    }
                    // return $add_category;
                    $add_category->save();
                    
                    if ($add_category) {
                        // return $add_category;
                        $add_history = new LeadTransferLogModel();
                        $add_history->lead_id = $add_category->sno;
                        $add_history->branch_id = $add_category->branch_id;
                        $add_history->start_date = date('Y-m-d', strtotime($add_category->created_at));
                        $add_history->current_staff_id = $add_category->created_by;
                        $add_history->change_staff_id = 0;
                        $add_history->end_date = null;
                        $add_history->transferred_from = 11; // from Cloud Call Spam
                        $add_history->created_by = $user_id;
                        $add_history->updated_by = $user_id;
                        // return $add_history;
                        $add_history->save();
                    }
                    if ($add_category) {
                        session()->flash('toastr', [
                          'type' => 'success',
                          'message' => 'Spam Lead added Successfully!'
                        ]);
                      } else {
                        session()->flash('toastr', [
                          'type' => 'error',
                          'message' => 'Could not add the Lead!'
                        ]);
                      }
                }
        }

        return redirect('manage_calls');
    }

public function getCallHistoryPostSale(Request $request)
    {
        $leadId = $request->lead_id;
        $status = $request->status;
 
 
        $caller = DB::table('et_post_lead')->select('et_post_lead.*')
            ->where('et_post_lead.sno', $leadId)
            ->first();
 
        $lead_mobile = $caller->lead_mobile;
        $normalizedPhoneNo    = ltrim($lead_mobile, '0');   // Remove leading zero if present
        $phoneWithCountryCode = '+91' . $normalizedPhoneNo;
        // return $phoneWithCountryCode ;
 
        $calls = DB::table('et_call_tracker')
            ->select('et_call_tracker.*', 'et_staff.staff_name')
            ->join('et_staff', 'et_staff.sno', '=', 'et_call_tracker.branch_staff_id')
            ->where(function ($query) use ($lead_mobile, $phoneWithCountryCode) {
                $query->where('customer_phone_no', $lead_mobile)
                    ->orWhere('customer_phone_no', $phoneWithCountryCode);
            })
            ->where('count_status', 1);
 
        if ($status == "Incoming") {
            $calls->where('et_call_tracker.call_status', 1);
        } elseif ($status == "Outgoing") {
            $calls->where('et_call_tracker.call_status', 0);
        } elseif ($status == "Dialed") {
            $calls->where('et_call_tracker.call_status', 4);
        } elseif ($status == "Missed & Rejected") {
            $calls->whereIn('et_call_tracker.call_status', [2, 3]);
        }
 
        $calls = $calls->orderBy('et_call_tracker.sno', 'desc')->get();
 
 
        return response()->json([
            'calls' => $calls,
            'caller' => $caller,
            'status' => $status,
        ]);
    }


    public function getCallHistoryCustomer(Request $request)
    {
        $customerId = $request->lead_id;
        $status = $request->status;

    

        $caller = DB::table('et_customer')->select('et_customer.*')
        ->where('et_customer.sno', $customerId)
        ->first();
        $cus_mobile =$caller->cus_mobile;
        $normalizedPhoneNo    = ltrim($cus_mobile, '0');   // Remove leading zero if present
        $phoneWithCountryCode = '+91' . $normalizedPhoneNo;
        // return $phoneWithCountryCode ;
          $cug_numbers = DB::table('et_cug_management')
            ->select('et_cug_management.*')
            ->join('et_staff', 'et_staff.sno', '=', 'et_cug_management.staff_id')
            ->where('et_staff.department_id', 2)
            ->orderBy('et_cug_management.sno', 'desc')
            ->get();
            
            // Get only mobile numbers as array
         $cugMobiles = $cug_numbers->pluck('staff_mobile')->toArray();
        // return $cugMobiles;
        $calls = DB::table('et_call_tracker')
            ->select('et_call_tracker.*', 'et_staff.staff_name')
            ->join('et_staff', 'et_staff.sno', '=', 'et_call_tracker.branch_staff_id')
            ->where(function ($query) use ($cus_mobile, $phoneWithCountryCode) {
                $query->where('customer_phone_no', $cus_mobile)
                    ->orWhere('customer_phone_no', $phoneWithCountryCode);
            })
            ->where('count_status', 1)
            ->whereIn('et_call_tracker.staff_phone_no', $cugMobiles);

            if ($status == "Incoming") {
                $calls->where('et_call_tracker.call_status', 1);
            } elseif ($status == "Outgoing") {
                $calls->where('et_call_tracker.call_status', 0);
            } elseif ($status == "Dialed") {
                $calls->where('et_call_tracker.call_status', 4);
            } elseif ($status == "Missed & Rejected") {
                $calls->whereIn('et_call_tracker.call_status', [2, 3]);
            }

            $calls = $calls->orderBy('et_call_tracker.sno', 'desc')->get();
          

        return response()->json([
            'calls' => $calls,
            'caller' => $caller,
            'status'=> $status,
        ]);
    }


    public function cugDepartments(Request $request)
    {
        $departments = Cache::remember(
            'cug_departments_v2',
            now()->addMinutes(10),
            function () {

                return DB::table('et_staff as s')
                    ->join('et_cug_management as cug', function ($join) {
                        $join->on('cug.staff_id', '=', 's.sno')
                            ->where('cug.status', 0);
                    })
                    ->join('et_department as d', 'd.sno', '=', 's.department_id')
                    ->where('s.status', 0)
                    ->select(
                        'd.sno as department_id',
                        'd.department_name',
                        DB::raw('COUNT(s.sno) as staff_count'),
                        DB::raw('SUM(CASE WHEN cug.online_status = 1 THEN 1 ELSE 0 END) as online_count')
                    )
                    ->groupBy(
                        'd.sno',
                        'd.department_name'
                    )
                    ->orderBy('d.department_name')
                    ->get();

            }
        );

        return response()->json([
            'status' => true,
            'data'   => $departments
        ]);
    }

    public function cugStaffList(Request $request)
    {
        $monthFilter = $request->get('month_filter', now()->format('Y-m'));

        try {

            $date = Carbon::createFromFormat('Y-m', $monthFilter);

        } catch (\Exception $e) {

            $date = now();

        }

        $month = $date->month;
        $year  = $date->year;

        $limit = min(max((int)$request->get('limit', 50), 10), 100);

        $page = max((int)$request->get('page', 1), 1);

        $callSummary = DB::table('et_call_tracker')
            ->select(
                'call_tracker_staff_id',

                DB::raw("SUM(call_status=0) as outgoing"),

                DB::raw("SUM(call_status=1) as incoming"),

                DB::raw("SUM(call_status=2) as missed"),

                DB::raw("SUM(call_status=3) as rejected"),

                DB::raw("SUM(call_status=4) as dialed")

            )
            ->whereMonth('call_start_date', $month)
            ->whereYear('call_start_date', $year)
            ->groupBy('call_tracker_staff_id');

        $query = DB::table('et_staff as s')

            ->join('et_cug_management as cug', function ($join) {

                $join->on('cug.staff_id', '=', 's.sno')
                    ->where('cug.status', 0);

            })

            ->leftJoin('et_job_position as jp', 'jp.sno', '=', 's.position_role')
            ->join('users', 'users.user_id', '=', 's.sno')

            ->leftJoinSub($callSummary, 'calls', function ($join) {

                $join->on('calls.call_tracker_staff_id', '=', 's.sno');

            })

            ->where('s.status', 0)

            ->when($request->filled('department_id'), function ($q) use ($request) {

                $q->where('s.department_id', $request->department_id);

            })

            ->when($request->filled('online'), function ($q) use ($request) {

                $q->where('cug.online_status', $request->online);

            })

            ->when($request->filled('search'), function ($q) use ($request) {

                $search = trim($request->search);

                $q->where(function ($sub) use ($search) {

                    $sub->where('s.staff_name', 'LIKE', "%{$search}%")
                        ->orWhere('cug.staff_mobile', 'LIKE', "%{$search}%");

                });

            });

        $summaryQuery = clone $query;

        $summary = $summaryQuery
            ->selectRaw("
                COUNT(*) as total_staff,
                SUM(cug.online_status=1) as online,
                SUM(cug.online_status=0) as offline,
                SUM(COALESCE(calls.incoming,0)+COALESCE(calls.outgoing,0)+COALESCE(calls.missed,0)+COALESCE(calls.rejected,0)+COALESCE(calls.dialed,0)) as total_calls,
                SUM(COALESCE(calls.missed,0)) as missed
            ")
            ->first();

        $staff = $query
            ->select(

                's.sno as staff_id',

                's.staff_name',
                'users.id as user_id',

                's.staff_image',

                's.gender',

                's.status as staff_status',

                'cug.staff_mobile as cug_mobile',

                'cug.online_status',

                'jp.job_position_name',

                DB::raw('COALESCE(calls.incoming,0) as incoming'),

                DB::raw('COALESCE(calls.outgoing,0) as outgoing'),

                DB::raw('COALESCE(calls.missed,0) as missed'),

                DB::raw('COALESCE(calls.rejected,0) as rejected'),

                DB::raw('COALESCE(calls.dialed,0) as dialed')

            )

            ->orderByDesc('cug.online_status')

            ->orderBy('s.staff_name')

            ->paginate($limit);

        $staff->getCollection()->transform(function ($row) {

                $lastLoginData = DB::table('mobile_user_login_logs')
                                ->where('user_id', $row->user_id)
                                ->where('type', 0)
                                ->latest('login_at')
                                ->first();
            $lastLoginData = DB::table('mobile_user_login_logs')
                ->where('user_id', $row->user_id)
                ->where('type', 0)
                ->latest('login_at')
                ->first();

            if ($lastLoginData) {
                $row->last_login_date = date('Y-m-d', strtotime($lastLoginData->login_at));
                $row->last_login_time = date('h:i:s A', strtotime($lastLoginData->login_at));
            } else {
                $row->last_login_date = null;
                $row->last_login_time = null;
            }
            $total =

                $row->incoming +

                $row->outgoing +

                $row->missed +

                $row->rejected +

                $row->dialed;

            $row->ocr = $total ? round(($row->outgoing / $total) * 100, 1) : 0;

            $row->rcr = $total ? round(($row->incoming / $total) * 100, 1) : 0;

            $row->mcr = $total ? round(($row->missed / $total) * 100, 1) : 0;

            return $row;

        });

        return response()->json([

            'status' => true,

            'summary' => [

                'online'     => (int)$summary->online,

                'offline'    => (int)$summary->offline,

                'total_calls'=> (int)$summary->total_calls,

                'missed'     => (int)$summary->missed,

                'total_staff'=> (int)$summary->total_staff

            ],

            'data' => $staff->items(),

            'pagination' => [

                'current_page' => $staff->currentPage(),

                'last_page'    => $staff->lastPage(),

                'per_page'     => $staff->perPage(),

                'total'        => $staff->total(),

                'has_more'     => $staff->hasMorePages()

            ]

        ]);
    }

    public function cugIndex(Request $request){

        $page = $request->input('page', 1);
        $perpage = (int) $request->input('sorting_filter', 25);
        $offset = ($page - 1) * $perpage;
        $search_filter = $request->search_filter ?? '';
        $branch_id = $request->user()->branch_id ;
            $user_id = $request->user()->user_id;

        $call_fill        = $request->input('call_fill', '');
        $staff_fill       = $request->input('staff_fill', '');
        $status_fill      = $request->input('status_fill', '');
        $from_date_filter = $request->input('from_date_fillter_textbox');
        $to_date_filter   = $request->input('to_date_fillter_textbox');

        $monthFilter = $request->get('month_filter', now()->format('M-Y'));
        try {
            $parsedDate = Carbon::createFromFormat('!M-Y', $monthFilter);
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        } catch (\Exception $e) {
            $parsedDate = now()->startOfMonth();
            $month = $parsedDate->month;
            $year  = $parsedDate->year;
        }


        $helper = new \App\Helpers\Helpers();
    
       

        return view('content.team_management.cug_list',[
        ]);
    }

    

}
