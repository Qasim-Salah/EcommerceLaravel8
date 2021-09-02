@extends('layouts.master')
@section('title')
    Details Order
@endsection
@section('content')
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"> Order Items</div>
                        <div class="col-md-6">
                            <a class="btn btn-success pull-right" href="{{route('user.order')}}">MY Order</a>
                        </div>
                    </div>
                </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach($order->orderItems as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{$item->product->image}}" alt=""></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product"
                                               href="{{route('user.details',$item->product->slug)}}">{{$item->product->name}}</a>
                                        </div>
                                        <div class="price-field produtc-price"><p class="price">${{$item->product->regular_price}}</p></div>
                                        <div class="quantity">
                                            <h5>{{$item->quantity}}</h5></div>
                                        <div class="price-field sub-total"><p class="price">${{$item->price * $item->quantity}}</p></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{$order->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">Tax</span><b class="index">{{$order->tax}}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{$order->total}}</b>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Billing Details
                    </div>
                    <div class="panel-body">

                        <table class="table">

                            <tr>
                                <th>First Name</th>
                                <td>{{$order->firstname}}</td>
                                <th>last Name</th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->mobile}}</td>
                                <th>Email</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{$order->line1}}</td>
                                <th>Line2</th>
                                <td>{{$order->line2}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$order->city}}</td>
                                <th>Province</th>
                                <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$order->country}}</td>
                                <th>Zipcode</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transactions
                    </div>
                    <div class="panel-body">

                        <table class="table">

                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{$order->transaction->created_at}}</td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
