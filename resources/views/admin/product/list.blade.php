@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> DANH MỤC SÁCH</h3>
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
                <!-- Tìm kiếm || Thêm mới-->
                <div class="row">
                    <div class="col-md-6">
                        {{Form::open([
                               'method' => 'GET',
                               'url' => ['admin/product']
                        ]) }}
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" value="{{$keyword}}" name="keyword" placeholder="Search...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        {{Form::close()}}
                    </div>
                    <!--end -->
                    <div class="col-md-6">
                        <a href="{{url('admin/product/create')}}" class="btn btn-default" style="float: right;"> Thêm mới...</a>
                    </div>
                </div>
                <!--Bảng -->
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin sách
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div id="cart">
                                    @if($products)
                                        @foreach($products as $key=> $item)
                                            <div class="item-pro">
                                                <img class="item-img" src="http://localhost/DATN/public/uploads/product/{{$item->thumbnail}}" alt="" />
                                                <p class="item-title">{{$item->name}}</p>
                                                <p class="item-price">{{$item->price}} VND</p>
                                                <p class="item-desc">{{$item->author}} </p>
                                                <a  href="{{url('admin/product/'.$item->id.'')}}" class="item-button"></i> Thông tin chi tiết</a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7" style="float: right" >
                                    <ul class="pagination">
                                        <li class="active">{{$products->links()}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
