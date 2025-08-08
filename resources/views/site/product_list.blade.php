@extends('site.layouts.master')

@section('title')Sản phẩm - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->favicon->path ?? ''}}@endsection

@section('css')

@endsection

@section('content')
    <!-- Main Wrapper-->
    <style>
        .wptb-page-heading .wptb-item--inner {
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        /* Lớp nền mờ */
        .wptb-page-heading .wptb-item--inner::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Đen 40% mờ */
            z-index: 1;
        }

        /* Đưa tiêu đề lên trên overlay */
        .wptb-page-heading .wptb-item--title {
            position: relative;
            z-index: 2;
            color: #fff; /* Đảm bảo chữ trắng nổi bật */
            text-shadow: 0 2px 4px rgba(0,0,0,0.6);
        }
    </style>

    <main class="wrapper" ng-controller="productPage">
        <div class="wptb-page-heading">
            <div class="wptb-item--inner" style="background-image: url({{ $category->image->path ?? '' }});">
                <div class="wptb-item-layer wptb-item-layer-one">
                    <img src="/site/img/more/circle.png" alt="img">
                </div>
                <h2 class="wptb-item--title ">{{ $category ? $category->name : 'Sản phẩm' }}</h2>
            </div>
        </div>

        <section class="wptb-shop">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-8 pe-md-5">
                        <div class="shop_filtering_method d-flex align-items-center flex-wrap">
                            <div class="view_type_wrapper d-flex align-items-center">
                                <ul class="nav view_type d-flex align-items-center">
                                    <li>
                                        <a class="icon-grid active" id="grid-tab" data-bs-toggle="tab" href="#grid"><i class="bi bi-grid-3x3-gap-fill"></i></a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a class="icon-list" id="list-tab" data-bs-toggle="tab" href="#list"><i class="bi bi-list-task"></i></a>--}}
{{--                                    </li>--}}
                                </ul>
                                <div class="showing_results">
                                  Tất cả sản phẩm
                                </div>
                            </div>
                            <div class="sorting_wrapper">
                                <div class="sorting_select">
                                    <select class="basic_select" id="sortSelect" onchange="if(this.value) window.location.href=this.value" >
                                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'name_asc','page'=>1]) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên (A-Z)</option>
                                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'name_desc','page'=>1]) }}" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên (Z-A)</option>
                                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_asc','page'=>1]) }}" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_desc','page'=>1]) }}" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'date_asc','page'=>1]) }}" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Ngày cũ đến mới</option>
                                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'date_desc','page'=>1]) }}" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Ngày mới đến cũ</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <style>
                            /* Container chia 3 cột đều nhau */
                            .product_view_grid.product_col_3 {
                                display: grid;
                                grid-template-columns: repeat(3, 1fr);
                                gap: 20px;
                                margin: 0;
                                padding: 0;
                            }

                            /* Responsive: 2 cột trên tablet, 1 cột trên mobile */
                            @media (max-width: 992px) {
                                .product_view_grid.product_col_3 {
                                    grid-template-columns: repeat(2, 1fr);
                                }
                            }
                            @media (max-width: 576px) {
                                .product_view_grid.product_col_3 {
                                    grid-template-columns: 1fr;
                                }
                            }

                            /* Mỗi item là flex-column, kéo cao đều hàng cao nhất */
                            .product_item {
                                display: flex;
                                flex-direction: column;
                                background: #fff;
                                border: 1px solid #eee;
                                overflow: hidden;
                                height: 100%;
                                box-sizing: border-box;
                            }

                            /* Khung ảnh cố định tỉ lệ 1:1 */
                            .product_imagebox {
                                position: relative;
                                width: 100%;
                                aspect-ratio: 1 / 1;
                                overflow: hidden;
                            }
                            @supports not (aspect-ratio: 1/1) {
                                .product_imagebox {
                                    padding-top: 100%;
                                }
                            }

                            /* Ảnh phủ kín khung, tự cắt phần thừa */
                            .product_imagebox img.primary_img {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                            }

                            /* Nút “Thêm vào giỏ hàng” chỉ hiện khi hover khung ảnh */
                            .cart_button {
                                position: absolute;
                                bottom: 10px;
                                left: 50%;
                                transform: translateX(-50%);
                                opacity: 0;
                                transition: opacity 0.3s ease;
                            }
                            .product_imagebox:hover .cart_button {
                                opacity: 1;
                            }

                            /* Phần tên & giá nằm bên dưới, kéo đều về đáy */
                            .product_item_inner {
                                flex: 1;
                                display: flex;
                                flex-direction: column;
                                justify-content: space-between;
                                padding: 12px;
                                box-sizing: border-box;
                            }

                            /* Tên sản phẩm và giá */
                            .product_item_name {
                                margin: 0 0 8px;
                                font-size: 1rem;
                                line-height: 1.2;
                            }
                            .product_item_name a {
                                color: #333;
                                text-decoration: none;
                            }
                            .product_item_price {
                                font-weight: bold;
                                color: #000;
                                white-space: nowrap;
                            }

                        </style>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                <div class="product_view_grid product_col_3">
                                    @foreach($products as $product)
                                        <div class="product_item">
                                            <div class="product_thumb">

                                                <div class="product_imagebox">
                                                    <img class="primary_img" src="{{ $product->image->path ?? '' }}" alt="img">
                                                    <div class="cart_button">
                                                        <a href="javascript:void(0)" class="btn" ng-click="buyNow({{ $product->id }})">
                                                            Thêm vào giỏ hàng
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product_item_inner">
                                                    <div class="label_text">
                                                        <h2 class="product_item_name d-flex align-items-center justify-content-between gap-1 flex-wrap">
                                                            <a href="{{ route('front.getProductDetail', $product->slug) }}">{{ $product->name }}</a>
                                                            <span class="product_item_price"> {{ formatCurrency($product->price) }} đ</span>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                <!-- Product List View -->
                                <div class="product_view_list">
                                    @foreach($products as $product)
                                        <div class="product_item">
                                            <div class="product_thumb">
                                                <div class="product_imagebox">

                                                    <img class="primary_img" src="{{ $product->image->path ?? '' }}" alt="img">
                                                </div>
                                                <div class="product_item_inner">
                                                    <div class="label_text">
                                                        <h2 class="product_item_name d-flex align-items-center justify-content-between gap-1 flex-wrap">
                                                            <a href="{{ route('front.getProductDetail', $product->slug) }}">{{ $product->name }}</a>
                                                        </h2>

                                                        <div class="product_item_price"> {{ formatCurrency($product->price) }} đ</div>

                                                        <div class="cart_button">
                                                            <a href="#" class="btn">
                                                                Thêm vào giỏ hàng
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        {{ $products->links('site.pagination.paginate2') }}

                    </div>

                    <!-- Sidebar  -->
                    <div class="col-lg-3 col-md-4 p-0 mt-5 mt-md-0">
                        <div class="shop_sidebar">
                            <div class="widget">
                                <h2 class="widget-title">
                                    Danh mục
                                </h2>
                                <ul class="wp-block-categories-list wp-block-categories">
                                    @foreach($allCates as $cate)
                                        <li class="cat-item"><a href="{{ route('front.getListProduct', $cate->slug) }}">{{ $cate->name }}</a> <i class="bi bi-chevron-right"></i></li>
                                    @endforeach
                                </ul>
                            </div>



                            <style>

                            </style>
                            <div class="widget">
                                <h2 class="widget-title">
                                    Sản phẩm mới nhất
                                </h2>

                                <div class="products-list">
                                    <ul class="popular_product_list">
                                        @foreach($productsLatest as $proLatest)
                                            <li class="popular_product_item">
                                                <div class="popular_product_image">
                                                    <img class="primary_img" src="{{ $proLatest->image->path ?? '' }}" alt="">
                                                </div>
                                                <div class="popular_product_content">
                                                    <h5 class="product_title"><a href="{{ route('front.getProductDetail', $proLatest->slug) }}">{{ $proLatest->name }}</a></h5>
                                                    <h6 class="product_price">{{ formatCurrency($proLatest->price) }} đ</h6>
                                                </div>
                                            </li>

                                        @endforeach

                                    </ul>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@push('scripts')
    <script>
        app.controller('productPage', function ($rootScope, $scope, cartItemSync, $interval) {
            $scope.errors = [];

            $scope.buyNow = function (productId) {
                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', productId);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': 1
                    },
                    success: function (response) {
                        if (response.success) {
                            $interval.cancel($rootScope.promise);
                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            window.location.href = "/gio-hang";

                        }
                    },
                    error: function () {
                        toastr.warning('Thao tác thất bại !');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }
        })
    </script>
@endpush
