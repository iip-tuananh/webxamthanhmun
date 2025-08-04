@extends('site.layouts.master')

@section('title'){{ $service->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->favicon->path ?? ''}}@endsection

@section('css')

@endsection

@section('content')
    <main class="wrapper" ng-controller="servicePage">
        <!-- Page Header -->
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
        <div class="wptb-page-heading">
            <div class="wptb-item--inner" style="background-image: url('{{ @$service->image_back->path ?? '' }}');">
                <div class="wptb-item-layer wptb-item-layer-one">
                    <img src="/site/img/more/circle.png" alt="img">
                </div>
                <h2 class="wptb-item--title "> {{ $service->name }}</h2>
            </div>
        </div>

        <!-- Details Content -->
        <section class="blog-details">
            <div class="container">
                <div class="row">

                    <!-- Service Navigation List -->
                    <div class="col-lg-4 col-md-4 pe-md-5">
                        <div class="sidebar">
                            <div class="sidenav">
                                <ul class="side_menu">
                                    @foreach($otherServices as $otherService)
                                        <li class="menu-item {{ $otherService->id == $service->id ? 'active' : '' }}">
                                            <a href="{{ route('front.getServiceDetail', $otherService->slug) }}" class="d-flex align-items-center justify-content-between">
                                                <span>
                                                    {{ $otherService->name }}
                                                </span>
                                                <i class="bi bi-chevron-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 mb-5 mb-md-0 ps-md-0">
                        <div class="blog-details-inner">
                            <div class="post-content">

                                <!-- Post Image -->
                                <figure class="block-gallery mb-4">
                                    <img src="{{ $service->image->path ?? '' }}" alt="img">
                                </figure>

                                <div class="post-header">
                                    <h1 class="post-title">{{ $service->name }}</h1>
                                </div>
                                <div class="fulltext">
                                    {!! $service->content !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- End Details Content -->

        <!-- Contact -->
        <style>
            .wptb-contact-form-two {
                padding-top: 0;
            }

            @media (max-width: 768px) {
                .blog-details{
                    padding-bottom: 0;
                }
            }

        </style>
        <section class="wptb-contact-form-two">
            <div class="container">
                <div class="wptb-form--wrapper">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="wptb-heading">
                                <div class="wptb-item--inner">
                                    <h6 class="wptb-item--subtitle"> <span>//</span>Liên hê</h6>
                                    <h1 class="wptb-item--title">Đặt lịch hoặc Gửi mọi thắc mắc của bạn</h1>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="wptb-office">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--subtitle">
                                            Hotline
                                        </div>
                                        <h5 class="wptb-item--title"><a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a></h5>
                                    </div>
                                </div>

                                <div class="wptb-office">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--subtitle">
                                            Email
                                        </div>
                                        <h5 class="wptb-item--title"><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
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
                                                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại*">
                                                <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="subject" class="form-control" placeholder="Yêu cầu">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 mb-4">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" placeholder="Lời nhắn"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12">
                                            <div class="wptb-item--button">
                                                <button class="btn" type="button" ng-click="submitForm()" ng-disabled="loading">
                                                        <span class="btn-wrap" ng-if="!loading">
                                                            <span class="text-first">Gửi tin</span>
                                                        </span>

                                                    <span class="btn-wrap" ng-if="loading">
                                                            <span class="text-first">Đang gửi... <i class="fa fa-spinner fa-spin"></i></span>
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
            </div>
        </section>

    </main>
@endsection

@push('scripts')
    <script>
        app.controller('servicePage', function ($rootScope, $scope, $interval) {
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

        })
    </script>

@endpush
