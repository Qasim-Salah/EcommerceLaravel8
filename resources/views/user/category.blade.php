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
                            All Categories
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($category)
                            @foreach($category as $categories)
                                <tr>
                                    <td>{{$categories->id}}</td>
                                    <td class="category-item"><a href="{{route('user.category.product',$categories->slug)}}"
                                                                 class="cate-link">{{$categories->name}}</a></td>
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
