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
<main>
<section>
  <div class="container">
    <div class="card mt-5" style="width:1100px; height:800px;">
      <div class="card-body">
        <div class="card-title">
          <h2>APPLICATION FORM</h2><hr>
        </div>
        <div class="container">
          <div class="form-row">
            <h4 class="tx1 mb-2">Personal Information</h4>
          </div>
          <div class="form-row form-group">
            <div class = "col-md-4">
              <label>* Surname</label>
              <input type="text" class="form-control " id="surname" name="surname" placeholder='* Surname' value="{{$eefapgv->surname}}" required/>
            </div>
            <div class = "col-md-4">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder='* First Name' value="{{$eefapgv->first_name}}" required/>
            </div>
            <div class = "col-md-2">
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder='Middle Name' value="{{$eefapgv->middle_name}}"/>
            </div>
            <div class = "col-md-2">
            <input type="text" class="form-control" id="suffix" name="suffix" placeholder='Suffix (e.g., Jr. III)' value="{{$eefapgv->suffix}}"/>
            </div>
          </div>
          <div class="form-row form-group">
                <div class="col-md-3">
                <label for="municipality">* Municipality</label>
                <select name="municipality" id="municipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="barangay" class="form-control dynamic" required >
                  <option value="" selected disabled>--Select--</option>
                  @foreach ($municipal_list as $municipal)
                      <option value="{{$municipal->municipality}}">{{$municipal->municipality}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <label for="barangay">* Barangay</label>
                <select name="barangay" id="barangay" class="form-control dynamic" required >
                  <option value="" selected disabled>--Select--</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="street" placeholder='(Street, Village Subdivision)'/>
              </div>
          </div>
          <div class="row form-group">
          <div class="col-md-3">
            <label for="mobile_no">* Mobile Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
              </div>
            <input type="text" class="form-control req" id="mobile_no" name="mobile_no" placeholder='9xxxxxxxxx' required value="{{$eefapgv->mobile_number}}"/>
            </div>
            
          </div>
          <div class="col-md-4">
            <label for="email">* Facebook Account</label>
            <input type="text" class="form-control req" id="fb_account" name="fb_account" placeholder='facebook.com/username' required/>
          </div>
        </div>
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
      url:"{{ route('users.fetch') }}",
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
</html>