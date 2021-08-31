@extends('layouts.front')
@section('title')
    Product
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
                                <div class="col-md-6"> All Product</div>
                                <div class="col-md-6">
                                    <a class="btn btn-success pull-right" href="{{route('admin.product.create')}}">Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($product)
                                @foreach($product as $products)
                                    <tr>
                                        <td>{{$products->id}}</td>
                                        <td>
                                            <figure><img src="{{$products->image}}"
                                                         alt="{{$products->name}}" style="border-radius: 50%; height: 100px;width: 100px;">
                                            </figure>
                                        </td>
                                        <td>{{$products->name}}</td>
                                        <td>{{$products->getstock()}}</td>
                                        <td>{{$products->regular_price}}</td>
                                        <td>{{$products->category->name}}</td>
                                        <td>{{$products->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.product.edit',$products->slug)}}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="{{route('admin.product.destroy',$products->slug)}}" style="margin-left: 10px"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        {{ $product->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
