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
            <div class="wptb-item--inner" style="background-image: url('../assets/img/background/page-header-bg-12.jpg');">
                <div class="wptb-item-layer wptb-item-layer-one">
                    <img src="{{ @$product->category->image->path ?? '' }}" alt="img">
                </div>
                <h2 class="wptb-item--title ">{{ $product->name }}</h2>
            </div>
        </div>

        <style>
            @media (max-width: 768px) {
                .product_view {
                    padding-top: 0;
                }
            }
        </style>

        <section class="product_view">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 pe-lg-5">
                        <div class="product_left">
                            <div class="product_zoom">
                                <ul class="product_zoom_button_group" data-lenis-prevent="">
                                    <li class="product_zoom_button">
                                        <a class="selected" href="#" style="background-image: url({{ $product->image->path ?? '' }});"></a>
                                    </li>
                                    @foreach($product->galleries as $gallery)
                                        <li class="product_zoom_button">
                                            <a href="#" style="background-image: url({{ $gallery->image->path ?? '' }});"></a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="product_zoom_container">
                                    <div class="product_zoom_info selected">
                                        <div class="product_image_zoom">
                                            <img src="{{ $product->image->path ?? '' }}" alt="img">
                                        </div>
                                    </div>
                                    @foreach($product->galleries as $gallery)
                                        <div class="product_zoom_info">
                                            <div class="product_image_zoom">
                                                <img src="{{ $gallery->image->path ?? '' }}" alt="img">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 ps-lg-0 pe-lg-5">
                        <div class="product_right">
                            <div class="product_info">
                                <h2 class="product_title">{{ $product->name }}</h2>
                                <div class="product_rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="product_price">
                                <span class="product_per_price" data-price="15.00"></span><span class="product_total_price">{{ formatCurrency($product->price) }} đ</span>
                            </div>
                            <div class="product_description">
                              {{ $product->intro }}
                            </div>
                            <div class="product_view_bottom">
                                <div class="product_quantity">
                                    <div class="pproduct_quantity_label">Số lượng</div>
                                    <div class="product_quantity_inner quantity-selector">
                                            <span type="button" class="qty-btn minus product_quantity_subtract">
                                                <i class="bi bi-dash-lg"></i>
                                            </span>
                                        <input type="number" class="qty-input quantity" id="product_quantity_input" placeholder="0" value="1" min="1" ng-model="item_qty">
                                        <span type="button" class="qty-btn plus product_quantity_add">
                                                <i class="bi bi-plus-lg"></i>
                                            </span>
                                    </div>

{{--                                    <div class="quantity-selector">--}}
{{--                                        <button type="button" class="qty-btn minus">–</button>--}}
{{--                                        <input type="number" class="qty-input" value="1" min="1"  ng-model="item_qty">--}}
{{--                                        <button type="button" class="qty-btn plus">+</button>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            <div class="cart_button">
                                <a href="javascript:void(0)" ng-click="buyNow({{ $product->id }})" class="btn btn-three w-100">
                                    <div class="btn-wrap">
                                        <span class="text-first" >Thêm vào giỏ hàng</span>
                                        <span class="text-second" >Thêm vào giỏ hàng</span>
                                    </div>
                                </a>
                            </div>

                            <div class="product_view_bottom_credential">
                                <ul class="px-0 mb-0">
                                    <li class="categories"><span>Danh mục:</span> <a href="#">{{ $product->category->name ?? '' }}</a></li>
                                    <li class="sku"><span>Tình trạng:</span> {{ $product->state == 1 ? 'Còn hàng' : 'Hết hàng' }}</li>
                                </ul>
                            </div>
                            <div class="product_social_share">
                                <ul>
                                    <li class="label_text">Share:</li>
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                    <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                    <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="product_details_section">
            <div class="container">
                <div class="product_details_tab">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="active" data-bs-toggle="tab" href="#description" style="color: #FFFFFF">Thông tin sản phẩm</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" tabindex="0">
                            {!! $product->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="related_products">
            <div class="container">
                <h4 class="widget-title">Sản phẩm tương tự</h4>
                <div class="product_view_grid product_col_4">
                    @foreach($otherProducts as $otherProduct)
                        <div class="product_item">
                            <div class="product_thumb">
                                <div class="product_imagebox">
                                    <img class="primary_img" src="{{ $otherProduct->image->path ?? '' }}" alt="img">
                                    <div class="cart_button">
                                        <a href="{{ route('front.getProductDetail', $otherProduct->slug) }}" class="btn">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                                <div class="product_item_inner">
                                    <div class="label_text">
                                        <h2 class="product_item_name d-flex align-items-center justify-content-between gap-1 flex-wrap">
                                            <a href="{{ route('front.getProductDetail', $otherProduct->slug) }}">{{ $otherProduct->name }}</a>
                                            <span class="product_item_price">{{ formatCurrency($otherProduct->price) }} đ</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.quantity-selector');
            if (!container) return;

            const input = container.querySelector('.qty-input');
            const btnMinus = container.querySelector('.qty-btn.minus');
            const btnPlus  = container.querySelector('.qty-btn.plus');

            btnMinus.addEventListener('click', () => {
                let val = parseInt(input.value) || 1;
                if (val > parseInt(input.min)) {
                    input.value = val - 1;
                    input.dispatchEvent(new Event('change'));
                }
            });

            btnPlus.addEventListener('click', () => {
                let val = parseInt(input.value) || 0;
                input.value = val + 1;
                input.dispatchEvent(new Event('change'));
            });
        });

    </script>
    <script>
        app.controller('productPage', function ($rootScope, $scope, cartItemSync,  $interval) {
            $scope.errors = [];
            $scope.sendSuccess = false;
            $scope.submitForm = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#contactForm').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#contactForm')[0].reset();
                            $scope.errors = [];
                            $scope.sendSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }

            $scope.product = @json($product);
            $scope.buyNow = function () {
                if(! parseInt($scope.item_qty)) {
                    alert('Vui lòng nhập số lượng');
                    return;
                }

                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', {{$product->id}});

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': parseInt($scope.item_qty)
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
