@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> THÊM MỚI NGƯỜI DÙNG</h3>
            </div>
            <div class="panel-body">
                <!--Bảng -->
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin chung
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{Form::open([
                                        'method' => 'PATCH',
                                        'url' => ['admin/user', $user->id],
                                        'role' => 'form',
                                        'files' =>'true']) }}
                                         <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" required="required" id="txtEmail" value="{{ $user->email }}"/>
                                                <p id="error-email"></p>
                                                <label>Họ</label>
                                                <input type="text" class="form-control" name="firstname" required="required" value="{{ $user->firstname }}" />
                                                <label>Tên</label>
                                                <input type="text" class="form-control" name="lastname" required="required"  value="{{ $user->lastname }}"/>
                                                <label>Mật khẩu</label>
                                                <input type="password" class="form-control" name="password"  id="txtPassword" value="{{ $user->password }}" required="required"/>
                                                <div style="display: none;" id="Pass">
                                                    <label>Nhập lại mật khẩu</label>
                                                    <input type="password" class="form-control" name="password2"  required="required" id="txtPassword2" value="{{ $user->password }}"/>
                                                    <p id="error-pass"></p>
                                                </div>
                                                <label>Địa chỉ :</label>
                                                <input type="text" class="form-control" name="address"  value="{{ $user->address }}"/>
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone_number" id="txtPhone"  value="{{ $user->phone_number }}"/>
                                                <p id="error-phone"></p>
                                                <label>Giới tính</label>
                                                <select name="gender" class="form-control" required="required">
                                                    <option></option>
                                                    <option {{ $user->gender == 0 ? 'selected="selected"':''}} value="0">Nam</option>
                                                    <option {{ $user->gender == 1 ? 'selected="selected"':''}} value="1">Nữ</option>
                                                </select>
                                                <label>Ngày sinh</label>
                                                {{Form::date('bod',\Carbon\Carbon::parse($user->name),array('class' => 'form-control'))}}
                                                <label>Phân quyền</label>
                                                <select name="group" class="form-control" required="required">
                                                        @if($group)
                                                            @foreach($group as $item)
                                                                <option {{ $user->group_id == $item->id ? 'selected="selected"':''}} value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        @endif
                                                </select>
                                                <label>Trạng thái</label>
                                                <select name="is_deleted" class="form-control" required="required">
                                                    <option></option>
                                                    <option {{ $user->is_deleted == 0 ? 'selected="selected"':''}} value="0">Hoạt động</option>
                                                    <option {{ $user->is_deleted == 1 ? 'selected="selected"':''}} value="1">Vô hiệu hóa</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Ảnh</label>
                                                <div id="UpImg">
                                                    <input  type="file" class="form-control" name="image" id="image">
                                                </div>
                                                <div style="padding-top: 10px; padding-bottom: 10px;" id="Anh" >
                                                    <img src="http://localhost/DATN/public/uploads/user/{{$user->avatar}}" id="imgAnh"  alt="Ảnh" width="250px" height="320px"/>
                                                </div>
                                                <p class="help-block">Double click vào hình ảnh để thay đổi ảnh người dùng tại đây!!</p>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-3" style="float: right; padding-top: 10px;">
                                    <button type="submit" class="btn btn-primary" id="btnLuu">Lưu</button>
                                    <a href="{{url('admin/user/'.$user->id.'')}}" class="btn btn-default"> Cancel</a>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
