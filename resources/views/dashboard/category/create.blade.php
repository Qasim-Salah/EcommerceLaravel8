@extends('layouts.front')
@section('title')
    Add Category
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
                                    Add Categories
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('admin.category')}}" class="btn btn-success pull-right">All Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('admin.category.store')}}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category name</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="name" placeholder="Category Name" value="{{old('name')}}" class="form-control input-md">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="slug" placeholder="Category Slug" {{old('slug')}} class="form-control input-md">
                                </div>
                                @error('slug')
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
