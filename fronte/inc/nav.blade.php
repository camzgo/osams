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
        <a class="nav-link" href="/faqs"><strong>FAQs</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sitemap"><strong>Site Map</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact"><strong>Contact Us</strong></a>
      </li>
      {{-- <li class="nav-item dropdown"> 
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <strong>Downloads</strong> <span class="caret"></span>
        </a>

        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/profile">View Dashboard
            </a>
            
        </div>
      </li> --}}
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