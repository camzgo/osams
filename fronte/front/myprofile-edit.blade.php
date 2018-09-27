<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

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
                <div class="card-title"><div class="boldtx alert alert-primary" role="alert"> <i class="fa fa-user"></i> Personal Information</div></div><hr>
                 <form action="{{ action('FrontendController@storedPersonal') }}" id="regForm" method="post" enctype="multipart/form-data" class="container">
                 {{csrf_field()}}
                  <div class="container">
                    <div class="form-row form-group">
                      <div class="col-md-3">
                        <label>Surname <small>(required)</small></label>
                        <input type="text" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" id="surname" placeholder="Surname" value="{{Auth::user()->surname}}">
                        @if ($errors->has('surname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-md-3">
                        <label>First Name <small>(required)</small></label>
                        <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="first_name" placeholder="First Name" value="{{Auth::user()->first_name}}">
                        @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-md-3">
                        <label>Middle Name</label>
                        <input type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" id="middle_name" placeholder="Middle Name" value="{{Auth::user()->middle_name}}">
                        @if ($errors->has('middle_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('middle_name') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-md-3">
                        <label>Suffix</label>
                        <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="suffix" id="suffix" placeholder="Suffix (e.g., Jr. Sr. III)" value="{{Auth::user()->suffix}}">
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
                            <label for="nationality">Nationality <small>(required)</small></label>
                            <select name="nationality" id="nationality" class="form-control " required>
                              <option value="" selected disabled>--Select--</option>
                              <option value="Filipino">Filipino</option>
                              <option value="Foreigner">Foreigner</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                          <label>Religion <small>(required)</small></label>
                          <select name="religion" id="religion" class="form-control "  required>
                            <option value="" selected disabled>--Select--</option>
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
                          <label for="bdate">Birth Date <small>(required)</small></label>
                          <input type="date" name="bday" id="bday" class="form-control" data-provide="datepicker" value="{{Auth::user()->bday}}" required/>
                        </div>
                        <div class="col-md-6">
                          <label for="bplace">Birth Place <small>(required)</small></label>
                          <input type="text" name="bplace" id="bplace" class="form-control" placeholder="Birth Place"  required/>
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-md-6">
                          <a href="/profile" class="btn  btn-outline-secondary">Back to My Profile</a>
                        </div>
                        <div class="col-md-6">
                          <input type="submit" class="btn btn-primary pull-right" value="Save Changes"/>  
                        </div>
                      </div>
                      <div class="ghost">
                        <input type="hidden" name="gen2" id="gen2" value="{{Auth::user()->gender}}">
                        <input type="hidden" name="nation" id="nation" value="">
                      </div>
                      <div class="ghost"></div>
                    </div>
                  </form>
                </div>

            </div>
          </div>

          {{-- <div class="col-md-3">
                        
                      </div> --}}



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
<script src="{{ URL::asset('data/religion.js') }}" type="text/javascript"></script>
<script>
  
  
$(document).ready(function(){
  $('#mobile_no').mask('0000000000', {"clearIncomplete": true});
  var gen = $('#gen2').val();
  document.getElementById('gender').value=gen;
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

$(document).ready(function()
{
  var gen = $('#gen2').val();
  document.getElementById('gender').value=gen;

  document.getElementById('nationality').value="{{$personal->nationality}}";
  document.getElementById('religion').value="{{$personal->religion}}";
  document.getElementById('civil_status').value="{{$personal->civil_status}}";
  document.getElementById('street').value="{{$personal->street}}";
  document.getElementById('bplace').value="{{$personal->birth_place}}";
});


</script>


</html>