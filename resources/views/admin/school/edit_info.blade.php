@extends('admin.layouts.template')
@section('title')
    Edit other info about school - admin {{config('global.site')}}
@endsection
@section('style')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('school_edit_info',['id' => $id_school])}}" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <fieldset>
                            <legend><span class="glyphicon glyphicon-edit"></span> edit other info about school</legend>
                            <div class="col-md-12">
                                @if(Session::has('msg'))
                                    {!! Session::get('msg') !!}
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">Nội trú <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('dorm_status')?old('dorm_status'):$school_detail['dorm_status']}}" name="dorm_status"
                                           placeholder="tình trạng nội trú"
                                           type="text">
                                    @if($errors->has('dorm_status'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('dorm_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">Tiền hàng tháng <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('dorm_money')?old('dorm_money'):$school_detail['dorm_money']}}" name="dorm_money"
                                           placeholder="tiền nội trú mỗi tháng"
                                           type="text">
                                    @if($errors->has('dorm_money'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('dorm_money') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Hình thức thi <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <div style="border-radius: 5px; border: 1px solid #cccccc; padding: 10px">
                                        <div class="checkbox">
                                            <label class="checkbox-inline">
                                                <input name="type_test[]"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Khảo sát trước",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Khảo sát trước",$school_detail['type_test'])) checked @endif
                                                       type="checkbox" value="Khảo sát trước">Khảo sát trước</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Năng lực tiếng Nhật (JLPT)",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Năng lực tiếng Nhật (JLPT)",$school_detail['type_test'])) checked @endif
                                                       value="Năng lực tiếng Nhật (JLPT)">Năng lực tiếng Nhật (JLPT)</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Phỏng vấn cá nhân",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Phỏng vấn cá nhân",$school_detail['type_test'])) checked @endif
                                                       value="Phỏng vấn cá nhân">Phỏng vấn cá nhân</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Check hồ sơ",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Check hồ sơ",$school_detail['type_test'])) checked @endif
                                                       type="checkbox" value="Check hồ sơ">Check hồ sơ</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Bài viết luận",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Bài viết luận",$school_detail['type_test'])) checked @endif
                                                       value="Bài viết luận">Bài viết luận</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Phỏng vấn người bảo lãnh",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Phỏng vấn người bảo lãnh",$school_detail['type_test'])) checked @endif
                                                       value="Phỏng vấn người bảo lãnh">Phỏng vấn người bảo lãnh</label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Kiểm tra viết",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Kiểm tra viết",$school_detail['type_test'])) checked @endif
                                                       value="Kiểm tra viết">Kiểm tra viết</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Phỏng vấn tại địa phương",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Phỏng vấn tại địa phương",$school_detail['type_test'])) checked @endif
                                                       value="Phỏng vấn tại địa phương">Phỏng vấn tại địa phương</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Kiểm tra khả năng thích ứng",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Kiểm tra khả năng thích ứng",$school_detail['type_test'])) checked @endif
                                                       value="Kiểm tra khả năng thích ứng">Kiểm tra khả năng thích ứng</label>
                                            <label class="checkbox-inline">
                                                <input name="type_test[]" type="checkbox"
                                                       @if(old('type_test') && is_array(old('type_test')) && in_array("Hình thức khác",old('type_test'))) checked @endif
                                                       @if(!old('type_test') && is_array($school_detail['type_test']) && in_array("Hình thức khác",$school_detail['type_test'])) checked @endif
                                                       value="Hình thức khác">Hình thức khác</label>
                                        </div>
                                    </div>
                                    @if($errors->has('type_test'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('type_test') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Hướng dẫn nghề nghiệp <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <textarea class="form-control" placeholder="hướng dẫn nghề nghiệp "
                                              name="career">{{old('career')?old('career'):$school_detail['career']}}</textarea>
                                    @if($errors->has('career'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('career') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Học bổng <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="học bổng" type="text" name="scholarship"
                                           value="{{old('scholarship')?old('scholarship'):$school_detail['scholarship']}}">
                                    @if($errors->has('scholarship'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('scholarship') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Việc làm thêm <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="việc làm thêm " type="text" name="overtime"
                                           value="{{old('overtime')?old('overtime'):$school_detail['overtime']}}">
                                    @if($errors->has('overtime'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('overtime') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Nhân viên việt nam <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="Nhân viên việt" type="text" name="staff"
                                           value="{{old('staff')?old('staff'):$school_detail['staff']}}">
                                    @if($errors->has('staff'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('staff') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Số học sinh <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="số lượng học sinh" type="text" name="number_student"
                                           value="{{old('number_student')?old('number_student'):$school_detail['number_student']}}">
                                    @if($errors->has('number_student'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('number_student') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Trạng thái</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" placeholder="trạng thái"   name="about">{{old('about')?old('about'):$school_detail['about']}}</textarea>
                                    @if($errors->has('about'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Học tiếng nhật <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <textarea class="form-control" placeholder="tình hình học tiếng nhật"  name="japanese">{{old('japanese')?old('japanese'):$school_detail['japanese']}}</textarea>
                                    @if($errors->has('japanese'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('japanese') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">số quốc tịch <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="số lượng quốc tịch" type="text" name="number_country"
                                           value="{{old('number_country')?old('number_country'):$school_detail['number_country']}}">
                                    @if($errors->has('number_country'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('number_country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </fieldset>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-10 col-lg-push-2">
                                    <i>(note : <strong style="color:
                                red">*</strong> is required)</i>
                                </div><div class="col-md-10 col-lg-push-2">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-save"></i>
                                        Update
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