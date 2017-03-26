@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> THÊM MỚI SÁCH"</h3>
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
                                    {{Form::open(['method' => 'POST','url' => 'admin/product','role' => 'form', 'files'=>'true']) }}
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Têm sách</label>
                                                <input type="text" class="form-control" name="name" required="required"/>
                                                <label>Mô tả</label>
                                                <input type="text" class="form-control" name="description" required="required" />
                                                <label>Tác giả</label>
                                                <select name="author" class="form-control" required="required">
                                                    @if($aut)
                                                        <option  value=""></option>
                                                        @foreach($aut as $item)
                                                            <option  value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Thể loại</label>
                                                <select name="category" class="form-control" required="required">
                                                    @if($cate)
                                                        <option  value=""></option>
                                                        @foreach($cate as $item)
                                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Đơn giá</label>
                                                <input type="text" class="form-control" name="price" required="required" value="0"/>
                                                <label>Giảm giá</label>
                                                <input type="text" class="form-control" name="discount" required="required" value="0"/>
                                                <label>Ngày xuất bản</label>
                                                <input type="datetime" class="form-control" name="publishing_date" required="required"/>
                                                <label>Nhà xuất bản</label>
                                                <select name="publishing_company" class="form-control" required="required">
                                                    @if($pub)
                                                        <option></option>
                                                        @foreach($pub as $item)
                                                            <option  value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Số trang</label>
                                                <input type="text" class="form-control" name="number_of_pages" required="required"/>
                                                <label>Kích thước</label>
                                                <input type="text" class="form-control" name="size" required="required"/>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Ảnh</label>
                                                <div id="UpImg">
                                                    <input  type="file" class="form-control" name="image" id="image">
                                                </div>
                                                <div style="padding-top: 10px; padding-bottom: 10px;" id="Anh" >
                                                    <img src="http://localhost/DATN/public/img/defaultbook.jpg" id="imgAnh"  alt="Ảnh" width="250px" height="320px"/>
                                                </div>
                                                <p class="help-block">Double click vào hình ảnh để thay đổi ảnh tác giả tại đây!!</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Nội dung</label>
                                                <textarea cols="100" rows="8" type="text" class="form-control" name="contentt" required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="float: right; padding-top: 10px;">
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                            <a href="{{url('admin/product')}}" class="btn btn-default"> Cancel</a>
                                        </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
