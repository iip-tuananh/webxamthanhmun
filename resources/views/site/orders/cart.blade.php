@extends('site.layouts.master')
@section('title')
    Giỏ hàng
@endsection

@section('css')
@endsection

@section('content')
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

        .loading-spin {
            display: none;
        }

        .loading-spin {
            border: 6px solid #f3f3f3;      /* nền vòng tròn */
            border-top: 6px solid rgba(0,0,0,0.6);  /* nét trên màu khác để thấy chuyển động */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        #overlay {
            display: none;               /* ẩn khi không loading */
            position: fixed;
            top: 0; left: 0;
            width: 100vw;  height: 100vh;
            background: rgba(0,0,0,0.3);
            justify-content: center;    /* căn giữa spinner */
            align-items: center;
            z-index: 9999;
        }
    </style>
    <main class="wrapper" ng-controller="Cart">
        <div class="wptb-page-heading">
            <div class="wptb-item--inner" style="background-image: url({{ $banner->image->path ?? '' }});">
                <div class="wptb-item-layer wptb-item-layer-one">
                    <img src="/site/img/more/circle.png" alt="img">
                </div>
                <h2 class="wptb-item--title ">Giỏ hàng</h2>
            </div>
        </div>

        <!-- Shopping Cart -->
        <section class="shopping_cart">
            <div class="container">
                <form>
                    <table class="cart_table">
                        <tr class="cart_header">
                            <th class="cart_header_image">Hình ảnh</th>
                            <th class="cart_header_title">Sản phẩm</th>
                            <th class="cart_header_price">Đơn giá</th>
                            <th class="cart_header_quantity">Số lượng</th>
                            <th class="cart_header_total">Thành tiền</th>
                            <th class="cart_header_removal"></th>
                        </tr>
                        <tr class="cart_content cart-item" ng-repeat="item in items" ng-if="checkCart">
                            <td class="cart_image"><img src="<% item.attributes.image %>" alt="img"/></td>
                            <td class="cart_title"><% item.name %></td>
                            <td class="cart_price"><span class="product_per_price"><% item.price | number %>₫</span></td>
                            <td class="cart_quantity">
                                <div class="product_quantity_inner">
										<span class="qty_btn qty-btn minus product_quantity_subtract" ng-click="decrementQuantity(item); changeQty(item.quantity, item.id)">
											<i class="bi bi-dash-lg"></i>
										</span>
                                    <input type="number" class="qty-input" ng-model="item.quantity" ng-change="changeQty(item.quantity, item.id)" id="product_quantity_input" value="<%item.quantity%>">
                                    <span class="qty_btn qty-btn plus product_quantity_add" ng-click="incrementQuantity(item); changeQty(item.quantity, item.id)">
											<i class="bi bi-plus-lg"></i>
										</span>
                                </div>
                            </td>
                            <td class="cart_total"><span class="product_total_price"><% (item.price * item.quantity) | number %>₫</span></td>
                            <td class="cart_removal"><a href="javascript:void(0)" ng-click="removeItem(item.id)"><i class="bi bi-x-lg"></i></a></td>
                        </tr>
                        <p ng-if="! checkCart">Chưa có sản phẩm nào trong giỏ hàng</p>
                    </table>
                    <div class="couponcart" ng-if="checkCart">
                        <div class="cartupdate">
                           <a href="/thanh-toan">
                               <button type="button" class="btn btn-three">
                                   <div class="btn-wrap">
                                       <span class="text-first">Thanh toán</span>
                                       <span class="text-second">Thanh toán</span>
                                   </div>
                               </button>
                           </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <div class="overlay" id="overlay">
            <div class="loading-spin large centered"></div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        app.controller('Cart', function ($rootScope, $scope, $interval, cartItemSync) {
            $scope.items = @json($cartCollection);
            $scope.total = "{{$total_price}}";
            $scope.checkCart = true;
            $scope.countItem = Object.keys($scope.items).length;


            jQuery(document).ready(function () {
                if ($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }
            })

            $scope.changeQty = function (qty, product_id) {
                updateCart(qty, product_id)
            }

            $scope.incrementQuantity = function (product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function (product) {
                product.quantity = Math.max(product.quantity - 1, 0);
            };

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "/update-cart",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    beforeSend: function() {
                        jQuery('.loading-spin').show();
                        showOverlay();
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        jQuery('.loading-spin').hide();
                        hideOverlay();
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeItem = function (product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.countItem = Object.keys($scope.items).length;

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            function showOverlay() {
                var overlay = document.getElementById('overlay');
                overlay.style.display = 'flex';
            }

            function hideOverlay() {
                var overlay = document.getElementById('overlay');
                overlay.style.display = 'none';
            }

        })

    </script>
@endpush
