<!DOCTYPE html>
<html>
<head>
    <title>Shoe Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-4.6.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

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
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        Cart
                        <span class="small" @if($basketCount === '')style="display: none;" @endif id="span-basket">{{$basketCount}}</span>
                    </a>
                </li>
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
<main role="main" class="container mt-4">
    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img class="card-img" src="{{asset('assets/img/' . $product->picture)}}" alt="Vans">
                    <div class="card-body">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <p class="card-text text-justify">{{$product->description}}</p>
                        <div class="options d-flex flex-fill">
                            <select class="custom-select ml-1" id="product-number-{{$product->id}}">
                                <option value="0">0</option>
                                @for($i = 1; $i <= 3; $i++)
                                    <option value="{{$i}}" @if(isset($basket[$product->id]) && $basket[$product->id] === $i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success">
                                <h5 class="mt-4">${{$product->price}}</h5>
                            </div>
                            <button type="button" class="btn btn-primary mt-3" onclick="addToBasket(this, '{{$product->id}}')">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>

<script src="{{asset('assets/plugins/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-4.6.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/site.js')}}"></script>
<script>
    function addToBasket(btn, productId) {
        let number = $('#product-number-' + productId + ' option:selected').val();
        let url = '{{route('basket.add', ['product' => '%PRODUCT_ID%', 'number' => '%NUMBER%'])}}';
        url = url.replace('%PRODUCT_ID%', productId).replace('%NUMBER%', number);

        $(btn).attr('disabled', true);
        $.ajax({
            url: url,
            cache: false,
            success: function (server) {
                $(btn).attr('disabled', false);
                if (server.result) {
                    $('#span-basket').html(server.msg).css('display', server.count === 0 ? 'none' : 'inline');
                } else {
                    alert(server.msg);
                }
            },
            error: function () {
                $(btn).attr('disabled', false);
                alert('Please try again');
            }
        });
    }
</script>
</body>
</html>
