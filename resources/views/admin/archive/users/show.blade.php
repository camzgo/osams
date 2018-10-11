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
          <li class="nav-item has-treeview menu-open">
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
              <li class="nav-item has-treeview menu-open">
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
                        <a href="/admin/archive/employee" class="nav-link active">
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
              <li class="breadcrumb-item active">Utilities</li>
              <li class="breadcrumb-item active">Archive</li>
              <li class="breadcrumb-item active">Employee</li>
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
          <div class="card-header" id="th-cl2">
              <h3 class="boldtx">Employee Archive</h3>
          </div>
          <div class="card-body"> 
         <div class="flt-right">
            {{-- <a href="#" class="btn btn-success" id="add_data" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i>
                Add New
            </a> --}}
          </div>

        <br>
        <div class="container">
    <br />

     <table class=" table table-hover" style="width:100%" id="table">
               <thead class="th-cl2">
                  <tr>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Account Type</th>
                     <th>Actions</th>
                     {{-- <th><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></th> --}}
                  </tr>
               </thead>
            </table>
            <br>
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
                      <div id="delForm">
                        <span id="del_output"> </span>
                        <div class="form-group" id="dvh2">
                            <h5 class="brand-text font-weight-bold" id="hddel"></h5>
                            {{-- <h2 class="brand-text font-weight-bold ghost" id="hddel2">Are you sure?</h2> --}}
                            <p class="ghost" id="sec">You will not be able to recover this file</p>
                        </div>
                        <div class="form-group ghost">
                          {{-- <input type="hidden" name="del_question" id="del_question" value="" class="ghost"/>
                          <input type="hidden" name="del_answer" id="del_answer" value="" class="ghost"/> --}}
                          <input type="hidden" name="faq_isdel" id="faq_isdel" value="" class="ghost"/>
                          <input type="hidden" name="faq_id" id="faq_id" value="" class="ghost"/>
                          <input type="hidden" name="confirm" id="confirm" value="" class="ghost"/>
                        </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                          <input type="hidden" name="button_action" id="button_action" value="insert" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                            <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                          <div class="" id="condel" name="condel">
                            <button class="btn btn-danger" value="" id="del" onclick="confirmDel()">Delete</button>
                          </div>
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
               ajax: '{{ route('archiveusers.getdata') }}',
               columns: [
                        { data: 'fullname', name: 'fullname' },
                        { data: 'email', name: 'email' },
                        { data: 'account_name', name: 'account_name'},
                        { width: '20%', data: 'action', orderable:false, searchable: false}
                        // { width: '5%', data: 'checkbox', orderable:false, searchable: false}      
                  ] 
            });

    $('#main_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('archiveusers.postdata') }}",
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
                    $('#table').DataTable().ajax.reload();
                    $('#mainModal').modal('hide');
                    if($('#action').val() == 'Restore')
                    {
                      swal(
                        'Success!',
                        'Your data has been successfully restored',
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
            url:"{{route('archiveusers.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                if(data.faq_isdel==1)
                {
                    $('#faq_isdel').val(0);
                }

                // $('#del_question').val(data.question);
                // $('#del_answer').val(data.answer);
                $('#faq_id').val(id);

                $('#button_action').val('update');
                $('#mainModal').modal('show');
                $('#action').val('Restore');
                $('#hddel').text('Are you sure you want to restore it?');
                document.getElementById("action").className = "btn btn-success";
                document.getElementById("condel").className = "ghost";
                document.getElementById("sec").className = "ghost";
                document.getElementById("hddel").classList.remove("ghost");
                var parent = document.getElementById("dvh2");
                var child = document.getElementById("hddel2");
                parent.removeChild(child);
                //console.log(id + ' ' + data.faq_isdel + ' ' + data.answer + ' ' +data.question);
            }
    });   
    });
    
 $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        // if(confirm("Are you sure you want to delete this data?"))
        // {
        //     $.ajax({
        //         url:"{{route('archivefaqs.removedata')}}",
        //         method:"get",
        //         data:{id:id},
        //         success:function(data)
        //         {
        //             var x = data
        //             swal("Done!", ""+data, "success");
        //             $('#table').DataTable().ajax.reload();
        //         }
        //     })
        // }
        // else
        // {
        //     return false;
        // }

        $('#mainModal').modal('show');
        //$('#hddel').text('Are you sure you want to delete it?');
        document.getElementById("action").className = "ghost";
        document.getElementById("condel").className = "";
        document.getElementById("sec").className = "";
        document.getElementById("hddel").classList.add("ghost");
        $('#del').val(id);
        $('#confirm').val('true');
        document.getElementById("sec").style.textAlign = "center";
        // var para = document.createElement("h2");
        // var node = document.createTextNode("Are you sure?");
        // para.appendChild(node);
        // var element = document.getElementById("dvh2");
        // var child = document.getElementById("hddel");
        // element.insertBefore(para, child);
        //document.getElementById("hddel2").style.textAlign = "center";
        //document.getElementById("hddel2").classList.remove("ghost");

        var para = document.createElement("h2");
        var node = document.createTextNode("Are you sure?");
        para.appendChild(node);
        // para.id = "hddel2";
        // par.classList.add("brand-text font-weight-bold");
        var element = document.getElementById("dvh2");
        var child = document.getElementById("hddel");
        element.insertBefore(para, child);
        para.setAttribute("id", "hddel2");
        para.setAttribute("class", "brand-text font-weight-bold");
        document.getElementById("hddel2").style.textAlign = "center";

    });
});
function confirmDel()
{
    var id = $('#del').val();
    var confirm = $('#confirm').val();

    $('#mainModal').modal('hide');
    
    if(confirm=='true')
    {
        $.ajax({
            url:"{{route('archiveusers.removedata')}}",
            method:"get",
            data:{id:id},
            success:function(data)
            {
              var x = data
              swal("Done!", ""+data, "success");
              $('#table').DataTable().ajax.reload();
            }
        })

        document.getElementById("hddel").classList.remove("ghost");
        var parent = document.getElementById("dvh2");
        var child = document.getElementById("hddel2");
        parent.removeChild(child);
                            
    }
    else
    {
        return false;
    }
    
    
}
</script>
</body>
</html>


