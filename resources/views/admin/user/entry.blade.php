@extends('admin.layouts.template')
@section('title')
    entry new user - admin {{config('global.site')}}
@endsection
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('user_entry')}}" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <fieldset>
                            <legend>Entry new user</legend>
                            <div class="form-group">
                                <label class="col-md-1 control-label" for="text-field">Name <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('name')}}" name="name" placeholder="Name"
                                           type="text">
                                    @if($errors->has('name'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label" for="select-1">Type <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="type_account" id="select-1">
                                        <option value="1" selected {{old('type_account') == '1'?'selected':''}}>Writer
                                        </option>
                                        <option value="2" {{old('type_account') == '2'?'selected':''}}>Viewer</option>
                                        <option value="3" {{old('type_account') == '3'?'selected':''}}>Limit</option>
                                    </select>
                                    @if($errors->has('type_account'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('type_account') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">E-mail <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="E-mail" type="email" name="email"
                                           value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Phone</label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="Phone" type="text" name="phone"
                                           value="{{old('phone')}}">
                                    @if($errors->has('phone'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Address</label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="Address" type="text" name="address"
                                           value="{{old('address')}}">
                                    @if($errors->has('address'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label" for="textarea">Birthday</label>
                                <div class="col-md-10">
                                    <input class="date form-control" name="birthday" type="text"
                                           value="{{old('birthday')}}">
                                    @if($errors->has('birthday'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('birthday') }}</strong>
                                        </span>
                                    @endif
                                    <script type="text/javascript">
                                        $('.date').datepicker({
                                            format: 'dd-mm-yyyy',
                                            default: true
                                        });
                                        $('.date').datepicker('setDate', new Date());
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label" for="textarea">Gender</label>
                                <div class="col-md-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" id="inlineRadio1"
                                               value="male" checked {{old('gender') == 'male'?'checked':''}}> Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" id="inlineRadio2"
                                               value="female" {{old('gender') == 'female'?'checked':''}}> Female
                                    </label>
                                    @if($errors->has('gender'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Avatar</label>
                                <div class="col-md-10">
                                    <input class="form-control" placeholder="Image" type="file"
                                           name="image" value="">
                                    @if($errors->has('image'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </fieldset>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-save"></i>
                                        Entry
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