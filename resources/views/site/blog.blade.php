@extends('site.layouts.master')
@section('title'){{ $categoryBlog->name ?? 'Tin tức và hoạt động' }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$categoryBlog->image->path ?? '' }}
@endsection

@section('css')

@endsection

@section('content')
    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{ $categoryBlog->image->path ?? ($categories[0]->image->path ?? '') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng trọn vẹn khoảnh khắc thư giãn tại khách sạn của chúng tôi.</h4>
                <h2>{{ $categoryBlog->name ?? 'Tin tức' }}</h2>
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
                <a href="{{ route('front.home-page') }}">Trang chủ</a><a href="#">Tin tức</a>
                @if($categoryBlog)
                    <span>{{ $categoryBlog->name  }}</span>
                @endif

            </div>
        </div>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <style>
            /* 1) Grid container cho các post-item */
            .post-items {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 24px;
            }

            /* 2) Thiết lập mỗi card là flex-column */
            .post-item {
                display: flex;
                flex-direction: column;
                background: #fff;
                /*border: 1px solid #eee;*/
                border-radius: 8px;
                overflow: hidden;
            }

            /* 3) Khung ảnh cố định chiều cao, ảnh cover đầy khung */
            .post-item_media {
                flex: 0 0 auto;
                height: 280px;      /* chỉnh nếu muốn cao hơn/thấp hơn */
                overflow: hidden;
            }
            .post-item_media img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /* 4) Nội dung co giãn, xếp theo cột */
            .post-item_content {
                display: flex;
                flex-direction: column;
                flex: 1 1 auto;
                padding: 16px;
            }


            /* 5) Tiêu đề và metadata */
            /*.post-item_content h3 {*/
            /*    margin: 0 0 8px;*/
            /*    font-size: 1.1rem;*/
            /*    line-height: 1.3;*/
            /*}*/

            .post-item_content h3 a {
                display: -webkit-box;
                -webkit-line-clamp: 2;       /* ví dụ tối đa 2 dòng */
                -webkit-box-orient: vertical;
                overflow: hidden;
                line-height: 1.3em;
                height: calc(1.3em * 2);
            }

            .post-item_content .room-card-details {
                margin-bottom: 12px;
            }
            .post-item_content .room-card-details ul {
                display: flex;
                gap: 12px;
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .post-item_content .room-card-details li {
                display: flex;
                align-items: center;
                font-size: 0.9rem;
                color: #666;
            }
            .post-item_content .room-card-details li i {
                margin-right: 4px;
            }

            /* 6) Đoạn intro giới hạn 3 dòng, có dấu “…” */
            .post-item_content p {
                margin: 0;
                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
                line-height: 1.4;
                min-height: calc(1.4em * 4);
            }


        </style>
        <div class="content-section">
            <div class="section-dec"></div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-container">
                            @if(! $blogs->count())
                                <p>Nội dung đang được cập nhật.</p>
                            @endif

                            @if($blogs->count())
                                <div class="dec-container">
                                    <div class="text-block">
                                        <div class="post-items">

                                            @foreach($blogs as $blog)
                                                <div class="post-item">
                                                    <div class="post-item_wrap">
                                                        <div class="post-item_media">
                                                            <a href="{{ route('front.blogDetail', $blog->slug) }}">
                                                                <img src="{{ $blog->image->path ?? '' }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-item_content">
                                                            <h3><a href="{{ route('front.blogDetail', $blog->slug) }}">{{ $blog->name }}</a></h3>
                                                            <div class="room-card-details">
                                                                <ul>
                                                                    <li><i class="fa-light fa-calendar-days"></i>
                                                                        <span>
                                                                        {{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d/m/Y') }}
                                                                    </span>
                                                                    </li>
                                                                    <li><i class="fa-light fa-user"></i><span>Admin</span></li>
                                                                </ul>
                                                            </div>
                                                            <p style="padding-bottom: 0 !important;">
                                                                {{ $blog->intro }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- pagination-->
                            {{ $blogs->links('site.pagination.paginate2') }}
                            <!-- pagination end-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- main-sidebar -->
                        <div class="main-sidebar fixed-bar">
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


@endpush
