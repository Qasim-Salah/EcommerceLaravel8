@extends('layouts.front')
@section('title')
    Add Product
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
                                <div class="col-md-6">
                                    Add Product
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('admin.product')}}" class="btn btn-success pull-right">All Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')
                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('admin.product.store')}}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product name</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="name" placeholder="Product Name" value="{{$product->name}}"
                                           class="form-control input-md">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="slug" placeholder="Product Slug" value="{{$product->slug}}"
                                           class="form-control input-md">
                                </div>
                                @error('slug')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4 ">
                                    <textarea class="form-control" name="short_description"
                                    placeholder="Short Description">{{$product->short_description}}</textarea>
                                </div>
                                @error('short_description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4 ">
                                    <textarea class="form-control" name="description" placeholder="Description">{{$product->description}}</textarea>
                                </div>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price </label>
                                <div class="col-md-4 ">
                                    <input type="number" name="regular_price" placeholder="Regular Price"
                                         value="{{$product->regular_price}}"   class="form-control input-md">
                                </div>
                                @error('regular_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Price </label>
                                <div class="col-md-4 ">
                                    <input type="number" name="sale_price" placeholder="Sale Price"
                                           value="{{$product->sale_price}}" class="form-control input-md">
                                </div>
                                @error('sale_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sku </label>
                                <div class="col-md-4 ">
                                    <input type="text" name="sku" placeholder="Sku" value="{{$product->sku}}" class="form-control input-md">
                                </div>
                                @error('sku')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock </label>
                                <div class="col-md-4 ">
                                    <select  class="form-control" name="stock_status">
                                        <option value="1">inStock</option>
                                        <option value="0">Out Of Stock</option>
                                    </select>
                                </div>
                                @error('stock_status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Featured </label>
                                <div class="col-md-4 ">
                                    <select class="form-control" name="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                @error('featured')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="quantity" placeholder="quantity"
                                           value="{{$product->quantity}}" class="form-control input-md">
                                </div>
                                @error('quantity')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category </label>
                                <div class="col-md-4 ">
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @isset($category)
                                            @foreach($category as $categories)
                                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-4 ">
                                    <input type="file" name="image" placeholder="image"  class="input-file">
                                    <figure><img src="{{$product->image}}"
                                                 alt="{{$product->name}}" style="margin-top: 10px; margin-bottom: 10px; border-radius: 50%; height: 100px;width: 100px;">
                                    </figure>
                                </div>

                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
