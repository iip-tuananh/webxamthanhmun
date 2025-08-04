@extends('site.layouts.master')

@section('title')
    Thành viên - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$config->image->path ?? '' }}
@endsection

@section('css')

@endsection

@section('content')
    <!-- Main Wrapper-->
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
            <div class="wptb-item--inner" style="background-image: url({{ $banner->image->path ?? '' }});">
                <div class="wptb-item-layer wptb-item-layer-one">
                    <img src="/site/img/more/circle.png" alt="img">
                </div>
                <h2 class="wptb-item--title ">Thành viên của {{ $config->web_title }}</h2>
            </div>
        </div>

        <!-- Details Content -->
        <section class="blog-details">
            <div class="container">
                <div class="row mr-bottom-100">
                    <div class="col-lg-6 col-md-6 pe-md-5">
                        <div class="sidebar">
                            <div class="wptb-team-grid3">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <img src="{{ $team->image->path ?? '' }}" alt="img">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-5 mt-md-0">
                        <div class="blog-details-inner">
                            <div class="post-content">
                                <div class="fulltext">
                                    <div class="wptb-team-grid3 mb-5">
                                        <div class="wptb-item--inner">
                                            <div class="wptb-item--holder">
                                                <div class="wptb-item--meta">
                                                    <h5 class="wptb-item--title">{{ $team->name }}</h5>
                                                    <h6 class="wptb-item--position">{{ $team->phone_number }}</h6>
                                                    <p class="wptb-item--description">{{ $team->description_1 }}</p>
                                                </div>

                                                <div class="wptb-item--social">
                                                    <a href="{{ $team->facebook }}"><i class="bi bi-facebook"></i></a>
                                                    <a href="{{ $team->ins }}"><i class="bi bi-instagram"></i></a>
                                                    <a href="{{ $team->pri }}"><i class="bi bi-youtube"></i></a>
                                                    <a href="{{ $team->tw }}"><i class="bi bi-twitter"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Latest Projects -->
                <div class="row">
                    <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0">
                        <h4 class="widget-title">Tác phẩm thực hiện</h4>
                        <p>{{ $team->description_2 }}</p>
                    </div>

                    @php
                        $galleries = $team->galleries;
                        $oneBlock = $galleries->take(2);
                        $twoBlock = $galleries->slice(2);
                    @endphp

                    @foreach($oneBlock as $gallery)
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <div class="wptb-image-single wow fadeInUp">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <a href="#"></a><img src="{{ $gallery->image->path ?? '' }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="row mt-4">
                    @foreach($twoBlock as $gallery)
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <div class="wptb-image-single wow fadeInUp">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <a href="project-details.html"></a><img src="{{ $gallery->image->path ?? '' }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Details Content -->


    </main>
@endsection

@push('scripts')


@endpush
