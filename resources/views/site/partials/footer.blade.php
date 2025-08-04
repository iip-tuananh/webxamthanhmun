<!-- Footer -->
<footer class="footer style1 bg-image-2" style="background-image: url('/site/img/background/bg-5.png');">
    <div class="footer-top">
        <div class="container">
            <div class="footer--inner">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-5 mb-md-0">
                        <div class="footer-widget">
                            <div class="footer-nav">
                                <ul>
                                    <li class="menu-item"><a href="{{ route('front.about_page') }}">Về chúng tôi</a></li>
                                    <li class="menu-item"><a href="{{ route('front.teams') }}">Thành viên</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-5 mb-md-0 order-1 order-md-0">
                        <div class="footer-widget text-center">
                            <div class="logo">
                                <a href="{{ route('front.home-page') }}" class=""><img src="{{ $config->image->path ?? '' }}" alt="logo" style="max-width: 180px"></a>
                            </div>

                            <h6 class="widget-title">Đăng ký để nhận <br> thông tin và khuyến mại </h6>
                            <form class="newsletter-form" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                </div>
                                <button type="submit" class="btn btn-two">
                                            <span class="btn-wrap">
                                                <span class="text-first">Subscribe</span>
                                                <span class="text-second"><i class="bi bi-arrow-up-right"></i> <i class="bi bi-arrow-up-right"></i></span>
                                            </span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 mb-5 mb-md-0">
                        <div class="footer-widget text-md-end">
                            <div class="footer-nav">
                                <ul>
                                    <li class="menu-item"><a href="{{ route('front.getListProduct') }}">Sản phẩm</a></li>
                                    <li class="menu-item"><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="copyright">
                    <p><a href="#">{{ $config->web_title }}</a>, All Rights Reserved</p>
                </div>
                <div class="social-box style-oval">
                    <ul>
                        <li><a href="{{ $config->facebook }}"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="{{ $config->instagram }}"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="{{ $config->twitter }}"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="{{ $config->youtube }}"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="totop">
    <a href="#"><i class="bi bi-chevron-up"></i></a>
</div>
