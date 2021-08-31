@extends('layouts.front')
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
                                <div class="col-md-6"> All Slider</div>
                                <div class="col-md-6">
                                    <a class="btn btn-success pull-right" href="{{route('admin.slider.create')}}">Add New</a>
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
                                <th>Title</th>
                                <th>SudTitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($slider)
                                @foreach($slider as $sliders)
                                    <tr>
                                        <td>{{$sliders->id}}</td>
                                        <td> <figure><img src="{{$sliders->image}}"
                                                          alt="{{$sliders->name}}" style="border-radius: 50%; height: 100px;width: 100px;">
                                            </figure></td>
                                        <td>{{$sliders->title}}</td>
                                        <td>{{$sliders->subtitle}}</td>
                                        <td>{{$sliders->price}}</td>
                                        <td>{{$sliders->link}}</td>
                                        <td>{{$sliders->getStatus()}}</td>
                                        <td>{{$sliders->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.slider.edit',$sliders->id)}}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="{{route('admin.slider.destroy',$sliders->id)}}" style="margin-left: 10px"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
