@extends('layouts.front')
@section('title')
    Add Slider
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
                                    <a href="{{route('admin.slider')}}" class="btn btn-success pull-right">All Slider</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('admin.slider.store')}}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="title" placeholder="title" value="{{old('title')}}"
                                           class="form-control input-md">
                                </div>
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">SubTitle</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="subtitle" placeholder="subtitle" value="{{old('subtitle')}}"
                                           class="form-control input-md">
                                </div>
                                @error('subtitle')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="price" placeholder="Price" value="{{old('price')}}" class="form-control input-md">
                                </div>
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Link</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="link" placeholder="link" value="{{old('link')}}" class="form-control input-md">
                                </div>
                                @error('link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">status</label>
                                <div class="col-md-4 ">
                                    <select class="form-control" name="status">
                                        <option value="0">InActive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4 ">
                                    <input type="file" name="image" placeholder="image" value="{{old('image')}}" class="input-file">
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
