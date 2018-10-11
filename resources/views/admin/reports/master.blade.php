<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  
 <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <title>Pampanga Capitol | Online Scholarship Application and Management System</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  @include('inc.admin-nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
      <span class="brand-text font-weight-bold" style ="" >OSAMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/storage/profile_images/{{Auth::user()->user_photo}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin/profile" class="d-block">{{Auth::user()->first_name}} {{Auth::user()->surname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
             <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if($role->submission == "Grant")
          <li class="nav-item">
            <a href="/admin/submission" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Submission
              </p>
            </a>
          </li>
          @endif
          @if($role->transactions == "Grant")
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-exchange"></i>
              <p>
                Transactions
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/reg" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-sign-in nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/apply" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-paper-plane nav-icon"></i>
                  <p>Apply</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/approve" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-check nav-icon"></i>
                  <p>Approve</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/renew" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-refresh nav-icon"></i>
                  <p>Renew</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/recheck" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-check-square nav-icon"></i>
                  <p>Re-Checking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/consolidation" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-clone nav-icon"></i>
                  <p>Consolidation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/awarding" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-trophy nav-icon"></i>
                  <p>Awarding</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if($role->file_maintenance == "Grant")
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                File Maintenance
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/announcement" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-bullhorn nav-icon"></i>
                  <p>Announcement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/applicant" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-user nav-icon"></i>
                  <p>Applicant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/application" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-folder nav-icon"></i>
                  <p>Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/faqs" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-question nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/grades" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-id-card nav-icon"></i>
                  <p>Grades</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/scholarship" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Scholarship</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/employee" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-users nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>
              
            </ul>
          </li>
          @endif
          @if($role->utilities == "Grant")
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Utilities
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/audit-log" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-history nav-icon"></i>
                  <p>Audit Log</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Archive
                    <i class="right fa fa-angle-left"></i>
                  </p>
                  
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/archive/announcement" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-bullhorn nav-icon"></i>
                        <p>Announcement</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/archive/applicant" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-user nav-icon"></i>
                        <p>Applicant</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/archive/application" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-folder nav-icon"></i>
                        <p>Application</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/archive/faqs" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-question nav-icon"></i>
                        <p>FAQs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/archive/grades" class="nav-link">
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-id-card nav-icon"></i>
                        <p>Grades</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/archive/employee" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-users nav-icon"></i>
                        <p>Employee</p>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="/admin/backup-restore" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-hdd-o nav-icon"></i>
                  <p>Backup and Restore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/permission" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-lock nav-icon"></i>
                  <p>Level of Access</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if($role->reports == "Grant")
          <li class="nav-item">
            <a href="#" class="nav-link bg-white">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="content">
      <div class="container-fluid">
        {{-- <div class="card">
          <div class="card-header" id="th-cl3">
              <h3 class="boldtx">Apply</h3>
          </div>
          
        </div> --}}
        <div class="card-body"> 
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title"><i class="fa fa-file"></i> Reports </h1>
                    <hr/>
                   <br>
                   <ul class="list-group">
                     <li class="list-group-item active"><strong>APPLICANTS</strong></li>
                     <li class="list-group-item">
                       <div class="form-row">
                         <div class="col-md-4">
                           <div class="mt-1">
                             List of Applicants <small>(All applicants)</small>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <select name="a1" id="a1" class="form-control">
                             <option value="" selected disabled>--Select--</option>
                             <option value="A-E">A-E</option>
                             <option value="F-J">F-J</option>
                             <option value="K-O">K-O</option>
                             <option value="P-T">P-T</option>
                             <option value="U-Z">U-Z</option>
                             <option value="ALL">ALL</option>
                           </select>
                         </div>
                         <div class="col-md-2">
                           <a href="#" target="" class="btn btn-info btn-block" id="a1_btn" name="a1_btn">Print</a>
                         </div>
                       </div>
                     </li>
                     <li class="list-group-item">
                       <div class="form-row">
                         <div class="col-md-4">
                           <div class="mt-1">
                             List of Applicants <small>(All applicants by municipality)</small>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <select name="a3" id="a3" class="form-control">
                             <option value="" selected disabled>--Select--</option>
                             @foreach($municipal_list as $muni)
                              <option value="{{$muni->municipality}}">{{$muni->municipality}}</option>
                             @endforeach
                             
                           </select>
                         </div>
                         <div class="col-md-2">
                           <a href="#" class="btn btn-info btn-block" id="a3_btn" name="a3_btn"">Print</a>
                         </div>
                       </div>
                     </li>
                     <li class="list-group-item">
                       <div class="form-row">
                         <div class="col-md-4">
                           <div class="mt-1">
                             List of Applicants <small>(Applied)</small>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <select name="a4" id="a4" class="form-control">
                             <option value="" selected disabled>--Select--</option>
                             <option value="A-E">A-E</option>
                             <option value="F-J">F-J</option>
                             <option value="K-O">K-O</option>
                             <option value="P-T">P-T</option>
                             <option value="U-Z">U-Z</option>
                             <option value="ALL">ALL</option>
                           </select>
                         </div>
                         <div class="col-md-2">
                           <a href="#" class="btn btn-info btn-block"  id="a4_btn" name="a4_btn">Print</a>
                         </div>
                       </div>
                     </li>
                     <li class="list-group-item">
                       <div class="form-row">
                         <div class="col-md-4">
                           <div class="mt-1">
                             List of Applicants <small>(applied by scholarship category)</small>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <select name="a5" id="a5" class="form-control">
                             <option value="" selected disabled>--Select--</option>
                             @foreach($scholar as $sc)
                              <option value="{{$sc->id}}">{{$sc->scholarship_name}}</option>
                             @endforeach
                           </select>
                         </div>
                         <div class="col-md-2">
                           <a href="#" class="btn btn-info btn-block"  id="a5_btn" name="a5_btn">Print</a>
                         </div>
                       </div>
                     </li>
                     <li class="list-group-item">
                       <div class="form-row">
                         <div class="col-md-4">
                           <div class="mt-1">
                             List of Applicants <small>(applied by municipality)</small>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <select name="a6" id="a6" class="form-control">
                             <option value="" selected disabled>--Select--</option>
                             @foreach($municipal_list as $muni)
                              <option value="{{$muni->municipality}}">{{$muni->municipality}}</option>
                             @endforeach
                             
                           </select>
                         </div>
                         <div class="col-md-2">
                           <a href="#" class="btn btn-info btn-block"  id="a6_btn" name="a6_btn">Print</a>
                         </div>
                       </div>
                     </li>
                     <li class="list-group-item active"><strong>SCHOLARSHIPS REPORTS AND APPLICATION FORMS</strong></li>
                     <li class="list-group-item">
                       <div class="form-row">
                         <div class="col-md-4">
                           <div class="mt-1">
                             Choose reports
                           </div>
                         </div>
                         <div class="col-md-3">
                           <select name="a7" id="a7" class="form-control">
                             <option value="" selected disabled>--Select--</option>
                             <option value="scholarships">List of Scholarships</option>
                              @foreach($scholar as $sc)
                              <option value="{{$sc->id}}">{{$sc->scholarship_name}} Application Form</option>
                             @endforeach
                           </select>
                         </div>
                         <div class="col-md-2">
                           <a href="#" class="btn btn-info btn-block" id="a7_btn" name="a7_btn">Print</a>
                         </div>
                       </div>
                     </li>
                   </ul>
                  <div class="ghost">
                    <input type="hidden" id="hid" name="hid">  
                  </div>
                </div>
                <br>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
       
</div>
<script>
var a1, a2, a3, a4, a5, a6;
$(document).ready(function(){
  $('#hid').val($('#a1').val());
  a1=$('#hid').val();
  $('#hid').val($('#a2').val());
  a2=$('#hid').val();
  $('#hid').val($('#a3').val());
  a3=$('#hid').val();
  $('#hid').val($('#a4').val());
  a4=$('#hid').val();
  $('#hid').val($('#a5').val());
  a5=$('#hid').val();
  $('#hid').val($('#a6').val());
  a6=$('#hid').val();
  // console.log($('#hid').val());
})
// console.log($('#a1').val());

$("#a1").on('change', function() {
    if ($(this).val() == 'A-E'){
      $("#a1_btn").attr("href", "/admin/reports/master-list/applicant/A-E");
      $("#a1_btn").attr("target", "_blank");

    } 
    else if ($(this).val() == 'F-J')
    {
      $("#a1_btn").attr("href", "/admin/reports/master-list/applicant/F-J");
       $("#a1_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'K-O')
    {
      $("#a1_btn").attr("href", "/admin/reports/master-list/applicant/K-O");
       $("#a1_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'P-T')
    {
      $("#a1_btn").attr("href", "/admin/reports/master-list/applicant/P-T");
       $("#a1_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'U-Z')
    {
      $("#a1_btn").attr("href", "/admin/reports/master-list/applicant/U-Z");
       $("#a1_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'ALL')
    {
      $("#a1_btn").attr("href", "/admin/reports/master-list/applicant/ALL");
       $("#a1_btn").attr("target", "_blank");
    }
});

$("#a3").on('change', function() {
  if ($(this).val() == 'ANGELES CITY'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/ANGELES CITY");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'APALIT'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/APALIT");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'ARAYAT'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/ARAYAT");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'BACOLOR'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/BACOLOR");
      $("#a3_btn").attr("target", "_blank");
  }
  else if ($(this).val() == 'CANDABA'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/CANDABA");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'CITY OF SAN FERNANDO (Capital)'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/CITY OF SAN FERNANDO (Capital)");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'FLORIDABLANCA'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/FLORIDABLANCA");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'GUAGUA'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/GUAGUA");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'LUBAO'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/LUBAO");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MABALACAT CITY'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/MABALACAT CITY");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MACABEBE'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/MACABEBE");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MAGALANG'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/MAGALANG");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MASANTOL'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/MASANTOL");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MEXICO'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/MEXICO");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MINALIN'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/MINALIN");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'PORAC'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/PORAC");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SAN LUIS'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/SAN LUIS");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SAN SIMON'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/SAN SIMON");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SANTA ANA'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/SANTA ANA");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SANTA RITA'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/SANTA RITA");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SANTO TOMAS'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/SANTO TOMAS");
      $("#a3_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SASMUAN (Sexmoan)'){
      $("#a3_btn").attr("href", "/admin/reports/master-list/applicant/municipality/SASMUAN (Sexmoan)");
      $("#a3_btn").attr("target", "_blank");

  }

});


$("#a5").on('change', function() {
  if ($(this).val() == 1){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/1");
      $("#a5_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 2){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/2");
      $("#a5_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 3){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/3");
      $("#a5_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 4){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/4");
      $("#a5_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 5){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/5");
      $("#a5_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 6){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/6");
      $("#a5_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 7){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/7");
      $("#a5_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 8){
      $("#a5_btn").attr("href", "/admin/reports/master-list/applicant/scholarship/8");
      $("#a5_btn").attr("target", "_blank");

  }
});

$("#a6").on('change', function() {
  if ($(this).val() == 'ANGELES CITY'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/ANGELES CITY");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'APALIT'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/APALIT");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'ARAYAT'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/ARAYAT");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'BACOLOR'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/BACOLOR");
      $("#a6_btn").attr("target", "_blank");
  }
  else if ($(this).val() == 'CANDABA'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/CANDABA");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'CITY OF SAN FERNANDO (Capital)'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/CITY OF SAN FERNANDO (Capital)");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'FLORIDABLANCA'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/FLORIDABLANCA");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'GUAGUA'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/GUAGUA");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'LUBAO'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/LUBAO");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MABALACAT CITY'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/MABALACAT CITY");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MACABEBE'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/MACABEBE");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MAGALANG'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/MAGALANG");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MASANTOL'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/MASANTOL");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MEXICO'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/MEXICO");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'MINALIN'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/MINALIN");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'PORAC'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/PORAC");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SAN LUIS'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/SAN LUIS");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SAN SIMON'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/SAN SIMON");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SANTA ANA'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/SANTA ANA");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SANTA RITA'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/SANTA RITA");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SANTO TOMAS'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/SANTO TOMAS");
      $("#a6_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 'SASMUAN (Sexmoan)'){
      $("#a6_btn").attr("href", "/admin/reports/master-list/applied/municipality/SASMUAN (Sexmoan)");
      $("#a6_btn").attr("target", "_blank");

  }

});

$("#a4").on('change', function() {
    if ($(this).val() == 'A-E'){
      $("#a4_btn").attr("href", "/admin/reports/master-list/applied/A-E");
      $("#a4_btn").attr("target", "_blank");

    } 
    else if ($(this).val() == 'F-J')
    {
      $("#a4_btn").attr("href", "/admin/reports/master-list/applied/F-J");
       $("#a4_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'K-O')
    {
      $("#a4_btn").attr("href", "/admin/reports/master-list/applied/K-O");
       $("#a4_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'P-T')
    {
      $("#a4_btn").attr("href", "/admin/reports/master-list/applied/P-T");
       $("#a4_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'U-Z')
    {
      $("#a4_btn").attr("href", "/admin/reports/master-list/applied/U-Z");
       $("#a4_btn").attr("target", "_blank");
    }
    else if($(this).val() == 'ALL')
    {
      $("#a4_btn").attr("href", "/admin/reports/master-list/applied/ALL");
       $("#a4_btn").attr("target", "_blank");
    }
});

$("#a7").on('change', function() {
  if ($(this).val() == 'scholarships'){
      $("#a7_btn").attr("href", "/admin/reports/master-list/scholarship");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 1){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-1");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 2){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-1");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 3){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-1");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 4){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-1");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 5){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-1");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 6){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-3");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 7){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-2");
      $("#a7_btn").attr("target", "_blank");

  }
  else if ($(this).val() == 8){
      $("#a7_btn").attr("href", "/admin/reports/master-list/form-2");
      $("#a7_btn").attr("target", "_blank");

  }
});

//if(var)
</script>
</body>
</html>
