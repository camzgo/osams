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
<style>
#image_preview{

      /* border: 1px solid black; */

      padding: 5px;

    }

    #image_preview img{

      width: 144px;
      height: 144px;

      /* padding: 5px; */

    }

</style>
@include('inc.nav');
<main>
    <section class="slice">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 ml-4">
            @if(Auth::user()->chg == 0)
            <div class="card ">
              <div class="card-header"><strong>Dashboard</strong></div>
              <div class="list-group list-group-flush">
                <a href="/profile" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
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
                <a href="/account" class="list-group-item list-group-item-action d-flex justify-content-between px-4 active">
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
                  <div class="card-title"><div class="alert alert-info boldtx" role="alert"><i class="fa fa-cog"></i> Account Information</div></div><hr>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                  <div>
                   <div class="container">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="container ml-4 mt-2 mb-0">
                                 @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                      {{ $error }}
                                  </div>
                                  @endforeach
                                @if(Auth::user()->chg ==1)
                                <div class="alert alert-info">
                                    You need to change your password before you can access your account.
                                </div>
                                @endif
                                <form method="post" action="{{ action('FrontendController@changePassword')}}" >
                                  {{csrf_field()}}
                                  <div class="form-row form-group">
                                    <div class="col-md-5">
                                      <input type="password" name="current-password" id="current-password" class="form-control form-control-lg" required placeholder="Current Password">
                                    </div>
                                  </div>
                                  <div class="form-row form-group">
                                    <div class="col-md-5">
                                      <input type="password" name="new-password" id="new-password" class="form-control form-control-lg" required placeholder="New Password">
                                    </div>
                                    <div class="col-md-5">
                                      <input type="password" name="new-password_confirmation" id="new-password-confirm" class="form-control form-control-lg" required placeholder="Confirm Password">
                                    </div>
                                  </div>
                                  @if(Auth::user()->chg == 0)
                                  <div class="form-row form-group">
                                    <div class="col-md-4 offset-md-0">
                                      <a href="/account"  class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
                                    </div>
                                    <div class="col-md-4 offset-md-2">
                                      <input type="submit" class="btn btn-primary btn-block" value="Save Changes">
                                    </div>
                                  </div> 
                                  @else
                                  <div class="form-row form-group">
                                    <div class="col-md-5 offset-md-5">
                                      <input type="submit" class="btn btn-primary btn-block" value="Save Changes">
                                    </div>
                                  </div> 
                                  @endif

                                  
                                </form>
                            
                          
                              </div>
                            </div>
                          </div>
                        
                        
                        {{-- <form action="{{ action('FrontendController@changePassword')}}" id="regForm" method="post" enctype="multipart/form-data" class="container">
                          {{csrf_field()}}

                        </form> --}}
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
   


{{-- <div class="form-row form-group" id="current" style="display: none;">
                           <div class="mt-2">
                              <p>To change password, enter your current password and new password below</p>
                           </div>
                            <div class="col-md-5">
                              <label>Current Password</label>
                              <input type="password" class="form-control" name="current" id="current" placeholder="Current Password" > 
                            </div>
                          </div>
                          <div class="form-row form-group mb-4"  id="new">
                            <div class="col-md-5" id ="new2" style="display: none;">
                              <label>New Password</label>
                              <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" > 
                            </div>
                             <div class="col-md-5" id ="new3" style="display: none;">
                              <label>Retype New Password</label>
                              <input type="password" class="form-control" name="rtype" id="rtype" placeholder="Retype New Password" > 
                            </div>
                          </div> --}}


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

  $(document).on('click', '.edit', function(){
    
    // var x = document.getElementById('editAccount');
    // x.style.display = "block";
    // var y = document.getElementById('viewAccount');
    // y.style.display = "none";
  });


  

  $(document).on('click', '.cancel', function()
  {
      var x = document.getElementById('editAccount');
      x.style.display = "none";
      var y = document.getElementById('viewAccount');
      y.style.display = "block";
  });



  
</script>
</html>