@extends('admin.layouts.template')
@section('title')
    details user - admin school site
@endsection
@section('style')
    <style>
        .user-row {
            margin-bottom: 14px;
        }

        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > th {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }

        .table-user-information > tbody > tr > td {
            border-top: 0;
        }

        .table-user-information > tbody > tr > th {
            border-top: 0;
        }

        .toppad {
            margin-top: 20px;
        }

    </style>
@endsection
@section('main_template')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('msg'))
                {!! Session::get('msg') !!}
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading" style="padding: 5px 15px 20px 15px">
                    <p class="panel-title"><i class="glyphicon glyphicon-user"></i> {{$user->name}}</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2 col-xs-3 col-lg-2 col-ms-2" align="center"><img alt="User Pic"
                              src="@if(!$user->image)
                                    {{url('asset/image/default/'.config('global.default_avatar'))}}
                              @else
                                    {{url('asset/image/avatar/'.$user->image)}}
                              @endif" class="img-circle img-responsive"></div>
                        <div class=" col-md-9 col-lg-9">
                            <table class="table table-user-information ">
                                <tbody>
                                <tr>
                                    <th width="15%">Level:</th>
                                    <td width="85%">
                                        @if($user->type_account == 1)
                                            writer
                                        @elseif($user->type_account == 2)
                                            viewer
                                        @elseif($user->type_account == 3)
                                            limit
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        @if($user->active == 1)
                                            <span style="color:green">active</span>
                                        @else
                                            <span style="color:red" class="">inactive</span>
                                            <p  class="text-danger">Account is inactive, go to email : <a>{{$user->email}}</a> to active now.</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth:</th>
                                    <td>{{$user->birthday}}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td>{{$user->gender}}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number:</th>
                                    <td>{{$user->phone}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{route('user_list')}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    <span class="pull-right">
                        <a type="button" class="btn btn-sm btn-warning" href="{{route('user_edit',['id' => $user->id])}}"><i class="glyphicon glyphicon-edit"></i> edit</a>
                        <a onclick="return confirm('are you sure delete it ?')" type="button" class="btn btn-sm btn-danger" href="{{route('user_delete',['id' => $user->id])}}"><i class="glyphicon glyphicon-remove"></i>delete</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection