@extends('admin.layouts.template')

@section('title')
    {{$area_info['name'] . ' - ' . config('global.site')}}
@endsection
@section('main_template')
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i
                            class="glyphicon glyphicon-list"></i> {{ucwords('thông tin tin tức : ')}} <span style="color: #0a7db0">{{$area_info['name']}}</span> <a
                            href="#"
                            style="color: blue"></a>
                    @if($area_info['status'] == 0)
                        <strong class="text-success">(public)</strong>
                    @else
                        <strong class="text-danger">(bản nháp)</strong>
                        @endif </td>
                </div>
            </div>
            <div class="col-md-12">
                @if(Session::has('msg'))
                    {!! Session::get('msg') !!}
                @endif
            </div>
            <div class="panel-body">
                <div id="main">
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-12 col-lg-12">
                                <table class="table table-user-information ">
                                    <tbody>
                                    <tr>
                                        <th width="15%">tên trường :</th>
                                        <td width="85%">{{$area_info['name']}}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">trạng thái:</th>
                                        <td width="85%">
                                            @if($area_info['status'] == 0)
                                                <strong class="text-success">public</strong>
                                            @else
                                                <strong class="text-danger">bản nháp</strong>
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">tóm tắt :</th>
                                        <td width="85%">{{$area_info['about']}}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">nội dung:</th>
                                        <td width="85%" style="max-width: 850px">
                                            <div style="border: 1px solid #ffffff; height: 500px; overflow:auto;max-width:900px">
                                                {!! $area_info['body']!!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>hình ảnh:</th>
                                        @if(!is_null($area_info['image']))
                                            <td><img src="{{url('asset/image/icon/area_info/'.$area_info['image'])}}"
                                                     width="200" height="100"></td>
                                        @else
                                            <th>unavailable</th>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>thay đổi thông tin:</th>
                                        <td>
                                            <?php
                                            echo \Carbon\Carbon::createFromTimeStamp(strtotime($area_info['updated_at']))->diffForHumans();
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ngày tạo:</th>
                                        <td>{{$area_info['created_at']}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{route('area_info_list')}}" class="btn btn-sm btn-primary"><i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                        @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                            <span class="pull-right">
                                        <a type="button" class="btn btn-sm btn-warning"
                                           href="{{route('area_info_edit',['id' => $area_info['id']])}}"><i
                                                    class="glyphicon glyphicon-edit"></i> edit</a>
                                        <a onclick="return confirm('are you sure delete it ?')" type="button"
                                           class="btn btn-sm btn-danger"
                                           href="{{route('area_info_delete',['id' => $area_info['id']])}}"><i
                                                    class="glyphicon glyphicon-remove"></i>delete</a>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection