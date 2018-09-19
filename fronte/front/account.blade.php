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
                    
                      <div class="form-row">
                        <div class="col-md-4 border-right ">
                          <div class="card" style="width: 260px; height: 325px;">
                            <div class="card-body">
                              {{-- <img src="{{asset('images/avatar5.png')}}" alt=""><hr> --}}
                              <div id="image_preview" class="text-center">
                                <img src="/storage/profile_images/{{Auth::user()->profile_photo}}" alt="" class="img-fluid img-circle">
                              </div><hr>
                              {{-- <button class="btn btn-primary btn-rounded" style="width: 15em; ">Upload</button> --}}
                              {{-- <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div> --}}
                              {!! Form::open(['action' => 'FrontendController@uploadprofile', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                              <div class="clamp-name clamp-lines" >
                               {{-- <input type="file" id="uploadFile" name="uploadFile"/> --}}
                                 {{Form::file('uploadFile')}}
                              </div>
                              <hr>
                              <div>
                                {{-- <button class="btn btn-outline-primary btn-rounded btn-block mb-0 chngePass">Upload</button> --}}
                                <div class="form-group">
                                   
                                </div>
                                {{Form::submit('Upload', ['class' => 'btn btn-outline-primary btn-rounded btn-block mb-0'])}}
                            {!! Form::close() !!}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8">
                           <div class="card">
                            <div class="card-body">
                              <div class="container ml-4 mt-2 mb-0">
                          <form action="{{ action('FrontendController@accountEdit')}}" id="regForm" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                         
                          <div class="form-row form-group">
                            <div class="col-md-5" id="emailform" name="emailform">
                              <label>Email Address</label>
                              <input id="email1" type="email" class="form-control-plaintext border-bottom {{ $errors->has('email1') ? ' is-invalid' : '' }}" readonly name="email1"  value="{{Auth::user()->email}}" placeholder="Email Address" required>
                              @if ($errors->has('email1'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email1') }}</strong>
                                  </span>
                              @endif
                            </div>
                            <div class="col-md-5" id="mobile" name="mobile">
                              <label>Mobile Number</label>
                              <input id="mobile_no" type="text" class="form-control-plaintext border-bottom {{ $errors->has('mobile_no') ? ' is-invalid' : '' }}" readonly name="mobile_no" value="{{Auth::user()->mobile_number}}"  placeholder="9XXXXXXXXX" required >
                              @if ($errors->has('mobile_no'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('mobile_no') }}</strong>
                                  </span>
                              @endif
                            </div>
                          </div>
                          <div class="form-row  form-group " id="action1">
                            
                            <div class="col-md-10">
                              <button type="button" class="btn btn-info pull-right edit" id='edit1'>Edit Account</button>
                            </div>
                          </div>
                          <div class="form-row form-group mt-0"  id="actions">
                            <div class="col-md-5" id="btncancel" style="display: none;">
                              <button  type="button" class="btn btn-outline-danger cancel">Discard Changes</button>
                            </div>
                            <div class="col-md-5" id="btnsave" style="display: none;">
                              <button type="submit" class="btn btn-primary pull-right">Save Changes</button>  
                            </div>
                          </div>
                             
                        </form>
                        <form action="{{ action('FrontendController@changePassword')}}" method='POST'>
                        {{csrf_field()}}
                                <div class="form-row form-group" style="display: block;">
                           <div class="mt-2">
                              <p>To change password, enter your current password and new password below</p>
                           </div>
                            <div class="col-md-5">
                              <label>Current Password</label>
                              <input type="password" class="form-control-plaintext" name="current" id="current"  readonly placeholder="Current Password" > 
                            </div>
                          </div>
                          <div class="form-row form-group mb-4"  id="new">
                            <div class="col-md-5" >
                              <label>New Password</label>
                              <input type="password" class="form-control-plaintext" name="new_password" id="new_password" readonly placeholder="New Password" > 
                            </div>
                             <div class="col-md-5" id ="new3" >
                              <label>Confirm Password</label>
                              <input type="password" class="form-control-plaintext" name="rtype" id="rtype" readonly placeholder="Retype New Password" > 
                            </div>
                          </div>
                          <div class="form-row  form-group " id="edit2">
                            
                            <div class="col-md-10">
                              <button type="button" class="btn btn-info pull-right edit2" >Edit Account</button>
                            </div>
                          </div>
                          <div class="form-row form-group mt-0"  id="actions">
                            <div class="col-md-5" id="btncancel2" style="display: none;">
                              <button  type="button" class="btn btn-outline-danger cancel2">Discard Changes</button>
                            </div>
                            <div class="col-md-5" id="btnsave2" style="display: none;">
                              <button type="submit" class="btn btn-primary pull-right changePass">Save Changes</button>  
                            </div>
                          </div>

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
    $('#email1').prop('readonly', false);
    document.getElementById("email1").className = "form-control";
    $('#mobile_no').prop('readonly', false);
    document.getElementById("mobile_no").className = "form-control";

    var x = document.getElementById('edit1');
    x.style.display = "none";

    var y = document.getElementById('btnsave');
    y.style.display = "block";

    var y = document.getElementById('btncancel');
    y.style.display = "block";

  });

  $(document).on('click', '.edit2', function()
  {
    $('#new_password').prop('readonly', false);
    document.getElementById("new_password").className = "form-control";
    $('#rtype').prop('readonly', false);
    document.getElementById("rtype").className = "form-control";
    $('#current').prop('readonly', false);
    document.getElementById("current").className = "form-control";
    
    var y = document.getElementById('btnsave2');
    y.style.display = "block";

    var y = document.getElementById('btncancel2');
    y.style.display = "block";

    var x = document.getElementById('edit2');
    x.style.display = "none";

  });
  
  $(document).on('click', '.cancel2', function()
  {
    $('#new_password').prop('readonly', true);
    $('#new_password').val("");
    $('#rtype').val("");
    $('#current').val("");
    document.getElementById("new_password").className = "form-control-plaintext border-bottom";
    $('#rtype').prop('readonly', true);
    document.getElementById("rtype").className = "form-control-plaintext border-bottom";
    $('#current').prop('readonly', true);
    document.getElementById("current").className = "form-control-plaintext border-bottom";
    
    var y = document.getElementById('btnsave2');
    y.style.display = "none";

    var y = document.getElementById('btncancel2');
    y.style.display = "none";

    var x = document.getElementById('edit2');
    x.style.display = "block";
  });

  $(document).on('click', '.cancel', function()
  {

    $('#email1').prop('readonly', true);
    $('#email1').val("{{Auth::user()->email}}");
    document.getElementById("email1").className = "form-control-plaintext {{ $errors->has('email1') ? ' is-invalid' : '' }} border-bottom";
    $('#mobile_no').prop('readonly', true);
    $('#mobile_no').val("{{Auth::user()->mobile_number}}");
    document.getElementById("mobile_no").className = "form-control-plaintext {{ $errors->has('email1') ? ' is-invalid' : '' }} border-bottom";

    var y = document.getElementById('btnsave');
    y.style.display = "none";

    var y = document.getElementById('btncancel');
    y.style.display = "none";

    var x = document.getElementById('edit1');
    x.style.display = "block";
  });



  $("#uploadFile").change(function(){

     $('#image_preview').html("");
    
     var chk = $('#uploadFile').val();
     if(document.getElementById("uploadFile").files.length != 0)
     {
      
      var total_file=document.getElementById("uploadFile").files.length;

      for(var i=0;i<total_file;i++)

      {

        $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

      }
     }
     else
     {
       console.log('error!');
       $('#image_preview').append("<img src='"+"{{asset('images/user.jpg')}}"+"'>");
     }

  });
</script>
</html>