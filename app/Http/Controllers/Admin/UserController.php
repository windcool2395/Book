<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use Session;
class UserController extends Controller
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
            $list = User::select('users.*','groups.name as group')
                ->join('groups', 'groups.id', '=', 'users.group_id')
                ->where('users.firstname', 'like', '%'.$keyword.'%')
                ->orWhere('users.lastname','like', '%'.$keyword.'%')
                ->orWhere('users.email','like', '%'.$keyword.'%')
                ->paginate(10);
        }
        else{
            $list = User::select('users.*','groups.name as group')
                ->join('groups', 'groups.id', '=', 'users.group_id')
                ->paginate(10);
        }
        return view('admin.user.list', compact('list','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = Group::all();
        return view('admin.user.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $row = new User();
            $row->email = $request->email;
            $row->password = bcrypt($request->password);
            $row->firstname = $request->firstname;
            $row->lastname = $request->lastname;
            $row->address = $request->address;
            $row->phone_number = $request->phone_number;
            $row->gender = $request->gender;
            $row->bod = $request->bod;
            $row->group_id = $request->group;
            $row->is_deleted = $request->is_deleted;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/user/');
            $file->move($path,$filename);
            $row->avatar =  $filename;
            $row->save();
            Session::flash('success','Thêm mới người dùng thành công !!!');
        }
        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::select('users.*','groups.name as group')
            ->join('groups', 'groups.id', '=', 'users.group_id')
            ->where('users.id',$id)
            ->first();
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::all();
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('group','user'));
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
        if($request->hasFile('image') && isset($id) && $request != null){
            $row = User::where('id', $id)->first();
            $row->email = $request->email;
            $row->password = bcrypt($request->password);
            $row->firstname = $request->firstname;
            $row->lastname = $request->lastname;
            $row->address = $request->address;
            $row->phone_number = $request->phone_number;
            $row->gender = $request->gender;
            $row->bod = $request->bod;
            $row->group_id = $request->group;
            $row->is_deleted = $request->is_deleted;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/user/');
            $file->move($path,$filename);
            $row->avatar =  $filename;
            $row->save();
            Session::flash('success','Thêm mới người dùng thành công !!!');
        }
        else if( isset($id) && $request != null){

            $row = User::where('id', $id)->first();
            $row->email = $request->email;
            $row->password = bcrypt($request->password);
            $row->firstname = $request->firstname;
            $row->lastname = $request->lastname;
            $row->address = $request->address;
            $row->phone_number = $request->phone_number;
            $row->gender = $request->gender;
            $row->bod = $request->bod;
            $row->group_id = $request->group;
            $row->is_deleted = $request->is_deleted;
            $row->save();
            Session::flash('success','Cập nhập thông tin sách thành công !!!');
        }
        return redirect('admin/user/'.$id.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = User::findOrFail($id);
        if($row){
            $row->is_deleted = 1;
            $row->save();
            Session::flash('success','Đã vô hiệu hóa người dùng "'. $row->email. '" thành công !');
        }
        return redirect('admin/user');
    }
}
