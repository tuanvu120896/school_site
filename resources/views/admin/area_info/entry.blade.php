@extends('admin.layouts.template')
@section('title')
    thêm mới bài viết - {{config('global.site')}}
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('area_info_entry')}}" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <fieldset>
                            <legend><i class="glyphicon glyphicon-plus"></i> {{ucwords('thêm mới bài viết')}}</legend>
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
                                        <option value="1"
                                                selected
                                                @if(old('status') && old('status') == 1) selected @endif
                                        > bản nháp</option>
                                        <option value="0"
                                                @if(old('status') && old('status') == 1) selected @endif
                                        > public</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="text-field">tên bài viết <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{old('name')}}" name="name"
                                           placeholder="tên bài viết"
                                           type="text">
                                    @if($errors->has('name'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">tóm tắt <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <textarea name="about" placeholder="đoạn trích dẫn"  class="form-control">{{old('about')}}</textarea>
                                    @if($errors->has('about'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">nội dung <strong style="color:
                                red">*</strong></label>
                                <div class="col-md-10">
                                    <textarea name="body" id="txt-body" class="form-control">{{old('body')}}</textarea>
                                    @if($errors->has('body'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">hình ảnh bài viết</label>
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
                                        Tạo Mới
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
    <script src="{{url('asset/admin/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#txt-body',
            height: 500,
            theme: 'modern',
            plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | print preview | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link media image',
            toolbar2: ' bold italic forecolor backcolor emoticons | fontsizeselect fontselect |',
            image_advtab: true,
            setup: function (ed) {
                ed.on('init', function () {
                    this.getDoc().body.style.fontSize = '19px';
                    this.getDoc().body.style.fontFamily = 'times new roman,times';
                });
            },
            fontsize_formats: '8px 10px 12px 14px 16px 18px 24px 26px 32px 48px 56px 65px 75px 100px',
            font_formats: 'Arial=arial,helvetica,sans-serif; Myriad Pro= Myriad Pro;League Gothic=League Gothic;' +
            ' Cabin=Cabin;Corbel=Corbel;Museo Slab=Museo Slab;Bebas Neue=Bebas Neue;Ubuntu=Ubuntu;Lobster=Lobster;' +
            'Franchise=Franchise; PT Serif = PT Serif;  Helvetica= Helvetica;Adobe Caslon = Adobe Caslon;Andale Mono=andale mono,times;' + 'Arial=arial,helvetica,sans-serif;' + 'Arial Black=arial black,avant garde;' + 'Book Antiqua=book antiqua,palatino;' + 'Comic Sans MS=comic sans ms,sans-serif;' + 'Courier New=courier new,courier;' + 'Georgia=georgia,palatino;' + 'Helvetica=helvetica;' + 'Impact=impact,chicago;' + 'Symbol=symbol;' + 'Tahoma=tahoma,arial,helvetica,sans-serif;' + 'Terminal=terminal,monaco;' + 'Times New Roman=times new roman,times;' + 'Trebuchet MS=trebuchet ms,geneva;' + 'Verdana=verdana,geneva;' + 'Webdings=webdings;' + 'Wingdings=wingdings,zapf dingbats',
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
                var cmsURL = '{{url('/')}}' + '/laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type+Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Trình upload ảnh - video',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_privious: "no"
                });
            }
        });
    </script>
@endsection