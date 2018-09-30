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
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<style>
.surnamemsg, .first_namemsg, .middle_namemsg, .suffixmsg{
    color: red;
}

.hidden {
     visibility:hidden;
}
</style>
 
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
           <div class="card  mt-4" style="width: 1100px; height: 850px; margin-left:2em;">
                <div class="card-body">
                    {{-- @foreach ($errors->all() as $error)
                          <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                        @endforeach --}}
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
                                        <div class="form-row ">
                                            <div class="col-md-6">
                                                <input id="first_name" type="text" class="form-control first_name form-control-lg {{ $errors->has('first_name') ? ' is-invalid' : '' }} " name="first_name" placeholder="First Name" required autofocus>
                                               <p class="first_namemsg hidden">Please Enter a Valid First Name</p>
                                                @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <input id="middle_name" type="text" class="form-control middle_name form-control-lg {{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" placeholder="Middle Name"  autofocus>
                                                <p class="middle_namemsg hidden">Please Enter a Valid Middle Name</p>
                                                @if ($errors->has('middle_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="col-md-6">
                                                <input id="surname" type="text" class="form-control surname form-control-lg {{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname"  placeholder="Surname" required autofocus>
                                                <p class="surnamemsg hidden">Please Enter a Valid Surname</p>
                                                @if ($errors->has('surname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('surname') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                            <input id="suffix" type="text" class="form-control suffix form-control-lg {{ $errors->has('suffix') ? ' is-invalid' : '' }}" name="suffix"   placeholder="Suffix (e.g., Jr. III)" autofocus>
                                                <p class="suffixmsg hidden">Please Enter a Valid Suffix</p>
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
                                            <div class="col-md-12">
                                            <label>Student ID Number / Student Number</label>
                                            <input id="school_id" type="text" class="form-control form-control-lg" placeholder="Student ID Number / Student Number" name="school_id" required>
                                                {{-- @if ($errors->has('school_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif --}}
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
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}">
                                                        @if($errors->has('g-recaptcha-response'))
                                                            <span class="invalid-feedback" style="display:block">
                                                                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row  mt-2">
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
  

    var $regexname=/^([a-zA-Z]{2,30})$/;
    $('.surname').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.surnamemsg').removeClass('hidden');
        $('.surnamemsg').show();
    }
    else{
        // else, do not display message
        $('.surnamemsg').addClass('hidden');
        }
    });

var regexname1=/^([a-zA-Z]{2,30})$/;
    $('.first_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname1)) {
    // there is a mismatch, hence show the error message
        $('.first_namemsg').removeClass('hidden');
        $('.first_namemsg').show();
    }
    else{
        // else, do not display message
        $('.first_namemsg').addClass('hidden');
        }
    });


var regexname2=/^([a-zA-Z]{2,30})$/;
    $('.middle_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname1)) {
    // there is a mismatch, hence show the error message
        $('.middle_namemsg').removeClass('hidden');
        $('.middle_namemsg').show();
    }
    else{
        // else, do not display message
        $('.middle_namemsg').addClass('hidden');
        }
    });

    $('.suffix').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname1)) {
    // there is a mismatch, hence show the error message
        $('.suffixmsg').removeClass('hidden');
        $('.suffixmsg').show();
    }
    else{
        // else, do not display message
        $('.suffixmsg').addClass('hidden');
        }
    });



</script>
</html>