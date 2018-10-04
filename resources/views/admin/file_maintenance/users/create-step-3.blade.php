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
  .surnamemsg, .first_namemsg, .middle_namemsg, .suffixmsg, .bdaymsg{
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
                <a href="/admin/employee" class="nav-link active">
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
              <li class="breadcrumb-item active">File Maintenance</li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <a href="/admin/employee" class="btn btn-secondary btn-rounded flt-right"><i class="fa fa-arrow-left"></i> Go Back</a>
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
              <h4 class="boldtx">Register Employee</h4>
          </div>
          <div class="card-body">
    <form action="{{ action('UsersMainController@store') }}" id="regForm" method="post" enctype="multipart/form-data" class="container">
      {{csrf_field()}}
      <div class="row mt-2 form-group">
          <h4 class="tx1">Account</h4>
        </div>
        <hr/>
        <div class="row form-group">
          <div class="col-md-4">
            <label for="user_type">* Account Type</label> <br>
            <select name="user_type" id="user_type" class="selectpicker show-tick "  required >
              <option value="" selected disabled>--Select--</option>
              @foreach ($accnt as $accnt_list)
                  <option value="{{$accnt_list->id}}">{{$accnt_list->account_name}}</option>
              @endforeach
            </select>
          </div>
        </div> 
        <div class="row form-group mt-4">
          <h4 class="tx1">Personal Information</h4>
        </div>
        <hr/>
        <div class="row">
          <label for="fullname">* Full Name</label>
        </div>
        <div class="form-row ">
          <div class = "col-md-4">
            <input type="text" class="form-control surname" id="surname" name="surname" placeholder='Surname' required/>
            <p class="surnamemsg hidden">Please Enter a valid surname</p>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control first_name" id="first_name" name="first_name" placeholder='First Name' required/>
            <p class="first_namemsg hidden">Please Enter a valid first name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" placeholder='Middle Name'/>
            <p class="middle_namemsg hidden">Please Enter a valid middle name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control suffix" id="suffix" name="suffix" placeholder='Suffix (e.g., Jr. Sr. III)'/>
            <p class="suffixmsg hidden">Please Enter a valid suffix</p>
          </div>
        </div>
        <div class="form-row form-group">
          <div class="col-md-4">
              <label for="gender">* Gender</label>
              <select name="gender" id="gender" class=" form-control req"  required>
                <option value="" selected disabled>--Select--</option>
                <option value="Male">MALE</option>
                <option value="Female">FEMALE</option>
              </select>
          </div>
          <div class="col-md-4">
            <label for="bdate">* Birth Date</label>
            <input type="text" name="bday" id="bday" class="form-control req" placeholder="mm/dd/yyyy" required/>
            <p class="bdaymsg hidden">Please Enter a valid birth date</p>
          </div>
          <div class="col-md-4">
            <label for="civils">* Civil Status</label>
            <select name="civil_status" id="civil_status" class="form-control req"  required>
              <option value="" selected disabled>--Select--</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Separated">Separated</option>
              <option value="Widowed">Widowed</option>
            </select>
          </div>
        </div>
        {{-- <div class="row mt-5 form-group">
          <h4 class="tx1">Address Information</h4>
        </div>
        <hr/> --}}
        <div class="form-row form-group">
          <div class="col-md-3">
            <label for="municipality">* Municipality</label>
            <select name="municipality" id="municipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
              @foreach ($municipal_list as $municipal)
                  <option value="{{$municipal->municipality}}">{{$municipal->municipality}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label for="barangay">* Barangay</label>
            <select name="barangay" id="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="_street" name="_street" placeholder='Street'/>
          </div>
        </div>
        {{-- <div class="row mt-5 form-group">
          <h4 class="tx1">Contact Information</h4>
        </div>
        <hr/> --}}
        <div class="form-row form-group">
          <div class="col-md-3">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
              <input type="text" class="form-control req" id="mobile_no" name="mobile_no" placeholder='9xxxxxxxxx' required/>
            </div>
            
          </div>
          <div class="col-md-4">
            <label for="email">* Email</label>
            <input type="email" class="form-control req" id="email" name="email" placeholder='example@mail.com' required/>
          </div>
        </div>
        <div class="flt-right mt-4">
          <input type="submit" value="Register" class="material-button-raised"/>
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
});


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

  $('#municipality').change(function(){
    $('#barangay').val('');
  });

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

var regexname1=/^([a-zA-Z ]{2,30})$/;
    $('.first_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname1)) {
    // there is a mismatch, hence show the error message
        $('.first_namemsg').removeClass('hidden');
        $('.first_namemsg').show();
    }
    else{
        // else, do not display message
        $('.first_namemsg').addClass('hidden');
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


    var d = new Date();
var year = d.getFullYear() - 18;
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
    
        if (age<18)
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

</script>
<script src="{{ URL::asset('data/religion.js') }}" type="text/javascript"></script>
</body>
</html>
