@extends('site.layouts.master')
@section('title')Liên hệ - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->favicon->path ?? ''}}@endsection

@section('css')
<style>
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 100%;
        color: #dc3545;
    }
</style>

<style>
    .send-success-message {
        display: flex;
        align-items: center;
        background-color: #e6ffed;     /* nền xanh nhạt */
        border: 1px solid #71d58b;      /* viền xanh tươi */
        color: #2d6a4f;                 /* chữ xanh đậm */
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 1rem;
        gap: 12px;                      /* khoảng cách icon - text */
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        margin-bottom: 10px;
    }

    .send-success-message i {
        font-size: 1.4rem;
    }

    .send-success-message p {
        margin: 0;
        line-height: 1.4;
    }
</style>
@endsection

@section('content')
    <!-- Main Wrapper-->
    <main class="wrapper" ng-controller="aboutPage">
        <!-- Google Map -->
        <div class="gmapbox wow fadeInUp">
            <div id="googleMap" class="map">
                {!! $config->location !!}
            </div>
        </div>

        <style>
            .wptb-office-address {
                margin-top: 100px;
            }

            @media (max-width: 768px) {
                .wptb-office-address {
                    margin-top: 60px;
                }

                .wptb-item--icon {
                    display: none !important;
                }
            }

            .wptb-contact-form {
                padding-top: 60px;
            }
        </style>
        <!-- Contact -->
        <section class="wptb-contact-form style1">
            <div class="wptb-item-layer both-version">
                <img src="/site/img/more/texture-2.png" alt="">
                <img src="/site/img/more/texture-2-light.png" alt="">
            </div>
            <div class="container">
                <div class="wptb-form--wrapper">
                    <div class="wptb-heading">
                        <div class="wptb-item--inner text-center">
                            <h1 class="wptb-item--title">Gửi liên hệ</h1>
                            <div class="wptb-item--description">Bạn có bất kỳ những thắc mắc nào, hãy để lại lời nhắn. Chúng tôi sẽ hỗ trợ bạn</div>
                        </div>
                    </div>

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
                                            <div class="wptb-item--button text-center">
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

                <div class="wptb-office-address">
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
        app.controller('aboutPage', function ($rootScope, $scope, $interval) {
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
