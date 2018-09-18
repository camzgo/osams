<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Upload Requirements | Pampanga Capitol</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

 
@include('inc.nav')


</div>
</nav>
<main>
  <section>
      <div class="container">
           <div class="card mt-4" style="width: 1000px; height: 500px; margin-left:4em;">
                <div class="card-body">
                     <div class="row justify-content-center">
                        <div class="text-center">
                            <h2 class="tx4">Upload Requirements</h2>
                        </div>
                    </div>
                    <hr>
                <form action="{{action('FrontendController@storeduploadeefap')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{-- {!! Form::open(['action' => 'FrontendController@uploadprofile', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
                        <div class="container">
                            <div class="form-row">
                               <div class="col-md-6">
                                    <label>Bio-data with 2x2 Picture</label>
                                    <div class="clamp-name clamp-lines" >
                                        <input type="file" name="biodata" required>
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid bio-data, it must be in pdf format.</small>
                               </div>
                               <div class="col-md-6">
                                    <label>Grades / Form 138</label>
                                    <div class="clamp-name clamp-lines" >
                                        <input type="file" name="grades" required accept="image/*">
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file.</small>
                               </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Certificate of Registration / Assessment Form</label>
                                    <div class="clamp-name clamp-lines" >
                                        <input type="file" name="cor" accept="image/*">
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file.</small>
                               </div>
                               <div class="col-md-6">
                                    <label>Barangay / Residency / Indigency Certificate</label>
                                    <div class="clamp-name clamp-lines" >
                                        <input type="file" name="brgy" required accept="image/*">
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file.</small>
                               </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Official Receipt</label>
                                    <div class="clamp-name clamp-lines" >
                                        <input type="file" name="or" required accept="image/*">
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file.</small>
                               </div>
                               <div class="col-md-6">
                                    <label>School ID</label>
                                    <div class="clamp-name clamp-lines" >
                                        <input type="file" name="oid" required accept="image/*">
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file.</small>
                               </div>
                            </div>
                            <hr>
                            <div class="form-row mt-2">
                                <div class="col-md-4 offset-md-8">
                                    <input type="submit" class="btn btn-outline-primary btn-rounded btn-block mb-0" value="Upload">
                                </div>
                            </div>
                                {{-- {{Form::submit('Upload', ['class' => 'btn btn-outline-primary btn-rounded btn-block mb-0'])}} --}}

                            </div>
                        </div>
                    </form>
                    {{-- {!! Form::close() !!} --}}

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