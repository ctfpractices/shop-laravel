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

<div class="container d-flex align-items-center justify-content-center flex-column">
    <h1>Register</h1>
    <form action="{{route('register')}}" method="post" class="form-data">
        @include('partials.error')
        @csrf
        <div class="form-group">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" autocomplete="off" value="{{old('first_name')}}">
        </div>
        <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" autocomplete="off" value="{{old('last_name')}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Retype password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype password" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="profile_path">Profile path:</label>
            <input type="text" class="form-control" id="profile_path" name="profile_path" placeholder="For example: billgates" autocomplete="off" value="{{old('profile_path')}}">
            <div class="invalid-feedback d-block text-info">Final url: {{env('APP_URL') . '/@billgates'}}</div>
        </div>
        <div class="form-group">
            <label for="social_network_url">Social network:</label>
            <input type="text" class="form-control" id="social_network_url" name="social_network_url" placeholder="Enter social network" autocomplete="off" value="{{old('social_network_url')}}">
            <div class="invalid-feedback d-block text-info">For example: https://instagram.com/billgates</div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

</body>
</html>
