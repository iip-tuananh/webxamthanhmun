@extends('site.layouts.master')

@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->favicon->path ?? ''}}@endsection

@section('css')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    />
    <!-- JS Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection


@section('content')

    <!-- Main Wrapper-->
    <style>
        /* 1. Đặt position: relative cho container text */
        .wptb-slider--inner .wptb-item--inner {
            position: relative;
            z-index: 1;
        }

        /* 2. Thêm overlay bán trong suốt */
        .wptb-slider--inner .wptb-item--inner::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* đen mờ 40% */
            z-index: -1;
        }

        /* 3. Đảm bảo chữ nổi trên overlay */
        .wptb-slider--inner .wptb-item--title,
        .wptb-slider--inner .wptb-item--description {
            position: relative;
            color: #fff;                     /* chữ trắng nổi bật */
            text-shadow: 0 2px 4px rgba(0,0,0,0.6);
        }

    </style>
    <main class="wrapper" ng-controller="homePage">
        <!-- Slider Section -->
{{--        <section class="wptb-slider style3">--}}
{{--            <div class="swiper-container wptb-swiper-slider-three">--}}
{{--                <!-- swiper slides -->--}}
{{--                <div class="swiper-wrapper">--}}
{{--                    <!-- Slide Item -->--}}
{{--                    @foreach($banners as $banner)--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <div class="wptb-slider--item">--}}
{{--                                <div class="wptb-slider--image" style="background-image: url({{ $banner->image->path ?? '' }});"></div>--}}

{{--                                <div class="wptb-slider--inner">--}}
{{--                                    <div class="wptb-item--inner">--}}
{{--                                        <div class="container">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <!-- Layer Image -->--}}
{{--                                <div class="wptb-item-layer wptb-item-layer-one">--}}
{{--                                    <img src="/site/img/slider/layer-4.png" alt="img">--}}
{{--                                </div>--}}

{{--                                <!-- Layer Image -->--}}
{{--                                <div class="wptb-item-layer wptb-item-layer-two">--}}
{{--                                    <img src="/site/img/slider/layer-5.png" alt="img">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                    <!-- End Slide Item -->--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Bottom Pane -->--}}
{{--            <div class="wptb-bottom-pane justify-content-center">--}}
{{--                <!-- pagination dots -->--}}
{{--                <div class="wptb-swiper-dots style2">--}}
{{--                    <div class="swiper-pagination"></div>--}}
{{--                </div>--}}

{{--                <!-- Swiper Navigation -->--}}
{{--                <div class="wptb-swiper-navigation style3">--}}
{{--                    <div class="wptb-swiper-arrow swiper-button-prev"></div>--}}
{{--                    <div class="wptb-swiper-arrow swiper-button-next"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </section>--}}




        <style>
            /* styles.css */
            .video-banner {
                position: relative;
                width: 100vw;
                height: 100vh;  /* full viewport height */
                overflow: hidden;
            }



            .video-wrapper {
                position: absolute;
                top: 0; left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
            }

            .video-iframe {
                position: absolute;
                top: 50%; left: 50%;
                /* đảm bảo cover cả chiều rộng và chiều cao */
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                transform: translate(-50%, -50%);
                border: none;
            }





        </style>


        <section class="video-banner">
            <div class="video-wrapper">
                @php
                    // Giả sử mỗi $banner có trường video_link như "https://www.youtube.com/watch?v=XYZ123"
                    preg_match('/(?:v=|youtu\.be\/)([^&]+)/',$config->youtube, $m);
                    $videoId = $m[1] ?? '';
                @endphp
                <iframe
                    class="video-iframe"
                    src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&rel=0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>
            </div>

            {{-- nếu cần overlay (nút, text, layer) thì đặt ở đây --}}
            <div class="banner-overlay">
                <div class="unmute-button">🔊 Bật tiếng</div>
            </div>
        </section>



        <!-- khối giới thiệu -->
        <style>
            /* Desktop mặc định */
            .wptb-about-two {
                padding: 75px 0;
            }

            /* Mobile: dưới 768px */
            @media (max-width: 768px) {
                .wptb-about-two {
                    padding: 40px 0;
                }
            }

        </style>

        <section class="wptb-about-two bg-transparent">
            <div class="container">
                <div class="wptb-heading wow fadeInLeft"  data-wow-delay="0.3s"
                     data-wow-duration="0.8s">
                    <div class="wptb-item--inner">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
{{--                                <h6 class="wptb-item--subtitle"><span>01 //</span>{{ $about->title_1 }}</h6>--}}
                                <h1 class="wptb-item--title">{{ $about->title_2 }}</h1>
                            </div>
                            <div class="col-lg-5 text-lg-end">
                                <div class="wptb-item--button">
                                    <a href="#contact-form" class="btn btn-two creative text-uppercase">
                                            <span class="btn-wrap">
                                                <span class="text-first">Đặt Lịch</span>
                                                <span class="text-second"><i class="bi bi-arrow-up-right"></i></span>
                                            </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .img-about {
                        overflow: hidden;
                        border-radius: 12px;
                    }

                </style>
                <div class="row">
                    <div class="col-md-6">
                        <div class="wptb-image-single wow fadeInUp" data-wow-delay="0.5s"
                             data-wow-duration="1.2s">
                            <div class="wptb-item--inner">
                                <div class="wptb-item--image position-relative">
                                    <img class="img-about" src="{{ $about->image->path ?? '' }}" alt="img">

                                    <div class="wptb-item--button round-button">
                                        <a class="btn btn-two" href="{{ route('front.about_page') }}">
                                                <span class="btn-wrap">
                                                    <span class="text-first">Về chúng tôi</span>
                                                    <span class="text-second"> <i class="bi bi-arrow-up-right"></i> <i class="bi bi-arrow-up-right"></i> </span>
                                                </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="wptb-item-layer wptb-item-layer-one both-version">
                                <img src="/site/img/more/light-2.png" alt="img">
                                <img src="/site/img/more/light-2-light.png" alt="img">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ps-md-5 mt-4 mt-md-0 wow fadeInUp" data-wow-delay="0.5s"
                         data-wow-duration="1.2s">
                        <div class="wptb-about--text ps-md-5">
                            <h3>{{ $about->title_1 }}</h3>
                            <p class="wptb-about--text-one">{{ $about->intro_text }}</p>
                            <p>{{ $about->body_text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- khối dịch vụ -->
        <style>
            /* Scope chỉ vào gallery-two */
            .swiper-gallery-two .swiper-wrapper {
                /* Bắt các slide stretch đều theo chiều cao cao nhất */
                align-items: stretch !important;
            }

            /* Mỗi slide trở thành flex container theo chiều dọc */
            .swiper-gallery-two .swiper-slide {
                display: flex !important;
            }

            /* Thêm phần wrapper để kéo sát toàn bộ chiều cao slide */
            .swiper-gallery-two .swiper-slide .grid-item {
                display: flex !important;
                flex-direction: column !important;
                width: 100% !important;
            }

            /* Phần inner cũng flex dọc, cho phép holder chiếm hết phần còn lại */
            .swiper-gallery-two .swiper-slide .wptb-item--inner {
                display: flex !important;
                flex-direction: column !important;
                flex: 1 1 auto !important;
            }

            /* Ảnh cố định chiều cao tự nhiên, không giãn */
            .swiper-gallery-two .swiper-slide .wptb-item--image {
                flex: 0 0 auto !important;
            }

            /* Phần meta (tiêu đề + mô tả) giãn đầy phần còn lại */
            .swiper-gallery-two .swiper-slide .wptb-item--holder {
                flex: 1 1 auto !important;
            }

            /* 1. Ép swiper-wrapper stretch đầy cao nhất */
            .swiper-gallery-two .swiper-wrapper {
                align-items: stretch !important;
            }

            /* 2. Mỗi slide thành flex-col, cao 100% */
            .swiper-gallery-two .swiper-slide {
                display: flex !important;
                flex-direction: column !important;
                height: 100% !important;
            }

            /* 3. Grid-item lấp đầy slide */
            .swiper-gallery-two .swiper-slide .grid-item {
                display: flex !important;
                flex-direction: column !important;
                flex: 1 1 auto !important;
            }

            /* 4. Inner cũng flex-col, để image không giãn, holder giãn */
            .swiper-gallery-two .wptb-item--inner {
                display: flex !important;
                flex-direction: column !important;
                flex: 1 1 auto !important;
            }

            /* 5. Khung ảnh cố định tỉ lệ, overflow hidden */
            .swiper-gallery-two .wptb-item--image {
                /* Ví dụ bạn muốn 16:9 — thay tỉ lệ nếu cần */
                aspect-ratio: 16 / 9;
                overflow: hidden;
                flex: 0 0 auto !important;
            }

            /* 6. Ảnh cover đầy khung */
            .swiper-gallery-two .wptb-item--image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /* 7. Phần text meta giãn đầy phần còn lại, scroll nếu dài */
            .swiper-gallery-two .wptb-item--holder {
                flex: 1 1 auto !important;
                overflow: auto;
            }


            /* Scope chỉ vào gallery-two */
            .swiper-gallery-two .wptb-item--image {
                position: relative;
                overflow: hidden;
            }

            /* Lớp nền mờ */
            .swiper-gallery-two .wptb-item--image::before {
                content: "";
                position: absolute;
                inset: 0;                         /* top/right/bottom/left = 0 */
                background: rgba(0, 0, 0, 0.4);   /* độ mờ 40% đen */
                pointer-events: none;
            }

            /* Đảm bảo icon/đường link nằm trên overlay */
            .swiper-gallery-two .wptb-item--image .wptb-item--link {
                position: relative;
                z-index: 1;
            }

            /* Nếu bạn cũng muốn blur ảnh bên dưới lớp overlay */
            .swiper-gallery-two .wptb-item--image img {
                display: block;
                width: 100%;
                height: auto;
                object-fit: cover;
                /*filter: brightness(0.8) blur(2px);*/
            }

            @media (max-width: 768px) {
                .p-content-service {
                    display: none;
                }
            }
        </style>

        <style>
            /* Đảm bảo container ảnh là vị trí tham chiếu */
            .wptb-item--image { position: relative; }

            /* Badge giá: đơn giản, đen-trắng, bo tròn */
            .svc-price-badge{
                position:absolute; top:10px; right:10px;
                display:flex; align-items:baseline; gap:.4rem;
                padding:.35rem .6rem;
                background:rgba(0,0,0,.65);
                color:#f2f2f2;
                border:1px solid rgba(242,242,242,.25);
                border-radius:999px;
                font-size:1.22rem; line-height:1.1;
                letter-spacing:.2px;
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
                box-shadow:0 6px 16px rgba(0,0,0,.25);
                z-index:3;
            }

            .svc-price-badge .svc-label{
                text-transform:uppercase;
                font-size:.72rem;
                opacity:.85;
            }

            .svc-price-badge .svc-value{
                font-weight:600;
            }

            /* Mobile: gọn hơn, ẩn nhãn để tiết kiệm diện tích */
            @media (max-width:576px){
                .svc-price-badge{ top:8px; right:8px; padding:.25rem .5rem; font-size:.75rem; }
                /*.svc-price-badge .svc-label{ display:none; }*/
            }

        </style>
        <section class="wptb-album-one" style="padding: 0 !important;">
            <div class="container-full">
                <div class="wptb-heading mb-0 wow fadeInRight">
                    <div class="wptb-item--inner text-center">
{{--                        <h6 class="wptb-item--subtitle"><span>02 //</span> Dịch vụ</h6>--}}
                        <h1 class="wptb-item--title lg">Các dịch vụ tại {{ $config->web_title }}</h1>
                    </div>
                </div>

                <div class="swiper-container swiper-gallery-two has-radius wow fadeInLeftBig"  data-wow-delay="0.3s"
                     data-wow-duration="0.8s">
                    <div class="swiper-wrapper">
                        <!-- Item -->
                        @foreach($services as $service)
                            <div class="swiper-slide">
                                <div class="grid-item">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="{{ $service->image->path ?? '' }}" alt="img">
                                            <a class="wptb-item--link" href="{{ route('front.getServiceDetail', $service->slug) }}"><i class="bi bi-chevron-right"></i></a>

                                            @php
                                                $price = $service->price;
                                            @endphp
                                            @if(!is_null($price))
                                                <div class="svc-price-badge" aria-label="Giá tham khảo">
                                                    <span class="svc-label">Giá tham khảo</span>
                                                    <span class="svc-value">{{ number_format($price, 0, ',', '.') }}₫</span>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <h4><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></h4>
                                                <p class="p-content-service">
                                                    {{ $service->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Swiper Navigation -->
                    <div class="wptb-swiper-navigation style2">
{{--                        <div class="wptb-swiper-arrow swiper-button-prev"></div>--}}
{{--                        <div class="wptb-swiper-arrow swiper-button-next"></div>--}}
                    </div>
                </div>

{{--                <div class="shadow-heading">--}}
{{--                    <h1 class="wptb-item--title">Portfolio</h1>--}}
{{--                </div>--}}
            </div>
        </section>



        <style>
            .hero-banner{
                position:relative; width:100%;
                min-height:clamp(280px, 48vw, 520px);
                display:flex; align-items:center;
                overflow:hidden;
                margin-bottom: 60px;
            }

            /* Ảnh nền */
            .hero-banner__media{ position:absolute; inset:0; }
            .hero-banner__media img{
                width:100%; height:100%; object-fit:cover; object-position:center;
                filter:saturate(.95) contrast(1);
            }

            /* Lớp phủ tối để chữ nổi */
            .hero-banner__overlay{
                position:absolute; inset:0;
                background:linear-gradient(90deg, rgba(0,0,0,.6), rgba(0,0,0,.45) 40%, rgba(0,0,0,.6));
            }

            /* Nội dung */
            .hero-banner__content{
                position:relative; z-index:2; color:#fff; text-align:center;
                width:100%; max-width:1024px; margin-inline:auto;
                padding:clamp(20px, 3vw, 48px);
            }

            .hero-title{
                font-size:clamp(22px, 4.2vw, 38px);
                font-weight:700; letter-spacing:.5px; text-transform:uppercase;
            }

            .hero-subtitle{
                margin-top:.5rem; font-size:clamp(14px, 2vw, 18px);
                opacity:.9;
            }

            /* Nút CTA – đen trắng tối giản */
            .btn-hero{
                display:inline-flex; align-items:center; justify-content:center;
                margin-top:clamp(10px, 2vw, 18px);
                padding:.85rem 1.4rem; border-radius:999px;
                border:1px solid #fff; color:#fff; background:transparent;
                text-transform:uppercase; font-weight:600; letter-spacing:.4px;
                transition:background .2s ease, color .2s ease, transform .2s ease, box-shadow .2s ease;
                backdrop-filter:blur(4px);
            }
            .btn-hero:hover{
                background:#fff; color:#111; transform:translateY(-1px);
                box-shadow:0 10px 24px rgba(0,0,0,.25);
            }

            /* Mobile tinh gọn */
            @media (max-width:576px){
                .hero-banner{ min-height:340px; }
                .hero-subtitle{ opacity:.85; }
            }

        </style>

        <section class="hero-banner wow fadeInLeft"  data-wow-delay="0.3s"
                 data-wow-duration="0.8s" aria-label="{{ $bannerService->title }}">
            <div class="hero-banner__media">
                <img src="{{ $bannerService->image->path ?? asset('images/placeholder.jpg') }}"
                     alt="{{ $bannerService->title ?? 'Banner' }}" loading="lazy">
            </div>

            <div class="hero-banner__overlay"></div>

            <div class="hero-banner__content container">
                @if(!empty($bannerService->title))
                    <h1 class="hero-title">{{ $bannerService->title }}</h1>
                @endif

                @if(!empty($bannerService->subtitle))
                    <p class="hero-subtitle">{{ $bannerService->subtitle }}</p>
                @endif

                @if(!empty($bannerService->link))
                    <a class="btn-hero" href="{{ $bannerService->link }}">
                        {{ $bannerService->text_button ?? 'Đặt lịch' }}
                    </a>
                @endif
            </div>
        </section>








        <!-- khối thư viện -->

        <section class="wptb-services-one" style="padding: 0 !important;">
            <div class="wptb-item-layer wptb-item-layer-one both-version">
                <img src="/site/img/more/texture-2.png" alt="img">
                <img src="/site/img/more/texture-2-light.png" alt="img">
            </div>
            <div class="container"  >
                <div class="wptb-heading wow fadeInDown" data-wow-delay="0.3s"
                     data-wow-duration="0.8s">
                    <div class="wptb-item--inner">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
{{--                                <h6 class="wptb-item--subtitle"><span>03 //</span>Bộ sưu tập</h6>--}}
                                <h1 class="wptb-item--title">Tác phẩm nghệ thuật</h1>
                            </div>

                            <div class="col-lg-6">
                                <p class="wptb-item--description">Chất riêng trong từng tác phẩm – Mỗi hình xăm là một câu chuyện không lời.
                                    Hình xăm không chỉ là những đường nét nghệ thuật nằm trên da thịt – mà còn là sự kết tinh của cảm xúc, ký ức và cá tính riêng của mỗi người.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <style>
                    .gallery-grid {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 10px;
                        margin: 0 -5px;
                    }

                    .gallery-item {
                        flex: 1 1 calc(20% - 10px); /* 5 items mỗi hàng */
                        box-sizing: border-box;
                        padding: 5px;
                    }

                    .gallery-item img {
                        width: 100%;
                        height: auto;
                        display: block;
                        border-radius: 4px;
                        transition: transform .2s ease;
                    }

                    .gallery-item:hover img {
                        transform: scale(1.05);
                    }

                    /* tablet (≥576px và <768px): 3 items / row */
                    @media (max-width: 768px) and (min-width: 576px) {
                        .gallery-item {
                            flex: 1 1 calc(33.333% - 10px);
                        }
                    }

                    /* mobile ( <576px): 2 items / row => thumbnail to hơn */
                    @media (max-width: 575px) {
                        .gallery-item {
                            flex: 1 1 calc(50% - 10px);
                        }
                    }


                    /* 1. Container dùng Grid, mỗi item tối thiểu 200px, linh hoạt mở rộng */
                    /*.gallery-grid {*/
                    /*    display: grid;*/
                    /*    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));*/
                    /*    gap: 16px;  !* khoảng cách giữa các item *!*/
                    /*}*/

                    /* 2. Mỗi link gallery-item trở thành block vuông và hide overflow */
                    .gallery-grid .gallery-item {
                        display: block;
                        position: relative;
                        aspect-ratio: 1 / 1;     /* hình vuông; thay tỉ lệ nếu cần */
                        overflow: hidden;
                    }

                    /* 3. Ảnh phủ kín khung, crop với object-fit */
                    .gallery-grid .gallery-item img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        object-position: center;
                    }

                    @media (max-width: 768px) {
                        .gallery-grid {
                            grid-template-columns: repeat(2, 1fr) !important;
                        }
                    }

                </style>
                <div class="row wow fadeInDown" data-wow-delay="0.5s"
                     data-wow-duration="1.2s">
                    <div class="gallery-grid">
                        @foreach($gallery as $image)
                            <a
                                class="gallery-item"
                                data-fancybox="gallery"
                                href="{{$image->image->path ?? ''}}"
                                data-caption="{{$image->title }}">
                                <img src="{{$image->image->path ?? ''}}" alt="{{$image->title }}">
                            </a>
                        @endforeach


                    </div>

                </div>
            </div>
        </section>



        <!-- khối sản phẩm -->
        <style>
            /* 1. Kéo tất cả slide cùng chiều cao */
            .swiper-product .swiper-wrapper {
                display: flex;
                align-items: stretch !important;
            }

            /* 2. Mỗi slide thành flex-col, cao 100% */
            .swiper-product .swiper-slide {
                display: flex !important;
                flex-direction: column !important;
                height: 100% !important;
            }

            /* 3. Card bên trong chiếm hết chiều cao slide */
            .swiper-product .swiper-slide .product-card {
                display: flex !important;
                flex-direction: column !important;
                flex: 1 1 auto !important;
            }

            /* 4. Ảnh luôn theo tỉ lệ vuông, phủ kín khung và không giãn */
            .swiper-product .product-card img {
                width: 100%;
                aspect-ratio: 1 / 1;
                object-fit: cover;
                flex: 0 0 auto !important;
            }

            /* 5. Tên và giá đứng dưới, cố định không giãn */
            .swiper-product .product-card .product-name,
            .swiper-product .product-card .product-price {
                margin: 0.5rem 0;
                /*text-align: center;*/
                flex: 0 0 auto !important;
            }


            /* Wrapper giữ position để nút absolute */
            .swiper-product .product-card {
                position: relative;
            }

            /* Khung ảnh để nút nằm trên */
            .swiper-product .product-image-wrapper {
                position: relative;
                overflow: hidden;
            }

            /* Nút giỏ hàng */
            .swiper-product .add-to-cart-btn {
                position: absolute;
                top: 18px;
                right: 8px;
                background: rgba(0, 0, 0, 0.6);
                color: #fff;
                border: none;
                border-radius: 50%;
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: background 0.2s ease-in-out;
                z-index: 2;
            }

            /* Hover effect */
            .swiper-product .add-to-cart-btn:hover {
                background: rgba(0, 0, 0, 0.8);
            }

            /* Icon trong nút */
            .swiper-product .add-to-cart-btn i {
                font-size: 1rem;
            }


            .swiper-product .product-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0,0,0,0.1);
            }


            /* ===== Thêm transition chung cho card ===== */
            .swiper-product .product-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            /* ===== Zoom ảnh và overlay ===== */
            .swiper-product .product-image-wrapper {
                position: relative;
                overflow: hidden;
            }
            .swiper-product .product-image-wrapper img {
                transition: transform 0.3s ease;
            }
            .swiper-product .product-image-wrapper:hover img {
                transform: scale(1.05);
            }
            /* Overlay mờ */
            .swiper-product .product-image-wrapper::before {
                content: "";
                position: absolute;
                inset: 0;
                background: rgba(0, 0, 0, 0.2);
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: 1;
            }

            .swiper-product .product-image-wrapper:hover::before {
                opacity: 1;
            }

            /* ===== Card hover nâng lên, đổ shadow ===== */
            .swiper-product .product-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            }





            /* 1. Chuẩn bị vị trí cho pseudo-element */
            .swiper-product .product-card .product-name {
                position: relative;
                display: inline-block; /* để underline trượt đúng với width text */
            }

            /* 2. Tạo dòng gạch dưới với pseudo-element, mặc định width = 0 */
            .swiper-product .product-card .product-name::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: -4px;             /* khoảng cách từ text xuống gạch */
                height: 2px;              /* độ dày gạch */
                width: 0;
                background-color: #fff; /* màu gạch có thể thay theo chủ đề */
                transition: width 0.3s ease;
            }

            /* 3. Khi hover vào link, mở rộng gạch xuống full width */
            .swiper-product .product-card a:hover .product-name::after {
                width: 100%;
            }

        </style>

        <style>
            .img-product {
                overflow: hidden;
                border-radius: 15px;
            }

        </style>
        @foreach($categoriesSpecial as $cateSpecial)
            <section class="wptb-album-one " style="padding-top: 90px; padding-bottom: 0px"  >
                <div class="container-full">

                    <div class="wptb-heading mb-0 wow fadeInDown" data-wow-delay="0.3s"
                         data-wow-duration="0.8s">
                        <div class="wptb-item--inner text-center">
{{--                            <h6 class="wptb-item--subtitle"><span>04 //</span> Các sản phẩm từ {{ $config->web_title }}</h6>--}}
                            <h1 class="wptb-item--title lg">{{ $cateSpecial->name }}</h1>
                        </div>
                    </div>
                    <div class="swiper-container swiper-product wow fadeInRight" data-wow-delay="0.5s"
                         data-wow-duration="1.2s">
                        <div class="swiper-wrapper">
                            @foreach($cateSpecial->products as $product)
                                <div class="swiper-slide">
                                    <div class="product-card">
                                        <div class="product-image-wrapper">
                                            <img class="img-product"
                                                src="{{ $product->image->path ?? '' }}"
                                                alt="{{ $product->name }}"
                                            />
                                            <!-- Nút giỏ hàng -->
                                            <button class="add-to-cart-btn" aria-label="Add to cart" title="Mua ngay" ng-click="buyNow({{ $product->id }})">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                          <a href="{{ route('front.getProductDetail', $product->slug) }}">
                                              <h3 class="product-name" style="font-size: 1.35rem">{{ $product->name }}</h3>
                                          </a>
                                        <p class="product-price">
                                            {{ formatCurrency($product->price) }} ₫
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- nút điều hướng -->
{{--                <div class="swiper-button-prev"></div>--}}
{{--                <div class="swiper-button-next"></div>--}}

            </section>

        @endforeach

        <!-- khối khóa học -->
        <style>
            .wptb-courses {
                padding-top: 90px;
                padding-bottom: 0px;
            }

            @media (max-width: 768px) {
                .wptb-courses {
                    padding-top: 0;
                }
            }
        </style>
        <section class="wptb-services-one wptb-courses">
            <div class="wptb-item-layer wptb-item-layer-one both-version">
                <img src="/site/img/more/texture-2.png" alt="img">
                <img src="/site/img/more/texture-2-light.png" alt="img">
            </div>
            <div class="container">
                <div class="wptb-heading wow fadeInDown" data-wow-delay="0.3s"
                     data-wow-duration="0.8s">
                    <div class="wptb-item--inner">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
{{--                                <h6 class="wptb-item--subtitle"><span>05 //</span>Khóa học</h6>--}}
                                <h1 class="wptb-item--title">Khóa học</h1>
                            </div>

                            <div class="col-lg-6">
                                <p class="wptb-item--description">Tay nghề thì không thể phủ nhận và chúng tôi đã tạo ra những hình xăm đẹp được thiết kế riêng cho từng vị khách hàng.
                                    Bạn có thể xem các tác phầm thực hiện bên dưới.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <style>
                    /* Bao quanh Swiper để thêm padding/trên-dưới */
                    .swiper-course {
                        padding: 20px 0;
                    }

                    /* Mỗi slide là một “card” */
                    .course-card {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        text-align: center;
                        background: #fff;
                        border-radius: 8px;
                        overflow: hidden;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                    }

                    /* Ảnh cân đối, đầy đủ width */
                    .course-img {
                        width: 100%;
                        aspect-ratio: 1 / 1;      /* 4:3 hoặc tỉ lệ nào bạn muốn */
                        object-fit: cover;
                        display: block;           /* xóa margin mặc định của inline-img */
                    }


                    /* Tiêu đề cách ảnh một khoảng */
                    .course-title {
                        margin: 12px 8px;
                        font-size: 1rem;
                        color: #333;
                        line-height: 1.2;
                    }

                    .swiper-button-prev,
                    .swiper-button-next {
                        color: #003F7F; /* dùng màu chủ đạo */
                    }

                    /* Pagination bullets */
                    .swiper-pagination-bullet {
                        background: #ccc;
                        opacity: 1;
                    }
                    .swiper-pagination-bullet-active {
                        background: #003F7F;
                    }

                    /* Responsive: thu nhỏ trên màn mobile */
                    @media (max-width: 576px) {
                        .swiper-course { padding: 10px 0; }
                        .course-title { font-size: 0.9rem; }
                    }

                </style>

                <style>
                    /* ================= */
                    /* Course Card Hover */
                    /* ================= */
                    .swiper-slide .course-card {
                        position: relative;
                        overflow: hidden;
                        border-radius: 8px;
                        background: #fff;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    }

                    /* Nâng lên + đổ shadow */
                    .swiper-slide .course-card:hover {
                        transform: translateY(-6px);
                        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                    }

                    /* ================ */
                    /* Image Zoom-in    */
                    /* ================ */
                    .swiper-slide .course-card .course-img {
                        display: block;
                        width: 100%;
                        height: auto;
                        object-fit: cover;
                        transition: transform 0.3s ease;
                    }
                    .swiper-slide .course-card:hover .course-img {
                        transform: scale(1.05);
                    }

                    /* ================ */
                    /* Overlay Mờ trên ảnh */
                    /* ================ */
                    .swiper-slide .course-card::before {
                        content: "";
                        position: absolute;
                        inset: 0;
                        background: rgba(0, 0, 0, 0.15);
                        opacity: 0;
                        transition: opacity 0.3s ease;
                        z-index: 1;
                    }
                    .swiper-slide .course-card:hover::before {
                        opacity: 1;
                    }

                    /* ================= */
                    /* Title Highlight   */
                    /* ================= */
                    .swiper-slide .course-card .course-title {
                        position: relative;
                        margin: 12px;
                        font-size: 1.25rem;
                        color: #333;
                        transition: color 0.3s ease;
                        z-index: 2; /* để nổi trên overlay */
                    }
                    .swiper-slide .course-card:hover .course-title {
                        text-decoration: underline;
                    }

                </style>

                <style>
                    /* Hàng giá tối giản đen–trắng */
                    .course-card .course-price{
                        display:inline-flex;
                        align-items:baseline;
                        gap:.45rem;
                        margin-top:.35rem;
                        padding:.2rem .55rem;
                        border:1px solid rgba(0,0,0,.15);
                        border-radius:999px;
                        background:#fff;           /* nếu nền card tối, có thể đổi thành transparent */
                        color:#111;
                        font-size:.9rem;
                        line-height:1.1;
                        margin-bottom: 10px;
                    }

                    .course-card .course-price .cp-label{
                        text-transform:uppercase;
                        font-size:.72rem;
                        letter-spacing:.2px;
                        opacity:.65;
                    }

                    .course-card .course-price .cp-value{
                        font-weight:600;
                    }

                    /* Dark mode ảnh nền tối: đảo màu nhanh */
                    .course-card.dark .course-price{
                        background:#0a0a0a;
                        color:#f2f2f2;
                        border-color:rgba(255,255,255,.18);
                    }

                    /* Mobile: gọn hơn */
                    @media (max-width:576px){
                        .course-card .course-price{ padding:.15rem .45rem; font-size:.85rem; }
                        /*.course-card .course-price .cp-label{ display:none; } !* tiết kiệm chỗ *!*/
                    }

                </style>
                <div class="row wow fadeInLeftBig" data-wow-delay="0.5s"
                     data-wow-duration="1.2s">
                    <div class="swiper-container swiper-course" style="padding-left: 10px; padding-right: 10px">
                        <div class="swiper-wrapper">
                            <!-- Slide 1 -->
                            @foreach($courses as $course)
                                <div class="swiper-slide">
                                    <div class="course-card">
                                        <img src="{{ $course->image->path ?? '' }}" alt="{{ $course->name }}" class="course-img">
                                        <a href="{{ route('front.getCourseDetail', $course->slug) }}">
                                            <h5 class="course-title">{{ $course->name }}</h5>
                                        </a>

                                        @php
                                            $price = $course->price;
                                        @endphp
                                        @if($price !== null)
                                            <div class="course-price">
                                                <span class="cp-label">Giá tham khảo</span>
                                                <span class="cp-value">{{ number_format($price, 0, ',', '.') }}₫</span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- navigation arrows -->
{{--                        <div class="swiper-button-prev"></div>--}}
{{--                        <div class="swiper-button-next"></div>--}}
                        <!-- pagination bullets (nếu cần) -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </section>



        <style>
            .course-banner {
                margin-bottom: 0;
                margin-top: 60px;
            }

        </style>
        <section class="hero-banner course-banner wow fadeInLeft"  data-wow-delay="0.3s"
                 data-wow-duration="0.8s"  aria-label="{{ $bannerCourse->title }}">
            <div class="hero-banner__media">
                <img src="{{ $bannerCourse->image->path ?? asset('images/placeholder.jpg') }}"
                     alt="{{ $bannerCourse->title ?? 'Banner' }}" loading="lazy">
            </div>

            <div class="hero-banner__overlay"></div>

            <div class="hero-banner__content container">
                @if(!empty($bannerCourse->title))
                    <h1 class="hero-title">{{ $bannerCourse->title }}</h1>
                @endif

                @if(!empty($bannerCourse->subtitle))
                    <p class="hero-subtitle">{{ $bannerCourse->subtitle }}</p>
                @endif

                @if(!empty($bannerCourse->link))
                    <a class="btn-hero" href="{{ $bannerCourse->link }}">
                        {{ $bannerCourse->text_button ?? 'Đặt lịch' }}
                    </a>
                @endif
            </div>
        </section>




        <!-- khối thành viên -->
        <section class="wptb-team-one" style="padding-top: 90px">
            <div class="container">
                <div class="wptb-heading wow fadeInDown" data-wow-delay="0.3s"
                     data-wow-duration="0.8s">
                    <div class="wptb-item--inner">
                        <div class="row">
                            <div class="col-lg-6">
{{--                                <h6 class="wptb-item--subtitle"><span>06 //</span>Artist</h6>--}}
                                <h1 class="wptb-item--title mb-lg-0">Đội ngũ thành viên<br></h1>
                            </div>

                            <div class="col-lg-6">
                                <p class="wptb-item--description">Chúng tôi đã và đang đóng góp vào việc thay đổi cái nhìn của xã hội về nghệ thuật xăm hình.
                                   xăm hình không chỉ là một hình thức giải trí hay một phong cách bề ngoài, mà còn là một phần của văn hóa, của cá nhân.</p>


                                <!-- Swiper Navigation -->
                                <div class="wptb-swiper-navigation style1">
                                    <div class="wptb-swiper-arrow swiper-button-prev"></div>
                                    <div class="wptb-swiper-arrow swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-container swiper-team wow fadeInRight" data-wow-delay="0.5s"
                     data-wow-duration="1.2s">
                    <div class="swiper-wrapper">
                        @foreach($teams as $team)
                            <div class="swiper-slide">
                                <div class="wptb-team-grid1">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="{{ $team->image->path ?? '' }}" alt="img">
                                        </div>

                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                               <a href="{{ route('front.teams', $team->id) }}">
                                                   <h5 class="wptb-item--title">{{ $team->name }}</h5>
                                               </a>

                                                <p class="wptb-item--position">{{ $team->position }}</p>
                                            </div>
                                            <div class="wptb-item--social">
                                                <a href="{{ $team->facebook }}">FB</a>
                                                <a href="{{ $team->ins }}">IG</a>
                                                <a href="{{ $team->pri }}">YT</a>
                                                <a href="{{ $team->tw }}">TW</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <!-- khối feeback -->
        <section class="wptb-testimonial-one bg-image" style="background-image: url('{{ $bannerRateCustomer->image->path ?? '' }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="swiper-container swiper-testimonial">
                            <!-- swiper slides -->
                            <div class="swiper-wrapper">
                                @foreach($reviews as $review)
                                    <div class="swiper-slide">
                                        <div class="wptb-testimonial1">
                                            <div class="wptb-item--inner">
                                                <div class="wptb-item--holder">
                                                    <div class="d-flex align-items-center justify-content-between mr-bottom-25">
                                                        <div class="wptb-item--meta-rating">
                                                            <i class="bi bi-star-fill"></i>
                                                            <i class="bi bi-star-fill"></i>
                                                            <i class="bi bi-star-fill"></i>
                                                            <i class="bi bi-star-fill"></i>
                                                            <i class="bi bi-star-fill"></i>
                                                        </div>

                                                        <div class="wptb-item--icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="45" viewBox="0 0 57 45" fill="none">
                                                                <path d="M51.5137 38.5537C56.8209 32.7938 56.2866 25.3969 56.2697 25.3125V2.8125C56.2697 2.06658 55.9734 1.35121 55.4459 0.823763C54.9185 0.296317 54.2031 0 53.4572 0H36.5822C33.48 0 30.9572 2.52281 30.9572 5.625V25.3125C30.9572 26.0584 31.2535 26.7738 31.781 27.3012C32.3084 27.8287 33.0238 28.125 33.7697 28.125H42.4266C42.3671 29.5155 41.9517 30.8674 41.22 32.0513C39.7913 34.3041 37.0997 35.8425 33.2156 36.6188L30.9572 37.0688V45H33.7697C41.5969 45 47.5678 42.8316 51.5137 38.5537ZM20.5566 38.5537C25.8666 32.7938 25.3294 25.3969 25.3125 25.3125V2.8125C25.3125 2.06658 25.0162 1.35121 24.4887 0.823763C23.9613 0.296317 23.2459 0 22.5 0H5.625C2.52281 0 0 2.52281 0 5.625V25.3125C0 26.0584 0.296316 26.7738 0.823762 27.3012C1.35121 27.8287 2.06658 28.125 2.8125 28.125H11.4694C11.41 29.5155 10.9945 30.8674 10.2628 32.0513C8.83406 34.3041 6.1425 35.8425 2.25844 36.6188L0 37.0688V45H2.8125C10.6397 45 16.6106 42.8316 20.5566 38.5537Z" fill="#D70006"/>
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    <p class="wptb-item--description"> {{ $review->message }}</p>
                                                    <div class="wptb-item--meta">
                                                        <div class="wptb-item--image">
                                                            <img src="{{ $review->image->path ?? '' }}" alt="img">
                                                        </div>
                                                        <div class="wptb-item--meta-left">
                                                            <h4 class="wptb-item--title">{{ $review->name }}</h4>
                                                            <h6 class="wptb-item--designation">{{ $review->position }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Swiper Navigation -->
                            <div class="wptb-swiper-navigation style1">
                                <div class="wptb-swiper-arrow swiper-button-prev"></div>
                                <div class="wptb-swiper-arrow swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- khối tại sao chọn chúng tôi -->
        <style>
            .why-block {
                padding-top: 290px;
            }
            @media (max-width: 768px) {
                .why-block {
                    padding-top: 90px;
                }
            }
        </style>
        <section class="overflow-hidden why-block">
            <div class="container">
                <div class="wptb-heading wow fadeInDown" data-wow-delay="0.3s"
                     data-wow-duration="0.8s">
                    <div class="wptb-item--inner">
{{--                        <h6 class="wptb-item--subtitle"><span>07 //</span>Vì sao chọn chúng tôi</h6>--}}
                        <h1 class="wptb-item--title mb-0">Những kinh nghiệm và thành tựu</h1>
                    </div>
                </div>

                <ol class="wptb-features wow fadeInLeftBig" data-wow-delay="0.5s"
                    data-wow-duration="1.2s">
                    @foreach($whyUs as $whyItem)
                        <li class="wptb-item {{ $loop->first ? 'active highlight' : '' }} ">
                            <div class="wptb-item--inner">
                                <div class="wptb-item--features-holder">
                                    <div class="wptb-item--title">
                                        <a href="#">{{ $whyItem->title }}</a>
                                    </div>
                                </div>
                                <div class="wptb-item--image">
                                    <img src="{{ $whyItem->image->path ?? '' }}" alt="img">

                                    <div class="wptb-item--features-bottom">
                                        <div class="wptb-item--content flex-shrink-0">
                                            <div class="wptb-item--description">
                                                {{ $whyItem->content }}
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>




        <div class="divider-line-hr"></div>



        <!-- Contact -->
        <section id="contact-form" class="wptb-contact-form style1">
            <div class="wptb-item-layer both-version">
                <img src="/site/img/more/texture-2.png" alt="">
                <img src="/site/img/more/texture-2-light.png" alt="">
            </div>
            <div class="container">
                <div class="wptb-form--wrapper">
                    <div class="wptb-heading">
                        <div class="wptb-item--inner text-center">
                            <h1 class="wptb-item--title">Đặt Lịch Hẹn Xăm</h1>
                            <div class="wptb-item--description">Để lại thông tin của bạn, chúng tôi sẽ liên hệ với bạn sớm nhất</div>
                        </div>
                    </div>

                    <style>
                        .noCalendar {
                            display: none !important;
                        }

                        .flatpickr-calendar {
                            z-index: 99999 !important;
                        }

                    </style>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form class="wptb-form" id="contactForm">
                                <div class="wptb-form--inner">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Họ tên*">
                                                <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="form-group">
                                                <input type="email" name="phone" class="form-control" placeholder="Số điện thoại*">
                                                <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <div class="form-group">
                                                <input type="datetime-local" name="times" class="form-control" placeholder="Thời gian mong muốn">
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="subject" class="form-control" placeholder="Yêu cầu">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 mb-4">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" placeholder="Lời nhắn*"></textarea>
                                                <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-lg-12">
                                            <div class="wptb-item--button text-center">
                                                <button class="btn white-opacity creative" type="button" ng-click="submitForm()">
                                                        <span class="btn-wrap">
                                                            <span class="text-first">Gửi yêu cầu</span>
                                                        </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <style>
                    @media (max-width: 768px) {
                        .wptb-item--icon {
                            display: none !important;
                        }
                    }
                </style>

                <div class="wptb-office-address mr-top-100">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6">
                            <div class="wptb-icon-box1 wow fadeInLeft">
                                <div class="wptb-item--inner flex-start" style="flex-wrap: inherit">
                                    <div class="wptb-item--icon"><i class="bi bi-globe"></i></div>
                                    <div class="wptb-item--holder">
                                        <h3 class="wptb-item--title">Email</h3>
                                        <p class="wptb-item--description">{{ $config->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 px-md-5">
                            <div class="wptb-icon-box1 wow fadeInLeft">
                                <div class="wptb-item--inner flex-start" style="flex-wrap: inherit">
                                    <div class="wptb-item--icon"><i class="bi bi-phone"></i></div>
                                    <div class="wptb-item--holder">
                                        <h3 class="wptb-item--title">Hotline</h3>
                                        <p class="wptb-item--description">{{ $config->hotline }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="wptb-icon-box1 wow fadeInLeft">
                                <div class="wptb-item--inner flex-start" style="flex-wrap: inherit">
                                    <div class="wptb-item--icon"><i class="bi bi-geo-alt"></i></div>
                                    <div class="wptb-item--holder">
                                        <h3 class="wptb-item--title">Địa chỉ</h3>
                                        <p class="wptb-item--description">{{ $config->address_company }}</p>
                                    </div>
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
        document.querySelector('.unmute-button').addEventListener('click', () => {
            // dùng YouTube IFrame API để unmute
            if (player && typeof player.unMute === 'function') {
                player.unMute();
                player.playVideo();
                document.querySelector('.unmute-button').style.display = 'none';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vn.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            flatpickr("#times", {
                disableMobile: true,      // dùng luôn Flatpickr, tắt native picker
                enableTime: true,
                time_24hr: true,
                dateFormat: "d-m-Y H:i",
                locale: "vn",
                minuteIncrement: 15,
                appendTo: document.body   // ← quan trọng!
            });

        });
    </script>

    <script>
        document.querySelector('a[href="#contact-form"]').addEventListener('click', function(e) {
            e.preventDefault();
            document
                .getElementById('contact-form')
                .scrollIntoView({ behavior: 'smooth', block: 'start' });
        });

    </script>
    <script>
        const swiperProduct = new Swiper('.swiper-product', {
            slidesPerView: 5,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                320:  { slidesPerView: 1 },
                640:  { slidesPerView: 2 },
                768:  { slidesPerView: 3 },
                1024: { slidesPerView: 5 },
            },
        });
    </script>

    <script>
        // Khởi tạo Swiper (đảm bảo đã include swiper-bundle.min.js trước)
        const swiperCourse = new Swiper('.swiper-course', {
            slidesPerView: 4,       // hiển thị 4 slide cùng lúc
            spaceBetween: 20,       // khoảng cách giữa các slide
            loop: true,             // bật lặp vô hạn
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                0:   { slidesPerView: 1 },   // <576px
                576: { slidesPerView: 2 },   // ≥576px
                768: { slidesPerView: 3 },   // ≥768px
                992: { slidesPerView: 4 },   // ≥992px
            }
        });

    </script>

    <script>
        app.controller('homePage', function ($rootScope, $scope, cartItemSync,  $interval) {
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
