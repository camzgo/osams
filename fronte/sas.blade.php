<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet"> --}}

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
    <div class="">
      <img src="/images/capitol.jpg" style="width: 100%; height:100%" alt="">
    </div>
 <div class="row">
       <div class="col-lg-8">
   <section>
    

      
       <div class="row no-gutters" style="margin-top: 30px;">
       <div class="col-md-8 ml-4" style="margin-right: 75px;">

        <img src="/images/top.jpg"   alt="">
       </div>
       {{-- <div class="col-md-3 ">
         <div class="card"> 
           <div class="card-header">
             CALENDAR
           </div>
           <div class="card-body">
             <h5>September 12, 2018</h5>
           </div>
         </div>
       </div> --}}
       
      </div>

     <div class="row no-gutters">
       <div class="col-md-8 ml-4" style="margin-right: 75px;">

        <img src="/images/step1-v1-2.jpg"   alt="">
       </div>
       

       
     </div>
   </section>
   <section>
     <div class="row no-gutters">
       <div class="col-md-8 ml-4" style="margin-right: 75px;">
        <div class="">
          <img src="/images/step2-v1-2.jpg"  alt="">
        </div>
       </div>
     </div>
   </section>
   <section>
     <div class="row no-gutters">
       <div class="col-md-8 ml-4" style="margin-right: 75px;">
        <div class="">
          <img src="/images/step3-v1-2.jpg" alt="">
        </div>
       </div>
     </div>
      </div>
      <div class="col-lg-3">
        <div class="col-md-3 ">
         <div class="card"> 
           <div class="card-header">
             CALENDAR
           </div>
           <div class="card-body">
             <h5>September 12, 2018</h5>
           </div>
         </div>
       </div> 
    
   </section>
     </div>
     </div>
    </div>

   <br><br>
   
    



</main>
<footer class="footer2">
  <div class="container mt-4">
    <div class="align-items-center">
        <div class="text-center">
            <a href="../index.html">
                <img src="/added/img/icons/logo.png" style="width: 50px;">
            </a>
            <span class="d-block mt-1">&copy; 2018 <a href="#" class="footer-link" target="_blank">Provincial Capitol of Pampanga</a>. All rights reserved.</span>
        </div>
    </div>
  </div>
</footer>
</body>
</html>