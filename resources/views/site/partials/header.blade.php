<!-- Main Header -->
<header class="header color-fixed" ng-controller="headerPartial">
    <!-- Lower Bar -->
    <div class="header-inner">
        <div class="container-fluid pe-0">
            <div class="d-flex align-items-center justify-content-between">
                <!-- Left Part -->
                <div class="header_left_part d-flex align-items-center">
                    <div class="logo">
                        <a href="{{route('front.home-page')}}" class="light_logo"><img src="{{ $config->image->path ?? '' }}" alt="logo" style="max-width: 120px"></a>
                        <a href="{{route('front.home-page')}}" class="dark_logo"><img src="{{ $config->image->path }}" alt="logo"></a>
                    </div>
                </div>

                <!-- Center Part -->
                <div class="header_center_part d-none d-xl-block">
                    <div class="mainnav">
                        <ul class="main-menu">
                            <li class="menu-item"><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                            <li class="menu-item"><a href="{{ route('front.about_page') }}">Giới thiệu</a></li>
                            <li class="menu-item menu-item-has-children"><a href="#">Dịch vụ</a>
                                <ul class="sub-menu" data-lenis-prevent>
                                    @foreach($services as $service)
                                        <li class="menu-item"><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children"><a href="#">Sản phẩm</a>
                                <ul class="sub-menu" data-lenis-prevent>
                                    @foreach($categories as $category)
                                        <li class="menu-item"><a href="{{ route('front.getListProduct', $category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children"><a href="#">Khóa học</a>
                                <ul class="sub-menu" data-lenis-prevent>
                                    @foreach($courses as $course)
                                        <li class="menu-item"><a href="{{ route('front.getCourseDetail', $course->slug) }}">{{ $course->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="menu-item"><a href="{{ route('front.teams') }}">Thành viên</a></li>
                            @foreach($postCategories as $pCate)
                                <li class="menu-item"><a href="{{ route('front.blogs', $pCate->slug) }}">{{ $pCate->name }}</a></li>
                            @endforeach
                            <li class="menu-item"><a href="{{ route('front.contact') }}">Liên hệ</a></li>

                        </ul>
                    </div>
                </div>

                <!-- Right Part -->
                <div class="header_right_part d-flex align-items-center">
                    <div class="aside_open wptb-element">
                        <div class="aside-open--inner">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <style>
                        .header_cart .cart_icon {
                            position: relative;
                            display: inline-block;
                            font-size: 1.5rem; /* chỉnh kích thước icon */
                            color: #333;       /* chỉnh màu icon */
                            text-decoration: none;
                        }

                        .header_cart .cart_icon i {
                            vertical-align: middle;
                        }

                        .header_cart .cart_count {
                            position: absolute;
                            top: -6px;
                            right: -6px;
                            background: #dc3545;       /* màu badge, bạn đổi theo theme */
                            color: #fff;
                            font-size: 0.65rem;
                            font-weight: bold;
                            line-height: 1;
                            padding: 2px 5px;
                            border-radius: 50%;
                            min-width: 18px;
                            text-align: center;
                            box-shadow: 0 0 0 1px #fff;
                        }

                    </style>
{{--                    <div class="header_search wptb-element">--}}
{{--                        <a href="#" class="modal_search_icon" data-bs-toggle="modal" data-bs-target="#modalSearch">--}}
{{--                            <i class="bi bi-search"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="header_cart wptb-element position-relative" style="margin-left: 10px">
                        <a href="{{ route('cart.index') }}" class="cart_icon">
                            <i class="bi bi-cart" style="color: aliceblue"></i>
                            <span class="cart_count"><% cart.count %></span>
                        </a>
                    </div>

                    <button type="button" class="mr_menu_toggle wptb-element d-xl-none">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Main Header -->
