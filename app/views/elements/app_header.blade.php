<!--header-->
<header class="header">
    <div class="header-quickLinks js-header-quickLinks d-lg-none">
        <div class="quickLinks-top js-quickLinks-top"></div>
        <div class="js-quickLinks-wrap-m">
        </div>
    </div>
    <div class="header-topline d-none d-lg-flex">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto d-flex align-items-center">
                    <div class="header-info"><i class="icon-placeholder2"></i>175/50/16 Ni Sư Huỳnh Liên – TP HCM</div>
                    <div class="header-phone"><i class="icon-telephone"></i><a href="tel:+84 8 2264 6868">+84 8 2264 6868</a> or <a href="tel:+84 24 2268 8080">+84 24 2268 8080</a></div>
                    <div class="header-info"><i class="icon-black-envelope"></i><a href="mailto:info@ids-vietnam.com">info@ids-vietnam.com</a></div>
                </div>
                <div class="col-auto ml-auto d-flex align-items-center">
                    <span class="d-none d-xl-inline-block">Liên kết:</span>
                    <span class="header-social">
                        <a href="#" class="hovicon"><i class="icon-facebook-logo-circle"></i></a>
                        <a href="#" class="hovicon"><i class="icon-twitter-logo-circle"></i></a>
                        <a href="#" class="hovicon"><i class="icon-google-plus-circle"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="header-content">
        <div class="container">
            <div class="row align-items-lg-center">
                <button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
                    <span class="icon-menu"></span>
                </button>
                <div class="col-lg-auto col-lg-3 d-flex align-items-lg-center">
                    <a href="{{ URL::to('/') }}" class="header-logo"><img src="{{Asset('assets/frontend/images/logo.png')}}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg ml-auto">
                    <div class="header-nav js-header-nav">
                        <nav class="navbar navbar-expand-lg btco-hover-menu">
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL::to('/gioi-thieu') }}">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ URL::to('/lab-duoc-uy-quyen') }}" class="nav-link">Lab được ủy quyền</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ URL::to('/tra-cuu-bao-hanh') }}" class="nav-link dropdown-toggle" data-toggle="dropdown">Tra cứu bảo hành</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ URL::to('/san-pham') }}" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL::to('/tin-tuc') }}">Tin tức</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL::to('/lien-he') }}">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--//header-->