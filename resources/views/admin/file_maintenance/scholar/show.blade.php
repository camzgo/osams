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
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.min.css"> --}}
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.min.js"></script>   --}}
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
                  &nbsp
                  <i class="fa fa-sign-in nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp
                  <i class="fa fa-paper-plane nav-icon"></i>
                  <p>Apply</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp
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
                  &nbsp
                  <i class="fa fa-bullhorn nav-icon"></i>
                  <p>Announcement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/applicant" class="nav-link">
                  &nbsp
                  <i class="fa fa-user nav-icon"></i>
                  <p>Applicant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/application" class="nav-link">
                  &nbsp
                  <i class="fa fa-folder nav-icon"></i>
                  <p>Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/faqs" class="nav-link">
                  &nbsp
                  <i class="fa fa-question nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/scholarship" class="nav-link active">
                  &nbsp
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Scholarship</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  &nbsp
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
                  &nbsp
                  <i class="fa fa-history nav-icon"></i>
                  <p>Audit Log</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  &nbsp
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Archive
                    <i class="right fa fa-angle-left"></i>
                  </p>
                  
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/archive/announcement" class="nav-link">
                          &nbsp &nbsp &nbsp
                        <i class="fa fa-bullhorn nav-icon"></i>
                        <p>Announcement</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/applicant" class="nav-link">
                          &nbsp &nbsp &nbsp
                        <i class="fa fa-user nav-icon"></i>
                        <p>Applicant</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/application" class="nav-link">
                          &nbsp &nbsp &nbsp
                        <i class="fa fa-folder nav-icon"></i>
                        <p>Application</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/faqs" class="nav-link">
                          &nbsp &nbsp &nbsp
                        <i class="fa fa-question nav-icon"></i>
                        <p>FAQs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/archive/users" class="nav-link">
                          &nbsp &nbsp &nbsp
                        <i class="fa fa-users nav-icon"></i>
                        <p>Users</p>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp
                  <i class="fa fa-hdd-o nav-icon"></i>
                  <p>Backup and Restore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp
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
                  &nbsp
                  <i class="fa fa-file nav-icon"></i>
                  <p> Master List of Scholars</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp
                  <i class="fa fa-file nav-icon"></i>
                  <p>Scholarship Programs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp
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
    
     <table class=" table table-hover table-hover" style="width:100%" id="table">
               <thead class="th-cl1">
                  <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Amount</th>
                     <th>Deadline</th>
                     <th>Slots</th>
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
                          <input type="text" name="scholarship_name" id="scholarship_name" class="form-control" />
                      </div>
                      <div class="form-group">
                          <label>Description</label>
                          <textarea type="text" name="scholarship_desc" id="scholarship_desc" class="form-control noresize" rows="5"></textarea>
                      </div>
                      <div class="form-group ">
                        <label>Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Php</span>
                          </div>
                            <input type="number" name="amount" id="amount" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Deadline</label>
                          <input type="date" name="deadline" id="deadline" class="form-control" data-provide="datepicker" />
                      </div>
                      <div class="form-group">
                          <label>Slots</label>
                          <input type="text" name="slot" id="slot" class="form-control" />
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
                        { data: 'id', name: 'id' },
                        { data: 'scholarship_name', name: 'scholarship_name' },
                        { data: 'scholarship_desc', name: 'scholarship_desc' },
                        { data: 'amount', name: 'amount'},
                        { data: 'deadline', name: 'deadline'},
                        { data: 'slot', name: 'slot'},
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
                        'The data is updated',
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