@extends('layouts.master')
@section('content')
    <main id="main">
        <div class="container">
            <!--MAIN SLIDE-->
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                    @isset($slider)
                        @foreach($slider as $sliders)
                            <div class="item-slide">
                                <img src="{{$sliders->image}}" alt="{{$sliders->title}}" class="img-slide">
                                <div class="slide-info slide-1">
                                    <h2 class="f-title">{{$sliders->title}}</h2>
                                    <span class="subtitle">{{$sliders->subtitle}}</span>
                                    <p class="sale-info">Only price: <span class="price">${{$sliders->price}}</span></p>
                                    <a href="{{$sliders->link}}" class="btn-link">Shop Now</a>
                                </div>
                            </div>
                        @endforeach
                    @endisset

                </div>
            </div>

            <!--BANNER-->
            <div class="wrap-banner style-twin-default">
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="{{asset('assets/user/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190"></figure>
                    </a>
                </div>
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="{{asset('assets/user/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190"></figure>
                    </a>
                </div>
            </div>

            {{--            <!--On Sale-->--}}
            @if ($saleProducts->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                <div class="wrap-show-advance-info-box style-1 has-countdown">
                    <h3 class="title-box">On Sale</h3>
                    <div class="wrap-countdown mercado-countdown"
                         data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}"></div>
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false"
                         data-nav="true" data-dots="false"
                         data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                        @isset($saleProducts)
                            @foreach($saleProducts as $product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('user.details',$product->slug)}}" title="{{$product->name}}">
                                            <figure><img src="{{$product->image}}" width="800" height="800"
                                                         alt="{{$product->name}}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('user.details',$product->slug)}}"
                                           class="product-name"><span>{{$product->name}}</span></a>
                                        <div class="wrap-price">
                                            <ins><p class="product-price">${{$product->sale_price}}</p></ins>
                                            <del><p class="product-price">${{$product->regular_price}}</p></del>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            @endif
            {{--    <!--Latest Products-->--}}
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Latest Products</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="{{asset('assets/user/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt="">
                        </figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                     data-loop="false" data-nav="true" data-dots="false"
                                     data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @isset($latestProduct)
                                        @foreach($latestProduct as $products)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="{{route('user.details',$products->slug)}}" title="{{$products->name}}">
                                                        <figure><img src="{{$products->image}}" width="800" height="800"
                                                                     alt="{{$products->name}}"></figure>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="#"
                                                       class="product-name"><span>{{$products->name}}</span></a>
                                                    <div class="wrap-price">
                                                        <ins><p class="product-price">${{$products->regular_price}}</p></ins>
                                                        <del><p class="product-price">${{$products->regular_price}}</p></del>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
