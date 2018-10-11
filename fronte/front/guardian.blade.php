<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Parents / Guardian Information | Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<style>
  .bdaymsg{
    color: red;
}

.hidden {
     visibility:hidden;
}

</style>
 
@include('inc.nav')
<main>
    <section class="slice">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 ml-4">
            @if(Auth::user()->new == 0)
            <div class="card ">
              <div class="card-header"><strong>Dashboard</strong></div>
              <div class="list-group list-group-flush">
                <a href="/profile" class="list-group-item list-group-item-action d-flex justify-content-between px-4 active">
                  <div class="text-bold">
                    <span class="fa fa-user"></span> &nbsp;
                    <span>My Profile</span>
                  </div>
                </a>
                <a href="/scholarship" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-graduation-cap"></span>
                    <span>My Scholarship</span>
                  </div>
                </a>
                <a href="/account" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-cog"></span> &nbsp;
                    <span>Account Settings</span>
                  </div>
                </a>
              </div>
            </div>
            @endif
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="card-title"><div class="boldtx alert alert-primary" role="alert"> <i class="fa fa-user"></i> Parents / Guardian Information</div></div><hr>
                 <form action="{{ action('FrontendController@storedGuardian') }}"" id="regForm" method="post" enctype="multipart/form-data" class="container">
                 {{csrf_field()}}
                  <div class="container">
                    
                    <div class="form-row form-group">
                      <div class="col-md-3">
                        <label>Surname <small>(required)</small></label>
                        <input type="text" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" id="surname" placeholder="Surname" >
                        @if ($errors->has('surname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-md-3">
                        <label>First Name <small>(required)</small></label>
                        <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="first_name" placeholder="First Name" >
                        @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-md-3">
                        <label>Middle Name</label>
                        <input type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" id="middle_name" placeholder="Middle Name" >
                        @if ($errors->has('middle_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('middle_name') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-md-3">
                        <label>Suffix</label>
                        <input type="text" class="form-control {{ $errors->has('suffix') ? ' is-invalid' : '' }}" name="suffix" id="suffix" placeholder="Suffix (e.g., Jr. Sr. III)" >
                        @if ($errors->has('suffix'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('suffix') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-2">
                        <label for="gender">Gender <small>(required)</small></label>
                        <select name="gender" id="gender" class=" form-control "  required>
                          <option value="" selected disabled>--Select--</option>
                          <option value="Male">MALE</option>
                          <option value="Female">FEMALE</option>
                        </select>
                        </div>
                        <div class="col-md-3">
                          <label for="civils">Civil Status <small>(required)</small></label>
                          <select name="civil_status" id="civil_status" class="form-control "  required>
                            <option value="" selected disabled>--Select--</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Separated">Separated</option>
                            <option value="Widowed">Widowed</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label for="nationality">Nationality <small>(required)</small></label>
                          <input type="text" name="nationality" id="nationality" class="form-control  {{ $errors->has('nationality') ? ' is-invalid' : '' }}"  placeholder="Nationality" required/>
                          @if ($errors->has('nationality'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nationality') }}</strong>
                          </span>
                          @endif
                        </div>
                        <div class="col-md-4">
                          <label>Occupation <small>(required)</small></label>
                          <input type="text" name="occupation" id="occupation" class="form-control {{ $errors->has('occupation') ? ' is-invalid' : '' }}"  placeholder="Occupation" required/>
                          @if ($errors->has('occupation'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('occupation') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-md-3">
                          <label for="municipality">Municipality <small>(required)</small></label>
                          <select name="municipality" id="municipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="barangay" class="form-control dynamic" required >
                            <option value="" selected disabled>--Select--</option>
                            @foreach ($municipal_list as $municipal)
                                <option value="{{$municipal->municipality}}">{{$municipal->municipality}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label for="barangay">Barangay <small>(required)</small></label>
                          <select name="barangay" id="barangay" class="form-control dynamic" required >
                            <option value="" selected disabled>--Select--</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="street">Street</label>
                          <input type="text" class="form-control" id="street" name="street" placeholder='(Street, Village Subdivision)'/>
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-md-3">
                          <label for="mobile_no">Mobile Number <small>(required)</small></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">+63</span>
                            </div>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder='9xxxxxxxxx' required/>
                          </div> 
                        </div>
                        <div class="col-md-3">
                          <label for="bdate">Birth Date <small>(required)</small></label>
                          <input type="text" name="bday" id="lastReporteddate" class="form-control" placeholder="dd/mm/yyyy" required/>
                          @if ($errors->has('bday'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('bday') }}</strong>
                              </span>
                          @endif
                          <p class="bdaymsg hidden">Please Enter a valid birth date</p>
                        </div>
                        <div class="col-md-4">
                          <label>Relationship <small>(required)</small></label>
                          <select name="relationship" id="relationship" class="form-control">
                            <option value="" selected disabled>--Select--</option>
                            <option value="Father">Father</option>
														<option value="Mother">Mother</option>
														<option value="Brother">Brother</option>
														<option value="Sister">Sister</option>
														<option value="Grandfather">Grandfather</option>
														<option value="Grandmother">Grandmother</option>
														<option value="Uncle">Uncle</option>
														<option value="Aunt">Aunt</option>
														<option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-6">
                          <a href="/profile" class="btn btn-secondary">Back to My Profile</a>
                        </div>
                        <div class="col-md-6">
                          <input type="submit" class="btn btn-primary pull-right" value="Save Changes"/>  
                        </div>
                      </div>
                      

                    </div>
                  </form>
                </div>

            </div>
          </div>



        </div>
      </div>
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
<script>
  $(document).ready(function(){
  $('#mobile_no').mask('0000000000', {"clearIncomplete": true});
});

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
      url:"{{ route('profile.fetch') }}",
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

var d = new Date();
var year = d.getFullYear() - 17;
d.setFullYear(year);
var age;
$("#lastReporteddate").datepicker({ dateFormat: "dd/mm/yy",
		    changeMonth: true,
		    changeYear: true,
		    maxDate: year,
		    minDate: "-90Y",
            yearRange: '-90:' + year + '',
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
    
        if (age<17)
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
</script>


</html>