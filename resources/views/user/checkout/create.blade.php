@extends('layouts.master')
@section('title')
    checkout
@endsection
@section('content')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('user.home')}}" class="link">home</a></li>
                    <li class="item-link"><a href="{{route('login')}}" class="link"><span>login</span></a></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <div class="wrap-address-billing">
                    @include('layouts.includes.alerts.success')
                    @include('layouts.includes.alerts.errors')
                    <h3 class="box-title">Shipping Address</h3>
                    <form action="{{route('user.checkout.store')}}" method="POST" name="frm-billing">
                        @csrf
                        <p class="row-in-form">
                            <label for="fname">first name<span>*</span></label>
                            <input type="text" name="firstname" value="{{old('firstname')}}" placeholder="Your name">
                            @error('firstname')<span class="text-danger">{{$message}}</span>@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="lname">last name<span>*</span></label>
                            <input type="text" name="lastname" value="{{old('lastname')}}" placeholder="Your last name">
                            @error('lastname')<span class="text-danger">{{$message}}</span>@enderror

                        </p>
                        <p class="row-in-form">
                            <label for="email">Email Addreess:</label>
                            <input type="email" name="email" value="{{old('email')}}" placeholder="Type your email">
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror

                        </p>
                        <p class="row-in-form">
                            <label for="phone">Phone number<span>*</span></label>
                            <input type="number" name="mobile" value="{{old('mobile')}}" placeholder="10 digits format">
                            @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="add">Line1</label>
                            <input type="text" name="line1" value="{{old('line1')}}" placeholder="Line1">
                            @error('line1')<span class="text-danger">{{$message}}</span>@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="add">Line2</label>
                            <input type="text" name="line2" value="{{old('line2')}}" placeholder="Line2">
                        </p>
                        <p class="row-in-form">
                            <label for="country">Country<span>*</span></label>
                            <input type="text" name="country" value="{{old('country')}}" placeholder="United States">
                            @error('country')<span class="text-danger">{{$message}}</span>@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="city">Province<span>*</span></label>
                            <input type="text" name="province" value="{{old('province')}}" placeholder="Province">
                            @error('province')<span class="text-danger">{{$message}}</span>@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="city">Town / City <span>*</span></label>
                            <input type="text" name="city" value="{{old('city')}}" placeholder="City name">
                            @error('city')<span class="text-danger">{{$message}}</span>@enderror

                        </p>
                        <p class="row-in-form">
                            <label for="zip-code">Postcode / ZIP: </label>
                            <input type="number" name="zipcode" value="{{old('zipcode')}}" placeholder="Your postal code">
                            @error('zipcode')<span class="text-danger">{{$message}}</span>@enderror
                        </p>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input  id="payment-method-bank" value="cod" type="radio" name="paymentmode">
                                <span>Cash On Delivery </span>
                                <span class="payment-desc">Order New On Delivery</span>
                            </label>
                            <label class="payment-method">
                                <input  id="payment-method-visa" value="card" type="radio" name="paymentmode">
                                <span>Credit Card</span>
                                <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                            </label>
                            <label class="payment-method">
                                <input  id="payment-method-paypal" value="paypal" type="radio" name="paymentmode">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                        </div>
                        @error('paymentmode')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{ Cart::instance('cart')->total()}}</span></p>
                        <button type="submit" class="btn btn-medium">Place order now</button>

                </div>
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $0</span></p>
                    </div>
                    </form>
                </div>
            </div><!--end main content area-->
        </div><!--end container-->
    </main>
@endsection
