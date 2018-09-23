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
                <a href="/admin/application" class="nav-link active">
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
              <li class="breadcrumb-item active">File Maintenance</li>
              <li class="breadcrumb-item active">FAQS</li>
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
              <h3 class="boldtx">Application</h3>
          </div>
          <div class="card-body"> 
         <div class="flt-right">
            <a href="/admin/apply" class="btn btn-success" >
                <i class="fa fa-plus"></i>
                Add New
            </a>
          </div>

        <br>

    <br />
    <br />
    <!--pending table-->
    <div class="card">
      <div class="card-body">
        <div class="card-title"><strong>Pending Applications</strong></div><hr/>

        <div class="container">
          <table class=" table table-hover" style="width:100%" id="table">
            <thead>
              <tr>
                  <th>Name</th>
                  <th>Scholarship</th>
                  <th>Submitted at</th>
                  <th>Actions</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!--approve table-->
    <div class="card">
      <div class="card-body">
        <div class="card-title"><strong>Approved Applications</strong></div><hr/>
        
        <div class="container">
          <table class=" table table-hover" style="width:100%" id="table2">
            <thead>
              <tr>
                  <th>Name</th>
                  <th>Scholarship</th>
                  <th>Submitted at</th>
                  <th>Approved by</th>
                  <th>Date Approved</th>
                  <th>Actions</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="card-title"><strong>Renewing Applications</strong></div><hr/>
        
        <div class="container">
          <table class=" table table-hover" style="width:100%" id="table3">
            <thead>
              <tr>
                  <th>Name</th>
                  <th>Scholarship</th>
                  <th>Actions</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
     


    <div id="mainModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" id="md-form">
            <div class="modal-content">
                <form method="post" id="main_form">
                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    </div>
                    <div class="modal-body">
                      {{csrf_field()}}    
                      <span id="form_output"></span>              
                      <div id="delForm">
                        <span id="del_output"> </span>
                        <div class="form-group">
                            <h5 class="brand-text font-weight-bold" id="hddel">Are you sure you want to delete it?</h5>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="del_id" id="del_id" value="" />
                          <input type="hidden" name="app_status" id="app_status" value=""/>
                        </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                          <input type="hidden" name="app_id" id="app_id" value="" />
                          <input type="hidden" name="button_action" id="button_action" value="insert" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                          <input type="submit" name="submit" id="action" value="Delete" class="btn btn-danger" />
                      </div>
                </form>
            </div>
        </div>
    </div>


</div>
</div>
       
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
        ajax: '{{ route('application.getdata') }}',
        columns: [
                { data: 'fullname', name: 'fullname' },
                { data: 'scholarship_name', name: 'scholarship_name' },
                { data: 'created_at', name: 'created_at'},
                { width: '20%', data: 'action', orderable:false, searchable: false}
          ] 
    });

      $('#table2').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('application.getdata2') }}',
        columns: [
                { data: 'fullname', name: 'fullname' },
                { data: 'scholarship_name', name: 'scholarship_name' },
                { data: 'created_at', name: 'created_at'},
                { data: 'empfullname', name: 'empfullname' },
                { data: 'date_approved', name: 'date_approved'},  
                { width: '20%', data: 'action', orderable:false, searchable: false}
          ] 
    });

     $('#table3').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('application.getdata3') }}',
        columns: [
                { data: 'fullname', name: 'fullname' },
                { data: 'scholarship_name', name: 'scholarship_name' },
                { width: '20%', data: 'action', orderable:false, searchable: false}
          ] 
    });


            
    $('#add_data').click(function(){
        $('#mainModal').modal('show');
        $('#main_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        $('.modal-title').text('Add Question');
        edit_Form();
    });

    $('#main_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('application.postdata') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                   // $('#form_output').html(data.success);
                    $('#main_form')[0].reset();
                    //$('#action').val('Add');
                   
                    //$('#button_action').val('insert');
                    $('#table').DataTable().ajax.reload();
                    $('#table2').DataTable().ajax.reload();
                    $('#table3').DataTable().ajax.reload();
                    $('#mainModal').modal('hide');
                   
                   if (($('#action').val() == 'Delete'))
                    {
                      swal(
                        'Success!',
                        'Your data is successfully deleted',
                        'success'
                      )
                    }
                }
            }
        })
    });

    
 $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
         //$('#del_output').html('');
         $.ajax({
            url:"{{route('application.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
              $('#mainModal').modal('show');
              $('#app_id').val(id);
              $('#app_status').val(data.application_status);
              $('#button_action').val('delete');

            }
            }); 
    });
});
</script>
</body>
</html>


