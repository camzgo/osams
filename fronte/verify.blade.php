<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Verify your Account | Pampanga Capitol</title>
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

</style>
 
<nav class="navbar navbar-expand-lg navbar-dark py-3" style="height: 6em;   position: relative;
    background: linear-gradient(80deg, #004280 0, #001a33 100%)">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/added/img/icons/logo.png" class="mr-4" width="50px" alt="">
            <strong>Online Scholarship Application</strong>
            {{-- <img  class="mr-4" style="width: 50px;"> --}}
        </a>


</div>
</nav>
<main>
  <section>
      <div class="container">
           <div class="card  mt-4" >
                <div class="card-body">
                    {{-- @foreach ($errors->all() as $error)
                          <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                        @endforeach --}}
                     <div class="row justify-content-center">
                        <div class="">
                            <h3 class="tx4">Verify your account</h3>
                        </div>
                    </div>
                    <hr>
               
                    <div class="container">
                        @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{Session::get('error')}}
                                </div>
                                @endif
                        <div class="form-row">
                            <div class="col-md-12">
                              <form action=" {{route('verify')}}" method="post">
                                <div class=" row mt-4 justify-content-center">
                                    <h5 class="mt-2">Activation Code: </h5>
                                
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" id="code" class="form-control form-control-lg {{$errors->has('code') ? 'is-invalid' : '' }}" name="code" required autofocus>
                                                {{-- @if ($errors->has('code'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('code') }}</strong>
                                                    </span>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <div class="form-row">

                                                <div class="col-md-6">

                                                    <a href="/verify/new" role="button" class=" btn btn-block btn-success mt-4">Request new code</a>
                                                    
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    
                                                    @csrf
                                                    <button type="submit" class="pull-right btn btn-block btn-primary mt-4">Verify</button>
                                                    </form>
                                                </div>
 
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-5">
                                        
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

</script>
</html>