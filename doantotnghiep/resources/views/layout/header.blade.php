<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">


            <div class="site-logo">
                <a href="{{route('trangchu')}}" class="text-black"><span class="text-primary">Home</span></a>
            </div>

            <div class="col-12">
                <nav class="site-navigation text-right ml-auto " role="navigation">

                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        <li><a href="{{route('trangchu')}}" class="nav-link">Trang chủ</a></li>
                        <li><a href="#services-section" class="nav-link">Trọ cho thuê</a></li>
                        <li><a href="#services-section" class="nav-link">Ở ghép</a></li>
                        <li><a href="#services-section" class="nav-link">Nhà nguyên căn</a></li>
                        <li><a href="#services-section" class="nav-link">Chung cư</a></li>
                        @if(Auth::user())
                        <li class="has-children">
                            <a href="#about-section" class="nav-link"><i class="icon-user"></i>{{Auth::user()->name}}</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="{{route('nguoidung')}}" class="nav-link">Thông tin người dùng</a></li>
                                <li><a href="{{route('logout')}}" class="nav-link">Đăng xuất</a></li>
                                <li><a href="{{route('dangtin')}}" class="nav-link">Đăng tin</a></li>
                            </ul>
                        </li>
                        @else
                         <li><a href="{{route('register')}}" class="nav-link">Đăng ký</a></li>
                         <li><a href="{{route('login')}}" class="nav-link">Đăng Nhập</a></li>
                        @endif
                    </ul>
                </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
    </div>

</header>
