@extends('admin.layouts.template')
@section('title')
    {{ucwords('thêm khóa học')}} - admin {{config('global.site')}}
@endsection
@section('style')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('school_add_course',['id' => $id_school])}}"
                          method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <fieldset>
                            <div class="col-md-12">
                                @if(Session::has('msg'))
                                    {!! Session::get('msg') !!}
                                @endif
                            </div>
                            @if(count($courses) > 0)
                                <legend><i class="glyphicon glyphicon-list"></i> {{ucwords('Danh sách khóa học')}}(<a href="#">{{count($courses)}}</a>)</legend>
                                <table class="table table-bordered table-responsive table-hover">
                                    <thead>
                                    <tr>
                                        <th>.no</th>
                                        <th>tên</th>
                                        <th>tổng thời gian học</th>
                                        <th>tiền nhập học</th>
                                        <th>tiền học phí</th>
                                        <th>tiền khác</th>
                                        <th>tổng</th>
                                        <th>ngày học</th>
                                        <th>tiền làm hồ sơ</th>
                                    </tr>
                                    </thead>
                                    @foreach($courses as $key => $course)
                                        <tr>
                                            <td class="">{{$key + 1}}</td>
                                            <td class="">{{$course->name}}</td>
                                            <td class="">{{$course->time}}</td>
                                            <td class="">{{$course->admission_money}}</td>
                                            <td class="">{{$course->tuition_money}}</td>
                                            <td class="">{{$course->other_money}}</td>
                                            <td class="">{{$course->other_money + $course->tuition_money + $course->admission_money}}</td>
                                            <td class="">{{$course->date}}</td>
                                            <td class="">{{$course->record_money}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                            <legend><i class="glyphicon glyphicon-plus"></i> {{ucwords('thêm khóa học')}}</legend>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">khóa học <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('name')}}" name="name"
                                           placeholder="tên khóa học"
                                           type="text">
                                    @if($errors->has('name'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">tổng thời gian <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('time')}}" name="time"
                                           placeholder="thời gian học"
                                           type="text">
                                    @if($errors->has('time'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">tiền nhập học <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('admission_money')}}"
                                           name="admission_money"
                                           placeholder="tiền nhập học"
                                           type="text">
                                    @if($errors->has('admission_money'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('admission_money') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">tiền học phí <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('tuition_money')}}" name="tuition_money"
                                           placeholder="học phí"
                                           type="text">
                                    @if($errors->has('tuition_money'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('tuition_money') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">chi phí khác <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('other_money')}}" name="other_money"
                                           placeholder="chi phí khác"
                                           type="text">
                                    @if($errors->has('other_money'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('other_money') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">ngày học <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('date')}}" name="date"
                                           placeholder="ngày bắt đầu"
                                           type="text">
                                    @if($errors->has('date'))
                                        <span style="color:red;">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="col-md-2 control-label" for="text-field">tiền làm hồ sơ <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('record_money')}}" name="record_money"
                                           placeholder="tiền hồ sơ"
                                           type="text">
                                    @if($errors->has('record_money'))
                                        <span style="color:red;">
                                                <strong>{{ $errors->first('record_money') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-10 col-lg-push-2">
                                    <i>(chú ý : <strong style="color:
                                red">*</strong> bắt buộc)</i>
                                </div>
                                <div class="col-md-10 col-lg-push-2">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-save"></i>
                                        Lưu Khóa Học
                                    </button>

                                    @if(count($courses) > 0)<a class="btn btn-danger" href="{{url(route('school_detail',['id' => $id_school]))}}" type="button">
                                        <i class="fa fa-save"></i>
                                        Hoàn Thành
                                    </a>@endif
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection