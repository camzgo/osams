<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>Pampanga Capitol | Online Scholarship Application and Management System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
   {{-- <img src="" alt="" style="width:100%; height: 100%">  --}}
   <embed src="/storage/uploads/{{$up}}" type="application/pdf" width="100%" height="750px" />
</body>
</html>