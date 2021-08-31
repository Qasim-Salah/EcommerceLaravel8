@extends('layouts.master')
@section('title')
    Add Sale
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
                                    Add Sale
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.includes.alerts.success')
                    @include('layouts.includes.alerts.errors')
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('admin.sale.store')}}">
                            @csrf
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
                                <label class="col-md-4 control-label">Sale_date</label>
                                <div class="col-md-4 ">
                                    <input type="datetime-local" id="sale-date" name="sale_date" placeholder="YYYY/MM/DD H:M:S" value="{{old('sale_date')}}" class="input-md">
                                </div>
                                @error('sale_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4 ">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
