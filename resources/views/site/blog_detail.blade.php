@extends('site.layouts.master')

@section('title'){{ $blog->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$blog->image->path ?? '' }}@endsection

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
    </style>
    <main class="wrapper">
        <!-- Page Header -->
        <div class="wptb-page-heading">
            <div class="wptb-item--inner" style="background-image: url({{ $categoryBlog->image->path ?? '' }});">
                <div class="wptb-item-layer wptb-item-layer-one">
                    <img src="/site/img/more/circle.png" alt="img">
                </div>
                <h2 class="wptb-item--title ">{{ $blog->name }}</h2>
            </div>
        </div>

        <!-- Details Content -->
        <section class="blog-details">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-8 pe-md-5">
                        <div class="blog-details-inner">
                            <div class="post-content">
                                <div class="post-header">
                                    <h2 class="post-title">{{ $blog->name }}</h2>
                                    <div class="wptb-item--meta d-flex align-items-center gap-4">
                                        <div class="wptb-item wptb-item--author"><a href="#"><i class="bi bi-pencil-square"></i> <span>{{ $blog->user_create->name ?? 'Admin' }}</span></a></div>
                                        <div class="wptb-item wptb-item--date"><a href="#"><i class="bi bi-calendar3"></i> <span>{{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d/m/Y') }}</span></a></div>
                                    </div>
                                </div>

                                <div class="intro">
                                    {{ $blog->intro }}
                                </div>

                                <!-- Post Image -->
                                <figure class="block-gallery mt-4">
                                    <img src="{{ $blog->image->path ?? '' }}" alt="img">
                                </figure>

                                <div class="fulltext">
                                    {!! $blog->body !!}
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Sidebar  -->
                    <div class="col-lg-3 col-md-4 p-md-0 mt-5 mt-md-0">

                        <div class="sidebar">
                            <div class="widget widget_block">
                                <div class="wp-block-group__inner-container">
                                    <h2 class="widget-title">Bài viết gần đây</h2>
                                    <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                                        @foreach($otherBlogs as $otherBlog)
                                            <li>
                                                <div class="latest-posts-content">
                                                    <h5><a href="{{ route('front.blogDetail', $otherBlog->slug) }}">{{ $otherBlog->name }}</a></h5>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Details Content -->

    </main>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
