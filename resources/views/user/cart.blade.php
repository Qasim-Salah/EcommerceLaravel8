@extends('layouts.master')
@section('title')
    cart
@endsection
@section('content')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('user.home')}}" class="link">home</a></li>
                    <li class="item-link"><span>cart</span></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <div class="wrap-iten-in-cart">
                    @if (Cart::instance('cart')->count() > 0)

                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach(Cart::instance('cart')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{$item->model->image}}" alt=""></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product"
                                           href="{{route('user.details',$item->model->slug)}}">{{$item->model->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                                    <div class="quantity">

                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120"
                                                   pattern="[0-9]*">

                                            <a class="btn btn-increase" href="{{route('user.increaseQuantity',$item->rowId)}}"></a>
                                            <a class="btn btn-reduce" href="{{route('user.decreaseQuantity',$item->rowId)}}"></a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>
                                    <div class="delete">
                                        <a href="{{route('user.destroyQuantity',$item->rowId)}}" class="btn btn-delete" title="">
                                            <span>Delete from your cart</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                </div>
                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b
                                class="index">${{Cart::instance('cart')->subtotal()}}</b></p>
                        <p class="summary-info"><span class="title">Tax</span><b class="index">{{Cart::instance('cart')->tax()}}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info total-info "><span class="title">Total</span><b
                                class="index">${{Cart::instance('cart')->total()}}</b></p>
                    </div>
                    <div class="checkout-info">
                        <a class="btn btn-checkout" href="{{route('user.checkout.create')}}">Check out</a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" href="{{route('user.destroyAllQuantity')}}">Clear Shopping Cart</a>
                        <a class="btn btn-update" href="{{route('user.shop')}}">Update Shopping Cart</a>
                    </div>
                </div>
                @else
                    <div class="text-center" style="padding: 30px 0 ;">
                        <h1>Your cart is empty!</h1>
                        <p>Add items to it now</p>
                        <a href="{{route('user.shop')}}" class="btn btn-success">Shop Now</a>
                    </div>
                @endif
            </div>

        </div><!--end main content area-->
        <!--end container-->
    </main>
@endsection
