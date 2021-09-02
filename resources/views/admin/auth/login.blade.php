@extends('layouts.master')

@section('title')
    Admin login
@endsection

@section('content')
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('user.home')}}" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item">
                            <div class="login-form form-item form-stl">
                                @include('layouts.includes.alerts.success')
                                @include('layouts.includes.alerts.errors')
                                <form name="frm-login" method="POST" action="{{route('admin.post.login')}}">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Log in to your account</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input">

                                        <label for="frm-login-uname">Email Address:</label>
                                        <input type="email" id="frm-login-uname" name="email" placeholder="Type your email address"
                                               value="{{ old('email') }}" required>
                                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                    </fieldset>

                                    <fieldset class="wrap-input">
                                        <label for="frm-login-pass">Password:</label>
                                        <input type="password" id="frm-login-pass" name="password" placeholder="************" required>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </fieldset>

                                    <fieldset class="wrap-input">
                                        <label class="remember-field">
                                            <input type="checkbox" name="remember_me" id="remember-me"
                                                   class="chk-remember"><span>Remember me</span>
                                        </label>
                                    </fieldset>
                                    <input type="submit" class="btn btn-submit" value="Login" name="submit">
                                </form>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->

        </div><!--end container-->

    </main>
@endsection

