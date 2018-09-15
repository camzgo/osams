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
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                  <div class="text-bold">
                    <span class="fa fa-user"></span> &nbsp;
                    <span>My Profile</span>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between px-4 bg-secondary">
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
                <div class="card-title"><div class="boldtx alert alert-info" role="alert"><i class="fa fa-graduation-cap"></i> My Scholarship</div></div><hr>
                @if($ck=="show")
                <a class="card " href="scholarship/details">
                  <div class="card-body" style="weight: 100% height: 500px;">
                    <div class="row">
                      <div class="col-md-8">
                        <h5 class="boldtx"><strong>{{$scholar->scholarship_name}}</strong></h5>
                      </div>
                      <div class="col-md-4">
                        <h4><span class="badge badge-warning text-white pull-right">Pending</span></h4>
                      </div>
                    </div>
                    
                    

                  </div>
                </a>
                @else
                <h4>You don't have application!</h4>
                    @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   <section class="slice slice-xxl"></section>
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