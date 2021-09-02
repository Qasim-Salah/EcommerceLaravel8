@extends('layouts.master')

@section('content')
    <div>
        <div class="container" style="padding: 30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Password
                        </div>
                    </div>
                    @include('layouts.includes.alerts.success')
                    @include('layouts.includes.alerts.errors')
                    <div class="panel-body">
                        <form class="form-horizontal" action="{{route('user.change.password.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">current Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Current" class="form-control input-md" name="current_password">
                                    @error('current_password')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">New Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="New" class="form-control input-md" name="password">
                                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Confirm" class="form-control input-md" name="password_confirmation">
                                    @error('password_confirmation')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="form-control input-md">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
