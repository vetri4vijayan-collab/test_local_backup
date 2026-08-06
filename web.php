<?php
 
use App\Http\Controllers\mobile_apps\MobileAppLandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Login;
use App\Http\Controllers\dashboard\Cronjobs;
use App\Http\Controllers\dashboard\CloudCall;
use App\Http\Controllers\dashboard\OtherSourceLead;
use App\Http\Controllers\dashboard\Notification;
use App\Http\Controllers\dashboard\SalesPromise;
use App\Http\Controllers\dashboard\DicountQR;
use App\Http\Controllers\branch_management\BranchHoliday;
use App\Http\Controllers\icons\MdiIcons;
use App\Http\Controllers\payment_management\Payment;
use App\Http\Controllers\payment_management\ManageHarvesting;
use App\Http\Controllers\whatsapp_management\WhatsappConfig;
use App\Http\Controllers\lead_management\ManageLead;
use App\Http\Controllers\lead_management\ManagePostSaleLead;
use App\Http\Controllers\lead_management\DailyCallLead;
use App\Http\Controllers\lead_management\HotLead;
use App\Http\Controllers\lead_management\ManageLeadSource;
use App\Http\Controllers\lead_management\ManageLeadFollowup;
use App\Http\Controllers\lead_management\ManageCalls;
use App\Http\Controllers\lead_management\ManageLeadAppointment;
use App\Http\Controllers\lead_management\ManageRawLead;
use App\Http\Controllers\lead_management\ManageLeadBank;
use App\Http\Controllers\lead_management\ManageSpamLead;
use App\Http\Controllers\lead_management\ManageDropLead;
use App\Http\Controllers\lead_management\ManagePotentialLead;
use App\Http\Controllers\lead_management\ManageInternalLead;
use App\Http\Controllers\lead_management\ManageTodayFolloupwLead;
use App\Http\Controllers\lead_management\LeadCalendar;
use App\Http\Controllers\lead_management\ManageCoupon;
use App\Http\Controllers\branch_management\ManageBranch;
use App\Http\Controllers\branch_management\ManageCompany;
use App\Http\Controllers\branch_management\ManageEntity;
use App\Http\Controllers\branch_management\SetGoal;
use App\Http\Controllers\branch_management\ManageTargetBranch;
use App\Http\Controllers\branch_management\BranchTarget;
use App\Http\Controllers\branch_management\ManageTraining;
use App\Http\Controllers\branch_management\BranchCampaign;
use App\Http\Controllers\branch_management\CronjobMonitor;
use App\Http\Controllers\task_management\TaskManagement;
use App\Http\Controllers\marketing_management\ManageMarketing;
use App\Http\Controllers\marketing_management\TrainingPlanner;
use App\Http\Controllers\TableManagerController;
use App\Http\Controllers\qr_promotion\QrPromotion;
use App\Http\Controllers\branch_management\QrCoupon;
use App\Http\Controllers\team_management\ManageTarget;
use App\Http\Controllers\team_management\GoalSetStaff;
use App\Http\Controllers\team_management\StaffGoalSet;
use App\Http\Controllers\lead_management\ManageRequirements;
use App\Http\Controllers\lead_management\ManageProposal;
use App\Http\Controllers\branch_management\ManageIncentive;
use App\Http\Controllers\metrics\ManageMetrics;
use App\Http\Controllers\metrics\ForecastMetrics;
use App\Http\Controllers\metrics\OverallOutstanding;
use App\Http\Controllers\revision_management\ManageRevision;
use App\Http\Controllers\service_management\MilestoneConfirmation;
use App\Http\Controllers\service_management\FileController;
use App\Http\Controllers\dashboard\LoginApprovalController;
use App\Http\Controllers\payment_management\RazorpayPolicy;
use App\Http\Controllers\monitor_tool\UserLog;
use App\Http\Controllers\monitor_tool\CallLog;
use App\Http\Controllers\monitor_tool\MaintenancePage;
use App\Http\Controllers\monitor_tool\MaintenanceMode;
use App\Http\Controllers\metrics\ManageBhIncentive;
// Service Management 
use App\Http\Controllers\production_management\ManageWorkOrder;
use App\Http\Controllers\production_management\TaskCalendar;
use App\Http\Controllers\service_management\ManageService;
use App\Http\Controllers\service_management\ManageMilestone;
use App\Http\Controllers\requirement_management\RequirementManage;

use App\Http\Controllers\payment_management\Accounts;

use App\Http\Controllers\lead_management\LeadTracker;

// Production Management
use App\Http\Controllers\production_management\ManageProduction;
use App\Http\Controllers\production_management\TaskRequest;
use App\Http\Controllers\production_management\ProductionAppointment;
use App\Http\Controllers\production_management\ManageDeliverables;
use App\Http\Controllers\production_management\ManageTask;
use App\Http\Controllers\production_management\DailyTask;

use App\Http\Controllers\support_management\ManageTrainingDocument;
use App\Http\Controllers\support_management\TrainingDocument;

use App\Http\Controllers\settings\common_settings\CommunicationHandler;


use App\Http\Controllers\customer_management\ManageInvoice;
use App\Http\Controllers\customer_management\ManageNDA;
use App\Http\Controllers\customer_management\ManageCustomer;
use App\Http\Controllers\customer_management\customer_drop_refund\ManageCustomerDrop;
use App\Http\Controllers\customer_management\customer_drop_refund\ManageCustomerRefund;
use App\Http\Controllers\customer_management\ManageIssue;
use App\Http\Controllers\customer_management\ManageReview;
use App\Http\Controllers\customer_management\ManageTicketCustomer;
use App\Http\Controllers\customer_management\ManageAppointment;
use App\Http\Controllers\production_management\ProductionCustomerApp;
use App\Http\Controllers\customer_management\ManageChatCustomer;
use App\Http\Controllers\intern_management\ManageIntern;
use App\Http\Controllers\hr_management\Staff;
use App\Http\Controllers\hr_management\StaffAttendance;
use App\Http\Controllers\hr_management\JobRequest;
use App\Http\Controllers\users_management\ManageUsers;
use App\Http\Controllers\users_management\UserManage;
use App\Http\Controllers\users_management\UserRoleTask;
use App\Http\Controllers\users_management\UserRole;
use App\Http\Controllers\task_management\TaskManagementRole;
use App\Http\Controllers\task_management\MyTask;
use App\Http\Controllers\task_management\TeamTask;
use App\Http\Controllers\settings\GeneralSettings;
use App\Http\Controllers\settings\MarketingSettings;
use App\Http\Controllers\settings\LeadSettings;
use App\Http\Controllers\settings\QuotationSettings;
use App\Http\Controllers\settings\InvoiceSettings;
use App\Http\Controllers\settings\JournalSettings;
use App\Http\Controllers\settings\ExamSettings;
use App\Http\Controllers\settings\HRMSettings;
use App\Http\Controllers\settings\CounsellorSettings;
use App\Http\Controllers\settings\AccountsSettings;
use App\Http\Controllers\settings\BaseSettings;
use App\Http\Controllers\settings\CommonSettings;
use App\Http\Controllers\settings\common_settings\Country;
use App\Http\Controllers\settings\common_settings\State;
use App\Http\Controllers\settings\common_settings\City;
use App\Http\Controllers\settings\common_settings\CurrencyFormat;
use App\Http\Controllers\settings\common_settings\TimeZone;
use App\Http\Controllers\settings\lead_settings\LeadSource;
use App\Http\Controllers\settings\lead_settings\PotentialReason; 
use App\Http\Controllers\settings\lead_settings\LeadType;
use App\Http\Controllers\settings\lead_settings\LeadStatus;
use App\Http\Controllers\settings\lead_settings\LeadPotentialType;
use App\Http\Controllers\settings\lead_settings\LeadRequirementStatus;
use App\Http\Controllers\settings\lead_settings\DeadReason;
use App\Http\Controllers\settings\lead_settings\SpamCallReason;
use App\Http\Controllers\settings\lead_settings\InternalCallReason;
use App\Http\Controllers\settings\lead_settings\LeadBankReason;
use App\Http\Controllers\settings\lead_settings\FollowupReason;
use App\Http\Controllers\settings\lead_settings\RequirementRejectReason;
use App\Http\Controllers\settings\lead_settings\ProposalRejectReason;
use App\Http\Controllers\settings\lead_settings\LeadMetrics;
use App\Http\Controllers\settings\lead_settings\AppointmentCategory;
use App\Http\Controllers\settings\lead_settings\LeadSourceMapping;
use App\Http\Controllers\settings\customer_settings\CredentialType;
use App\Http\Controllers\settings\customer_settings\CustomerFeedbackQuestion;
use App\Http\Controllers\settings\common_settings\Integration;
use App\Http\Controllers\settings\hrm_settings\JobPosition;
use App\Http\Controllers\settings\hrm_settings\StaffPerHourCost;     
use App\Http\Controllers\settings\hrm_settings\EmployeeSkill;
use App\Http\Controllers\hr_management\BadgeBoard;
use App\Http\Controllers\settings\hrm_settings\Badges;
use App\Http\Controllers\team_management\TeamManagement;
use App\Http\Controllers\team_management\TeamPromise;
use App\Http\Controllers\team_management\ManageTeam;
use App\Http\Controllers\settings\common_settings\WhatsappApiConfigure;
use App\Http\Controllers\settings\common_settings\SmsTemplate;
use App\Http\Controllers\settings\common_settings\EmailTemplate;
use App\Http\Controllers\settings\common_settings\ChottaApi;
use App\Http\Controllers\errors\ErrorsController;

//Exam Management
use App\Http\Controllers\exam_management\ManageExam;
use App\Http\Controllers\exam_management\ManageQuestionBank;
use App\Http\Controllers\exam_management\ManageAssessment;
use App\Http\Controllers\exam_management\ManageResult;
use App\Http\Controllers\exam_management\StaffReport;


//Exam Settings
use App\Http\Controllers\settings\exam_settings\ExamBadge;
use App\Http\Controllers\settings\exam_settings\ExamCategory;
use App\Http\Controllers\settings\exam_settings\ExamSection;
use App\Http\Controllers\settings\exam_settings\GuideLines;
use App\Http\Controllers\settings\exam_settings\JobRoleSchedule;
use App\Http\Controllers\settings\exam_settings\QuestionBankCategory;
use App\Http\Controllers\settings\exam_settings\QuestionBankType;

use App\Http\Controllers\marketing_management\Events;

use App\Http\Controllers\settings\events\EventCategory;
use App\Http\Controllers\settings\events\EventType;

// Intern Settings
use App\Http\Controllers\settings\intern\InternEducation;
use App\Http\Controllers\settings\intern\InternCompany;
use App\Http\Controllers\settings\intern\InternTopic;
use App\Http\Controllers\settings\intern\InternCollege;
use App\Http\Controllers\settings\intern\PaymentModeOption;

// Journal Management
use App\Http\Controllers\journal_management\JournalBooklet;
use App\Http\Controllers\journal_management\JournalMonitor;
use App\Http\Controllers\journal_management\ManageJournal;
use App\Http\Controllers\journal_management\ManageJournalfollowup;

//settings
use App\Http\Controllers\settings\lead_settings\University;
use App\Http\Controllers\settings\Internal_cugs;
use App\Http\Controllers\settings\Holiday;
use App\Http\Controllers\settings\journal_settings\Domain;
use App\Http\Controllers\settings\journal_settings\JournalIndex;
use App\Http\Controllers\settings\journal_settings\JournalRequest;
use App\Http\Controllers\settings\JournalType;
use App\Http\Controllers\settings\JournalCategory;
use App\Http\Controllers\settings\JournalSubCategory;
// Product Management
use App\Http\Controllers\product_management\ManagePackages;
use App\Http\Controllers\product_management\ManageProducts;
use App\Http\Controllers\product_management\ManageProductTasks;
use App\Http\Controllers\product_management\Manage_facility;
use App\Http\Controllers\product_management\Manage_addon;
use App\Http\Controllers\product_management\PriceBook;

use App\Http\Controllers\settings\Company_type;
use App\Http\Controllers\settings\BranchCategory;
use App\Http\Controllers\settings\Department;
use App\Http\Controllers\settings\Division;
use App\Http\Controllers\settings\base_settings\ProductTools;
use App\Http\Controllers\settings\base_settings\WhiteListIP;
use App\Http\Controllers\settings\base_settings\AdditionalCharges;
use App\Http\Controllers\settings\base_settings\CloudCallApiSetup;

use App\Http\Controllers\settings\product_settings\Product_category;
use App\Http\Controllers\settings\product_settings\Product_Variant;
use App\Http\Controllers\settings\product_settings\Addon_Product_Variant;
use App\Http\Controllers\settings\product_settings\ProductVariable;
use App\Http\Controllers\settings\product_settings\AddonVariable;
use App\Http\Controllers\settings\product_settings\Product_delivarables;
use App\Http\Controllers\settings\product_settings\SlotNotes;
use App\Http\Controllers\settings\product_settings\Payment_Slot;
use App\Http\Controllers\settings\product_settings\Notes;
use App\Http\Controllers\settings\product_settings\TermsConditions;
use App\Http\Controllers\settings\product_settings\Unit;
use App\Http\Controllers\settings\production_settings\TaskChecklist;
use App\Http\Controllers\settings\production_settings\DeliveryAttachmentChecklist;
use App\Http\Controllers\settings\production_settings\WorkOrderChecklist;
use App\Http\Controllers\settings\production_settings\DeliveryChecklist;
use App\Http\Controllers\settings\training_settings\TrainingCategory;
use App\Http\Controllers\settings\training_settings\TrainingSubCategory;


use App\Http\Controllers\settings\account_settings\Ledger;
use App\Http\Controllers\settings\account_settings\SubLedger;


use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\LoginCover;

use App\Http\Controllers\settings\default_goal_set\DefaultGoalSet;
use App\Http\Controllers\settings\buissness_goal_set\BuissnessGoalSet;

use App\Http\Controllers\settings\marketing\Area;
use App\Http\Controllers\settings\marketing\CampaignChecklist;
use App\Http\Controllers\settings\marketing\CampaignStatus;
use App\Http\Controllers\settings\marketing\MarketingCategory;
use App\Http\Controllers\settings\marketing\MarketingKitCategory;
use App\Http\Controllers\settings\marketing\MarketingKitSubCategory;
use App\Http\Controllers\settings\marketing\MarketingType;
use App\Http\Controllers\settings\marketing\Variable;
use App\Http\Controllers\settings\marketing\Vendor;
use App\Http\Controllers\settings\marketing\Zone;
use App\Http\Controllers\dashboard\Dashboards;
use App\Http\Controllers\dashboard\Points;

use App\Http\Controllers\support_management\NewsBroadcast;
use App\Http\Controllers\settings\broadcast_theme\BroadcastTheme;

use App\Http\Controllers\settings\customer_settings\Appointment_mode;
use App\Http\Controllers\settings\customer_settings\ConnectingWay;
use App\Http\Controllers\settings\customer_settings\RefundChecklist;
use App\Http\Controllers\settings\customer_settings\ReviewLink;
use App\Http\Controllers\settings\customer_settings\TicketRelevant;

//Business Analysis

use App\Http\Controllers\report_management\LeadReports;
use App\Http\Controllers\report_management\OtherReport;
use App\Http\Controllers\report_management\AccountsReport;
use App\Http\Controllers\report_management\FacultyReport;
use App\Http\Controllers\report_management\CustomerReport;
use App\Http\Controllers\report_management\PaymentReport;
use App\Http\Controllers\report_management\JournalReport;
use App\Http\Controllers\report_management\PerformanceReport; 
use App\Http\Controllers\report_management\CountryReport;

// Route::get('/phpinfo', function() {
//     phpinfo();
// });
Route::post('/verify-authentication-code', [LoginApprovalController::class, 'verifyAuthenticationCode'])->name('verify.auth.code');

// ============================================
// Download Routes
// ============================================
// Single file download
Route::get('/download/file/{fileId}', [FileController::class, 'downloadFile'])
  ->name('file.download');

// Checklist ZIP download
Route::get('/download/checklist/{milestoneId}/{checklistId}', [FileController::class, 'downloadChecklistZip'])
  ->name('checklist.download.zip');

// Milestone ZIP download
Route::get('/download/milestone/{milestoneId}', [FileController::class, 'downloadMilestoneZip'])
  ->name('milestone.download.zip');

// ============================================
// Milestone Folders View Routes
// ============================================
// User view (for customers)
Route::get('/milestone-folders/{mile_sno}', [FileController::class, 'showMilestoneFolders'])
  ->name('milestone.folders');



// ============================================
// Milestone Data Routes
// ============================================
Route::get('/fetch_milestone_data/{id}/{mile}', [FileController::class, 'fetch_milestone_data'])
  ->name('fetch.milestone.data');
Route::middleware(['auth:web', 'timezone', 'check.load'])->group(function () {


  // ============================================
  // File Upload & Download Routes
  // ============================================

  // Main upload form
  Route::get('/upload-milestone-document/{id}', [FileController::class, 'index'])
    ->name('production-management-manage-work-order');

  // Delivery Attachment Checklist
  Route::get('/delivery_attachment_list', [FileController::class, 'deliveryAttachmentList']);

  // ============================================
  // Temporary Upload Routes
  // ============================================
  Route::post('/uploads/temp', [FileController::class, 'tempUpload']);
  Route::post('/uploads/remove-temp', [FileController::class, 'removeTempFile']);

  // ============================================
  // Chunked Upload Routes (For Large Files)
  // ============================================
  Route::post('/uploads/chunk/init', [FileController::class, 'initChunkUpload']);
  Route::post('/uploads/chunk', [FileController::class, 'uploadChunk']);
  Route::post('/uploads/chunk/finalize', [FileController::class, 'finalizeChunkUpload']);

  // ============================================
  // Save to Google Drive
  // ============================================
  Route::post('/uploads/save-to-drive', [FileController::class, 'saveAllAttachmentsToDrive']);

  // Admin view (for internal users)
  Route::get('/milestone-folders-view/{mile_sno}', [FileController::class, 'ViewMilestoneFolders'])
    ->name('milestone.folders.admin');

  // Delete file from Google Drive
  Route::delete('/delete-file/{fileId}/{milestoneId}/{checklistId}/{fileIndex}', [FileController::class, 'deleteFile'])->name('file.delete');
  // Get milestone stats (for AJAX updates)
  Route::get('/milestone-stats/{milestoneId}', [FileController::class, 'getMilestoneStats'])
    ->name('milestone.stats');

  // Delete entire folder
  Route::delete('/delete-folder/{milestoneId}/{checklistId}', [FileController::class, 'deleteFolder'])
    ->name('folder.delete');

  // ********###########################******************##########################  // Main Menu Starts
  Route::get('/scholar_guide_app', [MobileAppLandingPage::class, 'index'])->name('app-management-scholar-guide');
  Route::get('/dashboards', [Login::class, 'dashboards'])->name('dashboards');
  
  Route::get('/sales_executive_dashboards', [Dashboards::class, 'index'])->name('dashboards-sales-executive');
Route::get('/sales_tl_dashboards', [Dashboards::class, 'sales_tl'])->name('dashboards-sales-tl');

  Route::get('/dashboard/bdm_data', [Dashboards::class, 'getBdmDashboardData'])->name('dashboard/bdm_data');

// Dashboard Ajax List
  Route::get('/dashboard/sales_executive', [Dashboards::class, 'getSaleExcDashboardData'])->name('dashboard/sales_executive');
  Route::get('/dashboard/sales_tl_self_executive', [Dashboards::class, 'getSalesTlSelfDashboardData'])->name('dashboard/sales_tl_self_executive');
  Route::get('/dashboard/sales_tl_team_executive', [Dashboards::class, 'getSalesTlTeamDashboardData'])->name('dashboard/sales_tl_team_executive');
  Route::get('/journal/dashboard', [Dashboards::class, 'getJournalDashboard'])->name('journal.dashboard.get');
  Route::get('/journal_team_lead/dashboard', [Dashboards::class, 'getJournalTeamLeadDashboard'])->name('journal_team_lead.dashboard.get');
  Route::get('/dashboard/project_coordinator', [Dashboards::class, 'getProjectCoordinatorDashboard'])->name('dashboard.project_coordinator');
  Route::get('/dashboard/cre-data', [Dashboards::class, 'getcreDashboard'])->name('cre.dashboard.data');
  Route::get('/dashboard/ceo-data', [Dashboards::class, 'getCeoDashboardData'])->name('ceo.dashboard.data');
  Route::get('/dashboard/ceo-data-lead-status', [Dashboards::class, 'getCeoDashboardLeadStatusData'])->name('ceo.dashboard.data-lead-status');


Route::prefix('points')->group(function () {
      Route::get('/', [Points::class, 'index'])->name('points.index');
      Route::post('/add', [Points::class, 'Add'])->name('points.add');
      Route::get('/list', [Points::class, 'List'])->name('points.list');
      Route::get('/edit/{id}', [Points::class, 'Edit'])->name('points.edit');
      Route::post('/update', [Points::class, 'Update'])->name('points.update');
      Route::put('/status/{id}', [Points::class, 'Status'])->name('points.status');
      Route::delete('/delete/{id}', [Points::class, 'Delete'])->name('points.delete');
  });

  Route::match(['get','post'],'/login-approval', [LoginApprovalController::class, 'index'])->name('login-approval.index');
  Route::post('/login-approval/store', [LoginApprovalController::class, 'store'])->name('login-approval/store');

  Route::get('/incentive/floating-bar', [ManageMetrics::class, 'selfIncentiveFloatingBar']);
  Route::post('/incentive/refresh-cache', [ManageMetrics::class, 'refreshIncentiveCache']);
  Route::post('/incentive/details', [ManageMetrics::class, 'getIncentiveDetails']);
 
 
 
  //updateProfile 
  Route::post('/update-profile', [Login::class, 'updateProfile'])->name('update_profile');
  Route::get('/notifications/{whom}', [Notification::class, 'getNotificationsForUser']);
  Route::get('/notifications_single/{whom}', [Notification::class, 'getNotificationsForUser_single']);
  Route::post('/notifications/{whom}/mark-all-read', [Notification::class, 'markAllAsRead']);
  Route::post('/notifications/{whom}/clear-all', [Notification::class, 'clearAllNotifications']);
  Route::post('/notifications/{whom}/clear/{id}', [Notification::class, 'clearNotifications']);
  Route::post('/notifications/{whom}/not_send/{id}', [Notification::class, 'clearNotificationsnot_send']);
  
  // Magic Menu
  Route::get('/cus_lead_details', [ManageCustomer::class, 'LeadDetails'])->name('cus_lead_details');
  Route::match(['get', 'post'], '/payment_remainder', [ManageHarvesting::class, 'PaymentRemainder'])->name('payment-management-manage-harvesting');
  Route::match(['get', 'post'], '/journal_list', [ManageJournal::class, 'journalList'])->name('journal-management-manage-journal');
Route::post('/reschedule_log/{id}', [ManageHarvesting::class, 'getCustomerOutstanding']);
  //promise
  Route::get('/daily-task', [SalesPromise::class, 'showTaskPopup']);
  Route::get('/daily-task-failure', [SalesPromise::class, 'showFailerPopup']);
  Route::post('/daily-task/submit', [SalesPromise::class, 'submitTask']);
  Route::post('/daily-task-failure/submit', [SalesPromise::class, 'submitFailureReason']);
  Route::get('/check-promise-success', [SalesPromise::class, 'showSuccessPopup']);
  Route::post('/submit-success-cheers', [SalesPromise::class, 'submitSuccessCheers']);
  Route::post('/submit-success-cheers-call', [SalesPromise::class, 'submitSuccessCheerscall']);
  Route::post('/daily-task-failure-call/submit', [SalesPromise::class, 'submitFailureReasonCall']);
  
  // Country
  Route::get('/country', [Country::class, 'List'])->name('country');
  Route::get('/country_ed_list', [Country::class, 'List_for_edit'])->name('country_ed_list');
  // state 
  Route::get('/state', [State::class, 'List'])->name('state');
  Route::get('/state_ed_list', [State::class, 'List_for_edit'])->name('state_ed_list');
  // city 
  Route::get('/city', [City::class, 'List'])->name('city');
  Route::get('/city_ed_list', [City::class, 'List_for_edit'])->name('city_ed_list');

  // Change branch
  Route::post('/change-branch', [ManageCompany::class, 'changeBranch'])->name('change-branch');
  Route::post('/change-role', [ManageCompany::class, 'changeRole'])->name('change-role');
  Route::post('/get-users-by-role', [ManageCompany::class, 'getUsersByRole'])->name('get-users-by-role');
  Route::post('/change-user', [ManageCompany::class, 'changeUser'])->name('change-user');

  // Manage Company
  Route::match(['get', 'post'], '/company', [ManageCompany::class, 'index'])->name('branch-management-manage-company');
  Route::post('/add_company', [ManageCompany::class, 'Add'])->name('add_company');
  Route::get('/company_list', [ManageCompany::class, 'List'])->name('company_list');
  Route::post('/update_company', [ManageCompany::class, 'Update'])->name('update_company');
  Route::post('/company_status/{id}', [ManageCompany::class, 'Status']);
  Route::delete('/company_delete/{id}', [ManageCompany::class, 'Delete']);
  Route::get('/company_view/{id}', [ManageCompany::class, 'View']);
  Route::post('/check_duplicates_company', [ManageCompany::class, 'checkDuplicates']);

  Route::match(['get', 'post'], '/manage_accounts', [Accounts::class, 'manage_accounts'])->name('payment-management-manage-accounts');
  Route::match(['get', 'post'], '/payment_accounts_status_change', [Accounts::class, 'payment_accounts_status_change'])->name('payment_accounts_status_change');
  Route::match(['get', 'post'], '/accounts_reject_status_change', [Accounts::class, 'paymentRejectChange'])->name('accounts_reject_status_change');
  
  //Manage Entity
  Route::match(['get', 'post'], '/entity', [ManageEntity::class, 'index'])->name('branch-management-manage-entity');
  Route::get('/entity_dropdown_list', [ManageEntity::class, 'DropdownList'])->name('entity_dropdown_list');
  Route::post('/add_entity', [ManageEntity::class, 'Add'])->name('add_entity');
  Route::get('/entity_list', [ManageEntity::class, 'List'])->name('entity_list');
  Route::post('/update_entity', [ManageEntity::class, 'Update'])->name('update_entity');
  Route::post('/entity_status/{id}', [ManageEntity::class, 'Status']);
  Route::delete('/entity_delete/{id}', [ManageEntity::class, 'Delete']);
  Route::get('/entity_view/{id}', [ManageEntity::class, 'View']);
  Route::post('/check_duplicate_entities', [ManageEntity::class, 'checkDuplicates']);



// Main upload form
    Route::get('/upload-milestone-document/{id}', [FileController::class, 'index'])->name('production-management-manage-work-order');
 
    // Milestone data
    Route::get('/fetch_milestone_data/{id}/{mile}', [FileController::class, 'fetch_milestone_data']);
 
    // Small file upload
    Route::post('/gdupload_small', [FileController::class, 'uploadSmall']);
 
    // Chunked upload endpoints
    Route::post('/gdupload/init', [FileController::class, 'initUpload']);
    Route::post('/gdupload/chunk', [FileController::class, 'uploadChunk']);
    Route::post('/gdupload/finalize', [FileController::class, 'finalizeUpload']);
    Route::post('/gdupload/debug', [FileController::class, 'debugChunks']); // Debug endpoint
 
    // Folder management
    Route::get('/folders', [FileController::class, 'getFolders']);
    Route::get('/folder/{id}', [FileController::class, 'getFolder']);
    Route::delete('/folder/{id}', [FileController::class, 'deleteFolder']);
 
    // Stats and test
    Route::get('/stats', [FileController::class, 'stats']);
    Route::get('/test-parent-folder', [FileController::class, 'testParentFolder']);
 
    // Force cleanup temp files (maintenance)
    Route::post('/cleanup-temp', [FileController::class, 'forceCleanupTempFiles'])->name('cleanup.temp');
    
  // Manage Branch
  Route::match(['get', 'post'], '/branch', [ManageBranch::class, 'index'])->name('branch-management-manage-branch');
  Route::get('/entity_branch_dropdown_list', [ManageBranch::class, 'Entity_branch_dropdown_list'])->name('entity_branch_dropdown_list');
  Route::get('/branch/create', [ManageBranch::class, 'create_branch_franchise'])->name('branch-management-manage-branch');
  Route::get('/edit_branch_franchise/{id}', [ManageBranch::class, 'Edit'])->name('branch-management-manage-branch');
  Route::post('/branch_status/{id}', [ManageBranch::class, 'Status']);
  Route::delete('/branch_delete/{id}', [ManageBranch::class, 'Delete']);
  Route::get('/branch_view/{id}', [ManageBranch::class, 'View']);
  Route::get('/create_branch_franchise', [ManageBranch::class, 'create_branch_franchise'])->name('branch');
  Route::post('/add_branch_franchise', [ManageBranch::class, 'Add'])->name('add_branch_franchise');
  Route::post('/update_branch_franchise', [ManageBranch::class, 'Update'])->name('update_branch_franchise');
  Route::post('/assign_center_head', [ManageBranch::class, 'AssignCenterHead'])->name('assign_center_head');
  Route::post('/branch/Add_staff_branch', [ManageBranch::class, 'Add_staff_branch'])->name('Add_staff_branch');
  Route::get('/bran_drop_down', [ManageBranch::class, 'List'])->name('bran_drop_down');
  Route::get('/get_course_branch', [ManageBranch::class, 'get_course_by_type'])->name('get_course_branch');
  Route::get('/job_position_branch', [ManageBranch::class, 'Job_postion_to_Cug'])->name('job_position_branch');
  Route::get('/get_staff_data_based_on_role/{id}', [ManageBranch::class, 'Staff_based_on_role'])->name('get_staff_data_based_on_role');
  Route::post('/assign_cug_Detail', [ManageBranch::class, 'AssignCugDetails'])->name('assign_cug_Detail');
  Route::post('/edit_cug_to_staff', [ManageBranch::class, 'Update_staff_Cug_modal'])->name('edit_cug_to_staff');
  Route::get('/cre_dropdown_for_branch', [ManageBranch::class, 'Cre_Dropdown'])->name('cre_dropdown_for_branch');
  Route::get('/cug_details', [ManageBranch::class, 'Cug_Edit_Fetch'])->name('cug_details');
  Route::delete('/cug_delete', [ManageBranch::class, 'Cug_delete'])->name('cug_delete');
  Route::get('/check_unique_mobile_number', [ManageBranch::class, 'checkUniqueMobileNumber'])->name('check_unique_mobile_number');
  Route::post('/check-branch-duplicates', [ManageBranch::class, 'checkDuplicates']);

  Route::get('/staff_access_app/{id}', [ManageBranch::class, 'StaffAccessApp']);
  Route::post('update_staff_access', [ManageBranch::class, 'updateStaffAccess'])->name('update_staff_access');
  
  
   // Branch Holiday
  Route::get('/branch_holiday', [BranchHoliday::class, 'index'])->name('branch-manage-branch-holiday');
  Route::post('/create_branch_holiday', [BranchHoliday::class, 'create'])->name('create_branch_holiday');
  Route::get('/edit_branch_holiday/{id}', [BranchHoliday::class, 'Edit']);
  Route::post('/update_branch_holiday', [BranchHoliday::class, 'Update'])->name('update_branch_holiday');


  // branch metrics goal
  Route::get('branch_traget', [BranchTarget::class, 'index'])->name('kpi-management-branch_target');
  Route::get('get_target_goals', [BranchTarget::class, 'getTargets'])->name('get_target_goals');
  Route::get('get_target_goals_metrics', [BranchTarget::class, 'getTargetsMetrics'])->name('branch-management-branch_target');

  // ManageTarget goal
  Route::get('manage_branch_target', [ManageTargetBranch::class, 'index'])->name('kpi-management-manage_target');
  Route::get('get_target_goals', [ManageTargetBranch::class, 'getTargets'])->name('get_target_goals');
  Route::get('get_target_goals_teams', [ManageTargetBranch::class, 'getTargetsTeam'])->name('get_target_goals_teams');
  Route::post('update_target_goals', [ManageTargetBranch::class, 'updateTargets'])->name('update_target_goals');
  
    // Main Menu Starts
    Route::match(['get', 'post'],'/marketing', [ManageMarketing::class, 'index'])->name('marketing-manage-marketing');
    Route::get('/manage_marketing/verify_activity_edit/{id}', [ManageMarketing::class, 'verify_activity_edit'])->name('marketing-manage-marketing');
    Route::get('/manage_marketing/verify_activity/{id}', [ManageMarketing::class, 'verify_activity'])->name('marketing-manage-marketing');
    Route::get('/manage_marketing/view_activity/{id}', [ManageMarketing::class, 'view_activity'])->name('marketing-manage-marketing_view');
    
    
    Route::match(['get', 'post'],'/training_planner', [TrainingPlanner::class, 'index'])->name('marketing-training-planner');
    Route::post('/training_filter_manage', [TrainingPlanner::class, 'list_filter'])->name('training_filter_manage');
    Route::get('/training_view_manage/{id}', [TrainingPlanner::class, 'View']);
    
    // db Setting
  Route::get('/db_table', [TableManagerController::class, 'index']);
  Route::get('/tables', [TableManagerController::class, 'getTables'])->name('table.manager.tables');
  Route::post('/data', [TableManagerController::class, 'getTableData'])->name('table.manager.data');
  Route::post('/update-cell', [TableManagerController::class, 'updateCell'])->name('table.manager.update.cell');
  Route::post('/update-row', [TableManagerController::class, 'updateRow'])->name('table.manager.update.row');
  Route::delete('/delete', [TableManagerController::class, 'deleteRecord'])->name('table.manager.delete');
  Route::post('/add_db', [TableManagerController::class, 'addRecord'])->name('table.manager.add');
  Route::post('/search', [TableManagerController::class, 'searchTable'])->name('table.manager.search');
  
    // Main Menu Starts
    Route::match(['get', 'post'],'/branch_campaign', [BranchCampaign::class, 'index'])->name('branch_manage_campaign');
    Route::get('/manage_marketing/verify_activity_edit/{id}', [BranchCampaign::class, 'verify_activity_edit'])->name('marketing-manage-marketing');
    Route::get('/manage_marketing/verify_activity/{id}', [BranchCampaign::class, 'verify_activity'])->name('marketing-manage-marketing');
    Route::get('/manage_marketing/view_activity/{id}', [BranchCampaign::class, 'view_activity'])->name('marketing-manage-marketing_view');
    //dropdwon code
    Route::get('type_dropdown/{id}', [MarketingType::class, 'Listdropdown'])->name('type_dropdown');
    Route::get('/zone_dropdown', [Zone::class, 'Listdropdown'])->name('zone_dropdown');
    Route::get('/zone_dropdown_area', [BranchCampaign::class, 'zoneget'])->name('zone_dropdown_area');
    Route::get('/vendor_dropdown', [Vendor::class, 'Listdropdown'])->name('vendor_dropdown');
    Route::post('/add_marketing', [BranchCampaign::class, 'Add'])->name('add_marketing');
    Route::get('/marketing_campaign_edit/{id}', [BranchCampaign::class, 'Edit'])->name('edit_marketing_campaign');
    Route::post('/marketing_update', [BranchCampaign::class, 'Update'])->name('marketing_update');
    Route::post('/marketing_verifiy_activity', [BranchCampaign::class, 'marketing_verifiy_activity_Update'])->name('marketing_verifiy_activity');
    Route::delete('/marketing_campaign_delete/{id}', [BranchCampaign::class, 'Delete']);
    Route::post('/marketing_campaign_status/{id}', [BranchCampaign::class, 'Status']);
    
    Route::match(['get', 'post'],'/Cronjob_Monitor', [CronjobMonitor::class, 'index'])->name('tools_manage-cronjob');
    Route::post('/CronjobStatusChange/{id}', [CronjobMonitor::class, 'Status']);
    Route::get('/branch-manage/cronjob-history/{id}', [CronjobMonitor::class, 'cronjobHistory'])->name('branch_manage-cronjob-history');
    
     //Clear Cronjob Log   
   Route::post('/cron-log-clear', [CronjobMonitor::class, 'clearCronJobLogs']);
    
       Route::get('/user_log', [UserLog::class, 'index'])->name('tools_manage-user_log');
        Route::get('/user_login_logs/list', [UserLog::class, 'List']);
        Route::post('/logs/clear', [UserLog::class, 'clearOldLogs']);
          Route::post('/homeips/update', [UserLog::class, 'update'])->name('homeips.update');
       

   Route::match(['get', 'post'],'/call_log', [CallLog::class, 'index'])->name('tools_manage-call_log');
   Route::match(['get', 'post'], '/call_log_search', [CallLog::class, 'call_log_search'])->name('dashboards-call_log_search');
    Route::get('/team-call-report-ajax', [CallLog::class, 'List']);
    
    Route::get('/maintenance_mode', [MaintenanceMode::class, 'index'])->name('tools_manage-maintenance_mode');
    Route::post('/maintenance/toggle', [MaintenanceMode::class, 'toggle'])->name('maintenance.toggle');
    
    Route::get('/maintenance', [MaintenancePage::class, 'show'])->name('maintenance_page');
    
    // Main Training Planner
    Route::match(['get', 'post'],'/branch_training', [ManageTraining::class, 'index'])->name('branch_manage_training');
    Route::post('/training_filter', [ManageTraining::class, 'list_filter'])->name('training_filter');
    Route::post('/training_status/{id}', [ManageTraining::class, 'Status']);
    Route::delete('/training_delete/{id}', [ManageTraining::class, 'Delete']);
    Route::post('/add_training', [ManageTraining::class, 'Add'])->name('add_training');
    Route::get('/training_edit/{id}', [ManageTraining::class, 'Edit']);
    Route::post('/update_training', [ManageTraining::class, 'Update'])->name('update_training');
    Route::get('/get-all-staff', [ManageTraining::class, 'getAllStaff']);
    Route::get('/get_branch_staff', [ManageTraining::class, 'get_branch_staff'])->name('get_branch_staff');
    Route::get('/jobPosition', [ManageTraining::class, 'jobPosition'])->name('jobPosition');
    Route::get('/branchList', [ManageTraining::class, 'branchList'])->name('branchList');
    Route::get('/get-staff-excluding/{trainerId}', [ManageTraining::class, 'getStaffExcluding']);
    Route::get('/training_view/{id}', [ManageTraining::class, 'View']);
    Route::get('/training_attendance/{id}', [ManageTraining::class, 'Attendance']);
    Route::get('/tableGet', [ManageTraining::class, 'tableGet'])->name('tableGet');
    Route::post('/complete_training', [ManageTraining::class, 'completeTraining'])->name('complete_training');



  //Qr Promotion
  Route::match(['get', 'post'], '/branch_management/qr_promotion', [QrPromotion::class, 'index'])->name('marketing-qr_promotion');
  Route::post('/add_qr_promotion', [QrPromotion::class, 'Add'])->name('add_qr_promotion');
  Route::get('/edit_qr_promotion/{id}', [QrPromotion::class, 'Edit'])->name('edit_qr_promotion');
  Route::get('/branch_sales_staff_list/{id}', [QrPromotion::class, 'branch_sales_staff_list'])->name('branch_sales_staff_list');
  Route::post('/update_qr_promotion', [QrPromotion::class, 'Update'])->name('update_qr_promotion');
  
  // QR Coupon
  Route::match(['get', 'post'],'/branch_management/qr_coupon', [QrCoupon::class, 'index'])->name('marketing-qr_coupon');
  Route::post('/redeem_coupon/{id}', [QrCoupon::class, 'redeemCoupon']);


  // set goal set
  Route::get('branch_setgoal', [SetGoal::class, 'index'])->name('kpi-management-set-goal');
  Route::get('/departments_setgoal', [SetGoal::class, 'getDepartmentsGoal'])->name('departments_setgoal');
  Route::get('/team_setgoals', [SetGoal::class, 'getTeamGoal'])->name('team_setgoals');
  Route::post('/save_team_setgoals', [SetGoal::class, 'saveTeamGoalset'])->name('save_team_setgoals');
  Route::get('/staff_setgoal', [SetGoal::class, 'getStaffGoal'])->name('staff_setgoal');
  Route::post('/staff_setgoal_update', [SetGoal::class, 'addOrUpdateStaffGoal'])->name('staff_setgoal_update');

  Route::get('team/team_goalset', [GoalSetStaff::class, 'index'])->name('team-manage-goal-set');
  Route::get('/departments_goal', [GoalSetStaff::class, 'getDepartmentsGoal'])->name('departments_goal');
  Route::get('/team_goals', [GoalSetStaff::class, 'getTeamGoal'])->name('team_goals');
  Route::post('/save_team_goals', [GoalSetStaff::class, 'saveTeamGoal'])->name('save_team_goals');
//   Route::get('/staff_goal', [GoalSetStaff::class, 'getStaffGoal'])->name('staff_goal');
  Route::post('/staff_goal_update', [GoalSetStaff::class, 'addOrUpdateStaffGoal'])->name('staff_goal_update');
  
  Route::get('/staff_goal', [StaffGoalSet::class, 'getStaffGoal'])->name('staff_goal');



  // Default Goal Set Settings
  Route::get('/settings_default_setgoal', [DefaultGoalSet::class, 'index'])->name('settings-default-goal-set');
  Route::get('/goalset_departments/{branch_id}', [DefaultGoalSet::class, 'getDepartmentsByBranch']);
  Route::get('/default_goals/{branch_id}/{department_id}', [DefaultGoalSet::class, 'getDefaultGoals'])->name('default_goals.fetch');
  Route::post('/default_goals/update', [DefaultGoalSet::class, 'updateDefaultGoals'])->name('default_goals_update');

  // Buissness Goal Set Settings
  Route::get('/settings/business_goal_set', [BuissnessGoalSet::class, 'index'])->name('settings-buissness-goal-set');
  Route::get('get_business_goals', [BuissnessGoalSet::class, 'getBusinessGoals'])->name('get_business_goals');
  Route::post('update_business_goals', [BuissnessGoalSet::class, 'updateBusinessGoals'])->name('update_business_goals');





  // Raw Lead   
  Route::match(['get', 'post'], '/raw_lead', [ManageRawLead::class, 'index'])->name('lead-management-manage-lead');
  Route::get('/lead/export-excel', [ManageRawLead::class, 'exportExcel']);
  Route::get('/lead/sample-excel', [ManageRawLead::class, 'LeadExportExcel']);
  Route::post('/lead_import', [ManageRawLead::class, 'LeadImport'])->name('lead_import');
  Route::post('/submit_raw_spam_reason', [ManageRawLead::class, 'Rawspam'])->name('submit_raw_spam_reason');
  Route::post('/raw_drop', [ManageRawLead::class, 'Rawdrop'])->name('raw_drop');
  Route::post('/future_lead_status/{id}', [ManageRawLead::class, 'FutureLead']);
  Route::post('/check-mobile-exists', [ManageRawLead::class, 'checkMobileExists'])->name('checkMobileExists');
  Route::post('/convert_raw_to_lead/{id}', [ManageRawLead::class, 'ConvertRawtoLead']);
  Route::post('/phone_no_raw_lead/{id}', [ManageRawLead::class, 'phone_no_raw_lead_update']);
  Route::get('/sales_staff', [ManageRawLead::class, 'SalesStaffList'])->name('sales_staff');
  Route::post('/bulk_raw_lead', [ManageRawLead::class, 'bulk_raw_lead_conversion'])->name('bulk_raw_lead');

    Route::post('/add_raw_lead', [ManageRawLead::class, 'Add'])->name('add_raw_lead');

  //Lead Bank
  Route::match(['get', 'post'], '/lead_bank', [ManageLeadBank::class, 'index'])->name('lead-management-manage-lead');
  Route::post('/bulk_bank_lead', [ManageLeadBank::class, 'bulk_bank_lead_conversion'])->name('bulk_bank_lead');
  Route::post('/bank_lead', [ManageLeadBank::class, 'bank_lead_conversion'])->name('bank_lead');
  Route::post('/bank_lead_to_lead', [ManageLeadBank::class, 'bank_bank_conversion_lead'])->name('bank_lead_to_lead');
  Route::get('/lead_edit_bank_convert/{id}', [ManageLeadBank::class, 'EditConvertBank']);
  Route::post('/convert_bank_to_lead', [ManageLeadBank::class, 'ConvertBanktoLead'])->name('convert_bank_to_lead');

  Route::match(['get', 'post'], '/lead_management/lead_source', [ManageLeadSource::class, 'index'])->name('lead-management-manage-lead-source');

  //Spam Lead
    Route::match(['get', 'post'], '/lead_management/spam_lead', [ManageSpamLead::class, 'SpamLeadList'])->name('lead-management-manage-spam_lead');
Route::post('/trans_spam_to_lead', [ManageSpamLead::class, 'trans_spam_to_lead'])->name('trans_spam_to_lead');
  Route::post('/convert_spam_to_lead/{id}', [ManageSpamLead::class, 'ConvertSpamToLead']);
  Route::post('/confirm_spam', [ManageSpamLead::class, 'ConfirmSpamLead'])->name('confirm_spam');
Route::match(['get', 'post'], '/spam_lead', [ManageSpamLead::class, 'index'])->name('lead-management-manage-lead');
Route::match(['get', 'post'], '/drop_lead', [ManageDropLead::class, 'index'])->name('lead-management-manage-lead');

Route::post('/bulk-convert-spam-to-lead',[ManageSpamLead::class, 'bulkConvertSpamToLead'])->name('bulk_convert_spam_to_lead');

Route::post('/bulk-convert-drop-to-lead',[ManageDropLead::class, 'bulkConvertDropToLead'])->name('bulk_convert_drop_to_lead');

  //Drop Lead
  Route::match(['get', 'post'], '/lead_management/drop_lead', [ManageDropLead::class, 'DropLeadList'])->name('lead-management-manage-dead_lead');

    Route::post('/trans_drop_to_lead', [ManageDropLead::class, 'trans_drop_to_lead'])->name('trans_drop_to_lead');
  Route::post('/convert_drop_to_lead/{id}', [ManageDropLead::class, 'ConvertDropToLead']);
  Route::post('/confirm_drop', [ManageDropLead::class, 'ConfirmDropLead'])->name('confirm_drop');
  Route::post('/confirm_drop_lead', [ManageDropLead::class, 'ConvertDropLead'])->name('confirm_drop_lead');
  //Potential Lead
  Route::match(['get', 'post'], '/lead_management/potential_lead', [ManagePotentialLead::class, 'index'])->name('lead-management-manage-pot_lead');
  Route::post('/trans_potential_to_lead', [ManagePotentialLead::class, 'trans_potential_to_lead'])->name('trans_potential_to_lead');
  Route::post('/add_appointment_pb', [ManagePotentialLead::class, 'add_appointment_pb'])->name('add_appointment_pb');
Route::post('/appointment_update_pb/{id}', [ManagePotentialLead::class, 'appointment_update_pb']);
Route::post('/lead_update_pb', [ManagePotentialLead::class, 'Update'])->name('lead_update_pb');
  Route::post('/leadBasketToLead/{id}', [ManagePotentialLead::class, 'MoveBasketToLead'])->name('leadBasketToLead');
  Route::post('/convert-staff', [ManagePotentialLead::class, 'convertStaff'])->name('convert_staff');

  // LeadTracker
  Route::get('/manage_lead_tracker', [LeadTracker::class, 'index'])->name('lead-management-manage-lead-tracker');
  Route::get('/lead_tracker_product_List', [LeadTracker::class, 'ProductList']);
  Route::get('/lead_tracker_source_List', [LeadTracker::class, 'SourceList']);
  Route::get('/lead_tracker_staff_List', [LeadTracker::class, 'StaffList']);
  Route::post('/lead-tracker', [LeadTracker::class, 'leadTracker']);
  
  //Internal Calls
  Route::match(['get', 'post'], '/internal_calls_lead', [ManageInternalLead::class, 'index'])->name('lead-management-manage-lead');
  Route::post('/confirm_internal_calls', [ManageInternalLead::class, 'ConfirmInternalCalls'])->name('confirm_internal_calls');
  Route::post('/convert_internal_to_leads/{id}', [ManageInternalLead::class, 'ConvertInternalToLead']);
  //Today Follow up
  Route::match(['get', 'post'], '/today_followup_lead', [ManageTodayFolloupwLead::class, 'index'])->name('lead-management-manage-lead');

  // Lead Calendar
  Route::match(['get', 'post'], '/lead_calendar', [LeadCalendar::class, 'lead_calendar'])->name('lead-management-manage-calendar');

  //CloudCal
  Route::match(['get', 'post'], '/lead/cloudcall', [CloudCall::class, 'Index'])->name('lead-management-manage-cloud_call');
  Route::post('/spam_lead_convert', [CloudCall::class, 'spamLeadConvert'])->name('spam_lead_convert');

  //manage_coupon
  Route::match(['get', 'post'], '/lead/manage_coupon', [ManageCoupon::class, 'index'])->name('lead-management-manage-coupon');
  Route::match(['get', 'post'], '/lead/usage_history', [ManageCoupon::class, 'usage_history'])->name('lead-management-manage-coupon');
  Route::post('/coupon_status/{id}', [ManageCoupon::class, 'Status']);
  Route::post('/add_coupon', [ManageCoupon::class, 'Add'])->name('add_coupon');
  Route::delete('/coupon_delete/{id}', [ManageCoupon::class, 'Delete']);
  Route::get('/autocomplete_coupon', [ManageCoupon::class, 'autocomplete_coupon'])->name('autocomplete_coupon');
  
 Route::match(['get', 'post'], '/daily_call_lead', [DailyCallLead::class, 'index'])->name('lead-management-manage-daily-call');
  Route::match(['get', 'post'], '/daily_call_lead_followup', [DailyCallLead::class, 'Appointment'])->name('daily_call_lead_followup');
  Route::post('/add_appointment_daily_update/{id}', [DailyCallLead::class, 'add_appointment_daily_update']);
  Route::get('/sales_staff_list', [DailyCallLead::class, 'SalesList'])->name('sales_staff_list');
Route::post('/sales-staff-update', [DailyCallLead::class, 'SalesListUpdate'])->name('sales_staff_update');
Route::post('/add_appointment_pb_daily', [DailyCallLead::class, 'add_appointment_pb_daily'])->name('add_appointment_pb_daily');
Route::get('/daily_call_history', [DailyCallLead::class, 'daily_call_history'])->name('daily_call_history');
  Route::post('/daily-call-switch-update', [DailyCallLead::class, 'updateSwitch'])->name('daily_call_switch_update');
    Route::post('/daily-performance', [DailyCallLead::class, 'getDailyPerformance']); 
Route::match(['get', 'post'],'/daily_call_unfollow_lead', [DailyCallLead::class, 'UnfollowList'])->name('lead-management-manage-daily-call');
Route::post('/reset_daily_call/{id}', [DailyCallLead::class, 'ResetDailyCall']);
Route::get('/daily_call_log', [DailyCallLead::class, 'daily_call_log'])->name('daily_call_log');

//hot Lead
  Route::match(['get', 'post'], '/hot_lead', [HotLead::class, 'index'])->name('lead-management-hot-lead');
 Route::post('/unmark_hot_lead/{id}', [HotLead::class, 'unMarkHotLead']);
 
  // Main Menu lead
  Route::match(['get', 'post'], '/manage_lead', [ManageLead::class, 'index'])->name('lead-management-manage-lead');
  Route::post('/lead_transfer/{id}', [ManageLead::class, 'LeadTransfer']);
  Route::post('/status_update/{id}', [ManageLead::class, 'Status']);
  Route::get('/phn_no_valid', [ManageLead::class, 'validatePhoneNumber'])->name('phn_no_valid');
  Route::get('/appointment_history/{id}', [ManageLead::class, 'AppointmentHistory'])->name('appointment_history');
  Route::post('/hot_lead_status_update/{id}', [ManageLead::class, 'HotLeadStatus']);
  Route::post('/add_lead', [ManageLead::class, 'Add'])->name('add_lead');
  Route::get('/lead_edit/{id}', [ManageLead::class, 'Edit']);
  Route::get('/lead_view/{id}', [ManageLead::class, 'Lead_view']);
  Route::post('/lead_update', [ManageLead::class, 'Update'])->name('lead_update');
  Route::delete('/lead_delete/{id}', [ManageLead::class, 'Delete']);
  Route::post('/lead_status_change/{id}', [ManageLead::class, 'LeadStatus']);
  Route::post('/add_appointment', [ManageLead::class, 'Appointment'])->name('add_appointment');
  Route::get('/edit_appointment/{id}', [ManageLead::class, 'AppointmentEdit'])->name('edit_appointment');
  Route::post('/appointment_update/{id}', [ManageLead::class, 'AppointmentUpdate']);
  Route::post('/submit_internal_reason', [ManageLead::class, 'internal_reason'])->name('submit_internal_reason');
  Route::post('/submit_potential_reason', [ManageLead::class, 'potential_reason'])->name('submit_potential_reason');
  Route::post('/submit_lead_bank_reason', [ManageLead::class, 'Lead_bank_reason'])->name('submit_lead_bank_reason');
  Route::post('/submit_lead_bank_reason_raw_lead', [ManageLead::class, 'Lead_bank_reason_raw_lead'])->name('submit_lead_bank_reason_raw_lead');
  Route::post('/get_not_closed_followups', [ManageLead::class, 'getNotClosedFollowups'])->name('get_not_closed_followups');  
  Route::get('/lead/getNotClosedDead', [ManageLead::class, 'getNotClosedDead']);
  Route::get('/lead/getNotClosedSpam', [ManageLead::class, 'getNotClosedSpam']);
  
  Route::post('/bulk_sales_staff_convert', [ManageLead::class, 'bulkSalesStaffConversion'])->name('bulk_sales_staff_convert');
  Route::post('/add_spam', [ManageLead::class, 'AddSpam'])->name('add_spam');
  Route::post('/lead_potential_update/{id}', [ManageLead::class, 'addPotential']);

  Route::get('/product_list_by_branch', [ManageLead::class, 'Product_List'])->name('product_list_by_branch');
  Route::get('/leadCheckMobileExists', [ManageLead::class, 'checkMobileExists'])->name('leadCheckMobileExists');
  Route::get('/leadCheckEmailExist', [ManageLead::class, 'checkEmailExists'])->name('leadCheckEmailExist');
  Route::get('/leadCheckMobileExistsEdit', [ManageLead::class, 'checkMobileExistsEdit'])->name('leadCheckMobileExistsEdit');
  Route::get('/leadCheckEmailExistsEdit', [ManageLead::class, 'checkEmailExistsEdit'])->name('leadCheckEmailExistsEdit');
  Route::post('/submit_drop_reason', [ManageLead::class, 'drop_reason'])->name('submit_drop_reason');
  Route::post('/submit_spam_reason', [ManageLead::class, 'spam_reason'])->name('submit_spam_reason');
  
  Route::post('/registered_date_update', [ManageLead::class, 'UpdateRegisterDate'])->name('registered_date_update');

    Route::match(['get', 'post'],'/manage_post_sale_lead', [ManagePostSaleLead::class, 'index'])->name('lead-management-manage-post-sales-lead');
    Route::get('/post_sale_lead_view/{id}', [ManagePostSaleLead::class, 'Lead_view']);
    Route::post('/hot_post_sale_lead_status_update/{id}', [ManagePostSaleLead::class, 'HotLeadStatus']);
    Route::post('/create_post_sale_lead_proposal', [ManagePostSaleLead::class, 'CreateProposal'])->name('create_post_sale_lead_proposal');
    Route::get('/manage_proposal/proposal_post_sale_add/{id}', [ManagePostSaleLead::class, 'manage_proposal_add'])->name('lead-management-manage-proposal');
    Route::post('/post_sale_lead_import', [ManagePostSaleLead::class, 'LeadImport'])->name('post_sale_lead_import');
    Route::post('/add_post_sale_lead', [ManagePostSaleLead::class, 'Add'])->name('add_post_sale_lead');
    Route::get('/postleadCheckMobileExist', [ManagePostSaleLead::class, 'checkMobileExists'])->name('postleadCheckMobileExist');
    Route::get('/postleadCheckEmailExist', [ManagePostSaleLead::class, 'checkEmailExists'])->name('postleadCheckEmailExist');
    Route::get('/postleadCheckMobileExistsEdit', [ManagePostSaleLead::class, 'checkMobileExistsEdit'])->name('postleadCheckMobileExistsEdit');
    Route::get('/postleadCheckEmailExistsEdit', [ManagePostSaleLead::class, 'checkEmailExistsEdit'])->name('postleadCheckEmailExistsEdit');

 //New Requirement
  Route::match(['get', 'post'], '/requirement_management/manage_requirement', [RequirementManage::class, 'index'])->name('requirement-management-manage-requirement');
  Route::post('/requirement_manage_add_update_customer', [RequirementManage::class, 'addOrUpdateRequirement_customer'])->name('requirement_manage_add_update_customer');
  Route::post('/requirement_manage_add_update_jnlcustomer', [RequirementManage::class, 'addOrUpdateRequirement_jnlcustomer'])->name('requirement_manage_add_update_jnlcustomer');
  Route::post('/requirement_manage_add_update', [RequirementManage::class, 'addOrUpdateRequirement'])->name('requirement_manage_add_update');
  Route::get('/requirement_manage_details/{id}', [RequirementManage::class, 'RequirementDetails']);
  Route::get('/leadrequirement_manage_details/{id}', [RequirementManage::class, 'RequirementDetailsLead']);
  Route::get('/customer_requirement_manage_details/{id}', [RequirementManage::class, 'RequirementDetailCustomer']);
  Route::get('/journal_requirement_manage_details/{id}', [RequirementManage::class, 'RequirementDetails_jnlcustomer']);
  Route::get('/requirement_manage_staff_list', [RequirementManage::class, 'StaffList'])->name('requirement_manage_staff_list');
  Route::post('/assign_pc_manage_requirement', [RequirementManage::class, 'AssignPCRequirement'])->name('assign_pc_manage_requirement');
  Route::post('/requirement_manage_update_staff', [RequirementManage::class, 'UpdateStaffRequirement'])->name('update_staff_requirement');
  Route::get('/requirement_manage_view/{id}', [RequirementManage::class, 'RequirementView']);
  Route::get('/RequirementViewSts/{id}', [RequirementManage::class, 'RequirementViewSts']);
  Route::post('/update_requirement_manage_reject_reason', [RequirementManage::class, 'RequirementReject'])->name('update_requirement_manage_reject_reason');
  Route::post('/requirement_manage_approve', [RequirementManage::class, 'RequirementApprove'])->name('approve_requirement');
  Route::get('/requirement_manage_pc_list', [RequirementManage::class, 'PCList'])->name('requirement_manage_pc_list');

  // routes/web.php
  Route::post('/get-ajax-data', [RequirementManage::class, 'getAjaxData'])->name('get.ajax.data');
  Route::post('/AssignStaffUpdateRequirement', [RequirementManage::class, 'AssignStaffUpdateRequirement'])->name('AssignStaffUpdateRequirement');
  Route::match(['get', 'post'], '/requirement_management_filter/{id}', [RequirementManage::class, 'filter'])->name('requirement-management-manage-requirement');
  
  // manage requirement
  Route::match(['get', 'post'], '/manage_requirements', [ManageRequirements::class, 'index'])->name('lead-management-manage-requirments');
  Route::post('/requirements_add_update_customer', [ManageRequirements::class, 'addOrUpdateRequirement_customer'])->name('requirements_add_update_customer');
  Route::post('/requirements_add_update', [ManageRequirements::class, 'addOrUpdateRequirement'])->name('requirements_add_update');
  Route::get('/requirements_details/{id}', [ManageRequirements::class, 'RequirementDetails']);
  Route::get('/requirement_staff_list', [ManageRequirements::class, 'StaffList'])->name('requirement_staff_list');
  Route::post('/assign_pc_requirement', [ManageRequirements::class, 'AssignPCRequirement'])->name('assign_pc_requirement');
  Route::post('/update_staff_requirement', [ManageRequirements::class, 'UpdateStaffRequirement'])->name('update_staff_requirement');
  Route::get('/requirement_view/{id}', [ManageRequirements::class, 'RequirementView']);
  Route::post('/update_requirement_reject_reason', [ManageRequirements::class, 'RequirementReject'])->name('update_requirement_reject_reason');
  Route::post('/approve_requirement', [ManageRequirements::class, 'RequirementApprove'])->name('approve_requirement');
  
  // Production Requirements
  Route::match(['get', 'post'], '/production_management/manage_requirements', [ManageRequirements::class, 'ManageRequirementIndex'])->name('production-management-manage-requirements');
  Route::post('/assign_staff_requirement', [ManageRequirements::class, 'AssignStaffRequirement'])->name('assign_staff_requirement');



  // manage lead Appointment
  Route::match(['get', 'post'], '/manage_appointment', [ManageLeadAppointment::class, 'index'])->name('lead-management-manage-appointment');
  Route::get('/dept_staff', [ManageLeadAppointment::class, 'DeptStaffList'])->name('dept_staff');
  Route::post('/lead_appointment_add', [ManageLeadAppointment::class, 'Add'])->name('lead_appointment_add');
  Route::post('/lead_appointment_update', [ManageLeadAppointment::class, 'Update'])->name('lead_appointment_update');
  Route::post('/complete_appointment_update', [ManageLeadAppointment::class, 'updateCompleteAppointment'])->name('complete_appointment_update');
  Route::post('/cancel_appointment_update', [ManageLeadAppointment::class, 'updateCancelAppointment'])->name('cancel_appointment_update');
  Route::post('/re_appointment_update', [ManageLeadAppointment::class, 'updateReAppointment'])->name('re_appointment_update');
  Route::get('/autocomplete_lead_name', [ManageLeadAppointment::class, 'autocomplete_lead'])->name('autocomplete_lead_name');
  Route::match(['get', 'post'], '/appointment_filter', [ManageLeadAppointment::class, 'filter_appointment'])->name('appointment_filter');

  // manage follow up

  Route::match(['get', 'post'], '/manage_followup', [ManageLeadFollowup::class, 'index'])->name('lead-management-manage-followup');
  Route::match(['get', 'post'], '/manage_followup/closed_follow', [ManageLeadFollowup::class, 'closedFollowup'])->name('lead-management-manage-followup');
  Route::match(['get', 'post'], '/manage_followup/reschedule_follow', [ManageLeadFollowup::class, 'rescheduleFollowup'])->name('lead-management-manage-followup');
  Route::match(['get', 'post'], '/manage_followup/un_follow', [ManageLeadFollowup::class, 'unfollowup'])->name('lead-management-manage-followup');



  // manage calls and Manage team
  //  Route::match(['get', 'post'], '/sales/manage_calls', [ManageCalls::class, 'manage_calls'])->name('sales-manage-calls');
  Route::match(['get', 'post'], '/manage_calls', [ManageCalls::class, 'index'])->name('lead-management-manage-calls');
  Route::get('/get-call-history', [ManageCalls::class, 'getCallHistory'])->name('get_call_history');
  Route::get('/get_staff_call_history', [ManageCalls::class, 'staffCallHistory'])->name('get_staff_call_history');
  Route::post('/spam_lead_convert_calls', [ManageCalls::class, 'spamLeadConvertCalls'])->name('spam_lead_convert_calls');
  Route::get('/get-call-history-post-sale', [ManageCalls::class, 'getCallHistoryPostSale'])->name('get_call_history_post_sale');

  Route::get('/cug-monitor', [ManageCalls::class,'cugIndex']);
  Route::get('/ajax/cug-monitor/list',[ManageCalls::class,'cugStaffList'])->name('ajax.cug.monitor.list');
  Route::get('/ajax/cug-monitor/departments',[ManageCalls::class,'cugDepartments'])->name('ajax.cug.monitor.departments');

  // Manage Proposal
  Route::match(['get', 'post'], '/manage_proposal', [ManageProposal::class, 'index'])->name('lead-management-manage-proposal');
  Route::get('/manage_proposal/proposal_add/{id}', [ManageProposal::class, 'manage_proposal_add'])->name('lead-management-manage-proposal');
  Route::get('/manage_proposal/proposal_edit/{id}', [ManageProposal::class, 'manage_proposal_edit'])->name('lead-management-manage-proposal');
  Route::get('/manage_proposal/proposal_view/{id}', [ManageProposal::class, 'manage_proposal_view'])->name('lead-management-manage-proposal');
  Route::get('/manage_proposal/proposal_print', [ManageProposal::class, 'manage_proposal_print'])->name('lead-management-manage-proposal');

  Route::post('/create_lead_proposal', [ManageProposal::class, 'CreateProposal'])->name('create_lead_proposal');
  Route::get('/product_list_proposal/{id}', [ManageProposal::class, 'product_list_proposal'])->name('product_list_proposal');
  Route::get('/product_list_proposal_delete/{id}', [ManageProposal::class, 'product_list_proposal_delete'])->name('product_list_proposal_delete');
  Route::post('/proposal/product_add', [ManageProposal::class, 'proposal_product_add'])->name('proposal/product_add');
  Route::get('get_couponcode', [ManageProposal::class, 'get_couponcode'])->name('get_couponcode');
  Route::get('/deliverable_list', [ManageProposal::class, 'DeliverableList'])->name('deliverable_list');
  Route::get('/payment_slot_list', [ManageProposal::class, 'PaymentSlotList'])->name('payment_slot_list');
  Route::get('/slot_notes_list', [ManageProposal::class, 'SlotNotesList'])->name('slot_notes_list');
  Route::post('/add_proposal_payment_slot', [ManageProposal::class, 'AddPaymentSlot'])->name('add_proposal_payment_slot');
  Route::post('/update_proposal_payment_slot', [ManageProposal::class, 'UpdatePaymentSlot'])->name('update_proposal_payment_slot');
  Route::post('/create_proposal', [ManageProposal::class, 'GeneratePropsal'])->name('create_proposal');
  Route::get('/paymentSlotDetails/{id}', [ManageProposal::class, 'paymentSlotDetails'])->name('paymentSlotDetails');
  Route::get('/package_data_by_id', [ManageProposal::class, 'PackageData'])->name('package_data_by_id');
  Route::post('/revise_lead_proposal', [ManageProposal::class, 'ReviseProposal'])->name('revise_lead_proposal');
  
  Route::get('/manage_proposal/proposal_revise/{id}', [ManageProposal::class, 'manage_proposal_revise'])->name('lead-management-manage-proposal');
  Route::post('/revise_proposal', [ManageProposal::class, 'ProposalRevised'])->name('revise_proposal');
   Route::get('/paymentSlotDetailsRevised/{id}', [ManageProposal::class, 'paymentSlotDetailsRevised'])->name('paymentSlotDetailsRevised');
   Route::get('/product_list_proposal_revised/{id}', [ManageProposal::class, 'product_list_proposal_revised'])->name('product_list_proposal_revised');
   Route::get('/product_cart_List_revised', [ManageProposal::class, 'product_cart_List_revised'])->name('product_cart_List_revised');
   Route::post('/proposal/product_add_revised', [ManageProposal::class, 'proposal_product_add_revised'])->name('proposal/product_add_revised');
    Route::post('/add_proposal_payment_slot_revised', [ManageProposal::class, 'AddPaymentSlotRevised'])->name('add_proposal_payment_slot_revised');
    Route::post('/update_Proposal_revise', [ManageProposal::class, 'updateProposalRevised']);
   
  Route::get('/payment_slot_by_proposal', [ManageProposal::class, 'PaymentSlotByProposal'])->name('payment_slot_by_proposal');

  Route::post('/proposal_message', [ManageProposal::class, 'ProposalMessage'])->name('proposal_message');
  Route::get('/manage_proposal/print_proposal/{id}', [ManageProposal::class, 'PrintProposal'])->name('lead-management-manage-proposal');
  Route::post('/send_invoice_message', [ManageProposal::class, 'InvoiceMessage'])->name('send_invoice_message');
  Route::get('/manage_proposal/create_invoice/{id}', [ManageProposal::class, 'CreateInvoice'])->name('lead-management-manage-proposal');
  Route::post('/update_preProposal', [ManageProposal::class, 'updatePreProposal']);
  Route::get('/product_cart_List', [ManageProposal::class, 'product_cart_List'])->name('product_cart_List');

  Route::post('/proposal_verify', [ManageProposal::class, 'ProposalVerify'])->name('proposal_verify');
   Route::post('/update_proposal', [ManageProposal::class, 'updateProposal'])->name('update_proposal');
   Route::get('/manage_proposal/reject_proposal/{id}', [ManageProposal::class, 'RejectProposal'])->name('lead-management-manage-proposal');
   Route::post('/proposal_reject', [ManageProposal::class, 'ConfirmRejectProposal'])->name('proposal_reject');
   
    Route::get('/get-product-price', [ManageProposal::class, 'getProductPrice'])->name('get-product-price');
  Route::get('/get-addon-price', [ManageProposal::class, 'getAddonPrice'])->name('get-addon-price');
   Route::post('/update-deliverable-order', [ManageProposal::class, 'updateDeliverableOrder'])->name('update.deliverable.order');
   
   //   page_count_update
  Route::get('/fetch-proposal-details', [ManageProposal::class, 'fetchProposalDetails'])->name('fetch-proposal-details');
  Route::post('update-proposal-pages', [ManageProposal::class, 'updateProposalPages'])->name('update-proposal-pages');
  
  //   Team Management
  //Team Followup
  Route::match(['get', 'post'], '/team/manage_team_lead', [TeamManagement::class, 'TeamLead'])->name('team-manage-lead');
  Route::post('/lead_limit_set/{id}', [TeamManagement::class, 'leadLimitSet']);
  Route::match(['get', 'post'], '/team/manage_team_followup', [TeamManagement::class, 'TeamFollowup'])->name('team-manage-followup');
  Route::match(['get', 'post'], '/team/manage_team_appointment', [TeamManagement::class, 'TeamAppointment'])->name('team-manage-appointment');
  Route::match(['get', 'post'], '/team/manage_team_call', [TeamManagement::class, 'TeamCall'])->name('team-manage-call');
  Route::get('/api/get-locations/{id}', [TeamManagement::class, 'getStaffLocations']);
  
   Route::match(['get', 'post'], '/team/manage_team_lead_post', [TeamManagement::class, 'PostSaleTeamLead'])->name('team-manage-lead');

  Route::match(['get', 'post'], '/team/manage_team_cloud_call', [TeamManagement::class, 'TeamCloudCall'])->name('team-manage-cloud-call');

  Route::match(['get', 'post'], '/team/team_promise/{day?}/{month?}/{year?}', [TeamPromise::class, 'index'])->name('team-team_promise');
  Route::match(['get', 'post'], '/team/team_promise_month/{month?}/{year?}', [TeamPromise::class, 'teamMonth'])->name('team-team_promise');
  Route::get('/comparison_lead', [TeamPromise::class, 'staffpromiseList']);


// Manage Team
  Route::match(['GET', 'POST'], '/manage_team/sales', [ManageTeam::class, 'sales_team_index'])->name('team-manage-team');
  Route::post('/create_manage_team', [ManageTeam::class, 'create']);
  Route::get('/edit_sales_team/{id}', [ManageTeam::class, 'edit_sales_team']);
  Route::get('/edit_production_team/{id}', [ManageTeam::class, 'edit_production_team']);
  Route::get('/edit_journal_team/{id}', [ManageTeam::class, 'edit_journal_team']);
  Route::get('/get_sales_tl', [ManageTeam::class, 'get_sales_tl']);
  Route::get('/get_production_tl', [ManageTeam::class, 'get_production_tl']);
  Route::get('/get_journal_tl', [ManageTeam::class, 'get_journal_tl']);
  Route::get('/get_sales_team', [ManageTeam::class, 'get_sales_team']);
  Route::get('/get_production_team', [ManageTeam::class, 'get_production_team']);
  Route::get('/get_journal_team', [ManageTeam::class, 'get_journal_team']);
  Route::post('/update_manage_team', [ManageTeam::class, 'Update']);
  Route::match(['GET', 'POST'], '/manage_team/production', [ManageTeam::class, 'production_team_index'])->name('team-manage-team');
  Route::match(['GET', 'POST'], '/manage_team/journal', [ManageTeam::class, 'journal_team_index'])->name('team-manage-team');


  // Manage Products 
Route::match(['get', 'post'], '/manage_product', [ManageProducts::class, 'index'])->name('Product-management-manage-products');
  Route::get('/product_by_category', [ManageProducts::class, 'Product_by_category'])->name('product_by_category');
  Route::get('/product_view/{id}', [ManageProducts::class, 'View']);
  Route::post('/product_status/{id}', [ManageProducts::class, 'Status']);
  Route::post('/product_status_variable/{id}', [ManageProducts::class, 'Status_variable']);
  Route::delete('/product_delete/{id}', [ManageProducts::class, 'Delete']);
  Route::delete('/product_variant_delete/{id}', [ManageProducts::class, 'Variant_Delete']); 
  Route::delete('/product_variable_delete/{id}', [ManageProducts::class, 'Variable_Delete']);
  
  Route::delete('/product_task_delete/{id}', [ManageProducts::class, 'Product_task_Delete']); 
  Route::delete('/product_task_checklist_delete/{id}', [ManageProducts::class, 'Product_task_checklist_Delete']); 
  
  Route::post('/add_product', [ManageProducts::class, 'Add'])->name('add_product');
  Route::get('/product_edit/{id}', [ManageProducts::class, 'Edit']);
  Route::post('/product_update', [ManageProducts::class, 'Update'])->name('product_update');
  Route::get('/update_product_variant', [ManageProducts::class, 'update_product_variant'])->name('Product-management-manage-products');
  Route::post('/add_variant_product', [ManageProducts::class, 'AddVariant'])->name('add_variant_product');
  Route::post('/upadte_variant_product', [ManageProducts::class, 'UpdateVariant'])->name('upadte_variant_product');
  Route::get('/get_product_variant_data', [ManageProducts::class, 'Product_variant_data'])->name('get_product_variant_data');
  
  Route::post('/add_product_tasks', [ManageProducts::class, 'addProductTask'])->name('add_product_tasks');
  Route::get('/get_product_tasks/{id}', [ManageProducts::class, 'getProductTasks']);
  
   Route::match(['get', 'post'], '/manage_product_task', [ManageProductTasks::class, 'index'])->name('Product-management-manage-task_mapping');
  Route::post('/Add_product_task_mapping', [ManageProductTasks::class, 'Add_product_task_mapping'])->name('Add_product_task_mapping');
  Route::get('/edit_product_task_map', [ManageProductTasks::class, 'Edit'])->name('edit_product_task_map');
  Route::post('/Update_product_task_mapping', [ManageProductTasks::class, 'Update_product_task_mapping'])->name('Update_product_task_mapping');
   Route::get('/get_product_variant_data_task', [ManageProductTasks::class, 'get_product_variant_data_task'])->name('get_product_variant_data_task');
  Route::get('/get_product_variable_data_task', [ManageProductTasks::class, 'get_product_variable_data_task'])->name('get_product_variable_data_task');
  // Manage package 
  Route::match(['get', 'post'], '/manage_package', [ManagePackages::class, 'index'])->name('Product-management-manage-package');
  Route::post('/package/product_add', [ManagePackages::class, 'package_product_add'])->name('package/product_add');
  Route::post('/package/product_edit', [ManagePackages::class, 'package_product_edit'])->name('package/product_edit');
  Route::get('/product_list_package/{id}', [ManagePackages::class, 'product_list_package'])->name('product_list_package');
  Route::get('/product_list_package_edit/{id}', [ManagePackages::class, 'product_list_package_edit'])->name('product_list_package_edit');
  Route::get('/product_list_package_delete/{id}', [ManagePackages::class, 'product_list_package_delete'])->name('product_list_package_delete');
  Route::get('/product_list_package_edit_delete/{id}', [ManagePackages::class, 'product_list_package_edit_delete'])->name('product_list_package_edit_delete');
  Route::get('/manage_package/package_add', [ManagePackages::class, 'package_add'])->name('Product-management-manage-package');
  Route::get('/manage_package/package_edit/{id}', [ManagePackages::class, 'package_edit'])->name('Product-management-manage-package');
  Route::post('/add_package', [ManagePackages::class, 'Add'])->name('add_package');
  Route::post('/update_package', [ManagePackages::class, 'Update'])->name('update_package');
  Route::get('/package_view/{id}', [ManagePackages::class, 'View']);
  Route::post('/package_status/{id}', [ManagePackages::class, 'Status']);
  Route::delete('/package_delete/{id}', [ManagePackages::class, 'Delete']);
   Route::post('/check_duplicate_package', [ManagePackages::class, 'checkDuplicatePackages']);


  // Manage facility
  Route::match(['get', 'post'], '/product/facility', [Manage_facility::class, 'index'])->name('Product-manage-facility');
  Route::post('/facility_status/{id}', [Manage_facility::class, 'Status']);
  Route::post('/add_facility', [Manage_facility::class, 'Add'])->name('add_facility');
  Route::get('/facility_edit/{id}', [Manage_facility::class, 'Edit']);
  Route::post('/facility_update', [Manage_facility::class, 'Update'])->name('facility_update');
  Route::delete('/facility_delete/{id}', [Manage_facility::class, 'Delete']);
   Route::post('/check_duplicate_facility', [Manage_facility::class, 'checkDuplicatesFacility']);

   //Manage Addon
  Route::match(['get', 'post'], '/product/manage_add_on', [Manage_addon::class, 'index'])->name('Product-manage-add-on');
  Route::post('/addon_status/{id}', [Manage_addon::class, 'Status']);
  Route::delete('/addon_delete/{id}', [Manage_addon::class, 'Delete']);
  Route::post('/addon_add', [Manage_addon::class, 'Create'])->name('addon_add');
  Route::get('/addon_edit/{id}', [Manage_addon::class, 'Edit']);
  Route::post('/addon_update', [Manage_addon::class, 'Update'])->name('addon_update');
  Route::get('/addon_variant_variables', [Manage_addon::class, 'addon_variant_variable']);
  Route::get('/update_min_max/{id}', [Manage_addon::class, 'update_min_max']);
  
  // Price Book
  Route::match(['get', 'post'], '/manage_price_book', [PriceBook::class, 'index'])->name('Product-manage-price-book');
  Route::get('/currency_accordion', [PriceBook::class, 'currency_accordion']);
  Route::get('/product_data_fetch', [PriceBook::class, 'product_data_fetch']);
  Route::get('/price_book_edit/{id}', [PriceBook::class, 'Edit']);
  Route::get('/view_price_book/{id}', [PriceBook::class, 'View']);
  Route::post('/save_price_book', [PriceBook::class, 'store'])->name('save_price_book');
  Route::post('/update_price_book', [PriceBook::class, 'Update'])->name('update_price_book');
  Route::get('/product_variant_data_fetch/{id}', [PriceBook::class, 'product_variant_data_fetch'])->name('product_variant_data_fetch');
  
  // Price Book Package
  Route::match(['get', 'post'], '/manage_price_book/package', [PriceBook::class, 'package_index'])->name('Product-manage-price-book');
  Route::get('/package_data_fetch', [PriceBook::class, 'package_data_fetch']);
  Route::get('/package_product_data_fetch/{id}', [PriceBook::class, 'package_product_data_fetch']);
  Route::post('/add_package_price_book', [PriceBook::class, 'add_package_price_book'])->name('add_package_price_book');
  Route::get('/package_edit/{id}', [PriceBook::class, 'package_edit']);
  Route::post('/package_update', [PriceBook::class, 'package_update'])->name('package_update');
  Route::get('/package_prize_book_view/{id}', [PriceBook::class, 'package_view']);
  
//   Price Book Add On
  Route::match(['get', 'post'], '/manage_price_book/add_on', [PriceBook::class, 'addon_index'])->name('Product-manage-price-book');
  Route::get('/add_on_data_fetch', [PriceBook::class, 'add_on_data_fetch']);
  Route::get('/addon_variant_data_fetch/{id}', [PriceBook::class, 'addon_variant_data_fetch']);
  Route::post('/save_addon_price_book', [PriceBook::class, 'save_addon_price_book'])->name('save_addon_price_book');
  Route::get('/addon_edit_data/{id}', [PriceBook::class, 'addon_edit_data']);
  Route::get('/addon_view_data/{id}', [PriceBook::class, 'addon_view_data']);
  Route::post('/update_addon_price_book', [PriceBook::class, 'update_addon_price_book'])->name('update_addon_price_book');

  Route::get('/get_variable', [ProductVariable::class, 'Get_list'])->name('get_variable');
  Route::get('/get_variable_by_id', [ProductVariable::class, 'Get_list_by_id'])->name('get_variable_by_id');
  Route::get('/product_by_category', [ManageProducts::class, 'Product_by_category'])->name('product_by_category');

  // manageintern
  Route::match(['get', 'post'], '/manage_intern', [ManageIntern::class, 'Index'])->name('intern-management-manage-intern');
  Route::match(['get', 'post'], '/manage_intern_lead', [ManageIntern::class, 'Index_lead'])->name('intern-management-manage-intern-lead');
  Route::post('create_intern_lead', [ManageIntern::class, 'Add_lead'])->name('create_intern_lead');
  Route::post('/convert_intern_lead', [ManageIntern::class, 'LeadIntern'])->name('convert_intern_lead');
  Route::get('/lead_add_intern_lead/{id}', [ManageIntern::class, 'lead_add_intern'])->name('lead_add_intern_lead');

  Route::get('add_intern', [ManageIntern::class, 'Add'])->name('intern_intern');
  Route::get('intern_certificate/{id}', [ManageIntern::class, 'viewCertificate'])->name('intern_certificate');
  Route::get('intern_certificate_confirm/{id}', [ManageIntern::class, 'viewCertificate_confirm'])->name('intern_certificate_confirm');
  Route::get('intern_certificate_employee/{id}', [ManageIntern::class, 'viewCertificateEmployee'])->name('intern_certificate_employee');
  Route::post('/generate-certificate', [ManageIntern::class, 'generate']);
  Route::post('/update-intern', [ManageIntern::class, 'update'])->name('update_intern');
  Route::post('/intern/view', [ManageIntern::class, 'View'])->name('intern_view');
  Route::post('/intern/view/invoice', [ManageIntern::class, 'ViewInvoice'])->name('intern_view_invoice');
  Route::post('/payment_update/{id}', [ManageIntern::class, 'Payment'])->name('Payment');
  Route::get('/customer/manage_intern/intern_print/{id}/{print_id}/{sno}', [ManageIntern::class, 'intern_invoice'])->name('intern-invoice');
  Route::get('staff_list', [ManageIntern::class, 'StaffListIntern'])->name('staff_list');
  Route::post('create_intern', [ManageIntern::class, 'CreateIntern'])->name('create_intern');
  Route::post('/convert_intern', [ManageIntern::class, 'CustomerIntern'])->name('convert_intern');
  Route::get('/lead_add_intern/{id}', [ManageIntern::class, 'lead_add'])->name('lead_add_intern');
  Route::get('/intern-date', [ManageIntern::class, 'intern_summary']);
  Route::get('/intern/preview/{id}', [ManageIntern::class, 'previewCertificate']);
  Route::get('/intern/preview_confirm/{id}', [ManageIntern::class, 'previewCertificate_confirm']);
  Route::get('/intern/preview/staff/{id}', [ManageIntern::class, 'previewCertificateEmployee']);
  Route::post('/certificate/update-status', [ManageIntern::class, 'updateStatus'])->name('update_certificate_status');
  Route::get('/payment_mode', [ManageIntern::class, 'payment_mode_List'])->name('payment_mode');
  Route::post('ids/encrypt', [ManageIntern::class, 'encrypt_ids'])->name('ids/encrypt');

  // Manage Work Order
//  Route::match(['get', 'post'], '/manage_service', [ManageWorkOrder::class, 'index'])->name('service-management-manage-service');
  Route::get('/get_manage_service', [ManageWorkOrder::class, 'get_manage_service']);
  Route::get('/get_first_call/{id}', [ManageWorkOrder::class, 'get_first_call']);
  Route::get('/get_workorder_checklist', [ManageWorkOrder::class, 'get_workorder_checklist']);
  Route::post('/submit_first_call', [ManageWorkOrder::class, 'submit_first_call']);
  Route::post('/submit_permanent_close', [ManageWorkOrder::class, 'submit_permanent_close']);
  Route::get('/get_allocate_pc', [ManageWorkOrder::class, 'get_allocate_pc']);
  Route::get('/get_service_data_dropdown/{id}', [ManageWorkOrder::class, 'get_service_data_dropdown']);
  Route::get('/get_journal_indexings', [ManageWorkOrder::class, 'get_journal_indexings']);
  Route::post('/add_assign_staff_work_order', [ManageWorkOrder::class, 'add_assign_staff']);
  Route::get('/work_order_view/{id}', [ManageWorkOrder::class, 'View']);
  Route::get('/get_proposal_pay_slot/{id}', [ManageWorkOrder::class, 'get_pay_slot']);
  Route::get('/assign_dates/{id}', [ManageWorkOrder::class, 'assign_dates']);
  Route::post('/save_date_tool/{id}', [ManageWorkOrder::class, 'saveDateTool']);
  Route::get('/milestone_mapping_data_fetch/{id}', [ManageWorkOrder::class, 'milestone_mapping_data_fetch']);
  Route::get('/get_milestone_data/{id}', [ManageWorkOrder::class, 'get_milestone_data']);
  Route::get('/get_milestone_service_data/{id}', [ManageWorkOrder::class, 'get_milestone_service_data']);
  Route::get('/get_milestone_product/{id}', [ManageWorkOrder::class, 'get_milestone_product']);
  Route::post('/add_multiple_milestone_mapping', [ManageWorkOrder::class, 'add_multiple_milestone_mapping']);
  Route::post('/add_milestone_mapping', [ManageWorkOrder::class, 'add_milestone_mapping']);
   Route::get('/get_task_category/{id}', [ManageWorkOrder::class, 'getTaskCategory']);
   
   Route::get('/allocate_project_coordinator/{id}', [ManageWorkOrder::class, 'allocate_project_coordinator'])->name('service-management-manage-service');
  Route::get('/schedule_dates/{id}', [ManageWorkOrder::class, 'schedule_dates'])->name('service-management-manage-service');
  Route::get('/milestone_mapping/{id}', [ManageWorkOrder::class, 'milestone_mapping'])->name('service-management-manage-service');
    Route::get('/get_milestone_current_usage/{milestone_id}', [ManageWorkOrder::class, 'get_milestone_current_usage']);
  
   // Service Management
  Route::match(['get', 'post'], '/manage_service', [ManageWorkOrder::class, 'index'])->name('service-management-manage-service');
  Route::post('/service/status_change', [ManageService::class, 'status_change'])->name('service/status_change');
  Route::post('/service/add_task', [ManageService::class, 'Add_task'])->name('service/add_task');
  Route::match(['get', 'post'], '/service_view_requirements/{id}', [ManageService::class, 'View'])->name('production-management-manage-work-order');
  Route::get('/requirements_details_customer/{id}', [ManageRequirements::class, 'RequirementDetails_customer']);
  Route::match(['get', 'post'], '/service_view_appointments/{id}', [ManageService::class, 'service_view_appointments'])->name('production-management-manage-work-order');
  Route::match(['get', 'post'], '/service_view_payments/{id}', [ManageService::class, 'service_view_payments'])->name('production-management-manage-work-order');
  Route::match(['get', 'post'], '/service_view_tasks/{id}', [ManageService::class, 'service_view_tasks'])->name('production-management-manage-work-order');
  Route::match(['get', 'post'], '/service_view_delivarables/{id}', [ManageService::class, 'service_view_delivarables'])->name('production-management-manage-work-order');
   Route::get('/fetch_add_task/{id}/{mile}', [ManageService::class, 'fetch_add_tasks']);
  Route::get('/fetch_add_task_pages_percentage/{id}/{sno}/{mile}', [ManageService::class, 'fetch_add_tasks_pages_percen']);
  Route::get('/fetch_task_check_list/{id}/{val}', [ManageService::class, 'fetch_task_check_list']);
  Route::get('/fetch_task_check_list/{id}', [ManageService::class, 'fetch_task_check_list']);
  Route::get('/get_assign_staff_details/{id}/{mile}', [ManageService::class, 'get_assign_staff_details']);
  Route::post('/update_assign_staff_details', [ManageService::class, 'update_assign_staff_details']);
   Route::get('/Add_task_page/{id}', [ManageService::class, 'Add_task_page'])->name('production-management-manage-work-order');
  Route::get('/ready_to_deliver/{id}/{mile}', [ManageService::class, 'readyToDeliver']);
  Route::post('/submit_verify_completion', [ManageService::class, 'submit_verify_completion']);
  Route::get('/get_correction_staffs/{id}', [ManageService::class, 'getCorrectionStaffs']);
  Route::post('/correction_data_submit', [ManageService::class, 'correctionDataSubmit']);
  Route::post('/submit_rework', [ManageService::class, 'submit_rework']);
   Route::post('drive/create-session', [ManageService::class, 'createSession']);
  Route::post('/upload-chunk', [ManageService::class, 'uploadChunk'])->name('drive.upload.chunk');
  Route::post('/drive/upload-status', [ManageService::class, 'getUploadStatus']);
  Route::post('/drive/finalize-upload', [ManageService::class, 'finalizeUpload']);
  Route::post('/cancel-upload', [ManageService::class, 'cancelUpload']);
  
  
  // Task Calendar
  Route::match(['get', 'post'], '/task_calendar', [TaskCalendar::class, 'index'])->name('production-management-task-calendar');
  Route::get('/task_calendar/daily_tasks', [TaskCalendar::class, 'getDailyTasks']);
  Route::get('/task_calendar/monthly_tasks', [TaskCalendar::class, 'getMonthlyTasks']);
  Route::get('/task_calendar/date_navigation', [TaskCalendar::class, 'getDateNavigation']);
    
  // Service Management 
   Route::match(['get', 'post'], '/manage_work_order', [ManageService::class, 'index'])->name('production-management-manage-work-order');
//     Route::get('/get_journal_coordinator', [ManageService::class, 'get_journal_coordinator']);
//   Route::post('/service/status_change', [ManageService::class, 'status_change'])->name('service/status_change');
//   Route::post('/service/add_task', [ManageService::class, 'Add_task'])->name('service/add_task');
//   Route::match(['get', 'post'], '/service_view_requirements/{id}', [ManageService::class, 'View'])->name('production-management-manage-work-order');
//   Route::get('/requirements_details_customer/{id}', [ManageRequirements::class, 'RequirementDetails_customer']);
//   Route::match(['get', 'post'], '/service_view_appointments/{id}', [ManageService::class, 'service_view_appointments'])->name('production-management-manage-work-order');
//   Route::match(['get', 'post'], '/service_view_payments/{id}', [ManageService::class, 'service_view_payments'])->name('production-management-manage-work-order');
//   Route::match(['get', 'post'], '/service_view_tasks/{id}', [ManageService::class, 'service_view_tasks'])->name('production-management-manage-work-order');
//   Route::match(['get', 'post'], '/service_view_delivarables/{id}', [ManageService::class, 'service_view_delivarables'])->name('production-management-manage-work-order');
//   Route::get('/fetch_add_task/{id}', [ManageService::class, 'fetch_add_tasks']);
//   Route::get('/fetch_add_task_pages_percentage/{id}/{sno}', [ManageService::class, 'fetch_add_tasks_pages_percen']);
//   Route::get('/fetch_task_check_list/{id}/{val}', [ManageService::class, 'fetch_task_check_list']);
//   Route::get('/fetch_task_check_list/{id}', [ManageService::class, 'fetch_task_check_list']);
//   Route::get('/get_assign_staff_details/{id}', [ManageService::class, 'get_assign_staff_details']);
//   Route::post('/update_assign_staff_details', [ManageService::class, 'update_assign_staff_details']);
  
  
  Route::match(['GET', 'POST'], '/manage_milestone', [ManageMilestone::class, 'index'])->name('service-management-manage-milestone');
  Route::get('/get_manage_milestone/{id}', [ManageMilestone::class, 'get_manage_milestone']);
  Route::post('/unlock_pending_milestone', [ManageMilestone::class, 'unlockMilestone']);
  Route::post('/unlock_milestone', [ManageMilestone::class, 'unlock']);
  
  
 Route::get('/weekly_task', [DailyTask::class, 'index'])->name('production-management-weekly-task');
  Route::get('/get_customer_services/{id}', [DailyTask::class, 'get_customer_services']);
  Route::get('/task_data_fetch/{id}/{sno}', [DailyTask::class, 'task_data_fetch']);
  Route::get('/production_staff_data_fetch', [DailyTask::class, 'production_staff_data_fetch']);
  Route::post('/create_daily_task', [DailyTask::class, 'Create'])->name('create_daily_task');
  Route::get('/split_task_data_fetch/{taskId}', [DailyTask::class, 'split_task_data_fetch']);
  Route::get('/get_task_date_progress/{sno}/{date}', [DailyTask::class, 'get_task_date_progress']);
  Route::get('/edit_daily_task/{sno}/{date}', [DailyTask::class, 'edit']);
  Route::delete('/delete_daily_task/{sno}', [DailyTask::class, 'Delete']);

 //Manage Task
  Route::match(['get', 'post'], '/manage_task', [ManageTask::class, 'index'])->name('production-management-manage-task');
  Route::match(['get', 'post'], '/manage_task/task_table', [ManageTask::class, 'index_ajax']);
  Route::get('/task_edit/{id}', [ManageTask::class, 'Edit']);
  Route::post('/manage_task/update_task', [ManageTask::class, 'Update_task'])->name('manage_task/update_task');
  Route::get('/edit_daily_task/{id}', [ManageTask::class, 'edit_daily_task']);
  Route::post('/task/status_change', [ManageTask::class, 'status_change'])->name('task/status_change');
  Route::delete('/task_delete/{id}', [ManageTask::class, 'Delete']);
  Route::get('/status_change_data_fetch/{id}', [ManageTask::class, 'statusChangeDataFetch']);
  
  //Task Request
  Route::match(['GET', 'POST'], '/production/task_request', [TaskRequest::class, 'index'])->name('production-management-task-request');
  Route::get('/get_task_request/{id}', [TaskRequest::class, 'get_task_request']);
  Route::post('/task_request_add/{id}', [TaskRequest::class, 'taskRequestAdd']);
 
// Manage Production
  Route::match(['get', 'post'], '/manage_production', [ManageProduction::class, 'index'])->name('production-management-manage-production');
  Route::get('/manage_production/task_view/{id}', [ManageProduction::class, 'Task_view']);
  Route::get('/manage_production/task_complete/{id}', [ManageProduction::class, 'Task_complete_view']);
  Route::get('/fetch_production_checklist/{id}', [ManageProduction::class, 'fetch_production_checklist']);
  Route::get('/complete_task_data_fetch/{id}', [ManageProduction::class, 'complete_task_data_fetch']);
  Route::get('/journal_task_data_fetch/{id}/{status}', [ManageProduction::class, 'journalTaskDataFetch']);
  Route::post('/upload_production_journals', [ManageProduction::class, 'uploadProductionJournal']);
  Route::post('/manage_production/update_task', [ManageProduction::class, 'Update_task'])->name('manage_production/update_task');
  Route::post('/task-log/start', [ManageProduction::class, 'start']);
  Route::post('/task-log/stop', [ManageProduction::class, 'stop']);
  Route::get('/task-log/running', [ManageProduction::class, 'runningTaskLog']);
  Route::post('/files_upload_production', [ManageProduction::class, 'taskFiles'])->name('files_upload_production');
  Route::post('/delete-uploaded-file', [ManageProduction::class, 'deleteUploadedFile'])->name('delete_uploaded_file');
  Route::post('/update_task_status/{id}', [ManageProduction::class, 'update_task_status']);
  Route::get('/fetch_task_log/{id}/{staffId}', [ManageProduction::class, 'fetch_task_log']);
  Route::get('/rework_details/{id}/{staffId}', [ManageProduction::class, 'rework_details']);
  
 //Manage Deliverables
  Route::match(['get', 'post'], '/manage_deliverables', [ManageDeliverables::class, 'index'])->name('service-management-manage-deliverables');
  Route::get('/Deliverables_view/{id}', [ManageDeliverables::class, 'View']);
  Route::get('/Deliverables_edit/{id}', [ManageDeliverables::class, 'Edit']);
  Route::post('/manage_deliverables/Add', [ManageDeliverables::class, 'Add'])->name('manage_deliverables/Add');
  Route::post('/manage_deliverables/Update', [ManageDeliverables::class, 'Update'])->name('manage_deliverables/Update');
  Route::get('/customer_dropdown_list', [ManageDeliverables::class, 'Customer_list'])->name('customer_dropdown_list');
  Route::get('/customer_service_dropdown_list', [ManageDeliverables::class, 'Customer_service_list'])->name('customer_service_dropdown_list');
  Route::get('/customer_service_based_slot_list', [ManageDeliverables::class, 'Customer_service_based_slot_list'])->name('customer_service_based_slot_list');
 
 
  // Delivery Document Upload Routes
  Route::get('/delivery_documentation_data_fetch/{id}/{mile}', [ManageDeliverables::class, 'delivery_documentation_data_fetch'])
    ->name('delivery.data.fetch');
  Route::post('/delivery/upload', [ManageDeliverables::class, 'upload'])->name('delivery.upload');
  Route::post('/delivery/existing/files', [ManageDeliverables::class, 'existingFiles'])->name('delivery.existing.files');
  Route::post('/delivery/remove', [ManageDeliverables::class, 'remove'])->name('delivery.remove');
  Route::post('/delivery/final/submit', [ManageDeliverables::class, 'finalSubmit'])->name('delivery.final.submit');
 
  Route::get('/delivery_attachment_list', [ManageDeliverables::class, 'deliveryAttachmentList']);
  Route::post('/manage_production/fetch_drop_zone', [ManageDeliverables::class, 'FetchDropZone']);
  Route::post('/manage_production/remove-temp-file', [ManageDeliverables::class, 'remove_temp_file']);
  
  
  // Production Appointment
  Route::match(['get', 'post'], '/production_management/lead_appointment', [ProductionAppointment::class, 'index'])->name('production-management-lead-appointment');
  Route::post('/assign_staff_appointment', [ProductionAppointment::class, 'AssignStaffAppointment'])->name('assign_staff_appointment');

  // Manage Payment 
  Route::match(['get', 'post'], '/manage_payment', [Payment::class, 'index'])->name('payment-management-manage-payment');
  Route::get('/cus_invoice/{id}', [Payment::class, 'cus_invoice'])->name('payment-management-manage-payment');
  Route::get('/cus_payment', [Payment::class, 'cus_payment'])->name('payment-management-manage-payment');
  Route::match(['get', 'post'], '/manage_history', [Payment::class, 'manage_history'])->name('payment-management-manage-history');
  Route::match(['get', 'post'], '/payment_history_status_change', [Payment::class, 'payment_history_status_change'])->name('payment_history_status_change');
  Route::match(['get', 'post'], '/payment_reject_status_change', [Payment::class, 'paymentRejectChange'])->name('payment_reject_status_change');
  
//   transcation History
 Route::match(['get', 'post'],'/payment_history', [Payment::class, 'PaymentHistory'])->name('payment-management-manage-payment');
 Route::match(['get', 'post'],'/low_mpc_payment', [Payment::class, 'PaidUnder'])->name('payment-management-manage-LowMPC');
 Route::get('/get_customer_details/{id}', [Payment::class, 'getCustomerDetails']);
 Route::post('/send_receipt_message', [Payment::class, 'SendReceiptMessage'])->name('send_receipt_message');
//  Route::post('receipt/encrypt', [Payment::class, 'encrypt_ids'])->name('receipt/encrypt');
  Route::post('/transaction_update', [Payment::class, 'TransactionUpdate'])->name('transaction_update');
//  Harvesting
    Route::match(['get', 'post'], '/payment_harvesting/{month?}/{year?}/{day?}', [ManageHarvesting::class, 'Index'])->name('payment-management-manage-harvesting');
// outstanding Payment
    Route::match(['get', 'post'], '/outstanding_payment', [ManageHarvesting::class, 'OutstandingPayment'])->name('payment-management-manage-outstanding');
    Route::post('/proposal_details/', [ManageHarvesting::class, 'proposal_details'])->name('proposal_details');
     Route::post('/payment_reschdule/', [ManageHarvesting::class, 'Payment_reschedule'])->name('payment_reschdule');
 
   

  // Hrm Staff
  Route::match(['get', 'post'], '/hr_management/staff', [Staff::class, 'index'])->name('hr-management-staff');
  Route::get('/manage_staff/staff_add', [Staff::class, 'staff_add'])->name('hr-management-staff');
  Route::get('/manage_staff/staff_edit/{id}', [Staff::class, 'staff_edit'])->name('hr-management-staff');
  Route::get('/staff_view/{id}', [Staff::class, 'staff_view']);
  Route::post('/add_staff', [Staff::class, 'Add'])->name('add_staff');
  Route::post('/update_staff', [Staff::class, 'Update'])->name('update_staff');
  Route::get('/staff_list_by_branch_id/{id}', [Staff::class, 'StaffListByBranch'])->name('staff_list_by_branch_id');
  Route::get('/staff_data_get/{id}', [Staff::class, 'staff_data_get']);
  Route::get('/staff', [Staff::class, 'List'])->name('staff');
  Route::post('/staff_status/{id}', [Staff::class, 'Status']);
  Route::delete('/staff_delete/{id}', [Staff::class, 'Delete']);
  Route::get('/get_branch_access_role', [Staff::class, 'get_branch_access_role'])->name('get_branch_access_role');
  Route::get('/get_per_hour_cost_staff', [Staff::class, 'get_per_hour_cost_staff'])->name('get_per_hour_cost_staff');

  Route::post('/check-staff-mobile-exists', [Staff::class, 'checkStaffMobileExists'])->name('checkStaffMobileExists');
  Route::post('/checkunique_mobile_edit', [Staff::class, 'checkStaffMobileExists_edit'])->name('checkunique_mobile_edit');
  Route::post('/checkunique_user_name', [Staff::class, 'checkunique_user_name'])->name('checkunique_user_name');
  Route::post('/checkunique_user_name_edit', [Staff::class, 'checkunique_user_name_edit'])->name('checkunique_user_name_edit');

 Route::match(['get', 'post'], '/hr_management/staff/Exit_staff_list', [Staff::class, 'Exit_staff_list'])->name('hr-management-staff');
    Route::get('/exit_staff_view/{id}', [Staff::class, 'exit_staff_view']);
  Route::post('/departure_staff', [Staff::class, 'Departure_staff'])->name('Departure_staff');
  Route::get('/staff_list_lead_balance', [Staff::class, 'StaffFetchLeadBalance']);
  Route::post('/convert_bulk_transfer_staff_list', [Staff::class, 'BulkTransferExitStaff'])->name('convert_bulk_transfer_staff_list');
  
  
   Route::get('/edit_notice_date/{id}', [Staff::class, 'edit_notice_date']);
  Route::post('/reschedule_notice_period', [Staff::class, 'reschedule_notice_period'])->name('reschedule_notice_period');

    
  // Badge Board
 // Badge Board
  Route::get('/badge_board', [BadgeBoard::class, 'index'])->name('leaderboard');
  Route::post('toggle_pin', [BadgeBoard::class, 'toggle_pin'])->name('toggle_pin');
  Route::get('/exam_badge_data_fetch', [BadgeBoard::class, 'badge_board_data']);
  Route::get('/update_nav_badges', [BadgeBoard::class, 'update_nav_badges']);
  Route::get('/get_nav_points', [BadgeBoard::class, 'get_nav_points']);

// Manage Events
    Route::match(['get', 'post'],'/events', [Events::class, 'index'])->name('marketing-events');
    Route::get('/events/event_add', [Events::class, 'event_add'])->name('marketing-events');
    Route::get('/events/event_edit/{id}', [Events::class, 'event_edit'])->name('marketing-events');
    Route::get('/events/event_view', [Events::class, 'View_event'])->name('marketing-events');
    Route::post('/Placement_event_add', [Events::class, 'Add'])->name('Placement_event_add');
    Route::post('/Placement_event_update', [Events::class, 'Update'])->name('Placement_event_update');
    Route::post('/event_status/{id}', [Events::class, 'Status']);
    Route::post('/active_event/{id}', [Events::class, 'ActiveEvent']);
    Route::delete('/event-delete/{id}', [Events::class, 'Delete']);
    Route::get('/events/event-excel', [Events::class, 'EventExportExcel']);
    Route::post('/event_list_filter', [Events::class, 'list_filter'])->name('event_list_filter');
    Route::post('/event_drop', [Events::class, 'DropEvent'])->name('event_drop');
    
    Route::post('/send_event_certificate', [Events::class, 'sendEventCertificate'])->name('send_event_certificate');
    
    Route::post('/update_attendance', [Events::class, 'updateAttendance']);
    Route::post('add_event_Participant', [Events::class, 'AddEventParticipant'])->name('add_event_Participant');
    Route::get('view_event/{id}', [Events::class, 'View']);
    Route::get('view_event_updated/{id}', [Events::class, 'ViewUpdated']);
    Route::post('/event_status_update/{id}', [Events::class, 'eventStatusChange']);
    Route::get('/branch_all_staff', [Events::class, 'AllBranchStaffList'])->name('branch_all_staff');
    Route::get('/event/event_certificate_print/{id}',[Events::class, 'EventCertificate']);
    Route::match(['get', 'post'], '/qr_event_scanners', [Events::class, 'Scanner_view'])->name('qr.scanner.event');
    Route::match(['get', 'post'], '/qr.scanner.event.map', [Events::class, 'MultiMap'])->name('qr.scanner.event.map');
    Route::get('/gen_event_qr/{id}/generate-qr', [Events::class, 'generateQrEvent']);
    
      Route::post('add_poster_template', [Events::class, 'AddPosterTemplate'])->name('add_poster_template');
      Route::get('/poster_list_by_type', [Events::class, 'PosterListByType'])->name('poster_list_by_type');
      Route::get('/get_poster_preview', [Events::class, 'get_poster_data'])->name('get_poster_preview');
  
        // Event Category
  Route::get('/settings/placements/event_category', [EventCategory::class, 'index'])->name('settings-events');
  Route::get('/event_category', [EventCategory::class, 'List'])->name('event_category');
  Route::post('/add_event_category', [EventCategory::class, 'Add'])->name('add_event_category');
  Route::get('/event_category_edit/{id}', [EventCategory::class, 'Edit'])->name('event_category_edit');
  Route::post('/event_category_update', [EventCategory::class, 'Update'])->name('event_category_update');
  Route::delete('/event_category_delete/{id}', [EventCategory::class, 'Delete']);
  Route::post('/event_category_status/{id}', [EventCategory::class, 'Status']);

    // Event Type
  Route::get('/settings/placements/event_type', [EventType::class, 'index'])->name('settings-events');
  Route::get('/event_type', [EventType::class, 'List'])->name('event_type');
  Route::post('/add_event_type', [EventType::class, 'Add'])->name('add_event_type');
  Route::get('/event_type_edit/{id}', [EventType::class, 'Edit'])->name('event_type_edit');
  Route::post('/event_type_update', [EventType::class, 'Update'])->name('event_type_update');
  Route::delete('/event_type_delete/{id}', [EventType::class, 'Delete']);
  Route::post('/event_type_status/{id}', [EventType::class, 'Status']);


  // staff Attendance
  Route::match(['get', 'post'], '/hr_management/staff_attendance', [StaffAttendance::class, 'index'])->name('hr-management-staff-attendance');
  Route::get('/attendance/yearly', [StaffAttendance::class, 'getYearlyAttendance'])->name('attendance.yearly');
  Route::post('/ViewAttendanceDate', [StaffAttendance::class, 'ViewAttendanceDate'])->name('ViewAttendanceDate');
  Route::post('/fetchStaffMonthlyAttendance', [StaffAttendance::class, 'fetchStaffMonthlyAttendance'])->name('fetchStaffMonthlyAttendance');
  Route::post('/fetchIndividualStaffAttendance', [StaffAttendance::class, 'fetchIndividualStaffAttendance'])->name('fetchIndividualStaffAttendance');
  Route::get('/staff_att', [StaffAttendance::class, 'getStaff'])->name('staff_att');
  Route::post('/staff_attendance', [StaffAttendance::class, 'Add'])->name('staff_attendance');
  Route::get('/attendance_view/{id}', [StaffAttendance::class, 'viewAttendance'])->name('attendance_view');


  Route::get('/hr_management/job_request', [JobRequest::class, 'index'])->name('hr-management-job-request');
  Route::post('/add_job_request', [JobRequest::class, 'Add'])->name('add_job_request');
  Route::get('/job_request_edit/{id}', [JobRequest::class, 'Edit'])->name('job_request_edit');
  Route::post('/update_job_request', [JobRequest::class, 'Update'])->name('update_job_request');
  Route::get('/job_request_list', [JobRequest::class, 'List'])->name('job_request_list');
  Route::post('/job_request_status/{id}', [JobRequest::class, 'Status']);
  Route::delete('/job_request_delete/{id}', [JobRequest::class, 'Delete']);
  Route::post('generate-job-description', [JobRequest::class, 'generateJobDescription'])->name('generate-job-description');
   Route::get('/job_skill_tag', [JobRequest::class, 'SkillTagList'])->name('job_skill_tag');
  
  
  Route::get('/manage_lead/lead_worklist', [ManageLead::class, 'worklist_add'])->name('lead-management-manage-lead');
  Route::get('/manage_lead/lead_worklist_complete', [ManageLead::class, 'worklist_add_complete'])->name('lead-management-manage-lead');
  Route::get('/manage_lead/quotation_list', [ManageLead::class, 'quotation_list'])->name('lead-management-manage-lead');
 
  
  //  Manage Invoice
  Route::match(['get', 'post'], '/manage_invoice', [ManageInvoice::class, 'index'])->name('customer-management-manage-invoice');
  Route::post('/nda_message', [ManageInvoice::class, 'SendNDAMessage'])->name('nda_message');
  Route::get('/manage_invoice/invoice_print/{id}', [ManageInvoice::class, 'manage_invoice_print'])->name('customer-management-manage-invoice');



  Route::get('/manage_invoice/invoice_add', [ManageInvoice::class, 'manage_invoice_add'])->name('customer-management-manage-invoice');
  Route::get('/manage_invoice/quote_to_invoice', [ManageInvoice::class, 'quote_to_invoice'])->name('customer-management-manage-invoice');
  Route::get('/manage_invoice/balance_amount_invoice', [ManageInvoice::class, 'balance_amount_invoice'])->name('customer-management-manage-invoice');
  Route::get('/manage_invoice/invoice_add_payment', [ManageInvoice::class, 'manage_invoice_payment_add'])->name('customer-management-manage-invoice');
  Route::get('/manage_invoice/invoice_edit', [ManageInvoice::class, 'manage_invoice_edit'])->name('customer-management-manage-invoice');
  Route::get('/manage_invoice/invoice_view', [ManageInvoice::class, 'manage_invoice_view'])->name('customer-management-manage-invoice');

  Route::get('/manage_nda', [ManageNDA::class, 'index'])->name('customer-management-manage-nda');
  Route::get('/manage_nda/nda_add', [ManageNDA::class, 'nda_add'])->name('customer-management-manage-nda');
  Route::get('/manage_nda_view/{id}', [ManageNDA::class, 'ndaView'])->name('customer-management-manage-nda');


  Route::match(['get', 'post'], '/manage_customer', [ManageCustomer::class, 'index'])->name('customer-management-manage-customer');
  Route::get('/proposal_by_id', [ManageCustomer::class, 'Proposaldata'])->name('proposal_by_id');
  Route::get('/manage_customer/customer_add_service', [ManageCustomer::class, 'customer_add_serviceui'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/customer_add', [ManageCustomer::class, 'customer_add'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/customer_view/{id}', [ManageCustomer::class, 'customer_view'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/customer_view_new/{id}', [ManageCustomer::class, 'customer_view_new'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/customer_edit', [ManageCustomer::class, 'customer_edit'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/payment', [ManageCustomer::class, 'payment'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/customer_quotation', [ManageCustomer::class, 'customer_quotation'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/customer_invoice/{id}', [ManageCustomer::class, 'customer_invoice'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/payment', [ManageCustomer::class, 'payment'])->name('customer-management-manage-customer');
  Route::get('/manage_customer/customer_invoice_add', [ManageCustomer::class, 'customer_invoice_add'])->name('customer-management-manage-customer');
  Route::get('/payment_slot_invoice', [ManageCustomer::class, 'PaymentSlotByProposalId'])->name('payment_slot_invoice');
  Route::get('/fetch_journal_index', [ManageCustomer::class, 'fetch_journal_index']);

  Route::post('/manage_customer/update_customer', [ManageCustomer::class, 'Update'])->name('customer-management-update-customer');
  Route::get('/customer_credentials/{id}', [ManageCustomer::class, 'CustomerCredentials']);
  Route::post('/add_customer_credentials', [ManageCustomer::class, 'AddCredentials'])->name('add_customer_credentials');
  Route::match(['get', 'post'], '/not_started_customer', [ManageCustomer::class, 'NotStartedCustomerList'])->name('customer-management-not-started');
  Route::match(['get', 'post'], '/post_sale_customer', [ManageCustomer::class, 'PostSaleCustomerList'])->name('customer-management-post-sale');
  Route::get('/edit_manage_customer/{id}', [ManageCustomer::class, 'Edit']);
  
  Route::get('/fetch_journal_customer/{id}', [ManageCustomer::class, 'fetch_journal_customer']);
  Route::get('/fetch_customer_journal_service/{id}', [ManageCustomer::class, 'fetch_customer_journal_service']);
  Route::post('/temp_customer_journal_attachments', [ManageCustomer::class, 'temp_customer_journal_attachments']);
  Route::post('/create_customer_journal', [ManageCustomer::class, 'create_customer_journal']);

  Route::get('/customer_cre_proposal_details/{id}',[ManageCustomer::class, 'getCustomerCreDetails']);

Route::post('/change-customer-cre',[ManageCustomer::class, 'changeCustomerCre'])->name('change_customer_cre');
  
  // Manage Issue
  Route::get('/customer_management/manage_issue', [ManageIssue::class, 'index'])->name('customer-management-manage-issue');
  Route::post('/create_manage_issue', [ManageIssue::class, 'Create'])->name('create_manage_issue');
  Route::post('/complete_issue', [ManageIssue::class, 'complete_issue'])->name('complete_issue');
  Route::get('/view_issue/{id}', [ManageIssue::class, 'View']);
  
   //   customer Add New Proposal
     Route::get('/add_new_services/{id}', [ManageCustomer::class, 'customer_add_service'])->name('customer-management-manage-customer');
       Route::post('/create_proposal_addnew', [ManageCustomer::class, 'GenerateProposalCustomer'])->name('create_proposal_addnew');
        Route::match(['get', 'post'], '/customer_management/manage_proposal', [ManageCustomer::class, 'CustomerProposal'])->name('customer-management-manage-proposal');
        Route::get('/customer_management/print_proposal/{id}', [ManageCustomer::class, 'PrintProposal'])->name('customer-management-manage-proposal');
  Route::get('/customer_management/create_invoice/{id}', [ManageCustomer::class, 'CreateInvoice'])->name('customer-management-manage-proposal');
   Route::get('/customer_management/proposal_view/{id}', [ManageCustomer::class, 'manage_proposal_view'])->name('customer-management-manage-proposal');
   
     Route::get('/customer_management/proposal_revise/{id}', [ManageCustomer::class, 'manage_proposal_revise'])->name('lead-management-manage-proposal');
    Route::post('/customer_revise_proposal', [ManageCustomer::class, 'ProposalRevised'])->name('customer_revise_proposal');
   Route::get('/paymentSlotDetailsRevisedCustomer/{id}', [ManageCustomer::class, 'paymentSlotDetailsRevised'])->name('paymentSlotDetailsRevisedCustomer');
   Route::get('/product_list_proposal_revised_customer/{id}', [ManageCustomer::class, 'product_list_proposal_revised'])->name('product_list_proposal_revised_customer');
   Route::get('/product_cart_List_revised_customer', [ManageCustomer::class, 'product_cart_List_revised'])->name('product_cart_List_revised_customer');
   Route::post('/proposal/product_add_revised_customer', [ManageCustomer::class, 'proposal_product_add_revised'])->name('proposal/product_add_revised_customer');
    Route::post('/add_proposal_payment_slot_revised_customer', [ManageCustomer::class, 'AddPaymentSlotRevised'])->name('add_proposal_payment_slot_revised_customer');
    Route::post('/update_Proposal_revise_customer', [ManageCustomer::class, 'updateProposalRevised']);
    
   Route::get('/customer_proposal/reject_proposal/{id}', [ManageCustomer::class, 'RejectProposal'])->name('customer-management-manage-proposal');
   Route::post('/customer_proposal_reject', [ManageCustomer::class, 'ConfirmRejectProposal'])->name('proposal_reject');
   Route::get('/get_journal_team_lead', [ManageCustomer::class, 'get_journal_team_lead']);

 
  // Manage Customer Chat
  Route::match(['get', 'post'], '/manage_chat_customer', [ManageChatCustomer::class, 'index'])->name('customer-management-manage-chat');
  Route::match(['get', 'post'], '/customer.chat.list', [ManageChatCustomer::class, 'CustomerChatList'])->name('customer.chat.list');
  Route::get('/customer/chat', [ManageChatCustomer::class, 'index'])->name('customer.chat');
  Route::get('/customer/chat/list', [ManageChatCustomer::class, 'CustomerChatList'])->name('customer.chat.list');
  Route::post('/customer/chat/services', [ManageChatCustomer::class, 'ChatServicesList'])->name('customer.chat.services');
  Route::post('/customer/chat/history', [ManageChatCustomer::class, 'ChatHistory'])->name('customer.chat.history');
  Route::post('/customer/chat/send', [ManageChatCustomer::class, 'SendMessage'])->name('customer.chat.send');
  
  // Manage Review
  Route::get('/customer_management/manage_review', [ManageReview::class, 'index'])->name('customer-management-manage-review');
  Route::post('/create_manage_review', [ManageReview::class, 'Create'])->name('create_manage_review');
  Route::get('/edit_review/{id}', [ManageReview::class, 'Edit']);
  Route::post('/update_manage_review', [ManageReview::class, 'Update'])->name('update_manage_review');
  
  // Ticket Management Routes
    Route::prefix('manage_customer_ticket')->group(function () {
        Route::get('/', [ManageTicketCustomer::class, 'index'])->name('manage_customer_ticket');
        Route::post('/', [ManageTicketCustomer::class, 'index']);
    });
 
    Route::prefix('customer-management')->group(function () {
        Route::get('/ticket_details/{id}', [ManageTicketCustomer::class, 'ticket_details']);
        Route::post('/update_ticket/{id}', [ManageTicketCustomer::class, 'updateticket']);
        Route::get('/ticket-history/{id}', [ManageTicketCustomer::class, 'getTicketHistory']);
        Route::post('/upload-ticket-attachment', [ManageTicketCustomer::class, 'uploadTicketAttachment'])->name('upload.ticket.attachment');
        Route::get('/get-staff-list', [ManageTicketCustomer::class, 'getStaffList'])->name('get_staff_list');
        Route::post('/update-assign-staff-ticket', [ManageTicketCustomer::class, 'updateAssignStaff'])->name('update_assign_staff_ticket');
    });
  
  // Drop List
  Route::match(['get', 'post'],'/manage_customer_drop', [ManageCustomerDrop::class, 'Index'])->name('customer-management-manage-drop');
  Route::post('customer_drop_status_change', [ManageCustomerDrop::class, 'customer_drop_status_change'])->name('customer_drop_status_change');
  Route::get('/customer/drop_customer/{id}', [ManageCustomerDrop::class, 'drop_customer_page'])->name('customer-management-manage-customer');
  Route::post('customer_drop', [ManageCustomerDrop::class, 'customer_drop'])->name('customer_drop');
  Route::post('/customer/drop/submit', [ManageCustomerDrop::class, 'submitDropRequest'])->name('customer.drop.submit');
  // Refund List
  Route::match(['get', 'post'],'/manage_customer_refund', [ManageCustomerRefund::class, 'Index'])->name('customer-management-manage-refund');
  Route::match(['get', 'post'], '/manage_customer_refund_filter', [ManageCustomerRefund::class, 'list_filter'])->name('manage_customer_refund_filter');
  Route::post('customer_refund_status_change', [ManageCustomerRefund::class, 'customer_refund_bh_status_change'])->name('customer_refund_status_change');
  Route::post('customer_refund_ac_status_change', [ManageCustomerRefund::class, 'customer_refund_ac_status_change'])->name('customer_refund_ac_status_change');
  Route::post('customer_refunded_status_change', [ManageCustomerRefund::class, 'customer_refunded_status_change'])->name('customer_refunded_status_change');

  //Customer Appointment
  Route::match(['get', 'post'], '/customer_management/manage_appointments', [ManageAppointment::class, 'index'])->name('customer-management-manage-appointment');
  Route::match(['get', 'post'], '/customer_management/post_sale_appointments', [ManageAppointment::class, 'post_sale_appointment'])->name('customer-management-manage-appointment');
  Route::get('/connecting_way_fetch/{id}', [ManageAppointment::class, 'ConnectingURL']);
  Route::post('/edit_connecting_way_fetch/{id}', [ManageAppointment::class, 'editConnectingURL']);
  Route::post('/create_customer_appointments', [ManageAppointment::class, 'Create'])->name('create_customer_appointments');
  Route::post('/create_post_customer_appointments', [ManageAppointment::class, 'CreatePost'])->name('create_post_customer_appointments');
  Route::get('/view_manage_appointments/{id}', [ManageAppointment::class, 'view']);
  Route::get('/edit_manage_appointments/{id}', [ManageAppointment::class, 'edit']);
  Route::post('/update_manage_appointments', [ManageAppointment::class, 'Update'])->name('update_manage_appointments');
  Route::post('/getAppointmentDetails/{id}', [ManageAppointment::class, 'getAppointmentDetails']);
  Route::post('/cancel_appointment/{id}', [ManageAppointment::class, 'cancellAppointment']);
  Route::post('/reschedule_appointment/{id}', [ManageAppointment::class, 'rescheduleAppointment']);
  Route::post('/complete_appointments', [ManageAppointment::class, 'completeAppointment'])->name('complete_appointments');
  Route::post('/upload_files', [ManageAppointment::class, 'uploadFiles'])->name('upload_files');
  Route::get('/cre_customer', [ManageAppointment::class, 'cre_customer']);
  Route::get('/pc_data_get', [ManageAppointment::class, 'pc_list']);
  Route::get('/fetch_appointment_mode', [ManageAppointment::class, 'fetchAppointmentMode']);
  Route::get('/fetch_connecting_way', [ManageAppointment::class, 'fetchConnectingWay']);
  Route::get('/fetch_assign_staff', [ManageAppointment::class, 'fetchAssignStaff']);
  
  
  Route::match(['get', 'post'], '/production_management/manage_appointments', [ProductionCustomerApp::class, 'index'])->name('production-management-customer-appointment');
  Route::match(['get', 'post'], '/production_management/post_sale_appointments', [ProductionCustomerApp::class, 'post_sale_appointment'])->name('production-management-customer-appointment');

  
  // Production -> Customer Appointment
  Route::match(['get', 'post'], '/production_management/customer_appointments', [ManageAppointment::class, 'production_customer_appointment'])->name('production-management-customer-appointment');
  Route::post('/pc_staff_assign', [ManageAppointment::class, 'pc_staff_assign'])->name('pc_staff_assign');


  Route::get('/hr_management/staff/staff_manage_batch', [Staff::class, 'staff_manage_batch'])->name('hr-management-staff');
  Route::get('/hr_management/staff/staff_manage_batch/feedback', [Staff::class, 'staff_manage_batch_feedback'])->name('hr_management-staff-manage-batch-feedback');

      Route::get('/users/user_role_task', [UserRoleTask::class, 'index'])->name('users-role-task');
      Route::get('/user_role_task', [UserRoleTask::class, 'List'])->name('user_role');
      Route::post('/add_user_role_atsk', [UserRoleTask::class, 'Add'])->name('add_user_role');
      Route::get('/user_role_edit_task/{id}', [UserRoleTask::class, 'Edit']);
      Route::post('/user_role_update_task/{id}', [UserRoleTask::class, 'Update']);
      Route::delete('/user_role_delete_task/{id}', [UserRoleTask::class, 'Delete']);
      Route::post('/user_role_status_task/{id}', [UserRoleTask::class, 'Status']);
      Route::get('/role/export-excel_task', [UserRoleTask::class, 'ExportExcel']);
      Route::get('/user_role/task_edit', [UserRoleTask::class, 'edit_task'])->name('users-role-task');
      Route::post('/tasks/update_all', [UserRoleTask::class, 'updateTasks']);
      Route::post('/task/import/json', [UserRoleTask::class, 'importJson'])->name('task.import.json');
      Route::post('/tasks/add', [UserRoleTask::class, 'addTask']);
      Route::get('/tasks/counts/{role_id}', [UserRoleTask::class, 'getTaskCounts']);
      Route::get('role_task_view/{encryptedId}', [UserRoleTask::class, 'ViewTask'])->name('users-role-task');
      Route::post('/task/favorite-toggle', [UserRoleTask::class, 'toggleFavorite'])->name('task.favorite.toggle');
      Route::post('/task/favorite-all', [UserRoleTask::class, 'toggleAllFavorites'])->name('task.favorite.all');
      Route::post('/fetch-assessment', [UserRoleTask::class, 'fetchAssessment'])->name('fetch.assessment');
      
   // task management
    //  Route::match(['get', 'post'], '/task_management_list', [TaskManagementRole::class, 'index'])->name('branch_manage_task');
    //  Route::get('task_staff_list', [TaskManagementRole::class, 'taskStaff']);
    //  Route::post('create_task', [TaskManagementRole::class, 'createTask']);
    //  Route::get('my-task-list', [TaskManagementRole::class, 'taskList']);
    //  Route::post('/task/mark-completed', [TaskManagementRole::class, 'markCompleted']);
    //  Route::post('/task/approve', [TaskManagementRole::class, 'approveTask']);
    //  Route::get('/task/edit/{id}', [TaskManagementRole::class, 'editTask']);
    //  Route::post('/task/update/{id}', [TaskManagementRole::class, 'updateTask']);
    //  Route::post('/task-complete/{id}', [TaskManagementRole::class, 'markComplete']);
    //  Route::post('/task-reopen/{id}', [TaskManagementRole::class, 'markReopen']);
    //  Route::post('/task/delete/{id}', [TaskManagementRole::class, 'delete']);
     
     Route::get('/task_management/my_task', [MyTask::class, 'index'])->name('task-management-my-task');
     Route::get('/task_management/team_task', [TeamTask::class, 'index'])->name('task-management-team-task');
     Route::post('/task_management/team_task_view', [TeamTask::class, 'ViewTask']);
     Route::post('/team_tasks/add', [TeamTask::class, 'addTask']);
      
      
  Route::get('/users_manage', [UserManage::class, 'index'])->name('users-manage-users_manage');
  Route::get('/user_role_manage', [UserManage::class, 'List'])->name('user_role_manage');
  Route::get('/staff/view/{id}', [UserManage::class, 'View'])->name('staff.view');
  // Manage Users & Permission
      

  Route::get('/users/manage_users', [ManageUsers::class, 'index'])->name('users-manage-users');
  Route::get('/users/create_manage_users', [ManageUsers::class, 'users_add'])->name('users-manage-users_add');
  Route::get('/users/update_manage_users/{id}', [ManageUsers::class, 'users_edit'])->name('users-manage-users');
  Route::get('/users/view_manage_users/{id}', [ManageUsers::class, 'users_view'])->name('users-manage-users');
  Route::post('/add_user_role_permission', [ManageUsers::class, 'Add'])->name('add_user_role_permission');
  Route::post('/edit_user_role_permission/{id}', [ManageUsers::class, 'Edit']);
  Route::post('/update_user_role_permission/{id}', [ManageUsers::class, 'Update'])->name('update_user_role_permission');
  Route::delete('/user_role_permission_delete/{id}', [ManageUsers::class, 'Delete']);
  Route::post('/user_role_permission_status/{id}', [ManageUsers::class, 'Status']);
    Route::match(['get', 'post'], '/user_role_chart', [ManageUsers::class, 'user_role_chart'])->name('users-manage-users_chart');

  // user Role
  Route::get('/users/user_role', [UserRole::class, 'index'])->name('users-role');
  Route::get('/user_role', [UserRole::class, 'List'])->name('user_role');
  Route::post('/add_user_role', [UserRole::class, 'Add'])->name('add_user_role');
  Route::get('/user_role_edit/{id}', [UserRole::class, 'Edit']);
  Route::post('/user_role_update/{id}', [UserRole::class, 'Update']);
  Route::delete('/user_role_delete/{id}', [UserRole::class, 'Delete']);
  Route::post('/user_role_status/{id}', [UserRole::class, 'Status']);
  Route::get('/role/export-excel', [UserRole::class, 'ExportExcel']);
  // Main Menu End

  // Settings Menu Starts
  // 
  Route::get('/settings/lead/university', [University::class, 'index'])->name('settings-lead-settings');
  Route::get('/university_list', [University::class, 'List'])->name('university_list');
  Route::post('/add_university', [University::class, 'Add'])->name('add_university');
  Route::get('/university_edit/{id}', [University::class, 'Edit'])->name('university_edit');
  Route::post('/university_update', [University::class, 'Update'])->name('university_update');
  Route::post('/university_status/{id}', [University::class, 'Status']);
  Route::delete('/university_delete/{id}', [University::class, 'Delete']);

  Route::get('/internalcug', [Internal_cugs::class, 'index'])->name('internalcug');
  Route::post('/Internal_cugs_add', [Internal_cugs::class, 'Add'])->name('Internal_cugs_add');
  Route::post('/Internal_cugs_update', [Internal_cugs::class, 'Update'])->name('Internal_cugs_update');
  Route::delete('/Internal_cugs_delete/{id}', [Internal_cugs::class, 'Delete']);

 

  Route::get('/internalcug', [Internal_cugs::class, 'index'])->name('internalcug');
  Route::post('/Internal_cugs_add', [Internal_cugs::class, 'Add'])->name('Internal_cugs_add');
  Route::post('/Internal_cugs_update', [Internal_cugs::class, 'Update'])->name('Internal_cugs_update');
  Route::delete('/Internal_cugs_delete/{id}', [Internal_cugs::class, 'Delete']);
  
  Route::get('/settings/journal_settings/domain', [Domain::class, 'index'])->name('settings-journal-settings');
  Route::post('create_domain', [Domain::class, 'create'])->name('create_domain');
  Route::post('/update_domain', [Domain::class, 'Update'])->name('update_domain');
  Route::post('/status_domain/{id}', [Domain::class, 'Status'])->name('status_domain');
  Route::delete('/delete_domain/{id}', [Domain::class, 'Delete'])->name('delete_domain');

  // Journal Index
  Route::get('/settings/journal_settings/journal_index', [JournalIndex::class, 'index'])->name('settings-journal-settings');
  Route::post('/create/journal_index', [JournalIndex::class, 'create'])->name('create_journal_index');
  Route::post('/update_journal_index', [JournalIndex::class, 'Update'])->name('update_journal_index');
  Route::post('/status_journal_index/{id}', [JournalIndex::class, 'Status']);
  Route::delete('/delet_journal_index/{id}', [JournalIndex::class, 'Delete']);
  
  // Journal Request
  Route::get('/journal_settings/journal_request', [JournalRequest::class, 'index'])->name('settings-journal-settings');
  Route::post('/create_journal_request', [JournalRequest::class, 'create'])->name('create_journal_request');
  Route::post('/update_journal_request', [JournalRequest::class, 'Update'])->name('update_journal_request');
  Route::post('/status_journal_request/{id}', [JournalRequest::class, 'Status']);
  Route::delete('/journal_request_delete/{id}', [JournalRequest::class, 'Delete']);
  
  

  Route::get('/holiday', [Holiday::class, 'index'])->name('holiday');
  Route::post('/holiday_add', [Holiday::class, 'Add'])->name('holiday_add');
  Route::post('/holiday_update', [Holiday::class, 'Update'])->name('holiday_update');
  Route::delete('/holiday_delete/{id}', [Holiday::class, 'Delete']);


  Route::get('/holiday', [Holiday::class, 'index'])->name('holiday');
  Route::post('/holiday_add', [Holiday::class, 'Add'])->name('holiday_add');
  Route::post('/holiday_update', [Holiday::class, 'Update'])->name('holiday_update');
  Route::delete('/holiday_delete/{id}', [Holiday::class, 'Delete']);

  Route::get('/settings/general_settings', [GeneralSettings::class, 'index'])->name('settings-general-settings');
  Route::post('/general_settings-update', [GeneralSettings::class, 'Update'])->name('general_settings_update');
  Route::get('/settings/base', [BaseSettings::class, 'index'])->name('settings-base-settings');
  Route::get('/settings/common_settings', [CommonSettings::class, 'index'])->name('settings-common-settings');
  Route::get('/settings/marketing', [MarketingSettings::class, 'index'])->name('settings-marketing-settings');
  Route::get('/settings/lead', [LeadSettings::class, 'index'])->name('settings-lead-settings');
  Route::get('/settings/quotation', [QuotationSettings::class, 'index'])->name('settings-quotation-settings');
  Route::get('/settings/quotataion/quotation_template_add', [QuotationSettings::class, 'quotation_template_add'])->name('settings-quotation-settings');
  Route::get('/settings/quotataion/quotation_template_edit', [QuotationSettings::class, 'quotation_template_edit'])->name('settings-quotation-settings');
  Route::get('/settings/quotataion/quotation_template_view', [QuotationSettings::class, 'quotation_template_view'])->name('settings-quotation-settings');
  Route::get('/settings/invoice', [InvoiceSettings::class, 'index'])->name('settings-invoice-settings');
  Route::get('/settings/sales/lead_questions_add', [LeadSettings::class, 'lead_questions_add'])->name('settings-sales-lead-questions-add');
  Route::get('/settings/sales/lead_questions_edit', [LeadSettings::class, 'lead_questions_edit'])->name('settings-sales-lead-questions-edit');
  Route::get('/settings/customer_type_option/customer_type_option_add', [LeadSettings::class, 'customer_type_option_add'])->name('settings-sales');
  Route::get('/settings/customer_type_option/customer_type_option_edit', [LeadSettings::class, 'customer_type_option_edit'])->name('settings-sales');
  Route::get('/settings/payment_mode_option/payment_mode_option_add', [LeadSettings::class, 'payment_mode_option_add'])->name('settings-sales');
  Route::get('/settings/payment_mode_option/payment_mode_option_edit', [LeadSettings::class, 'payment_mode_option_edit'])->name('settings-sales');

  Route::get('/settings/exam', [ExamSettings::class, 'index'])->name('settings-exam-settings');
  Route::get('/settings/hrm', [HRMSettings::class, 'index'])->name('settings-hrm-settings');
  Route::get('/settings/counsellor', [CounsellorSettings::class, 'index'])->name('settings-counsellor-settings');
  Route::get('/settings/counsellor/category_analysis_questions_add', [CounsellorSettings::class, 'category_analysis_questions_add'])->name('settings-counsellor');
  Route::get('/settings/counsellor/category_analysis_questions_edit', [CounsellorSettings::class, 'category_analysis_questions_edit'])->name('settings-counsellor');
  Route::get('/settings/counsellor/course_analysis_questions_add', [CounsellorSettings::class, 'course_analysis_questions_add'])->name('settings-counsellor');
  Route::get('/settings/counsellor/course_analysis_questions_edit', [CounsellorSettings::class, 'course_analysis_questions_edit'])->name('settings-counsellor');
  Route::get('/settings/counsellor/feedback_analysis_questions_add', [CounsellorSettings::class, 'feedback_analysis_questions_add'])->name('settings-counsellor');
  Route::get('/settings/counsellor/feedback_analysis_questions_edit', [CounsellorSettings::class, 'feedback_analysis_questions_edit'])->name('settings-counsellor');
  Route::get('/settings/accounts', [AccountsSettings::class, 'index'])->name('settings-accounts-settings');

  // Common settings
  // Country Setting
  Route::match(['get', 'post'], '/settings/common/country', [Country::class, 'index'])->name('settings-common-settings');
  Route::post('/add_country', [Country::class, 'Add'])->name('add_country');
  Route::get('/country_edit', [Country::class, 'Edit'])->name('country_edit');
  Route::post('/country_update', [Country::class, 'Update'])->name('country_update');
  Route::delete('/country_delete/{id}', [Country::class, 'Delete'])->name('country_delete');
  Route::post('/country_status_change/{id}', [Country::class, 'Status'])->name('country_status_change');

  // state Setting
  Route::match(['get', 'post'], '/settings/common/state', [State::class, 'index'])->name('settings-common-settings');
  Route::post('/add_state', [State::class, 'Add'])->name('add_state');
  Route::get('/state_edit', [State::class, 'Edit'])->name('state_edit');
  Route::post('/state_update', [State::class, 'Update'])->name('state_update');
  Route::delete('/state_delete/{id}', [State::class, 'Delete'])->name('state_delete');
  Route::delete('/batch_delete_permanently/{id}', [State::class, 'DeleteBatchPermanently'])->name('batch_delete_permanently');
  Route::post('/state_status_change/{id}', [State::class, 'Status'])->name('state_status_change');

  // city Setting
  Route::match(['get', 'post'], '/settings/common/city', [City::class, 'index'])->name('settings-common-settings');
  Route::post('/add_city', [City::class, 'Add'])->name('add_city');
  Route::get('/city_edit', [City::class, 'Edit'])->name('city_edit');
  Route::post('/city_update', [City::class, 'Update'])->name('city_update');
  Route::delete('/city_delete/{id}', [City::class, 'Delete'])->name('city_delete');
  Route::post('/city_status_change/{id}', [City::class, 'Status'])->name('city_status_change');


  // currency_format Setting
  Route::match(['get', 'post'], '/settings/common/currency_format', [CurrencyFormat::class, 'index'])->name('settings-common-settings');
  Route::get('/currency_format', [CurrencyFormat::class, 'List'])->name('currency_format');
  Route::post('/add_currency_format', [CurrencyFormat::class, 'Add'])->name('add_currency_format');
  Route::get('/currency_format_edit/{id}', [CurrencyFormat::class, 'Edit'])->name('currency_format_edit');
  Route::post('/currency_format_update', [CurrencyFormat::class, 'Update'])->name('currency_format_update');
  Route::delete('/currency_format_delete/{id}', [CurrencyFormat::class, 'Delete']);
  Route::post('/currency_format_status/{id}', [CurrencyFormat::class, 'Status']);
  
  // currency Api update
Route::post('/update-currency-rates', [CurrencyFormat::class, 'updateCurrencyRates'])->name('updateCurrencyRates');
Route::post('/currency-convert', [CurrencyFormat::class, 'convertCurrency'])->name('currency.convert');

  // time_zone Setting
  Route::match(['get', 'post'], '/settings/common/time_zone', [TimeZone::class, 'index'])->name('settings-common-settings');
  Route::get('/time_zone', [TimeZone::class, 'List'])->name('time_zone');
  Route::post('/add_time_zone', [TimeZone::class, 'Add'])->name('add_time_zone');
  Route::get('/time_zone_edit', [TimeZone::class, 'Edit'])->name('time_zone_edit');
  Route::post('/time_zone_update', [TimeZone::class, 'Update'])->name('time_zone_update');
  Route::delete('/time_zone_delete/{id}', [TimeZone::class, 'Delete'])->name('time_zone_delete');
  Route::post('/time_zone_status_change/{id}', [TimeZone::class, 'Status'])->name('time_zone_status_change');

  // Lead settings
  // LeadSource
  Route::match(['get', 'post'], '/settings/lead/lead_source', [LeadSource::class, 'index'])->name('settings-lead-settings');
  Route::get('lead_source', [LeadSource::class, 'List'])->name('lead_source');
  Route::post('/add-lead-source', [LeadSource::class, 'Add'])->name('add_lead_source');
  Route::get('/lead-source-edit/{id}', [LeadSource::class, 'Edit'])->name('lead_source_edit');
  Route::post('/lead-source-update', [LeadSource::class, 'Update'])->name('lead_source_update');
  Route::delete('/lead-source-delete/{id}', [LeadSource::class, 'Delete']);
  Route::post('/lead-source-status/{id}', [LeadSource::class, 'Status']);

      Route::match(['get', 'post'], '/settings/lead/potential_reason', [PotentialReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/potential_reason_add', [PotentialReason::class, 'Add'])->name('potential_reason_add');
  Route::get('potential_reason_list', [PotentialReason::class, 'List'])->name('potential_reason_list');
  Route::post('/potential_reason_status/{id}', [PotentialReason::class, 'Status']);
  Route::delete('/potential_reason_delete/{id}', [PotentialReason::class, 'Delete']);
  Route::post('/potential_reason_update', [PotentialReason::class, 'Update'])->name('potential_reason_update');
  // LeadType
  Route::match(['get', 'post'], '/settings/lead/lead_type', [LeadType::class, 'index'])->name('settings-lead-settings');
  Route::get('lead_type', [LeadType::class, 'List'])->name('lead_type');
  Route::post('/add-lead-type', [LeadType::class, 'Add'])->name('add_lead_type');
  Route::get('/lead-type-edit/{id}', [LeadType::class, 'Edit'])->name('lead_type_edit');
  Route::post('/lead-type-update', [LeadType::class, 'Update'])->name('lead_type_update');
  Route::delete('/lead-type-delete/{id}', [LeadType::class, 'Delete']);
  Route::post('/lead-type-status/{id}', [LeadType::class, 'Status']);


  // LeadPotential type
  Route::match(['get', 'post'], '/settings/lead/lead_potential_type', [LeadPotentialType::class, 'index'])->name('settings-lead-settings');
  Route::post('/add_lead_potential_type', [LeadPotentialType::class, 'Add'])->name('add_lead_potential_type');
  Route::get('potential_type_list', [LeadPotentialType::class, 'List'])->name('potential_type_list');
  Route::get('/lead-potential_type-edit/{id}', [LeadPotentialType::class, 'Edit'])->name('lead_potential_type_edit');
  Route::post('/lead-potential_type-update', [LeadPotentialType::class, 'Update'])->name('lead_potential_type_update');
  Route::delete('/lead-potential_type-delete/{id}', [LeadPotentialType::class, 'Delete']);
  Route::post('/lead-potential_type-status/{id}', [LeadPotentialType::class, 'Status']);

  // Lead status
  Route::match(['get', 'post'], '/settings/lead/lead_status', [LeadStatus::class, 'index'])->name('settings-lead-settings');
  Route::get('/lead_status', [LeadStatus::class, 'List'])->name('lead_status');
  Route::post('/add_lead_status', [LeadStatus::class, 'Add'])->name('add_lead_status');
  Route::get('/lead_status_edit/{id}', [LeadStatus::class, 'Edit']);
  Route::post('/lead_status_update', [LeadStatus::class, 'Update'])->name('lead_status_update');
  Route::delete('/lead_status_delete/{id}', [LeadStatus::class, 'Delete']);
  Route::post('/lead_status_status/{id}', [LeadStatus::class, 'Status']);
  Route::post('/lead_status_lg_status/{id}', [LeadStatus::class, 'Legend_Status']);

  // Lead requirement status
  Route::match(['get', 'post'], '/settings/lead/lead_requirement_status', [LeadRequirementStatus::class, 'index'])->name('settings-lead-settings');
  Route::get('/lead_requirement_status', [LeadRequirementStatus::class, 'List'])->name('lead_requirement_status');
  Route::post('/add_lead_requirement_status', [LeadRequirementStatus::class, 'Add'])->name('add_lead_requirement_status');
  Route::get('/lead_requirement_status_edit/{id}', [LeadRequirementStatus::class, 'Edit']);
  Route::post('/lead_requirement_status_update', [LeadRequirementStatus::class, 'Update'])->name('lead_requirement_status_update');
  Route::delete('/lead_requirement_status_delete/{id}', [LeadRequirementStatus::class, 'Delete']);
  Route::post('/lead_requirement_status_status/{id}', [LeadRequirementStatus::class, 'Status']);
  Route::post('/lead_requirement_status_lg_status/{id}', [LeadRequirementStatus::class, 'Legend_Status']);

  // followup Reason
  Route::match(['get', 'post'], '/settings/lead/followup_reason', [FollowupReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/followup_reason_add', [FollowupReason::class, 'Add'])->name('followup_reason_add');
  Route::get('followup_reason_list', [FollowupReason::class, 'List'])->name('followup_reason_list');
  Route::post('/followup_reason_status/{id}', [FollowupReason::class, 'Status']);
  Route::delete('/followup_reason_delete/{id}', [FollowupReason::class, 'Delete']);
  Route::post('/followup_reason_update', [FollowupReason::class, 'Update'])->name('followup_reason_update');

  // Spam Call Reason
  Route::match(['get', 'post'], '/settings/lead/spam_call_reason', [SpamCallReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/spam_call_reason_add', [SpamCallReason::class, 'Add'])->name('spam_call_reason_add');
  Route::get('spam_call_reason_list', [SpamCallReason::class, 'List'])->name('spam_call_reason_list');
  Route::post('/spam_call_reason_status/{id}', [SpamCallReason::class, 'Status']);
  Route::delete('/spam_call_reason_delete/{id}', [SpamCallReason::class, 'Delete']);
  Route::post('/spam_call_reason_update', [SpamCallReason::class, 'Update'])->name('spam_call_reason_update');

  //Internal Call Reason
  Route::match(['get', 'post'], '/settings/lead/internal_call_reason', [InternalCallReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/internal_call_reason_add', [InternalCallReason::class, 'Add'])->name('internal_call_reason_add');
  Route::get('internal_call_reason_list', [InternalCallReason::class, 'List'])->name('internal_call_reason_list');
  Route::post('/internal_call_reason_status/{id}', [InternalCallReason::class, 'Status']);
  Route::delete('/internal_call_reason_delete/{id}', [InternalCallReason::class, 'Delete']);
  Route::post('/internal_call_reason_update', [InternalCallReason::class, 'Update'])->name('internal_call_reason_update');

  //Internal Call Reason
  Route::match(['get', 'post'], '/settings/lead/lead_bank_reason', [LeadBankReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/lead_bank_reason_add', [LeadBankReason::class, 'Add'])->name('lead_bank_reason_add');
  Route::get('lead_bank_reason_list', [LeadBankReason::class, 'List'])->name('lead_bank_reason_list');
  Route::post('/lead_bank_reason_status/{id}', [LeadBankReason::class, 'Status']);
  Route::delete('/lead_bank_reason_delete/{id}', [LeadBankReason::class, 'Delete']);
  Route::post('/lead_bank_reason_update', [LeadBankReason::class, 'Update'])->name('lead_bank_reason_update');


  // dead Reason
  Route::match(['get', 'post'], '/settings/lead/dead_reason', [DeadReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/dead_reason_add', [DeadReason::class, 'Add'])->name('dead_reason_add');
  Route::get('dead_reason_list', [DeadReason::class, 'List'])->name('dead_reason_list');
  Route::post('/dead_reason_status/{id}', [DeadReason::class, 'Status']);
  Route::delete('/dead_reason_delete/{id}', [DeadReason::class, 'Delete']);
  Route::post('/dead_reason_update', [DeadReason::class, 'Update'])->name('dead_reason_update');

  //base settings
  //comapny type 
  Route::get('/settings/companytype', [Company_type::class, 'index'])->name('settings-base-settings');
  Route::post('/add_company_type', [Company_type::class, 'Add'])->name('add_company_type');
  Route::get('/company_type_edit/{id}', [Company_type::class, 'Edit'])->name('company_type_edit');
  Route::post('/company_type_update', [Company_type::class, 'Update'])->name('company_type_update');
  Route::delete('/company_type_delete/{id}', [Company_type::class, 'Delete']);
  Route::post('/company_type_status/{id}', [Company_type::class, 'Status']);
  //Branch category
  Route::get('/settings/branchcategory', [BranchCategory::class, 'index'])->name('settings-base-settings');
  Route::post('/add_branchcategory', [BranchCategory::class, 'Add'])->name('add_branchcategory');
  Route::post('/branchcategory_status/{id}', [BranchCategory::class, 'Status']);
  Route::post('/branchcategory_update', [BranchCategory::class, 'Update'])->name('branchcategory_update');
  Route::delete('/branchcategory_delete/{id}', [BranchCategory::class, 'Delete']);
  // Department
  Route::get('/settings/department', [Department::class, 'index'])->name('settings-base-settings');
  Route::get('/department', [Department::class, 'List'])->name('department');
  Route::post('/add_department', [Department::class, 'Add'])->name('add_department');
  Route::get('/department_edit/{id}', [Department::class, 'Edit'])->name('department_edit');
  Route::post('/department_update', [Department::class, 'Update'])->name('department_update');
  Route::delete('/department_delete/{id}', [Department::class, 'Delete']);
  Route::post('/department_status/{id}', [Department::class, 'Status']);
  Route::get('/branch_department_list', [Department::class, 'BranchDepartList'])->name('branch_department_list');
  //Division
  Route::get('/settings/division', [Division::class, 'index'])->name('settings-base-settings');
  Route::post('/add_division', [Division::class, 'Add'])->name('add_division');
  Route::get('/division_edit/{id}', [Division::class, 'Edit'])->name('division_edit');
  Route::post('/division_update', [Division::class, 'Update'])->name('division_update');
  Route::post('/division_status/{id}', [Division::class, 'Status']);
  Route::get('/get_division', [Division::class, 'DepartDivisionList'])->name('get_division');
  //   Route::get('/job_position', [Division::class, 'JobPostionList'])->name('job_position');
    
  Route::get('/base_settings/white_list_ip', [WhiteListIP::class, 'index'])->name('settings-base-settings');
  Route::post('/create_ip_address', [WhiteListIP::class, 'create'])->name('create_ip_address');
  Route::post('/update_ip_address', [WhiteListIP::class, 'Update'])->name('update_ip_address');
  Route::post('/status_white_list_ip/{id}', [WhiteListIP::class, 'Status']);
  Route::delete('/delete_white_list_ip/{id}', [WhiteListIP::class, 'Delete']);
  Route::get('/edit_white_list_ip/{id}', [WhiteListIP::class, 'Edit']);
  Route::get('/delete_data_white_list_ip/{id}', [WhiteListIP::class, 'deleteData']);
  Route::get('/list_white_list_ip', [WhiteListIP::class, 'list']);
  // Product Tools
  Route::get('/base_settings/product_tools', [ProductTools::class, 'index'])->name('settings-base-settings');
  Route::post('/product_tools_store', [ProductTools::class, 'store'])->name('product_tools_store');
  Route::post('/tools_update', [ProductTools::class, 'Update'])->name('tools_update');
  Route::post('/product_tools_status/{id}', [ProductTools::class, 'status'])->name('product_tools_status');
  Route::delete('/product_tools_delete/{id}', [ProductTools::class, 'delete'])->name('product_tools_delete');


  // Job_Position
  Route::match(['get', 'post'], '/settings/hrm/job_position', [JobPosition::class, 'index'])->name('settings-hrm-settings');
  Route::get('/job_position', [JobPosition::class, 'JobPostionList'])->name('job_position');
  Route::post('/add_job_position', [JobPosition::class, 'Add'])->name('add_job_position');
  Route::get('/job_position_edit/{id}', [JobPosition::class, 'Edit']);
  Route::post('/job_position_update/{id}', [JobPosition::class, 'Update']);
  Route::delete('/job_position_delete/{id}', [JobPosition::class, 'Delete']);
  Route::post('/job_position_status/{id}', [JobPosition::class, 'Status']);
  // Staff Per Hour Cost
  Route::get('/settings/hrm/per_hour_cost', [StaffPerHourCost::class, 'index'])->name('settings-hrm-settings');
  Route::post('/add_per_hour_cost', [StaffPerHourCost::class, 'Add'])->name('add_per_hour_cost');
  Route::delete('/delete_per_hour_cost/{id}', [StaffPerHourCost::class, 'Delete']);
  Route::post('/status_per_hour_cost/{id}', [StaffPerHourCost::class, 'Status']);
  Route::get('/edit_per_hour_cost/{id}', [StaffPerHourCost::class, 'Edit']);
  Route::post('/update_per_hour_cost', [StaffPerHourCost::class, 'Update'])->name('update_per_hour_cost');
  // Employee Skill Settings
  Route::get('/settings/hrm/employee_skills', [EmployeeSkill::class, 'index'])->name('settings-hrm-settings');
  Route::post('/update_employee_skill', [EmployeeSkill::class, 'Update'])->name('update_employee_skill');
   // Badges Settings
  Route::get('/settings/hrm/badges', [Badges::class, 'index'])->name('settings-hrm-settings');
  Route::post('/create_badge', [Badges::class, 'Create'])->name('create_badge');
  Route::post('/update_badge', [Badges::class, 'Update'])->name('update_badge');
  Route::post('/status_badge/{id}', [Badges::class, 'Status']);
  Route::get('/edit_badge/{id}', [Badges::class, 'Edit']);
  Route::delete('/delete_badge/{id}', [Badges::class, 'Delete']);
  // Intern Settings
  // InternEducation
  Route::get('/settings/intern/education', [InternEducation::class, 'index'])->name('settings-intern-settings');
  Route::get('education', [InternEducation::class, 'List'])->name('education');
  Route::post('/add-education', [InternEducation::class, 'Add'])->name('add_education');
  Route::get('/education-edit/{id}', [InternEducation::class, 'Edit'])->name('education_edit');
  Route::post('/education-update', [InternEducation::class, 'Update'])->name('education_update');
  Route::delete('/education-delete/{id}', [InternEducation::class, 'Delete']);
  Route::post('/education-status/{id}', [InternEducation::class, 'Status']);

  // Topic
  Route::get('/settings/intern/topic', [InternTopic::class, 'index'])->name('settings-intern-settings');
  Route::get('topic', [InternTopic::class, 'List'])->name('topic');
  Route::post('/add-topic', [InternTopic::class, 'Add'])->name('add_topic');
  Route::get('/topic-edit/{id}', [InternTopic::class, 'Edit'])->name('topic_edit');
  Route::post('/topic-update', [InternTopic::class, 'Update'])->name('topic_update');
  Route::delete('/topic-delete/{id}', [InternTopic::class, 'Delete']);
  Route::post('/topic-status/{id}', [InternTopic::class, 'Status']);

  //Intern Company
  Route::get('/settings/intern/company', [InternCompany::class, 'index'])->name('settings-intern-settings');
  Route::get('letter_pad', [InternCompany::class, 'List'])->name('letter_pad');
  Route::post('/add-letter_pad', [InternCompany::class, 'Add'])->name('add_letter_pad');
  Route::get('/letter_pad-edit/{id}', [InternCompany::class, 'Edit'])->name('letter_pad_edit');
  Route::post('/letter_pad-update', [InternCompany::class, 'Update'])->name('letter_pad_update');
  Route::delete('/letter_pad-delete/{id}', [InternCompany::class, 'Delete']);
  Route::post('/letter_pad-status/{id}', [InternCompany::class, 'Status']);

  //College
  Route::get('/settings/intern/college', [InternCollege::class, 'index'])->name('settings-intern-settings');
  Route::get('/College', [InternCollege::class, 'List'])->name('College');
  Route::post('/add_college', [InternCollege::class, 'Add'])->name('add_college');
  Route::get('/college-edit/{id}', [InternCollege::class, 'Edit']);
  Route::post('/college_update', [InternCollege::class, 'Update'])->name('college_update');
  Route::delete('/college-delete/{id}', [InternCollege::class, 'Delete']);
  Route::post('/college-status/{id}', [InternCollege::class, 'Status']);

  // Payment option
  Route::get('/settings/sales/payment_mode_option', [PaymentModeOption::class, 'index'])->name('settings-sales-payment-mode-option');
  Route::get('/settings/payment_mode_option/payment_mode_option_add', [PaymentModeOption::class, 'AddIndex'])->name('settings-sales');
  Route::match(['get', 'post'], '/settings/payment_mode_option/payment_mode_option_edit/{id}', [PaymentModeOption::class, 'EditIndex'])->name('settings-sales');
  Route::get('/payment_option_list/{id}', [PaymentModeOption::class, 'ListDisplay'])->name('payment_option_list');
  Route::post('/add_payment_option', [PaymentModeOption::class, 'Add'])->name('add_payment_option');
  Route::post('/edit_payment_mode_options', [PaymentModeOption::class, 'Update'])->name('edit_payment_mode_options');
  Route::delete('/payment_mode_option_delete/{id}', [PaymentModeOption::class, 'Delete']);
  Route::post('/payment_mode_option_status/{id}', [PaymentModeOption::class, 'Status']);
  
  // NewsBroadcast
  Route::get('/support/news_broadcast', [NewsBroadcast::class, 'index'])->name('support-news-broadcast');
  Route::get('/settings/add_news_broadcast', [NewsBroadcast::class, 'Add'])->name('support-news-broadcast');
  Route::post('/broadcast_template_create', [NewsBroadcast::class, 'saveTemplate'])->name('broadcast_template_create');
  Route::get('/edit_news_broadcast/{id}', [NewsBroadcast::class, 'Edit'])->name('support-news-broadcast');
  Route::post('/news_broadcast_update', [NewsBroadcast::class, 'Update'])->name('news_broadcast_update');
  Route::delete('/news_broadcast_update_delete/{id}', [NewsBroadcast::class, 'Delete'])->name('news_broadcast_update_delete');
  Route::post('/check_news_broadcast_dates', [NewsBroadcast::class, 'checkDates']);
  Route::post('/check_news_broadcast_datesEdit', [NewsBroadcast::class, 'checkDatesEdit']);
   Route::post('/news_broadcast_status_change/{id}', [NewsBroadcast::class, 'Status'])->name('news_broadcast_status_change');
   Route::get('/broadcast_theme_by_id', [NewsBroadcast::class, 'broadcastThemeById'])->name('broadcast_theme_by_id');
   Route::get('/news_broadcast_by_id', [NewsBroadcast::class, 'newsBroadcastById'])->name('news_broadcast_by_id');
   
    Route::get('/role_list_broadcast/{id}', [NewsBroadcast::class, 'role_list_broadcast']);
    Route::post('/update_broadcast_roles', [NewsBroadcast::class, 'Update_role'])->name('update_broadcast_roles');
    Route::post('/broadcast_roles_remove', [NewsBroadcast::class, 'removeRole'])->name('broadcast_roles_remove');
    
    Route::get('/branch_list_broadcast/{id}', [NewsBroadcast::class, 'branch_list_broadcast']);
    Route::post('/update_broadcast_branch', [NewsBroadcast::class, 'Update_branch'])->name('update_broadcast_branch');
    Route::post('/broadcast_branch_remove', [NewsBroadcast::class, 'removeBranch'])->name('broadcast_branch_remove');
    Route::get('/branch_list', [NewsBroadcast::class, 'branch_list'])->name('branch_list');
   
  //Broadcast Theme Setting
    Route::get('/settings/broadcast_theme', [BroadcastTheme::class, 'index'])->name('settings-broadcast-theme');
  Route::get('/settings/add_broadcast_theme', [BroadcastTheme::class, 'Add'])->name('settings-broadcast-theme');
  Route::post('/broadcast_theme_create', [BroadcastTheme::class, 'saveTemplate'])->name('broadcast_theme_create');
  Route::get('/edit_broadcast_theme/{id}', [BroadcastTheme::class, 'Edit'])->name('settings-broadcast-theme');
  Route::post('/broadcast_theme_update', [BroadcastTheme::class, 'Update'])->name('broadcast_theme_update');
  Route::delete('/broadcast_theme_update_delete/{id}', [BroadcastTheme::class, 'Delete'])->name('broadcast_theme_update_delete');
   Route::post('/broadcast_theme_status_change/{id}', [BroadcastTheme::class, 'Status'])->name('broadcast_theme_status_change');
  
  
    	// Additional Charges
  Route::get('/base_settings/additional_charges', [AdditionalCharges::class, 'index'])->name('settings-base-settings');
  Route::post('additional_settings_store', [AdditionalCharges::class, 'store'])->name('additional_settings_store');
  Route::post('/additional_settings_update', [AdditionalCharges::class, 'Update'])->name('additional_settings_update');
  Route::post('/additional_charges_status/{id}', [AdditionalCharges::class, 'status'])->name('additional_charges_status');
  Route::delete('/additional_charges_delete/{id}', [AdditionalCharges::class, 'delete'])->name('additional_charges_delete');

  Route::get('/base_settings/cloudcall_api_setup', [CloudCallApiSetup::class, 'index'])->name('settings-base-settings');
    Route::post('/create_cloudcall_api_setup', [CloudCallApiSetup::class, 'create'])->name('create_cloudcall_api_setup');
    Route::post('/update_cloudcall_api_setup', [CloudCallApiSetup::class, 'Update'])->name('update_cloudcall_api_setup');
    Route::post('/status_cloudcall_api_setup/{id}', [CloudCallApiSetup::class, 'Status']);
    Route::delete('/delete_cloudcall_api_setup/{id}', [CloudCallApiSetup::class, 'Delete']);
    Route::get('/edit_cloudcall_api_setup/{id}', [CloudCallApiSetup::class, 'Edit']);
    Route::get('/delete_data_cloudcall_api_setup/{id}', [CloudCallApiSetup::class, 'deleteData']);
    Route::get('/list_cloudcall_api_setup', [CloudCallApiSetup::class, 'list']);
    

    Route::match(['get', 'post'], '/support/training_document', [TrainingDocument::class, 'index'])->name('support-manage-training');
    Route::match(['get', 'post'], '/support/training_document_table', [TrainingDocument::class, 'ajax_table'])->name('support.training_document_table');
    Route::get('/training-document_view/{id}', [TrainingDocument::class, 'fetchTrainingDocumentById']);
    Route::get('/training_document/categoryList', [TrainingDocument::class, 'TrainingCategoryList']);
    Route::post('/training/list', [TrainingDocument::class, 'TrainingList']);
    
    
    Route::match(['get', 'post'], '/support/manage_training_document', [ManageTrainingDocument::class, 'index'])->name('support-manage-training-document');
  Route::post('/manage_training_document_status/{id}', [ManageTrainingDocument::class, 'Status']);
  Route::post('/create_manage_training_document', [ManageTrainingDocument::class, 'Create'])->name('create_manage_training_document');
  Route::post('/update_manage_training_document', [ManageTrainingDocument::class, 'Update'])->name('update_manage_training_document');
  Route::delete('/training_document_delete/{id}', [ManageTrainingDocument::class, 'Delete']);
  Route::get('/training_document_edit/{id}', [ManageTrainingDocument::class, 'Edit']);
  Route::get('/traning_subcat_list', [ManageTrainingDocument::class, 'getSubcategories'])->name('traning_subcat_list');
  // web.php
    Route::post('/roles/remove', [ManageTrainingDocument::class, 'removeRole'])->name('roles.remove');
    Route::post('/update_document_roles', [ManageTrainingDocument::class, 'Update_role'])->name('update_document_roles');
  
  Route::get('/traning_subcat_document_list', [ManageTrainingDocument::class, 'getSubcategories_Document_list'])->name('traning_subcat_document_list');
  Route::post('/save-document-order', [ManageTrainingDocument::class, 'saveDocumentOrder'])->name('save_document_order');
  
  Route::get('/role_list_fetch/{id}', [ManageTrainingDocument::class, 'role_list_fetch']);
    
    
  // Manage Exam
        Route::match(['get', 'post'], '/manage_exam', [ManageExam::class, 'index'])->name('exam-management-manage-exam');
        Route::get('/manage_exam/add', [ManageExam::class, 'showCreateExam'])->name('exam-management-manage-exam');
        Route::get('/fetch_job_roles', [ManageExam::class, 'fetchJobRoles']);
        Route::post('/manage_exam/create', [ManageExam::class, 'Create'])->name('manage_exam_create');
        Route::get('/edit_manage_exam/{id}', [ManageExam::class, 'Edit']);
        Route::get('/view_manage_exam/{id}', [ManageExam::class, 'View'])->name('exam-management-manage-exam');
        Route::post('/manage_exam/update', [ManageExam::class, 'Update'])->name('manage_exam_update');
        Route::post('/status_manage_exam/{id}', [ManageExam::class, 'Status']);
        Route::get('/level_based_exam_questions', [ManageExam::class, 'levelBasedQuestion']);
        Route::get('/fetch_question_bank_name/{id}', [ManageExam::class, 'fetchQuestionBankName']);
        Route::get('/edit_level_based_exam_questions/{sno}', [ManageExam::class, 'editLevelQuestions']);
        Route::get('/check-exam-process/{id}', [ManageExam::class, 'checkExamProcess']);
        Route::delete('/delete-exam/{id}', [ManageExam::class, 'Delete']);

    // Exam Question Bank
        Route::match(['get', 'post'], '/question-bank', [ManageQuestionBank::class, 'index'])->name('exam-management-manage-question-bank');
        Route::post('/question_bank_status/{id}', [ManageQuestionBank::class, 'Status']);
        Route::get('/question-bank/view/{id}', [ManageQuestionBank::class, 'View'])->name('exam-management-manage-question-bank');
        Route::get('/question-bank/edit/{id}', [ManageQuestionBank::class, 'Edit']);
        Route::post('/add_quesion_bank', [ManageQuestionBank::class, 'Add'])->name('add_quesion_bank');
        Route::post('/edit_quesion_bank', [ManageQuestionBank::class, 'Update'])->name('edit_quesion_bank');
        Route::post('/add_quesions', [ManageQuestionBank::class, 'AddQuestion'])->name('add_quesions');
        Route::post('/update_quesions', [ManageQuestionBank::class, 'UpdateQuestion'])->name('update_quesions');
    
        Route::get('/question-bank/section_add/{id}', [ManageQuestionBank::class, 'question_add'])->name('exam-management-manage-question-bank');
        Route::get('/question-bank/section_edit/{id}', [ManageQuestionBank::class, 'question_edit'])->name('exam-management-manage-question-bank');
        Route::post('/questions_import', [ManageQuestionBank::class, 'ImportQuestion'])->name('questions_import');
    // Manage ac   
        Route::match(['get', 'post'], '/manage-assessments', [ManageAssessment::class, 'index'])->name('exam-management-manage-assessments');
        Route::get('/manage-assessments/write_exam/{id}', [ManageAssessment::class, 'write_exam'])->name('exam-management-manage-assessments');
        Route::post('/save-exam-answer', [ManageAssessment::class, 'saveAnswer'])->name('saveExamAnswer');
        Route::post('/save-exam-answer-complete', [ManageAssessment::class, 'saveAnswerComplete'])->name('saveAnswerComplete');
        Route::post('/time-out', [ManageAssessment::class, 'TimeOut'])->name('timeout');
        
        Route::post('/exam-time-save', [ManageAssessment::class, 'ExamTimeSave'])->name('exam-time-save');
        Route::post('/exam/get-question-statuses', [ManageAssessment::class, 'getQuestionStatuses'])->name('examgetQuestionStatuses');
        Route::get('/exam-result/{id}', [ManageAssessment::class, 'view_result'])->name('exam-management-manage-assessments');
        
        Route::get('/staff-assessment-certificate/{id}', [ManageAssessment::class, 'assesment_certificate'])->name('staff-assessment-certificate');
        Route::get('/assesment_certificate_preview/{id}', [ManageAssessment::class, 'assesment_certificate_preview'])->name('assesment_certificate_preview');
        Route::get('/staff_certificate_send/{id}', [ManageAssessment::class, 'staff_certificate_send'])->name('staff_certificate_send');
        
    // Manage Result
        Route::match(['get', 'post'], '/manage-result', [ManageResult::class, 'index'])->name('exam-management-manage-result');
        Route::match(['get', 'post'], '/staff-exam-report/{id}', [ManageResult::class, 'view_report'])->name('exam-management-manage-result');
        Route::post('/exam-limit-increase', [ManageResult::class, 'store_limit'])->name('exam.limit.increase');
        Route::post('/exam-process-delete', [ManageResult::class, 'exam_process_delete'])->name('exam-process-delete');
        
        Route::post('/next-attempt-schedule', [ManageAssessment::class, 'NextSchudule'])->name('next-attempt-schedule');
        Route::post('/exam-badge-claim', [ManageAssessment::class, 'BadgeClaim'])->name('exam-badge-claim');
        
        Route::get('/exam_log/{id}', [ManageAssessment::class, 'exam_log']);
        
        // Manage Report
      Route::get('/staff_report', [StaffReport::class, 'index'])->name('exam-management-staff-report');
      Route::get('/exam-management/staff-report', [StaffReport::class, 'staffReport']);
      Route::get('/exam-management/exam-report-modal', [StaffReport::class, 'getExamReport']);
 
    
    
    
    // Exam Settings
  
    // Question Bank Category
    Route::get('/settings/exam/question_bank_category', [QuestionBankCategory::class, 'index'])->name('settings-exam-settings');
    Route::post('/create_question_bank_category', [QuestionBankCategory::class, 'Create'])->name('create_question_bank_category');
    Route::post('/status_question_bank/{id}', [QuestionBankCategory::class, 'Status']);
    Route::delete('/delete_question_bank/{id}', [QuestionBankCategory::class, 'Delete']);
    Route::post('/update_question_bank', [QuestionBankCategory::class, 'Update'])->name('update_question_bank');

    // Exam Guidelines
    Route::get('/settings/exam/guidelines', [GuideLines::class, 'index'])->name('settings-exam-settings');
    Route::post('/create_guidelines', [GuideLines::class, 'store'])->name('create_guidelines');

    // Exam Category
    Route::get('/settings/exam/exam_category', [ExamCategory::class, 'index'])->name('settings-exam-settings');
    Route::post('/create_exam_category', [ExamCategory::class, 'Create'])->name('create_exam_category');
    Route::post('/status_exam_category/{id}', [ExamCategory::class, 'Status']);
    Route::delete('/delete_exam_category/{id}', [ExamCategory::class, 'Delete']);
    Route::post('/update_exam_category', [ExamCategory::class, 'Update'])->name('update_exam_category');
    Route::get('/list_exam_category', [ExamCategory::class, 'List']);

    // Exam Section
    Route::get('/settings/exam/exam_section', [ExamSection::class, 'index'])->name('settings-exam-settings');
    Route::post('/create_exam_section', [ExamSection::class, 'Create'])->name('create_exam_section');
    Route::post('/status_exam_section/{id}', [ExamSection::class, 'Status']);
    Route::delete('/delete_exam_section/{id}', [ExamSection::class, 'Delete']);
    Route::post('/update_exam_section', [ExamSection::class, 'Update'])->name('update_exam_section');

    // Question Bank Type
    Route::get('/settings/exam/question_bank_type', [QuestionBankType::class, 'index'])->name('settings-exam-settings');
    Route::post('/create_question_bank_type', [QuestionBankType::class, 'Create'])->name('create_question_bank_type');
    Route::post('/status_question_bank_type/{id}', [QuestionBankType::class, 'Status']);
    Route::delete('/delete_question_bank_type/{id}', [QuestionBankType::class, 'Delete']);
    Route::post('/update_question_bank_type', [QuestionBankType::class, 'Update'])->name('update_question_bank_type');

    // Job Role Schedule
    Route::get('/settings/exam/job_role_schedule', [JobRoleSchedule::class, 'index'])->name('settings-exam-settings');
    Route::post('/create_exam_schedule', [JobRoleSchedule::class, 'Create'])->name('create_exam_schedule');
    Route::post('/status_exam_schedule/{id}', [JobRoleSchedule::class, 'Status']);
    Route::delete('/delete_job_role_schedule/{id}', [JobRoleSchedule::class, 'Delete']);
    Route::get('/edit_job_role_schedule/{id}', [JobRoleSchedule::class, 'Edit']);
    Route::get('/list_job_role_schedule', [JobRoleSchedule::class, 'list']);
    Route::post('/update_job_role_schedule', [JobRoleSchedule::class, 'Update'])->name('update_job_role_schedule');

    // Exam Badge 
    Route::get('/settings/exam/exam_badge', [ExamBadge::class, 'index'])->name('settings-exam-settings');
    Route::post('/create_exam_badge', [ExamBadge::class, 'Create'])->name('create_exam_badge');
    Route::post('/status_exam_badge/{id}', [ExamBadge::class, 'Status']);
    Route::delete('/delete_exam_badge/{id}', [ExamBadge::class, 'Delete']);
    Route::post('/update_exam_badge', [ExamBadge::class, 'Update'])->name('update_exam_badge');
    Route::get('/edit_exam_badge/{id}', [ExamBadge::class, 'Edit']);
    Route::get('/list_exam_badge', [ExamBadge::class, 'list']);

  // Journal Management

  // Journal Booklet
  Route::get('/journal_booklet_list', [JournalBooklet::class, 'list']); 
  Route::match(['get', 'post'], '/journal_management/journal_booklet', [JournalBooklet::class, 'index'])->name('journal-management-journal-booklet');
  Route::post('/create_journal_booklet', [JournalBooklet::class, 'Create'])->name('create_journal_booklet');
  Route::post('/update_journal_booklet', [JournalBooklet::class, 'Update'])->name('update_journal_booklet');
  Route::get('/view_journal_booklet/{id}', [JournalBooklet::class, 'view']);
  Route::get('/edit_journal_booklet/{id}', [JournalBooklet::class, 'Edit']);
  Route::get('/get_domain_name_and_count', [JournalBooklet::class, 'get_domain_name_and_count']);
  Route::get('/get_index_name_and_count', [JournalBooklet::class, 'get_index_name_and_count']);

// Manage Journal
  Route::match(['get', 'post'], '/journal_management/manage_journal', [ManageJournal::class, 'index'])->name('journal-management-manage-journal');
  Route::match(['get', 'post'], '/journal_management/published_journal', [ManageJournal::class, 'published_list'])->name('journal-management-journal-published');
  Route::get('/journal_management/fetch_add_data/{id}', [ManageJournal::class, 'addDataFetch']);
  Route::post('/upload-journal', [ManageJournal::class, 'uploadFiles'])->name('upload_journal');
  Route::delete('/upload/temp/remove', [ManageJournal::class, 'removeFile']);
  Route::post('/submit_journal', [ManageJournal::class, 'Create'])->name('submit_journal');
  Route::get('/view_manage_journal/{id}', [ManageJournal::class, 'view'])->name('view_manage_journal');
  Route::get('/journal_staff_assign/{id}', [ManageJournal::class, 'AssignDataFetch']);
  Route::post('/add_journal_staff', [ManageJournal::class, 'AddJournalStaff'])->name('add_journal_staff');
  Route::get('/get_journal_booklet_data', [ManageJournal::class, 'getJournalBookletData']);
  Route::get('/get_journal_review_data/{id}', [ManageJournal::class, 'getJournalReviewData']);
  Route::post('/journal_review_status/{id}', [ManageJournal::class, 'journalReviewStatus']);
  Route::post('/journal_with_editor_status/{id}', [ManageJournal::class, 'journalWithEditorStatus']);
  Route::post('/journal_under_reviewer_status/{id}', [ManageJournal::class, 'journalUnderReviewerStatus']);
  Route::get('/get_journal_resubmit_data/{id}', [ManageJournal::class, 'getJournalResubmitData']);
  Route::post('/journal_resubmit_status/{id}', [ManageJournal::class, 'journalResubmitStatus']);
  Route::get('/get_journal_accept_data/{id}', [ManageJournal::class, 'getJournalAcceptData']);
  Route::post('/journal_accept_status/{id}', [ManageJournal::class, 'journalAcceptStatus']);
  Route::post('/journal_e_proofing/{id}', [ManageJournal::class, 'journalEProofingStatus']);
  Route::get('/get_journal_reject_data/{id}', [ManageJournal::class, 'getJournalRejectData']);
  Route::post('/journal_reject_status/{id}', [ManageJournal::class, 'journalRejectStatus']);
  Route::get('/get_journal_publish_data/{id}', [ManageJournal::class, 'getJournalPublishData']);
  Route::post('/journal_publish_status/{id}', [ManageJournal::class, 'journalPublishStatus']);
  Route::get('/journal_passlocker/{id}', [ManageJournal::class, 'journalPassLocker']);
  Route::get('/task_request_list', [ManageJournal::class, 'get_task_request']);
  Route::post('/create_task_request', [ManageJournal::class, 'createTaskRequest']);
    Route::delete('/close_journal/{id}', [ManageJournal::class, 'closeJournal']);
  //  ManageJournal followup
    Route::post('/add_journal_followup', [ManageJournalfollowup::class, 'Newfollowup'])->name('add_journal_followup');
    Route::get('/EditjournalFollowup/{id}', [ManageJournalfollowup::class, 'EditjournalFollowup'])->name('EditjournalFollowup');
    Route::post('/journal_followup_update/{id}/{cus}', [ManageJournalfollowup::class, 'FollowupUpdate']);
    Route::match(['get', 'post'],'/journal_followup', [ManageJournalfollowup::class, 'today_followup_list'])->name('journal-management-journal-followup');
    Route::match(['get', 'post'],'/journal_closed_followup', [ManageJournalfollowup::class, 'closed_followup_list'])->name('journal-management-journal-followup');
    Route::match(['get', 'post'],'/journal_reschedule_followup', [ManageJournalfollowup::class, 'reschedule_followup_list'])->name('journal-management-journal-followup');
    Route::match(['get', 'post'],'/journal_unfollowup', [ManageJournalfollowup::class, 'unfollowup_list'])->name('journal-management-journal-followup');
    
    Route::get('/journal_noc_generate/{id}', [ManageJournal::class, 'journal_noc_generate'])->name('journal_noc_generate');
    Route::get('/manage_journal_noc/{id}', [ManageJournal::class, 'journal_noc'])->name('manage_journal_noc');
    Route::get('/manage_journal_noc_thank_you/{id}', [ManageJournal::class, 'thank_you_NOC'])->name('manage_journal_noc_thank_you');
 
 // Manage Revision
  Route::match(['get','post'],'/manage_revision',  [ManageRevision::class, 'index'])->name('revision-management-manage-revision');
  Route::get('/jtl_verification_data/{id}',  [ManageRevision::class, 'JTLVerificationDataFetch']);
  Route::post('/verify_jtl/{id}',  [ManageRevision::class, 'verifyJTL']);
  Route::post('/jtl_accepted/{id}',  [ManageRevision::class, 'jtlAccepted']);
  Route::post('/jtl_rejected/{id}',  [ManageRevision::class, 'jtlRejected']);
  Route::post('/pc_journal_accepted/{id}',  [ManageRevision::class, 'pcJournalAccepted']);
  Route::post('/pc_journal_rejected/{id}',  [ManageRevision::class, 'pcJournalReject']);
  Route::post('/revision_pc_assign/{id}',  [ManageRevision::class, 'assignPC']);
  Route::post('/revision_staff_assign',  [ManageRevision::class, 'assignRevisionStaff']);
  Route::get('/revision_comments_view/{id}',  [ManageRevision::class, 'commentsView']);

// ^ Milestone Confirmation
  Route::match(['get', 'post'],'/milestone_confirmation', [MilestoneConfirmation::class, 'index'])->name('service-management-milestone-confirmation');
  Route::post('/accept_milestone/{id}', [MilestoneConfirmation::class, 'acceptMilestone']);
  Route::post('/reject_milestone/{id}', [MilestoneConfirmation::class, 'rejectMilestone']);


  
  // Journal Monitor
  Route::get('/journal_management/journal_monitor', [JournalMonitor::class, 'index'])->name('journal-management-journal-monitor');
  Route::post('/reviewed_files', [JournalMonitor::class, 'reviewedFiles'])->name('reviewed_files');
  Route::post('/with_editor_files', [JournalMonitor::class, 'withEditorFiles'])->name('with_editor_files');
  Route::post('/under_reviewer_journalsss', [JournalMonitor::class, 'underReviewerFiles'])->name('under_reviewer_journalsss');
  Route::post('/accepted_journalsss', [JournalMonitor::class, 'acceptedFiles'])->name('accepted_journalsss');
  Route::post('/rejected_journals', [JournalMonitor::class, 'rejectedFiles'])->name('rejected_journals');
  Route::post('/e_proofing_journalsss', [JournalMonitor::class, 'eProofingFiles'])->name('e_proofing_journalsss');
  Route::post('/published_files', [JournalMonitor::class, 'publishedFiles'])->name('published_files');
  Route::get('/view_journal/{id}', [JournalMonitor::class, 'viewJournal'])->name('view_journal');
  
   // task management
    Route::match(['get', 'post'], '/task_management_list', [TaskManagement::class, 'index'])->name('branch_manage_task');
    Route::get('task_staff_list', [TaskManagement::class, 'taskStaff']);
    Route::post('create_task', [TaskManagement::class, 'createTask']);
    Route::get('my-task-list', [TaskManagement::class, 'taskList']);
    Route::post('/task/mark-completed', [TaskManagement::class, 'markCompleted']);
    Route::post('/task/approve', [TaskManagement::class, 'approveTask']);
    Route::get('/task/edit/{id}', [TaskManagement::class, 'editTask']);
    Route::post('/task/update/{id}', [TaskManagement::class, 'updateTask']);
    Route::post('/task-complete/{id}', [TaskManagement::class, 'markComplete']);
    Route::post('/task-reopen/{id}', [TaskManagement::class, 'markReopen']);
    Route::post('/task/delete/{id}', [TaskManagement::class, 'delete']);

 //setting incentive
  Route::get('/branch_incentive', [ManageIncentive::class, 'index'])->name('branch-management-manage-incentive');
  Route::get('/incentive_role', [ManageIncentive::class, 'getroleIncentive'])->name('incentive_role');
  Route::get('/get-role-incentive-data', [ManageIncentive::class, 'getroleIncentivedata'])->name('get-role-incentive-data');
  Route::post('/incentive-create-update', [ManageIncentive::class, 'Incentivecreateupdate']);
  Route::get('/check-incentive', [ManageIncentive::class, 'checkIncentive'])->name('checkIncentive');

    Route::get('/get-incentive-criteria', [ManageIncentive::class, 'getCriteria'])->name('get-incentive-criteria');
    Route::post('/save-incentive-criteria', [ManageIncentive::class, 'saveCriteria']);

// Main Menu Starts metrics
  Route::get('/metrics', [ManageMetrics::class, 'index'])->name('metrics-manage-metrics');
   Route::get('/incentive', [ManageMetrics::class, 'incentive'])->name('metrics-manage-incentive');
  Route::get('/get-metrics', [ManageMetrics::class, 'getMetrics'])->name('get-metrics');
  Route::get('/get-incentive', [ManageMetrics::class, 'getIncentiveMetrics'])->name('get-incentive');
  Route::get('/get-Convertion-list', [ManageMetrics::class, 'getConvertedCustomers']);
  Route::get('/incentives/pi-calculation', [ManageMetrics::class, 'getcalculationCustomers']);
  Route::get('/incentives/eci-list', [ManageMetrics::class, 'geteciCustomers']);
  Route::get('/get-Collection-list', [ManageMetrics::class, 'getCollectionCustomers']);
  Route::get('/get-course-list', [ManageMetrics::class, 'getCourseCustomers']);
  Route::get('/incentives/call-list', [ManageMetrics::class, 'getCallCustomers']);
  Route::post('/fetch-incentive', [ManageMetrics::class, 'fetchIncentive']);
  Route::get('/my_incentive', [ManageMetrics::class, 'MyIncentive'])->name('my_incentive');
  Route::get('/my-incentive-get', [ManageMetrics::class, 'getMyIncentiveMetrics'])->name('my-incentive-get');
  Route::get('/incentives/cre-10x-list', [ManageMetrics::class, 'getCreCustomers']);

  Route::get('/get-si-list', [ManageMetrics::class, 'getSICustomers']);
  Route::get('/staff/pi-details', [ManageMetrics::class, 'getPIDetails']);
  Route::get('/staff/pi-post-details', [ManageMetrics::class, 'getPIPostDetails']);
  Route::get('/get-team-detail', [ManageMetrics::class, 'getTeamDetail']);

  Route::get('/product_nav_list', [ManageProducts::class, 'NavList'])->name('product_nav_list');
  Route::get('product_nav_type', [Product_category::class, 'NavList'])->name('product_nav_type');
  
  Route::post('/get-convertion', [ManageMetrics::class, 'getConvertion'])->name('get-convertion');
     Route::get('/get-journal-list', [ManageMetrics::class, 'getJournalLists']);
      Route::get('/incentives/performance-call-list', [ManageMetrics::class, 'getPerformanceCallCustomers']);
      Route::get('/incentives/cre-eci-list', [ManageMetrics::class, 'getCreEciCustomers']);
    Route::get('/incentives/cre-spot-list', [ManageMetrics::class, 'getCreSpotCustomers']);
    Route::get('/incentives/cre-referral-list', [ManageMetrics::class, 'getCreReferralCustomers']);
    Route::get('/incentives/cre-bonus-list', [ManageMetrics::class, 'getCreBonusCustomers']);
     Route::get('/incentives/performance-journal-list', [ManageMetrics::class, 'getPerformanceAttendance']);

     Route::get('/get-journalteamlead-list', [ManageMetrics::class, 'getJournalTLLists']);
     Route::get('/incentives/old-collection-list', [ManageMetrics::class, 'getOldCollectionCustomers']);
     Route::get('/incentives/collection-referral-list', [ManageMetrics::class, 'getCollectionReferralCustomers']);
     
//   forecast metrics
 Route::get('/manage_forecast_metrics', [ForecastMetrics::class, 'index'])->name('metrics-manage_forecast_metrics');
      Route::get('/get_forecast_metrics', [ForecastMetrics::class, 'getForecastMetrics']);

      // Over all Outstanding
  Route::get('/overall_outstanding', [OverallOutstanding::class, 'index'])->name('metrics-manage-Outstanding');
  Route::get('/metrics/overall-outstanding', [OverallOutstanding::class, 'overallOutstanding'])->name('overall.outstanding');

  Route::get('/manage_bh_incentive', [ManageBhIncentive::class, 'index'])->name('metrics-bh-incentive');
   Route::get('/get-bh-incentive', [ManageBhIncentive::class, 'getIncentiveMetrics'])->name('get-bh-incentive');
  

  //Product settings

  //Product Catagory
  Route::get('/settings/products/product_category', [Product_category::class, 'index'])->name('settings-product-settings');
  Route::get('/product_category_list', [Product_category::class, 'List'])->name('product_category_list');
  Route::post('/add_service', [Product_category::class, 'Add'])->name('add_service');
  Route::get('/service_edit/{id}', [Product_category::class, 'Edit'])->name('service_edit');
  Route::post('/product_category_update', [Product_category::class, 'Update'])->name('product_category_update');
  Route::post('/service_status/{id}', [Product_category::class, 'Status']);
  Route::delete('/service_delete/{id}', [Product_category::class, 'Delete']);
  //Product Varient    
  Route::get('/settings/products/product_variant', [Product_Variant::class, 'index'])->name('settings-product-settings');
  Route::post('/service_varient_status/{id}', [Product_Variant::class, 'Status']);
  Route::post('/service_varient_update', [Product_Variant::class, 'Update'])->name('service_varient_update');
  Route::post('/add_product_variant', [Product_Variant::class, 'Add'])->name('add_product_variant');
  Route::delete('/service_varient_delete/{id}', [Product_Variant::class, 'Delete']);
  //Product Variable
  Route::get('/settings/products/product_variable', [ProductVariable::class, 'index'])->name('settings-product-settings');
  Route::post('/add_service_variable', [ProductVariable::class, 'Add'])->name('add_service_variable');
  Route::post('/service_variable_status/{id}', [ProductVariable::class, 'Status']);
  Route::post('/service_variable_update', [ProductVariable::class, 'Update'])->name('service_variable_update');
  Route::delete('/service_variable_delete/{id}', [ProductVariable::class, 'Delete']);
  //Addonservicevarient
  Route::get('/settings/products/addon_variant', [Addon_Product_Variant::class, 'index'])->name('settings-product-settings');
  Route::post('/addon_varient_status/{id}', [Addon_Product_Variant::class, 'Status']);
  Route::post('/add_addonservice_varient', [Addon_Product_Variant::class, 'Add'])->name('add_addonservice_varient');
  Route::get('/addonservice_edit/{id}', [Addon_Product_Variant::class, 'Edit']);
  Route::post('/add_service_varient_update', [Addon_Product_Variant::class, 'Update'])->name('add_service_varient_update');
  Route::delete('/addonservice_varient_delete/{id}', [Addon_Product_Variant::class, 'Delete']);
  //addonvariable
  Route::get('/settings/products/addon_variable', [AddonVariable::class, 'index'])->name('settings-product-settings');
  Route::get('/get_variable_add_on', [AddonVariable::class, 'Get_list'])->name('get_variable_add_on');
  Route::get('/get_variable_add_on_by_id', [AddonVariable::class, 'Get_list_by_id'])->name('get_variable_add_on_by_id');
  Route::post('/add_addon_variable', [AddonVariable::class, 'Add'])->name('add_addon_variable');
  Route::post('/addon_variable_status/{id}', [AddonVariable::class, 'Status']);
  Route::delete('/addon_variable_delete/{id}', [AddonVariable::class, 'Delete']);
  Route::post('/addon_variable_update', [AddonVariable::class, 'Update'])->name('addon_variable_update');

  // Product Delivarables
  Route::get('/settings/products/product_delivarables', [Product_delivarables::class, 'index'])->name('settings-product-settings');
  Route::post('/settings/products/delivarable/create', [Product_delivarables::class, 'create'])->name('/settings/products/delivarable_create');
  Route::post('/settings/products/delivarable/update', [Product_delivarables::class, 'Update'])->name('/settings/products/delivarable_update');
  Route::post('/settings/products/delivarables_status/{id}', [Product_delivarables::class, 'Status']);
  Route::delete('/settings/products/delivarable_delete/{id}', [Product_delivarables::class, 'Delete'])->name('/settings/products/delivarables_delete');

  // SlotNotes
  Route::get('/settings/products/slot_notes', [SlotNotes::class, 'index'])->name('settings-product-settings');
  Route::post('/slot_notes_create', [SlotNotes::class, 'create'])->name('slot_notes_create');
  Route::post('/slot_notes_status/{id}', [SlotNotes::class, 'Status']);
  Route::delete('/slot_notes_delete/{id}', [SlotNotes::class, 'Delete'])->name('slot_notes_delete');
  Route::post('/slot_notes_update', [SlotNotes::class, 'Update'])->name('slot_notes_update');
  Route::get('/edit_slot_notes/{id}', [SlotNotes::class, 'Edit']);
  Route::get('/delete_data_slot_notes/{id}', [SlotNotes::class, 'deleteData']);

  // Notes Setting
  Route::match(['get', 'post'], '/settings/product/notes', [Notes::class, 'index'])->name('settings-product-settings');
  Route::post('/add_notes', [Notes::class, 'Add'])->name('add_notes');
  Route::get('/notes_edit/{id}', [Notes::class, 'Edit'])->name('notes_edit');
  Route::post('/notes_update', [Notes::class, 'Update'])->name('notes_update');
  Route::delete('/notes_delete/{id}', [Notes::class, 'Delete'])->name('notes_delete');
  Route::post('/notes_status_change/{id}', [Notes::class, 'Status'])->name('notes_status_change');

  // Terms and Condition Setting
  Route::match(['get', 'post'], '/settings/product/terms_conditions', [TermsConditions::class, 'index'])->name('settings-product-settings');
  Route::post('/add_terms_conditions', [TermsConditions::class, 'Add'])->name('add_terms_conditions');
  Route::get('/terms_conditions_edit/{id}', [TermsConditions::class, 'Edit'])->name('terms_conditions_edit');
  Route::post('/terms_conditions_update', [TermsConditions::class, 'Update'])->name('terms_conditions_update');
  Route::delete('/terms_conditions_delete/{id}', [TermsConditions::class, 'Delete'])->name('terms_conditions_delete');
  Route::post('/terms_conditions_status_change/{id}', [TermsConditions::class, 'Status'])->name('terms_conditions_status_change');

  Route::get('/production_settings/qc_checklist', [TaskChecklist::class, 'index'])->name('settings-production-settings');
  Route::post('/create_qc_checklist', [TaskChecklist::class, 'create'])->name('create_qc_checklist');
  Route::post('/update_qc_checklist', [TaskChecklist::class, 'Update'])->name('update_qc_checklist');
  Route::post('/status_qc_checklist/{id}', [TaskChecklist::class, 'Status'])->name('status_task_checklist');
  Route::delete('/delete_qc_checklist/{id}', [TaskChecklist::class, 'Delete'])->name('delete_task_checklist');
  Route::get('/edit_qc_checklist/{id}', [TaskChecklist::class, 'Edit']);
  Route::get('/delete_data_qc_checklist/{id}', [TaskChecklist::class, 'deleteData']);
  Route::get('/list_qc_checklist', [TaskChecklist::class, 'list']);
  
  Route::get('/production_settings/delivery_attachment_checklist', [DeliveryAttachmentChecklist::class, 'index'])->name('settings-production-settings');
  Route::post('/create_delivery_attachment_checklist', [DeliveryAttachmentChecklist::class, 'create'])->name('create_delivery_attachment_checklist');
  Route::post('/update_delivery_attachment_checklist', [DeliveryAttachmentChecklist::class, 'Update'])->name('update_delivery_attachment_checklist');
  Route::post('/status_delivery_attachment_checklist/{id}', [DeliveryAttachmentChecklist::class, 'Status'])->name('status_task_checklist');
  Route::delete('/delete_delivery_attachment_checklist/{id}', [DeliveryAttachmentChecklist::class, 'Delete'])->name('delete_task_checklist');
  Route::get('/edit_delivery_attachment_checklist/{id}', [DeliveryAttachmentChecklist::class, 'Edit']);
  Route::get('/delete_data_delivery_attachment_checklist/{id}', [DeliveryAttachmentChecklist::class, 'deleteData']);
  Route::get('/list_delivery_attachment_checklist', [DeliveryAttachmentChecklist::class, 'list']);
  
  // Unit Settings
  Route::get('/settings/product/unit', [Unit::class, 'index'])->name('settings-product-settings');
  Route::post('/add_unit', [Unit::class, 'Add'])->name('add_unit');
  Route::post('/update_unit', [Unit::class, 'Update'])->name('update_unit');
  Route::post('/unit_status/{id}', [Unit::class, 'Status']);
  Route::delete('/delete_unit/{id}', [Unit::class, 'Delete']);

  Route::get('/production_settings/delivery_checklist', [DeliveryChecklist::class, 'index'])->name('settings-production-settings');
  Route::post('/create_delivery_checklist', [DeliveryChecklist::class, 'create'])->name('create_delivery_checklist');
  Route::post('/update_delivery_checklist', [DeliveryChecklist::class, 'Update'])->name('update_delivery_checklist');
  Route::post('/status_delivery_checklist/{id}', [DeliveryChecklist::class, 'Status'])->name('status_task_checklist');
  Route::delete('/delete_delivery_checklist/{id}', [DeliveryChecklist::class, 'Delete'])->name('delete_task_checklist');
  Route::get('/edit_delivery_checklist/{id}', [DeliveryChecklist::class, 'Edit']);
  Route::get('/delete_data_delivery_checklist/{id}', [DeliveryChecklist::class, 'deleteData']);
  Route::get('/list_delivery_checklist', [DeliveryChecklist::class, 'list']);
  
   // Training Settings

    // Training Document Category
    Route::get('/training/category', [TrainingCategory::class, 'index'])->name('settings-training-settings');
    Route::post('/create_training_category', [TrainingCategory::class, 'store'])->name('create_training_category');
    Route::post('/status_training_category/{id}', [TrainingCategory::class, 'Status']);
    Route::delete('/delete_training_category/{id}', [TrainingCategory::class, 'Delete']);
    Route::post('/update_training_category', [TrainingCategory::class, 'Update'])->name('update_training_category');

    // Training Document Sub Category
    Route::get('/training/sub_category', [TrainingSubCategory::class, 'index'])->name('settings-training-settings');
    Route::post('/create_training_sub_category', [TrainingSubCategory::class, 'store'])->name('create_training_sub_category');
    Route::post('/status_training_sub_category/{id}', [TrainingSubCategory::class, 'Status']);
    Route::delete('/delete_training_sub_category/{id}', [TrainingSubCategory::class, 'Delete']);
    Route::post('/update_training_sub_category', [TrainingSubCategory::class, 'Update'])->name('update_training_sub_category');
    Route::get('/edit_sub_category_data/{id}', [TrainingSubCategory::class, 'Edit']);

  // Work Order Checklist
  Route::get('/production_settings/work_order_checklist', [WorkOrderChecklist::class, 'index'])->name('settings-production-settings');
  Route::post('/create_work_order_checklist', [WorkOrderChecklist::class, 'create'])->name('create_work_order_checklist');
  Route::post('/update_work_order_checklist', [WorkOrderChecklist::class, 'Update'])->name('update_work_order_checklist');
  Route::post('/status_work_order_checklist/{id}', [WorkOrderChecklist::class, 'Status']);
  Route::delete('/delete_work_order_checklist/{id}', [WorkOrderChecklist::class, 'Delete']);
  Route::get('/edit_work_order_checklist/{id}', [WorkOrderChecklist::class, 'Edit']);
  Route::get('/delete_data_work_order_checklist/{id}', [WorkOrderChecklist::class, 'deleteData']);


  // Payment Slot
  Route::get('/settings/products/payment_slot', [Payment_Slot::class, 'index'])->name('settings-product-settings');
  Route::post('/settings/products/payment_slot/create', [Payment_Slot::class, 'create'])->name('/settings/products/payment_slot_create');
  Route::post('/settings/products/payment_slot/update', [Payment_Slot::class, 'Update'])->name('/settings/products/payment_slot_update');
  Route::post('/settings/products/payment_slot_status/{id}', [Payment_Slot::class, 'Status']);
  Route::delete('/settings/products/payment_slot_delete/{id}', [Payment_Slot::class, 'Delete'])->name('/settings/products/payment_slot_delete');

  // Account Settings
//   Route::get('/account_settings/ledger', [Ledger::class, 'index'])->name('ledger_list');
//   Route::post('/account_settings/ledger/create', [Ledger::class, 'create'])->name('ledger_create');
//   Route::post('/account_settings/ledger/update', [Ledger::class, 'Update'])->name('ledger_update');
//   Route::post('/ledger_status/{id}', [Ledger::class, 'Status']);
//   Route::delete('/ledger_delete/{id}', [Ledger::class, 'Delete'])->name('ledger_delete');

//   Route::get('/account_settings/sub_ledger', [SubLedger::class, 'index'])->name('sub_ledger_list');
//   Route::post('/sub_ledger/create', [SubLedger::class, 'create'])->name('sub_ledger_create');
//   Route::post('sub_ledger/update', [SubLedger::class, 'update'])->name('sub_ledger_update');
//   Route::post('/sub_ledger_status/{id}', [SubLedger::class, 'Status']);
//   Route::delete('/sub_ledger_delete/{id}', [SubLedger::class, 'Delete'])->name('sub_ledger_delete');



  //requirement reject Reason
  Route::match(['get', 'post'], '/settings/lead/requirement_reason', [RequirementRejectReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/requirement_reject_reason_add', [RequirementRejectReason::class, 'Add'])->name('requirement_reject_reason_add');
  Route::get('requirement_reject_reason_list', [RequirementRejectReason::class, 'List'])->name('requirement_reject_reason_list');
  Route::post('/requirement_reject_reason_status/{id}', [RequirementRejectReason::class, 'Status']);
  Route::delete('/requirement_reject_reason_delete/{id}', [RequirementRejectReason::class, 'Delete']);
  Route::post('/requirement_reject_reason_update', [RequirementRejectReason::class, 'Update'])->name('requirement_reject_reason_update');

  // lead metrics
  Route::get('/settings/lead/lead_metrics', [LeadMetrics::class, 'index'])->name('settings-lead-settings');
  Route::post('/lead_metrics_update', [LeadMetrics::class, 'Update'])->name('lead_metrics_update');

  //   whatsapp config
  Route::match(['get', 'post'], '/settings/common/whatsapp_api', [WhatsappApiConfigure::class, 'index'])->name('settings-common-settings');
  Route::get('/whatsapp_api_list', [WhatsappApiConfigure::class, 'List'])->name('whatsapp_api_list');
  Route::post('/whatsapp_api_configure_add', [WhatsappApiConfigure::class, 'Add'])->name('whatsapp_api_configure_add');
  Route::post('/whatsapp_api_configure_update', [WhatsappApiConfigure::class, 'Update'])->name('whatsapp_api_configure_update');
  Route::delete('/whatsapp_api_configure_delete/{id}', [WhatsappApiConfigure::class, 'Delete'])->name('whatsapp_api_configure_delete');
  Route::post('/whatsapp_api_configure_status_change/{id}', [WhatsappApiConfigure::class, 'Status'])->name('whatsapp_api_configure_status_change');

  // sms Template
  Route::get('/settings/common/sms_template', [SmsTemplate::class, 'index'])->name('settings-common-settings');
  Route::post('/add_sms_template', [SmsTemplate::class, 'Add'])->name('add_sms_template');
  Route::get('/sms_template_edit', [SmsTemplate::class, 'Edit'])->name('sms_template_edit');
  Route::post('/sms_template_update', [SmsTemplate::class, 'Update'])->name('sms_template_update');
  Route::delete('/sms_template_delete/{id}', [SmsTemplate::class, 'Delete'])->name('sms_template_delete');
  Route::post('/sms_template_status_change/{id}', [SmsTemplate::class, 'Status'])->name('sms_template_status_change');
  Route::get('/sms/balance', [SmsTemplate::class, 'getBalance']);

  // email Template
  Route::get('/settings/common/email_template', [EmailTemplate::class, 'index'])->name('settings-common-settings');
  Route::get('/email_template_list', [EmailTemplate::class, 'List'])->name('email_template_list');
  Route::get('/settings/email_template/email_template_add', [EmailTemplate::class, 'EmailAdd'])->name('settings-common-settings');
  Route::post('/email_template_add', [EmailTemplate::class, 'Add'])->name('email_template_add');
  Route::get('/email_template_edit/{id}', [EmailTemplate::class, 'Edit'])->name('email_template_edit');;
  Route::post('/email_template_update', [EmailTemplate::class, 'Update'])->name('email_template_update');
  Route::delete('/email_template_delete/{id}', [EmailTemplate::class, 'Delete'])->name('email_template_delete');
  Route::post('/email_template_status/{id}', [EmailTemplate::class, 'Status'])->name('email_template_status');

  // CommunicationHandler Setting
  Route::match(['get', 'post'], '/settings/common/communication_handle', [CommunicationHandler::class, 'index'])->name('settings-common-settings');
  Route::post('/add_communication_module', [CommunicationHandler::class, 'Add'])->name('add_communication_module');
  Route::delete('/delete__communication_module/{id}', [CommunicationHandler::class, 'Delete'])->name('delete__communication_module');
  Route::post('/communication_status_change/{id}', [CommunicationHandler::class, 'Status'])->name('communication_status_change');

  // chotta_links
  Route::match(['get', 'post'], '/settings/common/chotta_links', [ChottaApi::class, 'index'])->name('settings-common-settings');
  Route::match(['get', 'post'], '/settings/common/chotta_links_refresh', [ChottaApi::class, 'ApiRefresh'])->name('settings-common-settings');

  // Marketing Settings

  // Area
  Route::get('/settings/marketing/area', [Area::class, 'index'])->name('settings-marketing-settings');
  Route::post('/add_marketing_area', [Area::class, 'Add'])->name('add_marketing_area');
  Route::post('/marketing_area_update', [Area::class, 'Update'])->name('marketing_area_update');
  Route::post('/marketing_area_status/{id}', [Area::class, 'Status']);
  Route::delete('/marketing_area_delete/{id}', [Area::class, 'Delete']);

  // MarketingCategory
  Route::get('/settings/marketing/category', [MarketingCategory::class, 'index'])->name('settings-marketing-settings');
  Route::get('marketing_category', [MarketingCategory::class, 'List'])->name('marketing_category');
  Route::post('/add_marketing_category', [MarketingCategory::class, 'Add'])->name('add_marketing_category');
  Route::post('/marketing_category_update', [MarketingCategory::class, 'Update'])->name('marketing_category_update');
  Route::delete('/marketing_category_delete/{id}', [MarketingCategory::class, 'Delete']);
  Route::post('/marketing_category_status/{id}', [MarketingCategory::class, 'Status']);

  // MarketingType
  Route::get('/settings/marketing/type', [MarketingType::class, 'index'])->name('settings-marketing-settings');
  Route::get('marketing_type', [MarketingType::class, 'List'])->name('marketing_type');
  Route::post('/add_marketing_type', [MarketingType::class, 'Add'])->name('add_marketing_type');
  Route::get('/marketing_type_edit/{id}', [MarketingType::class, 'Edit'])->name('marketing_type_edit');
  Route::post('/marketing_type_update', [MarketingType::class, 'Update'])->name('marketing_type_update');
  Route::delete('/marketing_type_delete/{id}', [MarketingType::class, 'Delete']);
  Route::post('/marketing_type_status/{id}', [MarketingType::class, 'Status']);

  //Marketting Vendor
  Route::get('/settings/marketing/vendor', [Vendor::class, 'index'])->name('settings-marketing-settings');
  Route::post('/settings/marketing/vendor', [Vendor::class, 'Add'])->name('add_marketing_vendor');
  Route::post('/marketing_vendor_update', [Vendor::class, 'Update'])->name('marketing_vendor_update');
  Route::delete('/marketing_vendor_delete/{id}', [Vendor::class, 'Delete']);
  Route::post('/marketing_vendor_status/{id}', [Vendor::class, 'Status']);

  // Marketing Zone
  Route::get('/settings/marketing/zone', [Zone::class, 'index'])->name('settings-marketing-settings');
  Route::post('/add_marketing_zone', [Zone::class, 'Add'])->name('add_marketing_zone');
  Route::post('/marketing_zone_update', [Zone::class, 'Update'])->name('marketing_zone_update');
  Route::post('/marketing_zone_status/{id}', [Zone::class, 'Status']);
  Route::delete('/marketing_zone_delete/{id}', [Zone::class, 'Delete']);

  // CampaignChecklist
  Route::get('/settings/marketing/campaign_checklist', [CampaignChecklist::class, 'index'])->name('settings-marketing-settings');
  Route::post('/add_camp_checklist', [CampaignChecklist::class, 'Add'])->name('add_camp_checklist');
  Route::post('/campaign_checklist_update', [CampaignChecklist::class, 'Update'])->name('campaign_checklist_update');
  Route::post('/campaign_checklist_status/{id}', [CampaignChecklist::class, 'Status']);
  Route::delete('/campaign_checklist_delete/{id}', [CampaignChecklist::class, 'Delete']);

  // CampaignStatus
  Route::get('/settings/marketing/campaign_status', [CampaignStatus::class, 'index'])->name('settings-marketing-settings');
  Route::post('/settings/marketing/campaign_status', [CampaignStatus::class, 'Add'])->name('add_camp_status');
  Route::post('/camp_status_update', [CampaignStatus::class, 'Update'])->name('camp_status_update');
  Route::post('/campaign_status/{id}', [CampaignStatus::class, 'Status']);
  Route::delete('/campaign_status/{id}', [CampaignStatus::class, 'Delete']);

  // marketing category
  Route::get('/settings/marketing/marketing_kit_category', [MarketingKitCategory::class, 'index'])->name('settings-marketing-settings');
  Route::get('/MarketingKitCategory', [MarketingKitCategory::class, 'List'])->name('MarketingKitCategory');
  Route::post('/add_MarketingKitCategory', [MarketingKitCategory::class, 'Add'])->name('add_MarketingKitCategory');
  Route::get('/MarketingKitCategory-edit/{id}', [MarketingKitCategory::class, 'Edit']);
  Route::post('/MarketingKitCategory-update/{id}', [MarketingKitCategory::class, 'Update'])->name('MarketingKitCategory-update');
  Route::delete('/MarketingKitCategory-delete/{id}', [MarketingKitCategory::class, 'Delete']);
  Route::post('/MarketingKitCategory-status/{id}', [MarketingKitCategory::class, 'Status']);

  // marketingsubcategory
  Route::get('/settings/marketing/marketing_kit_subcategory', [MarketingKitSubCategory::class, 'index'])->name('settings-marketing-settings');
  Route::get('MarketingKitSubCategory', [MarketingKitSubCategory::class, 'List'])->name('MarketingKitSubCategory');
  Route::post('/add_MarketingKitSubCategory', [MarketingKitSubCategory::class, 'Add'])->name('add_MarketingKitSubCategory');
  Route::get('/MarketingKitSubCategory-edit/{id}', [MarketingKitSubCategory::class, 'Edit']);
  Route::post('/MarketingKitSubCategory-update', [MarketingKitSubCategory::class, 'Update'])->name('MarketingKitSubCategory-update');
  Route::delete('/MarketingKitSubCategory-delete/{id}', [MarketingKitSubCategory::class, 'Delete']);
  Route::post('/MarketingKitSubCategory-status/{id}', [MarketingKitSubCategory::class, 'Status']);

  // Variable
  Route::get('/settings/marketing/variable', [Variable::class, 'index'])->name('settings-marketing-settings');
  Route::get('/Variable', [Variable::class, 'List'])->name('Variable');
  Route::post('/add_Variable', [Variable::class, 'Add'])->name('add_Variable');
  Route::get('/Variable-edit/{id}', [Variable::class, 'Edit']);
  Route::post('/Variable-update/{id}', [Variable::class, 'Update'])->name('Variable-update');
  Route::delete('/Variable-delete/{id}', [Variable::class, 'Delete']);
  Route::post('/Variable-status/{id}', [Variable::class, 'Status']);

  // Proposal Reject Reason
  Route::get('/settings/lead/proposal_reject_reason', [ProposalRejectReason::class, 'index'])->name('settings-lead-settings');
  Route::post('/proposal_reject_reason_add', [ProposalRejectReason::class, 'Add'])->name('proposal_reject_reason_add');
  Route::post('/proposal_reject_reason_status/{id}', [ProposalRejectReason::class, 'Status']);
  Route::delete('/proposal_reject_reason_delete/{id}', [ProposalRejectReason::class, 'Delete']);
  Route::post('/proposal_reject_reason_update', [ProposalRejectReason::class, 'Update'])->name('proposal_reject_reason_update');
  // Appointment Category
  Route::get('/settings/lead/appointment_category', [AppointmentCategory::class, 'index'])->name('settings-lead-settings');
  Route::post('/appointment_category_add', [AppointmentCategory::class, 'Add'])->name('appointment_category_add');
  Route::post('/appointment_category_status/{id}', [AppointmentCategory::class, 'Status']);
  Route::delete('/appointment_category_delete/{id}', [AppointmentCategory::class, 'Delete']);
  Route::post('/appointment_category_update', [AppointmentCategory::class, 'Update'])->name('appointment_category_update');
  
   // Lead Source Mapping
  Route::get('/settings/lead/lead_source_mapping', [LeadSourceMapping::class, 'index'])->name('settings-lead-settings');
  Route::get('/branch_dropdown_list', [LeadSourceMapping::class, 'branch_dropdown_list']);
  Route::get('/lead_source_staff', [LeadSourceMapping::class, 'lead_source_staff']);
  Route::post('/add_lead_source_mapping', [LeadSourceMapping::class, 'Add'])->name('add_lead_source_mapping');
  Route::get('/edit_lead_source_mapping/{id}', [LeadSourceMapping::class, 'Edit']);
  Route::get('/edit_branch_list/{id}', [LeadSourceMapping::class, 'edit_branch_list']);
  Route::post('/lead_source_mapping_update', [LeadSourceMapping::class, 'Update'])->name('lead_source_mapping_update');
  
  
   // Integration
  Route::get('/settings/common/integration', [Integration::class, 'index'])->name('settings-common-settings');
  Route::post('/add_integration', [Integration::class, 'Create'])->name('add_integration');
  Route::post('/integration_status/{id}', [Integration::class, 'Status']);
  Route::delete('/delete_integration/{id}', [Integration::class, 'Delete']);
  Route::get('/integration_edit/{id}', [Integration::class, 'Edit']);
  Route::post('/update_integration', [Integration::class, 'Update'])->name('update_integration');
   // Type
    Route::get('/settings/customer_settings/type', [CredentialType::class, 'index'])->name('settings-customer-settings');
    Route::post('/create_type', [CredentialType::class, 'Create'])->name('create_type');
    Route::post('/update_type', [CredentialType::class, 'Update'])->name('update_type');
    Route::delete('/delete_type/{id}', [CredentialType::class, 'Delete']);
    Route::post('/status_type/{id}', [CredentialType::class, 'Status']);
    
    Route::get('/settings/customer_settings/feedback/feedback_list', [CustomerFeedbackQuestion::class, 'Index'])->name('settings-customer-settings');
  Route::get('/settings/customer_settings/feedback/feedback_questions_add', [CustomerFeedbackQuestion::class, 'feedbackQuestionsAdd'])->name('settings-customer-settings');
  Route::get('/settings/customer_settings/feedback/feedback_questions_edit', [CustomerFeedbackQuestion::class, 'feedbackQuestionsEdit'])->name('settings-customer-settings');
  Route::post('/feedback_question_add', [CustomerFeedbackQuestion::class, 'Add'])->name('feedback_student_question_add');
  Route::get('/feedback_questions_edit/{id}', [CustomerFeedbackQuestion::class, 'Edit'])->name('feedback_edit');
  Route::post('/update_feedback_question', [CustomerFeedbackQuestion::class, 'Update'])->name('update_feedback_question');
  Route::post('/feedback_question_status/{id}', [CustomerFeedbackQuestion::class, 'Status']);
  Route::delete('/feedback_question_delete/{id}', [CustomerFeedbackQuestion::class, 'Delete']);
  
    
    // Appointment Mode Settings
    Route::get('/settings/customer_settings/appointment_mode', [Appointment_mode::class, 'index'])->name('settings-customer-settings');
    Route::post('/create_appointment_mode', [Appointment_mode::class, 'Create'])->name('create_appointment_mode');
    Route::post('/update_appointment_mode', [Appointment_mode::class, 'Update'])->name('update_appointment_mode');
    Route::post('/status_appointment_mode/{id}', [Appointment_mode::class, 'Status']);
    Route::delete('/delete_appointment_mode/{id}', [Appointment_mode::class, 'Delete']);
        //Refund Checklist
    Route::get('/settings/customer_settings/refund_checklist', [RefundChecklist::class, 'index'])->name('settings-common');
    Route::post('/add_refund_checklist', [RefundChecklist::class, 'Add'])->name('add_refund_checklist');
    Route::post('/refund_checklist_update', [RefundChecklist::class, 'Update'])->name('refund_checklist_update');
    Route::post('/refund_checklist_status/{id}', [RefundChecklist::class, 'Status'])->name('refund_checklist_status');
    Route::delete('/refund_checklist_delete/{id}', [RefundChecklist::class, 'Delete'])->name('refund_checklist_delete');
    // Connecting Way Settings
    Route::get('/settings/customer_settings/connecting_way', [ConnectingWay::class, 'index'])->name('settings-customer-settings');
    Route::post('/create_connecting_way', [ConnectingWay::class, 'Create'])->name('create_connecting_way');
    Route::post('/status_connecting_way/{id}', [ConnectingWay::class, 'Status']);
    Route::delete('/delete_connecting_way/{id}', [ConnectingWay::class, 'Delete']);
    Route::post('/update_connecting_way', [ConnectingWay::class, 'Update'])->name('update_connecting_way');

    // Review Link Settings
    Route::get('/settings/customer_settings/review_link', [ReviewLink::class, 'index'])->name('settings-customer-settings');
    Route::post('/create_review_link', [ReviewLink::class, 'Create'])->name('create_review_link');
    Route::post('/status_review_link/{id}', [ReviewLink::class, 'Status']);
    Route::delete('/delete_review_link/{id}', [ReviewLink::class, 'Delete']);
    Route::post('/update_review_link', [ReviewLink::class, 'Update'])->name('update_review_link');
    
      Route::get('/settings/customer_settings/ticket_relevant', [TicketRelevant::class, 'index'])->name('settings-customer-settings');
  Route::post('/create_ticket_relevant', [TicketRelevant::class, 'create'])->name('create_ticket_relevant');
  Route::post('/update_ticket_relevant', [TicketRelevant::class, 'Update'])->name('update_ticket_relevant');
  Route::post('/status_ticket_relevant/{id}', [TicketRelevant::class, 'Status'])->name('status_ticket_relevant');
  Route::delete('/status_ticket_relevant/{id}', [TicketRelevant::class, 'Delete'])->name('status_ticket_relevant');
  Route::get('/edit_ticket_relevant/{id}', [TicketRelevant::class, 'Edit']);
  Route::get('/delete_data_ticket_relevant/{id}', [TicketRelevant::class, 'deleteData']);
  Route::get('/list_ticket_relevant', [TicketRelevant::class, 'list']);
  

  // Settings Menu End
  //Business Analysis
  // Lead Analysis
  Route::get('/manage_reports/lead_report', [LeadReports::class, 'index'])->name('reports-lead_reports'); //Lead - Monthly view
  Route::match(['get', 'post'], '/manage_reports/leads_data', [LeadReports::class, 'getLeadsData'])->name('leads_data'); //Lead - Monthly Ajax
  Route::get('/manage_reports/lead_report_yearly', [LeadReports::class, 'yearly_lead'])->name('reports-lead_reports'); //Lead - Yearly view
  Route::match(['get', 'post'], '/manage_reports/yearly_leads_data', [LeadReports::class, 'getLeadsYearlyData'])->name('yearly_leads_data'); //Lead - Yearly Ajax
  Route::get('/manage_reports/lead_src_report', [LeadReports::class, 'lead_src_month'])->name('reports-lead_reports'); //Lead Source - Monthly view
  Route::match(['get', 'post'], '/manage_reports/leads_src_data', [LeadReports::class, 'getLeadsSourceData'])->name('leads_src_data'); //Lead Source - Monthly Ajax
  Route::get('/manage_reports/lead_src_report_yearly', [LeadReports::class, 'yearly_lead_src'])->name('reports-lead_reports'); //Lead Source - Yearly view
  Route::match(['get', 'post'], '/manage_reports/leads_src_data_yearly', [LeadReports::class, 'getLeadsSourceYearData'])->name('leads_src_data_yearly'); //Lead Source - Yearly Ajax
  Route::match(['get', 'post'], '/manage_reports/get_lead_source_list', [LeadReports::class, 'get_lead_source_list'])->name('get_lead_source_list'); //Lead Type List Ajax
  Route::get('/manage_reports/sales_lead_report', [LeadReports::class, 'sales_lead_month'])->name('reports-lead_reports'); //Sales Executive - Monthly view
  Route::match(['get', 'post'], '/manage_reports/sales_lead_data', [LeadReports::class, 'getSalesMonthlyData'])->name('sales_lead_data'); //Sales Executive - Monthly Ajax
  Route::get('/manage_reports/sales_yearly_report', [LeadReports::class, 'yearly_lead_sales'])->name('reports-lead_reports'); //Sales Executive - Yearly view
  Route::match(['get', 'post'], '/manage_reports/sales_lead_yearly_data', [LeadReports::class, 'getSalesYearlyData'])->name('sales_lead_yearly_data'); //Sales Executive - Yearly Ajax
  Route::get('/manage_reports/sales_lead_pre_report', [LeadReports::class, 'sales_lead_pre_month'])->name('reports-lead_reports'); //Sales Executive - Monthly view
  Route::match(['get', 'post'], '/manage_reports/sales_lead_pre_data', [LeadReports::class, 'getSalesPreMonthlyData'])->name('sales_lead_pre_data'); //Sales Executive - Monthly Ajax
  Route::get('/manage_reports/sales_pre_yearly_report', [LeadReports::class, 'yearly_lead_sales_pre'])->name('reports-lead_reports'); //Sales Executive - Yearly view
  Route::match(['get', 'post'], '/manage_reports/sales_lead_pre_yearly_data', [LeadReports::class, 'getSalesPreYearlyData'])->name('sales_lead_pre_yearly_data'); //Sales Executive - Yearly Ajax
  Route::match(['get', 'post'], '/manage_reports/get_sales_executive_list', [LeadReports::class, 'SalesExcutiveStaffList'])->name('get_sales_executive_list'); //Sales Executive - List Ajax
  Route::get('/manage_reports/week_lead_report', [LeadReports::class, 'week_lead_month'])->name('reports-lead_reports'); //Weekly - Monthly view
  Route::match(['get', 'post'], '/manage_reports/week_lead_report_data', [LeadReports::class, 'getWeeklyMonthData'])->name('week_lead_report_data'); //Weekly - Monthly view
  Route::get('/manage_reports/week_yearly_report', [LeadReports::class, 'yearly_lead_weekly'])->name('reports-lead_reports'); //Weekly - Yearly view
  Route::match(['get', 'post'], '/manage_reports/week_yearly_report_data', [LeadReports::class, 'getWeeklyYearlyData'])->name('week_yearly_report_data'); //Weekly - Yearly view
  
  //Accounts Analysis
  Route::get('/manage_reports/branch_income_yearly', [AccountsReport::class, 'index'])->name('reports-accounts-report');
  Route::match(['get', 'post'], '/manage_reports/branch_income_yearly_data', [AccountsReport::class, 'BranchIncomeYearData'])->name('branch_income_yearly_data');
  Route::get('/manage_reports/branch_income_monthly', [AccountsReport::class, 'branch_income_monthly'])->name('reports-accounts-report');
  Route::match(['get', 'post'], '/manage_reports/branch_income_monthly_data', [AccountsReport::class, 'BranchIncomeMonthData'])->name('branch_income_monthly_data');
  Route::get('/manage_reports/incomevsexp_month_list', [AccountsReport::class, 'incomevsexp_month_list'])->name('reports-accounts-report');
  Route::match(['get', 'post'], '/manage_reports/incomevsexp_month_data', [AccountsReport::class, 'IncomevsExpMonthlyData'])->name('incomevsexp_month_data');
  Route::get('/manage_reports/incomevsexp_yr_list', [AccountsReport::class, 'incomevsexp_yr_list'])->name('reports-accounts-report');
  Route::match(['get', 'post'], '/manage_reports/incomevsexp_yr_data', [AccountsReport::class, 'IncomevsExpYearlyData'])->name('incomevsexp_yr_data');
  Route::match(['get', 'post'], '/manage_reports/get_branch_list_data', [AccountsReport::class, 'get_type_wise_branch_list'])->name('get_branch_list_data');
  
  //Other Analysis
  Route::get('/manage_reports/events_yearly', [OtherReport::class, 'index'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/events_yearly_data', [OtherReport::class, 'EventYearlyData'])->name('events_yearly_data');
  Route::get('/manage_reports/events_monthly', [OtherReport::class, 'events_monthly'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/events_monthly_data', [OtherReport::class, 'EventMonthlyData'])->name('events_monthly_data');
  Route::get('/manage_reports/marketing_activity_yearly', [OtherReport::class, 'marketing_activity_yearly'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/marketing_activity_yearly_data', [OtherReport::class, 'MarketingActivityYearlyData'])->name('marketing_activity_yearly_data');
  Route::get('/manage_reports/marketing_activity_monthly', [OtherReport::class, 'marketing_activity_monthly'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/marketing_activity_monthly_data', [OtherReport::class, 'MarketingActivityMonthlyData'])->name('marketing_activity_monthly_data');
  Route::get('/manage_reports/exam_completed_yearly', [OtherReport::class, 'exam_completed_yearly'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/exam_completed_yearly_data', [OtherReport::class, 'ExamCompletedYearData'])->name('exam_completed_yearly_data');
  Route::get('/manage_reports/exam_completed_monthly', [OtherReport::class, 'exam_completed_monthly'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/exam_completed_monthly_data', [OtherReport::class, 'ExamCompletedMonthData'])->name('exam_completed_monthly_data');
  Route::get('/manage_reports/staff_yearly', [OtherReport::class, 'staff_yearly'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/staff_yearly_data', [OtherReport::class, 'StaffYearData'])->name('staff_yearly_data');
  Route::get('/manage_reports/staff_monthly', [OtherReport::class, 'staff_monthly'])->name('reports-other-report');
  Route::match(['get', 'post'], '/manage_reports/staff_monthly_data', [OtherReport::class, 'StaffMonthData'])->name('staff_monthly_data');
  Route::match(['get', 'post'], '/manage_reports/get_all_exam_list', [OtherReport::class, 'get_all_exam_list'])->name('get_all_exam_list');
  Route::match(['get', 'post'], '/manage_reports/get_other_report_department_list', [OtherReport::class, 'get_other_report_department_list'])->name('get_other_report_department_list');

// Customer Analysis
Route::get('/manage_reports/customer_drop_report_yearly', [CustomerReport::class, 'customer_drop'])->name('reports-customer_report'); //Drop Cutsomer - yearly View
  Route::match(['get', 'post'], '/manage_reports/customer_drop_report_yearly_data', [CustomerReport::class, 'CusDropYearlyData'])->name('customer_drop_report_yearly_data'); //Drop Cutsomer - yearly Ajax
  Route::get('/manage_reports/customer_drop_report', [CustomerReport::class, 'cus_drop_monthly'])->name('reports-customer_report'); //Drop Cutsomer - Monthly View
  Route::match(['get', 'post'], '/manage_reports/customer_drop_report_data', [CustomerReport::class, 'CusDropMonthlyData'])->name('customer_drop_report_data'); //Drop Cutsomer - Monthly Ajax
  Route::get('/manage_reports/customer_source_report_yearly', [CustomerReport::class, 'cus_src_yearly'])->name('reports-customer_report');
  Route::match(['get', 'post'],'/manage_reports/customer_source_report_yearly_data', [CustomerReport::class, 'CusSrcYearlyData'])->name('customer_source_report_yearly_data');
  Route::get('/manage_reports/customer_source_report', [CustomerReport::class, 'cus_src_monthly'])->name('reports-customer_report');
  Route::match(['get', 'post'],'/manage_reports/customer_source_report_data', [CustomerReport::class, 'CusSrcMonthlyData'])->name('customer_source_report_data');
  Route::get('/manage_reports/customer_age_report', [CustomerReport::class, 'cus_age_monthly'])->name('reports-customer_report');
  Route::match(['get', 'post'],'/manage_reports/customer_age_report_data', [CustomerReport::class, 'CusAgeMonthlyData'])->name('customer_age_report_data');
  Route::get('/manage_reports/customer_age_report_yearly', [CustomerReport::class, 'cus_age_yearly'])->name('reports-customer_report');
  Route::match(['get', 'post'],'/manage_reports/customer_age_report_yearly_data', [CustomerReport::class, 'CusAgeYearlyData'])->name('customer_age_report_yearly_data');
  Route::get('/manage_reports/customer_employee_type_report', [CustomerReport::class, 'cus_employee_type_monthly'])->name('reports-customer_report');
  Route::match(['get', 'post'],'/manage_reports/cus_employee_type_report_data', [CustomerReport::class, 'CusTypeMonthlyData'])->name('cus_employee_type_report_data');
  Route::get('/manage_reports/customer_employee_type_yearly', [CustomerReport::class, 'cus_employee_type_yearly'])->name('reports-customer_report');
  Route::match(['get', 'post'],'/manage_reports/cus_employee_type_yearly_data', [CustomerReport::class, 'CusTypeYearlyData'])->name('cus_employee_type_yearly_data');
  Route::match(['get', 'post'], '/manage_reports/lead_type_list', [CustomerReport::class, 'get_lead_type_list'])->name('get_lead_type_list'); //Lead Type List Ajax
  
  
  // Payment Analysis
  Route::get('/manage_reports/outstanding_yearly', [PaymentReport::class, 'outstanding_yearly'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/outstanding_yearly_data', [PaymentReport::class, 'OutstandingYearlyData'])->name('outstanding_yearly_data');
  Route::get('/manage_reports/outstanding_monthly', [PaymentReport::class, 'outstanding_monthly'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/outstanding_monthly_data', [PaymentReport::class, 'OutstandingMonthlyData'])->name('outstanding_monthly_data');
 
  Route::get('/manage_reports/drop_payment_yearly', [PaymentReport::class, 'drop_payment_yearly'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/drop_payment_yearly_data', [PaymentReport::class, 'DropPaymentYearlyData'])->name('drop_payment_yearly_data');
  Route::get('/manage_reports/drop_payment_monthly', [PaymentReport::class, 'drop_payment_monthly'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/drop_payment_monthly_data', [PaymentReport::class, 'DropPaymentMonthlyData'])->name('drop_payment_monthly_data');
 
  Route::get('/manage_reports/pre_post_collection_yearly', [PaymentReport::class, 'pre_post_yearly'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/pre_post_yearly_data', [PaymentReport::class, 'PrePostYearlyData'])->name('pre_post_yearly_data');
  Route::get('/manage_reports/pre_post_collection_monthly', [PaymentReport::class, 'pre_post_monthly'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/pre_post_monthly_data', [PaymentReport::class, 'PrePostMonthlyData'])->name('pre_post_monthly_data');
 
  Route::get('/manage_reports/payment_collection_yearly', [PaymentReport::class, 'index'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/payment_collection_yearly_data', [PaymentReport::class, 'PaymentCollectionYearData'])->name('payment_collection_yearly_data');
  Route::get('/manage_reports/payment_collection_monthly', [PaymentReport::class, 'payment_collection_monthly'])->name('reports-payment-report');
  Route::match(['get', 'post'], '/manage_reports/payment_collection_monthly_data', [PaymentReport::class, 'PaymentCollectionMonthData'])->name('payment_collection_monthly_data');

   
//Journal Analysis
  Route::get('/manage_reports/journal_yearly', [JournalReport::class, 'journal_yearly'])->name('reports-journal-report');
  Route::match(['get', 'post'], '/manage_reports/journal_yearly_data', [JournalReport::class, 'JournalYearlyData'])->name('journal_yearly_data');
  Route::get('/manage_reports/journal_duarions_yearly', [JournalReport::class, 'journal_duarions_yearly'])->name('reports-journal-report');
  Route::match(['get', 'post'], '/manage_reports/journal_duarions_yearly_data', [JournalReport::class, 'JournalDuarionsYearlyData'])->name('journal_duarions_yearly_data');
  
    //Performance Analysis
  Route::get('/manage_reports/production_yearly', [PerformanceReport::class, 'index'])->name('reports-performance-report');
  Route::match(['get', 'post'], '/manage_reports/production_yearly_data', [PerformanceReport::class, 'ProductionYearlyData'])->name('production_yearly_data');
  Route::get('/manage_reports/goalset_yearly', [PerformanceReport::class, 'goalset_yearly'])->name('reports-performance-report');
  Route::match(['get', 'post'],'/manage_reports/goalset_yearly_data', [PerformanceReport::class, 'GoalsetYearlyData'])->name('goalset_yearly_data');
  Route::get('/manage_reports/leave_yearly', [PerformanceReport::class, 'leave_percent_yearly'])->name('reports-performance-report');
  Route::match(['get', 'post'], '/manage_reports/leave_yearly_data', [PerformanceReport::class, 'LeavePerYearlyData'])->name('leave_yearly_data');
  Route::match(['get', 'post'], '/manage_reports/production_staff_list', [PerformanceReport::class, 'getStaffPerformList'])->name('production_staff_list');
  Route::match(['get', 'post'], '/manage_reports/get_all_department_wise_staff', [PerformanceReport::class, 'get_all_department_wise_staff'])->name('get_all_department_wise_staff');
 
 //Country Report
 Route::get('/manage_reports/country_wise_yearly_report', [CountryReport::class, 'country_wise_yearly'])->name('reports-country-report'); //Country Wise - Yearly view
Route::match(['get', 'post'], '/manage_reports/country_wise_yearly_report_data', [CountryReport::class, 'getCountryWiseYearlyData'])->name('country_wise_yearly_data'); //Country Wise - Yearly view
Route::get('/manage_reports/country_wise_monthly_report', [CountryReport::class, 'country_wise_monthly'])->name('reports-country-report'); //Country Wise - Monthly view
Route::match(['get', 'post'], '/manage_reports/country_wise_monthly_report_data', [CountryReport::class, 'getCountryWiseMonthlyData'])->name('country_wise_monthly_data'); //Country Wise - Monthly view
Route::match(['get', 'post'], '/manage_reports/get_lead_country_list', [CountryReport::class, 'get_country_list'])->name('get_lead_country_list'); //Lead Type List Ajax

  // Faculty Analysis
  Route::get('/manage_reports/faculty_yearly', [FacultyReport::class, 'index'])->name('reports-faculty-report');
  Route::match(['get', 'post'], '/manage_reports/faculty_yearly_data', [FacultyReport::class, 'FacultyYearData'])->name('faculty_yearly_data');
  Route::get('/manage_reports/faculty_monthly', [FacultyReport::class, 'faculty_monthly'])->name('reports-faculty-report');
  Route::match(['get', 'post'], '/manage_reports/faculty_monthly_data', [FacultyReport::class, 'FacultyMonthData'])->name('faculty_monthly_data');
  Route::get('/manage_reports/faculty_revenue_yearly', [FacultyReport::class, 'faculty_revenue_yearly'])->name('reports-faculty-report');
  Route::match(['get', 'post'], '/manage_reports/faculty_revenue_yearly_data', [FacultyReport::class, 'FacultyRevenueYearData'])->name('faculty_revenue_yearly_data');
  Route::get('/manage_reports/faculty_revenue_monthly', [FacultyReport::class, 'faculty_revenue_monthly'])->name('reports-faculty-report');
  Route::match(['get', 'post'], '/manage_reports/faculty_revenue_monthly_data', [FacultyReport::class, 'FacultyRevenueMonthData'])->name('faculty_revenue_monthly_data');
  Route::get('/manage_reports/faculty_attendance_yearly', [FacultyReport::class, 'faculty_attendance_yearly'])->name('reports-faculty-report');
  Route::match(['get', 'post'], '/manage_reports/faculty_attendance_yearly_data', [FacultyReport::class, 'FacultyAttYearData'])->name('faculty_attendance_yearly_data');
  Route::get('/manage_reports/faculty_attendance_monthly', [FacultyReport::class, 'faculty_attendance_monthly'])->name('reports-faculty-report');
  Route::match(['get', 'post'], '/manage_reports/faculty_attendance_monthly_data', [FacultyReport::class, 'FacultyAttMonthData'])->name('faculty_attendance_monthly_data');
  Route::match(['get', 'post'], '/manage_reports/faculty_positions_list', [FacultyReport::class, 'get_faculty_positions_list'])->name('faculty_positions_list');
  Route::match(['get', 'post'], '/manage_reports/faculty_staff_list', [FacultyReport::class, 'getProductionStaffList'])->name('faculty_staff_list');
  
});




// Main Page Route
Route::get('/', [Login::class, 'index'])->name('login');
Route::get('/get_staff', [Login::class, 'get_staff'])->name('get-staff');
Route::get('/forgot_password', [Login::class, 'forgot_password'])->name('forgot-password');
Route::get('/change_password', [Login::class, 'new_password'])->name('new-password');


Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::post('/auth/login-basic', [LoginBasic::class, 'login'])->name('auth-login-basic-post');
Route::post('/auth/verify', [LoginBasic::class, 'Verify'])->name('auth-verify');
Route::get('/auth/login-cover', [LoginCover::class, 'index'])->name('auth-login-cover');
Route::post('/login', [Login::class, 'Login'])->name('login_auth');

// locale

// Discount QR
Route::get('/Discount-Qr/{id}', [DicountQR::class, 'Index'])->name('Discount-Qr');
Route::get('/Discount-Qr-View/{id}', [DicountQR::class, 'Discount_View'])->name('Discount-Qr-View');
Route::get('/Event-Qr-Verify/{id}', [DicountQR::class, 'Event_View'])->name('Event-Qr-Verify');
Route::post('/checkdDiscountMobileExists', [DicountQR::class, 'checkdDiscountMobileExists'])->name('checkdDiscountMobileExists');
Route::post('/add_discount_lead', [DicountQR::class, 'Add'])->name('add_discount_lead');
Route::post('/add_scanners_count', [DicountQR::class, 'Add_scanner_count'])->name('add_scanners_count');
Route::post('/add_call_try_count', [DicountQR::class, 'Add_call_try_count'])->name('add_call_try_count');

Route::get('/Cronjob_staff_schedule', [Login::class, 'Cronjob_staff_schedule'])->name('Cronjob_staff_schedule');
Route::get('/Cronjob_scheduled_message', [Login::class, 'Cronjob_scheduled_message'])->name('Cronjob_scheduled_message');
Route::get('/Cronjob_staff_lead_bank_update', [Cronjobs::class, 'Cronjob_staff_lead_bank_update'])->name('Cronjob_staff_lead_bank_update');
Route::get('/Cronjob_payment_remainder', [Cronjobs::class, 'Cronjob_payment_remainder'])->name('Cronjob_payment_remainder');

Route::get('/Cronjob_otherdb', [Cronjobs::class, 'Cronjob_otherdb'])->name('Cronjob_otherdb');
Route::get('/Cronjob_call_log', [Cronjobs::class, 'Cronjob_call_log'])->name('Cronjob_call_log');
Route::get('/Cronjob_lead_calls_update', [Cronjobs::class, 'Cronjob_lead_calls_update'])->name('Cronjob_lead_calls_update');
Route::get('/Cronjob_lead_calls_update_before_days', [Cronjobs::class, 'Cronjob_lead_calls_update_before_days'])->name('Cronjob_lead_calls_update_before_days');
Route::get('/Cronjob_lead_phone_verify', [Cronjobs::class, 'Cronjob_lead_phone_verify'])->name('Cronjob_lead_phone_verify');
Route::get('/Cronjob_staff_goal_set_update', [Cronjobs::class, 'Cronjob_staff_goal_set_update'])->name('Cronjob_staff_goal_set_update');
Route::get('/Cronjob_team_goal_set_update', [Cronjobs::class, 'Cronjob_team_goal_set_update'])->name('Cronjob_team_goal_set_update');
Route::match(['get', 'post'], '/Cronjob_ai_questuons', [Cronjobs::class, 'Cronjob_ai_questuons'])->name('Cronjob_ai_questuons');
Route::get('/Cronjob_HotleadToLeadBasket', [Cronjobs::class, 'Cronjob_HotleadToLeadBasket'])->name('Cronjob_HotleadToLeadBasket');
Route::get('/Cronjob_UnfollowToLeadBasket', [Cronjobs::class, 'Cronjob_UnfollowToLeadBasket'])->name('Cronjob_UnfollowToLeadBasket');
Route::get('/Cronjob_DailyCallList', [Cronjobs::class, 'Cronjob_DailyCallList'])->name('Cronjob_DailyCallList');

Route::match(['get', 'post'], '/getOpenAIBalance', [Cronjobs::class, 'getCreditBalance'])->name('getOpenAIBalance');
Route::match(['get', 'post'], '/Cronjob_Documents_unupload_files', [Cronjobs::class, 'Cronjob_Documents_unupload_files'])->name('Cronjob_Documents_unupload_files');
Route::match(['get', 'post'], '/Cronjob_Documents_expiry', [Cronjobs::class, 'Cronjob_Documents_expiry'])->name('Cronjob_Documents_expiry');

Route::get('/Cronjob_hot_lead_update', [Cronjobs::class, 'Cronjob_hot_lead_update'])->name('Cronjob_hot_lead_update');
Route::get('/Cronjob_CloseInCompleteExam', [Cronjobs::class, 'Cronjob_CloseInCompleteExam'])->name('Cronjob_CloseInCompleteExam');

   Route::get('/customer_feedback/{id}', [ManageCustomer::class, 'feedback'])->name('customer_feedback');
  // Show feedback form
  Route::get('/feedback/{id}', [ManageCustomer::class, 'feedback'])->name('feedback.form');
  // Submit feedback
  Route::post('/feedback/submit', [ManageCustomer::class, 'storeFeedback'])->name('feedback.submit');
  // Thank you page
  Route::get('/thank-you', [ManageCustomer::class, 'thankyou'])->name('thank.you.page');
  

Route::get('/CloudCall/call_logs', [CloudCall::class, 'getCallLogs']);
Route::get('/play-audio', [CloudCall::class, 'streamAudio']);
Route::get('/justdial', [OtherSourceLead::class, 'justdial'])->name('justdial');
Route::get('/PhDiZone_website_lead',  [OtherSourceLead::class, 'website_lead'])->name('PhDiZone_website_lead');
Route::get('/ElysiumPro_website_lead',  [OtherSourceLead::class, 'website_lead_pro'])->name('ElysiumPro_website_lead');
// Route::get('/urbanpro', [OtherSourceLead::class, 'urbanpro'])->name('urbanpro');
// Route::get('/sulekha', [OtherSourceLead::class, 'sulekha'])->name('sulekha');
Route::get('/Cronjob_just_dial_lead', [Cronjobs::class, 'Cronjob_just_dial_lead'])->name('Cronjob_just_dial_lead');
Route::get('/Cronjob_sulekha_lead', [Cronjobs::class, 'Cronjob_sulekha_lead'])->name('Cronjob_sulekha_lead');
Route::get('/Cronjob_Staff_Stop_Task_Timer', [Cronjobs::class, 'Cronjob_Staff_Stop_Task_Timer'])->name('Cronjob_Staff_Stop_Task_Timer');

Route::get('/manage_proposal/send_proposal/{id}', [ManageProposal::class, 'SendProposal'])->name('lead-management-manage-proposal');
Route::get('/manage_proposal/proposal_accepted/{id}', [ManageProposal::class, 'proposalAccepted']);
Route::post('/confirm_proposal', [ManageProposal::class, 'ConfirmProposal'])->name('confirm_proposal');
Route::get('/manage_proposal/payments/{id}', [ManageProposal::class, 'ProposalPayment']);

Route::get('/pay', [Payment::class, 'showPaymentForm'])->name('pay_form');
Route::post('/create_transaction', [Payment::class, 'createOrder'])->name('pay_create');
Route::get('/invoice_pay/{id}', [Payment::class, 'CreateOrderPayment']);
Route::post('/payment-success', [Payment::class, 'handlePaymentSuccess'])->name('pay_success');
Route::get('/offline_payment_success/{id}', [Payment::class, 'OfflineAccepted']);

Route::post('/pay_later', [Payment::class, 'PayLater'])->name('pay_later');

// nda 
Route::get('/manage_nda_print/{id}', [ManageNDA::class, 'ndaPrint'])->name('customer-management-manage-nda');
Route::post('/nda_signed', [ManageNDA::class, 'NdaSignedConfirm'])->name('nda_signed');
Route::get('/manage_nda/nda_message/{id}', [ManageInvoice::class, 'NDASendView'])->name('customer-management-manage-invoice');
Route::get('/receipt_print/{id}', [Payment::class, 'ReceiptPrint']);
Route::get('receipt_print_download/{id}', [Payment::class, 'DownloadReceiptPrint'])->name('receipt_print_download');
Route::get('nda_download/{id}', [ManageNDA::class, 'ndaDownload'])->name('nda_download');
Route::get('/nda_success/{id}', [ManageNDA::class, 'NDASuccess']);
// whatsapp Webhook
Route::match(['get', 'post'], '/webhook_whatsapp', [WhatsappConfig::class, 'WhatsappWebhook']);

Route::get('/role_permission_error', [ErrorsController::class, 'index'])->name('role_permission_error');

Route::get('/assesment_certificate_download/{id}', [ManageAssessment::class, 'assesment_certificate_download'])->name('assesment_certificate_download');

// outside route

Route::post('/checkEventMobileExists', [Events::class, 'checkEventMobileExists'])->name('checkEventMobileExists');
     Route::post('/add_qr_event_participant', [Events::class, 'AddQrParticipant'])->name('add_qr_event_participant');
     Route::post('/add_scanners_count_event', [Events::class, 'add_scanners_count_event'])->name('add_scanners_count_event');
     Route::get('/event_applied_successfully/{id}', [Events::class, 'EventAppliedSuccess'])->name('event_applied_successfully');
     Route::get('/print/invoice/pdf/{id}', [ManageFranchise::class, 'printInvoicedownload'])->name('/print/invoice/pdf');
     Route::post('/participant_location_qr', [Events::class, 'participant_location_qr'])->name('participant_location_qr'); 
   
    Route::get('/event_qr/{id}', [Events::class, 'EventQrForm'])->name('event_qr');
    Route::get('/event/event_certificate_download/{id}',[Events::class, 'EventCertificateDownload']);

    Route::get('/get_branch_scheduled_event',[Events::class,'GetScheduledEvent'])->name('get_branch_scheduled_event');
    Route::post('/tranfer_event_participant',[Events::class,'TranferEventParticipant'])->name('tranfer_event_participant');
    Route::get('/JournalToHistory', [Cronjobs::class, 'JournalToHistory'])->name('JournalToHistory');
    Route::get('/auto-login', [Login::class, 'HandleEGCLogin']);
    
    // razorpay policies
    Route::get('/contact-us',[RazorpayPolicy::class,'ContactUs'])->name('contact.us');
    Route::get('/shipping-policy',[RazorpayPolicy::class,'ShippingPolicy'])->name('shipping.policy');
    Route::get('/shipping-policy',[RazorpayPolicy::class,'ShippingPolicy'])->name('shipping.policy');
    Route::get('/terms-and-conditions',[RazorpayPolicy::class,'TermsAndConditionPolicy'])->name('terms.conditions');
    Route::get('/cancellations-and-refunds',[RazorpayPolicy::class,'CancelAndRefundPolicy'])->name('refunds.policy');
    Route::get('/privacy-policy',[RazorpayPolicy::class,'PrivacyPolicy'])->name('privacy.policy');
    Route::post('/logout', [Login::class, 'destroy'])->name('logout');

    Route::get('auth/google', [AuthController::class, 'redirect']);
    Route::get('auth/google/callback', [AuthController::class, 'callback']);

    Route::get('/payment_verified/{id}', [Payment::class, 'QrInvoice'])->name('payment_verified');
 Route::get('/office_receipt_print/{id}', [Payment::class, 'OfficeReceipt']);
  Route::post('receipt/encrypt', [Payment::class, 'encrypt_ids'])->name('receipt/encrypt');
    
   // Milestone folders view route
    Route::get('/milestone-folders/{mile}', [FileController::class, 'showMilestoneFolders'])
        ->name('milestone.folders');
 
    // API endpoint to get files in a folder (for modal)
    Route::post('/folder-files-count/{folderId}', [FileController::class, 'updateFolderViewCounts'])
        ->name('folder.files');
  
// icons
// Route::get('/icons/icons-mdi', [MdiIcons::class, 'index'])->name('icons-mdi');