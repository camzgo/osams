<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Announcement | Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

 
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
           <div class="card mt-4" style="width: 1000px; height: 600px; margin-left:4em;">
                <div class="card-body">
                     <div class="row justify-content-center">
                        <div class="text-center ">
                            <h1 class="tx4">ANNOUNCEMENT</h1>
                        </div>
                        
                    </div>
                    <hr>

                    <div class="text-center">
                        <h3><strong>{{$ann->title}}</strong></h3>
                    </div>

                    <div class="mt-3">
                        <p>{{$ann->body}}</p>
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

</script>
</html>