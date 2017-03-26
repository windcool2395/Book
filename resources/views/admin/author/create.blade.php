@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- OVERVIEW -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> THÊM MỚI TÁC GIẢ</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin tác giả
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{Form::open(['method' => 'POST','url' => 'admin/author','role' => 'form', 'files'=>'true']) }}
                                        <div class="col-md-6">
                                            <label>Tên</label>
                                            <input class="form-control" type="text" name="name" id="txtTitle" required="required">
                                            <p class="help-block">Hãy nhập tên tác giả sách tại đây!!</p>
                                            <label>Thông tin tách giả</label>
                                            <textarea  type="text" class="form-control" name="description" id="txtMoTa" required="required" cols="22" rows="8"></textarea>
                                            <p class="help-block">Hãy nhập thông tin tác giả tại đây!!</p>
                                        </div>
                                        <div class="col-md-6" style="float: right;">
                                            <label>Ảnh</label>
                                            <div id="UpImg">
                                                <input  type="file" class="form-control" name="image" id="image" required="required">
                                            </div>
                                            <div style="padding-left: 100px; padding-top: 10px; padding-bottom: 10px;" id="Anh" >
                                                <img src="http://localhost/DATN/public/img/userlogo.png" id="imgAnh"  alt="Ảnh tác giả" width="200px" height="240px"/>
                                            </div>
                                            <p class="help-block">Double click vào hình ảnh để thay đổi ảnh tác giả tại đây!!</p>
                                        </div>
                                </div>
                                <div class="col-lg-12">
                                    <div  style="float: right">
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                                        <a href="{{url('admin/author')}}" class="btn btn-default">Cancel</a>
                                        {{Form::close()}}
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
