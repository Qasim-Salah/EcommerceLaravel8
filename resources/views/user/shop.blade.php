@extends('layouts.master')
@section('title')
    Shop
@endsection
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
    .wrap-pagination-info{
        margin: 100px;
    }
</style>
@section('content')
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('user.home')}}" class="link">Home</a></li>
                    <li class="item-link"><span>Products</span></li>
                </ul>
            </div>
            <div class="row">
                @include('layouts.includes.alerts.success')
                @include('layouts.includes.alerts.errors')
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{asset('assets/user/images/shop-banner.jpg')}}"></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Digital & Electronics</h1>

                    </div><!--end wrap shop control-->

                    <div class="row">

                        <ul class="product-list grid-products equal-container text-center">
                            @isset($product)
                                @foreach($product as $products)
                                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                        <div class="product product-style-3 equal-elem image ">
                                            <div class="product-thumnail text-center">
                                                <a href="{{route('user.details',$products->slug)}}" title="{{$products->name}}">
                                                    <figure><img src="{{$products->image}}"
                                                                 alt="{{$products->name}}"></figure>
                                                </a>
                                            </div>
                                            <div class="product-info ">
                                                <a href="{{route('user.details',$products->slug)}}"
                                                   class="product-name"><span style="text-align:center;">{{$products->name}}</span></a>
                                                <div style="text-align:center;" class="wrap-price"><span
                                                        class="product-price">${{$products->regular_price}}</span>
                                                </div>
                                                <div class="product-wish">
                                                    @if ($wish->contains($products->id))
                                                        <a href="{{route('user.destroy.wishlist',$products->id)}}"><i
                                                                class="fa fa-heart fill-heart"></i></a>
                                                    @else

                                                        <form action="{{route('user.cart.wishlist')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$products->id}}">
                                                            <input type="hidden" name="name" value="{{$products->name}}">
                                                            <input type="hidden" name="regular_price"
                                                                   value="{{$products->regular_price}}">
                                                            <button class="button" type="submit" name="submit"><i
                                                                    class="fa fa-heart "></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                                <div class="wrap-butons">

                                                    <form action="{{route('user.store.cart')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$products->id}}">
                                                        <input type="hidden" name="name" value="{{$products->name}}">
                                                        <input type="hidden" name="regular_price" value="{{$products->regular_price}}">
                                                        <input class="btn add-to-cart " type="submit" name="submit" value="Add To Cart">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                        <div class="wrap-pagination-info">
                            {{$product->links()}}
                        </div>
                    </div>
                </div><!--end main pr oducts area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                @isset($category)
                                    @foreach($category as $categories)
                                        <li class="category-item"><a href="{{route('user.category.product',$categories->slug)}}"
                                                                     class="cate-link">{{$categories->name}}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </div><!-- Categories widget-->
                </div><!--end sitebar-->

            </div><!--end row-->

        </div><!--end container-->

    </main>

@endsection
