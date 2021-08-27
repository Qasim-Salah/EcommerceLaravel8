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
                                <div class="col-md-6"> All Categories</div>
                                <div class="col-md-6">
                                    <a class="btn btn-success pull-right" href="{{route('admin.category.create')}}">Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($category)
                                @foreach($category as $categories)
                                    <tr>
                                        <td>{{$categories->id}}</td>
                                        <td>{{$categories->name}}</td>
                                        <td>{{$categories->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.category.edit',$categories->slug)}}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="{{route('admin.category.destroy',$categories->slug)}}" style="margin-left: 10px"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        {{ $category->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
