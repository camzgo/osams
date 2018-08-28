<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ADMINISTRATOR</title>
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

</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-envelope"></i> 
          <span class="badge badge-danger navbar-badge" style="font-size: 8px;">10</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
             <h1>fjsfj</h1>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge" style="font-size: 8px;">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-bold" style ="" id="role">ADMINISTRATOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/user8-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Tracking
              </p>
            </a>
          </li>
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
                <a href="#" class="nav-link">
                  <i class="fa fa-sign-in nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-paper-plane nav-icon"></i>
                  <p>Apply</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Approve</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                File Maintenance
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/announcement" class="nav-link">
                  <i class="fa fa-bullhorn nav-icon"></i>
                  <p>Annoucement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/applicant" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Applicant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/application" class="nav-link">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/faqs" class="nav-link">
                  <i class="fa fa-question nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/scholarship" class="nav-link">
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Scholarship</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/users" class="nav-link active">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              
            </ul>
          </li>
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
                <a href="#" class="nav-link">
                  <i class="fa fa-history nav-icon"></i>
                  <p>Audit Log</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Archive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-hdd-o nav-icon"></i>
                  <p>Backup and Restore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-lock nav-icon"></i>
                  <p>Level of Access</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Reports
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Master List of Scholars</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Scholarship Programs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Application Forms</p>
                </a>
              </li>
            </ul>
          </li>
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
            <a href="#" onclick="display()" class="btn btn-info btn-rounded"><i class="fa fa-arrow-left"></i> Go Back</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">File Maintenance</li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header" >
              <h3 class="boldtx">EEFAP</h3>
          </div>
          <div class="card-body">



            <form id="regForm" class="container" action="">

              <h1></h1>

              <!-- One "tab" for each step in the form: -->
              <div class="tab">
                <label for="tab1">* Full Name</label>
                <div class="row form-group">
                  <div class="col-md-4">
                    <input placeholder="* Surname" name="surname" oninput="this.className = ''">
                  </div>
                  <div class="col-md-4">
                    <input placeholder="* First Name" name="first_name" oninput="this.className = ''">
                  </div>
                  <div class="col-md-2">
                    <input placeholder="Middle Name" name="middle_name" >
                  </div>
                  <div class="col-md-2">
                    <input placeholder="Suffix (e.g., Jr. Sr. III)" name="suffix">
                  </div>
                </div>
                <label for="tab1">* Address</label>
                <div class="row form-group">
                  <div class="col-md-3">
                    <select name="municipality" class="form-control" oninput="this.className = ''" required >
                      <option value="" selected disabled>Municipality</option>
                      <option value="R">Roman Catholic</option>
                      <option value="M">Muslim</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select name="barangay" class="form-control" oninput="this.className = ''" required >
                      <option value="" selected disabled>Barangay</option>
                      <option value="R">Roman Catholic</option>
                      <option value="M">Muslim</option>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <input placeholder="Street" name="street" oninput="this.className = ''">
                  </div>
                </div>
                <label for="tab1">* Contact</label>
                <div class="row form-group">
                  <div class="col-md-4">
                    <input type="text" name="mobile_no" id="mobile_no" placeholder='09xx-xxx-xxxx' oninput="this.className = ''" required/>
                  </div>
                  <div class="col-md-4">
                    <input type="text"  name="email" placeholder='facebook.com/username' oninput="this.className = ''" required/>
                  </div>
                </div>
              </div>


              <div class="tab">
                <label for="tab1">* Guardian Full Name</label>
                <div class="row form-group ">
                  <div class="col-md-4">
                    <input placeholder="* Surname" name="gsurname" oninput="this.className = ''">
                  </div>
                  <div class="col-md-4">
                    <input placeholder="* First Name" name="gfirst_name" oninput="this.className = ''">
                  </div>
                  <div class="col-md-2">
                    <input placeholder="Middle Name" name="gmiddle_name">
                  </div>
                  <div class="col-md-2">
                    <input placeholder="Suffix (e.g., Jr. Sr. III)" name="gsuffix">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-4">
                    <label for="tab1">* Relationship</label>
                    <input type="text" name="relationship"  placeholder='Relationship' oninput="this.className = ''" required/>
                  </div>
                  <div class="col-md-4">
                    <label for="tab1">* Contact</label>
                    <input type="text" name="gmobile_no" id="gmobile_no" placeholder='09xx-xxx-xxxx' oninput="this.className = ''" required/>
                  </div>
                </div>
              </div>

              <div class="tab">
                <label for="tab1">* College/University Name (No Abbreviation)</label>
                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="text" name="college_name"  placeholder='College/University' oninput="this.className = ''" required/>
                  </div>
                </div>
                <label for="tab1">* College/University Address</label>
                <div class="row form-group"> 
                  <div class="col-md-2">
                    <select name="region" class="form-control" data-style="selCol" oninput="this.className = ''" required >
                      <option value="" selected disabled>Region</option>
                      <option value="R">Roman Catholic</option>
                      <option value="M">Muslim</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select name="municipality" class="selectpicker show-tick form-control" data-style="selCol" oninput="this.className = ''" required >
                      <option value="" selected disabled>Municipality/City</option>
                      <option value="R">Roman Catholic</option>
                      <option value="M">Muslim</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <select name="barangay" class="selectpicker show-tick form-control" data-style="selCol" oninput="this.className = ''" required >
                      <option value="" selected disabled>Barangay</option>
                      <option value="R">Roman Catholic</option>
                      <option value="M">Muslim</option>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <input placeholder="Street" name="street" oninput="this.className = ''" required>
                  </div>
                </div>
                <label for="tab1">* Course/Program</label>
                <div class="row form-group">
                  <div class="col-md-7">
                    <input placeholder="Course/Program (No Abbreviation)" name="course" oninput="this.className = ''" required>
                  </div>
                  <div class="col-md-5">
                    <input placeholder="Major (No Abbreviation)" name="course_major" oninput="this.className = ''" required>
                  </div>
                </div>

                <div class="form-group ml-2">
                    {{-- <div class="custom-control custom-radio">
                    <label class="radio-inline ml-4" for="2yrs"><input id="2yrs" name="crs" type="radio" class="custom-control-input"  required> 2 Year's Course &nbsp </label>

                    
                    <label class="custom-control-label ml-4" for="bachelor"><input id="bachelor" name="crs" type="radio" class="custom-control-input" required> Bachelor's Degree &nbsp </label>

                    <label class="custom-control-label ml-4" for="ladder"><input id="ladder" name="crs" type="radio" class="custom-control-input" required> Ladderized &nbsp</label>
                  </div> --}}
                  <label for="rb">* Choose One</label>
                  <div class="custom-control custom-radio">
                    <input name="degmethod" type="radio" id="rb1" class="custom-control-input" value ="2 Year's Course" required>
                    <label class="custom-control-label" for="rb1">2 Year's Course</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input  name="degmethod" type="radio" id="rb2" class="custom-control-input" value="Bachelor's Degree" required>
                    <label class="custom-control-label" for="rb2">Bachelor's Degree</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input name="degmethod" type="radio" id="rb3" class="custom-control-input" value="Ladderized"required>
                    <label class="custom-control-label" for="rb3">Ladderized</label>
                  </div>
                  
                </div>
                {{-- <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" id="rb1" value="2 Year's Course">2 Year's Course
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" id="rb2" value="Bachelor's Degree">Bachelor's Degree
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" id="rb3" value="Ladderized" >Ladderized
  </label>
</div> --}}

                  {{-- <div class="ml-2">
                    <div class="custom-control custom-radio">
                      <input id="grad_yes" name="grad" type="radio" class="custom-control-input"  required>
                      <label class="custom-control-label" for="2yrs">Yes &nbsp</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="grad_no" name="grad" type="radio" class="custom-control-input" required>
                      <label class="custom-control-label" for="bachelor">No</label>
                    </div>
                  </div>
                </div> --}}
              </div>  

                

              <div class="tab">Login Info:
                <p><input placeholder="Username..." oninput="this.className = ''"></p>
                <p><input placeholder="Password..." oninput="this.className = ''"></p>
              </div>

              <div style="overflow:auto;" class="mt-4">
                <div style="float:right;">
                  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
              </div>

              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
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

  function display()
  {
    var x;
    if (document.getElementById('rb1').checked) {
      x = document.getElementById('rb1').value;
    }
    else if (document.getElementById('rb2').checked) {
      x = document.getElementById('rb2').value;
    }
    else if (document.getElementById('rb3').checked) {
      x = document.getElementById('rb3').value;
    }
    
    console.log(x);
  }

$(document).ready(function(){
  $('#mobile').mask('00/00/0000');
  $('#mobile_no').mask('0000-000-0000');
  $('#gmobile_no').mask('0000-000-0000');
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



//







</script>
</body>
</html>
