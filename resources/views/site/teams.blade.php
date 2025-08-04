@extends('site.layouts.master')

@section('title')Thành viên - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->favicon->path ?? ''}}@endsection

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
                <h2 class="wptb-item--title ">Thành viên</h2>
            </div>
        </div>

        <!-- Our Team -->
        <section class="wptb-team-one">
            <div class="container">

                <div class="wptb-team--inner">
                    <div class="row">
                        <!-- Team Block -->
                        @foreach($teams as $team)
                            <div class="col-lg-4 col-md-4 col-sm-6">
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

    </main>
@endsection

@push('scripts')


@endpush
