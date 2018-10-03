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
    
   {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
</head>
<style>
.surnamemsg, .first_namemsg, .middle_namemsg, .suffixmsg, .bdaymsg{
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
           <div class="card  mt-4" style="width: 1100px; height: 905px; margin-left:2em;">
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
                            <div class="col-md-4" style="margin-top: 80px;">
                                {{-- <img src="{{asset('images/signup-icon.png')}}" alt="" style="width: 100%;"> --}}
                                <div class="card shadow-none" style="width: 310px;">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h5 class="text-danger"><strong>REMINDERS</strong></h5>
                                        </div>
                                        <p>1. Sign up with a <strong>valid email address</strong> where we can send you notifications.</p>
                                        <p>2. Enter your name as it appears on your birth certificate to avoid delays in the processing of your application.</p>
                                    </div>
                                </div>
                                <img src="{{asset('images/signup-icon.png')}}" alt="" style="width: 100%;">
                            </div>
                            <div class="col-md-8 border-left">
                                <div class="form-row">
                                    <div class="container d-flex align-items-center">
                                        <div class="col">
                                            <div class="row justify-content-center">
                                    <form method="POST" action="{{ route('register') }}" id="subform" name="subform">
                                    @csrf
                                    <br>
                                        <label>Full Name</label>
                                        <div class="form-row ">
                                            <div class="col-md-6">
                                                <input id="first_name" type="text" class="form-control first_name form-control-lg {{ $errors->has('first_name') ? ' is-invalid' : '' }} " name="first_name" placeholder="First Name" required autofocus>
                                               
                                                @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                                @endif
                                                <p class="first_namemsg hidden">Please Enter a valid First Name</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="middle_name" type="text" class="form-control middle_name form-control-lg {{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" placeholder="Middle Name"  autofocus>
                                                
                                                @if ($errors->has('middle_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                                </span>
                                                @endif
                                                <p class="middle_namemsg hidden">Please Enter a valid Middle Name</p>
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="col-md-6">
                                                <input id="surname" type="text" class="form-control surname form-control-lg {{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname"  placeholder="Surname" required autofocus>
                                                @if ($errors->has('surname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('surname') }}</strong>
                                                </span>
                                                @endif
                                                 <p class="surnamemsg hidden">Please Enter a valid Surname</p>
                                            </div>
                                            <div class="col-md-6">
                                            <input id="suffix" type="text" class="form-control suffix form-control-lg {{ $errors->has('suffix') ? ' is-invalid' : '' }}" name="suffix"   placeholder="Suffix (e.g., Jr. III)" autofocus>
                                                @if ($errors->has('suffix'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('suffix') }}</strong>
                                                </span>
                                                @endif
                                                <p class="suffixmsg hidden">Please Enter a valid Suffix</p>
                                            </div>
                                        </div>

                                        <div class="form-row ">
                                            <div class="col-md-6">
                                            <label>Birth Date</label>
                                            <input type="text" name="bday" id="lastReporteddate" class="form-control form-control-lg" placeholder="dd/mm/yyyy" required/>
                                            @if ($errors->has('bday'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bday') }}</strong>
                                                </span>
                                            @endif
                                            <p class="bdaymsg hidden">Please Enter a valid birth date</p>
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
                                        <div class="form-row">
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
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} email form-control-lg" name="email" value="{{ old('email') }}" placeholder="Email Address" onchange="sample()" required>
                                            <p class="emailmsg hidden">Please Enter a valid email</p>                                            
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
                                                <button type="button" id="sub" class="btn btn-warning btn-block btn-lg text-white" >
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
  
// [a-z\d\-_\s]+$/i
    var $regexname=/^([a-zA-Z ]{2,30})$/;
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

var regexname1=/^([a-zA-Z ]{2,30})$/;
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


var regexname2=/^([a-zA-Z ]{2,30})*$/;
    $('.middle_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
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
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.suffixmsg').removeClass('hidden');
        $('.suffixmsg').show();
    }
    else{
        // else, do not display message
        $('.suffixmsg').addClass('hidden');
        }
    });


//  function checkDate(field)
//   {
//     var allowBlank = true;
//     var minYear = 1902;
//     var maxYear = (new Date()).getFullYear();

//     var errorMsg;
//     $('.bdaymsg').addClass('hidden');
   
//     // regular expression to match required date format
//     re = /^(\d{4})-(\d{1,2})-(\d{1,2})$/;

//     if(field.value != '') {
//       if(regs = field.value.match(re)) {
//         if(regs[3] < 1 || regs[3] > 31) {
//           errorMsg = "Invalid value for day: " + regs[1];
//         } else if(regs[2] < 1 || regs[2] > 12) {
//           errorMsg = "Invalid value for month: " + regs[2];
//         } else if(regs[1] < minYear || regs[1] > maxYear) {
            
//           errorMsg = "Invalid birth date";
//         }

//       } else {
          
//         errorMsg = "Invalid date format: " + field.value;
//       }
//     }
//      else if(!allowBlank) {
//       errorMsg = "Empty date not allowed!";
//     }

//     if(errorMsg != "") {
//       $('.bdaymsg').removeClass('hidden');
//       $('.bdaymsg').show();
//       $('.bdaymsg').text(errorMsg);

//       //field.focus();
//       return false;
//     }

//     return true;
   
//   }


var d = new Date();
var year = d.getFullYear() - 18;
d.setFullYear(year);
var age;
$("#lastReporteddate").datepicker({ dateFormat: "dd/mm/yy",
		    changeMonth: true,
		    changeYear: true,
		    maxDate: year,
		    minDate: "-80Y",
            yearRange: '-80:' + year + '',
            defaultDate: d
		 });

$("#lastReporteddate").change(function(){
        var dob = $("#lastReporteddate").val();
        var now = new Date();
        var birthdate = dob.split("/");
        var born = new Date(birthdate[2], birthdate[1]-1, birthdate[0]);
        age=get_age(born,now);
     
        console.log(birthdate[2]+" : "+birthdate[1]+" : "+birthdate[0]);
        console.log(age);
    
        if (age<18)
        {
            $('.bdaymsg').removeClass('hidden');
            $('.bdaymsg').show();
             $('.bdaymsg').css({'color': 'red'});
            $('.bdaymsg').text("Invalid Age: " +age);
            return false;
        }
        else
        {
            $('.bdaymsg').removeClass('hidden');
            $('.bdaymsg').show();
            $('.bdaymsg').css({'color': 'green'});
            $('.bdaymsg').text("Valid Age: " +age);
            
        }
});


    function get_age(born, now) {
      var birthday = new Date(now.getFullYear(), born.getMonth(), born.getDate());
      if (now >= birthday) 
        return now.getFullYear() - born.getFullYear();
      else
        return now.getFullYear() - born.getFullYear() - 1;
    }


// ar string = "foo",
//     substring = "oo";
// string.includes(substring);


// $('#email').change(function()
// {
//     // var string = $('#email').val(),
//     // substring = "@";
    
    
//     // if(string.includes(substring))
//     // {
//     //     $('.emailmsg').removeClass('hidden');
//     //     $('.emailmsg').show();
//     //     $('.emailmsg').css({'color': 'green'});
//     //     $('.emailmsg').text("Valid Email Address"); 
//     // }


//  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String($).toLowerCase());

// });


$('#email').change(function()
{   
//       var $result = $("#emailmsg");
//   var email = $("#email").val();
//   $result.text("");

//   if (validateEmail(email)) {
//     $result.text(email + " is valid :)");
//     $result.css("color", "green");
//   } else {
//     $result.text(email + " is not valid :(");
//     $result.css("color", "red");
//   }
//   return false;
console.log('SUCCESS!');


});
function sample()
{
    console.log('SUCCESS');
}

$('#sub').on('click', function()
{

    if(age>=18 && $('#first_name').val() != "" &&  $('#surname').val() != "" && $('#bday').val() != "" && $('#school_id').val() != "" && $('#mobile_no').val() != ""
    && $('#email').val() != "" && $('#password').val() != "" && $('#gender').val() != "")
    {
        $( "#subform" ).submit();
    }
    else
    {
        alert('Warning! Be sure you entered valid data!');
    }
    
});

</script>
</html>