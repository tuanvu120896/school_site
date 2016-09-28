@extends('admin.layouts.template')
@section('title')
    edit user - admin school site
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
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <img alt="User Pic"
                             src="@if(!$user->image)
                             @if(!$user->gender  == 'male')
                             {{url('asset/image/default/avatar-default-male.png')}}
                             @else
                             {{url('asset/image/default/avatar-default-female.png')}}
                             @endif
                             @else
                             {{url('asset/image/avatar/'.$user->image)}}
                             @endif" class="img-circle img-responsive text-center" >
                        <button type="button" data-toggle="modal" data-target="#imageMo"
                                class="btn btn-link fa-border center-block" style="margin-top: 5px">edit your avatar
                        </button>
                        @if (Session::has('msg_image'))
                            {!! Session::get('msg_image') !!}
                        @endif
                        @if($errors->has('image_edit'))
                            <div style="color:red;" class="alert-warning">
                                <strong>{{ $errors->first('image_edit') }}</strong>
                            </div>
                            @endif

                                    <!-- Modal -->
                            <div class="modal fade" id="imageMo" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{route('profile_image')}}"
                                              enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Change Avatar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Image" type="file"
                                                           name="image_edit" value="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        <form class="form-horizontal" action="{{route('profile_edit')}}" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <fieldset>
                                <legend>Edit your account</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="text-field">Name <strong style="color:
                                red">*</strong></label>
                                    <div class="col-md-10">
                                        <input class="form-control" value="{{old('name')?old('name'):$user->name}}"
                                               name="name" placeholder="Name"
                                               type="text">
                                        @if($errors->has('name'))
                                            <span style="color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="select-1">Type <strong style="color:
                                red">*</strong></label>
                                    <div class="col-md-10">
                                        <select class="form-control"  id="select-1" readonly>
                                            <option value="{{$user->type_account}}" readonly>
                                                @if($user->type_account == '0')
                                                    Admin
                                                @elseif($user->type_account == '1')
                                                    Writer
                                                @elseif($user->type_account == '2')
                                                    Viewer
                                                @else
                                                    Limit
                                                @endif
                                            </option>
                                        </select>
                                        @if($errors->has('type_account'))
                                            <span style="color:red;">
                                            <strong>{{ $errors->first('type_account') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">E-mail <strong style="color:
                                red">*</strong></label>
                                    <div class="col-md-10">
                                        <input class="form-control" placeholder="E-mail" type="email" name="email"
                                               value="{{old('email')?old('email'):$user->email}}">
                                        @if($errors->has('email'))
                                            <span style="color:red;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Password</label>
                                    <div class="col-md-10">
                                        <input class="form-control" placeholder="Password" type="password"
                                               name="password">
                                        @if($errors->has('password'))
                                            <span style="color:red;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Password Confirm</label>
                                    <div class="col-md-10">
                                        <input class="form-control" placeholder="Password Confirmation" type="password"
                                               name="password_confirmation"
                                               value="">
                                        @if($errors->has('password_confirmation'))
                                            <span style="color:red;">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Phone</label>
                                    <div class="col-md-10">
                                        <input class="form-control" placeholder="Phone" type="text" name="phone"
                                               value="{{old('phone')?old('phone'):$user->phone}}">
                                        @if($errors->has('phone'))
                                            <span style="color:red;">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Address</label>
                                    <div class="col-md-10">
                                        <input class="form-control" placeholder="Address" type="text" name="address"
                                               value="{{old('address')?old('address'):$user->address}}">
                                        @if($errors->has('address'))
                                            <span style="color:red;">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textarea">Birthday</label>
                                    <div class="col-md-10">
                                        <input class="date form-control" name="birthday" type="text"
                                               value="{{old('birthday')?old('birthday'):$user->birthday}}">
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
                                    <label class="col-md-2 control-label" for="textarea">Gender</label>
                                    <div class="col-md-10">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="inlineRadio1"
                                                   value="male" checked
                                            @if(old('gender'))
                                                {{old('gender') == 'male'?'checked':''}}
                                                    @elseif($user->gender == 'male')
                                                {{'checked'}}
                                                    @endif
                                            > Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="inlineRadio2" value="female"
                                            @if(old('gender'))
                                                {{old('gender') == 'female'?'checked':''}}
                                                    @elseif($user->gender == 'female')
                                                {{'checked'}}
                                                    @endif
                                            > Female
                                        </label>
                                        @if($errors->has('gender'))
                                            <span style="color:red;">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-11 col-md-push-1">
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
    </div>
@endsection
@section('script')

@endsection