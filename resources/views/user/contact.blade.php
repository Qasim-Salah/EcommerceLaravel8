@extends('layouts.master')
@section('title')
    Contact
@endsection
@section('content')
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('user.home')}}" class="link">home</a></li>
                    <li class="item-link"><span>Contact us</span></li>
                </ul>
            </div>
            <div class="row">
                <div class=" main-content-area">
                    <div class="wrap-contacts ">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-form">
                                @include('layouts.includes.alerts.success')
                                @include('layouts.includes.alerts.errors')
                                <h2 class="box-title">Leave a Message</h2>
                                <form action="{{route('user.contact.store')}}" method="POST" name="frm-contact">
                                    @csrf
                                    <label for="name">Name<span>*</span></label>
                                    <input type="text" value="{{old('name')}}" id="name" name="name">
                                    @error('name')<span class="text-danger">{{$message}}</span>@enderror

                                    <label for="email">Email<span>*</span></label>
                                    <input type="text" value="{{old('email')}}" id="email" name="email">
                                    @error('email')<span class="text-danger">{{$message}}</span>@enderror

                                    <label for="phone">Number Phone</label>
                                    <input type="text" value="{{old('mibile')}}" id="phone" name="mobile">
                                    @error('mobile')<span class="text-danger">{{$message}}</span>@enderror

                                    <label for="comment">Comment</label>
                                    <textarea name="contact" id="comment"></textarea>
                                    @error('contact')<span class="text-danger">{{$message}}</span>@enderror

                                    <input type="submit" name="ok" value="Submit">

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-info">
                                <div class="wrap-map">
                                    <div class="mercado-google-maps"
                                         id="az-google-maps57341d9e51968"
                                         data-hue=""
                                         data-lightness="1"
                                         data-map-style="2"
                                         data-saturation="-100"
                                         data-modify-coloring="false"
                                         data-title_maps="Kute themes"
                                         data-phone="088-465 9965 02"
                                         data-email="kutethemes@gmail.com"
                                         data-address="Z115 TP. Thai Nguyen"
                                         data-longitude="-0.120850"
                                         data-latitude="51.508742"
                                         data-pin-icon=""
                                         data-zoom="16"
                                         data-map-type="ROADMAP"
                                         data-map-height="263">
                                    </div>
                                </div>
                                <h2 class="box-title">Contact Detail</h2>
                                <div class="wrap-icon-box">

                                    <div class="icon-box-item">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Email</b>
                                            <p>qasimsalah@gmail.com</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Phone</b>
                                            <p>(+964) 7702814484</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Mail Office</b>
                                            <p>Iraq Baghdad Karrada</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->

            </div><!--end row-->

        </div><!--end container-->

    </main>
@endsection
