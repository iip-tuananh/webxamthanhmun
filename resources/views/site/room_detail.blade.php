@extends('site.layouts.master')

@section('title'){{ $room->name }} - Phòng và Phòng Suite - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$room->image_back->path ?? ''}}@endsection

@section('css')
@endsection

@section('content')
    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{ $room->image_back->path ?? '' }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng khoảng thời gian thật thoải mái tại khách sạn của chúng tôi.</h4>
                <h2>{{ $room->name }}</h2>
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
    <!-- section end  -->
    <!--content-->
    <div class="content">
        <!-- breadcrumbs-wrap  -->
        <div class="breadcrumbs-wrap">
            <div class="container">
                <a href="{{ route('front.home-page') }}">Trang chủ</a><a href="{{ route('front.getListRooms') }}">Phòng và Suite</a><span>{{ $room->name }}</span>
            </div>
        </div>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section notp">
            <div class="section-dec"></div>
            <div class="content-dec2 fs-wrapper"></div>
            <!-- fw-carousel-wrap -->
            <div class="single-carousle-container">
                <div class="single-carousel-wrap ">
                    <!-- fw-carousel  -->
                    <div class="single-carousel   fl-wrap    lightgallery" data-mousecontrol="0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($room->galleries as $gallery)
                                    <div class="swiper-slide hov_zoom">
                                        <img src="{{ $gallery->image->path ?? '' }}" alt="">
                                        <a href="{{ $gallery->image->path ?? '' }}" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- fw-carousel end -->
                    <div class="fw-carousel-button-prev slider-button"><i class="fa-solid fa-caret-left"></i></div>
                    <div class="fw-carousel-button-next slider-button"><i class="fa-solid fa-caret-right"></i></div>
                    <div class="sc-controls fwc_pag">
                        <div class="ss-slider-pagination"></div>
                    </div>
                </div>
                <!-- fw-carousel-wrap end -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dec-container">
                            <div class="dc_dec-item_left"><span></span></div>
                            <div class="text-block">
                                <div class="text-block-title">
                                    <h4>{{ $room->name }}</h4>
                                    <div class="sr-opt">
                                        <div class="sa-price">{{ ($room->price) }}</div>
                                    </div>
                                </div>
                                <div class="room-card-details rcd-single">
                                    <ul>
                                        <li><i class="fa-light fa-crop"></i><span>{{ $room->area }}</span></li>
                                        <li><i class="fa-light fa-user"></i><span>{{ $room->maximum_occupancy }}</span></li>
                                        <li><i class="fa-light fa-bed-front"></i><span>{{ $room->bedrooms }}</span></li>
                                        <li><i class="fa-light fa-landscape"></i><span>{{ $room->view }}</span></li>
                                    </ul>
                                </div>
                                <div class="text-block-container">
                                    {!! $room->description !!}
                                </div>

                                <div class="tbc-separator"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="limit-box"></div>
                <style>
                    .item-related_img {
                        position: relative;
                        display: block;
                        overflow: hidden;
                        aspect-ratio: 4 / 3; /* hoặc 16 / 9, 1 / 1 tùy mong muốn */
                    }

                    .item-related_img img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover; /* Cắt ảnh cho vừa khung mà không méo */
                    }

                    .item-related {
                        display: flex;
                        flex-direction: column;
                        height: 100%;
                    }

                    .item-related h3,
                    .item-related .post-date,
                    .item-related .room-card-details {
                        margin-bottom: 10px;
                    }

                    /* Nếu dùng lưới bootstrap thì thêm fix cho đều hàng */
                    .row-equal-height {
                        display: flex;
                        flex-wrap: wrap;
                    }

                    .row-equal-height > div[class*='col-'] {
                        display: flex;
                    }

                </style>
                <!--post-related-->
                <div class="post-related">
                    <div class="post-related_title">
                        <h6>Các phòng tương tự</h6>
                        <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
                    </div>
                    <!-- post-related -->
{{--                    <div class=" row">--}}
{{--                        @foreach($otherRooms as $otherRoom)--}}
{{--                            <div class="item-related col-lg-4">--}}
{{--                                <a href="{{ route('front.getRoom', $otherRoom->slug) }}" class="item-related_img">--}}
{{--                                    <img src="{{ $otherRoom->image->path ?? '' }}" class="respimg"   alt="">--}}
{{--                                    <div class="overlay"></div>--}}
{{--                                    <span>Xem chi tiết</span>--}}
{{--                                </a>--}}
{{--                                <h3><a href="{{ route('front.getRoom', $otherRoom->slug) }}">{{ $otherRoom->name }}</a></h3>--}}
{{--                                <span class="post-date post-price">{{ $otherRoom->price }}</span>--}}
{{--                                <div class="room-card-details">--}}
{{--                                    <ul>--}}
{{--                                        <li><i class="fa-light fa-crop"></i><span>{{ $otherRoom->area }}</span></li>--}}
{{--                                        <li><i class="fa-light fa-user"></i><span>{{ $otherRoom->maximum_occupancy }}</span></li>--}}
{{--                                        <li><i class="fa-light fa-bed-front"></i><span>{{ $otherRoom->bedrooms }}</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}




                    <div class="row row-equal-height">
                        @foreach($otherRooms as $otherRoom)
                            <div class="item-related col-lg-4 d-flex flex-column">
                                <a href="{{ route('front.getRoom', $otherRoom->slug) }}" class="item-related_img">
                                    <img src="{{ $otherRoom->image->path ?? '' }}" class="respimg" alt="">
                                    <div class="overlay"></div>
                                    <span>Xem chi tiết</span>
                                </a>
                                <h3><a href="{{ route('front.getRoom', $otherRoom->slug) }}">{{ $otherRoom->name }}</a></h3>
                                <span class="post-date post-price">{{ $otherRoom->price }}</span>
                                <div class="room-card-details mt-auto">
                                    <ul>
                                        <li><i class="fa-light fa-crop"></i><span>{{ $otherRoom->area }}</span></li>
                                        <li><i class="fa-light fa-user"></i><span>{{ $otherRoom->maximum_occupancy }}</span></li>
                                        <li><i class="fa-light fa-bed-front"></i><span>{{ $otherRoom->bedrooms }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>



                </div>
                <!-- post-related  end-->
            </div>
        </div>
        <!-- section end  -->
        <div class="content-dec"><span></span></div>
    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
