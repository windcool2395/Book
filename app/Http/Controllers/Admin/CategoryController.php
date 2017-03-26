<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class CategoryController extends Controller
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

            $list = Category::where([
                ['title', 'like', '%'.$keyword.'%'],
                ['is_deleted', '=', '0']
            ])->paginate(10);
        }
        else{
            $list = Category::where('is_deleted','=','0')->paginate(10);
        }
        return view('admin.category.list', compact('list','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->title){
            $list = new Category();
            $list->title = $request->title;
            $list->save();
            Session::flash('success','Thêm mới thể loại sách thành công !!!');
        }
        return redirect('admin/category');
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
        $cate = Category::findOrFail($id);
        return view('admin.category.edit', compact('cate'));
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
        if($request->title != null && isset($id)){
            $row = Category::where('id',$id)->first();
            $row->title = $request->title;
            $row->save();
            Session::flash('success','Cập nhập thông tin thể loại sách thành công !!!');
        }
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Category::findOrFail($id);
        $row->is_deleted = '1';
        $row->save();
        Session::flash('success', 'Đã xóa thể loại "'.$row->title .'" thành công !' );
        return redirect('admin/category');
    }
}
