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

 
    <nav class="navbar navbar-expand-lg navbar-dark py-3" style="height: 6em;   position: relative;
    background: linear-gradient(80deg, #004280 0, #001a33 100%)
    ">
    <div class="container">
 <a class="navbar-brand" href="#">
    <img src="/added/img/icons/logo.png" class="mr-4" width="50px" alt="">
    <strong>Online Scholarship Application</strong>
     {{-- <img  class="mr-4" style="width: 50px;"> --}}
  </a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Home</strong><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>About Us</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>FAQs</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Site Map</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Contact Us</strong></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto align-items-lg-center">
      <li class="nav-item mr-0">
          {{-- <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button"><strong>Sign up</strong></a> --}}
        <a href="#" class="nav-link">
          <span class="badge badge-success badge-pill badge-navbar" style="float:right; margin-bottom:-12px;">10</span>
          <i class="fa fa-envelope"></i>
        </a>
      </li>
      <li class="nav-item mr-0">
          {{-- <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button"><strong>Sign up</strong></a> --}}
         {{-- <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">1</span> 
        <a href="#"><i class="fa fa-globe"></i></a> --}}
      </li>
      {{-- <li class="nav-item mr-0">
          <a data-toggle="modal" data-target="#login-modal" style="width: 8em;  font-size: .90rem;" class="btn btn-sm btn-white btn-rounded " role="button">
              <i class="fa fa-sign-in"></i>&nbsp <strong>Sign In</strong>
          </a>
      </li> --}}
    </ul>
  </div>
</div>
</nav>
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
                <div class="card-title"><div class="alert alert-info" role="alert">My Scholarship</div></div><hr> 

                <div class="container">
                  <div class="row">
                    <h4 class="tx1">Scholarship Details</h4>
                  </div>

                  <div class="row mb-2">
                    <div class="col-md-6 ">
                    <ul class="list-group">
                      <li class="list-group-item active"><i class="fa fa-folder-open"></i><strong> Application Information</strong></li>
                      <li class="list-group-item">
                        <div class="row no-gutters">
                          <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Application Code</li>
                              <li class="list-group-item">Full Name</li>
                              <li class="list-group-item">Address</li>
                              <li class="list-group-item">Mobile Number</li>
                              <li class="list-group-item">Course/Program</li>
                              <li class="list-group-item">Applied on</li>
                            </ul>  
                          </div>
                          <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                              <li class="list-group-item">fsffdsfds</li>
                            </ul>
                          </div>
                        </div>
                      </li>

                    </ul>
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
                        <table class="table " id="eefap">
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

                        <table class="table ghost" id="eefap-gv">
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



                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
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