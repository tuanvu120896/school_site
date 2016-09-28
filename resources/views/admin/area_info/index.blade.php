@extends('admin.layouts.template')
@section('title')
    danh sách tin tức về các khu vực - {{config('global.site')}}
@endsection
@section('style')
    <script src="{{url('asset/admin/js/jquery.min.js')}}"></script>
    <link href="{{url('asset/admin/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet" media="screen">
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title"
                         style="margin-left: -20px; color: #0a7db0"><i class="glyphicon glyphicon-list"></i> {{ucwords('danh sách tin tức về các khu vực')}}</div>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                        {!! Session::get('msg') !!}
                    @endif
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive table-hover" id="area-info-list">
                        <thead class="text-center">
                        <tr>
                            <th class="text-center">.no</th>
                            <th class="text-center">tên tin</th>
                            <th class="text-center">hình ảnh</th>
                            <th class="text-center">trạng thái</th>
                            <th class="text-center">ngày tạo tin</th>
                            <th class="no-sort text-center">hành động</th>
                        </tr>
                        </thead>
                        @foreach($area_info as $key => $item)
                            <tr class="text-center">
                                <td style="vertical-align: middle">
                                    {{$key + 1}}.
                                    @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                        <a href="{{url(route('area_info_details',['id' => $item->id]))}}"><i
                                                    class="glyphicon glyphicon-eye-open text-info"
                                                    title="viewer account" style="color: blue"></i> view</a>
                                    @endif
                                </td>
                                <td style="vertical-align: middle">{{$item->name}}</td>
                                <td style="vertical-align: middle"><img width="150" height="100"
                                                                        src="{{url('asset/image/icon/area_info/'.$item->image)}}">
                                </td>
                                <td style="vertical-align: middle">
                                    @if($item->status == 0)
                                        <strong class="text-success">public</strong>
                                    @else
                                        <strong class="text-danger">bản nháp</strong>
                                    @endif
                                </td>
                                <td style="vertical-align: middle">
                                    <?php
                                    echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at ? $item->created_at : ''))->diffForHumans();
                                    ?>
                                </td>
                                @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                    <td class="" style="vertical-align: middle">
                                        <a href="{{route('area_info_edit',['id' => $item->id])}}" style="color: green"><i
                                                    class="glyphicon glyphicon-edit"></i> edit</a>
                                        -
                                        <a onclick="return confirm('are you sure delete it ?')" style="color: red"
                                           href="{{route('area_info_delete',['id' => $item->id])}}"><i
                                                    class="glyphicon glyphicon-remove"></i> delete</a>
                                    </td>
                                @else
                                    <td style="vertical-align: middle">
                                        <a href="{{url(route('area_info_detail',['id' => $item->id]))}}"><i
                                                    class="glyphicon glyphicon-eye-open text-info"
                                                    title="viewer account" style="color: blue"></i> view</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('asset/admin/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('asset/admin/datatable/js/dataTables.bootstrap.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#area-info-list').DataTable({
                responsive: true,
                pageLength: 10,
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
                }]
            });
        });
    </script>
@endsection
