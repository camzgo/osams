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

<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
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
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="/admin/reg" class="nav-link active">
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
                <a href="/admin/reports/master-list" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-file nav-icon"></i>
                  <p> Master List of Scholars</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/reports/scholarship-programs" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-file nav-icon"></i>
                  <p>Scholarship Programs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/reports/application-forms" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-file nav-icon"></i>
                  <p>Application Forms</p>
                </a>
              </li>
            </ul>
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
              <li class="breadcrumb-item active">Register</li>
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
        <div class="card">
          <div class="card-header" id="th-cl1">
              <h3 class="boldtx">Register Applicant</h3>
          </div>
          <div class="card-body"> 
        <br>
        <div class="container">
            {{-- {!! Form::open(['action' => 'RegisterMainController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col">
                    <div class = "form-group">
                        {{Form::label('surname', 'Surname')}}
                        {{Form::text('text', '', ['class' => 'form-control', 'placeholder' => 'Surname'])}}
                    </div>
                </div>
                <div class="col">
                    <div class = "form-group">
                        {{Form::label('firstname', 'First Name')}}
                        {{Form::text('text', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                    </div>
                </div>
                <div class="col-3">
                    <div class = "form-group">
                        {{Form::label('middlename', 'Middle Name')}}
                        {{Form::text('text', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
                    </div>
                </div>
            </div>
            <div class ="row">
                <div class="col-md-6">
                    <div class = "form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                    </div>
                </div>
                <div class="col-md-2">
                    {{Form::label('gender', 'Gender')}}
                    {{Form::select('size', array('M' => 'Male', 'F' => 'Female'), NULL, array('class' => 'form-control', 'placeholder' =>'Gender'))}}
                </div>
                <div class="col-md-4">
                    {{Form::label('bday', 'Birthdate')}}
                    {{Form::date('bday', new \DateTime(), ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="flt-right">
                {{Form::submit('Register', ['class' => 'btn btn-success'])}}
            </div>
            {!! Form::close() !!} --}}

            {{-- <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name') }}" required autofocus>

                                @if ($errors->has('middle_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control"> 
                                    <option value="" selected disabled>--Please select--</option>
                                    <option value="Male" >Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="bday" id="bday" class="form-control" data-provide="datepicker" />

                                @if ($errors->has('bday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input id="password" type="hidden" value="capitolscholar" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <input id="isdel" type="hidden" class="form-control" value="0">
                                <input id="photo" type="hidden" class="form-control" value="0">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" value="capitolscholar" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form> --}}


                    <form action="{{ action('ApplicantMainController@store') }}" method="POST" >
                    {{csrf_field()}}
                    <div class="container">
                      <div class="row">
                        <label for="fullname">* Full Name</label>
                      </div>
                      <div class="row form-group">
                        <div class = "col-md-4">
                          <input type="text" class="form-control" id="surname" name="surname" placeholder='Surname' required/>
                        </div>
                        <div class = "col-md-4">
                          <input type="text" class="form-control" id="first_name" name="first_name" placeholder='First Name' required/>
                        </div>
                        <div class = "col-md-2">
                          <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder='Middle Name'/>
                        </div>
                        <div class = "col-md-2">
                          <input type="text" class="form-control" id="suffix" name="suffix" placeholder='Suffix (e.g., Jr. Sr. III)'/>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-2">
                            <label for="gender">* Gender</label>
                            <select name="gender" id="gender" class="selectpicker show-tick form-control" data-style="selCol" required>
                              <option value="" selected disabled>--Select--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label for="bdate">* Birth Date</label>
                          <input type="date" name="bday" id="bday" class="form-control" data-provide="datepicker" required/>
                        </div>
                        <div class="col-md-3">
                          <label for="mobile_number">* Mobile Number</label>
                          <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder='09xx-xxx-xxxx' required/>
                        </div>
                        <div class="col-md-4">
                          <label for="email">* Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder='example@mail.com' required/>
                        </div>
                      </div>
                    </div>
                    
                    <div class="flt-right mt-4">
                      <input type="submit" value="Register" class="material-button-raised"/>
                    </div>
                    
                    </form>
        </div>

</div>
</div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
        
</div>

<script>

$(document).ready(function(){
  $('#mobile_no').mask('0000-000-0000');
});

</script>
</body>
</html>
