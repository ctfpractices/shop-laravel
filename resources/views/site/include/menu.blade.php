<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand mr-auto mr-lg-0" href="{{route('index')}}">Amazon</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                @auth
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('profile.show', ['profile_path' => auth()->user()->profile_path])}}">Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('basket.list')}}">
                            Cart
                            <span class="small" @if($basketCount === '')style="display: none;" @endif id="span-basket">{{$basketCount}}</span>
                        </a>
                    </li>
                @endauth
            </ul>
            <form class="form-inline my-2 my-lg-0">
                @auth
                    <a href="{{route('logout')}}" class="btn btn-outline-success my-2 my-sm-0">Logout</a>
                @endauth
                @guest
                    <a href="{{route('login.form')}}" class="btn btn-outline-success my-2 my-sm-0">Login / Register</a>
                @endguest
            </form>
        </div>
    </div>
</nav>
