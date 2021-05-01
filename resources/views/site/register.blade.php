<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-4.6.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

<div class="container center-container d-flex align-items-center justify-content-center flex-column">
    <h1>Register</h1>
    <form action="{{route('register')}}" method="post" class="form-data">
        @include('partials.error')
        @csrf
        <div class="form-group">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Retype password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype password" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

</body>
</html>
