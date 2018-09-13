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
    background: linear-gradient(80deg, #004280 0, #001a33 100%)">
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
         <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">1</span> 
        <a href="#"><i class="fa fa-envelope-o"></i></a>
      </li>
      <li class="nav-item mr-0">
          {{-- <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button"><strong>Sign up</strong></a> --}}
         <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">1</span> 
        <a href="#"><i class="fa fa-globe"></i></a>
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
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4 bg-secondary">
                  <div class="text-bold">
                    <span class="fa fa-user"></span> &nbsp;
                    <span>My Profile</span>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
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
                  <div class="card-title"><div class="alert alert-info" role="alert">My Profile</div></div><hr>

                  <div>
                    <div class="card-deck">
                      <div class="card shdow">
                        <img src="{{asset('images/user1.jpg')}}" alt="Card-Image" class="card-img-top" style="width:100%">
                        <div class="card-body">
                          <div class="card-title text-center text-bold" style="font-size: 17px;">Personal Information</div>
                          <div class="card-text">
                            <a href="/fronte/profile/personal-information" class="btn btn-primary btn-rounded text-center" style="width: 12em; margin-left:4em;"><strong>Complete My Profile</strong></a>
                          </div>
                        </div>
                      </div>
                      
                      <div class="card shdow">
                        <img src="{{asset('images/guardian.jpg')}}" alt="Card-Image" class="card-img-top" style="width:100%">
                        <div class="card-body">
                          <div class="card-title text-center text-bold" style="font-size: 17px;"><strong>Parents / Guardian Information </strong></div>
                          <div class="card-text mt-2">
                            <a href="#" class="btn btn-primary btn-rounded text-center " style="width: 12em; margin-left:4em;"><strong>Who's your guardian?</strong></a>
                          </div>
                        </div>
                      </div>

                      <div class="card shdow">
                        <img src="{{asset('images/school1.jpg')}}" alt="Card-Image" class="card-img-top" style="width:100%">
                        <div class="card-body">
                          <div class="card-title text-center text-bold" style="font-size: 17px;">Educational Information </div>
                          <div class="card-text mt-2">
                            <a href="#" class="btn btn-primary btn-rounded text-center " style="width: 12em; margin-left:4em;"><strong>Where do you study?</strong></a>
                          </div>
                        </div>
                      </div>
                    </div>
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