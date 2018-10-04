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
  {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

  
</head>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  /* background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px; */
}

h1 {
  text-align: center;  
}

input {
  /* padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa; */
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #ffffff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  -webkit-box-shadow: inset 0 0 0 transparent;
          box-shadow: inset 0 0 0 transparent;
  -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}
select.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  /* background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer; */
  -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
           border: none;
  border-radius: 2px;
  display: inline-block;
  height: 36px;
  line-height: 36px;
  padding: 0 16px;
  text-transform: uppercase;
  font-weight: bold;
  vertical-align: middle;
  -webkit-tap-highlight-color: transparent;
  font-size: 14px;
  outline: 0;
  text-decoration: none;
  color: #fff;
  background-color: #26a69a;
  text-align: center;
  letter-spacing: .5px;
  -webkit-transition: background-color .2s ease-out;
  transition: background-color .2s ease-out;
  cursor: pointer;

  position: relative;
  overflow: hidden;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  -webkit-tap-highlight-color: transparent;
  vertical-align: middle;
  z-index: 1;
  -webkit-transition: .3s ease-out;
  transition: .3s ease-out;
}

button:hover {
  /* opacity: 0.8; */
  background-color: #2bbbad;
}

button:focus {
  background-color: #1d7d74;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}


.surnamemsg, .first_namemsg, .middle_namemsg, .suffixmsg, .bdaymsg, .fsurnamemsg, .ffirst_namemsg, .fmiddle_namemsg, .fsuffixmsg, 
.msurnamemsg, .mfirst_namemsg, .mmiddle_namemsg, .msuffixmsg, .emergencymsg{
    color: red;
}

.hidden {
     visibility:hidden;
}
</style>

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
          @if($role->tracking == "Grant")
           <li class="nav-item">
            <a href="/admin/tracking" class="nav-link">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Tracking
              </p>
            </a>
          </li>
          @endif
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
          <li class="nav-item has-treeview menu-open">
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
                <a href="/admin/apply" class="nav-link active">
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
            <a href="/admin/reports/master-list" class="nav-link">
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
              <li class="breadcrumb-item active">Transactions</li>
              <li class="breadcrumb-item active">Apply</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <a href="/admin/renew" class="btn btn-secondary btn-rounded flt-right"><i class="fa fa-arrow-left"></i> Go Back</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header" id="th-cl1">
              <h4 class="boldtx">PCL</h4>
          </div>
          <div class="card-body">
    <form action="{{ action('ScholarshipCatController@pclStore') }}" id="regForm" method="post" enctype="multipart/form-data" class="container">
      {{csrf_field()}}


      <div class="tab">

        {{-- <h5><strong>Step 1 of 3</strong></h5> --}}
        <div class="progress mt-2">
          <div class="progress-bar bg-info" role="progressbar" style="width: 33.3333333333%" aria-valuenow="33.3333333333" aria-valuemin="0" aria-valuemax="100"><strong>Step 1 of 3</strong></div>
        </div>

        <div class="row form-group mt-5">
          <h4 class="tx1">Personal Information</h4>
        </div>
        <hr/>
        <div class="row">
          <label for="fullname">* Full Name</label>
        </div>
        <div class="form-row">
          <div class = "col-md-4">
            <input type="text" class="form-control req surname" id="surname" name="surname" placeholder='* Surname' value="{{$users->surname}}" required/>
            <p class="surnamemsg hidden mb-0">Please Enter a valid surname</p>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req first_name" id="first_name" name="first_name" placeholder='* First Name' value="{{$users->first_name}}" required/>
            <p class="first_namemsg hidden mb-0">Please Enter a valid first name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" placeholder='Middle Name' value="{{$users->middle_name}}"/>
            <p class="middle_namemsg hidden mb-0">Please Enter a valid middle name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control suffix" id="suffix" name="suffix" placeholder='Suffix (e.g., Jr. Sr. III)' value="{{$users->suffix}}"/>
            <p class="suffixmsg hidden mb-0">Please Enter a valid suffix</p>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-3">
            <label>* District</label>
            <select name="district" id="district" data-val="true"  data-val-required="Please select District" data-dependent="municipality" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
                @foreach ($district_list as $district)
                  <option value="{{$district->district}}">{{$district->district}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label for="municipality">* Municipality</label>
            <select name="municipality" id="municipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="barangay">* Barangay</label>
            <select name="barangay" id="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" placeholder='Street'/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
              <label for="gender">* Gender</label>
              <select name="gender" id="gender" class=" form-control req"  required>
                <option value="" selected disabled>--Select--</option>
                <option value="Male">MALE</option>
                <option value="Female">FEMALE</option>
              </select>
          </div>
          <div class="col-md-2">
            <label>* Civil Status</label>
            <select name="civil_status" id="civil_status" class="form-control req"  required>
              <option value="" selected disabled>--Select--</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Separated">Separated</option>
              <option value="Widowed">Widowed</option>
            </select>
          </div>
          <div class="col-md-3">
              <label for="nationality">* Nationality</label>
              <select name="nationality" id="nationality" class="form-control req" required>
                <option value="" selected disabled>--Select--</option>
                <option value="Filipino">Filipino</option>
                <option value="Foreigner">Foreigner</option>
              </select>
          </div>
          <div class="col-md-3">
            <label for="religion">* Religion</label>
            <select name="religion" id="religion" class="form-control req"  required>
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="bdate">* Birth Date</label>
            <input type="text" name="bday" id="bday" class="form-control bday req" value="{{$users->bday}}" required/>
            <p class="bdaymsg hidden"></p>
          </div>
        </div>
         <div class="row form-group">
           <div class="col-md-4">
            <label>* Place of Birth</label>
           <input type="text" class="form-control req" id="birth_place" name="birth_place" placeholder='Place of Birth'  required/>
          </div>
          <div class="col-md-3">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
            <input type="text" class="form-control req" id="mobile_no" name="mobile_no" placeholder='9xxxxxxxxx' required value="{{$users->mobile_number}}"/>
            </div>  
          </div>
          
        </div>


      </div>
    
      <div class="tab">
        <div class="progress mt-2">
          <div class="progress-bar bg-info" role="progressbar" style="width: 66.6666666667%" aria-valuenow="66.6666666667" aria-valuemin="0" aria-valuemax="100"><strong>Step 2 of 3</strong></div>
        </div>

        <div class="row mt-5 form-group">
          <h4 class="tx1">Guardian Information</h4>
        </div>
        <hr/>
        <div class="row">
          <label for="fullname">* Father's Full Name</label>
        </div>
        <div class="row form-group">
          <div class = "col-md-4">
            <input type="text" class="form-control req" id="fsurname" name="fsurname" placeholder='* Surname' required/>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req" id="ffirst_name" name="ffirst_name" placeholder='* First Name' required/>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control" id="fmiddle_name" name="fmiddle_name" placeholder='Middle Name'/>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control" id="fsuffix" name="fsuffix" placeholder='Suffix (e.g., Jr. Sr. III)'/>
          </div>
        </div>
        <div class="row">
          <label for="fullname">* Mother's Full Name</label>
        </div>
        <div class="row form-group">
          <div class = "col-md-4">
            <input type="text" class="form-control req" id="msurname" name="msurname" placeholder='* Surname' required/>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req" id="mfirst_name" name="mfirst_name" placeholder='* First Name' required/>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control" id="mmiddle_name" name="mmiddle_name" placeholder='Middle Name'/>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control" id="msuffix" name="msuffix" placeholder='Suffix (e.g., Jr. Sr. III)'/>
          </div>
        </div>
        <div class="row form-group">
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>* Father's Occupation</label>
                    <input type="text" class="form-control" id="foccupation" name="foccupation" placeholder="Father's Occupation" required/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>* Mother's Occupation</label>
                    <input type="text" class="form-control" id="moccupation" name="moccupation" placeholder="Mother's Occupation" required/>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>* Address</label>
                  <input type="text" class="form-control" id="gaddress" name="gaddress" placeholder="Address (Street, Village Subdivision, Municipality)" required/>
              </div>
            </div>
        </div>
      </div>

      <div class="tab">

        <div class="progress mt-2">
          <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Step 3 of 3</strong></div>
        </div>

        <div class="row mt-5 form-group">
          <h4 class="tx1">Other Information</h4>
        </div>
        <hr/>
        <div class="row">
          <h5><strong>Educational Information</strong></h5>
        </div>
        <div class="row form-group">
            <div class="col-md-5">
                <label>* School Enrolled <small>(No Abbreviation)</small></label>
                <input name="college_name" type="text" class="form-control req" placeholder="School Enrolled"/>
            </div>
            <div class="col-md-4">
                <label>* Course/Program <small>(No Abbreviation)</small></label>
                <input name="course" type="text" class="form-control req" placeholder ="Course/Program">
            </div>
            <div class="col-md-2">
                <label>* Year Level</label>
                <input name="yr_lvl" type="text" class="form-control req" placeholder ="Year Level">
            </div>
        </div>
        <div class="row">
          <h5><strong>In Case of Emergency</strong></h5>
        </div>
        <div class="row form-group">
            <div class="col-md-5">
                <label>* Person to be contacted in case of emergency</label>
                <input name="emergency" type="text" class="form-control req" placeholder ="Full Name">
            </div>
            <div class="col-md-3">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
              <input type="text" class="form-control req" id="emobile_no" name="emobile_no" placeholder='9xxxxxxxxx' required/>
            </div>  
          </div>
          <div class="ghost">
            <input class="ghost" type="hidden" name="sid" id="sid"/>
            <input type="hidden" class="ghost" id="barcode" name="barcode" value="{{$barcode}}"/>
            <input type="hidden" class="ghost" id="gender2" name="gender2" value="{{$users->gender}}"/>
          </div>
        </div>
        
        


    </div>

      <div style="overflow:auto;" class="mt-4">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
      </div>

      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
      </div>
    </form>


</div>
</div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
        
</div>
<script>

$(document).ready(function(){
  $('#mobile_no').mask('0000000000', {"clearIncomplete": true});
  $('#emobile_no').mask('0000000000', {"clearIncomplete": true});
  
  var gen = $('#gender2').val();
  
  document.getElementById('gender').value=gen;
  var pathname = window.location.pathname;
  var parts = pathname.split('/');
  console.log(parts[5]);

  $('#sid').val(parts[5]);

  var id = $('input[name=title]').val();
  $('#title_scholar').text(id);

});


    var $regexname=/^([a-zA-Z ]{2,30})$/;
    $('.surname').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.surnamemsg').removeClass('hidden');
        $('.surnamemsg').show();
    }
    else{
        // else, do not display message
        $('.surnamemsg').addClass('hidden');
        }
    });


    $('.first_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.first_namemsg').removeClass('hidden');
        $('.first_namemsg').show();
    }
    else{
        // else, do not display message
        $('.first_namemsg').addClass('hidden');
        }
    });


    $('.fsurname').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.fsurnamemsg').removeClass('hidden');
        $('.fsurnamemsg').show();
    }
    else{
        // else, do not display message
        $('.fsurnamemsg').addClass('hidden');
        }
    });


    $('.ffirst_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.ffirst_namemsg').removeClass('hidden');
        $('.ffirst_namemsg').show();
    }
    else{
        // else, do not display message
        $('.ffirst_namemsg').addClass('hidden');
        }
    });


    $('.msurname').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.msurnamemsg').removeClass('hidden');
        $('.msurnamemsg').show();
    }
    else{
        // else, do not display message
        $('.msurnamemsg').addClass('hidden');
        }
    });


    $('.mfirst_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.mfirst_namemsg').removeClass('hidden');
        $('.mfirst_namemsg').show();
    }
    else{
        // else, do not display message
        $('.mfirst_namemsg').addClass('hidden');
        }
    });


    $('.emergency').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.emergencymsg').removeClass('hidden');
        $('.emergencymsg').show();
    }
    else{
        // else, do not display message
        $('.emergencymsg').addClass('hidden');
        }
    });

var regexname2=/^([a-zA-Z ]{2,30})*$/;
    $('.middle_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.middle_namemsg').removeClass('hidden');
        $('.middle_namemsg').show();
    }
    else{
        // else, do not display message
        $('.middle_namemsg').addClass('hidden');
        }
    });

    $('.suffix').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.suffixmsg').removeClass('hidden');
        $('.suffixmsg').show();
    }
    else{
        // else, do not display message
        $('.suffixmsg').addClass('hidden');
        }
    });

    $('.fmiddle_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.fmiddle_namemsg').removeClass('hidden');
        $('.fmiddle_namemsg').show();
    }
    else{
        // else, do not display message
        $('.fmiddle_namemsg').addClass('hidden');
        }
    });

    $('.fsuffix').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.fsuffixmsg').removeClass('hidden');
        $('.fsuffixmsg').show();
    }
    else{
        // else, do not display message
        $('.fsuffixmsg').addClass('hidden');
        }
    });

    $('.mmiddle_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.mmiddle_namemsg').removeClass('hidden');
        $('.mmiddle_namemsg').show();
    }
    else{
        // else, do not display message
        $('.mmiddle_namemsg').addClass('hidden');
        }
    });

    $('.msuffix').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.msuffixmsg').removeClass('hidden');
        $('.msuffixmsg').show();
    }
    else{
        // else, do not display message
        $('.msuffixmsg').addClass('hidden');
        }
    });


var d = new Date();
var year = d.getFullYear() - 17;
d.setFullYear(year);
var age;
$("#bday").datepicker({ dateFormat: "dd/mm/yy",
		    changeMonth: true,
		    changeYear: true,
		    maxDate: year,
		    minDate: "-90Y",
            yearRange: '-90:' + year + '',
            defaultDate: d
		 });

$("#bday").change(function(){
        var dob = $("#bday").val();
        var now = new Date();
        var birthdate = dob.split("/");
        var born = new Date(birthdate[2], birthdate[1]-1, birthdate[0]);
        age=get_age(born,now);
     
        console.log(birthdate[2]+" : "+birthdate[1]+" : "+birthdate[0]);
        console.log(age);
    
        if (age<17)
        {
            $('.bdaymsg').removeClass('hidden');
            $('.bdaymsg').show();
             $('.bdaymsg').css({'color': 'red'});
            $('.bdaymsg').text("Invalid Age: " +age);
            return false;
        }
        else
        {
            $('.bdaymsg').removeClass('hidden');
            $('.bdaymsg').show();
            $('.bdaymsg').css({'color': 'green'});
            $('.bdaymsg').text("Valid Age: " +age);
            
        }
});

function get_age(born, now) {
      var birthday = new Date(now.getFullYear(), born.getMonth(), born.getDate());
      if (now >= birthday) 
        return now.getFullYear() - born.getFullYear();
      else
        return now.getFullYear() - born.getFullYear() - 1;
    }


var v = $("#regForm").validate({
    rules: {
      religion: {
        required: true
      },
      nationality: {
        required: true
      }
      
    },
    errorElement: "span",
    errorClass: "help-inline",
  });


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("req");
  // w = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }

    // for (c =0; c < w.length; c++)
    // {
    //   if(w[c].value == "")
    //   {
    //     w[c].className += " invalid";
    //     valid = false;
    //   }
    // }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status

}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

$(document).ready(function(){
  $('.dynamic').change(function(){
    var x = $('#municipality').val();
    console.log(x);
    console.log($('#barangay').val());
    if($(this).val() != '')
    {
    var select = $(this).attr("id");
    var value = $(this).val();
    var dependent = $(this).data('dependent');
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ route('users.fetch') }}",
      method:"POST",
      data:{select:select, value:value, _token:_token, dependent:dependent},
      success:function(result)
      {
      $('#'+dependent).html(result);
      }

    })
    }
  });

 $('#district').change(function(){
				$('#municipality').val('');
				$('#barangay').val('');
			});
  $('#municipality').change(function(){
    $('#barangay').val('');
  });

});


</script>
<script src="{{ URL::asset('data/religion.js') }}" type="text/javascript"></script>
</body>
</html>
