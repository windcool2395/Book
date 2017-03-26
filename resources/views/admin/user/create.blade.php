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
                                    {{Form::open(['method' => 'POST','url' => 'admin/user','role' => 'form', 'files'=>'true']) }}
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email"  id="txtEmail" required="required"/>
                                                <p id="error-email"></p>
                                                <label>Họ</label>
                                                <input type="text" class="form-control" name="firstname" required="required" />
                                                <label>Tên</label>
                                                <input type="text" class="form-control" name="lastname" required="required"/>
                                                <label>Mật khẩu</label>
                                                <input type="password" class="form-control" name="password" id="txtPassword"/>
                                                <label>Nhập lại mật khẩu</label>
                                                <input type="password" class="form-control" name="password2" id="txtPassword2"/>
                                                <p id="error-pass"></p>
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" />
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" id="txtPhone" name="phone_number"/>
                                                <p id="error-phone"></p>
                                                <label>Giới tính</label>
                                                <select name="gender" class="form-control" required="required">
                                                    <option></option>
                                                    <option  value="0">Nam</option>
                                                    <option  value="1">Nữ</option>
                                                </select>
                                                <label>Ngày sinh</label>
                                                    {{Form::date('bod',\Carbon\Carbon::parse('1/1/1980'),array('class' => 'form-control'))}}
                                                <label>Phân quyền</label>
                                                <select name="group" class="form-control" required="required">
                                                    @if($group)
                                                        <option></option>
                                                        @foreach($group as $item)
                                                            <option  value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Trạng thái</label>
                                                <select name="is_deleted" class="form-control" required="required">
                                                    <option></option>
                                                    <option  value="0">Hoạt động</option>
                                                    <option  value="1">Vô hiệu hóa</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Ảnh</label>
                                                <div id="UpImg">
                                                    <input  type="file" class="form-control" name="image" id="image" required="required">
                                                </div>
                                                <div style="padding-top: 10px; padding-bottom: 10px;" id="Anh" >
                                                    <img src="http://localhost/DATN/public/img/userlogo.png" id="imgAnh"  alt="Ảnh" width="250px" height="320px"/>
                                                </div>
                                                <p class="help-block">Double click vào hình ảnh để thay đổi ảnh người dùng tại đây!!</p>
                                            </div>
                                        </div>

                                </div>
                                <div class="col-md-3" style="float: right; padding-top: 10px;">
                                    <button type="submit" class="btn btn-primary" id="btnLuu">Lưu</button>
                                    <a href="{{url('admin/user')}}" class="btn btn-default"> Cancel</a>
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
