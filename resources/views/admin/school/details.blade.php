@extends('admin.layouts.template')
@section('title')
    {{ucwords('thông tin trường')}} - <a href="#"
                                         style="color: blue">{{ucwords(strtolower($school['name_en']))}} -
        admin {{config('global.site')}}
        @endsection
        @section('style')
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        @endsection
        @section('main_template')
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('msg'))
                        {!! Session::get('msg') !!}
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title"><i
                                        class="glyphicon glyphicon-list"></i> {{ucwords('thông tin trường')}} : <a
                                        href="#"
                                        style="color: blue">{{ucwords(strtolower($school['name_en']))}}</a>
                                @if($school['status'] == 0)
                                    <strong class="text-success">(public)</strong>
                                @else
                                    <strong class="text-danger">(bản nháp)</strong>
                                    @endif</td>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="{{session('active') == 'home'?'active':''}} {{!session('active')?'active':''}}">
                                    <a data-toggle="tab" href="#main">Thông Tin Cơ Bản</a></li>
                                <li class="{{session('active') == 'info'?'active':''}}"><a data-toggle="tab"
                                                                                           href="#other">Thông Tin
                                        Khác</a></li>
                                <li class="{{session('active') == 'course'?'active':''}}"><a data-toggle="tab"
                                                                                             href="#course">Khóa Học</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="main"
                                     class="tab-pane {{!session('active')?'fade in active':''}} {{session('active') == 'home'?'fade in active':''}}">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class=" col-md-12 col-lg-12">
                                                <table class="table table-user-information ">
                                                    <tbody>
                                                    <tr>
                                                        <th width="15%">trạng thái:</th>
                                                        <td width="85%">
                                                            @if($school['status'] == 0)
                                                                <strong class="text-success">public</strong>
                                                            @else
                                                                <strong class="text-danger">bản nháp</strong>
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">tên trường (tiếng nhật):</th>
                                                        <td width="85%">{{$school['name_jp']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">tên trường (tiếng anh):</th>
                                                        <td width="85%">{{ucwords(strtolower($school['name_en']))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">thư điện tử:</th>
                                                        <td width="85%">{{$school['email']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>số điện thoại:</th>
                                                        <td>{{$school['phone']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>thành phố:</th>
                                                        <td>{{$school['city_name']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>mã bưu điện:</th>
                                                        <td>{{$school['zip_code']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>số nhà:</th>
                                                        <td>{{$school['home']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>tên tòa nhà:</th>
                                                        <td>{{$school['building']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>hình ảnh:</th>
                                                        @if(!is_null($school['image']))
                                                            <td><img src="{{url('asset/image/school/'.$school['image'])}}"
                                                                     width="100" height="100"></td>
                                                        @else
                                                            <th>unavailable</th>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>website:</th>
                                                        <td>{{$school['url']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>fax:</th>
                                                        <td>{{$school['fax']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>địa chỉ 1:</th>
                                                        <td>{{$school['address1']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>địa chỉ 2:</th>
                                                        <td>{{$school['address2']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>thay đổi thông tin:</th>
                                                        <td>
                                                            <?php
                                                            echo \Carbon\Carbon::createFromTimeStamp(strtotime($school['updated_at']))->diffForHumans();
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ngày tạo:</th>
                                                        <td>{{$school['created_at']}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="{{route('school_list')}}" class="btn btn-sm btn-primary"><i
                                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                            <span class="pull-right">
                                        <a type="button" class="btn btn-sm btn-warning"
                                           href="{{route('school_edit',['id' => $school['id']])}}"><i
                                                    class="glyphicon glyphicon-edit"></i> edit</a>
                                        <a onclick="return confirm('are you sure delete it ?')" type="button"
                                           class="btn btn-sm btn-danger"
                                           href="{{route('school_delete',['id' => $school['id']])}}"><i
                                                    class="glyphicon glyphicon-remove"></i>delete</a>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div id="other" class="tab-pane {{session('active') == 'info'?'fade in active':''}}">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class=" col-md-12 col-lg-12">
                                                <table class="table table-user-information ">
                                                    <tbody>
                                                    <tr>
                                                        <th width="15%">trạng thái nội trú:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->dorm_status?$school['school_details']->dorm_status:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">tiền mỗi tháng:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->dorm_money?$school['school_details']->dorm_money:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">hình thứ kiểm tra:</th>
                                                        <td width="85%" style="vertical-align: middle">
                                                            @if(count($school['school_details']->type_test) > 0)
                                                                @foreach($school['school_details']->type_test as $type_test)
                                                                    {{$type_test.',' }}
                                                                @endforeach
                                                            @else
                                                                unavailable
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">hướng dẫn nghề nghiệp:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->career?$school['school_details']->career:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">học bổng:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->scholarship?$school['school_details']->scholarship:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">việc làm thêm:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->overtime?$school['school_details']->overtime:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">nhân viên việt nam:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->staff}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">số lượng học sinh:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->number_student?$school['school_details']->number_student:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">trạng thái:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->about?$school['school_details']->about:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">tình hình học tiếng nhật:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->japanese?$school['school_details']->japanese:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">số quốc tịch:</th>
                                                        <td width="85%" style="vertical-align: middle">{{$school['school_details']->number_country?$school['school_details']->number_country:''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="15%">cập nhật:</th>
                                                        <td width="85%" style="vertical-align: middle">
                                                            <?php
                                                            echo \Carbon\Carbon::createFromTimeStamp(strtotime($school['school_details']->updated_at ? $school['school_details']->updated_at : ''))->diffForHumans();
                                                            ?>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="{{route('school_list')}}" class="btn btn-sm btn-primary"><i
                                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                            <span class="pull-right">
                                        <a type="button" class="btn btn-sm btn-warning"
                                           href="{{route('school_edit_info',['id' => $school['id']])}}"><i
                                                    class="glyphicon glyphicon-edit"></i> edit</a>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div id="course" class="tab-pane {{session('active') == 'course'?'fade in active':''}}">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class=" col-md-12 col-lg-12">
                                                <table class="table table-bordered table-responsive table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>.no</th>
                                                        <th>tên khóa học</th>
                                                        <th>tổng thời gian</th>
                                                        <th>tiền nhập học</th>
                                                        <th>tiền học phí</th>
                                                        <th>chí phí khác</th>
                                                        <th>tổng</th>
                                                        <th>ngày học</th>
                                                        <th>tiền làm hồ sơ</th>
                                                        @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                                            <th>hành động</th>
                                                        @endif

                                                    </tr>
                                                    </thead>
                                                    @if(count($school['courses']) > 0)
                                                        @foreach($school['courses'] as $key => $course)
                                                            <tr>
                                                                <td class="">{{$key + 1}}</td>
                                                                <td class="">{{$course->name}}</td>
                                                                <td class="">{{$course->time}}</td>
                                                                <td class="">{{number_format($course->admission_money)}}</td>
                                                                <td class="">{{number_format($course->tuition_money)}}</td>
                                                                <td class="">{{number_format($course->other_money)}}</td>
                                                                <td class="">{{number_format($course->other_money + $course->tuition_money + $course->admission_money)}}</td>
                                                                <td class="">{{$course->date}}</td>
                                                                <td class="">{{number_format($course->record_money)}}</td>
                                                                @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                                                    <td>
                                                                        <a type="button" class="btn btn-sm btn-warning"
                                                                           href="{{route('school_edit_course',['id' => $course->id])}}"><i
                                                                                    class="glyphicon glyphicon-edit"></i>
                                                                            edit</a>
                                                                        <a onclick="return confirm('are you sure delete it ?')"
                                                                           type="button" class="btn btn-sm btn-danger"
                                                                           href="{{route('school_delete_course',['id' => $course->id])}}"><i
                                                                                    class="glyphicon glyphicon-remove"></i>delete</a>
                                                                    </td>
                                                                @endif

                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="10" class="text-center">
                                                                course is empty ! <a
                                                                        href="{{url(route('school_add_course',['id' => $school['id']]))}}">Add
                                                                    Now</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </table>
                                            </div>
                                            <a href="{{route('school_add_course',['id' => $school['id']])}}"
                                               class="btn btn-sm btn-success pull-right"><i
                                                        class="glyphicon glyphicon-plus"></i> New Course</a>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="{{route('school_list')}}" class="btn btn-sm btn-primary"><i
                                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('script')
@endsection