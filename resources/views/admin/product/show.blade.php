@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> THÔNG TIN CHI TIẾT "{{ strtoupper($pro->name) }}"</h3>
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
                        <a href="{{url('admin/product')}}" class="btn btn-default" style="float: left;"> Quay lại...</a>
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
                                    <img src="http://localhost/DATN/public/uploads/product/{{ $pro->thumbnail }}" id="imgAnh"  alt="Ảnh sách" width="250px" height="320px"/>
                                </div>
                                <div class="col-md-8">
                                    <div style="float: left; padding-top: -10px;">
                                        <h3>{{ $pro->name }}</h3>
                                        <p>{{ $pro->description }}</p>
                                        <p>Tác giả : {{ $pro->author }}</p>
                                        <p>Nhà xuất bản : {{ $pro->publishing_company }} </p>
                                        <p >Đơn giá : <i style="color: blue;">{{ $pro->price }} VND</i></p>
                                        <p>Thể loại : {{$pro->category}}</p>
                                        <p >Giảm giá : <i style="color: red;"> {{ $pro->discount }}%</i></p>
                                        <p>Ngày xuất bản: {{ $pro->publishing_date }}</p>
                                        <p>Số trang : {{ $pro->number_of_pages }} trang</p>
                                        <p>Kích thước : {{ $pro->size }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p> Nội dung :</p>
                                    <p >
                                        {{ $pro->content }}
                                    </p>
                                </div>
                                <div class="col-md-12" >
                                    <div class="col-md-3" style="float: right;">
                                        {{Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['admin/product', $pro->id]
                                         ]) }}
                                        <a href="{{url('admin/product/'.$pro->id.'/edit')}}" class="btn btn-primary">Edit </a>
                                        <button  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ???');" class="btn btn-success red">Delete</button>
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
