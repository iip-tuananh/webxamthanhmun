<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App" ng-cloak>
    <!-- lodaer  -->
    <div id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <img src="{{ $config->image->path ?? '' }}" alt="img" style="max-width: 150px">
                <img src="{{ $config->image->path ?? '' }}" alt="img" class="wheel" style="max-width: 150px">
            </div>

        </div>
    </div>
    <!-- loader end  -->

    <div class="pointer bnz-pointer" id="bnz-pointer"></div>

    @include('site.partials.header')
    @include('site.partials.mobile_menu')

    @yield('content')

    @include('site.partials.footer')


    @include('site.partials.angular_mix')

    <!-- Core JS -->
    <script src="/site/js/jquery-3.6.0.min.js"></script>

    <!-- Framework -->
    <script src="/site/js/bootstrap.min.js"></script>

    <!-- WOW Scroll Effect -->
    <script src="/site/plugins/wow/wow.min.js"></script>

    <!-- Swiper Slider -->
    <script src="/site/plugins/swiper/swiper-bundle.min.js"></script>
    <script src="/site/plugins/swiper/swiper-gl.min.js"></script>

    <!-- Odometer Counter -->
    <script src="/site/plugins/odometer/appear.js"></script>
    <script src="/site/plugins/odometer/odometer.js"></script>

    <!-- Projects -->
{{--    <script src="/site/plugins/isotope/isotope.pkgd.min.js"></script>--}}
{{--    <script src="/site/plugins/isotope/imagesloaded.pkgd.min.js"></script>--}}
{{--    <!-- <script src="/site/plugins/isotope/jquery.hoverdir.js"></script>-->--}}
{{--    <script src="/site/plugins/isotope/tilt.jquery.js"></script>--}}
{{--    <script src="/site/plugins/isotope/isotope-init.js"></script>--}}

    <!-- Fancybox -->
    <script src="/site/plugins/fancybox/jquery.fancybox.min.js"></script>

    <!-- Flatpickr -->
    <script src="/site/plugins/flatpickr/flatpickr.min.js"></script>

    <!-- Nice Select -->
    <script src="/site/plugins/nice-select/jquery.nice-select.min.js"></script>





    <!-- Cursor Effect -->
    <script src="/site/plugins/cursor-effect/cursor-effect.js"></script>

    <!-- Theme Custom JS -->
    <script src="/site/js/theme.js"></script>

    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>


    <script>
        app.controller('headerPartial', function ($rootScope, $scope, cartItemSync, $interval) {
            $scope.hasItemInCart = true;
            $scope.cart = cartItemSync;

            // xóa item trong giỏ
            $scope.removeItem = function (product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.cart.items = response.items;
                            $scope.cart.count = Object.keys($scope.cart.items).length;
                            $scope.cart.totalCost = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            if ($scope.cart.count == 0) {
                                $scope.hasItemInCart = false;
                            }
                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }


        });

        // đồng bộ hiển thị số lượng item giỏ hàng
        app.factory('cartItemSync', function ($interval) {
            var cart = {items: null, total: null};

            cart.items = @json($cartItems);
            cart.count = {{$cartItems->sum('quantity')}};
            cart.total = {{$totalPriceCart}};

            return cart;
        });
    </script>

    @stack('scripts')
</body>

</html>
