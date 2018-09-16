<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Pampanga Capitol | Online Scholarship Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet"> --}}

      <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
</head>

 
  @include('inc.nav')

    



<main>
  <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" class="modal fade">
      <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
              <div class="modal-body">
                  <div class="container d-flex align-items-center">
                      <div class="col">
                          <div class="row justify-content-center">
                              <div class="col-lg-10">
                                <form method="POST" action="{{ route('login') }}" id="sub" name="sub">
                                  @csrf
                                    <div class="text-center">
                                        <img class="mb-3" src="/added/img/icons/logo.png" alt="" width="70" height="70">
                                        <h4 class="boldtx mb-4">Welcome back!</h4>
                                    </div>
                                    <label for="inputEmail" class="sr-only">Email address</label>
                                    {{-- <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required autofocus> --}}
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                                    @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                    @endif
                                    <br>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" placeholder="Password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif



                                    {{-- <div class="custom-control custom-checkbox my-4">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div> --}}
                                    <div class="custom-control custom-checkbox my-4">
                                      <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                      <label class="custom-control-label" for="remember">Remember me</label>
                                    </div>
                                      
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
                <p class="text-center text-muted mt-2"><a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a></p>
                <p class="text-center text-muted">Don't have an account? <a href="/signup"><strong>Register now</strong></a></p>
              </div>
          </div>
      </div>
  </div>


<div id="sign-up-modal" tabindex="-1" role="dialog" aria-laballedby="sign-up-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
              <div class="text-center">
                  <h4 class="boldtx">Create your account</h4>
              </div>
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
                <div class="modal-body">
                    <div class="container">

                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                          <label>Full Name</label>
                          <div class="form-row form-group">
                            <div class="col-md-3">
                              <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }} form-control-lg " name="first_name" value="{{ old('first_name') }}"  placeholder="First Name" required autofocus>
                                @if ($errors->has('first_name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('first_name') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                              <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }} form-control-lg " name="middle_name" value="{{ old('middle_name') }}"  placeholder="Middle Name" required autofocus>
                                @if ($errors->has('middle_name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('middle_name') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                              <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }} form-control-lg" name="surname" value="{{ old('surname') }}" placeholder="Surname" required autofocus>
                                @if ($errors->has('surname'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('surname') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                              <input id="suffix" type="text" class="form-control{{ $errors->has('suffix') ? ' is-invalid' : '' }} form-control-lg " name="suffix" value="{{ old('suffix') }}"  placeholder="Suffix (e.g., Jr. III)" required autofocus>
                                @if ($errors->has('suffix'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('suffix') }}</strong>
                                  </span>
                                @endif
                            </div>
                          </div>

                          <div class="form-row form-group">
                            <div class="col-md-4">
                              <label>Birthday</label>
                              <input type="date" name="bday" id="bday" class="form-control form-control-lg" data-provide="datepicker" />
                              @if ($errors->has('bday'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('bday') }}</strong>
                                  </span>
                              @endif
                            </div>   
                            <div class="col-md-4">
                              <label>Gender</label>
                              <select name="gender" id="gender" class="form-control form-control-lg"> 
                                <option value="" selected disabled>--Please select--</option>
                                <option value="Male" >MALE</option>
                                <option value="Female">FEMALE</option>
                              </select>

                              @if ($errors->has('gender'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('gender') }}</strong>
                                  </span>
                              @endif  
                            </div>
                            <div class="col-md-4">
                              <label>Mobile Number</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+63</span>
                                </div>
                                <input id="mobile_no" type="text" class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }} form-control-lg " name="mobile_no" value="{{ old('mobile_no') }}"  placeholder="9XXXXXXXXX" required autofocus>
                              </div> 
                              @if ($errors->has('mobile_no'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('mobile_no') }}</strong>
                                  </span>
                              @endif
                            </div> 
                          </div>
                          <div class="form-row form-group">
                            <div class="col-md-4">
                              <label>Email Address</label>
                              <input id="email2" type="email2" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" name="email2" value="{{ old('email2') }}" placeholder="Email Address" required>
                              @if ($errors->has('email2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email2') }}</strong>
                                </span>
                              @endif
                            </div>
                            <div class="col-md-4">
                              <label>Password</label>
                              <input id="password2" type="password2" class="form-control{{ $errors->has('password2') ? ' is-invalid' : '' }} form-control-lg" placeholder="Password" name="password" required>
                                <input id="isdel" type="hidden" class="form-control" value="0">
                                @if ($errors->has('password2'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password2') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                              <label>Retype Password</label>
                              <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Retype Password" required>
                            </div>
                            </div>
                            <div class="form-row form-group mt-4">
                              <div class="col-md-6 offset-6">
                                <button type="submit" class="btn btn-warning btn-block btn-lg text-white">
                                    <strong>Create My Account</strong>
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                      <div class="card-deck">
  
                        <div class="card" >
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>{{$ncw->scholarship_name}}</strong></h5>
                                  <div class="card-subtitle">{{$ncw->scholarship_desc}}</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong> {{$ncw->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$ncw->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong> {{$ncw->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$ncw->status}}</strong></li>
                              </ul>
                             </div>
                             @if(Auth::check())
                             @if($ncw->status == "OPEN")
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/ncw" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                             @endif
                             @endif
                          </div>


                        <div class="card" >
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>{{$gad->scholarship_name}} </strong></h5>
                                  <div class="card-subtitle">{{$gad->scholarship_desc}}</div>
                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong>{{$gad->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$gad->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong>{{$gad->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$gad->status}}</strong></li>
                              </ul>
                             </div>
                            @if(Auth::check())
                            @if($gad->status == "OPEN")
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/gad" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                             @endif
                             @endif
                          </div>
       
            
                        <div class="card" >
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>{{$vg->scholarship_name}}</strong></h5>
                                  <div class="card-subtitle clamp-name clamp-lines">{{$vg->scholarship_desc}}</div>

                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong>{{$vg->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$vg->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong>{{$vg->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$vg->status}}</strong></li>
                              </ul>
                             </div>
                             @if(Auth::check())
                             @if($vg->status == "OPEN")
                          
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/vg-oldnew" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                             @endif
                             @endif
                          </div>
    

                        <div class="card">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>{{$gp->scholarship_name}}</strong></h5>
                                  <div class="card-subtitle">{{$gp->scholarship_desc}}</div>
                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong>{{$gp->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$gp->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong>{{$gp->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$gp->status}}</strong></li>
                              </ul>
                             </div>
                            @if(Auth::check())
                            @if($gp->status == "OPEN")
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/graduate-public" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                             @endif
                             @endif
                          </div>

                      </div>
                  </div>
                  </div>
                  
                </div><!--first-->

                <div class="carousel-item">
                  <div style="width: 100%">
                    <div class="row no-gutters">
                      <div class="card-deck">
                        <div class="card">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                 <h5 class="card-title"><strong>{{$gpr->scholarship_name}}</strong></h5>
                                  <div class="card-subtitle">{{$gpr->scholarship_desc}}</div>
                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong>{{$gpr->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$gpr->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong>{{$gpr->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$gpr->status}}</strong></li>
                              </ul>
                             </div>
                             @if(Auth::check())
                             @if($gpr->status == "OPEN")
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/graduate-private" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                             @endif
                             @endif
                          </div>
                        <div class="card">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>{{$pcl->scholarship_name}}</strong></h5>
                                  <div class="card-subtitle">{{$pcl->scholarship_desc}}</div>
                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong>{{$pcl->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$pcl->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong>{{$pcl->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$pcl->status}}</strong></li>
                              </ul>
                             </div>
                            @if(Auth::check())
                            @if($pcl->status == "OPEN")
                      
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/pcl" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>

                             @endif
                             @endif
                          </div>
                        <div class="card" >
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>{{$vgd->scholarship_name}}</strong></h5>
                                  <div class="card-subtitle">{{$vgd->scholarship_desc}}</div>
                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong>{{$vgd->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$vgd->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong>{{$vgd->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$vgd->status}}</strong></li>
                              </ul>
                             </div>
                            @if(Auth::check())
                            @if($vgd->status == "OPEN")
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/vg-dhvtsu" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                             @endif
                             @endif
                          </div>
                        <div class="card">
                          <img class="card-img-top" src="{{asset('images/fa4.jpg')}}" alt="Card image" style="width: 100%;">
                          <div class="card-body">
                              <div class="container">
                                <div class="row clamp-name clamp-lines">
                                  <h5 class="card-title"><strong>{{$hr->scholarship_name}}</strong></h5>
                                  <div class="card-subtitle">{{$hr->scholarship_desc}}</div>
                                </div>
                              </div>
                             
                            </div>
                             <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-unstyled"><i class="fa fa-user"></i> Slots: <strong>{{$hr->slot}} </strong></li>
                                <li class="list-unstyled"><i class="fa fa-money"></i> Amount: <strong>P{{$hr->amount}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-calendar"></i> Deadline: <strong>{{$hr->deadline}}</strong></li>
                                <li class="list-unstyled"><i class="fa fa-check"></i> Availability: <strong>{{$hr->status}}</strong></li>
                              </ul>
                             </div>
                             @if(Auth::check())
                             @if($hr->status == "OPEN")
                             <div class="card-footer">
                              <div>
                                <a href="/scholarship/honor-rank" class="btn btn-primary btn-rounded" style="width: 8em;  font-size: .90rem; margin-left:3em;"> APPLY</a>
                              </div>
                             </div>
                             @endif
                             @endif
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
<script>
  $(document).ready(function(){
    $('#mobile_no').mask('0000000000', {"clearIncomplete": true});
  });
// function autoRefreshPage()
//     {
//         window.location = window.location.href;
//     }
//     setInterval('autoRefreshPage()', 10000);
   

</script>
</html>