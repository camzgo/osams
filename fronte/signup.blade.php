<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Create an Account | Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

 
<nav class="navbar navbar-expand-lg navbar-dark py-3" style="height: 6em;   position: relative;
    background: linear-gradient(80deg, #004280 0, #001a33 100%)">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/added/img/icons/logo.png" class="mr-4" width="50px" alt="">
            <strong>Online Scholarship Application</strong>
            {{-- <img  class="mr-4" style="width: 50px;"> --}}
        </a>


</div>
</nav>
<main>
  <section>
      <div class="container">
           <div class="card  shdow mt-4" style="width: 1000px; height: 620px; margin-left:4em;">
                <div class="card-body">
                     <div class="row justify-content-center">
                        <div class="text-center">
                            <h2 class="tx4">CREATE AN ACCOUNT</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="form-row">
                            <div class="col-md-8 border-right">
                                <div class="form-row">
                                    <div class="container d-flex align-items-center">
                                        <div class="col">
                                            <div class="row justify-content-center">
                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <label>Full Name</label>
                                        <div class="form-row form-group">
                                            <div class="col-md-6">
                                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }} form-control-lg " name="first_name" value="{{ old('first_name') }}"  placeholder="First Name" required autofocus>
                                                @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }} form-control-lg " name="middle_name" value="{{ old('middle_name') }}"  placeholder="Middle Name"  autofocus>
                                                @if ($errors->has('middle_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-md-6">
                                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }} form-control-lg" name="surname" value="{{ old('surname') }}" placeholder="Surname" required autofocus>
                                                @if ($errors->has('surname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('surname') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                            <input id="suffix" type="text" class="form-control{{ $errors->has('suffix') ? ' is-invalid' : '' }} form-control-lg " name="suffix" value="{{ old('suffix') }}"  placeholder="Suffix (e.g., Jr. III)" autofocus>
                                                @if ($errors->has('suffix'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('suffix') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-row form-group">
                                            <div class="col-md-6">
                                            <label>Birthday</label>
                                            <input type="date" name="bday" id="bday" class="form-control form-control-lg" data-provide="datepicker" />
                                            @if ($errors->has('bday'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bday') }}</strong>
                                                </span>
                                            @endif
                                            </div>   
                                            <div class="col-md-6">
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
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
                                            <label>Email Address</label>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            
                                            <div class="col-md-6">
                                            <label>Password</label>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" placeholder="Password" name="password" required>
                                                <input id="isdel" type="hidden" class="form-control" value="0">
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                            <label>Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Retype Password" required>
                                            </div>
                                            </div>
                                            <div class="form-row form-group mt-2">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-warning btn-block btn-lg text-white">
                                                    <strong>Create My Account</strong>
                                                </button>
                                            </div>
                                            </div>
                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 80px; margin-left: 40px;">
                                <img src="{{asset('images/signup-icon.png')}}" alt="" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
  </section>
   
</main>
{{-- <footer class="footer2">
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
</footer> --}}

</body>
<script>
  $(document).ready(function(){
    $('#mobile_no').mask('0000000000', {"clearIncomplete": true});
  });

</script>
</html>