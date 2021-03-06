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
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> --}}
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.min.css"> --}}
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.min.js"></script>   --}}
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
                <a href="/admin/grades" class="nav-link">
                  &nbsp &nbsp &nbsp
                  <i class="fa fa-id-card nav-icon"></i>
                  <p>Grades</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/scholarship" class="nav-link active">
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
              <li class="breadcrumb-item active">Scholarship</li>
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
              <h3 class="boldtx">Scholarship</h3>
          </div>
          <div class="card-body"> 
        <br>
        <div class="container">
    
     <table class=" table table-hover" style="width:100%" id="table">
               <thead class="th-cl1">
                  <tr>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Amount</th>
                     <th>Deadline</th>
                     <th>Slots</th>
                     <th>Supplement</th>
                     <th>Current Status</th>
                     <th>Actions</th>
                     {{-- <th><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></th> --}}
                  </tr>
               </thead>
            </table>
            <br>
</div>

<div id="mainModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="md-form">
        <div class="modal-content">
            <form method="post" id="main_form">
                <div class="modal-header">
                   <h4 class="modal-title">Add Data</h4>
                   <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                  {{csrf_field()}} 
                  <span id="form_output"></span>                 
                  <div id="editForm">
                      <div class="form-group">
                          <label>Scholarship Name:</label>
                          <input type="text" name="scholarship_name" id="scholarship_name" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label>Description</label>
                          <textarea type="text" name="scholarship_desc" id="scholarship_desc" class="form-control noresize" rows="3" required></textarea>
                      </div>
                      <div class="form-group ">
                        <label>Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Php</span>
                          </div>
                            <input type="number" name="amount" id="amount" class="form-control" required/>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Deadline</label>
                          <input type="date" name="deadline" id="deadline" class="form-control" data-provide="datepicker" required/>
                      </div>
                      <div class="form-group">
                          <label>Slots</label>
                          <input type="number" name="slot" id="slot" class="form-control" required/>
                      </div>
                      <div class="form-group">
                          <label>Supplement</label>
                          <input type="number" name="supp" id="supp" class="form-control" required/>
                      </div>
                  </div>
                  <div id="delForm">
                     <span id="del_output"> </span>
                    <div class="form-group">
                        <h5 class="brand-text font-weight-bold" id="hddel">Are you sure you want to close it?</h5>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="del_id" id="del_id" value="" />
                      <input type="hidden" name="status" id="status" value="">
                    </div>
                     {{-- <div class="form-group" style="float:right;">
                       <input type="submit" class="btn btn-danger" id="close_this" name="submit" value="Close"/>
                       <button type="button" class="btn btn-danger" id="close_this" name="close_this" onclick="archiveData()"> Close </button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                    </div> --}}
                  </div>
                </div>
                  <div class="modal-footer">
                      <input type="hidden" name="scholarship_id" id="scholarship_id" value="" />
                      <input type="hidden" name="button_action" id="button_action" value="insert" />
                      <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                      <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                  </div>
            </form>
        </div>
    </div>
</div>

{{-- <div id="delModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="del_form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
              </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="del_output"> </span>
                    <div class="form-group">
                        <h5 class="brand-text font-weight-bold">Are you sure you want to close it?</h5>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="del_id" id="del_id" value="" />
                      <input type="hidden" name="status" id="status" value="">
                    </div>
                     <div class="form-group" style="float:right;">
                       <input type="submit" class="btn btn-danger" id="close_this" name="submit" value="Close"/>
                       <button type="button" class="btn btn-danger" id="close_this" name="close_this" onclick="archiveData()"> Close </button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                    </div>
                        
                  </div>
            </form>
        </div>
    </div>
</div> --}}

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
               ajax: '{{ route('scholar.getdata') }}',
               columns: [
                        { data: 'scholarship_name', name: 'scholarship_name' },
                        { data: 'scholarship_desc', name: 'scholarship_desc' },
                        { data: 'amount', name: 'amount'},
                        { data: 'deadline', name: 'deadline'},
                        { data: 'slot', name: 'slot'},
                        { data: 'supplement', name: 'supplement'},
                        { width: '12%', data: 'badge', orderable:false, searchable: false},
                        { width: '20%', data: 'action', orderable:false, searchable: false}
                        
                        // { width: '5%', data: 'checkbox', orderable:false, searchable: false}      
                  ]
            });

        $('#add_data').click(function(){
        $('#formModal').modal('show');
        $('#main_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        $('.modal-title').text('Add Question');
    });

    $('#main_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('scholar.postdata') }}",
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
                    $('#main_form')[0].reset();
                    $('#table').DataTable().ajax.reload();
                    $('#mainModal').modal('hide');
                    if($('#action').val() == 'Edit')
                    {
                      swal(
                        'Success!',
                        'Your data is updated',
                        'success'
                      )
                    }
                    else if (($('#action').val() == 'Close'))
                    {
                      swal(
                        'Success!',
                        'You have successfully close the program',
                        'success'
                      )
                    }
                    else if (($('#action').val() == 'Open'))
                    {
                      swal(
                        'Success!',
                        'You have successfully open the program',
                        'success'
                      )
                    }
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('scholar.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
              edit_Form();
              $('#scholarship_name').val(data.scholarship_name);
              $('#scholarship_desc').val(data.scholarship_desc);
              $('#amount').val(data.amount);
              $('#slot').val(data.slot);
              $('#deadline').val(data.deadline);
              $('#supp').val(data.supplement);
              $('#scholarship_id').val(id);
              $('#mainModal').modal('show');
              $('#action').val('Edit');
              document.getElementById("action").className = "btn btn-info";
              document.getElementById("md-form").classList.add('modal-lg');
              $('#button_action').val('update');
              $('.modal-title').text('Edit Data');
               // $('#button_action').val('update');
            }
    });   
    });
    
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
         //$('#del_output').html('');
         $.ajax({
            url:"{{route('scholar.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                // console.log("status: " + data.status );
                
                $('#del_id').val(id);
                if(data.status == "OPEN"){
                  $('#status').val("CLOSED");
                  $('#action').val('Close');
                  document.getElementById("action").className = "btn btn-danger";
                  $("#hddel").text("Are you sure you want to close it?");
                }
                else
                {
                  $('#status').val("OPEN");
                  $('#action').val('Open');
                  document.getElementById("action").className = "btn btn-success";
                  $("#hddel").text("Are you sure you want to open it?");
                }
                del_Form();
                $('#scholarship_name').val(data.scholarship_name);
                $('#scholarship_desc').val(data.scholarship_desc);
                $('#amount').val(data.amount);
                $('#slot').val(data.slot);
                $('#supp').val(data.supplement);
                $('#deadline').val(data.deadline);
                $('#scholarship_id').val(id);
                $('#mainModal').modal('show');
                document.getElementById("md-form").classList.remove('modal-lg');
                $('#button_action').val('close');
                $('.modal-title').text('');
                          
               // $('#delModal').modal('show');
                
               // $('#button_action').val('update');
            }
            }); 
        //console.log("id: " + id);
        
    }); 
    // // $('#del_form').on('submit', function(event){
    //     // event.preventDefault();
    //     // var del_data = $(this).serialize();
    //     $.ajax({
    //         url:"{{route('scholar.removedata')}}",
    //         method:"POST",
    //         //data:del_data,
    //         dataType:"json",
    //         success:function(data)
    //         {
    //           //$('#del_output').html(data.success);
    //           //$('#del_form')[0].reset();
    //           $('#table').DataTable().ajax.reload();
    //           $('#table').DataTable().ajax.reload();      
    //         }
    //     });
    // }); 
    // click', '.close_this',
    // $('.delModal').on('click', '.close_this', function(event)
    // {
    //   $.ajax({
    //     type: 'POST',
    //     url:"{{route('scholar.removedata')}}",
    //     data: {
    //             'id': $("#del_id").val(),
    //             'status': $('#status').val()
    //         },
    //     success:function(data)
    //     {
    //       $('#table').DataTable().ajax.reload();
    //     }
    //   });
    // });
    // $('#del_form').on('submit', function(event){
    //     event.preventDefault();
    //     var del_data = $(this).serialize();
    //     //console.log('Successful!');
    //     $.ajax({
    //         url:"{{ route('scholar.removedata') }}",
    //         method:"POST",
    //         data:del_data,
    //         dataType:"json",
    //         success:function(data)
    //         {
    //           $('#table').DataTable().ajax.reload();
    //           console.log('Successful!');
    //             if(data.error.length > 0)
    //             {
    //                 var error_html = '';
    //                 for(var count = 0; count < data.error.length; count++)
    //                 {
    //                     error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
    //                 }
    //                 $('#form_output').html(error_html);
    //             }
    //             else
    //             {
    //                 $('#table').DataTable().ajax.reload();
    //             }
    //         }
    //     })
    // });
    
  
});
// function archiveData()
//     {
//       $.ajax({
//         type: 'POST',
//         url:"{{route('scholar.removedata')}}",
//         data: {
//                 'id': $("#del_id").val(),
//                 'status': $('#status').val()
//             },
//         success:function(data)
//         {
//           $('#table').DataTable().ajax.reload();
//         }
//       });
//     }

function edit_Form() {
    var x = document.getElementById("editForm");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var y = document.getElementById("delForm");
    y.style.display = "none";
    // } else {
    //     x.style.display = "block";
    // }
}
function del_Form() {
    var x = document.getElementById("delForm");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var y = document.getElementById("editForm");
    y.style.display = "none";
    // } else {
    //     x.style.display = "block";
    // }
}
</script>
</body>
</html>