@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- OVERVIEW -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> DANH MỤC TÁC GIẢ</h3>
            </div>
            <div class="panel-body">
                <div class="row">
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
                                   'url' => ['admin/author']
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
                            <a href="{{url('admin/author/create')}}" class="btn btn-default" style="float: right;"> Thêm mới...</a>
                        </div>
                    </div>
                    <!--Bảng -->
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Thông tin tác giả
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th> Tên tác giả</th>
                                                    <th> Thông tin tác giả </th>
                                                    <th> Hình ảnh</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($list)
                                                    @foreach($list as $key=> $item)
                                                        <tr>
                                                            <td>{{$key + 1}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td width="400px">{{$item->description}}</td>
                                                            <td><img src="http://localhost/DATN/public/uploads/author/{{$item->image}}" alt="" width="80px" height="120px"/></td>
                                                            <td>
                                                                {{Form::open([
                                                                       'method' => 'DELETE',
                                                                       'url' => ['admin/author', $item->id]
                                                                ]) }}
                                                                <a href="{{url('admin/author/'.$item->id.'/edit')}}" class="btn btn-success blue"> Edit</a>
                                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ???');" class="btn btn-success red">Delete</button>

                                                                {{Form::close()}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7" style="float: right" >
                                        <ul class="pagination">
                                            <li class="active">{{$list->links()}}</li>
                                        </ul>
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
