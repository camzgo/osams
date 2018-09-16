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
              <h4 class="boldtx"><strong>EEFAP APPLICATION</strong></h4>
          </div> --}}
          <div class="card-body">
            
          {{-- <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($barcode, 'C39')}}" alt="barcode" /> --}}
          {{-- <small>{{$barcode}}</small> --}}
    <form action="{{ action('ScholarshipFrontController@eefapStore') }}" id="regForm" method="post" enctype="multipart/form-data" class="container">
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
        <div class="row form-group">
          <div class = "col-md-4">
          <input type="text" class="form-control req" id="surname" name="surname" placeholder='* Surname' value="{{Auth::user()->surname}}" required/>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req" id="first_name" name="first_name" placeholder='* First Name' value="{{Auth::user()->first_name}}" required/>
          </div>
          <div class = "col-md-2">
          <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{Auth::user()->middle_name}}" placeholder='Middle Name'/>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control" id="suffix" name="suffix" value="{{Auth::user()->suffix}}" placeholder='Suffix (e.g., Jr. Sr. III)'/>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-3">
            <label for="municipality">* Municipality</label>
            <select name="municipality" id="municipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
              @foreach ($municipal_list as $municipal)
                  <option value="{{$municipal->municipality}}">{{$municipal->municipality}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label for="barangay">* Barangay</label>
            <select name="barangay" id="barangay" class="form-control dynamic req" required >
              <option value="" selected disabled>--Select--</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street"  value="{{$personal->street}}" placeholder='(Street, Village Subdivision)'/>
          </div>
        </div>
         <div class="row form-group">
          <div class="col-md-3">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
              <input type="text" class="form-control req" id="mobile_no" name="mobile_no" value="{{Auth::user()->mobile_number}}" placeholder='9xxxxxxxxx' required/>
            </div>
            
          </div>
          <div class="col-md-4">
            <label for="email">* Facebook Account</label>
            <input type="text" class="form-control req" id="fb_account" name="fb_account" value="" placeholder='facebook.com/username' required/>
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
          <label for="fullname">* Full Name</label>
        </div>
        <div class="row form-group">
          <div class = "col-md-4">
            <input type="text" class="form-control req" id="gsurname" name="gsurname" value="{{$guardian->surname}}" placeholder='* Surname' required/>
          </div>
          <div class = "col-md-4">
            <input type="text" class="form-control req" id="gfirst_name" name="gfirst_name" value="{{$guardian->first_name}}" placeholder='* First Name' required/>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control" id="gmiddle_name" name="gmiddle_name" value="{{$guardian->middle_name}}" placeholder='Middle Name'/>
          </div>
          <div class = "col-md-2">
            <input type="text" class="form-control" id="gsuffix" name="gsuffix" value="{{$guardian->suffix}}" placeholder='Suffix (e.g., Jr. Sr. III)'/>
          </div>
        </div>
        <div class="row form-group">

            <div class="col-md-4">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
              <input type="text" class="form-control req" id="gmobile_no" value="{{$guardian->mobile_number}}" name="gmobile_no" placeholder='9xxxxxxxxx' required/>
            </div>
        </div>
        </div>
      </div>

      <div class="tab">

        <div class="progress mt-2">
          <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Step 3 of 3</strong></div>
        </div>

        <div class="row mt-5 form-group">
          <h4 class="tx1">Educational Information</h4>
        </div>
        <hr/>
        <div class="row form-group">
            <div class="col-md-5">
                <label>* College/University Name <small>(No Abbreviation)</small></label>
                <input name="college_name" type="text" class="form-control req" value="{{$education->college_name}}" placeholder="College/University Name"/>
            </div>
            <div class="col-md-5">
                <label>* College/University Address</label>
                <input name="college_address" type="text" class="form-control req" value="{{$education->college_address}}" placeholder ="(Building no., Street, City Municipality, Province)">
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
        <div class="row form-group">
            <div class="col-md-4">
                <label>* Course/Program <small>(No Abbreviation)</small></label>
                <input name="course" type="text" class="form-control req" value="{{$education->course}}" placeholder ="Course/Program">
            </div>
            <div class="col-md-3">
                <label>* Major <small>(No Abbreviation)</small></label>
                <input name="major" type="text" class="form-control req" placeholder ="Major">
            </div>
            <div class="col-md-2">
                <label>* General Average</label>
                <input name="gen_average" type="text" class="form-control req"  placeholder ="General Average">
            </div>
            <div class="col-md-3">
              <label>* Education Program</label>
              <select name="educ_prog" id="educ_prog" class="form-control req">
                <option value="" selected disabled>--Select--</option>
                <option value="2 Years Course">2 Years Course</option>
                <option value="Bachelor's Degree">Bachelor's Degree</option>
                <option value="Ladderized">Ladderized</option>
              </select>
            </div>
        </div>
        <div class="row form-group">
          <div class="col-md-2">
            <label>* Graduating: </label>
            <select name="grad" id="grad" class="form-control">
              <option value="" selected disabled>--Select--</option>
              <option value="YES">YES</option>
              <option value="NO">NO</option>
            </select>
          </div>
          <div class="col-md-3">
            <label>* I certify that: </label>
            <select name="spes" id="spes" class="form-control">
              <option value="" selected disabled>--Select--</option>
              <option value="YES">Yes, I am SPES Recipient</option>
              <option value="NO">No, I am not SPES Recipient</option>
            </select>
          </div>
        </div>
        </div>
        <div class="ghost">
          <input type="hidden" id="sid" name="sid" value="{{Auth::user()->id}}">
          <input type="hidden" id="scholar_id" name="scholar_id" value={{$scholar_id}}>
          <input type="hidden" id="barcode" name="barcode" value={{$barcode}}>
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
  {{-- </div>
</div>
</div>

</div>
</div> --}}
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
        
</div>
<script>

$(document).ready(function(){
  $('#mobile_no').mask('0000000000', {"clearIncomplete": true});
  $('#gmobile_no').mask('0000000000', {"clearIncomplete": true});

  // var pathname = window.location.pathname;
  // var parts = pathname.split('/');
  // console.log(parts[3]);

  // $('#sid').val(parts[3]);

});

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
      url:"{{ route('eefap.fetch') }}",
      method:"POST",
      data:{select:select, value:value, _token:_token, dependent:dependent},
      success:function(result)
      {
      $('#'+dependent).html(result);
      }

    })
    }
  });

  $('#municipality').change(function(){
    $('#barangay').val('');
  });

});


</script>
<script src="{{ URL::asset('data/religion.js') }}" type="text/javascript"></script>
</body>
</html>