<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Pampanga Capitol | Online Scholarship Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>

  
</head>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  /* background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px; */
}

h1 {
  text-align: center;  
}

input {
  /* padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa; */
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #ffffff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  -webkit-box-shadow: inset 0 0 0 transparent;
          box-shadow: inset 0 0 0 transparent;
  -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}
select.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  /* background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer; */
  -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
           border: none;
  border-radius: 2px;
  display: inline-block;
  height: 36px;
  line-height: 36px;
  padding: 0 16px;
  text-transform: uppercase;
  font-weight: bold;
  vertical-align: middle;
  -webkit-tap-highlight-color: transparent;
  font-size: 14px;
  outline: 0;
  text-decoration: none;
  color: #fff;
  background-color: #26a69a;
  text-align: center;
  letter-spacing: .5px;
  -webkit-transition: background-color .2s ease-out;
  transition: background-color .2s ease-out;
  cursor: pointer;

  position: relative;
  overflow: hidden;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  -webkit-tap-highlight-color: transparent;
  vertical-align: middle;
  z-index: 1;
  -webkit-transition: .3s ease-out;
  transition: .3s ease-out;
}

button:hover {
  /* opacity: 0.8; */
  background-color: #2bbbad;
}

button:focus {
  background-color: #1d7d74;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

.surnamemsg, .first_namemsg, .middle_namemsg, .suffixmsg, .bdaymsg, .fsurnamemsg, .ffirst_namemsg, .fmiddle_namemsg, .fsuffixmsg, 
.msurnamemsg, .mfirst_namemsg, .mmiddle_namemsg, .msuffixmsg, .emergencymsg{
    color: red;
}

.hidden {
     visibility:hidden;
}

</style>

<body>
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





    <!-- Main content -->
     <div class="content mt-5">
      <div class="container">
         <div class="card">
          {{-- <div class="card-header" id="th-cl1">
              <h4 class="boldtx">PCL</h4>
          </div> --}}
          <div class="card-body">
    <form action="{{ action('ScholarshipFrontController@pclStore') }}" id="regForm" method="post" enctype="multipart/form-data" class="container">
      {{csrf_field()}}


      <div class="tab">

        {{-- <h5><strong>Step 1 of 3</strong></h5> --}}
        <div class="progress mt-2">
          <div class="progress-bar bg-info" role="progressbar" style="width: 33.3333333333%" aria-valuenow="33.3333333333" aria-valuemin="0" aria-valuemax="100"><strong>Step 1 of 3</strong></div>
        </div>

        <div class="row form-group mt-5">
          <h4 class="tx1">Personal Information</h4>
        </div>
        <hr/>
        <div class="row">
          <label for="fullname">* Full Name</label>
        </div>
        <div class="form-row">
          <div class = "col-md-4">
            <input type="text" class="form-control req surname" id="surname" name="surname" placeholder='* Surname' value="{{Auth::user()->surname}}" required/>
            <p class="surnamemsg hidden mb-0">Please Enter a valid surname</p>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req first_name" id="first_name" name="first_name" placeholder='* First Name' value="{{Auth::user()->first_name}}" required/>
            <p class="first_namemsg hidden mb-0">Please Enter a valid first name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" placeholder='Middle Name' value="{{Auth::user()->middle_name}}"/>
            <p class="middle_namemsg hidden mb-0">Please Enter a valid middle name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control suffix" id="suffix" name="suffix" placeholder='Suffix (e.g., Jr. Sr. III)' value="{{Auth::user()->suffix}}"/>
            <p class="suffixmsg hidden mb-0">Please Enter a valid suffix</p>
          </div>
        </div>
        <div class="form-row form-group">
          <div class="col-md-3">
            <label>* District</label>
            <select name="district" id="district" data-val="true"  data-val-required="Please select District" data-dependent="municipality" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
                @foreach ($district_list as $district)
                  <option value="{{$district->district}}">{{$district->district}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label for="municipality">* Municipality</label>
            <select name="municipality" id="municipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="barangay">* Barangay</label>
            <select name="barangay" id="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" value="{{$personal->street}}" placeholder='Street'/>
          </div>
        </div>
        <div class="form-row form-group">
          <div class="col-md-2">
              <label for="gender">* Gender</label>
              <select name="gender" id="gender" class=" form-control req"  required>
                <option value="" selected disabled>--Select--</option>
                <option value="Male">MALE</option>
                <option value="Female">FEMALE</option>
              </select>
          </div>
          <div class="col-md-2">
            <label>* Civil Status</label>
            <select name="civil_status" id="civil_status" class="form-control req"  required>
              <option value="" selected disabled>--Select--</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Separated">Separated</option>
              <option value="Widowed">Widowed</option>
            </select>
          </div>
          <div class="col-md-3">
              <label for="nationality">* Nationality</label>
              <select name="nationality" id="nationality" class="form-control req" required>
                <option value="" selected disabled>--Select--</option>
                <option value="Filipino">Filipino</option>
                <option value="Foreigner">Foreigner</option>
              </select>
          </div>
          <div class="col-md-3">
            <label for="religion">* Religion</label>
            <select name="religion" id="religion" class="form-control req"  required>
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="bdate">* Birth Date</label>
            <input type="date" name="bday" id="lastReporteddate" class="form-control" placeholder="dd/mm/yyyy" value="{{Auth::user()->bday}}" required/>
          </div>
        </div>
         <div class="form-row form-group">
           <div class="col-md-4">
            <label>* Place of Birth</label>
           <input type="text" class="form-control req" id="birth_place" name="birth_place" placeholder='Place of Birth'  value="{{$personal->birth_place}}" required/>
          </div>
          <div class="col-md-3">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
            <input type="text" class="form-control req" id="mobile_no" name="mobile_no" placeholder='9xxxxxxxxx' required value="{{Auth::user()->mobile_number}}"/>
            </div>  
          </div>
          
        </div>


      </div>
    
      <div class="tab">
        <div class="progress mt-2">
          <div class="progress-bar bg-info" role="progressbar" style="width: 66.6666666667%" aria-valuenow="66.6666666667" aria-valuemin="0" aria-valuemax="100"><strong>Step 2 of 3</strong></div>
        </div>

        <div class="row mt-5 form-group">
          <h4 class="tx1">Guardian Information</h4>
        </div>
        <hr/>
        <div class="row">
          <label for="fullname">* Father's Full Name</label>
        </div>
        <div class="form-row">
          <div class = "col-md-4">
            <input type="text" class="form-control req fsurname" id="fsurname" name="fsurname"  placeholder='* Surname' required/>
            <p class="fsurnamemsg hidden mb-0">Please Enter a valid surname</p>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req ffirst_name" id="ffirst_name" name="ffirst_name"  placeholder='* First Name' required/>
            <p class="ffirst_namemsg hidden mb-0">Please Enter a valid first name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control fmiddle_name" id="fmiddle_name" name="fmiddle_name"  placeholder='Middle Name'/>
            <p class="fmiddle_namemsg hidden mb-0">Please Enter a valid middle name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control fsuffix" id="fsuffix" name="fsuffix" placeholder='Suffix (e.g., Jr. Sr. III)' />
            <p class="fsuffixmsg hidden mb-0">Please Enter a valid suffix</p>
          </div>
        </div>
        <div class="row">
          <label for="fullname">* Mother's Full Name</label>
        </div>
        <div class="form-row">
          <div class = "col-md-4">
            <input type="text" class="form-control req msurname" id="msurname" name="msurname" placeholder='* Surname' required />
            <p class="msurnamemsg hidden mb-0">Please Enter a valid surname</p>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req mfirst_name" id="mfirst_name" name="mfirst_name" placeholder='* First Name' required/>
            <p class="mfirst_namemsg hidden mb-0">Please Enter a valid first name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control mmiddle_name" id="mmiddle_name" name="mmiddle_name" placeholder='Middle Name' />
            <p class="mmiddle_namemsg hidden mb-0">Please Enter a valid middle name</p>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control msuffix" id="msuffix" name="msuffix" placeholder='Suffix (e.g., Jr. Sr. III)'/>
            <p class="msuffixmsg hidden mb-0">Please Enter a valid first name</p>
          </div>
        </div>
        <div class="form-row">
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>* Father's Occupation</label>
                    <input type="text" class="form-control" id="foccupation" name="foccupation" placeholder="Father's Occupation"  required/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>* Mother's Occupation</label>
                    <input type="text" class="form-control" id="moccupation" name="moccupation" placeholder="Mother's Occupation" required/>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>* Address</label>
                  <input type="text" class="form-control" id="gaddress" name="gaddress" placeholder="Address (Street, Village Subdivision, Municipality)"  required/>
              </div>
            </div>
        </div>
      </div>

      <div class="tab">

        <div class="progress mt-2">
          <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Step 3 of 3</strong></div>
        </div>

        <div class="form-row mt-5 form-group">
          <h4 class="tx1">Other Information</h4>
        </div>
        <hr/>
        <div class="row">
          <h5><strong>Educational Information</strong></h5>
        </div>
        <div class="form-row form-group">
            <div class="col-md-5">
                <label>* School Enrolled <small>(No Abbreviation)</small></label>
                <input name="college_name" type="text" class="form-control req" value="{{$education->college_name}}" placeholder="School Enrolled"/>
            </div>
            <div class="col-md-4">
                <label>* Course/Program <small>(No Abbreviation)</small></label>
                <input name="course" type="text" class="form-control req" value="{{$education->course}}" placeholder ="Course/Program">
            </div>
            <div class="col-md-2">
                <label>* Year Level</label>
                <div class="input-group">
                  <input name="yr_lvl" type="text" class="form-control req" value="{{$education->yr_lvl}}" placeholder ="1st">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1">YEAR</span>
                  </div>
                </div>
                
            </div>
        </div>
        <div class="row">
          <h5><strong>In Case of Emergency</strong></h5>
        </div>
        <div class="form-row form-group">
            <div class="col-md-5">
                <label>* Person to be contacted in case of emergency</label>
                <input name="emergency" type="text" class="form-control req emergency" placeholder ="Full Name">
                <p class="emergencymsg hidden mb-0">Please Enter a valid name</p>
            </div>
            <div class="col-md-3">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
              <input type="text" class="form-control req" id="emobile_no" name="emobile_no" placeholder='9xxxxxxxxx'  required/>
            </div>  
          </div>
          <div class="ghost">
            <input type="hidden" id="sid" name="sid" value="{{Auth::user()->id}}">
            <input type="hidden" id="barcode" name="barcode" value={{$barcode}}>
          </div>
        </div>
        
        


    </div>

      <div style="overflow:auto;" class="mt-4">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
      </div>

      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
      </div>
    </form>


</div>
</div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
        
</div>
<script src="{{ URL::asset('data/religion.js') }}" type="text/javascript"></script>
<script>

$(document).ready(function(){
  $('#mobile_no').mask('0000000000', {"clearIncomplete": true});
  $('#emobile_no').mask('0000000000', {"clearIncomplete": true});
  
 document.getElementById('gender').value="{{Auth::user()->gender}}";
  document.getElementById('civil_status').value="{{$personal->civil_status}}";
  document.getElementById('nationality').value="{{$personal->nationality}}";
  document.getElementById('religion').value="{{$personal->religion}}";

  var y = document.getElementById("surname").className;
  console.log(y);

});


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


    $('.first_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.first_namemsg').removeClass('hidden');
        $('.first_namemsg').show();
    }
    else{
        // else, do not display message
        $('.first_namemsg').addClass('hidden');
        }
    });


    $('.fsurname').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.fsurnamemsg').removeClass('hidden');
        $('.fsurnamemsg').show();
    }
    else{
        // else, do not display message
        $('.fsurnamemsg').addClass('hidden');
        }
    });


    $('.ffirst_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.ffirst_namemsg').removeClass('hidden');
        $('.ffirst_namemsg').show();
    }
    else{
        // else, do not display message
        $('.ffirst_namemsg').addClass('hidden');
        }
    });


    $('.msurname').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.msurnamemsg').removeClass('hidden');
        $('.msurnamemsg').show();
    }
    else{
        // else, do not display message
        $('.msurnamemsg').addClass('hidden');
        }
    });


    $('.mfirst_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.mfirst_namemsg').removeClass('hidden');
        $('.mfirst_namemsg').show();
    }
    else{
        // else, do not display message
        $('.mfirst_namemsg').addClass('hidden');
        }
    });


    $('.emergency').on('keypress keydown keyup',function(){
    if (!$(this).val().match($regexname)) {
    // there is a mismatch, hence show the error message
        $('.emergencymsg').removeClass('hidden');
        $('.emergencymsg').show();
    }
    else{
        // else, do not display message
        $('.emergencymsg').addClass('hidden');
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

    $('.fmiddle_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.fmiddle_namemsg').removeClass('hidden');
        $('.fmiddle_namemsg').show();
    }
    else{
        // else, do not display message
        $('.fmiddle_namemsg').addClass('hidden');
        }
    });

    $('.fsuffix').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.fsuffixmsg').removeClass('hidden');
        $('.fsuffixmsg').show();
    }
    else{
        // else, do not display message
        $('.fsuffixmsg').addClass('hidden');
        }
    });

    $('.mmiddle_name').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.mmiddle_namemsg').removeClass('hidden');
        $('.mmiddle_namemsg').show();
    }
    else{
        // else, do not display message
        $('.mmiddle_namemsg').addClass('hidden');
        }
    });

    $('.msuffix').on('keypress keydown keyup',function(){
    if (!$(this).val().match(regexname2)) {
    // there is a mismatch, hence show the error message
        $('.msuffixmsg').removeClass('hidden');
        $('.msuffixmsg').show();
    }
    else{
        // else, do not display message
        $('.msuffixmsg').addClass('hidden');
        }
    });




// $('#surname').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#first_name').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#middle_name').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#suffix').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#fsurname').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#ffirst_name').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#fmiddle_name').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#fsuffix').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#msurname').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#mfirst_name').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#mmiddle_name').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#msuffix').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#foccupation').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });
// $('#moccupation').keyup(function() {
//     var $th = $(this);
//     $th.val( $th.val().replace(/[^a-zA-Z]/, function(str) { alert('You typed " ' + str + ' "\n\nPlease use only letters.'); return ''; } ) );
// });




var v = $("#regForm").validate({
    rules: {
      religion: {
        required: true
      },
      nationality: {
        required: true
      }
      
    },
    errorElement: "span",
    errorClass: "help-inline",
  });


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("req");
  // w = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }

    // for (c =0; c < w.length; c++)
    // {
    //   if(w[c].value == "")
    //   {
    //     w[c].className += " invalid";
    //     valid = false;
    //   }
    // }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status

}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

$(document).ready(function(){
  $('.dynamic').change(function(){
    var x = $('#municipality').val();
    console.log(x);
    console.log($('#barangay').val());
    if($(this).val() != '')
    {
    var select = $(this).attr("id");
    var value = $(this).val();
    var dependent = $(this).data('dependent');
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ route('pcl4.fetch') }}",
      method:"POST",
      data:{select:select, value:value, _token:_token, dependent:dependent},
      success:function(result)
      {
      $('#'+dependent).html(result);
      }

    })
    }
  });

 $('#district').change(function(){
				$('#municipality').val('');
				$('#barangay').val('');
			});
  $('#municipality').change(function(){
    $('#barangay').val('');
  });

});


</script>

</body>
</html>
