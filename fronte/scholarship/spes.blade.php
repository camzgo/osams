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


            <div class="" id="sp">
              <div class="row form-group">
                <div class="col-md-6 offset-md-3 mt-4 justify-content-center">
                  <div>
                    <div class="container mt-4" style="height: 200px;">
                      <div class="justify-content-center">
                      <h4>Are you an SPES Recipient?</h4>
                      <select name="spes" id="spes" class="form-control form-control-lg shadow-sm" >
                        <option value="" selected disabled>--Select--</option>
                        <option value="YES">Yes, I am an SPES Recipient</option>
                        <option value="NO">No, I am not an SPES Recipient</option>
                      </select>
                      <small>We need to make sure that you are not an spes recipient. We have a list of spes recipients.</small>
                      <br><br>
                      <button class="btn btn-primary pull-right" type="button" onclick="speschk()"><i class="fa fa-arrow-right"></i> SUBMIT</button>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="ghost" id="warn">
              <div class="row form-group">
                <div class="col-md-12 mt-4 justify-content-center">
                  <div>
                    <div class=" mt-4" style="height: 150px; width:100%;">
                      <div class="alert alert-danger">
                        <h4><i class="fa fa-warning"></i><strong> You are not allowed</strong> to apply for this scholarship category or any of this categories because you are an SPES recipients.</h4>
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
function speschk()
{
  var spes = $('#spes').val();

   var pathname = window.location.pathname;
  var parts = pathname.split('/');
  console.log(parts[3]);

  var sid = parts[3];
  
  if(spes == "YES")
  {
    switch (sid){
      case "1" : 
        window.location = '/scholarship/ncw';
        break;
      case "2" : 
        window.location = '/scholarship/gad';
        break;
      case "3" : 
        window.location = '/scholarship/vg-oldnew';
        break;
      case "4" : 
        window.location = '/scholarship/graduate-public';
        break;  
      case "5" : 
        window.location = '/scholarship/graduate-private';
        break;
      case "6" : 
        window.location = '/scholarship/pcl';
        break;
      case "7" : 
        window.location = '/scholarship/vg-dhvtsu';
        break;
      case "8" : 
        window.location = '/scholarship/honor-rank';
        break;
      default:
      break;
    }

  }
  else if (spes == "NO")
  {
    $('#sp').addClass('ghost');
    $('#warn').removeClass('ghost');
  }
}


</script>
</body>
</html>
