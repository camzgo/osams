<!DOCTYPE html>
<html>


<!-- Mirrored from preview.webpixels.io/purpose-website-ui-kit-v1.0.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Aug 2018 07:45:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Webpixels">
    <title>Scholarship Program for Provincial Capitol of Pampanga</title>
    <!-- Favicon -->
    <link href="/added/img/icons/logo.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">
    <!-- Page plugins -->
    <link type="text/css" href="/added/vendor/highlight/css/highlight.min.css" rel="stylesheet">
    <link type="text/css" href="/added/vendor/highlight/css/styles/atom-one-dark.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link type="text/css" href="/added/css/theme.min.css" rel="stylesheet">
</head>
<style>

/* equal card height */
.row-equal > div[class*='col-'] {
    display: flex;
    flex: 1 0 auto;
}

.row-equal .card {
   width: 100%;
}

/* ensure equal card height inside carousel */
.carousel-inner>.row-equal.active, 
.carousel-inner>.row-equal.next, 
.carousel-inner>.row-equal.prev {
    display: flex;
}

/* prevent flicker during transition */
.carousel-inner>.row-equal.active.left, 
.carousel-inner>.row-equal.active.right {
    opacity: 0.5;
    display: flex;
}


/* control image height */
.card-img-top-250 {
    max-height: 250px;
    overflow:hidden;
}

</style>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent navbar-dark bg-gradient-primary py-3" id="navbar_main">
            <div class="container">
                    <img src="/added/img/icons/logo.png" class="mr-4" style="width: 50px;">
                <a class="navbar-brand mr-lg-5" href="index.html"><strong>Scholarship Application</strong></a>
                <div class="collapse navbar-collapse" id="navbar_main_collapse">
                    <ul class="navbar-nav align-items-lg-center">
                        <!--Home Page-->
                        <li class="nav-item">
                            <a class="nav-link" href="index.html" role="button">Home</a>
                        </li>
                        <!--About Us-->
                        <li class="nav-item">
                                <a class="nav-link" href="pages/about-classic.html" role="button">About Us</a>
                        </li>
                        <!-- FAQS -->
                        <li class="nav-item">
                            <a class="nav-link" href="pages/faq.html" role="button">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/site-map.html" role="button">Site Map</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="pages/contact-simple.html" role="button">Contact us</a>
                        </li>
                    </ul>
                    <!-- sing up and sign in -->
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item mr-0">
                            <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button">Sign up</a>
                        </li>
                        <li class="nav-item mr-0">
                            <a data-toggle="modal" data-target="#login-modal" class="btn btn-sm btn-white btn-circle btn-icon d-none d-lg-inline-flex" role="button">
                                <span class="btn-inner--icon"><i class="fas fa-hand-pointer"></i></span>
                                <span class="btn-inner--text">Sign In</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<!--sign up modal-->
<div id="sign-up-modal" tabindex="-1" role="dialog" aria-laballedby="sign-up-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container h-70vh d-flex align-items-center">
                        <div class="col">
                                <div class="row justify-content-center">
                                        <div class="col-lg-25">
                                            <form class="form-stacked">
                                                <div class="card-body px-lg-20 py-lg-6">
                                                    <div class="text-center mb-4">
                                                        <h4 class="heading h3 pt-3">Create your Account</h4>
                                                        <p class="text-muted"></p>
                                                    </div>
                                                    <span class="clearfix"></span>
                                                    <form role="form">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-4">
                                                                    <input class="form-control form-control-lg form-control-emphasized" type="text" placeholder="First name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-4">
                                                                    <input class="form-control form-control-lg form-control-emphasized" type="text" placeholder="Last name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <input type="email" class="form-control form-control-lg form-control-emphasized" id="input_email" placeholder="Your email">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-3">
                                                                    <input type="password" class="form-control form-control-lg form-control-emphasized" id="input_password" placeholder="Password">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-4">
                                                                    <input type="password" class="form-control form-control-lg form-control-emphasized" id="input_password" placeholder="Confirm Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-12">
                                                                <div class="custom-control custom-checkbox my-4">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                    <label class="custom-control-label font-weight-700" for="customCheck1">By creating an account you agree to our Terms and Conditions and our Privacy Policy.</label>
                                                                </div>
                                                                <!--<p class="text-muted">By creating an account you agree to our Terms and Conditions and our Privacy Policy.</p>-->
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Create account</button>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login modal-->
    <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <!--<div class="modal-header">
                  <h4 id="login-modalLabel" class="modal-title">Customer Login</h4>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>-->
                <div class="modal-body">
                    <div class="container h-70vh d-flex align-items-center">
                        <div class="col">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <form class="form-stacked">
                                        <div class="text-center mb-">
                                            <img class="mb-3" src="/added/img/icons/logo.png" alt="" width="70" height="70">
                                            <h4 class="heading h3">Welcome back</h4>
                                        </div>
                                        <label for="inputEmail" class="sr-only">Email address</label>
                                        <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required autofocus>
                                        <label for="inputPassword" class="sr-only">Password</label>
                                        <input type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required>
                                        <div class="custom-control custom-checkbox my-4">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label font-weight-700" for="customCheck1">Remember me</label>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  <p class="text-center text-muted">Not registered yet?</p>
                  <p class="text-center text-muted"><a href=""><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                </div>
            </div>
        </div>
    </div>
<main>
<!--carousel categories-->
    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
              <li data-target="#myCarousel" data-slide-to="5"></li>
              <li data-target="#myCarousel" data-slide-to="6"></li>
              <li data-target="#myCarousel" data-slide-to="7"></li>
            </ol>
            <div class="carousel-inner">
              <div id="ncw" class="carousel-item active">
                <img class="first-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="First slide">
                <div class="container">
                  <div class="carousel-caption text-left">
                    <h1 class="text-white">Nanay Community Workers</h1>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Apply</a></p>
                  </div>
                </div>
              </div>
              <div id="vgs" class="carousel-item">
                <img class="second-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="Second slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1 class="text-white">Vice Governor School</h1>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Apply</a></p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="second-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="text-white">PWD</h1>
                        <p>description</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Apply</a></p>
                      </div>
                    </div>
                </div>
                <div class="carousel-item">
                        <img class="second-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="Second slide">
                        <div class="container">
                          <div class="carousel-caption">
                            <h1 class="text-white">Day Care Teachers</h1>
                            <p>description</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Apply</a></p>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                            <img class="second-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="Second slide">
                            <div class="container">
                              <div class="carousel-caption">
                                <h1 class="text-white">VG Freshmen</h1>
                                <p>description</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Apply</a></p>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                                <img class="second-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="Second slide">
                                <div class="container">
                                  <div class="carousel-caption">
                                    <h1 class="text-white">Solo Parent</h1>
                                    <p>description</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Apply</a></p>
                                  </div>
                                </div>
                              </div>
                              <div class="carousel-item">
                                    <img class="second-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="Second slide">
                                    <div class="container">
                                      <div class="carousel-caption">
                                        <h1 class="text-white">Others</h1>
                                        <p>description</p>
                                        <p><a class="btn btn-lg btn-primary" href="#" role="button">See more</a></p>
                                      </div>
                                    </div>
                                  </div>
              <div class="carousel-item">
                <img class="third-slide" src="/added/img/backgrounds/blue pattern.jpg" alt="Third slide">
                <div class="container">
                  <div class="carousel-caption text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div> --}}

        <!--Announcement-title
        <section class="slice">
            <div class="container col-lg-8">
                <div class="bg-primary px-3 py-3 rounded shadow-lg text-md-left">
                    <h3 class="h2 text-white">Announcement</h3>
                </div>
            </div>
        </section>-->
       {{-- <section class="slice bg-secondary">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="row row-grid">
                            <div class="row row-grid">
                                <div class="col-lg-9">
                                    <div class="px-5 py-5 bg-gradient-primary shadow-lg rounded">
                                        <div class="px-5 bg-secondary rounded">
                                            <h5 class="heading h5">Requirements</h5>
                                            <p>Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div class="px-5 bg-secondary rounded">
                                            <h5 class="heading h5">Guides</h5>
                                            <p>Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card rounded">
                                        <div class="card-header py-2 bg-primary text-white">
                                            <strong>TODAY</strong>    
                                        </div>
                                        <div class="card-body shadow-lg">
                                                <h3>September 8,2018 </h3>
                                        </div>
                                    </div>
                                    <div class="card rounded mt-4">
                                            <div class="card-header py-2 bg-primary text-white">
                                                <strong>ANNOUNCEMENT</strong>
                                            </div>
                                            <div class="card-body shadow-lg">
                                                    <p> Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title </p> 
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}

            {{-- <section class="container p-t-3">
    <div class="row">
        <div class="col-lg-12">
            <h1>Bootstrap 4 Card Slider</h1>
        </div>
    </div>
</section>
<section class="carousel slide" data-ride="carousel" id="postsCarousel">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-md-right lead">
                <a class="btn btn-outline-secondary prev2" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                <a class="btn btn-outline-secondary next2" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="container p-t-0 m-t-2 carousel-inner">
        <div class="row row-equal carousel-item active m-t-0">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-top card-img-top-250">
                        <img class="img-fluid" src="http://i.imgur.com/EW5FgJM.png" alt="Carousel 1">
                    </div>
                    <div class="card-block p-t-2">
                        <h6 class="small text-wide p-b-2">Insight</h6>
                        <h2>
                            <a href>Why Stuff Happens Every Year.</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-top card-img-top-250">
                        <img class="img-fluid" src="http://i.imgur.com/Hw7sWGU.png" alt="Carousel 2">
                    </div>
                    <div class="card-block p-t-2">
                        <h6 class="small text-wide p-b-2">Development</h6>
                        <h2>
                            <a href>How to Make Every Line Count.</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-top card-img-top-250">
                        <img class="img-fluid" src="http://i.imgur.com/g27lAMl.png" alt="Carousel 3">
                    </div>
                    <div class="card-block p-t-2">
                        <h6 class="small text-wide p-b-2">Design</h6>
                        <h2>
                            <a href>Responsive is Essential.</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-equal carousel-item m-t-0">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-top card-img-top-250">
                        <img class="img-fluid" src="//visualhunt.com/photos/l/1/office-student-work-study.jpg" alt="Carousel 4">
                    </div>
                    <div class="card-block p-t-2">
                        <h6 class="small text-wide p-b-2">Another</h6>
                        <h2>
                            <a href>Tagline or Call-to-action.</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-top card-img-top-250">
                        <img class="img-fluid" src="//visualhunt.com/photos/l/1/working-woman-technology-computer.jpg" alt="Carousel 5">
                    </div>
                    <div class="card-block p-t-2">
                        <h6 class="small text-wide p-b-2"><span class="pull-xs-right">12.04</span> Category 1</h6>
                        <h2>
                            <a href>This is a Blog Title.</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fadeIn wow">
                <div class="card">
                    <div class="card-img-top card-img-top-250">
                        <img class="img-fluid" src="//visualhunt.com/photos/l/1/people-office-team-collaboration.jpg" alt="Carousel 6">
                    </div>
                    <div class="card-block p-t-2">
                        <h6 class="small text-wide p-b-2">Category 3</h6>
                        <h2>
                            <a href>Catchy Title of a Blog Post.</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<br>
<br>
<br>
<br><br>
  <section >
       <div id="demo" class="carousel slide ml-2" data-ride="carousel">

                              <!-- Indicators -->
                              <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" ></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                              </ul>
                              
                              <!-- The slideshow -->
                              <div class="carousel-inner ">
                                <div class="carousel-item active">
                                  <div style="width:750px">
                                    <div class="row no-gutters">
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/fa.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">

                                            {{-- <p class="card-title">PUBLIC & PRIVATE</p> --}}
                                            {{-- <h6 style="text-align: center;"><strong><small>Graduate from </small>PUBLIC and PRIVATE</strong></h6> --}}
                                            {{-- <small class="ml-3"><strong>Graduate from</strong></small>
                                            <h6 style="text-align: center;"><strong>PUBLIC</strong></h6> --}}
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/fa.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">
                                            {{-- <small class="ml-3"><strong>Graduate from</strong></small>
                                            <h6 style="text-align: center;"><strong>PRIVATE</strong></h6> --}}
                                            {{-- <small style="text-align: center;">Gender and Development</small> --}}
                                            
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/fa.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">
                                            {{-- <h6 class="card-title boldtx" style="text-align: center;">GAD</h6> --}}
                                            
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/fa.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">
                                            {{-- <h6 class="card-title boldtx" style="text-align: center;">NCW</h6> --}}
                                            
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  </div>
                                  
                                </div>
                                <div class="carousel-item no-gutters">
                                  <div style="width:750px">
                                    <div class="row no-gutters">
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/user8-128x128.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">
                                            {{-- <small class="ml-3"><strong>Vice Governor</strong></small>
                                            <h6 style="text-align: center;"><strong>OLD AND NEW</strong></h6> --}}
                                            
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/user8-128x128.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">
                                            {{-- <small class="ml-3"><strong>Vice Governor</strong></small>
                                            <h6 style="text-align: center;"><strong>DHVTSU</strong></h6> --}}
                                            
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/user8-128x128.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">
                                            {{-- <h6 class="card-title boldtx" style="text-align: center;">PCL</h6> --}}
                                            
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="card" style="width:150px; height:220px;">
                                          <img class="card-img-top" src="{{asset('images/user8-128x128.jpg')}}" alt="Card image" style="width:100%">
                                          <div class="card-body">
                                            {{-- <small class="ml-8"><strong>with</strong></small> --}}
                                            {{-- <h6 style="text-align: center;"><strong>HONORS</strong></h6>
                                            <h6 style="text-align: center;"><strong>RANKS</strong></h6> --}}
                                            
                                            <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  </div>
                                </div>
                              
                              <!-- Left and right controls -->
                              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                              </a>
                              <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                              </a>
                            </div>

                            {{-- <div class="col">
                             <div class="container">
                              <div class="card" style="width:150px;">
                                <img class="card-img-top" src="{{asset('images/user8-128x128.jpg')}}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                  <h4 class="card-title boldtx">NCW</h4>
                                  
                                  <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
                                </div>
                              </div>
                              <br>
                            </div>
                          </div> --}}
                        </div>  
  </section>



    <!-- Contact Us -->
    </main>
    <footer class="footer py-2 footer-dark mt-2">
            <!--<div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pr-lg-4">
                            <h5 class="heading h6 text-uppercase font-weight-700 mb-3">Contact</h5>
                            <ul class="list-unstyled text-small">
                                <li class="d-flex py-2">
                                    <div>
                                        <i class="fas fa-map-marker"></i>
                                    </div>
                                    <div>
                                        <span class="pl-3 d-inline-block">Webpixels Studios<br>
                            150 Southeast Pidgeon Meadow Claflin Terrace, San Francisco, US</span>
                                    </div>
                                </li>
                                <li class="d-flex py-2">
                                    <div>
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <span class="pl-3 d-inline-block">+40 - 0755.222.333</span>
                                    </div>
                                </li>
                                <li class="d-flex py-2">
                                    <div>
                                        <i class="fas fa-envelope-open"></i>
                                    </div>
                                    <div>
                                        <span class="pl-3 d-inline-block">support@webpixels.io</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="heading h6 text-uppercase font-weight-700 mb-3">About us</h5>
                        <ul class="list-unstyled text-small">
                            <li class="py-2"><a href="#">Our company</a>
                            </li>
                            <li class="py-2"><a href="#">Careers</a>
                            </li>
                            <li class="py-2"><a href="#">Project</a>
                            </li>
                            <li class="py-2"><a href="#">Services</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="heading h6 text-uppercase font-weight-700 mb-3">Solutions</h5>
                        <ul class="list-unstyled">
                            <li class="py-2"><a href="#">Landing pages</a>
                            </li>
                            <li class="py-2"><a href="#">UI components</a>
                            </li>
                            <li class="py-2"><a href="#">Premium plugins</a>
                            </li>
                            <li class="py-2"><a href="#">Bootstrap themes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="pr-lg-5">
                            <h1 class="heading h6 text-uppercase font-weight-700 mb-3"><strong>Purpose</strong> UI Kit</h1>
                            <ul class="list-unstyled">
                                <li class="py-2"><a href="#">Terms and conditions</a>
                                </li>
                                <li class="py-2"><a href="#">Privacy policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="container mt-4">
                <div class="align-items-center">
                    <div class="text-center">
                        <a href="../index.html">
                            <img src="/added/img/icons/logo.png" class="alpha-6 alpha-10--hover" style="width: 50px;">
                        </a>
                        <span class="d-block mt-1">&copy; 2018 <a href="#" class="footer-link" target="_blank">Provincial Capitol of Pampanga</a>. All rights reserved.</span>
                    </div>
                </div>
            </div>
        </footer>
    <!-- Core -->
    <script src="/added/vendor/jquery/jquery.min.js"></script>
    <script src="/added/vendor/popper/popper.min.js"></script>
    <script src="/added/js/bootstrap/bootstrap.min.js"></script>
    <!-- FontAwesome 5 -->
    <script src="/added/vendor/fontawesome/js/fontawesome-all.min.js" defer></script>
    <!-- Page plugins -->
    <script src="/added/vendor/highlight/js/highlight.min.js"></script>
    <!-- Theme JS -->
    <script src="/added/js/theme.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104437451-1"></script>
    <script>
        // window.dataLayer = window.dataLayer || [];
        //   function gtag(){dataLayer.push(arguments);}
        //   gtag('js', new Date());
          
        //   gtag('config', 'UA-104437451-1');


    (function($) {
    "use strict";

    // manual carousel controls
    $('.next2').click(function(){ $('.carousel').carousel('next');return false; });
    $('.prev2').click(function(){ $('.carousel').carousel('prev');return false; });
    
    })(jQuery);
    </script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script>
</body>


<!-- Mirrored from preview.webpixels.io/purpose-website-ui-kit-v1.0.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Aug 2018 07:48:32 GMT -->
</html>