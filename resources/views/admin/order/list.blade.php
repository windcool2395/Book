@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> DANH SÁCH HÓA ĐƠN MUA HÀNG</h3>
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
                    <!-- Tìm kiếm -->
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::open([
                                   'method' => 'GET',
                                   'url' => ['admin/order']
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
                    </div>
                    <!--Bảng Category -->
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Thông tin hóa đơn
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>HD</th>
                                                    <th>Người mua</th>
                                                    {{--<th>Người nhận</th>--}}
                                                    {{--<th>SĐT</th>--}}
                                                    {{--<th>Địa chỉ</th>--}}
                                                    <th>Email</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Trạng thái</th>
                                                    <th>Ngày đặt hàng</th>
                                                    {{--<th>Ngày nhận</th>--}}
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($list)
                                                    @foreach($list as $key=> $item)
                                                        <tr>
                                                            <td>{{$item->id}}</td>
                                                            <td>{{ $item->firstname .' '. $item->lastname  }}</td>
                                                            {{--<td>{{$item->receiver_name}}</td>--}}
                                                            {{--<td>{{$item->receiver_phone_number}}</td>--}}
                                                            {{--<td>{{$item->receiver_address}}</td>--}}
                                                            <td>{{$item->receiver_email}}</td>
                                                            <td>{{$item->total_amount}} VND</td>
                                                            <td>
                                                                {{ $item->status ==0 ? 'Đã nhận đơn hàng': $item->status ==1 ? 'Đang xử lý hàng':'Đã hoàn thành đơn hàng'}}
                                                            </td>
                                                            <td>{{ date ('d-m-Y', strtotime($item->created_at))}}</td>
                                                            {{--<td>{{$item->receiver_date}}</td>--}}
                                                            <td>
                                                                <a href="{{url('admin/order/'.$item->id.'')}}" class="btn btn-success blue"> Chi tiết</a>
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
