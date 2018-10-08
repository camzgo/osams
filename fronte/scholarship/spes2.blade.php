<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Pampanga Capitol | Online Scholarship Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>

  
</head>


<body>
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





    <!-- Main content -->
     <div class="content mt-5">
      <div class="container">
         <div class="card">
          <div class="card-body">
            <div class="" id="warn">
              <div class="row form-group">
                <div class="col-md-12 mt-4 justify-content-center">
                  <div>
                    <div class=" mt-4" style="height: 150px; width:100%;">
                      <div class="alert alert-danger">
                        <h4><i class="fa fa-warning"></i><strong> You are not allowed</strong> to apply for this scholarship category or any of these categories because you are an SPES recipients.</h4>
                      </div>
                      <a href="/" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Close</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
  {{-- </div>
</div>
</div>

</div>
</div> --}}
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
        
</div>
<script>

</script>
</body>
</html>
