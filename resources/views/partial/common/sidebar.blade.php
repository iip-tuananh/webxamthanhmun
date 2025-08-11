<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
            <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
            @if(Auth::user()->type == App\Model\Common\User::SUPER_ADMIN)
            <a href="#" class="d-block" style="color: #fd7e14">Xin chào: {{ Auth::user()->account_name }}</a>
            @else
            <a href="#" class="d-block" style="color: #fd7e14">{{ App\Model\Common\User::find(Auth::user()->id)->name }}</a>
            @endif
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
                <a href="{{route('dash')}}" class="nav-link {{ request()->is('admin/common/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('admin/abouts') || request()->is('admin/abouts*') ||  request()->is('admin/video-block/*')
||  request()->is('admin/news-block/*') || request()->is('admin/gallery') || request()->is('admin/register-banner')  || request()->is('admin/amenities')
 || request()->is('admin/service-banner') || request()->is('admin/course-banner')
? 'menu-open' : '' }} ">
                <a href="#" class="nav-link {{  request()->is('admin/abouts') ||  request()->is('admin/video-block') ||  request()->is('admin/news-block*') ||
 request()->is('admin/abouts*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info"></i>
                    <p>
                        Cấu hình trang chủ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('abouts.edit') }}" class="nav-link {{ Request::routeIs('abouts.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Khối giới thiệu</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('gallery.index') }}" class="nav-link {{ Request::routeIs('gallery.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Khối ảnh gallery</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('registerBanner.edit') }}" class="nav-link {{ Request::routeIs('registerBanner.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Khối ảnh nền đánh giá khách hàng</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('amenities.index') }}" class="nav-link {{ Request::routeIs('amenities.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Khối vì sao chọn chúng tôi</p>
                        </a>
                    </li>




                    <li class="nav-item">
                        <a href="{{ route('serviceBanner.edit') }}" class="nav-link {{ Request::routeIs('serviceBanner.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Khối banner dịch vụ</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('courseBanner.edit') }}" class="nav-link {{ Request::routeIs('courseBanner.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Khối banner khóa học</p>
                        </a>
                    </li>

                    {{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('videoBlock.edit') }}" class="nav-link {{ Request::routeIs('videoBlock.edit') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Khối video</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('newsBlock.edit') }}" class="nav-link {{ Request::routeIs('newsBlock.edit') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Khối tin tức</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('admin/about-page/edit') ? 'menu-open' : '' }} ">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book-open	"></i>
                    <p>
                        Trang giới thiệu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('aboutPage.edit') }}" class="nav-link {{ Request::routeIs('aboutPage.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chỉnh sửa</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item has-treeview  {{ request()->is('admin/services') || request()->is('admin/services/*') || request()->is('admin/services') || request()->is('admin/services/*') ? 'menu-open' : '' }} ">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hands-helping"></i>
                    <p>
                        Dịch vụ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a href="{{ route('ServiceCategory.index') }}" class="nav-link {{ Request::routeIs('ServiceCategory.index') ? 'active' : '' }}">--}}
                    {{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
                    {{--                            <p>Quản lý danh mục dịch vụ</p>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ route('services.index') }}" class="nav-link {{ Request::routeIs('services.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Quản lý dịch vụ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('services.create') }}" class="nav-link {{ Request::routeIs('services.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới dịch vụ</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('admin/courses') || request()->is('admin/courses/*') || request()->is('admin/courses') || request()->is('admin/courses/*') ? 'menu-open' : '' }} ">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Khóa học
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link {{ Request::routeIs('courses.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Quản lý khóa học</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('courses.create') }}" class="nav-link {{ Request::routeIs('courses.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới khóa học</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('admin/products') || request()->is('admin/products*')
|| request()->is('admin/categories') || request()->is('admin/categories*') || request()->is('admin/category-special') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-dropbox"></i>
                    <p>
                        Quản lý hàng hóa
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('category_special.index')}}" class="nav-link {{ Request::routeIs('category_special.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>
                                Danh mục đặc biệt
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Category.index') }}" class="nav-link {{ Request::routeIs('Category.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Category.create') }}" class="nav-link {{ Request::routeIs('Category.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Product.index') }}" class="nav-link {{ Request::routeIs('Product.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách hàng hóa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Product.create') }}" class="nav-link {{ Request::routeIs('Product.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới hàng hóa</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item has-treeview  {{ request()->is('admin/teams') || request()->is('admin/teams/*') || request()->is('admin/teams')
 || request()->is('admin/teams/*')  || request()->is('admin/team-banner') ? 'menu-open' : '' }} ">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users fa-2x"></i>
                    <p>
                      Đội ngũ thành viên
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('teamBanner.edit') }}" class="nav-link {{ Request::routeIs('teamBanner.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Cấu hình banner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teams.index') }}" class="nav-link {{ Request::routeIs('teams.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Quản lý đội ngũ</p>
                        </a>
                    </li>
                </ul>
            </li>


            {{--            <li class="nav-item has-treeview  {{ request()->is('admin/rooms')--}}
{{--|| request()->is('admin/rooms*') || request()->is('admin/category-special*')--}}
{{-- ? 'menu-open' : '' }} ">--}}
{{--                <a href="#" class="nav-link {{  request()->is('admin/rooms') || request()->is('admin/rooms*') || request()->is('admin/category-special*') ? 'active' : '' }}">--}}
{{--                    <i class="nav-icon fas fa-hotel"></i>--}}
{{--                    <p>--}}
{{--                        Hạng phòng--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('category_special.index') }}" class="nav-link {{ Request::routeIs('category_special.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục đặc biệt</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('Room.index') }}" class="nav-link {{ Request::routeIs('Room.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Quản lý hạng phòng</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('Room.create') }}" class="nav-link {{ Request::routeIs('Room.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Thêm mới hạng phòng</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}



{{--            <li class="nav-item has-treeview  {{ request()->is('admin/amenities') || request()->is('admin/amenities/*') || request()->is('admin/amenities')--}}
{{--|| request()->is('admin/amenities/*') ? 'menu-open' : '' }} ">--}}

{{--                <a href="#" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-th-list"></i>--}}
{{--                    <p>--}}
{{--                        Tiện ích--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}

{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('amenities.index') }}" class="nav-link {{ Request::routeIs('amenities.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục tiện ích</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}



            <li class="nav-item has-treeview {{
      request()->is('admin/orders*') ||  request()->is('admin/order-banner')
        ? 'menu-open'
        : ''
    }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-exchange-alt"></i>
                    <p>
                        Quản lý đơn hàng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('orderPages.edit') }}" class="nav-link {{ Request::routeIs('orderPages.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Cấu hình banner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}"
                           class="nav-link {{ Request::routeIs('orders.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách đơn hàng</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('admin/posts') || request()->is('admin/posts/*') || request()->is('admin/post-categories')
 || request()->is('admin/post-categories/*')  || request()->is('admin/blog-banner') ? 'menu-open' : '' }} ">

                <a href="#" class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') || request()->is('admin/post-categories') || request()->is('admin/post-categories/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-blog"></i>
                    <p>
                        Blog
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('blogPages.edit') }}" class="nav-link {{ Request::routeIs('blogPages.edit') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Cấu hình banner</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ route('PostCategory.index') }}" class="nav-link {{ Request::routeIs('PostCategory.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Post.index') }}" class="nav-link {{ Request::routeIs('Post.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Quản lý bài viết</p>
                        </a>
                    </li>
                </ul>
            </li>





            <li class="nav-item has-treeview  {{ request()->is('admin/contacts') || request()->is('admin/contact-banner') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-headset"></i>

                    <p>
                        Trang liên hệ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('contactPages.edit') }}" class="nav-link {{ Request::routeIs('contactPages.edit') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Cấu hình banner</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ route('contacts.index') }}" class="nav-link {{ Request::routeIs('contacts.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh mục khách hàng liên hệ</p>
                        </a>
                    </li>
                </ul>
            </li>















{{--            <li class="nav-item has-treeview  {{ request()->is('admin/projects') || request()->is('admin/projects/*') || request()->is('admin/projects') || request()->is('admin/projects/*') ? 'menu-open' : '' }} ">--}}

{{--                <a href="#" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-project-diagram"></i>--}}
{{--                    <p>--}}
{{--                        Dự án--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('projects.index') }}" class="nav-link {{ Request::routeIs('projects.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Quản lý dự án</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('projects.create') }}" class="nav-link {{ Request::routeIs('projects.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Thêm mới dự án</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="nav-item has-treeview  {{ request()->is('admin/posts') || request()->is('admin/posts/*') || request()->is('admin/post-categories') || request()->is('admin/post-categories/*') ? 'menu-open' : '' }} ">--}}

{{--                <a href="#" class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') || request()->is('admin/post-categories') || request()->is('admin/post-categories/*') ? 'active' : '' }}">--}}
{{--                    <i class="nav-icon fas fa-blog"></i>--}}
{{--                    <p>--}}
{{--                        Blog--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('PostCategory.index') }}" class="nav-link {{ Request::routeIs('PostCategory.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('Post.index') }}" class="nav-link {{ Request::routeIs('Post.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Quản lý bài viết</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}


{{--            <li class="nav-item has-treeview  {{ request()->is('admin/abouts') || request()->is('admin/abouts/*') || request()->is('admin/abouts') || request()->is('admin/abouts/*') ? 'menu-open' : '' }} ">--}}
{{--                <a href="#" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-info"></i>--}}
{{--                    <p>--}}
{{--                        Về chúng tôi--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('abouts.edit') }}" class="nav-link {{ Request::routeIs('abouts.edit') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Chỉnh sửa trang giới thiệu</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('aboutCategory.index') }}" class="nav-link {{ Request::routeIs('aboutCategory.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Quản lý danh mục</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('about-page.index') }}" class="nav-link {{ Request::routeIs('about-page.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Quản lý bài viết giới thiệu</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}













            <li class="nav-item has-treeview  {{ request()->is('admin/stores') ||  request()->is('admin/banners') ||  request()->is('admin/origins') || request()->is('admin/manufacturers/*') || request()->is('admin/attributes') ? 'menu-open' : '' }} ">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Danh mục khác
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('banners.index') }}" class="nav-link {{ Request::routeIs('banners.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh mục banner trang chủ</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{ route('Review.index') }}" class="nav-link {{ Request::routeIs('Review.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>
                                Đánh giá khách hàng
                            </p>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('contacts.index') }}" class="nav-link {{ Request::routeIs('contacts.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục khách hàng liên hệ</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Người dùng
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('User.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Tài khoản</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ route('User.create') }}" class="nav-link">
                            <i class="far fas fa-angle-right nav-icon"></i>
                            <p>Tạo tài khoản</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Role.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chức vụ</p>
                        </a>
                    </li> --}}
                </ul>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('uptek/configs') || request()->is('uptek/customer-levels') || request()->is('uptek/accumulate-point/*') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Cấu hình hệ thống
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('Config.edit') }}" class="nav-link  {{ Request::routeIs('Config.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Cấu hình chung</p>
                        </a>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('configStatistic.index') }}" class="nav-link {{ Request::routeIs('configStatistic.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Cấu hình số liệu thống kê</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
