<!DOCTYPE html>
<html>
<head>
    <title>Reset password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-4.6.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

<div class="container center-container d-flex align-items-center justify-content-center flex-column">
    <h1>Reset password</h1>
    <form action="{{route('reset')}}" method="post" class="form-data">
        @include('partials.error')
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off" value="{{$email}}">
        </div>
        <div class="form-group">
            <label for="password">New password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Retype new password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype new password" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Change password</button>
    </form>
</div>

</body>
</html>
