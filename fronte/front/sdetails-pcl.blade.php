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
              <div class="card-header bg-primary"><strong>Dashboard</strong></div>
              <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-user"></span> &nbsp;
                    <span>My Profile</span>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4 bg-secondary">
                  <div class="text-bold">
                    <span class="fa fa-graduation-cap"></span>
                    <span>My Scholarship</span>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
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
                        <div class="card" style="width:530px;">
                      <div class="card-header bg-primary">
                        <i class="fa fa-folder-open"></i><strong> Application Details</strong>
                      </div>
                      <div class="card-body py-0">
                        <table class="table " id="pcl">
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
                            <td>{{$pcl->street}} {{$pcl->barangay}}, {{$pcl->municipality}}</td>
                          </tr>
                          <tr>
                            <td>Mobile Number</td>
                            <td>+63{{Auth::user()->mobile_number}}</td>
                          </tr>
                          <tr>
                            <td>Course/Program</td>
                            <td>{{$pcl->course}}</td>
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
                        <div class="card" style="width:530px;">
                          <div class="card-body">
                              <div class="card" >
                                <div class="card-header  bg-primary">
                                  <strong>{{$scholar->scholarship_name}}</strong>
                                </div>
                                <div class="card-body">
                                  <h1 class="tx4">PHP {{$scholar->amount}}.00</h1>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col-md-4">
                                  <a href="#" class="btn btn-block btn-primary">Upload Files</a>
                                </div>
                                <div class="col-md-4">
                                  <a href="/scholarship/details/pcl" class="btn btn-block text-white btn-warning">Edit Application</a>
                                </div>
                                <div class="col-md-4">
                                  <a href="#" class="btn btn-block btn-danger">Delete Application</a>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  

                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header bg-primary">
                        <i class="fa fa-folder-open"></i><strong> Requirements</strong>
                      </div>
                      <div class="card-body py-0">
                        <table class="table " id="pcl">
                          <tr>
                            <td>Bio-data with 2x2 Picture</td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Grades / Form 138 <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Certificate of Registration / Assessment Form <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Barangay / Residency / Indigency <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Official Receipt <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>School ID <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                        </table>

                        <table class="table ghost" id="pcl-gv">
                          <tr>
                            <td>Bio-data with 2x2 Picture</td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Certificate of Honor <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Grades / Class Cards / Form 138 <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Certificate of Registration / Assessment Form <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Barangay / Residency / Indigency Certificate <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>Official Receipt <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                          <tr>
                            <td>School ID <small>(Photocopy)</small></td>
                            <td>Not Submitted</td>
                          </tr>
                        </table>

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
                  <div class="card" style="width: 100%;">
                    <div class="card-header boldtx bg-warning text-white">
                      Application Track
                    </div>
                    <div class="card-body">
                       <!-- Tracking progress -->
                      <div class="container" >
                        <div class="translate"></div>
                        <div class="form-row" style="margin-left: 4em;">
                          <div class="tr-progress-bar">
                            <div class="bar-item tr-first tr-active">1</div>
                            <span class="bar-item-bar tr-bib-active"></span>
                            <div class="bar-item  tr-active">2</div>

                            <span class="bar-item-bar tr-bib-active"></span>
                            <div class="bar-item tr-active">3</div>

                            <span class="bar-item-bar"></span>
                            <div class="bar-item">4</div>

                            <span class="bar-item-bar"></span>
                            <div class="bar-item">5</div>    
                          </div>
                        </div>
                        <div class="form-row" style="margin-left: 2em; margin-right: 2em;">
                          <div class="col-md-2 ml-2">
                            <p>Approved</p>
                          </div>
                          <div class="col-md-2 text-center ml-2">
                            <p>Re-Checking</p>
                          </div>
                          <div class="col-md-2 text-center" style="margin-left: 3em;">
                            <p>Consolidation</p>
                          </div>
                          <div class="col-md-2 text-center" style="margin-left: 3.2em;">
                            <p>Payroll</p>
                         </div>
                         <div class="col-md-2 text-center" style="margin-left: 3.2em;">   
                            <p>Releasing</p>
                          </div>
                        </div>

                      </div>
                      {{-- <div class="form-row" style="margin-left: 8em; margin-top: 10px;">
                        <div class="card" style="width: 730px; height: 200px;">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>
                       --}}
                       {{-- <div class="track-list">
                         <div class="container">
                           
                         </div>
                       </div> --}}
                  </div>
                </div>

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