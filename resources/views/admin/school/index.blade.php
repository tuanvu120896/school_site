@extends('admin.layouts.template')
@section('title')
    {{ucwords('danh sách các trường Đã Được tạo')}} - admin {{config('global.site')}}
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
                    <div class="panel-title" style="margin-left: -20px; color: #0a7db0">{{ucwords('danh sách các trường Đã Được tạo')}}</div>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                        {!! Session::get('msg') !!}
                    @endif
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive table-hover" id="school-list">
                        <thead class="text-center">
                        <tr>
                            <th class="text-center">.no</th>
                            <th class="text-center">tên trường</th>
                            <th class="text-center">tên tiếng nhật</th>
                            <th class="text-center">website</th>
                            <th class="text-center">khóa học</th>
                            <th class="text-center">thư điện tử</th>
                            <th class="text-center">trạng thái</th>
                            <th class="text-center">ngày sửa đổi</th>
                            <th class="no-sort text-center">hành động</th>
                        </tr>
                        </thead>
                        @foreach($schools as $key => $school)
                            <tr class="text-center">
                                <td style="vertical-align: middle">
                                    {{$key + 1}}.
                                    @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                        <a href="{{url(route('school_detail',['id' => $school->id]))}}"><i
                                                    class="glyphicon glyphicon-eye-open text-info"
                                                    title="viewer account" style="color: blue"></i> view</a>
                                    @endif
                                </td>
                                <td style="vertical-align: middle">{{$school->name_en}}</td>
                                <td style="vertical-align: middle">{{$school->name_jp}}</td>
                                <td style="vertical-align: middle"><a href="{{$school->url}}" target="_blank">{{$school->url}}</a></td>
                                <td style="vertical-align: middle">
                                    @if(count($school->courses) > 0)
                                        <a href="{{url(route('school_detail',['id' => $school->id]))}}">{{count($school->courses)}} khóa</a>
                                    @else
                                        <a href="{{url(route('school_detail',['id' => $school->id]))}}"><strong
                                                    class="text-danger">trống</strong></a>
                                    @endif

                                </td>
                                <td style="vertical-align: middle">{{$school->email}}</td>
                                <td style="vertical-align: middle">
                                    @if($school->status == 0)
                                        <strong class="text-success">public</strong>
                                    @else
                                        <strong class="text-danger">bản nháp</strong>
                                    @endif
                                </td>
                                <td style="vertical-align: middle">
                                    <?php
                                    echo \Carbon\Carbon::createFromTimeStamp(strtotime( $school->updated_at ? $school->updated_at : ''))->diffForHumans();
                                    ?>
                                </td>
                                @if(\Illuminate\Support\Facades\Auth::user()->type_account != 2)
                                    <td class="">
                                        <a href="{{route('school_edit',['id' => $school->id])}}" style="color: green"><i
                                                    class="glyphicon glyphicon-edit"></i> edit</a>
                                        -
                                        <a onclick="return confirm('are you sure delete it ?')" style="color: red"
                                           href="{{route('school_delete',['id' => $school->id])}}"><i
                                                    class="glyphicon glyphicon-remove"></i> delete</a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{url(route('school_detail',['id' => $school->id]))}}"><i
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
            $('#school-list').DataTable({
                responsive: true,
                pageLength: 10,
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
                }],
                "order": [[7, "desc"]]
            });
        });
    </script>
@endsection