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

<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    {{-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul> --}}

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
            <a href="/tracking" class="nav-link">
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
                <a href="/reg" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-sign-in nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/apply" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-paper-plane nav-icon"></i>
                  <p>Apply</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/approve" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-check nav-icon"></i>
                  <p>Approve</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
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
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-bullhorn nav-icon"></i>
                  <p>Announcement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/applicant" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-user nav-icon"></i>
                  <p>Applicant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/application" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-folder nav-icon"></i>
                  <p>Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/faqs" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-question nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/scholarship" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Scholarship</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-users nav-icon"></i>
                  <p>Employee</p>
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
                        <a href="/archive/announcement" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-bullhorn nav-icon"></i>
                        <p>Announcement</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/applicant" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-user nav-icon"></i>
                        <p>Applicant</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/application" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-folder nav-icon"></i>
                        <p>Application</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/faqs" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-question nav-icon"></i>
                        <p>FAQs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/users" class="nav-link">
                          &nbsp &nbsp &nbsp &nbsp &nbsp
                        <i class="fa fa-users nav-icon"></i>
                        <p>Employee</p>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-hdd-o nav-icon"></i>
                  <p>Backup and Restore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp &nbsp &nbsp
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
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-file nav-icon"></i>
                  <p> Master List of Scholars</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-file nav-icon"></i>
                  <p>Scholarship Programs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp &nbsp &nbsp
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
            <a href="/users" class="btn btn-info btn-rounded"><i class="fa fa-arrow-left"></i> Go Back</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Transactions</li>
              <li class="breadcrumb-item active">Apply</li>
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
          <div class="card-header" id="th-cl1">
              <h3 class="boldtx">Register User</h3>
          </div>
          <div class="card-body">



            <form action="{{ action('UsersMainController@store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="container">
                <div class="row form-group">
                <h4 class="tx1">Personal Information</h4>
                </div>
                <hr/>
                <div class="row">
                <label for="fullname">* Full Name</label>
                </div>
                <div class="row form-group">
                <div class = "col-md-4">
                    <input type="text" class="form-control" id="surname" placeholder='Surname' required/>
                </div>
                <div class = "col-md-4">
                    <input type="text" class="form-control" id="first_name" placeholder='First Name' required/>
                </div>
                <div class = "col-md-2">
                    <input type="text" class="form-control" id="middle_name" placeholder='Middle Name'/>
                </div>
                <div class = "col-md-2">
                    <input type="text" class="form-control" id="suffix" placeholder='Suffix (e.g., Jr. Sr. III)'/>
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-2">
                    <label for="gender">* Gender</label>
                    <select name="gender" id="gender" class="selectpicker show-tick form-control" data-style="selCol" required>
                        <option value="" selected disabled>--Select--</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="bdate">* Birth Date</label>
                    <input type="date" name="bday" id="bday" class="form-control" data-provide="datepicker" required/>
                </div>
                <div class="col-md-3">
                    <label for="nationality">* Nationality</label>
                    <select name="nationality" id="nationality" class="selectpicker show-tick form-control" data-style="selCol" required>
                        <option value="" selected disabled>--Select--</option>
                        <option value="F">Filipino</option>
                        <option value="A">Foreigner</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="religion">Religion</label>
                    <select name="religion" id="religion" class="selectpicker show-tick form-control" data-style="selCol" required>
                    <option value="" selected disabled>--Select--</option>
                    <option value="R">Roman Catholic</option>
                    <option value="M">Muslim</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="civils">* Civil Status</label>
                    <select name="civil_status" id="civil_status" class="selectpicker show-tick form-control" data-style="selCol"  required>
                    <option value="" selected disabled>--Select--</option>
                    <option value="S">Single</option>
                    <option value="M">Married</option>
                    <option value="W">Widowed</option>
                    </select>
                </div>
                </div>
                <div class="row mt-5 form-group">
                <h4 class="tx1">Address Information</h4>
                </div>
                <hr/>
                <div class="row form-group">
                <div class="col-md-3">
                    <label for="municipality">* Municipality</label>
                    <select name="municipality" id="municipality" class="selectpicker show-tick form-control" data-style="selCol" required >
                    <option value="" selected disabled>--Select--</option>
                    <option value="R">Roman Catholic</option>
                    <option value="M">Muslim</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="barangay">* Barangay</label>
                    <select name="barangay" id="barangay" class="selectpicker show-tick form-control" data-style="selCol" required >
                    <option value="" selected disabled>--Select--</option>
                    <option value="R">Roman Catholic</option>
                    <option value="M">Muslim</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="street">* Street</label>
                    <input type="text" class="form-control" id="street" placeholder='Street' required/>
                </div>
                </div>


                <div class="row mt-5 form-group">
                <h4 class="tx1">Contact Information</h4>
                </div>
                <hr/>
                <div class="row form-group">
                <div class="col-md-4">
                    <label for="mobile_no">* Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_no" placeholder='09xx-xxx-xxxx' required/>
                </div>
                <div class="col-md-4">
                    <label for="email">* Email</label>
                    <input type="email" class="form-control" id="email" placeholder='example@mail.com' required/>
                </div>
                </div>
                <div class="row mt-5 form-group">
                <h4 class="tx1">Role Information</h4>
                </div>
                <hr/>
                <div class="row form-group">
                <div class="col-md-4">
                    <label for="department">* Department</label>
                    <select name="department" id="department" class="selectpicker show-tick form-control" data-style="selCol" required >
                    <option value="" selected disabled>--Select--</option>
                    <option value="R">Roman Catholic</option>
                    <option value="M">Muslim</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="user_type">* User Type</label>
                    <select name="user_type" id="user_type" class="selectpicker show-tick form-control" data-style="selCol"  required >
                    <option value="" selected disabled>--Select--</option>
                    <option value="R">Roman Catholic</option>
                    <option value="M">Muslim</option>
                    </select>
                </div>
                </div>
                
                <div class="flt-right">
                <input type="submit" value="Register" class="material-button-raised"/>
                </div>

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
  $('#mobile').mask('00/00/0000');
  $('#mobile_no').mask('0000-000-0000');
});

</script>
</body>
</html>
