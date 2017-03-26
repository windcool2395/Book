@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> THÔNG TIN SỬA ĐỔI "{{ strtoupper($pro->name) }}"</h3>
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
                                        'url' => ['admin/product', $pro->id],
                                        'role' => 'form','files' =>'true'])
                                         }}
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Têm sách</label>
                                                <input type="text" class="form-control" name="name" required="required"  value="{{ $pro->name }}"/>
                                                <label>Mô tả</label>
                                                <input type="text" class="form-control" name="description" required="required" value="{{ $pro->description }}"/>
                                                <label>Tác giả</label>
                                                <select name="author" class="form-control">
                                                    @if($aut)
                                                        @foreach($aut as $item)
                                                            <option {{ $pro->author_id == $item->id ? 'selected="selected"':''}} value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Thể loại</label>
                                                <select name="category" class="form-control">
                                                    @if($cate)
                                                        @foreach($cate as $item)
                                                            <option {{$pro->category_id == $item->id ? 'selected="selected"':''}} value="{{$item->id}}">{{$item->title}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Đơn giá</label>
                                                <input type="text" class="form-control" name="price" required="required" value="{{ $pro->price }}"/>
                                                <label>Giảm giá</label>
                                                <input type="text" class="form-control" name="discount" required="required" value="{{ $pro->discount }}"/>
                                                <label>Ngày xuất bản</label>
                                                <input type="datetime" class="form-control" name="publishing_date" required="required" value="{{ $pro->publishing_date }}"/>
                                                <label>Nhà xuất bản</label>
                                                <select name="publishing_company" class="form-control">
                                                    @if($pub)
                                                        @foreach($pub as $item)
                                                            <option {{ $pro->publishing_company_id == $item->id ? 'selected="selected"':''}} value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Số trang</label>
                                                <input type="text" class="form-control" name="number_of_pages" required="required" value="{{ $pro->number_of_pages }}"/>
                                                <label>Kích thước</label>
                                                <input type="text" class="form-control" name="size" required="required" value="{{ $pro->size }}"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ảnh</label>
                                                <div id="UpImg" style="display: none">
                                                    <input  type="file" class="form-control" name="image" id="image">
                                                </div>
                                                <div style="padding-top: 10px; padding-bottom: 10px;" id="Anh" >
                                                    <img src="http://localhost/DATN/public/uploads/product/{{ $pro->thumbnail }}" id="imgAnh"  alt="Ảnh" width="250px" height="320px"/>
                                                </div>
                                                <p class="help-block">Double click vào hình ảnh để thay đổi ảnh tác giả tại đây!!</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Nội dung</label>
                                                <textarea cols="100" rows="8" type="text" class="form-control" name="contentt" required="required">{{ $pro->content }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="float: right; padding-top: 10px;">
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                            <a href="{{url('admin/product/'.$pro->id.'')}}" class="btn btn-default"> Cancel</a>
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
