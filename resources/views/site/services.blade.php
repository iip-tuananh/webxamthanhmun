@extends('site.layouts.master')

@section('title')
    {{ $categoryService->name }} - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$categoryService->image->path ?? '' }}
@endsection

@section('css')

@endsection

@section('content')
    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{ $categoryService->image->path ?? '' }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng trọn vẹn khoảnh khắc thư giãn tại khách sạn của chúng tôi.</h4>
                <h2>{{ $categoryService->name }}</h2>
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
                <a href="{{ route('front.home-page') }}">Trang chủ</a><span>{{ $categoryService->name }}</span>
            </div>
        </div>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section">
            <div class="section-dec"></div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="container">
                @foreach($services as $index => $service)
                    <div class="row align-items-center mb-5">
                        {{-- Cột text --}}
                        <div class="col-lg-6
                                  {{ $index % 2 !== 0 ? 'order-lg-2 text-lg-right' : 'text-lg-left' }}">
                            <div class="section-title" style="margin-top: 50px;">
                                <h4>{{ $categoryService->name }}</h4>
                                <h2>{{ $service->name }}</h2>
                            </div>
                            <div class="text-block tb-sin {{ $index % 2 !== 0 ? 'pl-lg-5' : '' }}">
                                <div class="dc_dec-item_left"><span></span></div>
                                <p class="has-drop-cap">{{ $service->description }}</p>
                                <a href="{{ route('front.getServiceDetail', $service->slug) }}" class="btn fl-btn custom-scroll-link">Chi tiết</a>
                            </div>
                        </div>

                        {{-- Cột ảnh --}}
                        <div class="col-lg-6 {{ $index % 2 !== 0 ? 'order-lg-1' : '' }}">
                            <div class="image-collge-wrap">
                                <div class="blog-media">
                                    <div class="single-slider-wrap">
                                        <div class="single-slider">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper lightgallery">
                                                    <div class="swiper-slide hov_zoom">
                                                        <img src="{{ $service->image->path ?? '' }}" alt="">
                                                        <a href="{{ $service->image->path ?? '' }}"
                                                           class="box-media-zoom popup-image">
                                                            <i class="fal fa-search"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

        <div class="content-dec"><span></span></div>
    </div>

@endsection

@push('scripts')


@endpush
