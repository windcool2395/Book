<?php

namespace App\Http\Controllers\Admin;

use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use  Session;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = "";
        if($request->get('keyword')){
            $keyword = $request->get('keyword');
            $list =  Order::select('orders.id', 'orders.receiver_email', 'orders.total_amount', 'orders.status', 'orders.created_at', 'users.firstname as firstname', 'users.lastname  as lastname')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('firstname', 'like', '%'.$keyword.'%')
                ->orWhere('lastname','like', '%'.$keyword.'%')
                ->orWhere('orders.receiver_email','like', '%'.$keyword.'%')
                ->orWhere('orders.created_at','like', '%'.$keyword.'%')
                ->paginate(10);
        }
        else
        {
            $list = Order::select('orders.id', 'orders.receiver_email', 'orders.total_amount', 'orders.status', 'orders.created_at', 'users.firstname as firstname', 'users.lastname  as lastname')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->paginate(10);
        }
        return view('admin.order.list', compact('list','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::select('orders.*','users.firstname as firstname','users.lastname  as lastname')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.id',$id)->first();
        $order_detail = OrderDetail::where('order_id',$id)->get();
        return view('admin.order.show', compact('order','order_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::select('orders.*','users.firstname as firstname','users.lastname  as lastname')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.id',$id)->first();
        $order_detail = OrderDetail::where('order_id',$id)->get();
        return view('admin.order.edit', compact('order','order_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->receiver_date != null && isset($id)) {
            $row = Order::where('id', $id)->first();
            $row->receiver_date = $request->receiver_date;
            $row->status = $request->status;
            $row->save();
            Session::flash('success', 'Cập nhập thông tin hóa đơn thành công !!!');
        }
        return redirect('admin/order/'.$id.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
