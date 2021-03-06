<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="wassets/img/favicon.ico">

	<title>Scholarship</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<link rel="shortcut icon" href="{{{ asset('images/favicon.ico') }}}">

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<script src="{{asset('js/app.js')}}"></script>
	<link href="/wassets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/wassets/css/material-bootstrap-wizard.css" rel="stylesheet" />
</head>

<body class="bg-2">
	{{-- <!-- <div class="image-container set-full-height" style="background-image: url('priv/wassets/img/wizard-profile.jpg')"> --> --}}
	    <!--   Creative Tim Branding   -->
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-md-8 ">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" style="width: 80em;" data-color="green" id="wizardProfile">
		                    <form action="" method="">
								{{csrf_field()}}
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   EEFAP
		                        	</h3>
									<h5>This information will let us know more about you.</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#personal" data-toggle="tab">Personal Information</a></li>
			                            <li><a href="#guardian" data-toggle="tab">Guardian Information</a></li>
										<li><a href="#education" data-toggle="tab">Other Information</a></li>
										{{-- <li><a href="#references" data-toggle="tab">Character References</a></li> --}}
										<li><a href="#requirements" data-toggle="tab">Requirements</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="personal">
		                              <div class="container">
		                                	<div class="row container">
												{{-- <h4 class="tx1"><strong>Full Name</strong></h4> --}}
												<div class="col-md-3">
													<div class="form-group label-floating">
													<label class="control-label">Surname</label>
			                                        <input name="surname" type="text" class="form-control">
			                                        </div>
												</div>

												<div class="col-md-3">
													<div class="form-group label-floating">
													<label class="control-label">First Name</label>
													<input name="first_name" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
													  <label class="control-label">Middle Name</label>
													  <input name="middle_name" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group label-floating">
													  <label class="control-label">Suffix (e.g., Jr. Sr. III)</label>
													  <input name="suffix" type="text" class="form-control">
													</div>
												</div>
		                                	</div>
		                                	{{-- <div class="col-sm-10 col-sm-offset-1">
												<div class="input-group">
													<div class="form-group label-floating">
			                                            <label class="control-label">Email <small>(required)</small></label>
			                                            <input name="email" type="email" class="form-control">
			                                        </div>
												</div>
											</div> --}}
											<div class="row container">
												{{-- <h5 class="tx1"><strong>Address</strong></h5> --}}
												<div class = "col-md-2">
													<select name="district" id="district" data-val="true"  data-val-required="Please select District" data-dependent="municipality" class="form-control dynamic"  >
														<option value="" selected disabled>District (required)</option>
														@foreach ($district_list as $district)
															<option value="{{$district->district}}">{{$district->district}}</option>
														@endforeach
													</select>
												</div>
												<div class = "col-md-3">
													<select name="municipality" id="municipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="barangay" class="form-control dynamic"  >
														<option value="" selected disabled>Municipality (required)</option>
														{{-- @foreach ($municipal_list as $municipal)
															<option value="{{$municipal->municipality}}">{{$municipal->municipality}}</option>
														@endforeach --}}
													</select>
												</div>
												<div class="col-md-3">
													<select name="barangay" id="barangay" class="form-control dynamic">
														<option value="" selected disabled>Barangay (required)</option>
													</select>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
													  <label class="control-label">Street</label>
													  <input name="street" type="text" class="form-control">
													</div>
												</div>
											</div>

											<div class="row container">
												{{-- <h4 class="tx1"><strong>Contact</strong></h4> --}}
												<div class="col-md-2">
													<select name="gender" id="gender" class="form-control">
														<option value="" selected disabled>Gender (required)</option>
														<option value="Male">MALE</option>
														<option value="Female">FEMALE</option>
													</select>
												</div>
												<div class="col-md-2">
													<select name="civil_status" id="civil_status" class="form-control">
														<option value="" selected disabled>Civil Status (required)</option>
														<option value="Single">Single</option>
														<option value="Married">Married</option>
														<option value="Separated">Separated</option>
														<option value="Widowed">Widowed</option>
													</select>
												</div>
												<div class="col-md-3">
													<select name="nationality" id="nationality" class="form-control">
														<option value="" selected disabled>Citizenship (required)</option>
														<option value="Filipino">Filipino</option>
														<option value="Foreigner">Foreigner</option>
													</select>
												</div>
												<div class="col-md-4">
													<select name="religion" id="religion" class="form-control">
														<option value="" selected disabled>Religion (required)</option>
													</select>
												</div>

												{{-- <div class="col-md-2">
													<div class="form-group label-floating">
													<label class="control-label">School Enrolled <small>(required)</small></label>
													<input name="school_enrolled" id="school_enrolled" type="text" class="form-control">
													</div>
												</div> --}}
												{{-- 
												</div>
												<div class="col-md-4">
													<div class="form-group label-floating">
													<label class="control-label">School Enrolled <small>(required)</small></label>
													<input name="school_enrolled" id="school_enrolled" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group label-floating">
													<label class="control-label">Course/Program (No Abbreviation) <small>(required)</small></label>
													<input name="school_enrolled" id="school_enrolled" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group label-floating">
													<label class="control-label">Year Level <small>(required)</small></label>
													<input name="school_enrolled" id="school_enrolled" type="text" class="form-control">
													</div>
												</div> --}}
											</div>
											<div class="row container">
												<div class="col-md-2">
													<div class="input-group">
													<span class="input-group-addon">
														<small>Birth Date (required)</small>
													</span>
													{{-- <label class="control-label">Birth Date (required)</label> --}}
													<input type="date" name="bday" id="bday" class="form-control" data-provide="datepicker" />
												</div>
											</div>

												<div class="col-md-6" style="padding-left:170px;">
													<div class="form-group label-floating">
													  <label class="control-label">Place of Birth (required)</label>
													  <input name="bplace" type="text" class="form-control">
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group label-floating">
													<label class="control-label">9XX-XXX-XXXX <small>(required)</small></label>
													<input name="mobile_no" id="mobile_no" type="text" class="form-control">
													</div>
												</div>
											</div>
									
										</div>
		                            </div>
		                            <div class="tab-pane" id="guardian">
		                                <div class="container">
		                                	<div class="row container">
												<h6 class="tx1">Father's Name</h6>
												<div class="col-md-3">
													<div class="form-group label-floating">
			                                          <label class="control-label">Surname <small>(required)</small></label>
			                                          <input name="fsurname" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
			                                          <label class="control-label">First Name <small>(required)</small></label>
			                                          <input name="ffirst_name" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
			                                          <label class="control-label">Middle Name</label>
			                                          <input name="fmiddle_name" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="col-md-2">
													<div class="form-group label-floating">
													  <label class="control-label">Suffix (e.g., Jr. Sr. III)</label>
													  <input name="fsuffix" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="row container">
												<h6 class="tx1">Mother's Name</h6>
												<div class="col-md-3">
													<div class="form-group label-floating">
			                                          <label class="control-label">Surname <small>(required)</small></label>
			                                          <input name="msurname" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
			                                          <label class="control-label">First Name <small>(required)</small></label>
			                                          <input name="mfirst_name" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
			                                          <label class="control-label">Middle Name</label>
			                                          <input name="mmiddle_name" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="col-md-2">
													<div class="form-group label-floating">
													  <label class="control-label">Suffix (e.g., Jr. Sr. III)</label>
													  <input name="msuffix" type="text" class="form-control">
													</div>
												</div>
											</div>
											{{-- <div class="row container">
												<div class = "col-md-3">
													<select name="pmunicipality" id="pmunicipality" data-val="true"  data-val-required="Please select Municipality" data-dependent="pbarangay" class="form-control ppdynamic"  >
														<option value="" selected disabled>Municipality (required)</option>
														@foreach ($municipal_list as $municipal)
															<option value="{{$municipal->municipality}}">{{$municipal->municipality}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3">
													<select name="pbarangay" id="pbarangay" class="form-control ppdynamic">
														<option value="" selected disabled>Barangay (required)</option>
													</select>
												</div>
												<div class="col-md-5">
													<div class="form-group label-floating">
													  <label class="control-label">Street</label>
													  <input name="street" type="text" class="form-control">
													</div>
												</div>
											</div>  --}}
										

											<div class="row container">
												<div class="col-md-3">
													<div class="form-group label-floating">
													  <label class="control-label">Father's Occupation <small>(required)</small></label>
													  <input name="foccupation" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
													  <label class="control-label">Mother's Occupation <small>(required)</small></label>
													  <input name="moccupation" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-5">
													<div class="form-group label-floating">
													  <input name="paddress" type="text" class="form-control" placeholder="Address (Street, Village Subdivision, Municipality) (required)">
													</div>
												</div>
											</div>
										</div>
		                                
		                            </div>
		                            <div class="tab-pane" id="education">
										<div class="container">
		                                	<div class="row container">
												<h6 class="tx1">Educational Information</h6>
												<div class="col-md-4">
													<div class="form-group label-floating">
													<label class="control-label">School Enrolled <small>(required)</small></label>
													<input name="school_enrolled" id="school_enrolled" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group label-floating">
													<label class="control-label">Course/Program (No Abbreviation) <small>(required)</small></label>
													<input name="course" id="course" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group label-floating">
													<label class="control-label">Year Level <small>(required)</small></label>
													<input name="year_level" id="year_level" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="row container">
												<h6 class="tx1">In case of emergency</h6>
												<div class="col-md-4">
													<div class="form-group label-floating">
													<label class="control-label">Person to be contacted in case of emergency <small>(required)</small></label>
													<input name="emergency" id="emergency" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
													<label class="control-label">9XX-XXX-XXXX <small>(required)</small></label>
													<input name="mobile_no" id="mobile_no" type="text" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div>
									{{-- <div class="tab-pane" id="references">
										<div class="container">
											<div class="row container">
												<div class="col-md-4">
													<h5 class="tx1">Name</h5>
												</div>
												<div class="col-md-3">
													<h5 class="tx1">Occupation</h5>
												</div>
												<div class="col-md-4">
													<h5 class="tx1">Address</h5>
												</div>
											</div>
											<div class="row container">
												<div class="col-md-4">
													<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input name="emergency" id="emergency" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group label-floating">
													<label class="control-label">Occupation</label>
													<input name="emergency" id="emergency" type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input name="emergency" id="emergency" type="text" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div> --}}
									<div class="tab-pane" id="requirements">
		                                
		                                <div class="row">
											
											{{-- <div class="col-sm-offset-2">
												<div class="vcard" style="height:20px; width:250px;">
												<div class="vcard-title">PANEL!</div>
											</div>
											</div>
											 --}}

											<div id="mode">
											<h4 class="info-text">Choose mode of submission:</h4>
		                                   	<div class="col-sm-12 col-sm-offset-2" >
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox" onclick="online()">
		                                                <input type="radio" name="jobb" value="Code">
		                                                <div class="icon">
		                                                    <i class="fa fa-globe"></i>
		                                                </div>
		                                                <h4><strong>ONLINE</strong></h4>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox" onclick="office()">
		                                                <input type="radio" name="jobb" value="Develop">
		                                                <div class="icon">
		                                                    <i class="fa fa-building-o"></i>
		                                                </div>
		                                                <h4><strong>OFFICE</strong></h4>
		                                            </div>
		                                        </div>
											</div> <!--end of div button-->
										</div>
											
											<div class="container" id="office">
												<div class="row container">
													<div class="row">
													<div class="mov"><div class="btn btn-danger btn-sm" onclick="goback()">Go Back</div></div>													
													</div>
												</div>
												<div class="row container">
													<div class="col-md-12">

													<div class="col-md-4">
														<div class="vcard" style="width: 30rem;">
														<div class="vcard-header"><strong>Reminder</strong></div>
														<div class="vcard-body">
															<p>Before you submit your requirements to the Provincial Capitol be sure that all of your requirements are complete.</p>
														</div>
														</div>
													</div>
													<div class="col-md-6">
														<ul class="list-group">
															<li class="list-group-item active">Requirements</li>
															<li class="list-group-item"><span class="fa fa-check"></span> Dapibus ac facilisis in</li>
															<li class="list-group-item">Morbi leo risus</li>
															<li class="list-group-item">Porta ac consectetur ac</li>
															<li class="list-group-item">Vestibulum at eros</li>
														</ul>
													</div>
													</div>
													
												</div>
												
											</div>

											<div class="container" id="online">
												<div class="row container">
													<div class="row">
													<div class="mov"><div class="btn btn-danger btn-sm" onclick="goback()">Go Back</div></div>													
													</div>
												</div>
												<div class="row container">
													<div class="col-md-12">

													<div class="col-md-4">
														<div class="vcard" style="width: 30rem;">
														<div class="vcard-header"><strong>Reminder</strong></div>
														<div class="vcard-body">
															<p>Even though you submit your requirements online you also need to pass the original copy of your documents for authentication.</p>
														</div>
														</div>
													</div>
													<div class="col-md-6">
														<ul class="list-group">
															<li class="list-group-item active"><strong>Requirements</strong></li>
															<li class="list-group-item">Dapibus ac facilisis in <input type="text"/></li>
															<li class="list-group-item">Morbi leo risus</li>
															<li class="list-group-item">Porta ac consectetur ac</li>
															<li class="list-group-item">Vestibulum at eros</li>
														</ul>
													</div>
													</div>
													
												</div>
												
											</div>

		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
		                                <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
								</div>
								
		                    </form>
		                </div>
					</div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->

	</div>

</body>

	<script>
		$(document).ready(function(){
			$('#mobile_no').mask('0000000000', {"clearIncomplete": true});
			$('#gmobile_no').mask('0000000000', {"clearIncomplete": true});

			var x = document.getElementById("online");
			x.style.display = "none"
			var y = document.getElementById("office");
			y.style.display = "none"

		});


		$(document).ready(function(){
			$('.dynamic').change(function(){
				var z = $('#district').val();
				console.log(z);
				var x = $('#municipality').val();
				console.log(x);
				console.log($('#barangay').val());
				if($(this).val() != '')
				{
				var select = $(this).attr("id");
				var value = $(this).val();
				var dependent = $(this).data('dependent');
				var _token = $('input[name="_token"]').val();
				$.ajax({
				url:"{{ route('eefap.fetch') }}",
				method:"POST",
				data:{select:select, value:value, _token:_token, dependent:dependent},
				success:function(result)
				{
				$('#'+dependent).html(result);
				}

				})
				}
			});

			$('#district').change(function(){
				$('#municipality').val('');
				$('#barangay').val('');
			});
			$('#municipality').change(function(){
				$('#barangay').val('');
			});

		});

		$(document).ready(function(){
		$('.ppdynamic').change(function(){
				var x = $('#pmunicipality').val();
				console.log(x);
				console.log($('#pbarangay').val());
				if($(this).val() != '')
				{
				var select2 = $(this).attr("id");
				var value2 = $(this).val();
				var dependent2 = $(this).data('dependent');
				var _token2 = $('input[name="_token"]').val();
				$.ajax({
				url:"{{ route('pcl.fetch') }}",
				method:"POST",
				data:{select2:select2, value2:value2, _token2:_token2, dependent2:dependent2},
				success:function(result)
				{
				$('#'+dependent2).html(result);
				}

				})
				}
			});

			$('#pmunicipality').change(function(){
				$('#pbarangay').val('');
			});
			});

		function online()
		{
			var x = document.getElementById("online");
			if (x.style.display === "none") {
				x.style.display = "block";
			}
			var y = document.getElementById("mode");
			y.style.display = "none";
		}

		function office()
		{
			var x = document.getElementById("office");
			if (x.style.display === "none") {
				x.style.display = "block";
			}
			var y = document.getElementById("mode");
			y.style.display = "none";
		}

		function goback()
		{
			var x = document.getElementById("mode");
			if (x.style.display === "none") {
				x.style.display = "block";
			}
			var y = document.getElementById("office");
			y.style.display = "none";
			var z = document.getElementById("online");
			z.style.display = "none";
		}

	</script>
	<!--   Core JS Files   -->
    {{-- <script src="../wassets/js/jquery-2.2.4.min.js" type="text/javascript"></script> --}}
	<script src="../wassets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../wassets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="../wassets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="../wassets/js/jquery.validate.min.js"></script>

	<script src="{{ URL::asset('data/religion-pcl.js') }}" type="text/javascript"></script>

</html>
