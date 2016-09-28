<div id="leftMenu">
    <h3 id="titleMenu"><img alt="日本語教育機関を探す" src="{{url('asset/front/files/lm_title.gif')}}" width="280" height="35"></h3>
    <ul id="menu">
        <li class="{{session('active_menu') == 'school'?'crt':''}}"><a href="{{url(route('front_school'))}}">Tìm Trường Tiếng Nhật</a></li>
        <li class="{{session('active_menu') == 'dossier'?'crt':''}}"><a href="{{url(route('front_dossier_list'))}}">Hướng Dẫn Làm Hồ Sơ</a></li>
        <li class="{{session('active_menu') == 'area_info'?'crt':''}}"><a href="{{url(route('front_area_info_list'))}}">Thông Tin Về Các Khu Vực</a></li>
    </ul>


</div>