<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="Hotline: (+964) 7702814484" href="#"><span class="icon label-before fa fa-mobile"></span>Hotline:
                                    (+964) 7702814484</a>
                            </li>

                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            @if (Auth('admin')->check())
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="My Account" href="#">My Account: {{Auth('admin')->user()->name}}
                                        <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a title="Category" href="{{route('admin.category')}}">Category</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Product" href="{{route('admin.product')}}">product</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Slider" href="{{route('admin.slider')}}">Slider</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Sale" href="{{route('admin.sale.create')}}">Sale</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Order" href="{{route('admin.order')}}">Order</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Contact" href="{{route('admin.contact')}}">Contact</a>
                                        </li>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                            @csrf
                                            <li class="menu-item">
                                                <a title="Logout" href="{{route('admin.logout')}}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        </form>
                                    </ul>
                            @elseif(Auth()->check())
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="My Account" href="#">My
                                        Account({{Auth()->user()->name}})<i
                                            class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a title="Order" href="{{route('user.order')}}">My Order</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Password" href="{{route('user.change.password')}}">Change Password</a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <li class="menu-item">
                                                <a title="Logout" href="{{route('logout')}}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        </form>
                                    </ul>
                            @endif
                            @if (!Auth('web')->check() && !Auth('admin')->check())
                                <li class="menu-item"><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                                <li class="menu-item"><a title="Register or Login" href="{{route('register')}}">Register</a></li>
                        @endif
                    </div>
                </div>
            </div>
            <div class=" container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="#" class="link-to-home"><img src="{{asset('assets/user/images/logo-top-1.png')}}"
                                                              alt="mercado"></a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="{{route('user.product.search')}}" method="POST" id="form-search-top" name="form-search-top">
                                @csrf
                                <input type="text" name="search" value="{{old('search',request()->search)}}" placeholder="Search here...">
                                <button form="form-search-top" type="submit"><i class="fa fa-search"
                                                                                aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="{{route('user.wishlist')}}" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    @if (Cart::instance('wishlist')->count() > 0)
                                        <span class="index">{{Cart::instance('wishlist')->count()}} item</span>
                                    @endif
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{route('user.cart')}}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    @if (Cart::instance('cart')->count() > 0)
                                        <span class="index">{{Cart::instance('cart')->count()}} items</span>
                                    @endif
                                    <span class="title">CART</span>

                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                            <li class="menu-item home-icon">
                                <a href="{{route('user.home')}}" class="link-term mercado-item-title"><i class="fa fa-home"
                                                                                                         aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('user.shop')}}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('user.cart')}}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('user.checkout.create')}}" class="link-term mercado-item-title">Checkout</a>
                            </li>

                            <li class="menu-item">
                                <a href="{{route('user.contact')}}" class="link-term mercado-item-title">Contact Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('user.category')}}" class="link-term mercado-item-title">Category</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
