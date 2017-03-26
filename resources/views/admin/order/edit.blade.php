@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">CẬP NHẬP HÓA ĐƠN MUA HÀNG</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <!-- Thông báo -->
                    @if(Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <i class="fa fa-folder-open"></i><b>{{Session::get('success')}}</b>
                            </div>
                        </div>
                    @endif
                    <a href="{{url('admin/order')}}" class="btn btn-default">Quay lại</a>
                    <div class="row">
                        <!--Bảng Orders -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Thông tin chung
                            </div>
                            <div class="panel-body">
                                {{Form::open([
                                    'method' => 'PATCH',
                                    'url' => ['admin/order',  $order->id],
                                    'role' => 'form']) }}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                @if(isset($order))
                                                    <tr>
                                                        <td>Order ID</td>
                                                        <td>{{$order->id }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Người mua</td>
                                                        <td>{{ $order->firstname .' '. $order->lastname  }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Họ tên người nhận</td>
                                                        <td>{{ $order->receiver_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số điện thoại</td>
                                                        <td>{{ $order->receiver_phone_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Địa chỉ</td>
                                                        <td>{{ $order->receiver_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $order->receiver_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tổng tiền</td>
                                                        <td>{{number_format($order->total_amount)}} VND</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ngày đặt hàng</td>
                                                        <td>{{ date ('d/m/Y', strtotime($order->created_at))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ngày nhận</td>
                                                        <td>
                                                            {{Form::date('receiver_date',\Carbon\Carbon::parse($order->receiver_date),array('class' => 'form-control'))}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trạng thái đơn hàng</td>
                                                        <td>
                                                            <select name="status" class="form-control">)
                                                                <option {{ $order->status == 0 ? 'selected="selected"':''}} value="0">Đã nhận đơn hàng</option>
                                                                <option {{ $order->status == 1 ? 'selected="selected"':''}} value="1">Đang xử lý hàng</option>
                                                                <option {{ $order->status == 2 ? 'selected="selected"':''}} value="2">Đã hoàn thành đơn hàng</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                        <!--Bảng Order_Details-->
                                        <p>Thông tin chi tiết hóa đơn :</p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã hóa đơn</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Giảm giá</th>
                                                    <th>Thuế</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if( isset($order_detail))
                                                    @foreach($order_detail as $key=> $item)
                                                        <tr>
                                                            <td>{{$key + 1}}</td>
                                                            <td>{{$item->order_id}}</td>
                                                            <td>{{$item->product_id}}</td>
                                                            <td>{{$item->price}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>{{$item->discount}}%</td>
                                                            <td>{{$item->tax}}</td>
                                                            <td>{{number_format($item->amount)}} VND</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td style="text-align: right;" colspan="7">Tổng tiền :</td>
                                                    <td>
                                                        <i style="color: red">{{number_format($order->total_amount)}} VND</i>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div  class="row" style="text-align: right;" >
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <a href="{{url('admin/order/'.$order->id.'')}}" class="btn btn-default"> Cancel</a>
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

