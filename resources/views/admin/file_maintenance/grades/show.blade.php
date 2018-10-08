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
                <a href="/admin/grades" class="nav-link active">
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
              <li class="breadcrumb-item active">Grades</li>
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
              <h3 class="boldtx">Grades</h3>
          </div>
          <div class="card-body"> 
        <div class="flt-right">
            {{-- <a href="/admin/reg" class="btn btn-success ">
                <i class="fa fa-plus"></i>
                Add New
            </a> --}}
          </div>
        <br>
        <div class="container">

     <table class=" table table-hover table-hover" style="width:100%" id="table">
               <thead class="th-cl1">
                  <tr>
                     <th>Name</th>
                     <th>Semester</th>
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
                      <h4 class="modal-title">Applicant Information</h4>
                      <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    </div>
                    <div class="modal-body">
                      {{csrf_field()}}    
                      <span id="form_output"></span>              
                      <div id="viewForm">
                       <table class="table">
                        <tr>
                          <th>Subject</th>
                          <th>Grades</th>
                        </th>
                        <tr>
                          <td> jfjsdfsdj</td>
                        </tr>
                       </table>
                      </div>


                      <div id="delForm">
                        <div class="form-group">
                            <h5 class="brand-text font-weight-bold" id="hddel">Are you sure you want to delete it?</h5>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="del_id" id="del_id" value="" />
                          <input type="hidden" name="del_isdel" id="del_isdel" value=""/>
                        </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                          {{-- <input type="hidden" name="faq_id" id="faq_id" value="" /> --}}
                          <input type="hidden" name="button_action" id="button_action" value="insert" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                          <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
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
               ajax: '{{ route('grades.getdata') }}',
               aoColumns: [
                        { data: 'fullname', name: 'fullname'},
                        { data: 'semester', name: 'semester' },
                       
                        { width: '20%', data: 'action', orderable:false, searchable: false}
                  ]

                  // { width: '5%', data: 'checkbox', orderable:false, searchable: false}   
                        // { searchable: true },
                        // { mData: function fullname(data, type, dataToSet) {
                        //   return data.surname + ", " + data.first_name + " " +data.middle_name;
                        //     }
                        // // },
                        // { "mData": 'name' , "searchable": true,
                        // "mRender" : function ( data, type, full ) { 
                        //     return full['surname']+', '+full['first_name']+' '+full['middle_name'];}
                        //   },


            });
    $(document).on('click', '.view', function(){
        // var id = $(this).attr("id");
        // $('#form_output').html('');
        // $.ajax({
        //     url:"{{route('applicant.fetchdata')}}",
        //     method:'get',
        //     data:{id:id},
        //     dataType:'json',
        //     success:function(data)
        //     {
        //       $('#mainModal').modal('show');
        //       $('#name').val(data.fullname);
        //       $('#gender').val(data.gender);
        //       $('#nationality').val(data.nationality);
        //       $('#civil').val(data.civil_status);
        //       $('#religion').val(data.religion);
        //       $('#bday').val(data.bday);
        //       $('#mobile_number').val('0'+data.mobile_number);
        //       $('#bplace').val(data.birth_place);
        //       $('#address').val(data.address);
              
        //       view_Form();
        //     }

         $('#mainModal').modal('show');
         view_Form();
        // });

        
        

    });
    $('#main_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('applicant.postdata') }}",
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
                    $('.modal-title').text('Add Question');
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
    });


    $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('faqs.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#question').val(data.question);
                $('#answer').val(data.answer);
                $('#faq_id').val(id);
                $('#formModal').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit Question');
                $('#button_action').val('update');
                edit_Form();
                $('#mainModal').modal('show');
                $('#action').val('Edit');
                document.getElementById("action").className = "btn btn-info";
                document.getElementById("md-form").classList.add('modal-lg');
                $('#button_action').val('update');
                $('.modal-title').text('Edit Question');
            }
    });   
    });
    
 $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
         //$('#del_output').html('');
         $.ajax({
            url:"{{route('applicant.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
              // var smp=data.faq_isdel;
              //   console.log(id + ' ' +smp);
              del_Form();
              $('#del_id').val(id);
              if(data.applicant_isdel == 0){
                $('#del_isdel').val(1);
                $('#action').val('Delete');
                $('#button_action').val('delete');
                document.getElementById("action").className = "btn btn-danger";
                document.getElementById("md-form").classList.remove('modal-lg');
                $("#hddel").text("Are you sure you want to delete it?");
                $('.modal-title').text('');
                $('#mainModal').modal('show');
                $('#del_id').val(id);



              }
                //   $('#faq_isdel').val(1);
                //   $('#action').val('Delete');
                //   document.getElementById("action").className = "btn btn-danger";
                //   $("#hddel").text("Are you sure you want to delete it?");
                // }
                // del_Form();
                // $('#question').val(data.question);
                // $('#answer').val(data.answer);
                // $('#faq_id').val(id);
                // $('#mainModal').modal('show');
                // document.getElementById("md-form").classList.remove('modal-lg');
                // $('#button_action').val('delete');
                // $('.modal-title').text('');
                //console.log(data.surname + ' ' +data.applicant_isdel);
            }
        }); 
    });
});
function view_Form() {
    var x = document.getElementById("viewForm");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var y = document.getElementById("delForm");
    y.style.display = "none";
}
function del_Form() {
    var x = document.getElementById("delForm");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var y = document.getElementById("viewForm");
      y.style.display = "none";
}
</script>
</body>
</html>


