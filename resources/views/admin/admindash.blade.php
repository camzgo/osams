
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <title>Pampanga Capitol | Online Scholarship Application and Management System</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('inc.admin-nav')

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
            <a href="/admin" class="nav-link bg-white">
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
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            </ol> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          @for($x = 0; $x<=3; $x++)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-info-gradient" >
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
              <div class="inner" style="height:168.8px;">
                <h4><strong>{{$mod[$x]}}</strong></h4>
                @if($total[$x] > $slot[$x])
                <span class="info-box-text">Total Applications: <strong>{{$total[$x]}}/{{$slot[$x]}}</strong> <i class="badge badge-warning"> + {{$supp[$x]}}</i></span>
                @else
                <span class="info-box-text">Total Applications: <strong>{{$total[$x]}}/{{$slot[$x]}}</strong></span>
                @endif
                <span class="info-box-text">Total Amount:  <strong>Php {{$price[$x]}}</strong></span>
                <span class="info-box-text">Status: <strong>{{$status[$x]}}</strong></span>
                @if($total[$x] > $slot[$x] && $total[$x] != $slot[$x]+$supp[$x])
                <h5><span class="info-box-text"><i class="badge badge-warning text-white">Slots Exceeded. <br>Supplement slots added!</i></span></h5>
                @endif
                @if($total[$x] == $slot[$x]+$supp[$x])
                <h5><span class="info-box-text"><i class="badge badge-danger">There are no slots available!</i></span></h5>
                @endif
                @if($total[$x] == $slot[$x])
                <h5><span class="info-box-text"><i class="badge badge-warning text-white">Slots are full!</i></span></h5>
                @endif
              </div>
              @if($role->account_name == "Administrator")
              <a href="/admin/scholarship" class="small-box-footer">View</a>
              @endif

              </div>
              <!-- /.info-box-content -->
            </div>
            @endfor
            <!-- /.info-box -->
                    </div>

      <div class="row">
        @for($x = 4; $x<=7; $x++)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-info-gradient" >
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
              <div class="inner" style="height:168.8px;">
                <h4><strong>{{$mod[$x]}}</strong></h4>
                @if($total[$x] > $slot[$x])
                <span class="info-box-text">Total Applications: <strong>{{$total[$x]}}/{{$slot[$x]}}</strong> <i class="badge badge-warning"> + {{$supp[$x]}}</i></span>
                @else
                <span class="info-box-text">Total Applications: <strong>{{$total[$x]}}/{{$slot[$x]}}</strong></span>
                @endif
                <span class="info-box-text">Total Amount:  <strong>Php {{$price[$x]}}</strong></span>
                <span class="info-box-text">Status: <strong>{{$status[$x]}}</strong></span>
                @if($total[$x] > $slot[$x] && $total[$x] != $slot[$x]+$supp[$x])
                <h5><span class="info-box-text"><i class="badge badge-warning text-white">Slots Exceeded. <br>Supplement slots added!</i></span></h5>
                @endif
                @if($total[$x] == $slot[$x]+$supp[$x])
                <h5><span class="info-box-text"><i class="badge badge-danger">There are no slots available!</i></span></h5>
                @endif
                @if($total[$x] == $slot[$x])
                <h5><span class="info-box-text"><i class="badge badge-warning text-white">Slots are full!</i></span></h5>
                @endif
              </div>
              @if($role->account_name == "Administrator")
              <a href="/admin/scholarship" class="small-box-footer">View</a>
              @endif

              </div>
              <!-- /.info-box-content -->
            </div>
            @endfor
      </div>
          <!-- /.col -->




        <!-- /.row -->

        <!-- Main row -->
        <div class="row mt-4">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="row">
              <div class="col-md-12">
                <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Scholarship Program Chart <small>(Approved Applications)</small></h3>
                </div>
                <div class="card-body">
                  <canvas id="scholarChart" style="height:250px"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title text-white">Municipalities Chart <small>(Approved Applications)</small></h3>
                </div>
                <div class="card-body">
                  <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              </div>
            </div>
            </div>

            <!-- /.card -->

            <!-- /.row -->

            <!-- /.card -->
          
          <!-- /.col -->

          <div class="col-md-3 ml-2">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fa fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Applications</span>
                <span class="info-box-number"><strong>{{$all[0]}}</strong></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-money"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Amount</span>
                <span class="info-box-number"><strong>{{$all[1]}}</strong></span>
              </div>
              <!-- /.info-box-content -->
            </div>
             <div class="info-box mb-3 bg-secondary">
              <span class="info-box-icon"><i class="fa fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pre-Approved Applications</span>
                <span class="info-box-number"><strong>{{$all[6]}}</strong></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fa fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Approved Applications</span>
                <span class="info-box-number"><strong>{{$all[2]}}</strong></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fa fa-pause-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pending Applications</span>
                <span class="info-box-number"><strong>{{$all[3]}}</strong></span>
              </div>
              <!-- /.info-box-content -->
            </div>

            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fa fa-close"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Canceled Applications</span>
                <span class="info-box-number"><strong>{{$all[4]}}</strong></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-refresh"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Renew Applications</span>
                <span class="info-box-number"><strong>{{$all[5]}}</strong></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
    </div>
          <!-- /.col -->
        </div>
        <div class="row mb-4">
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            
            </div>
            {{-- <div class="col-md-4">
            <!-- MAP & BOX PANE -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Scholarship Program Chart</h3>
              </div>
              <div class="card-body" style="height:420px;">
                <canvas id="genderChart" style="height:250px"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            </div> --}}
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script> --}}


<script>

// var ctx = document.getElementById("pieChart").getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [{
//             label: '# of Votes',
//             data: [35, 19, 3, 5, 2, 3],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }]
//         }
//     }
// });
//  '{{$list[9]}}', '{{$list[10]}}', '{{$list[11]}}', '{{$list[12]}}', '{{$list[13]}}', '{{$list[14]}}', '{{$list[15]}}'
var pieChart = document.getElementById('pieChart').getContext('2d');
var massPopChart = new  Chart (pieChart, {
  type: 'pie',
  data: {
    labels: ['{{$list[0]}}','{{$list[1]}}', '{{$list[2]}}', '{{$list[3]}}', '{{$list[4]}}', '{{$list[5]}}', '{{$list[6]}}', '{{$list[7]}}', '{{$list[8]}}',
        '{{$list[9]}}', '{{$list[10]}}', '{{$list[11]}}', '{{$list[12]}}', '{{$list[13]}}', '{{$list[14]}}', '{{$list[15]}}', '{{$list[16]}}', '{{$list[17]}}', '{{$list[18]}}', '{{$list[19]}}', '{{$list[20]}}', '{{$list[21]}}' ],
    datasets: [{
      label: 'Population',
      data: [
        '{{$sadd[0]}}','{{$sadd[1]}}', '{{$sadd[2]}}', '{{$sadd[3]}}', '{{$sadd[4]}}', '{{$sadd[5]}}', '{{$sadd[6]}}', '{{$sadd[7]}}', '{{$sadd[8]}}',
  '{{$sadd[9]}}', '{{$sadd[10]}}', '{{$sadd[11]}}', '{{$sadd[12]}}', '{{$sadd[13]}}', '{{$sadd[14]}}', '{{$sadd[15]}}', '{{$sadd[16]}}', '{{$sadd[17]}}', '{{$sadd[18]}}', '{{$sadd[19]}}', '{{$sadd[20]}}', '{{$sadd[21]}}'],
      backgroundColor: [
        '#33B7FF',
        '#33FFD2',
        '#189F82',
        '#2E574F',
        '#30DA41',
        '#F7F30C',
        '#BEBB13',
        '#FCBC13',
        '#BF9219',
        '#BF4B19',
        '#F71212',
        '#BD1212',
        '#12BDB4',
        '#098881',
        '#094088',
        '#4477BB',
        '#5A59D8',
        '#A459D8',
        '#DB21D8',
        '#EE527A',
        '#FF646B',
        '#B8454B'
    
      ],
      
      
    }]
  }, 
  options: {
    // scales: {
    //         xAxes: [{
    //             stacked: true
    //         }],
    //         yAxes: [{
    //             stacked: true
    //         }]
    //     }
  }
})


var pieChart = document.getElementById('scholarChart').getContext('2d');
var massPopChart = new  Chart (pieChart, {
  type: 'doughnut',
  data: {
    labels: ['{{$mod[0]}}','{{$mod[1]}}', '{{$mod[2]}}', '{{$mod[3]}}', '{{$mod[4]}}', '{{$mod[5]}}', '{{$mod[6]}}', '{{$mod[7]}}'],
    datasets: [{
      label: 'Population',
      data: [
        '{{$tr[0]}}','{{$tr[1]}}', '{{$tr[2]}}', '{{$tr[3]}}', '{{$tr[4]}}', '{{$tr[5]}}', '{{$tr[6]}}', '{{$tr[7]}}'],
      backgroundColor: [
        '#33B7FF',
        '#2E574F',
        '#30DA41',
        '#F7F30C',
        '#BEBB13',
        '#FCBC13',
        '#BF4B19',
        '#F71212',
        '#BD1212',
        '#12BDB4',
        '#098881',
        '#094088',
        '#4477BB',
        '#5A59D8',
        '#A459D8',
        '#DB21D8',
        '#EE527A',
        '#FF646B',
        '#B8454B'
    
      ],
      
      
    }]
  }, 
  options: {
  }
})

// var pieChart = document.getElementById('genderChart').getContext('2d');
// var massPopChart = new  Chart (pieChart, {
//   type: 'bar',
//   data: {
//     labels: ['MALE', 'FEMALE'],
//     datasets: [{
//       label: 'Population',
//       data: ['{{$gen[0]}}', '{{$gen[1]}}'],
//       backgroundColor: [
//         '#33B7FF',
//         '#2E574F',
//         '#30DA41',
//         '#F7F30C',
//         '#BEBB13',
//         '#FCBC13',
//         '#BF4B19',
//         '#F71212',
//         '#BD1212',
//         '#12BDB4',
//         '#098881',
//         '#094088',
//         '#4477BB',
//         '#5A59D8',
//         '#A459D8',
//         '#DB21D8',
//         '#EE527A',
//         '#FF646B',
//         '#B8454B'
    
//       ],
      
      
//     }]
//   }, 
//   options: {
//   }
// })
</script>
</body>
</html>
