@extends('admin.layouts.template')
@section('title')
    {{ucwords('thêm mới trường')}} - admin {{config('global.site')}}
@endsection
@section('style')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('school_entry')}}" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <fieldset>
                            <legend><i class="glyphicon glyphicon-plus"></i> {{ucwords('thêm mới trường')}}</legend>
                            <div class="col-md-12">
                                @if(Session::has('msg'))
                                    {!! Session::get('msg') !!}
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">trạng thái <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <select class="form-control status" name="status" id="status">
                                        <option value="1"> bản nháp </option>
                                        <option value="0" selected> public </option>
                                    </select>
                                    @if($errors->has('status'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">khu vực <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <select class="form-control locality" name="locality" id="select-1">
                                        @foreach($localities as $locality)
                                            <option value="{{$locality->id}}" @if(old('locality') == $locality->id) selected @endif >
                                                {{$locality->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('locality'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('locality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">thành phố <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <select class="form-control city" name="city" id="city">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" @if(old('city') == $city->id) selected @endif>
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('city'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">tên trường (tiếng anh) <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('name_en')}}" name="name_en"
                                           placeholder="tên tiếng anh"
                                           type="text">
                                    @if($errors->has('name_en'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">tên trường (tiếng nhật) <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('name_jp')}}" name="name_jp"
                                           placeholder="tên tiếng nhật"
                                           type="text">
                                    @if($errors->has('name_jp'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name_jp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">thư điện tử <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="địa chỉ email trường" type="text" name="email"
                                           value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">hình ảnh</label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="hình ảnh" type="file"
                                           name="image" value="">
                                    @if($errors->has('image'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">điện thoại <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="số điện thoại" type="text" name="phone"
                                           value="{{old('phone')}}">
                                    @if($errors->has('phone'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">mã bưu chính <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-2">
                                    <input class="form-control" placeholder="mã bưu chính" type="text" name="zip_code"
                                           value="{{old('zip_code')}}">
                                    @if($errors->has('zip_code'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('zip_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">địa chỉ 1 <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="địa chỉ 1" type="text" name="address1"
                                           value="{{old('address1')}}">
                                    @if($errors->has('address1'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('address1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">địa chỉ 2 <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="địa chỉ 2" type="text" name="address2"
                                           value="{{old('address2')}}">
                                    @if($errors->has('address2'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">số nhà <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="số nhà" type="text" name="home"
                                           value="{{old('home')}}">
                                    @if($errors->has('home'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('home') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">tòa nhà <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="tên tòa nhà" type="text" name="building"
                                           value="{{old('building')}}">
                                    @if($errors->has('building'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('building') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">website <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="url của website" type="text" name="url"
                                           value="{{old('url')}}">
                                    @if($errors->has('url'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">FAX <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="fax của trường" type="text" name="fax"
                                           value="{{old('fax')}}">
                                    @if($errors->has('fax'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('fax') }}</strong>
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
                                </div><div class="col-md-10 col-lg-push-2">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-save"></i>
                                        Lưu và Tiếp Tục
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
    <script>
        {{--option--}}
        $(document).ready(function () {
            $('.locality').change(function () {
                var id_locality = $(this).val();
                $.get("ajax/city/" + id_locality, function (data) {
                    console.log(data);
                    $("#city").html(data);
                });
            });
        });
    </script>
@endsection