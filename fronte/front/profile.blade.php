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
                  <div class="card-title"><div class="alert alert-info" role="alert">My Profile</div></div><hr>

                  <div>
                    <div class="card-deck">
                      <div class="card shdow">
                        <img src="{{asset('images/user1.jpg')}}" alt="Card-Image" class="card-img-top" style="width:100%">
                        <div class="card-body">
                          <div class="card-title text-center text-bold" style="font-size: 17px;">Personal Information</div>
                          <div class="card-text">
                            <a href="{{$perUrl[0]}}" class="btn btn-primary btn-rounded text-center" style="width: 12em; margin-left:4em;"><strong>{{$perUrl[1]}}</strong></a>
                          </div>
                        </div>
                      </div>
                      
                      <div class="card shdow">
                        <img src="{{asset('images/guardian.jpg')}}" alt="Card-Image" class="card-img-top" style="width:100%">
                        <div class="card-body">
                          <div class="card-title text-center text-bold" style="font-size: 17px;"><strong>Parents / Guardian Information </strong></div>
                          <div class="card-text mt-2">
                            <a href="{{$gurUrl[0]}}" class="btn btn-primary btn-rounded text-center " style="width: 12em; margin-left:4em;"><strong>{{$gurUrl[1]}}</strong></a>
                          </div>
                        </div>
                      </div>

                      <div class="card shdow">
                        <img src="{{asset('images/school1.jpg')}}" alt="Card-Image" class="card-img-top" style="width:100%">
                        <div class="card-body">
                          <div class="card-title text-center text-bold" style="font-size: 17px;">Educational Information </div>
                          <div class="card-text mt-2">
                            <a href="{{$eduUrl[0]}}" class="btn btn-primary btn-rounded text-center " style="width: 12em; margin-left:4em;"><strong>{{$eduUrl[1]}}</strong></a>
                          </div>
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