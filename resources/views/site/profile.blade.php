<!DOCTYPE html>
<html>
<head>
    <title>{{$profileName}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-4.6.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

@include('site.include.menu')
<main role="main" class="container mt-4">
    <div class="row">
        Profile page: {{$profileName}} ...
    </div>
</main>

<script src="{{asset('assets/plugins/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-4.6.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/site.js')}}"></script>
</body>
</html>
