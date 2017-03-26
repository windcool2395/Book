@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> DANH MỤC NGƯỜI DÙNG</h3>
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
                               'url' => ['admin/user']
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
                        <a href="{{url('admin/user/create')}}" class="btn btn-default" style="float: right;"> Thêm mới...</a>
                    </div>
                </div>
                <!--Bảng -->
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Danh sách người dùng
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th> Tên</th>
                                                <th> Email </th>
                                                <th> Giới tính</th>
                                                <th> Hình ảnh</th>
                                                <th> Trạng thái</th>
                                                <th> Phân quyền</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($list)
                                                @foreach($list as $key=> $item)
                                                    <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td>{{$item->firstname}} {{$item->lastname}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>
                                                            {{ $item->gender ==0 ? 'Nam': 'Nữ'}}
                                                        </td>
                                                        <td><img src="http://localhost/DATN/public/uploads/user/{{$item->avatar}}" alt="" width="60px" height="80px"/></td>
                                                        <td>
                                                            {{ $item->is_deleted ==0 ? 'Hoạt động': 'Vô hiệu hóa'}}
                                                        </td>
                                                        <td>
                                                            {{ $item->group}}
                                                        </td>

                                                        <td>
                                                            {{Form::open([
                                                                   'method' => 'DELETE',
                                                                   'url' => ['admin/user', $item->id]
                                                            ]) }}
                                                            <a href="{{url('admin/user/'.$item->id.'')}}" class="btn btn-success blue"> Chi tiết</a>
                                                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn vô hiệu hóa người dùng ???');" class="btn btn-success red">Vô hiệu hóa</button>

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
@endsection
