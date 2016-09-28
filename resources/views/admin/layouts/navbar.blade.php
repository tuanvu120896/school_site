<div class="sidebar content-box" style="display: block;">
    <ul class="nav">
        <!-- Main menu -->
        <li><a href="{{route('user_list')}}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li class="submenu">
            <a href="{{route('user_list')}}">
                <i class="glyphicon glyphicon-record"></i> Trường Học
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="{{route('school_list')}}"><i class="glyphicon glyphicon-list"></i> Danh Sách</a></li>
                <li><a href="{{route('school_entry')}}"><i class="glyphicon glyphicon-plus-sign"></i> Thêm Mới</a></li>
            </ul>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user()->type_account == 0)
            <li class="submenu">
                <a href="{{route('user_list')}}">
                    <i class="glyphicon glyphicon-user"></i> Thành Viên
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('user_list')}}"><i class="glyphicon glyphicon-list"></i> Danh Sách</a></li>
                    <li><a href="{{route('user_entry')}}"><i class="glyphicon glyphicon-plus-sign"></i> Thêm Mới</a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="submenu">
            <a href="{{route('front_home')}}"><i class="glyphicon glyphicon-list-alt"></i> Hồ Sơ
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="{{route('dossier_list')}}"><i class="glyphicon glyphicon-list"></i> Danh Sách</a></li>
                <li><a href="{{route('dossier_entry')}}"><i class="glyphicon glyphicon-plus-sign"></i> Thêm Mới</a>
                </li>
            </ul>
        </li>
        <li class="submenu">
            <a href="{{route('front_home')}}"><i class="glyphicon glyphicon-th-list"></i> Thông Tin Các Vùng
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="{{route('area_info_list')}}"><i class="glyphicon glyphicon-list"></i> Danh Sách</a></li>
                <li><a href="{{route('area_info_entry')}}"><i class="glyphicon glyphicon-plus-sign"></i> Thêm Mới</a>
                </li>
            </ul>
        </li>
        <li><a href="{{route('front_home')}}" target="_blank"><i class="glyphicon glyphicon-eye-open"></i> View Site</a>
        </li>
    </ul>
</div>