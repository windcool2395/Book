@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> THÔNG TIN CHI TIẾT "{{$user->lastname}}"</h3>
            </div>
            <div class="panel-body">
                <!-- Thông báo -->
                <div class="row">
                    @if(Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <i class="fa fa-folder-open"></i><b>{{Session::get('success')}}</b>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{url('admin/user')}}" class="btn btn-default" style="float: left;"> Quay lại...</a>
                    </div>
                </div>
                <!--Bảng -->
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin chung
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="http://localhost/DATN/public/uploads/user/{{ $user->avatar }}" id="imgAnh"  alt="Ảnh đại diện" width="250px" height="320px"/>
                                </div>
                                <div class="col-md-8">
                                    <div style="float: left; padding-top: -10px;">
                                        <h3>{{$user->firstname}} {{$user->lastname}}</h3>
                                        <p> {{ $user->gender == '0' ? 'Nam': 'Nữ' }}</p>
                                        <p> Ngày sinh: {{ $user->bod ==null ? 'Đang cập nhập...': date ('d-m-Y', strtotime($user->bod)) }}</p>
                                        <p>Email : {{ $user->email }}</p>
                                        <p>Địa chỉ : {{ $user->address ==null ? 'Đang cập nhập...': $user->address }} </p>
                                        <p>Số điện thoại : {{ $user->phone_number ==null ? 'Đang cập nhập...': $user->phone_number}}</p>
                                        <p>Phân quyền : {{$user->group}}</p>
                                        <p>Trạng thái tài khoản: <i> {{ $user->is_deleted ==0 ? 'Hoạt động': 'Vô hiệu hóa'}}</i></p>
                                    </div>
                                </div>
                                <div class="col-md-12" >
                                    <div class="col-md-3" style="float: right;">
                                        <a href="{{url('admin/user/'.$user->id.'/edit')}}" class="btn btn-primary">Edit </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
