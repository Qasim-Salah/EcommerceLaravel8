@extends('layouts.master')
@section('title')
    Category
@endsection
<style>
    nav svg {
        height: 20px;

    }

    nav .hidden {
        display: block !important;
    }
</style>
@section('content')
    <div>
        <div class="container" style="padding: 30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6"> All Order</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>First Name</th>
                                <th>List Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Zipcode</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @isset($order)
                                @foreach($order as $orders)
                                    <tr>
                                        <td>{{$orders->id}}</td>
                                        <td>${{$orders->subtotal}}</td>
                                        <td>${{$orders->discount}}</td>
                                        <td>${{$orders->tax}}</td>
                                        <td>${{$orders->total}}</td>
                                        <td>{{$orders->firstname}}</td>
                                        <td>{{$orders->lastname}}</td>
                                        <td>{{$orders->mobile}}</td>
                                        <td>{{$orders->email}}</td>
                                        <td>{{$orders->zipcode}}</td>
                                        <td>{{$orders->status}}</td>
                                        <td>{{$orders->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.order.details',$orders->id)}}"
                                               class="btn btn-info">Details</a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        {{ $order->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
