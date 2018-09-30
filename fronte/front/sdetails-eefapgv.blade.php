<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

@include('inc.nav')
<main>
    <section class="slice">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 ml-4">
            <div class="card ">
              <div class="card-header"><strong>Dashboard</strong></div>
              <div class="list-group list-group-flush">
                <a href="/profile" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-user"></span> &nbsp;
                    <span>My Profile</span>
                  </div>
                </a>
                <a href="/scholarship" class="list-group-item list-group-item-action d-flex justify-content-between px-4 active">
                  <div class="text-bold">
                    <span class="fa fa-graduation-cap"></span>
                    <span>My Scholarship</span>
                  </div>
                </a>
                <a href="/account" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-cog"></span> &nbsp;
                    <span>Account Settings</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="card-title"><div class="boldtx alert alert-info" role="alert"> <i class="fa fa-folder"></i> Application Information</div></div><hr> 

                <div class="container">
                  {{-- <div class="row">
                    <h4 class="tx1">Scholarship Details</h4>
                  </div> --}}

                  <div class="form-row mb-2">
                    <div class="col-md-6 ">
                      <div class="row">
                        <div class="card" style="width:525px;">
                      <div class="card-header bg-primary">
                        <i class="fa fa-folder-open"></i><strong> Application Details</strong>
                      </div>
                      <div class="card-body py-0">
                        <table class="table " id="eefap">
                          <tr>
                            <td>Application Code</td>
                            <td>{{$applicant->barcode_number}}</td>
                          </tr>
                          <tr>
                            <td>Full Name</td>
                            <td>{{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->surname}} {{Auth::user()->suffix}}</td>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <td>{{$eefapgv->street}} {{$eefapgv->barangay}}, {{$eefapgv->municipality}}</td>
                          </tr>
                          <tr>
                            <td>Mobile Number</td>
                            <td>+63{{Auth::user()->mobile_number}}</td>
                          </tr>
                          <tr>
                            <td>Course/Program</td>
                            <td>{{$eefapgv->course}}</td>
                          </tr>
                          <tr>
                            <td>Applied On</td>
                            <td>{{$applicant->created_at}}</td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td>{{$applicant->application_status}}</td>
                          </tr>
                        </table>
                      </div>
                    </div>  
                      </div> 
                      <div class="row">
                        <div class="card" style="width:525px;">
                          <div class="card-body">
                              <div class="card" >
                                <div class="card-header  bg-primary">
                                  <strong>{{$scholar->scholarship_name}}</strong>
                                </div>
                                <div class="card-body">
                                  <h1 class="tx4">PHP {{$amount}}.00</h1>
                                </div>
                              </div>
                              @if($scholar->status == "OPEN")
                              @if($applicant->application_status =="Pending" && $tracking->stage!="Approved" )
                              <div class="form-row">
                                <div class="col-md-3">
                                  <a href="/scholarship/form/{{Auth::user()->id}}" target="_blank" class="btn btn-block text-white btn-dark">Print</a>
                                </div>
                                @if($scholar->id== 7)
                                <div class="col-md-3">
                                  <a href="/scholarship/upload/eefap" class="btn btn-block btn-primary">Upload Files</a>
                                </div>
                                @else
                                <div class="col-md-3">
                                  <a href="/scholarship/upload/eefapgv" class="btn btn-block btn-primary">Upload Files</a>
                                </div>
                                @endif
                                <div class="col-md-3">
                                  <a href="/scholarship/details/eefap-gv" class="btn btn-block text-white btn-success">Edit</a>
                                </div>
                                <div class="col-md-3">
                                  <a href="/scholarship/delete" class="btn btn-block btn-danger" onclick="event.preventDefault();
                                        document.getElementById('del-form').submit();">Cancel</a>

                                  <form id="del-form" action="{{action('FrontendController@eefapdel')}}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </div>
                              </div>
                              @endif
                              
                              @if($applicant->application_status == "Renew")
                              <div class="form-row">
                                <div class="col-md-6">
                                  <a href="/scholarship/details/renew/eefap-gv" class="btn btn-block text-white btn-primary">Renew</a>
                                </div>
                                <div class="col-md-6">
                                  <a href="/scholarship/delete" class="btn btn-block btn-danger" onclick="event.preventDefault();
                                        document.getElementById('del-form').submit();">Cancel</a>

                                  <form id="del-form" action="{{action('FrontendController@eefapdel')}}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </div>
                              </div>
                              @endif
                              @else
                              <div class="form-row">
                                <div class="col-md-12 ">
                                  <div class="alert alert-danger">
                                    <h5 class="text-center">{{$scholar->scholarship_name}} is closed. You can't renew.</h5>
                                  </div>
                                  
                                </div>
                              </div>
                              @endif
                              @if($applicant->application_status == "Disapproved")
                              <div class="form-row">
                                <div class="col-md-12">
                                  <a href="/scholarship/delete" class="btn btn-block btn-danger" onclick="event.preventDefault();
                                        document.getElementById('del-form').submit();">Cancel</a>

                                  <form id="del-form" action="{{action('FrontendController@eefapdel')}}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </div>
                              </div>
                              @endif
                          </div>
                        </div>
                      </div>
                    </div>

                  <div class="col-md-6">
                    {{-- <ul class="list-group" id="eefap">
                      <li class="list-group-item active"><i class="fa fa-folder-open"></i><strong> Requirements</strong></li>
                      <li class="list-group-item">
                        <div class="row no-gutters">
                          <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Bio-data with 2x2 Picture</li>
                              <li class="list-group-item">Grades / Form 138 <small>(Photocopy)</small></li>
                              <li class="list-group-item">Certificate of Registration / Assessment Form</li>
                              <li class="list-group-item">Barangay / Residency / Indigency</li>
                              <li class="list-group-item">Official Receipt</li>
                              <li class="list-group-item">School ID</li>
                            </ul>  
                          </div>
                          <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Not Submitted</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                            </ul>
                          </div>
                        </div>
                      </li>

                    </ul> --}}
                  
                    <div class="card">
                      <div class="card-header bg-primary">
                        <i class="fa fa-folder-open"></i><strong> Requirements</strong>
                      </div>
                      <div class="card-body py-0">
                      @if($scholar->id== 7)
                        <table class="table " id="eefap">
                          <tr>
                            <td>Bio-data with 2x2 Picture</td>
                            <td>{{$reqeefap->biodata_sub}}</td>
                          </tr>
                          <tr>
                            <td>Grades / Form 138 <small>(Photocopy)</small></td>
                            <td>{{$reqeefap->grades_sub}}</td>
                          </tr>
                          <tr>
                            <td>Certificate of Registration / Assessment Form <small>(Photocopy)</small></td>
                            <td>{{$reqeefap->cor_sub}}</td>
                          </tr>
                          <tr>
                            <td>Barangay / Residency / Indigency <small>(Photocopy)</small></td>
                            <td>{{$reqeefap->brgy_sub}}</td>
                          </tr>
                          <tr>
                            <td>Official Receipt <small>(Photocopy)</small></td>
                            <td>{{$reqeefap->or_sub}}</td>
                          </tr>
                          <tr>
                            <td>School ID <small>(Photocopy)</small></td>
                            <td>{{$reqeefap->oid_sub}}</td>
                          </tr>
                        </table>
                      @else
                        <table class="table" id="eefap-gv">
                          <tr>
                            <td>Bio-data with 2x2 Picture</td>
                            <td>{{$reqgv->biodata_sub}}</td>
                          </tr>
                          <tr>
                            <td>Certificate of Honor <small>(Photocopy)</small></td>
                            <td>{{$reqgv->honor_sub}}</td>
                          </tr>
                          <tr>
                            <td>Grades / Class Cards / Form 138 <small>(Photocopy)</small></td>
                            <td>{{$reqgv->grades_sub}}</td>
                          </tr>
                          <tr>
                            <td>Certificate of Registration / Assessment Form <small>(Photocopy)</small></td>
                            <td>{{$reqgv->cor_sub}}</td>
                          </tr>
                          <tr>
                            <td>Barangay / Residency / Indigency Certificate <small>(Photocopy)</small></td>
                            <td>{{$reqgv->brgy_sub}}</td>
                          </tr>
                          <tr>
                            <td>Official Receipt <small>(Photocopy)</small></td>
                            <td>{{$reqgv->or_sub}}</td>
                          </tr>
                          <tr>
                            <td>School ID <small>(Photocopy)</small></td>
                            <td>{{$reqgv->oid_sub}}</td>
                          </tr>
                        </table>
                        @endif
                      </div>
                    </div>
                  </div>




                  {{-- <div class="col-md-3">
                   <div class="row">
                    <div class="card">
                     <div class="card-header bg-danger text-center">
                       <h5><strong>Graduate From Private</strong></h5>
                     </div>
                     <div class="card-body py-2">
                      <div class="text-center">
                        <p class="mb-0"><strong>AMOUNT</strong></p>
                        <h3 class="tx1">PHP 3000.00</h3>
                      </div>
                     </div>
                    </div>

                    
                  </div>

                  </div> --}}



                </div><hr>
                <div class="form-row">
                  @if($tracking->status=="CLOSED" || $applicant->application_status=="Renew")
                  @if($tracking->stage=="Approved")
                  <div class="card" style="width: 100%;">
                    <div class="card-header boldtx bg-warning text-white">
                      Application Track
                    </div>
                    <div class="card-body">
                       <div class="container" >
                        @include('inc.track')

                         @if(count($log) > 0)
                          @foreach($log as $logs)
                            <div class="form-row">
                              <div class="col-md-2">
                                <p>{{$logs->created_at}}:</p>
                              </div>
                              <div class="col-md-8">
                                <p>{{$logs->desc}}</p>
                              </div>
                              
                            </div>
                          @endforeach
                          @else
                              <p>No logs found!</p>
                          @endif
                       </div>
                  </div>
                </div>
                @endif


                @if($tracking->stage=="Re-Checking")
                  <div class="card" style="width: 100%;">
                    <div class="card-header boldtx bg-warning text-white">
                      Application Track
                    </div>
                    <div class="card-body">
                       <div class="container" >
                        @include('inc.recheck')

                         @if(count($log) > 0)
                          @foreach($log as $logs)
                            <div class="form-row">
                              <div class="col-md-2">
                                <p>{{$logs->created_at}}:</p>
                              </div>
                              <div class="col-md-8">
                                <p>{{$logs->desc}}</p>
                              </div>
                              
                            </div>
                          @endforeach
                          @else
                              <p>No logs found!</p>
                          @endif
                       </div>
                  </div>
                </div>
                @endif

                @if($tracking->stage=="Consolidation")
                  <div class="card" style="width: 100%;">
                    <div class="card-header boldtx bg-warning text-white">
                      Application Track
                    </div>
                    <div class="card-body">
                       <div class="container" >
                        @include('inc.consolo')

                         @if(count($log) > 0)
                          @foreach($log as $logs)
                            <div class="form-row">
                              <div class="col-md-2">
                                <p>{{$logs->created_at}}:</p>
                              </div>
                              <div class="col-md-8">
                                <p>{{$logs->desc}}</p>
                              </div>
                              
                            </div>
                          @endforeach
                          @else
                              <p>No logs found!</p>
                          @endif
                       </div>
                  </div>
                </div>
                @endif


                @if($tracking->stage=="Payroll")
                  <div class="card" style="width: 100%;">
                    <div class="card-header boldtx bg-warning text-white">
                      Application Track
                    </div>
                    <div class="card-body">
                       <div class="container" >
                        @include('inc.payroll')

                         @if(count($log) > 0)
                          @foreach($log as $logs)
                            <div class="form-row">
                              <div class="col-md-2">
                                <p>{{$logs->created_at}}:</p>
                              </div>
                              <div class="col-md-8">
                                <p>{{$logs->desc}}</p>
                              </div>
                              
                            </div>
                          @endforeach
                          @else
                              <p>No logs found!</p>
                          @endif
                       </div>
                  </div>
                </div>
                @endif

                @if($tracking->stage=="Awarding")
                  <div class="card" style="width: 100%;">
                    <div class="card-header boldtx bg-warning text-white">
                      Application Track
                    </div>
                    <div class="card-body">
                       <div class="container" >
                        @include('inc.award')

                         @if(count($log) > 0)
                          @foreach($log as $logs)
                            <div class="form-row">
                              <div class="col-md-2">
                                <p>{{$logs->created_at}}:</p>
                              </div>
                              <div class="col-md-8">
                                <p>{{$logs->desc}}</p>
                              </div>
                              
                            </div>
                          @endforeach
                          @else
                              <p>No logs found!</p>
                          @endif
                       </div>
                  </div>
                </div>
                @endif
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section>

  
</section>
   
   
</main>
<footer class="footer2">
  <div class="container mt-4">
    <div class="align-items-center">
        <div class="text-center">
            <a href="#">
                <img src="/added/img/icons/logo.png" style="width: 50px;">
            </a>
            <span class="d-block mt-1 text-white">&copy; 2018 <a href="http://www.pampanga.gov.ph/" class="footer-link text-white" target="_blank">Provincial Capitol of Pampanga</a>. All rights reserved.</span>
        </div>
    </div>
  </div>
</footer>

</body>
</html>