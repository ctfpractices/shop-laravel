<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-4.6.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

@include('site.include.menu')
<div class="container d-flex align-items-center justify-content-center flex-column mt-4">
    <h1>Checkout</h1>
    <form class="form-data">
        @if(count($products) > 0)
            <ul class="list-unstyled">
                @define $totalPrice = 0;
                @foreach($products as $product)
                    <li class="d-flex justify-content-between p-3 @if($loop->last) border-bottom @endif">
                <span>
                    {{$product->name}}
                    @if($basket[$product->id] > 1)
                        <span class="small">(x{{$basket[$product->id]}})</span>
                    @endif
                </span>
                        <span>$ {{$product->price * $basket[$product->id]}}</span>
                    </li>
                    @define $totalPrice += ($product->price * $basket[$product->id])
                @endforeach
                <li class="d-flex justify-content-between p-3 font-weight-bold">
                    <span>Total</span><span>$ {{$totalPrice}}</span>
                </li>
            </ul>
            <button type="submit" class="btn btn-primary btn-block">Continue to checkout</button>
        @else
            <div class="alert alert-danger text-center">Basket is empty</div>
        @endif
    </form>
    @if(count($products) > 0)
        <form class="form-data">
            <div class="form-group">
                <input type="text" class="form-control" id="promo_code" name="promo_code" placeholder="Enter promo code" autocomplete="off">
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-danger btn-block">Redeem</button>
        </form>
    @endif
</div>

<script src="{{asset('assets/plugins/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-4.6.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/site.js')}}"></script>
</body>
</html>
