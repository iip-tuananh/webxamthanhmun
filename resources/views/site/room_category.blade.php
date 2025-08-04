@extends('site.layouts.master')

@section('title')Phòng và Phòng Suite - {{ $config->web_title }}@endsection
@section('description')
@endsection
@section('image')
@endsection

@section('css')

@endsection

@section('content')

    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="/site/images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng những giây phút thư giãn tại khách sạn của chúng tôi.</h4>
                <h2>Phòng và Suite</h2>
                <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
            </div>
        </div>
        <div class="hero-section-scroll">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
        <div class="dec-corner dc_lb"></div>
        <div class="dec-corner dc_rb"></div>
        <div class="dec-corner dc_rt"></div>
        <div class="dec-corner dc_lt"></div>
    </div>

    <div class="content">
        <!-- breadcrumbs-wrap  -->
        <div class="breadcrumbs-wrap">
            <div class="container">
                <a href="{{ route('front.home-page') }}">Trang chủ</a><span>Phòng và Suite</span>
            </div>
        </div>
        <style>
            /* 1) Đặt grid container nếu chưa có */
            .gallery-items.grid-big-pad {
                display: grid !important;
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)) !important;
                gap: 30px !important; /* khoảng cách giữa các khối */
            }

            /* 2) Mỗi item thành flex-column */
            .gallery-item {
                display: flex !important;
                flex-direction: column !important;
                background: #fff; /* nếu cần */
                /*border: 1px solid #eee;*/
                border-radius: 8px;
                overflow: hidden;
            }

            /* 3) Giới hạn chiều cao ảnh */
            .gallery-item .grid-item-holder {
                flex: 0 0 auto;
                height: 280px;         /* chỉnh theo tỉ lệ bạn muốn */
                overflow: hidden;
            }
            .gallery-item .grid-item-holder img {
                width: 100%;
                height: 100%;
                object-fit: cover;     /* căng ảnh đầy vùng, cắt bớt nếu khác tỉ lệ */
            }

            /* 4) Cho phần details co giãn */
            .gallery-item .grid-item-details {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                flex: 1 1 auto;
                padding: 16px;
            }

            /* 5) Đảm bảo nút “Xem chi tiết” luôn ở dưới cùng */
            .gallery-item .grid-item-details .gid_link {
                margin-top: 16px;
                align-self: flex-start;
            }

            /* 6) Kiểu dáng nội dung */
            .gallery-item .grid-item-details h3 {
                margin: 0 0 8px;
                font-size: 1.1rem;
            }
            .gallery-item .grid-item-details p {
                flex: 1 0 auto;
                margin-bottom: 12px;
                color: #555;
                font-size: 0.95rem;
            }
            .gallery-item .grid-item-details .room-card-details ul {
                display: flex;
                /*gap: 12px;*/
                list-style: none;
                padding: 0;
                margin: 0 0 12px;
            }
            .gallery-item .grid-item-details .room-card-details li {
                display: flex;
                align-items: center;
                font-size: 0.9rem;
                color: #666;
            }
            .gallery-item .grid-item-details .room-card-details li i {
                margin-right: 4px;
            }
            /*.gallery-item .grid-item-details .grid-item_price span {*/
            /*    font-weight: bold;*/
            /*    font-size: 1.1rem;*/
            /*    color: #2a7ae2;*/
            /*}*/

        </style>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section" style="padding-top: 0" ng-controller="roomPage">
            <div class="container">
                <div class="dec-container">
                    <div class="dc_dec-item_left"><span></span></div>
                    <div class="dc_dec-item_right"><span></span></div>
                    <div class="text-block">
                        <!-- gallery start -->
                        <div class="gallery-items grid-big-pad  lightgallery  ">
                            @foreach($rooms as $room)
                                <div class="gallery-item desserts">
                                    <div class="grid-item-holder hov_zoom">
                                        <img src="{{ $room->image->path ?? '' }}"    alt="">
                                        <a href="{{ $room->image->path ?? '' }}" class="box-media-zoom   single-popup-image"><i class="fa-light fa-magnifying-glass"></i></a>
                                        <div class="like-btn" ng-click="addToMyHeart({{ $room->id }})"><i class="fa-light fa-heart"></i> <span>Yêu thích</span></div>
                                    </div>
                                    <div class="grid-item-details">
                                        <h3><a href="{{ route('front.getRoom', $room->slug) }}">{{ $room->name }}</a>  </h3>
                                        <p>{{ $room->intro }}</p>
                                        <div class="room-card-details">
                                            <ul>
                                                <li><i class="fa-light fa-crop"></i><span>{{ $room->area }}</span></li>
                                                <li><i class="fa-light fa-user"></i><span>{{ $room->maximum_occupancy }}</span></li>
{{--                                                <li><i class="fa-light fa-bed-front"></i><span>{{ $room->bedrooms }}</span></li>--}}
                                            </ul>
                                        </div>
                                        <div class="grid-item_price">
                                            <span>{{ $room->price }}</span>
                                        </div>
                                        <a href="{{ route('front.getRoom', $room->slug) }}" class="gid_link"><span>Xem chi tiết</span> <i class="fa-light fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- pagination-->
                {{ $rooms->links('site.pagination.paginate2') }}
                <!-- pagination end-->
            </div>
        </div>
        <!-- section end  -->
        <div class="content-dec"><span></span></div>
    </div>

@endsection

@push('scripts')
    <script>
        app.controller('roomPage', function ($rootScope, $scope, $interval, loveItemSync) {

            $scope.addToMyHeart = function (roomId) {
                url = "{{route('love.add.item', ['roomId' => 'roomId'])}}";
                url = url.replace('roomId', roomId);

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
                            toastr.success(response.message);

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function () {
                                loveItemSync.items = response.wishlistItems;
                                loveItemSync.count = response.count;
                            }, 1000);
                        } else {
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.toastr('Thao tác thất bại !');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }
        })
    </script>
@endpush
