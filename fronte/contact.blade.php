<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Contact Us - Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
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
        <a class="nav-link active" href="#"><strong>Contact Us</strong></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto align-items-lg-center">
      <li class="nav-item mr-0">
          <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button"><strong>Sign up</strong></a>
      </li>
      <li class="nav-item mr-0">
          <a data-toggle="modal" data-target="#login-modal" style="width: 8em;  font-size: .90rem;" class="btn btn-sm btn-white btn-rounded " role="button">
              <i class="fa fa-sign-in"></i>&nbsp <strong>Sign In</strong>
          </a>
      </li>
    </ul>
  </div>
</div>
</nav>
<main>
    {{-- <div class="">
      <img src="/images/capitol.jpg" style="width: 100%; height:100%" alt="">
    </div> --}}
    <section class="slice slice-lg bg-grad1 py-5" data-separator-orientation="bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="display-4 text-white"><strong>Contact Us</strong></div>
           
          </div>
        </div>
      </div>
    </section>
  <section class="slice slice-lg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 border-right">
          <h4 class="tx1"><i class="fa fa-map-marker"></i> ADDRESS</h4>
          <p class="container">Capitol Building, Capitol Boulevard, Capitol Compound <br>Sto. Niño City of San Fernando, Pampanga 2000</p>
          <br>
          <h4 class="tx1"><i class="fa fa-phone"></i> PHONE</h4>
          <p class="container">Capitol Compound, City of San Fernando, Pampanga 2000</p>
          <br>
          <h4 class="tx1"><i class="fa fa-clock-o"></i> HOURS</h4>
          <div class="container">
            <p class="text-bold mb-0">Monday - Friday</p>
            <p>8:00 AM to 5:00 PM</p>
            <p class="text-bold mb-0">Saturday - Sunday</p>
            <p>CLOSED</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body shdow">
              <div class="card-title"><h1 class="tx2 text-center">Get In Touch With Us!</h1></div>

              <form action="">
                <div class="container mt-4">
                  <div class="row form-group">
                    <input type="text" name="name" id="name" class="form-control text-bold" placeholder="Your Name" required />
                  </div>
                  <div class="row form-group">
                    <input type="email" name="email" id="email" class="form-control text-bold" placeholder="Your Email" required />
                  </div>
                  <div class="row form-group">
                    <textarea name="message" id="message" class="form-control noresize" rows="7" placeholder="How can we help?" required></textarea>
                  </div>
                  <div class="row pull-right">
                    <input type="submit" class="btn btn-info btn-lg text-bold" value="Send Message"/>
                  </div>
                </div>
              </form>
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