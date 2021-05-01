<!DOCTYPE html>
<html>
<head>
    <title>Account recovery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-4.6.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

<div class="container center-container d-flex align-items-center justify-content-center flex-column">
    <h1>Account recovery</h1>
    <form action="{{route('recovery')}}" method="post" class="form-data">
        @include('partials.error')
        @if(session('sent'))
            <div class="alert alert-success">
                Recovery email sent!
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Send email</button>
    </form>
</div>

</body>
</html>
