<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>FAQs | Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
</head>

 
  <nav class="navbar navbar-expand-lg navbar-dark py-3" style="height: 6em;   position: relative;
    background: linear-gradient(80deg, #004280 0, #001a33 100%)
    ">
    <div class="container">
 <a class="navbar-brand" href="/">
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
        <a class="nav-link" href="/"><strong>Home</strong><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about"><strong>About Us</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/faqs"><strong>FAQs</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sitemap"><strong>Site Map</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact"><strong>Contact Us</strong></a>
      </li>
    </ul>
    {{-- <ul class="navbar-nav ml-auto align-items-lg-center">
      <li class="nav-item mr-0">
          <a data-toggle="modal" data-target="#sign-up-modal" class="btn  d-none d-lg-inline-flex text-white" role="button"><strong>Sign up</strong></a>
      </li>
      <li class="nav-item mr-0">
          <a data-toggle="modal" data-target="#login-modal" style="width: 8em;  font-size: .90rem;" class="btn btn-sm btn-white btn-rounded " role="button">
              <i class="fa fa-sign-in"></i>&nbsp <strong>Sign In</strong>
          </a>
      </li>
    </ul> --}}

    <ul class="navbar-nav ml-auto align-items-lg-center">
                <!-- Authentication Links -->
        @guest
            
            <li class="nav-item mr-0">
                <a href="/signup" class="btn d-none d-lg-inline-flex text-white" role="button" href="{{ route('register') }}"><strong>Sign up</strong></a>
            </li>
            <li class="nav-item mr-0">
                <a data-toggle="modal" data-target="#login-modal" style="width: 8em;  font-size: .90rem;" class="btn btn-sm btn-white btn-rounded " role="button" href="{{ route('login') }}"><i class="fa fa-sign-in"></i>&nbsp; <strong>Sign In</strong></a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   <img src="/storage/profile_images/{{Auth::user()->profile_photo}}" class="inset mr-2" alt="User Image">  <strong> {{ Auth::user()->first_name}} {{ Auth::user()->surname}}</strong> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profile">View Dashboard
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @CSRF
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </div>
</div>
</nav>
<main>
    {{-- <div class="">
      <img src="/images/capitol.jpg" style="width: 100%; height:100%" alt="">
    </div> --}}
    <section class="slice slice-lg bg-grad1 py-5" data-separator-orientation="bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="display-4 text-white">FAQs</div>
            <h5 class="mb-4 text-white">Frequently Asked Questions</h5>
          </div>
        </div>
      </div>
    </section>
    <section class="slice slice-lg" Style="background-color: #FFFFFF;">
      <div class="container">
        <div class="row row-grid">
          <div class="col">
            <div class="">
              @if(count($faq) > 0)
                @foreach($faq as $faqs)
                  <div class="py-3 border-bottom">
                  <h5 class="mb-3">Q: {{$faqs->question}}</h5>
                      <p class=" mb-0"> {{$faqs->answer}}</p>
                  </div>
                @endforeach
                  
              @else
                  <p>No data found!</p>
              @endif
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
</html>