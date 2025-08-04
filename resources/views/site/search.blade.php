@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
@endsection

@section('css')

@endsection

@section('content')

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(/site/images/backgrounds/page-header-bg.jpg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li>Tìm kiếm</li>
                </ul>
                <h2>Có {{ $products->count() }} kết quả phù hợp với từ khóa "{{ $keyword }}"</h2>
            </div>
        </div>
    </section>

    <section class="product">
        <div class="container">
            <div class="row">

                <style>
                    /* 1) Biến toàn bộ row thành flex container */
                    .product-list {
                        display: flex;
                        flex-wrap: wrap;
                        margin: -15px;  /* bù padding từng cột */
                    }
                    .product-list > .col-xl-4,
                    .product-list > .col-lg-4,
                    .product-list > .col-md-6 {
                        display: flex;  /* để .product__all-single flex được */
                        padding: 15px;
                    }

                    /* 2) Card chính flex column để đồng đều chiều cao */
                    .product__all-single {
                        display: flex;
                        flex-direction: column;
                        flex: 1;        /* kéo dài hết chiều cao của column */
                        background: #fff;
                        border: 1px solid #eee;
                        border-radius: 6px;
                        overflow: hidden;
                    }

                    /* 3) Khung ảnh cố định tỉ lệ (4:3) */
                    .product__all-img {
                        position: relative;
                        width: 100%;
                        padding-top: 75%;    /* 3/4 = 75% */
                        overflow: hidden;
                    }
                    /* Ảnh phủ kín khung */
                    .product__all-img img {
                        position: absolute;
                        top: 0; left: 0;
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }

                    /* 4) Nội dung luôn nằm sát đáy card nếu cần đẩy lên */
                    .product__all-content {
                        flex-shrink: 0;
                        padding: 15px;
                        text-align: center;  /* tuỳ chỉnh */
                    }

                    /* 5) Tiêu đề có margin cân đối */
                    .product__all-title {
                        margin: 0;
                        font-size: 1.1rem;
                    }

                </style>
                <div class="col-xl-12 col-lg-12">
                    <div class="product__items">
                        <div class="product__all">
                            <div class="row product-list">
                                @foreach($products as $product)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="product__all-single">
                                            <div class="product__all-img">
                                                <img src="{{ @$product->image->path ?? '' }}" alt="">
                                                <div class="product__all-btn-box">
                                                    <a href="{{ route('front.get-product-detail', $product->slug) }}" class="thm-btn product__all-btn">Chi tiết</a>
                                                </div>
                                            </div>
                                            <div class="product__all-content">
                                                <h4 class="product__all-title"><a href="{{ route('front.get-product-detail', $product->slug) }}">{{ $product->name }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
    <script>
    </script>
@endpush
