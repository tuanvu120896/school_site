<!-- Menu -->
<nav role="navigation" class="swipe-menu js-swipe-menu">
    <ul class="swipe-menu-list js-swipe-menu-list"
        style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
        <li class="swipe-menu-item current">
            <a href="{{url(route('front_home'))}}" class="title"><i class="fa fa-lg fa-home spaceRight"></i></a>
        </li>
        <li class="swipe-menu-item">
            <a href="{{url(route('front_school'))}}" class="title">Tìm Trường</a>
        </li>
        <li class="swipe-menu-item">
            <a href="{{url(route('front_dossier_list'))}}" class="title">Làm Hồ Sơ</a>
        </li>
        <li class="swipe-menu-item">
            <a href="{{url(route('front_area_info_list'))}}" class="title">Thông Tin Khu Vực</a>
        </li>
    </ul>
</nav>
<!-- #Menu -->