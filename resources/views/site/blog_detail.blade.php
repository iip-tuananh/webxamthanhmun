@extends('site.layouts.master')

@section('title'){{ $blog->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$blog->image->path ?? '' }}@endsection

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Georgia&family=Courier+Prime&display=swap" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="/site/css/editor-content.css">

@endsection

@section('content')
    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{ $categoryBlog->image->path ?? '' }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng trọn vẹn khoảnh khắc thư giãn tại khách sạn của chúng tôi.</h4>
                <h2>{{ $blog->name }}</h2>
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
                <a href="{{ route('front.home-page') }}">Trang chủ</a><a href="{{ route('front.blogs', $blog->category->slug) }}">{{ $blog->category->name }}</a><span>{{ $blog->name }}</span>
            </div>
        </div>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section">
            <div class="section-dec"></div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-container">
                            <div class="dec-container">
                                <div class="text-block">
                                    <!-- blog media -->
                                    <div class="blog-media">
                                        <div class="single-slider-wrap">
                                            <div class="single-slider">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper lightgallery">
                                                        <div class="swiper-slide hov_zoom">
                                                            <img src="{{ $blog->image->path ?? '' }}" alt="">
                                                            <a href="{{ $blog->image->path ?? '' }}" class="box-media-zoom   popup-image">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="fw-carousel-button-prev slider-button"><i class="fa-solid fa-caret-left"></i></div>--}}
{{--                                            <div class="fw-carousel-button-next slider-button"><i class="fa-solid fa-caret-right"></i></div>--}}
{{--                                            <div class="sc-controls fwc_pag">--}}
{{--                                                <div class="ss-slider-pagination"></div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <!-- blog media end -->
                                    <div class="text-block post-single_tb" >
                                        <div class="text-block-container">
                                            <div class="tbc_subtitle">{{$blog->name}}</div>
                                            <div class="room-card-details" style="margin-bottom: 20px">
                                                <ul>
                                                    <li><i class="fa-light fa-calendar-days"></i><span>{{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d/m/Y') }}</span></li>
                                                    <li><i class="fa-light fa-user"></i><span>Admin</span></li>
                                                </ul>
                                            </div>


{{--                                            <div style="font-size: 16px !important; line-height: 1.6 !important;">--}}
{{--                                                {!! $blog->body !!}--}}
{{--                                            </div>--}}
                                            <div class="editor-content" >
                                                {!! $blog->body !!}
                                            </div>


                                        </div>
                                        <div class="tbc-separator"></div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- main-sidebar -->
                        <div class="main-sidebar fixed-bar">
                            <!-- main-sidebar-widget end-->
                            <!-- main-sidebar-widget-->
                            <div class="main-sidebar-widget">
                                <h3>Bài viết liên quan</h3>
                                <div class="recent-post-widget">
                                    <ul>
                                        @foreach($otherBlogs as $otherBlog)
                                            <li>
                                                <div class="recent-post-img"><a href="{{ route('front.blogDetail', $otherBlog->slug) }}"><img src="{{ $otherBlog->image->path ?? '' }}" alt=""></a></div>
                                                <div class="recent-post-content">
                                                    <h4><a href="{{ route('front.blogDetail', $otherBlog->slug) }}" title="{{ $otherBlog->name }}">
                                                            {{ Str::limit($otherBlog->name, 40, '...') }}
                                                        </a></h4>
                                                    <div class="recent-post-opt">
                                                        <span class="post-date">{{ \Illuminate\Support\Carbon::parse($otherBlog->created_at)->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="main-sidebar-widget">
                                <h3>Danh mục</h3>
                                <div class="category-widget">
                                    <ul class="cat-item">
                                        @foreach($categories as $cate)
                                            <li><a href="{{ route('front.blogs', $cate->slug) }}">{{ $cate->name }}</a><span>{{ $cate->posts_count }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- main-sidebar end-->
                    </div>
                </div>
            </div>
            <div class="limit-box"></div>
        </div>
        <!-- section end  -->
        <div class="content-dec"><span></span></div>
    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
