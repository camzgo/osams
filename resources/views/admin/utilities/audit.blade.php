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
                <a href="/admin/audit-log" class="nav-link active">
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
              <li class="breadcrumb-item active">Utilities</li>
              <li class="breadcrumb-item active">Audit Log</li>
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
              <h3 class="boldtx">Audit Log</h3>
          </div>
          <div class="card-body"> 
         <div class="container">
           <div class="form-row align-items-center mt-4 mb-2">
             <div class="col-md-2">
               {{-- <label>Date from:</label> --}}
               <input type="date" class="form-control" id="date_to" name="date_to" onchange="srch()">
             </div>
             <div class="col-md-0 mt-2">
               <label>FROM <i class="fa fa-arrow-right"></i> TO</label>
             </div>
             <div class="col-md-2">
               {{-- <label>Date to:</label> --}}
               <input type="date" class="form-control" id="date_from" date="date_to" onchange="srch()">
             </div>
             
             {{-- <div class="col-md-3">
               <a href="#" class="btn btn-success ">Search</a>
             </div> --}}
           </div>
          </div>

        <br>
        <div class="container">
           @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
     <table class=" table table-hover" style="width:100%" id="table">
               <thead class="th-cl1">
                  <tr>
                     <th>Name</th>
                     <th>Action</th>
                     <th>Date</th>
                     <th>Time</th>
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
                      <h4 class="modal-title">Add New</h4>
                      <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    </div>
                    <div class="modal-body">
                      {{csrf_field()}}    
                      <span id="form_output"></span>              
                      <div id="editForm">
                        <div class="row form-group">
                          <div class="col-md-12">
                            <label>Account Name <small>(required)</small></label>
                            <input type="text" name="accnt_name" id="accnt_name" class="form-control" required/>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-12">
                            <label>Description <small>(required)</small></label>
                            <textarea type="text" name="accnt_desc" id="accnt_desc" class="form-control noresize" rows="7" required></textarea>
                          </div>
                        </div>
                        <div class="row form-group no-gutters">
                          <div class="col-md-4">
                            <ul class="list-group">
                              <li class="list-group-item ">      
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="fm" onchange="fmaction(this)">
                                  <label class="custom-control-label" for="fm">File Maintenance</label>
                                </div> 
                              </li>
                              <li class="list-group-item ">      
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="trans" onchange="transaction(this)">
                                  <label class="custom-control-label" for="trans">Transactions</label>
                                </div> 
                              </li>
                            </ul>
                          </div>
                          <div class="col-md-4">
                            <ul class="list-group">
                              <li class="list-group-item ">      
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="tr" onchange="traction(this)">
                                  <label class="custom-control-label" for="tr">Tracking</label>
                                </div> 
                              </li>
                              <li class="list-group-item">      
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="util" onchange="utilaction(this)">
                                  <label class="custom-control-label" for="util">Utilities</label>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="col-md-4">
                            <ul class="list-group">
                              <li class="list-group-item ">      
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="sub" onchange="subaction(this)">
                                  <label class="custom-control-label" for="sub">Submission</label>
                                </div> 
                              </li>
                              <li class="list-group-item">      
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="rep" onchange="repaction(this)">
                                  <label class="custom-control-label" for="rep">Reports</label>
                                </div>
                              </li>
                              
                            </ul>
                          </div>                        
                        </div>
                         
                      </div>
                      <div id="delForm">
                        <span id="del_output"> </span>
                        <div class="form-group" id="dvh2">
                            <h5 class="brand-text font-weight-bold" id="hddel"></h5>
                            {{-- <h2 class="brand-text font-weight-bold ghost" id="hddel2">Are you sure?</h2> --}}
                            <p class="ghost" id="sec">You will not be able to recover this file</p>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="del_id" id="del_id" value="" />
                          <input type="hidden" name="confirm" id="confirm" value="" class="ghost"/>
                        </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                          <input type="hidden" name="accnt_id" id="accnt_id" value="" />
                          <input type="hidden" name="button_action" id="button_action" value="insert" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                          <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                          <div class="" id="condel" name="condel">
                            <button class="btn btn-danger" value="" id="del" onclick="confirmDel()">Delete</button>
                          </div>
                          <div class="ghost">
                            <input type="hidden" name="tx_fm" id="tx_fm" class="ghost" value="Deny"/>
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
               searching: false,
               ajax: '{{ route('audit.getdata') }}',
               columns: [
                        { data: 'fullname', name: 'fullname' },
                        { data: 'action', name: 'action' },
                        { data: 'date', name: 'date' },
                        { data: 'time', name: 'time' }
                        
                  ] 
            });
    $('#add_data').click(function(){
        $('#mainModal').modal('show');
        $('#main_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        $('.modal-title').text('Add Account');
        edit_Form();
    });

    $('#main_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();

        if (fm == "Deny" && tr == "Deny" && trans == "Deny" && util == "Deny" && rep == "Deny" && sub == "Deny") alert('ERROR: You need to grant atleast one!'); 
        //else alert('Success!');
        else 
        {
          $.ajax({
              url:"{{ route('permission.postdata') }}",
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
                      $('.modal-title').text('Add');
                      //$('#button_action').val('insert');
                      $('#table').DataTable().ajax.reload();
                      $('#mainModal').modal('hide');
                      if($('#action').val() == 'Edit')
                      {
                        swal(
                          'Success!',
                          'Your data has been successfully updated',
                          'success'
                        )
                      }
                      else if (($('#action').val() == 'Add'))
                      {
                        swal(
                          'Success!',
                          'You have successfully added a new data',
                          'success'
                        )
                      }
                      else if (($('#action').val() == 'Delete'))
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
        }
    });


    $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('permission.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#accnt_name').val(data.account_name);
                $('#accnt_desc').val(data.account_desc);
                $('#accnt_id').val(id);


                if(data.file_maintenance == 'Grant') document.getElementById("fm").checked = true;
                if(data.tracking == 'Grant') document.getElementById("tr").checked = true;
                if(data.transactions == 'Grant') document.getElementById("trans").checked = true; 
                if(data.utilities == 'Grant') document.getElementById("util").checked = true; 
                if(data.reports == 'Grant') document.getElementById("rep").checked = true;
                if(data.submission == 'Grant') document.getElementById("sub").checked = true;


                $('#formModal').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit');
                $('#button_action').val('update');
                edit_Form();
                $('#mainModal').modal('show');
                $('#action').val('Edit');
                document.getElementById("action").className = "btn btn-info";
                document.getElementById("md-form").classList.add('modal-lg');
                $('#button_action').val('update');
            }
    });   
    });
    
$(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
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

        del_Form();
        $('#accnt_id').val(id);
        // $('#accnt_name').val(data.account_name);
        // $('#accnt_desc').val(data.account_desc);
        document.getElementById("md-form").classList.remove('modal-lg');
        $('#button_action').val('delete');
        $('.modal-title').text('');

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
            url:"{{route('permission.removedata')}}",
            method:"get",
            data:{id:id},
            dataType:"json",
            success:function(data)
            {

              if(data.chk == "error")
              {
                var x = data
                swal("Error!", ""+data.success, 'error');
                $('#table').DataTable().ajax.reload();
              }
              else
              {
                var x = data
                swal("Done!", ""+data.success, 'success');
                $('#table').DataTable().ajax.reload();
              }
                
              
                
            }
        })
    }
    else
    {
        return false;
    }
    
    document.getElementById("hddel").classList.remove("ghost");
    var parent = document.getElementById("dvh2");
    var child = document.getElementById("hddel2");
    parent.removeChild(child);
}

function edit_Form() { 
    var x = document.getElementById("editForm");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var y = document.getElementById("delForm");
    var z = document.getElementById("condel");
    z.style.display = "none";
    y.style.display = "none";
}
function del_Form() {
    var x = document.getElementById("delForm");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var z = document.getElementById("condel");
    z.style.display = "block";
    var y = document.getElementById("editForm");
    y.style.display = "none";
}

function srch()
{
 
  console.log($('#date_to').val());
}
</script>
</body>
</html>


