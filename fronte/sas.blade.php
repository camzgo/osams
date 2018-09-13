<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet"> --}}

      <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
</head>

 
  @include('inc.nav')
<main>
    <div class="">
      <img src="/images/capitol.jpg" style="width: 100%; height:100%" alt="">
    </div>
 <div class="row no-gutters">
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
      <div class="col-lg-4 mt-4">
        <div class="row">
        <div class="col-md-8" style="margin-left:120px; margin-top: 50px;">
         <div class="card shdow rounded"> 
           <div class="card-header bg-grad1 text-white" style="font-size: 18px;">
            <strong> CALENDAR </strong>
           </div>
           <div class="card-body">
             <h5>September 12, 2018</h5>
           </div>
         </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-8"  style="margin-left:120px; margin-top: 50px;">
          <div class="card shdow rounded">
            <div class="card-header bg-grad1 text-white" style="font-size: 18px;">
              <strong> ANNOUNCEMENT</strong>
            </div>
            <div class="card-body">
              <h5>SAMPLE</h5>
              <h5>sAMPLE</h5>
              <h5>SAMPLE</h5>
            </div>
          </div>

        </div>
      </div>
      
      </div> 
    
   </section>
     </div>
     </div>
    </div>

   <br>
    <section class="mt-4 slice" style="background-color: #ececec;">
      
      <div>
        <h2 class="text-center"><strong>Scholarship Programs</strong></h2>
        <br>
      </div>
        <div class="container">
         <div id="demo" class="carousel slide ml-2">       
                     
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div style="width: 100%">
                    <div class="row no-gutters">
                      <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                       <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  
                </div><!--first-->

                <div class="carousel-item">
                  <div style="width: 100%">
                    <div class="row no-gutters">
                      <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                       <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card" style="width:250px; height:400px;">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>Graduate from public</strong></h5>
                                  <div class="card-subtitle">fddsfdsjfsfsfjsdjfsjffjsjfk</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong></strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> </strong></li>
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> </strong></li>
                              </ul>
                             </div>
                             <div class="card-footer">
                               <div>
                                <a href="#" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  
                </div>

                <!-- Left and right controls -->
                <div class="pull-right">
                  <a class="" href="#demo" data-slide="prev">
                  <span class="btn btn-info"><i class="fa fa-chevron-left"></i></span>
                  </a>
                  <a class="" href="#demo" data-slide="next">
                    <span class="btn btn-info"><i class="fa fa-chevron-right"></i></span>
                  </a>
                </div>

            </div>
          </div>
        </div>
    </section>
   <br><br>
   
   {{-- <section class="mt-4">
     <div class="container">
       <div class="col-md-3 ">
            <div class="card" style="width:250px; height:500px;">
              <img class="card-img-top" src="{{asset('images/fa.jpg')}}" alt="Card image" style="width:100%">
              <div class="card-body">
                <a href="#" class="btn btn-primary btn-rounded" style="width:105px;">Apply</a>
              </div>
            </div>
          </div>
     </div>
   </section>
     --}}



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