<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-4.6.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

<div class="container center-container d-flex align-items-center justify-content-center flex-column">
    <h1>Login</h1>
    <form action="{{route('login')}}" method="post" class="form-data">
        @include('partials.error')
        @csrf
        @if(session('passwordChanged'))
            <div class="alert alert-success">
                Password changed successfully
            </div>
        @endif
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autocomplete="off">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me"> Remember me
            </label>
        </div>
        <div class="form-group mb-0 d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="{{route('recovery.form')}}">Forgot password?</a>
        </div>
    </form>
</div>

</body>
</html>
