@extends('admin.layouts.template')
@section('title')
    list user - admin school site
@endsection
@section('style')
    <link href="{{url('asset/admin/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet" media="screen">
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('msg'))
                {!! Session::get('msg') !!}
            @endif
        </div>
        <div class="col-lg-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">List Users</div>
                </div>
                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-responsive table-striped table-bordered"
                           id="user-list">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Active</th>
                            <th>Time</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>
                                    <a href="{{route('user_details',['id' => $user->id])}}">{{$user->name}} </a>
                                    @if($user->type_account == 3)
                                        <i class="glyphicon glyphicon-lock text-danger" title="limit account" style="color: red"></i>
                                    @elseif($user->type_account == 2)
                                        <i class="glyphicon glyphicon-eye-open text-info"  title="viewer account" style="color: blue"></i>
                                    @else
                                        <i class="glyphicon glyphicon-pencil text-success" title="writer account"  style="color: green"></i>
                                    @endif
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    {{$user->type_account == 2 ? "writer":"viewer"}}
                                </td>
                                <td>
                                    @if($user->active == 1)
                                        <span style="color:green">active</span>
                                    @else
                                        <span style="color:red">inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <?php
                                    echo \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans();
                                    ?>
                                </td>
                                <td>
                                    <a href="{{route('user_edit',['id' => $user->id])}}" style="color: green"><i
                                                class="glyphicon glyphicon-edit"></i> edit</a>
                                    -
                                    <a onclick="return confirm('are you sure delete it ?')" style="color: red"
                                       href="{{route('user_delete',['id' => $user->id])}}"><i
                                                class="glyphicon glyphicon-remove"></i> delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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
            $('#user-list').DataTable({
                responsive: true,
                pageLength: 10,
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
                }],
                "order": [[ 4, "desc" ]]
            });
        });
    </script>
@endsection