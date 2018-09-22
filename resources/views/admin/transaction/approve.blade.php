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
                <a href="/admin/apply" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-paper-plane nav-icon"></i>
                  <p>Apply</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/approve" class="nav-link active">
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
              <li class="breadcrumb-item active">Approve</li>
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
              <h3 class="boldtx">Approve</h3>
          </div>
          <div class="card-body"> 
            <br>
            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row ml-5" >
                                <div class="col-md-11">
                                    <input type="text" class="form-control" id="search" name="search" oninput="search()" autofocus />
                                </div>
                                {{-- <div class="mr-4">
                                    <button class="btn btn-info" id="btn-srch" onclick="typeli()"> TYPE</button>
                                </div> --}}
                            </div>
                            <hr/>
                        </div>
                        <div id="view" name="view" class="">
                          <form id="main_form" method="post" form="{{ action('ApproveController@approved') }}">
                            {{csrf_field()}}  
                          <div class="container justify-content-center">
                              <div class="row form-group">
                                  <h4 class="tx1">Application Information</h4>
                              </div>
                              <div class="row form-group">
                                  <div class = "col-md-6">
                                      <label>Name</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder='' disabled value="NONE" />
                                  </div>
                                  <div class="col-md-4">
                                      <label>Scholarship</label>
                                      <input type="text" class="form-control" id="scholarship" name="scholarship" placeholder='' disabled value="NONE" />
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-md-6">
                                      <label>Address</label>
                                      <input type="text" class="form-control" id="address" name="address" placeholder='' disabled value="NONE" />
                                  </div>
                                  <div class="col-md-4">
                                      <label>Mobile Number</label>
                                      <input type="text" class="form-control" id="mobile_no" name="mobile_no"  disabled placeholder='+63XXXXXXXXXX' required/>
                                      
                                  </div>
                              </div>

                              <div class="row form-group">
                                  <div class="col-md-6" id="eefap" style="display:none;">
                                      <ul class="list-group mt-4">
                                          <li class="list-group-item active"><strong>Requirements</strong></li>
                                          <li class="list-group-item"><i id="chk1"></i> Bio-data with/ 2x2 Picture</li>
                                          <li class="list-group-item"><i id="chk2"></i> Grades/ Form 138 (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk3"></i> Certificate of Registration/ Assessment Form (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk4"></i> Barangay/ Residency/ Indigency Certificate</li>
                                          <li class="list-group-item"><i id="chk5"></i> Official Receipt (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk6"></i> School ID (Photocopy)</li>
                                      </ul>
                                  </div>

                                  <div class="col-md-6" id="eefapgv" style="display:none;">
                                      <ul class="list-group mt-4">
                                          <li class="list-group-item active"><strong>Requirements</strong></li>
                                          <li class="list-group-item"><i id="chk21"></i> Bio-data with 2x2 Picture</li>
                                          <li class="list-group-item"><i id="chk22"></i> Certificate of Honor (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk23"></i> Grades/ Class Cards/ Form 138 (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk24"></i> Barangay/ Residency/ Indigency Certificate</li>
                                          <li class="list-group-item"><i id="chk25"></i> Official Receipt (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk26"></i> Certificate of Registration/ Assessment Form (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk27"></i> School ID (Photocopy)</li>
                                      </ul>
                                  </div>

                                  <div class="col-md-6" id="eefapgv2" style="display:none;">
                                      <ul class="list-group mt-4">
                                          <li class="list-group-item active"><strong>Requirements</strong></li>
                                          <li class="list-group-item"><i id="chk31"></i> Bio-data with 2x2 Picture</li>
                                          <li class="list-group-item"><i id="chk32"></i> Grades/ Form 138 (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk33"></i> Barangay/ Residency/ Indigency Certificate</li>
                                          <li class="list-group-item"><i id="chk34"></i> Official Receipt (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk35"></i> Certificate of Registration/ Assessment Form (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk36"></i> School ID (Photocopy)</li>
                                      </ul>
                                  </div>

                                  <div class="col-md-6" id="pcl" style="display:none;">
                                      <ul class="list-group mt-4">
                                          <li class="list-group-item active"><strong>Requirements</strong></li>
                                          <li class="list-group-item"><i id="chk41"></i> Bio-data with/ 2x2 Picture</li>
                                          <li class="list-group-item"><i id="chk42"></i> Grades/ Form 138 (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk43"></i> Certificate of Registration/ Assessment Form (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk44"></i> Barangay/ Residency/ Indigency Certificate</li>
                                          <li class="list-group-item"><i id="chk45"></i> Official Receipt (Photocopy)</li>
                                          <li class="list-group-item"><i id="chk46"></i> School ID (Photocopy)</li>
                                      </ul>
                                  </div>

                                  
                              </div>
                            
                            </form>
                              <div class="row form-group pull-right">
                                  <button class="btn btn-danger" id="btn-disapproved"  disabled><i class="fa fa-close"></i> DISAPPROVED</button> &nbsp &nbsp
                                  <button class="btn btn-success" id="btn-approved"   disabled><i class="fa fa-check"></i> APPROVED</button>
                                  <div class="ghost">
                                    <input type="hidden" class="ghost" id="applicant_id" name="applicant_id" value=""/>
                                    <input type="hidden" class="ghost" id="sc_id" name="sc_id" value=""/>
                                    <input type="hidden" class="ghost" id="aid" name="aid" value=""/>
                                    <input type="hidden" class="ghost" id="action" name="action"/>
                                    {{-- <input type="submit" name="submit" id="submit"  class="btn btn-info ghost" disabled /> --}}
                                  </div>
                                  
                              </div>
                            </div>

                            <!--END-->
                            
                        </div>

                        <div id="scan" name="scan">
                          <div class="container">
                            <div class="text-center ">
                              <h1>Please scan the barcode</h1>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                </div>


                <div class="card mt-4">
                  <div class="card-body">
                    <div class="card-title">
                      <strong>List of approved applications</strong>
                    </div><hr/>
                    <div class="container">
                      <table class="table table-hover" style="width:100%" id="table">
                      <thead >
                        <tr>
                            <th>Name</th>
                            <th>Scholarship</th>
                            <th>Date Approved</th>
                            <th>Received by</th>          
                        </tr>
                      </thead>
                    </table>  
                    </div>
                  </div>
                </div>

                <div class="card mt-4">
                  <div class="card-body">
                    <div class="card-title">
                      <strong>List of disapproved applications</strong>
                    </div><hr/>
                    <div class="container">
                      <table class="table table-hover" style="width:100%" id="table2">
                      <thead >
                        <tr>
                            <th>Name</th>
                            <th>Scholarship</th>
                            <th>Date Disapproved</th>
                            <th>Received by</th>          
                        </tr>
                      </thead>
                    </table>  
                    </div>
                  </div>
                </div>
                <br>
            </div>
          </div>
        </div>
        {{-- </div> --}}
    {{-- </div> --}}


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
       
</div>
<script>
 $(function() {
    $('#table').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    ajax: '{{ route('list.getdata') }}',
    columns: [
            { data: 'fullname', name: 'fullname' },
            { data: 'scholarship_name', name: 'scholarship_name' },
            { data: 'date_approved', name: 'date_approved'},
            { data: 'empfullname', name: 'empfullname'}

            // { data: 'surname', name: 'surname' },
            // { data: 'first_name', name: 'first_name' },
            // { data: 'middle_name', name: 'middle_name'},
          //  { width: '20%', data: 'action', orderable:false, searchable: false}
            // { width: '5%', data: 'checkbox', orderable:false, searchable: false}      
      ] 
    });

     $('#table2').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    ajax: '{{ route('list.getdata2') }}',
    columns: [
            { data: 'fullname', name: 'fullname' },
            { data: 'scholarship_name', name: 'scholarship_name' },
            { data: 'date_approved', name: 'date_approved'},
            { data: 'empfullname', name: 'empfullname'}

            // { data: 'surname', name: 'surname' },
            // { data: 'first_name', name: 'first_name' },
            // { data: 'middle_name', name: 'middle_name'},
          //  { width: '20%', data: 'action', orderable:false, searchable: false}
            // { width: '5%', data: 'checkbox', orderable:false, searchable: false}      
      ] 
    });
});



$(document).ready(function(){

  var x = document.getElementById("eefap");
  x.style.display = "none"; 
  var y = document.getElementById("eefapgv");
  y.style.display = "none"; 
  var z = document.getElementById("eefapgv2");
  z.style.display = "none"; 
  var w = document.getElementById("pcl");
  w.style.display = "none"; 
  var t = document.getElementById("view");
  t.style.display = "none"; 


});
function search()
{
    //console.log($('#search').val());

        var ids = $('#search').val();
        var id = ids.trim();

        // document.getElementById("btn-disapproved").disabled = false;
        // document.getElementById("btn-approved").disabled = false;
        
        $.ajax({
          url:"{{route('search.fetchdata')}}",
          method:'get',
          data:{id:id},
          dataType:'json',
          success:function(data)
          {
              view_form();
              $('#name').val(data.name);
              $('#mobile_no').val("+63"+data.mobile_number);
              $('#address').val(data.address);
              $('#scholarship').val(data.scholarship);
              $('#aid').val(data.aid);
              $('#sc_id').val(data.sc_id);
              $('#applicant_id').val(data.applicant_id);

              var name = data.name;
              var mobile_no = data.mobile_number;
              var address = data.address;
              var scholarship = data.scholarship;
             
              if(name != "")
              {
                document.getElementById("btn-disapproved").disabled = false;
                document.getElementById("btn-approved").disabled = false;
              

              if(data.type =="eefap")
              {
                var x = document.getElementById("eefap");
                x.style.display = "block";
                for(var i=1; i<=6; i++)
                {
                  var x = "chk"+i;
                  document.getElementById(x).className = "fa fa-check";
                }
              }
              else if (data.type =="eefap-gv")
              {
                if(data.scholarship == "HONORS and RANKS")
                {
                  var y = document.getElementById("eefapgv");
                  y.style.display = "block";
                  for(var c=1; c<=7; c++)
                  {
                    document.getElementById('chk2'+c).className = "fa fa-check";
                  }
                }

                else
                {
                  var w = document.getElementById("eefapgv2");
                  w.style.display = "block";
                  for(var iw=1; iw<=6; iw++)
                  {
                    
                    document.getElementById('chk3'+iw).className = "fa fa-check";
                  }
                }
              }
              else if (data.type == "pcl")
              {
                var z = document.getElementById("pcl");
                  z.style.display = "block";
                  for(var i=1; i<=6; i++)
                  {
                    var x = "chk4"+i;
                    document.getElementById(x).className = "fa fa-check";
                  }
              }
              }
              
          }
         

        });
        

         //document.getElementById("chk").className = "fa fa-check";
          var reset = null;
          $('#name').val('NONE');
          $('#mobile_no').val(reset);
          $('#address').val('NONE');
          $('#scholarship').val('NONE');

          no_form();
        if (id == "")
        {
          var reset = null;
          $('#name').val('NONE');
          $('#mobile_no').val(reset);
          $('#address').val('NONE');
          $('#scholarship').val('NONE');

          var x = document.getElementById("eefap");
          x.style.display = "none"; 
          var y = document.getElementById("eefapgv");
          y.style.display = "none"; 
          var z = document.getElementById("eefapgv2");
          z.style.display = "none"; 
          var w = document.getElementById("pcl");
          w.style.display = "none"; 
           no_form();
          document.getElementById("btn-disapproved").disabled = true;
          document.getElementById("btn-approved").disabled = true;

          for(var i=1; i<=6; i++)
          {
            var x = "chk"+i;
            document.getElementById(x).className ="";
          }
        }
       // $('#form_output').html('');
        

}



$('#btn-approved').click(function(event)
{
 // $( "form:main_form" ).trigger( "submit" );
 //event.preventDefault();
  document.getElementById("main_form").submit();
  $('#action').val('approved');
  no_form();

});

$('#btn-disapproved').click(function(event)
{
 // $( "form:main_form" ).trigger( "submit" );
 //event.preventDefault();
  document.getElementById("main_form").submit();
  $('#action').val('disapproved');
  no_form();

});

var chk = 0;
function typeli()
{

 // console.log($('#btn-sr').text());

  if(chk==0)
  {
    // $('#srch-icon').removeClass("fa fa-keyboard");
    // $("#srch-icon").addClass("fa fa-barcode");
     //document.getElementById("srch-icon").classList.add('fa-barcode');
    $('#btn-srch').text(' SCAN');

    // var d = document.getElementById("srch-icon");
    // d.style.display = "none"; 
    // var c = document.getElementById("srch-icon2");
    // c.style.display = "block"; 
    //document.getElementById("srch-icon").className = "fa-barcode";
    //document.getElementById('search').readOnly = true;
   // document.getElementById('search').removeAttribute('readonly');
    $('#search').prop('readonly', false);
    chk+=1;
    
  }
  else
  {
   
    $('#btn-srch').text(' TYPE');
    $('#search').prop('readonly', true);
    chk=0;
  }
    

  // $('#search').val('OIzy8ol2ae'); 
  // search();
}

function view_form()
{
   var x = document.getElementById("view");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var y = document.getElementById("scan");
    y.style.display = "none";
}

function no_form()
{
   var x = document.getElementById("scan");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var y = document.getElementById("view");
    y.style.display = "none";
}

</script>
</body>
</html>
