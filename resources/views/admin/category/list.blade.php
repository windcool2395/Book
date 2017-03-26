@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> DANH MỤC THỂ LOẠI</h3>
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
                                   'url' => ['admin/category']
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
                            <a href="{{url('admin/category/create')}}" class="btn btn-default" style="float: right;"> Thêm mới...</a>
                        </div>
                    </div>
                    <!--Bảng Category -->
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                 Thông tin thể loại sách
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($list)
                                                    @foreach($list as $key=> $item)
                                                        <tr>
                                                            <td>{{$key + 1}}</td>
                                                            <td>{{$item->title}}</td>
                                                            <td>
                                                                {{Form::open([
                                                                       'method' => 'DELETE',
                                                                       'url' => ['admin/category', $item->id]
                                                                ]) }}
                                                                <a href="{{url('admin/category/'.$item->id.'/edit')}}" class="btn btn-success blue"> Edit</a>
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
