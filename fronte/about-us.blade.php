<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>About Us - Pampanga Capitol</title>
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
        <a class="nav-link active" href="#"><strong>About Us</strong></a>
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
      @guest
        <li class="nav-item mr-0">
            <a  class="btn d-none d-lg-inline-flex text-white" role="button" href="{{ route('register') }}"><strong>Sign up</strong></a>
        </li>
        <li class="nav-item mr-0">
            <a style="width: 8em;  font-size: .90rem;" class="btn btn-sm btn-white btn-rounded " role="button" href="{{ route('login') }}"><i class="fa fa-sign-in"></i>&nbsp; <strong>Sign In</strong></a>
        </li>
      @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
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
            <div class="display-4 text-white"><strong>About Us</strong></div>
            <h5 class="mb-4 text-white">History Vision  Mission</h5>
          </div>
        </div>
      </div>
    </section>
  <section class="slice slice-lg">
    <div class="row row-grid">
      <div class="container">
        <div class="">
        <h1><strong>HISTORY</strong></h1>
      </div>
      </div>
      
  </div>
    <div class="row row-grid border-bottom">
      <div class="container">
        <p>Pampanga was founded by the Spanish conquistador, Martín de Goiti, in 1571. The name was derived from the native Kapampangan words 
        "pangpang ilog" meaning "riverside" where the early Malayan settlements were concentrated along the Rio Grande de la Pampanga. Kapampangan 
        men are known for their gallantry and leadership while Kapampangan women are famous for their beauty and skill in culinary arts. Pampanga,
        one of the richest provinces in the Philippines, was re-organized as a province by the Spaniards on December 11, 1571. For governmental 
        control and taxation purposes, the Spanish authorities subdivided Pampanga into towns (pueblos), which were further subdivided into districts
        (barrios) and in some cases, into royal and private estates (encomiendas). Ancient Pampanga's territorial area used to include portions of the 
        provinces of Bataan, Bulacan, Nueva Ecija, Pangasinan, Tarlac, and Zambales in the big Island of Luzon of the Philippine Archipelago</p>
      </div>
      
    </div>
    </div>

    <div class="row row-grid mt-4">
      <div class="container">
        <div class="">
        <h1><strong>VISION</strong></h1>
      </div>
      </div>
      
  </div>
    <div class="row row-grid border-bottom">
      <div class="container">
        <p>Pampanga was founded by the Spanish conquistador, Martín de Goiti, in 1571. The name was derived from the native Kapampangan words 
        "pangpang ilog" meaning "riverside" where the early Malayan settlements were concentrated along the Rio Grande de la Pampanga. Kapampangan 
        men are known for their gallantry and leadership while Kapampangan women are famous for their beauty and skill in culinary arts. Pampanga,
        one of the richest provinces in the Philippines, was re-organized as a province by the Spaniards on December 11, 1571. For governmental 
        control and taxation purposes, the Spanish authorities subdivided Pampanga into towns (pueblos), which were further subdivided into districts
        (barrios) and in some cases, into royal and private estates (encomiendas). Ancient Pampanga's territorial area used to include portions of the 
        provinces of Bataan, Bulacan, Nueva Ecija, Pangasinan, Tarlac, and Zambales in the big Island of Luzon of the Philippine Archipelago</p>
      </div>
      
    </div>
    </div>

    <div class="row row-grid mt-4">
      <div class="container">
        <div class="">
        <h1><strong>MISSION</strong></h1>
      </div>
      </div>
      
  </div>
    <div class="row row-grid border-bottom">
      <div class="container">
        <p>Pampanga was founded by the Spanish conquistador, Martín de Goiti, in 1571. The name was derived from the native Kapampangan words 
        "pangpang ilog" meaning "riverside" where the early Malayan settlements were concentrated along the Rio Grande de la Pampanga. Kapampangan 
        men are known for their gallantry and leadership while Kapampangan women are famous for their beauty and skill in culinary arts. Pampanga,
        one of the richest provinces in the Philippines, was re-organized as a province by the Spaniards on December 11, 1571. For governmental 
        control and taxation purposes, the Spanish authorities subdivided Pampanga into towns (pueblos), which were further subdivided into districts
        (barrios) and in some cases, into royal and private estates (encomiendas). Ancient Pampanga's territorial area used to include portions of the 
        provinces of Bataan, Bulacan, Nueva Ecija, Pangasinan, Tarlac, and Zambales in the big Island of Luzon of the Philippine Archipelago</p>
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