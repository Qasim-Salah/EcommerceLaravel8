@extends('layouts.master')
@section('title')
    Wishlist
@endsection
@section('content')
    <style>
        .product-wish {
            position: absolute;
            top: 10%;
            left: 0;
            z-index: 99;
            right: 30px;
            text-align: right;
            padding-top: 0;
        }

        .product-wish .fa {
            color: #cbcbcb;
            font-size: 32px;
        }

        .product-wish .fa:hover {
            color: #ff7007;
        }

        .product-wish .fill-heart {
            color: #ff7007;
        }

        .button {
            border: none;
            background: none;
        }
    </style>

    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('user.home')}}" class="link">Home</a></li>
                    <li class="item-link"><span>Wishlist</span></li>
                </ul>
            </div>
            <div class="row">
                @if (Cart::instance('wishlist')->count() > 0)
                    <ul class="product-list grid-products equal-container">
                            @foreach(Cart::instance('wishlist')->content() as $products)
                                <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('user.details',$products->model->slug)}}" title="{{$products->model->name}}">
                                                <figure><img src="{{$products->model->image}}"
                                                             alt="{{$products->model->name}}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('user.details',$products->model->slug)}}"
                                               class="product-name"><span>{{$products->model->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">${{$products->model->regular_price}}</span>
                                            </div>
                                            <div class="product-wish">
                                                <a href="{{route('user.destroy.wishlist',$products->model->id)}}"><i
                                                        class="fa fa-heart fill-heart"></i></a>
                                            </div>
                                            <div class="wrap-butons">

                                                <form action="{{route('user.store.cart')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$products->model->id}}">
                                                    <input type="hidden" name="name" value="{{$products->model->name}}">
                                                    <input type="hidden" name="regular_price" value="{{$products->model->regular_price}}">
                                                    <input class="btn add-to-cart " type="submit" name="submit" value="Add To Cart">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                    </ul>
                @else
                    No item in wishlist
                @endif
                <div class="wrap-pagination-info">
                </div>
            </div>
        </div><!--end container-->
    </main>

@endsection
