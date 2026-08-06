@extends('layouts/layoutMaster')

<title>Elysium Technologies&#174; | Team Call</title>

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss',
'resources/assets/vendor/libs/select2/select2.scss',
'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss',
'resources/assets/vendor/libs/dropzone/dropzone.scss',
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/tagify/tagify.scss',
'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'
])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js',
'resources/assets/vendor/libs/dropzone/dropzone.js',
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/tagify/tagify.js',
'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'

])
@endsection

@section('page-script')
@vite(['resources/assets/js/forms_date_time_pickers.js'])
@vite(['resources/assets/js/forms-file-upload.js'])
@endsection

@section('content')

<style>

    body{
     background:#f5f7fb;
    }

    /*=========================================
    Page Header
    =========================================*/
    .monitor-header{
        background:#fff;
        padding:20px;
        border-radius:12px;
        box-shadow:0 2px 12px rgba(0,0,0,.05);
        margin-bottom:20px;
    }

    .monitor-title{
        font-size:24px;
        font-weight:700;
        color:#233044;
    }

    .monitor-subtitle{
        font-size:13px;
        color:#7b8794;
    }

    /*=========================================
    Dashboard Cards
    =========================================*/

    .monitor-card{
        background:#fff;
        border-radius:14px;
        padding:18px;
        box-shadow:0 2px 10px rgba(0,0,0,.05);
        transition:.25s;
        height:100%;
    }

    .monitor-card:hover{
        transform:translateY(-3px);
    }

    .monitor-card h5{
        font-size:13px;
        color:#7d8896;
        margin-bottom:10px;
    }

    .monitor-card h2{
        font-size:28px;
        font-weight:700;
        margin:0;
    }

    .monitor-icon{

        width:52px;

        height:52px;

        border-radius:50%;

        display:flex;

        align-items:center;

        justify-content:center;

        font-size:22px;

        color:#fff;

    }

    .bg-online{

        background:#16c784;

    }

    .bg-offline{

        background:#f04438;

    }

    .bg-call{

        background:#3b82f6;

    }

    .bg-missed{

        background:#ff9800;

    }

    /*=========================================
    Department Tabs
    =========================================*/

    .department-tabs{

        display:flex;

        overflow-x:auto;

        white-space:nowrap;

        gap:10px;

        padding-bottom:5px;

        margin-bottom:20px;

    }

    .department-tabs::-webkit-scrollbar{

        height:5px;

    }

    .department-tabs::-webkit-scrollbar-thumb{

        background:#d5d5d5;

        border-radius:10px;

    }

    .department-tab{

        min-width:160px;

        padding:12px 20px;

        border-radius:12px;

        background:#fff;

        border:1px solid #e6e9ef;

        cursor:pointer;

        transition:.25s;

        position:relative;

    }

    .department-tab:hover{

        transform:translateY(-2px);

        box-shadow:0 6px 16px rgba(0,0,0,.08);

    }

    .department-tab.active{

        background:#0d6efd;

        color:#fff;

        border-color:#0d6efd;

    }

    .department-tab small{

        opacity:.75;

        display:block;

        margin-top:3px;

    }

    /*=========================================
    Toolbar
    =========================================*/

    .monitor-toolbar{

        background:#fff;

        padding:15px;

        border-radius:12px;

        margin-bottom:20px;

        box-shadow:0 2px 10px rgba(0,0,0,.05);

    }

    /*=========================================
    Table
    =========================================*/

    .table-card{

        background:#fff;

        border-radius:12px;

        overflow:hidden;

        box-shadow:0 2px 12px rgba(0,0,0,.05);

    }

    .table-monitor{

        margin-bottom:0;

    }

    .table-monitor thead{

        position:sticky;

        top:0;

        background:#eef3fb;

        z-index:20;

    }

    .table-monitor thead th{

        font-size:12px;

        font-weight:700;

        /* color:#5b6574; */

        padding:13px;

        white-space:nowrap;

    }

    .table-monitor tbody td{

        vertical-align:middle;

        padding:12px;

        font-size:13px;

    }

    .table-monitor tbody tr{

        transition:.2s;

    }

    .table-monitor tbody tr:hover{

        background:#f9fbff;

    }

    /*=========================================
    Avatar
    =========================================*/

    .staff-avatar{

        width:46px;

        height:46px;

        border-radius:50%;

        overflow:hidden;

        background:#e9ecef;

        display:flex;

        align-items:center;

        justify-content:center;

        font-size:18px;

        font-weight:700;

        color:#4d5969;

    }

    .staff-avatar img{

        width:100%;

        height:100%;

        object-fit:cover;

    }

    /*=========================================
    Status
    =========================================*/

    .online-badge{

        display:inline-flex;

        align-items:center;

        gap:7px;

        font-size:12px;

        font-weight:600;

        color:#16c784;

    }

    .online-dot{

        width:9px;

        height:9px;

        border-radius:50%;

        background:#16c784;

        animation:pulse 1.5s infinite;

    }

    .offline-dot{

        width:9px;

        height:9px;

        border-radius:50%;

        background:#adb5bd;

    }

    @keyframes pulse{

        0%{

         box-shadow:0 0 0 0 rgba(22,199,132,.6);

        }

        70%{

            box-shadow:0 0 0 10px rgba(22,199,132,0);

        }

        100%{

            box-shadow:0 0 0 0 rgba(22,199,132,0);

        }

    }

    /*=========================================
    Progress
    =========================================*/

    .progress{

        height:7px;

        background:#edf1f7;

    }

    .progress-bar{

        border-radius:10px;

    }

    /*=========================================
    Skeleton
    =========================================*/

    .skeleton{

        height:20px;

        border-radius:6px;

        background:linear-gradient(

        90deg,

        #ececec 25%,

        #f5f5f5 37%,

        #ececec 63%

        );

        background-size:400% 100%;

        animation:loading 1.2s infinite;

    }

    @keyframes loading{

        0%{

            background-position:100% 0;

        }

        100%{

            background-position:-100% 0;

        }

    }

    .skeleton-circle{
        width:46px;
        height:46px;
        border-radius:50%;
    }

    .skeleton-row td{
        padding:16px;
    }

    /*=========================================
    Last Login
    =========================================*/

    .last-login{
        font-size:12px;
        color:#6c757d;
        line-height:20px;
    }

    /*=========================================
    Responsive
    =========================================*/

    @media(max-width:991px){
        .table-responsive{
            overflow-x:auto;
        }
        .department-tab{
            font-size:12px;
            padding:8px 15px;
        }
    }

    .staff-row{

    transition:.25s;

    }

    .staff-row:hover{

    transform:translateX(3px);

    background:#f8fbff;

    }

    .table-success{

    animation:flashRow .8s;

    }

    @keyframes flashRow{

    0%{

    background:#d1e7dd;

    }

    100%{

    background:transparent;

    }

    }

</style>

<div class="container-fluid">
    <div class="monitor-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="monitor-title">
                    <i class="mdi mdi-phone-forward text-primary me-2"></i>
                    CUG Call Monitor
                </div>
                <div class="monitor-subtitle">
                    Real-time Staff Call Monitoring Dashboard
                </div>
            </div>
        <div>
        <button class="btn btn-primary btn-sm" id="btnRefresh">
            <i class="mdi mdi-refresh"></i>
            Refresh
        </button>
    </div>
</div>

</div>

    <div class="row g-3 mb-4">
        <div class="col-lg-3">
            <div class="monitor-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Online Staff</h5>
                        <h2 id="onlineCount">0</h2>
                    </div>
                    <div class="monitor-icon bg-online">
                        <i class="mdi mdi-wifi"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="monitor-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Offline Staff</h5>
                        <h2 id="offlineCount">0</h2>
                    </div>
                    <div class="monitor-icon bg-offline">
                        <i class="mdi mdi-wifi-off"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="monitor-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Total Calls</h5>
                        <h2 id="totalCalls">0</h2>
                    </div>
                    <div class="monitor-icon bg-call">
                        <i class="mdi mdi-phone"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="monitor-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Missed Calls</h5>
                        <h2 id="missedCalls">0</h2>
                    </div>
                    <div class="monitor-icon bg-missed">
                        <i class="mdi mdi-phone-remove"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="department-tabs" id="departmentTabs"> </div>

    <div class="monitor-toolbar">
        <div class="row g-2">
            <div class="col-lg-4">
                <input type="text" id="searchStaff" class="form-control"  placeholder="Search staff, mobile..." >
            </div>
            <div class="col-lg-2">
                <select id="onlineFilter" class="form-select select3">
                    <option value="">All Status</option>
                    <option value="1">Online</option>
                    <option value="0">Offline</option>
                </select>
            </div>
            <div class="col-lg-2">
                <input type="month" id="monthFilter" class="form-control" value="{{ now()->format('Y-m') }}">
            </div>
            <div class="col-lg-2">
                <button class="btn btn-primary w-100" id="btnSearch"><i class="mdi mdi-magnify"></i>Search</button>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-light w-100" id="btnReset">Reset</button>
            </div>
        </div>
    </div>
    <div class="small text-muted mb-2">
        Showing
        <strong id="staffCount">0</strong>
        staff
    </div>

    <div class="table-card">
        <div class="table-responsive" id="staffTableWrapper">
            <table class="table table-monitor align-middle table-row-dashed table-striped table-hover gy-1 gs-2">
                <thead>
                    <tr  class="text-start  fw-bold fs-6 gs-0 bg-primary text-white">
                        <th style="min-width:260px;">Staff</th>
                        <th>Status</th>
                        <th class="text-center">IC</th>
                        <th class="text-center">OC</th>
                        <th class="text-center">MC</th>
                        <th class="text-center">RC</th>
                        <th class="text-center">DC</th>
                        <th class="text-center">OCR</th>
                        <th class="text-center">RCR</th>
                        <th class="text-center">MCR</th>
                        <th>Last Login</th>
                    </tr>
                </thead>
                <tbody id="staffTableBody">
                {{-- AJAX Skeleton Here --}}
                </tbody>
            </table>
        </div>
    </div>

</div>



<script>

"use strict";

/*==========================================================
    CUG Call Monitor
==========================================================*/



const CUGMonitor = {
    /*---------------------------------------
        API
    ---------------------------------------*/
    api:{
        departments:"{{ route('ajax.cug.monitor.departments') }}",
        staffList:"{{ route('ajax.cug.monitor.list') }}"
    },
    currentXHR:null,
    lastResponse:null,
    rowCache:{},

    requestId:0,

    currentRequestId:0,
    /*---------------------------------------
        Current State
    ---------------------------------------*/
    state:{
        department_id:"",
        search:"",
        online:"",
        month:"{{ now()->format('m') }}",
        year:"{{ now()->format('Y') }}",
        page:1,
        limit:50,
        sort:"staff_name",
        direction:"asc",
        isAppending:false,
        hasMore:true,
        loading:false,
        autoRefresh:null
    },
    /*---------------------------------------
        Cache Selectors
    ---------------------------------------*/
    ui:{},

    /*---------------------------------------
        Initialize
    ---------------------------------------*/
    init:function(){
        this.cacheDom();
        this.bindEvents();
        this.loadDepartments();
        this.startRefresh();
    },
    cacheDom:function(){
        this.ui.body=$("#staffTableBody");
        this.ui.wrapper=$("#staffTableWrapper");
        this.ui.tabs=$("#departmentTabs");
        this.ui.search=$("#searchStaff");
        this.ui.filter=$("#onlineFilter");
        this.ui.month=$("#monthFilter");
        this.ui.refresh=$("#btnRefresh");
        this.ui.searchBtn=$("#btnSearch");
        this.ui.reset=$("#btnReset");
        this.ui.onlineCount=$("#onlineCount");
        this.ui.offlineCount=$("#offlineCount");
        this.ui.totalCalls=$("#totalCalls");
        this.ui.missedCalls=$("#missedCalls");
    },
    // bindEvents:function(){
    //     let self=this;
    //     self.ui.searchBtn.on("click",function(){
    //         self.search();
    //     });
    //     self.ui.refresh.on("click",function(){
    //         self.reload();
    //     });
    //     self.ui.reset.on("click",function(){
    //         self.reset();
    //     });
    //     self.ui.filter.on("change",function(){
    //         self.state.online=$(this).val();
    //         self.reload();
    //     });
    //     self.ui.month.on("change",function(){
    //         let arr=$(this).val().split("-");
    //         self.state.year=arr[0];
    //         self.state.month=arr[1];
    //         self.reload();
    //     });
    // },
    loadFiltersFromUrl:function(){
        let url=new URL(window.location);
        this.state.department_id=url.searchParams.get("department") ?? "";
        this.state.search=url.searchParams.get("search") ?? "";
        this.state.online=url.searchParams.get("online") ?? "";
    },
    loadFiltersFromUrl:function(){
        let url=new URL(window.location);
        this.state.department_id=url.searchParams.get("department") ?? "";
        this.state.search=url.searchParams.get("search") ?? "";
        this.state.online=url.searchParams.get("online") ?? "";
    },
    bindEvents:function(){
        this.bindSearch();
        this.bindSearchButton();
        this.bindStatusFilter();
        this.bindMonth();
        this.bindRefresh();
    },
    bindMonth:function(){

        let self = this;

        self.ui.month.off("change");

        self.ui.month.on("change", function(){

            self.state.page = 1;

            self.loadStaff();

        });

    },
    debounceTimer:null,
    search:function(){
        let self=this;
        clearTimeout(self.debounceTimer);

        self.debounceTimer=setTimeout(function(){
            self.state.search=self.ui.search.val();
            self.reload();
        },400);

    },
    // reset:function(){
    //     let self=this;

    //     self.ui.search.val("");
    //     self.ui.filter.val("");
    //     self.state.search="";
    //     self.state.online="";
    //     self.state.department_id="";
    //     self.reload();
    // },
    reset:function(){
        let self=this;
        self.ui.search.val("");
        self.ui.filter.val("");
        self.ui.month.val("{{ now()->format('Y-m') }}");
        self.state.search="";
        self.state.online="";
        self.state.department_id="";
        self.state.month="{{ now()->format('m') }}";
        self.state.year="{{ now()->format('Y') }}";
        self.state.page=1;
        $(".department-tab").removeClass("active");
        $(".department-tab:first").addClass("active");
        self.loadStaff();
    },
    reload:function(){
        this.loadStaff();
    },
    bindSearchButton:function(){

        let self=this;

        self.ui.searchBtn.off("click");

        self.ui.searchBtn.on("click",function(){

            self.state.search=$.trim(self.ui.search.val());

            self.state.page=1;

            self.loadStaff();

        });

    },
    bindRefresh:function(){

        let self=this;

        self.ui.refresh.off("click");

        self.ui.refresh.on("click",function(){

            self.loadStaff(false);

        });

    },
    
    showSkeleton:function(rows=8){

        let html="";
        for(let i=0;i<rows;i++){
            html+=`
            <tr class="skeleton-row">
                <td>
                    <div class="d-flex">
                        <div class="skeleton skeleton-circle me-3"></div>
                        <div class="w-100">
                            <div class="skeleton mb-2" style="height:15px;width:160px">
                            </div>
                            <div class="skeleton" style="height:12px;width:100px">
                            </div>
                        </div>
                    </div>
                </td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
                <td><div class="skeleton"></div></td>
            </tr>
            `;
        }

        const tbody=self.ui.body;

        tbody.innerHTML=html;
    },
    empty:function(){

        self.ui.body.html(`
            <tr>
                <td colspan="11">
                    <div class="text-center py-5">

                        <i class="mdi mdi-magnify fs-1 text-secondary"></i>

                        <h5 class="mt-3">

                        No Matching Staff

                        </h5>

                        <p class="text-muted">

                        Try changing filters

                        </p>

                    </div>
                </td>
            </tr>
        `);

    },

    error:function(message="Unable to load data"){
        self.ui.body.html(`
            <tr>
                <td colspan="11">
                    <div class="alert alert-danger">
                        ${message}
                    </div>
                </td>
            </tr>
        `);
    },
    // startRefresh:function(){
    //     let self=this;

    //     if(self.state.autoRefresh!=null){
    //         clearInterval(self.state.autoRefresh);
    //     }

    //     self.state.autoRefresh=setInterval(function(){
    //         self.loadStaff(false);
    //     },20000);
    // },
    startRefresh:function(){

        clearInterval(this.state.autoRefresh);

        const interval=document.hidden ? 60000 : 20000;

        this.state.autoRefresh=setInterval(()=>{

            this.loadStaff(false);

        },interval);

    },
    number:function(value){
        return parseInt(value||0).toLocaleString();
    },

    percent:function(value){
        return parseFloat(value||0).toFixed(1)+"%";
    },

    badge:function(status){
        if(status==1){
            return `
            <span class="online-badge">
                <span class="online-dot"></span>
                Online
            </span>
            `;
        }
        return `
        <span class="text-secondary">
            <span class="offline-dot"></span>
            Offline
        </span>
        `;
    },
    loadDepartments: function () {

        let self = this;

        self.ui.tabs.html(self.departmentSkeleton());

        $.ajax({
            url: self.api.departments,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    self.renderDepartments(response.data);
                    self.loadStaff();
                } else {
                    self.ui.tabs.html("");
                }
            },
            error: function () {
                self.ui.tabs.html("");
            }
        });
    },
    departmentSkeleton: function () {
        let html = "";
        for (let i = 0; i < 6; i++) {
            html += `
            <div class="department-tab">
                <div class="placeholder-glow">
                    <span class="placeholder col-12"></span>
                </div>
            </div>
            `;
        }
        return html;
    },
    renderDepartments: function (departments) {

        let html = "";
        let totalStaff = 0;
        let totalOnline = 0;

        departments.forEach(function (item) {
            totalStaff += Number(item.staff_count);
            totalOnline += Number(item.online_count ?? 0);
        });
        html += `

        <div class="department-tab active"
            data-id="">
            <div class="fw-bold">
                All
            </div>
            <small>
                ${totalStaff} Staff
            </small>
        </div>

        `;

        departments.forEach(function (item) {

            html += `

            <div class="department-tab" data-id="${item.department_id}">
                <div class="fw-bold">
                    ${item.department_name}
                </div>
                <small>
                    ${item.staff_count} Staff
                </small>
            </div>

            `;

        });

        this.ui.tabs.html(html);
        this.bindDepartmentEvents();

    },
    bindDepartmentEvents: function () {

        let self = this;

        self.ui.tabs.find(".department-tab").off("click");

        self.ui.tabs.find(".department-tab").on("click", function () {

            self.ui.tabs.find(".department-tab").removeClass("active");

            $(this).addClass("active");

            self.state.department_id = $(this).data("id");

            self.state.page = 1;

            self.loadStaff();

        });

    },

    tabLoading: function () {

        this.ui.tabs.find(".department-tab")

            .css("pointer-events", "none");

    },
    tabLoaded: function () {

        this.ui.tabs.find(".department-tab")

            .css("pointer-events", "auto");

    },
    loadStaff:function(showLoader=true){

        const requestId = ++this.requestId;

        this.currentRequestId = requestId;

        let self=this;

        if(self.state.loading)
            return;

        if(self.currentXHR){
            self.currentXHR.abort();
        }

        self.state.loading=true;

        if(showLoader){
            self.showSkeleton();
        }

        self.currentXHR=$.ajax({

            url:self.api.staffList,

            type:"GET",

            dataType:"json",

            data:{

                department_id:self.state.department_id,

                search:self.state.search,

                online:self.state.online,

                month:self.state.month,

                year:self.state.year,

                page:self.state.page,

                limit:self.state.limit

            },

            success:function(response){

                self.state.loading=false;

                if(requestId !== self.currentRequestId){
                    return;
                }

                if(!response.status){

                    self.error();

                    return;

                }

                self.lastResponse=response;

                self.updateCards(response.summary);

                if(self.state.isAppending){

                    self.appendRows(response.data);

                }else{

                    self.renderTable(response.data);

                }

                self.state.hasMore=response.pagination.has_more;
                
                self.updateUrl();


            },
            

            error:function(xhr){

                self.state.loading=false;

                if(xhr.statusText==="abort"){
                    return;
                }

                self.error();

            }

        });

    },

    appendRows:function(rows){

        let html="";

        rows.forEach((row)=>{

            html+=this.buildRow(row);

        });

        this.ui.body.append(html);

        this.initializeTooltips();

        this.state.isAppending=false;

    },

    showEndMessage:function(){

        this.ui.body.append(`

        <tr>

            <td colspan="11">

                <div class="text-center text-muted py-3">

                    All staff loaded

                </div>

            </td>

        </tr>

        `);

    },

    showBottomLoader:function(){

        if($("#bottomLoader").length)
            return;

        this.ui.body.append(`

        <tr id="bottomLoader">

            <td colspan="11">

                <div class="text-center py-3">

                    <div class="spinner-border spinner-border-sm"></div>

                    Loading more...

                </div>

            </td>

        </tr>

        `);

    },

    loadingButton:function(btn){

        btn.prop("disabled",true);

        btn.html(

            '<span class="spinner-border spinner-border-sm me-2"></span>Loading'

        );

    },

    normalButton:function(btn,text){

        btn.prop("disabled",false);

        btn.html(text);

    },
    highlight:function(text){

        if(this.state.search==="")
            return text;

        let regex=new RegExp(this.state.search,"gi");

        return text.replace(

            regex,

            function(match){

                return "<mark>"+match+"</mark>";

            }

        );

    },
    updateCards:function(summary){

        if(!summary){

            return;

        }

        this.ui.onlineCount.text(

            this.number(summary.online)

        );

        this.ui.offlineCount.text(

            this.number(summary.offline)

        );

        this.ui.totalCalls.text(

            this.number(summary.total_calls)

        );

        this.ui.missedCalls.text(

            this.number(summary.missed)

        );

    },
    renderTable:function(rows){

            if(rows.length==0){

                this.empty();

                return;

            }

            let html="";

            rows.forEach((row)=>{

                html+=this.buildRow(row);

            });

            this.ui.body.html(html);

            this.initializeTooltips();

        },
    // renderTable:function(rows){

    //     if(rows.length===0){

    //         this.empty();

    //         return;

    //     }

    //     const tbody=self.ui.body[0];

    //     const existing={};

    //     tbody.querySelectorAll("tr[data-id]").forEach(function(tr){

    //         existing[tr.dataset.id]=tr;

    //     });

    //     const receivedIds=[];

    //     rows.forEach((row)=>{

    //         receivedIds.push(String(row.staff_id));

    //         this.renderSingleRow(row,existing);

    //     });

    //     Object.keys(existing).forEach((id)=>{

    //         if(!receivedIds.includes(id)){

    //             existing[id].remove();

    //             delete this.rowCache[id];

    //         }

    //     });

    // }.bind(this),
    renderSingleRow:function(row,existing){

        const id=String(row.staff_id);

        const html=this.buildRow(row);

        // const hash=JSON.stringify(row);
        const hash=this.rowHash(row);

        if(this.rowCache[id]===hash){

            return;

        }

        this.rowCache[id]=hash;

        if(existing[id]){

            existing[id].outerHTML=html;

            this.highlightRow(id);

        }else{

            this.ui.body.append(html);

        }

    },
    rowHash:function(row){

        return [

            row.online_status,

            row.incoming,

            row.outgoing,

            row.missed,

            row.rejected,

            row.dialed,

            row.last_login_date,

            row.last_login_time

        ].join("|");

    },
    updateCounter:function(row){

        const tr=$("tr[data-id='"+row.staff_id+"']");

        tr.find(".incoming").text(row.incoming);

        tr.find(".outgoing").text(row.outgoing);

        tr.find(".missed").text(row.missed);

    },
    initializeTooltips:function(){

        let tooltipTriggerList=[].slice.call(

            document.querySelectorAll(

                '[data-bs-toggle="tooltip"]'

            )

        );

        tooltipTriggerList.map(function(el){

            return new bootstrap.Tooltip(el);

        });

    },
    escape:function(text){

        return $("<div>")

        .text(text??"")

        .html();

    },
    formatDate:function(date,time){

        if(!date){

            return "-";

        }

        return `

        <div class="last-login">

            <div>${date}</div>

            <div>${time}</div>

        </div>

        `;

    },

    bindSearch:function(){

        let self=this;

        let timer=null;

        self.ui.search.off("keyup");

        self.ui.search.on("keyup",function(){

            clearTimeout(timer);

            timer=setTimeout(function(){

                self.state.search=$.trim(self.ui.search.val());

                self.state.page=1;

                self.loadStaff();

            },350);

        });

    },
    bindStatusFilter:function(){

        let self=this;

        self.ui.filter.off("change");

        self.ui.filter.on("change",function(){

            self.state.online=$(this).val();

            self.state.page=1;

            self.loadStaff();

        });

    },

    bindStatusFilter:function(){

        let self=this;

        self.ui.filter.off("change");

        self.ui.filter.on("change",function(){

            self.state.online=$(this).val();

            self.state.page=1;

            self.loadStaff();

        });

    },
    

    progress:function(value,color){

        value=parseFloat(value);

        if(isNaN(value))
            value=0;

        return `

        <div>

            <div class="progress">

                <div

                class="progress-bar bg-${color}"

                style="width:${value}%">

                </div>

            </div>

            <small>

                ${value.toFixed(1)}%

            </small>

        </div>

        `;

    },
    status:function(status){

        if(status==1){

            return `

            <span class="online-badge">

                <span class="online-dot"></span>

                Online

            </span>

            `;

        }

        return `

        <span class="text-secondary">

            <span class="offline-dot"></span>

            Offline

        </span>

        `;

    },
    serial:function(index){

        return (

            ((this.state.page-1)*50)

            +index

            +1

        );

    },
    buildRow:function(row){

        // const name=this.escape(row.staff_name);
        const name=this.highlight(
            this.escape(row.staff_name)
        );

        const mobile=this.escape(row.cug_mobile ?? '');

        const designation=this.escape(row.job_position_name ?? '');

        const avatar=this.buildAvatar(row);

        const statusBadge=this.staffStatusBadge(row.staff_status);

        const online=this.status(row.online_status);

        return `

        <tr
            class="staff-row"
            data-id="${row.staff_id}">

            <!-- Staff Information -->

            <td class="min-w-300px">

                <div class="d-flex align-items-center">

                    ${avatar}

                    <div class="ms-3 flex-grow-1">

                        <a
                            href="javascript:void(0)"
                            class="text-decoration-none"
                            onclick="openCallHistoryModal(
                                '${row.staff_id}',
                                '${name}',
                                '${mobile}',
                                '${this.state.month}',
                                '${this.state.year}'
                            )">

                            <div
                                class="fw-bold text-dark">

                                ${name}

                            </div>

                        </a>

                        <div
                            class="text-primary small mt-1">

                            <i class="mdi mdi-phone me-1"></i>

                            ${mobile}

                        </div>

                        <div class="mt-2">

                            <span
                                class="badge bg-info">

                                ${designation}

                            </span>

                            ${statusBadge}

                        </div>

                    </div>

                </div>

            </td>

            <!-- Online Status -->

            <td class="status-cell">

                ${online}

            </td>

            <!-- Incoming -->

            <td class="text-center fw-bold incoming ">

                ${this.number(row.incoming)}

            </td>

            <!-- Outgoing -->

            <td class="text-center fw-bold outgoing ">

                ${this.number(row.outgoing)}

            </td>

            <!-- Missed -->

            <td class="text-center missed ">

                <span class="badge bg-warning text-dark">

                    ${this.number(row.missed)}

                </span>

            </td>

            <!-- Rejected -->

            <td class="text-center">

                <span class="badge bg-danger ">

                    ${this.number(row.rejected)}

                </span>

            </td>

            <!-- Dialed -->

            <td class="text-center">

                <span class="badge bg-secondary">

                    ${this.number(row.dialed)}

                </span>

            </td>

            <!-- OCR -->

            <td>

                ${this.progress(row.ocr,'success')}

            </td>

            <!-- RCR -->

            <td>

                ${this.progress(row.rcr,'primary')}

            </td>

            <!-- MCR -->

            <td>

                ${this.progress(row.mcr,'warning')}

            </td>

            <!-- Last Login -->

            <td>

                ${this.formatDate(

                    row.last_login_date,

                    row.last_login_time

                )}

            </td>

        </tr>

        `;

    },
    buildAvatar:function(row){

        let image=row.staff_image ?? "";

        image=image.trim();

        if(image!=""){

            return `

            <div class="symbol symbol-45px">

                <img

                    src="/staff_images/${image}"

                    class="rounded-circle"

                    loading="lazy"

                    onerror="this.onerror=null;this.parentNode.outerHTML='${this.avatarFallback(row)}';"

                >

            </div>

            `;

        }

        return this.avatarFallback(row);

    },
    avatarFallback:function(row){

        const name=(row.staff_name ?? "A").trim();

        const letter=name.substring(0,1).toUpperCase();

        const gender=row.gender ?? "";

        let color="primary";

        switch(gender){

            case "Female":

                color="danger";

            break;

            case "Male":

                color="primary";

            break;

            default:

                color="secondary";

        }

        return `

        <div
            class="symbol symbol-45px">

            <div
                class="rounded-circle
                bg-${color}
                text-white
                d-flex
                align-items-center
                justify-content-center
                fw-bold"

                style="width:45px;height:45px;">

                ${letter}

            </div>

        </div>

        `;

    },
    staffStatusBadge:function(status){

        switch(parseInt(status)){

            case 4:

                return `

                <span
                    class="badge bg-warning text-dark ms-2">

                    Notice Period

                </span>

                `;

            case 5:

                return `

                <span
                    class="badge bg-info ms-2">

                    Relieved

                </span>

                `;

            case 6:

                return `

                <span
                    class="badge bg-secondary ms-2">

                    Abscond

                </span>

                `;

            case 7:

                return `

                <span
                    class="badge bg-danger ms-2">

                    Terminated

                </span>

                `;

            default:

                return "";

        }

    },
    formatDate:function(date,time){

        if(!date){

            return "-";

        }

        let today=moment().format("YYYY-MM-DD");

        let yesterday=moment()

            .subtract(1,"day")

            .format("YYYY-MM-DD");

        let label=date;

        if(date==today){

            label="Today";

        }
        else if(date==yesterday){

            label="Yesterday";

        }

        return `

        <div class="last-login">

            <div class="fw-semibold">

                ${label}

            </div>

            <small>

                ${time}

            </small>

        </div>

        `;

    },

    progress:function(value,color){

        value=parseFloat(value);

        if(isNaN(value))
            value=0;

        let cls="bg-success";

        switch(color){

            case "primary":

                cls="bg-primary";

            break;

            case "warning":

                cls="bg-warning";

            break;

            case "danger":

                cls="bg-danger";

            break;

        }

        return `

        <div style="min-width:70px;">

            <div class="progress">

                <div

                    class="progress-bar

                    ${cls}"

                    style="width:${value}%">

                </div>

            </div>

            <div
                class="text-center
                small
                mt-1">

                ${value.toFixed(1)}%

            </div>

        </div>

        `;

    },
    highlightRow:function(id){

        const row=$("tr[data-id='"+id+"']");

        row.addClass("table-success");

        setTimeout(function(){

            row.removeClass("table-success");

        },1200);

    },
    avatarCache:{},
    bindInfiniteScroll:function(){

        let self=this;

        self.ui.wrapper.off("scroll");

        self.ui.wrapper.on("scroll",function(){

            if(self.state.loading)
                return;

            if(!self.state.hasMore)
                return;

            const container=this;

            const scrollPosition=
                container.scrollTop+
                container.clientHeight;

            const threshold=
                container.scrollHeight-150;

            if(scrollPosition>=threshold){

                self.loadNextPage();

            }

        });

    },
    loadNextPage:function(){

        if(this.state.loading)
            return;

        if(!this.state.hasMore)
            return;

        this.state.page++;

        this.state.isAppending=true;

        this.loadStaff(false);

    },
};

$(function(){
    CUGMonitor.init();
});

</script>


@endsection
