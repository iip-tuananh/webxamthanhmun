@extends('site.layouts.master')
@section('title'){{ $categoryBlog->name ?? 'Tin tức và hoạt động' }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$config->image->path ?? '' }}
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
    </style>
    <main class="wrapper">
        <!-- Page Header -->
        <div class="wptb-page-heading">
            <div class="wptb-item--inner" style="background-image: url({{ $categoryBlog->image->path ?? '' }});">
                <div class="wptb-item-layer wptb-item-layer-one">
                    <img src="/site/img/more/circle.png" alt="img">
                </div>
                <h2 class="wptb-item--title ">{{ $categoryBlog->name }}</h2>
            </div>
        </div>

        <!-- Blog Grid -->
        <section class="wptb-blog-grid-one">
            <div class="container">

                <style>
                    /* 1. Khung card căng 100% chiều cao của col */
                    .wptb-blog-grid1 {
                        display: flex;
                        flex-direction: column;
                        height: 100%;
                    }

                    /* 2. Khung ảnh cố định tỉ lệ 16:9 (hoặc chỉnh theo ý bạn) */
                    .wptb-item--image {
                        width: 100%;
                        aspect-ratio: 16 / 9; /* nếu chưa hỗ trợ thì dùng height tĩnh như height: 200px; */
                        overflow: hidden;
                    }
                    .wptb-item--image img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }

                    /* 3. Giữ phần holder co giãn, đưa meta và title xuống dưới */
                    .wptb-item--holder {
                        flex: 1;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                    }

                    /* 4. Giới hạn số dòng cho tiêu đề (ví dụ 2 dòng) */
                    .wptb-item--title a {
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 2; /* số dòng tối đa */
                        overflow: hidden;
                        text-overflow: ellipsis;
                        line-height: 1.3em; /* đảm bảo tính toán đúng chiều cao */
                        max-height: calc(1.3em * 2); /* 2 dòng */
                    }

                    /* 1. Cho date chỉ auto width, không giãn */
                    .wptb-blog-grid1 .wptb-item--date {
                        display: inline-block !important;   /* đảm bảo nó không thành block-level */
                        width: auto !important;             /* override nếu có width:100% */
                        white-space: nowrap;                /* để date không xuống dòng */
                        padding: 0.2em 0.6em;               /* giảm padding ngang lại cho gọn */
                        align-self: flex-start;             /* nếu đang trong flex-column, đẩy date về bên trái */
                    }

                </style>
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-sm-6">
                            <div class="wptb-blog-grid1 active highlight wow fadeInLeft">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <a href="{{ route('front.blogDetail', $blog->slug) }}" class="wptb-item-link"><img src="{{ $blog->image->path ?? '' }}" alt="img"></a>
                                    </div>
                                    <div class="wptb-item--holder">
                                        <div class="wptb-item--date">{{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d/m/Y') }}</div>
                                        <h4 class="wptb-item--title" style="font-size: 1.3rem"><a href="{{ route('front.blogDetail', $blog->slug) }}" title="{{ $blog->name }}">{{ $blog->name }}</a></h4>

                                        <div class="wptb-item--meta">
                                            <div class="wptb-item--author">By <a href="#">{{ $blog->user_create->name ?? 'Admin' }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $blogs->links('site.pagination.paginate2') }}

{{--                <div class="wptb-pagination-wrap text-center">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li><a class="disabled page-number previous" href="#"><i class="bi bi-chevron-left"></i></a></li>--}}
{{--                        <li><span class="page-number current">1</span></li>--}}
{{--                        <li><a class="page-number" href="#">2</a></li>--}}
{{--                        <li><a class="page-number" href="#">3</a></li>--}}
{{--                        <li>.....</li>--}}
{{--                        <li><a class="page-number" href="#">9</a></li>--}}
{{--                        <li><a class="page-number next" href="#"><i class="bi bi-chevron-right"></i></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </section>

    </main>
@endsection

@push('scripts')


@endpush
