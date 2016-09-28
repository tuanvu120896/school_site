@extends('admin.layouts.template')
@section('title')
    {{ucwords('thay đổi thông tin khóa học')}} - admin {{config('global.site')}}
@endsection
@section('style')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('school_edit_course',['id' => $id])}}"
                          method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <fieldset>
                            <div class="col-md-12">
                                @if(Session::has('msg'))
                                    {!! Session::get('msg') !!}
                                @endif
                            </div>
                            <legend><i class="glyphicon glyphicon-edit"></i> {{ucwords('thay đổi thông tin khóa học')}}</legend>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">khóa học <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('name')?old('name'):$course->name}}" name="name"
                                           placeholder="khóa học"
                                           type="text">
                                    @if($errors->has('name'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">lượng thời gian học <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('time')?old('time'):$course->time}}" name="time"
                                           placeholder="số thời gian học"
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
                                    <input class="form-control" value="{{old('admission_money')?old('admission_money'):$course->admission_money}}"
                                           name="admission_money"
                                           placeholder="số tiền nhập học"
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
                                    <input class="form-control" value="{{old('tuition_money')?old('tuition_money'):$course->tuition_money}}" name="tuition_money"
                                           placeholder="số tiền học phí"
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
                                    <input class="form-control" value="{{old('other_money')?old('other_money'):$course->other_money}}" name="other_money"
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
                                    <input class="form-control" value="{{old('date')?old('date'):$course->date}}" name="date"
                                           placeholder="ngày bắt đầu học"
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
                                    <input class="form-control" value="{{old('record_money')?old('record_money'):$course->record_money}}" name="record_money"
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
                                        Cập Nhật
                                    </button>
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