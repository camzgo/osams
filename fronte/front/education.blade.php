<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Educational Information | Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

 
    <nav class="navbar navbar-expand-lg navbar-dark py-3" style="height: 6em;   position: relative;
    background: linear-gradient(80deg, #004280 0, #001a33 100%)
    ">
    <div class="container">
 <a class="navbar-brand" href="#">
    <img src="/added/img/icons/logo.png" class="mr-4" width="50px" alt="">
    <strong>Online Scholarship Application</strong>
     {{-- <img  class="mr-4" style="width: 50px;"> --}}
  </a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Home</strong><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>About Us</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>FAQs</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Site Map</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Contact Us</strong></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto align-items-lg-center">
      <li class="nav-item mr-0">
          {{-- <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button"><strong>Sign up</strong></a> --}}
         <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">1</span> 
        <a href="#"><i class="fa fa-envelope-o"></i></a>
      </li>
      <li class="nav-item mr-0">
          {{-- <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button"><strong>Sign up</strong></a> --}}
         <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">1</span> 
        <a href="#"><i class="fa fa-globe"></i></a>
      </li>
      {{-- <li class="nav-item mr-0">
          <a data-toggle="modal" data-target="#login-modal" style="width: 8em;  font-size: .90rem;" class="btn btn-sm btn-white btn-rounded " role="button">
              <i class="fa fa-sign-in"></i>&nbsp <strong>Sign In</strong>
          </a>
      </li> --}}
    </ul>
  </div>
</div>
</nav>
<main>
    <section class="slice">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 ml-4">
            <div class="card ">
              <div class="card-header bg-primary"><strong>Dashboard</strong></div>
              <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4 bg-secondary">
                  <div class="text-bold">
                    <span class="fa fa-user"></span> &nbsp;
                    <span>My Profile</span>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-graduation-cap"></span>
                    <span>My Scholarship</span>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-cog"></span> &nbsp;
                    <span>Account Settings</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="card-title"><div class="boldtx alert alert-primary" role="alert"> <i class="fa fa-university"></i> Educational Information</div></div><hr>
                 <form action="" id="regForm" method="post" enctype="multipart/form-data" class="container">
                 {{csrf_field()}}
                  <div class="container">
                    
                    <div class="form-row form-group">
                      <div class="col-md-5">
                        <label>Course / Program (No Abbreviation) <small>(required)</small></label>
                        <input type="text" class="form-control" name="course" id="course" placeholder="Course / Program " required>
                      </div>
                      <div class="col-md-3">
                        <label>Year Level <small>(required)</small></label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="yr_lvl" name="yr_lvl" placeholder='eg. 1st' required/>
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1">YEAR</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label>Year Entered <small>(required)</small></label>
                        <input type="text" class="form-control" name="year_entered" id="year_entered" placeholder="YYYY" required>
                      </div>
                      <div class="col-md-2">
                        <label>Duration <small>(required)</small></label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="duration" name="duration" placeholder='00' required/>
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1">YEARS</span>
                          </div>
                        </div> 
                      </div>  
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6">
                        <label>College / University Name (No Abbreviation) <small>(required)</small></label>
                        <input type="text" class="form-control" name="course" id="course" placeholder="College / University Name (No Abbreviation)" required>
                      </div>
                      <div class="col-md-6">
                        <label>College / University Address <small>(required)</small></label>
                        <input type="text" class="form-control" name="course" id="course" placeholder="Building no., Street, Barangay Town, City Municipality, Province" required>
                      </div>

                    </div>
                    
                      <div class="row form-group">
                        <div class="col-md-6">
                          <a href="#" class="btn btn-secondary">Back to My Profile</a>
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
  $('#year_entered').mask('0000', {"clearIncomplete": true});
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


</script>


</html>