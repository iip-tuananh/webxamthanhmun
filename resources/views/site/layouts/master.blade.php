<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App" ng-cloak>
    <!-- lodaer  -->
    <style>
        /* Nền full màn + căn giữa */
        .preloader-bw{
            position: fixed; inset: 0; z-index: 9999;
            display: flex; align-items: center; justify-content: center;
            background: radial-gradient(1200px 800px at 50% 40%, #000 0%, #0a0a0a 50%, #0a0a0a 100%);
            transition: opacity .45s ease, visibility .45s ease;
            overflow: hidden;
        }
        .preloader-bw.is-hidden{ opacity:0; visibility:hidden; pointer-events:none; }

        /* Vignette nhẹ */
        .preloader-bw::before{
            content:""; position:absolute; inset:-15%;
            background: radial-gradient(closest-side, transparent 55%, rgba(0,0,0,.55) 100%);
            pointer-events:none;
        }

        /* Grain nhẹ */
        .preloader-bw::after{
            content:""; position:absolute; inset:0; mix-blend-mode: soft-light;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(255,255,255,.05) 0 1px, transparent 1px),
                radial-gradient(circle at 60% 80%, rgba(255,255,255,.04) 0 1px, transparent 1px),
                radial-gradient(circle at 30% 50%, rgba(0,0,0,.08) 0 1px, transparent 1px);
            background-size: 3px 3px, 4px 4px, 5px 5px;
            opacity:.35;
            animation: grainFlicker 1.8s steps(2,end) infinite;
        }

        /* Spinner cố định 168px */
        .spinner{
            position: relative; width: 168px; height: 168px;
            display: flex; align-items: center; justify-content: center;
            filter: drop-shadow(0 6px 16px rgba(0,0,0,.6));
        }

        /* Vòng tròn quay BW (dày ~42% bán kính) */
        .spinner .ring{
            position:absolute; inset:0; border-radius:50%;
            background:
                conic-gradient(from 0deg,
                transparent 0deg 250deg, #f2f2f2 250deg 285deg,
                transparent 285deg 320deg, #f2f2f2 320deg 345deg, transparent 345deg 360deg);
            -webkit-mask: radial-gradient(farthest-side, transparent 41%, #000 42%);
            mask: radial-gradient(farthest-side, transparent 41%, #000 42%);
            animation: spin 1.1s linear infinite;
        }
        .spinner .ring::after{
            content:""; position:absolute; inset:18%; border-radius:50%;
            background: radial-gradient(closest-side, rgba(255,255,255,.06), transparent 70%);
            filter: blur(1px);
        }

        /* Logo giữa vòng */
        .spinner .logo{
            width: 108px; /* ~64% của 168px */
            max-width: 68vw;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,.65));
            animation: float 2.2s ease-in-out infinite;
        }

        /* Giảm chuyển động nếu người dùng chọn reduce-motion */
        @media (prefers-reduced-motion: reduce){
            .spinner .ring, .spinner .logo, .preloader-bw::after{ animation: none !important; }
        }

        /* Keyframes */
        @keyframes spin{ to{ transform: rotate(360deg); } }
        @keyframes float{ 0%,100%{ transform: translateY(0) } 50%{ transform: translateY(-6px) } }
        @keyframes grainFlicker{ 0%,100%{ opacity:.35 } 50%{ opacity:.28 } }


    </style>


{{--    <div id="preloader">--}}
{{--        <div class="preloader-inner">--}}
{{--            <div class="spinner">--}}
{{--                <img src="{{ $config->image->path ?? '' }}" alt="img" style="max-width: 150px">--}}
{{--                <img src="{{ $config->image->path ?? '' }}" alt="img" class="wheel" style="max-width: 150px">--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

    <div id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="ring"></div> <!-- Vòng tròn quay -->
                <img src="{{ $config->image->path ?? '' }}" alt="logo" class="logo">
            </div>
        </div>
    </div>

    <!-- loader end  -->

    <div class="pointer bnz-pointer" id="bnz-pointer"></div>
    <div id="translate_select"></div>

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
{{--    <script src="/site/plugins/cursor-effect/cursor-effect.js"></script>--}}

    <!-- Theme Custom JS -->
    <script src="/site/js/theme.js"></script>

    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

    <script type="text/javascript"
            src="/site/js/elementa0d8.js?cb=googleTranslateElementInit">
    </script>
    <script>
        function setActiveLang(lang) {
            const btns = document.querySelectorAll('.lang-switch');
            const slider = document.querySelector('.lang-toggle .slider');
            btns.forEach(el => {
                const isActive = (el.dataset.lang || '').toLowerCase() === lang.toLowerCase();
                el.classList.toggle('act-lang', isActive);
            });
            // move slider
            if (slider){
                slider.style.left = (lang.toLowerCase() === 'vi') ? '2px' : 'calc(50% + 0px)';
            }
        }

        function ensureGCombo(maxWait = 5000){
            return new Promise((resolve, reject) => {
                const start = Date.now();
                (function loop(){
                    const sel = document.querySelector('select.goog-te-combo');
                    if (sel) return resolve(sel);
                    if (Date.now() - start > maxWait) return reject(new Error('goog-te-combo timeout'));
                    setTimeout(loop, 100);
                })();
            });
        }

        async function translateheader(lang) {
            try {
                localStorage.setItem('selectedLang', lang);
                const sel = await ensureGCombo();       // chờ dropdown
                // Map ngắn gọn nếu cần (tuỳ site bạn, Google dùng 'vi'/'en' là ổn)
                const map = { vi: 'vi', en: 'en' };
                sel.value = map[lang] || lang;

                // bắn change theo cả 2 chuẩn
                sel.dispatchEvent(new Event('change', { bubbles: true, cancelable: true }));
                const evOld = document.createEvent('HTMLEvents'); evOld.initEvent('change', true, true); sel.dispatchEvent(evOld);

                setActiveLang(lang);
            } catch(e){
                // Nếu chưa inject xong, thử lại
                setTimeout(() => translateheader(lang), 200);
            }
        }

        // Khởi tạo theo ngôn ngữ đã lưu
        window.addEventListener('DOMContentLoaded', () => {
            const lang = (localStorage.getItem('selectedLang') || 'vi').toLowerCase();
            setActiveLang(lang);
            // tuỳ chọn: tự apply dịch khi tải lại trang
            // translateheader(lang);
        });
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
