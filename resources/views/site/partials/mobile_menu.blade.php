<!-- Mobile Responsive Menu -->
<div class="mr_menu" data-lenis-prevent>
    <button type="button" class="mr_menu_close"><i class="bi bi-x-lg"></i></button>
    <div class="logo"></div> <!-- Keep this div empty. Logo will come here by JavaScript -->

    <h6>Menu</h6>
    <div class="mr_navmenu"></div> <!-- Keep this div empty. Menu will come here by JavaScript -->

    <h6>Contact Us</h6>
    <div class="wptb-icon-box1 style2">
        <div class="wptb-item--inner flex-start">
            <div class="wptb-item--icon"><i class="bi bi-envelope"></i></div>
            <div class="wptb-item--holder">
                <p class="wptb-item--description"><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></p>
            </div>
        </div>
    </div>

    <div class="wptb-icon-box1 style2">
        <div class="wptb-item--inner flex-start">
            <div class="wptb-item--icon"><i class="bi bi-geo-alt"></i></div>
            <div class="wptb-item--holder">
                <p class="wptb-item--description" style="text-align: left"><a href="#">{{ $config->address_company }}</a></p>
            </div>
        </div>
    </div>

    <div class="wptb-icon-box1 style2">
        <div class="wptb-item--inner flex-start">
            <div class="wptb-item--icon"><i class="bi bi-envelope"></i></div>
            <div class="wptb-item--holder">
                <p class="wptb-item--description" ><a href="tel:{{ $config->hotline }}1">{{ $config->hotline }}</a></p>
            </div>
        </div>
    </div>

    <h6>Find Our Page</h6>
    <div class="social-box">
        <ul>
            <li><a href="{{ $config->facebook }}"><i class="bi bi-facebook"></i></a></li>
            <li><a href="{{ $config->instagram }}"><i class="bi bi-instagram"></i></a></li>
            <li><a href="{{ $config->twitter }}"><i class="bi bi-twitter"></i></a></li>
            <li><a href="{{ $config->youtube }}"><i class="bi bi-youtube"></i></a></li>
        </ul>
    </div>
</div>

<div class="aside_info_wrapper" data-lenis-prevent>
    <button class="aside_close">Close <i class="bi bi-x-lg"></i></button>

    <div class="aside_logo logo">
        <a href="index.html" class="light_logo"><img src="{{ $config->image->path }}" alt="logo" style="max-width: 120px"></a>
        <a href="index.html" class="dark_logo"><img src="{{ $config->image->path }}" alt="logo"></a>
    </div>

    <div class="aside_info_inner">

        <h6>// Instagram</h6>
        <div class="insta-logo">
            <i class="bi bi-instagram"></i> {{ $config->web_title }}
        </div>
        <div class="wptb-instagram--gallery">
            <div class="wptb-item--inner d-flex align-items-center justify-content-center flex-wrap">
                @foreach($galleries as $gallery)
                    <div class="wptb-item">
                        <div class="wptb-item--image">
                            <img src="{{ $gallery->image->path ?? '' }}" alt="img" style="width: 80px; height: 80px">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


        <div class="wptb-icon-box1 style2">
            <div class="wptb-item--inner flex-start">
                <div class="wptb-item--icon"><i class="bi bi-envelope"></i></div>
                <div class="wptb-item--holder">
                    <p class="wptb-item--description"><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></p>
                </div>
            </div>
        </div>

        <div class="wptb-icon-box1 style2">
            <div class="wptb-item--inner flex-start">
                <div class="wptb-item--icon"><i class="bi bi-geo-alt"></i></div>
                <div class="wptb-item--holder">
                    <p class="wptb-item--description" style="text-align: left"><a href="#">{{ $config->address_company }}</a></p>
                </div>
            </div>
        </div>

        <div class="wptb-icon-box1 style2">
            <div class="wptb-item--inner flex-start">
                <div class="wptb-item--icon"><i class="bi bi-envelope"></i></div>
                <div class="wptb-item--holder">
                    <p class="wptb-item--description"><a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a></p>
                </div>
            </div>
        </div>

        <h6>// Follow Us</h6>
        <div class="social-box style-square">
            <ul>
                <li><a href="{{ $config->facebook }}"><i class="bi bi-facebook"></i></a></li>
                <li><a href="{{ $config->instagram }}"><i class="bi bi-instagram"></i></a></li>
                <li><a href="{{ $config->twitter }}"><i class="bi bi-twitter"></i></a></li>
                <li><a href="{{ $config->youtube }}"><i class="bi bi-youtube"></i></a></li>
            </ul>

        </div>
    </div>
</div>

<!-- Modal Search -->
<div class="search-modal">
    <div class="modal fade" id="modalSearch">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="search_overlay">
                    <form class="credential-form" method="post">
                        <div class="form-group">
                            <input type="text" name="search" class="keyword form-control" placeholder="Search Here">
                        </div>
                        <button type="submit" class="btn-search">
                            <span class="text-first"> <i class="bi bi-arrow-right"></i> </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
