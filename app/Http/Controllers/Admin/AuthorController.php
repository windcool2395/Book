<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author;
use Session;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = '';
        if($request->get('keyword'))
        {
            $keyword= $request->get('keyword');

            $list = Author::where([
                ['name', 'like', '%'.$keyword.'%'],
                ['is_deleted', '=', '0']
            ])->paginate(5);
        }
        else{
            $list = Author::where('is_deleted','=','0')->paginate(10);
        }
        return view('admin.author.list', compact('list','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            $list = new Author();
            $list->name = $request->name;
            $list->description = $request->description;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/author/');
            $file->move($path,$filename);
            $list->image = $filename;
            $list->save();
            Session::flash('success','Thêm mới tác giả thành công !!!');
        }
        return redirect('admin/author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aut = Author::findOrFail($id);
        return view('admin.author.edit', compact('aut'));
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
        if($request->hasFile('image') && isset($id)){
            $list = Author::where('id',$id)->first();
            $list->name = $request->name;
            $list->description = $request->description;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/author/');
            $file->move($path,$filename);
            $list->image = $filename;
            $list->save();
            Session::flash('success','Cập nhập thông tin tác giả thành công !!!');
        }
        else{
            $list = Author::where('id',$id)->first();
            $list->name = $request->name;
            $list->description = $request->description;
            $list->save();
            Session::flash('success','Cập nhập thông tin tác giả thành công !!!');
        }
        return redirect('admin/author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Author::findOrFail($id);
        $row->is_deleted = '1';
        $row->save();
        Session::flash('success', 'Đã xóa tác giả "'.$row->name .'" thành công !' );
        return redirect('admin/author');
    }
}
