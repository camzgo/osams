<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <title>Pampanga Capitol | Online Scholarship Application and Management System</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  
</head>
<body class="">
<div class="wrapper" id="app">
  <!-- Navbar -->
  <!-- /.navbar -->



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="content">
      <div class="container-fluid">
        <div class="container"> 
            <div class="card mt-5">
                <div class="card-header" id="">
                    <h3 class="boldtx">Application Information</h3>
                </div>
                <div class="card-body"> 
                  
                    <!--EEFAP-->
                    @if($scholar->type == "eefap")
                    <div class="form-row form-group">
                        <div class="col-md-4">
                            <label>Date: </label>
                            <input type="text" class="form-control-plaintext" readonly id="date" value="{{$application->created_at}}"name="date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Full Name: </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->first_name}} {{$eefap->middle_name}} {{$eefap->surname}} {{$eefap->suffix}} readonly id="fullname" name="fullname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Mobile Number: </label>
                            <input type="text" class="form-control-plaintext" value="0{{$eefap->mobile_number}}" readonly id="mobile_no" name="mobile_no">
                        </div>
                        <div class="col-md-6">
                            <label>Facebook Account: </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->fb_account}}" readonly id="fb_accnt" name="fb_accnt">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Address: </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->street}} {{$eefap->barangay}} {{$eefap->municipality}}"readonly id="address" name="address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Guardian Name: </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->gfirst_name}} {{$eefap->middle_name}} {{$eefap->surname}} {{$eefap->suffix}} "readonly id="gname" name="gname">
                        </div>
                        <div class="col-md-4">
                            <label>Mobile Number </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->mobile_number}}" readonly id="gmobile_no" name="gmobile_no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>College / University Name: </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->college_name}}" readonly id="college_name" name="college_name">
                        </div>
                        <div class="col-md-6">
                            <label>College / University Address: </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->college_address}}" readonly id="college_address" name="college_address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Course / Program: </label>
                            <input type="text" class="form-control-plaintext" value="{{$eefap->course}}" readonly id="course" name="course">
                        </div>
                        <div class="col-md-6">
                            <label>Major: </label>
                            <input type="text" class="form-control-plaintext" readonly id="major" value="{{$eefap->major}}" name="major">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label>Education Program: </label>
                            <input type="text" class="form-control-plaintext" readonly id="educ_prog" value="{{$eefap->program_type}}" name="educ_prog">
                        </div>
                        <div class="col-md-3">
                            <label>Year Level: </label>
                            <input type="text" class="form-control-plaintext" readonly id="yr_lvl"  value="{{$eefap->year_level}}" name="yr_lvl">
                        </div>
                        <div class="col-md-3">
                            <label>Graduating: </label>
                            <input type="text" class="form-control-plaintext" readonly id="grad" value="{{$eefap->graduating}}" name="grad">
                        </div>
                        <div class="col-md-3">
                            <label>General Average: </label>
                            <input type="text" class="form-control-plaintext" readonly id="gen_ave" value="{{$eefap->general_average}}" name="gen_ave">
                        </div>
                    </div>
                    {{-- <div class="form-row">
                        <div class="col-md-4">
                            <label>I certify that: </label>
                            @if($eefap->spes == "YES")
                            <input type="text" class="form-control-plaintext" readonly id="spes" value="{{$eefap->spes}}, I am SPES Recipient" name="spes">
                            @else
                            <input type="text" class="form-control-plaintext" readonly id="spes" value="{{$eefap->spes}}, I am not SPES Recipient" name="spes">
                            @endif
                        </div>
                    </div> --}}
                    @endif
                    <!--end-->



                    <!--gv-->
                    @if($scholar->type=="eefap-gv")
                    <div class="form-row form-group">
                        <div class="col-md-4">
                            <label>Date: </label>
                            <input type="text" class="form-control-plaintext" readonly id="date" value="{{$application->created_at}}" name="date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Full Name: </label>
                            <input type="text" class="form-control-plaintext" readonly id="fullname" value="{{$eefapgv->first_name}} {{$eefapgv->middle_name}} {{$eefapgv->surname}} {{$eefapgv->suffix}}" name="fullname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label>Mobile Number: </label>
                            <input type="text" class="form-control-plaintext" readonly id="mobile_no" value="0{{$eefapgv->mobile_number}}" name="mobile_no">
                        </div>
                        <div class="col-md-8">
                            <label>Address: </label>
                            <input type="text" class="form-control-plaintext" readonly id="address" value="{{$eefapgv->street}} {{$eefapgv->barangay}} {{$eefapgv->municipality}}" name="address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>College / University Name: </label>
                            <input type="text" class="form-control-plaintext" readonly id="college_name" value="{{$eefapgv->college_name}}" name="college_name">
                        </div>
                        <div class="col-md-6">
                            <label>College / University Address: </label>
                            <input type="text" class="form-control-plaintext" readonly id="college_address" value="{{$eefapgv->college_address}}" name="college_address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Course / Program: </label>
                            <input type="text" class="form-control-plaintext" readonly id="course" value="{{$eefapgv->course}}" name="course">
                        </div>
                        <div class="col-md-6">
                            <label>Major: </label>
                            <input type="text" class="form-control-plaintext" readonly id="major" name="major" value="{{$eefapgv->major}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label>Education Program: </label>
                            <input type="text" class="form-control-plaintext" readonly id="educ_prog" name="educ_prog" value="{{$eefapgv->program_type}}">
                        </div>
                        <div class="col-md-3">
                            <label>Year Level: </label>
                            <input type="text" class="form-control-plaintext" readonly id="yr_lvl" name="yr_lvl" value="{{$eefapgv->year_level}}">
                        </div>
                        <div class="col-md-3">
                            <label>Graduating: </label>
                            <input type="text" class="form-control-plaintext" readonly id="grad" name="grad" value="{{$eefapgv->graduating}}">
                        </div>
                        <div class="col-md-3">
                            <label>General Average: </label>
                            <input type="text" class="form-control-plaintext" readonly id="gen_ave" name="gen_ave" value="{{$eefapgv->general_average}}">
                        </div>
                    </div>
                    <div class="form-row">
                        {{-- <div class="col-md-4">
                            <label>I certify that: </label>
                            @if($eefapgv->spes == "YES")
                            <input type="text" class="form-control-plaintext" readonly id="spes" name="spes" value="{{$eefapgv->spes}}, I am SPES Recipient">
                            @else
                            <input type="text" class="form-control-plaintext" readonly id="spes" name="spes" value="{{$eefapgv->spes}}, I am not SPES Recipient">
                            @endif
                        </div> --}}
                        <div class="col-md-4">
                            <label>Awards Received / Rank: </label>
                            <input type="text" class="form-control-plaintext" readonly id="award" name="award" value="{{$eefapgv->awards}}">
                        </div>
                    </div> 
                    @endif
                    <!--end-->




                    <!--PCL-->
                    @if($scholar->type == "pcl")
                    <div class="form-row form-group">
                        <div class="col-md-4">
                            <label>Date: </label>
                            <input type="text" class="form-control-plaintext" readonly id="date" name="date" value="{{$application->created_at}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Full Name: </label>
                            <input type="text" class="form-control-plaintext" readonly id="fullname" value="{{$pcl->first_name}} {{$pcl->middle_name}} {{$pcl->surname}} {{$pcl->suffix}} name="fullname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Address: </label>
                            <input type="text" class="form-control-plaintext" readonly id="address" value="{{$pcl->street}} {{$pcl->barangay}} {{$pcl->municipality}}" name="address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label>Mobile Number: </label>
                            <input type="text" class="form-control-plaintext" readonly id="mobile_no" value="{{$pcl->mobile_number}}" name="mobile_no">
                        </div>
                        <div class="col-md-4">
                            <label>Year Level: </label>
                            <input type="text" class="form-control-plaintext" readonly id="yr_lvl" name="yr_lvl" value="{{$pcl->year_level}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>School Enrolled: </label>
                            <input type="text" class="form-control-plaintext" readonly id="college_name" value={{$pcl->school_enrolled}} name="college_name">
                        </div>
                        <div class="col-md-6">
                            <label>Course: </label>
                            <input type="text" class="form-control-plaintext" readonly id="course" name="course" value="{{$pcl->course}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2">
                            <label>Gender: </label>
                            <input type="text" class="form-control-plaintext" readonly id="gender" name="gender" value="{{$pcl->gender}}">
                        </div>
                        <div class="col-md-3">
                            <label>Civil Status: </label>
                            <input type="text" class="form-control-plaintext" readonly id="civil_status" name="civil_status" value="{{$pcl->civil_status}}">
                        </div>
                        <div class="col-md-3">
                            <label>Birthday: </label>
                            <input type="text" class="form-control-plaintext" readonly id="bday" name="bday" value="{{$pcl->birthdate}}">
                        </div>
                        <div class="col-md-4">
                            <label>Place of Birth: </label>
                            <input type="text" class="form-control-plaintext" readonly id="bplace" name="bplace" value="{{$pcl->birth_place}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Father's Name: </label>
                            <input type="text" class="form-control-plaintext" readonly id="fname" name="fname"  value="{{$pcl->ffirst_name}} {{$pcl->fmiddle_name}} {{$pcl->fsurname}} {{$pcl->fsuffix}}">
                        </div>
                        <div class="col-md-6">
                            <label>Occupation: </label>
                            <input type="text" class="form-control-plaintext" readonly id="foccupation" value="{{$pcl->foccupation}}" name="foccupation">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Mother's Name: </label>
                            <input type="text" class="form-control-plaintext" readonly id="mname" name="mname"  value="{{$pcl->mfirst_name}} {{$pcl->mmiddle_name}} {{$pcl->msurname}} {{$pcl->msuffix}}>
                        </div>
                        <div class="col-md-6">
                            <label>Occupation: </label>
                            <input type="text" class="form-control-plaintext" readonly id="moccupation" name="moccupation" value="{{$pcl->moccupation}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Address: </label>
                            <input type="text" class="form-control-plaintext" readonly id="gaddress" name="gaddress" value="{{$pcl->address}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Person to be contacted in case of emergency: </label>
                            <input type="text" class="form-control-plaintext" readonly id="emergency" name="emergency" value="{{$pcl->emergency}}">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile Number: </label>
                            <input type="text" class="form-control-plaintext" readonly id="gmobile_no" name="gmobile_no" value="{{$pcl->emobile_number}}">
                        </div>
                    </div>
                    @endif
                    <!--end!-->

                <br />
                <br />

                <div class="pull-right">
                    <a href="/admin/application" class="btn btn-success">Done</a>
                </div>
            




            </div>
            </div>
            
        </div>       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

        
</div>
<script>
     $(function() {
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('application.getdata') }}',
        columns: [
                { data: 'fullname', name: 'fullname' },
                { data: 'scholarship_name', name: 'scholarship_name' },
                { data: 'created_at', name: 'created_at'},
                { width: '20%', data: 'action', orderable:false, searchable: false}
          ] 
    });

      $('#table2').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('application.getdata2') }}',
        columns: [
                { data: 'fullname', name: 'fullname' },
                { data: 'scholarship_name', name: 'scholarship_name' },
                { data: 'created_at', name: 'created_at'},
                { data: 'empfullname', name: 'empfullname' },
                { data: 'date_approved', name: 'date_approved'},  
                { width: '20%', data: 'action', orderable:false, searchable: false}
          ] 
    });


            
    $('#add_data').click(function(){
        $('#mainModal').modal('show');
        $('#main_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        $('.modal-title').text('Add Question');
        edit_Form();
    });

    $('#main_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('application.postdata') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                   // $('#form_output').html(data.success);
                    $('#main_form')[0].reset();
                    //$('#action').val('Add');
                   
                    //$('#button_action').val('insert');
                    $('#table').DataTable().ajax.reload();
                    $('#table2').DataTable().ajax.reload();
                    $('#mainModal').modal('hide');
                   
                   if (($('#action').val() == 'Delete'))
                    {
                      swal(
                        'Success!',
                        'Your data is successfully deleted',
                        'success'
                      )
                    }
                }
            }
        })
    });

    
 $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
         //$('#del_output').html('');
         $.ajax({
            url:"{{route('application.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
              $('#mainModal').modal('show');
              $('#app_id').val(id);
              $('#app_status').val(data.application_status);
              $('#button_action').val('delete');

            }
            }); 
    });
});
</script>
</body>
</html>


