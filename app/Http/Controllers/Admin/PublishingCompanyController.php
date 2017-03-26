<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PublishingCompany;
use Session;
class PublishingCompanyController extends Controller
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

            $list = PublishingCompany::where([
                ['name', 'like', '%'.$keyword.'%'],
                ['is_deleted', '=', '0']
            ])->paginate(5);
        }
        else{
            $list = PublishingCompany::where('is_deleted','=','0')->paginate(5);
        }
        return view('admin.publishingcompany.list', compact('list','keyword'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publishingcompany.create');
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
            $list = new PublishingCompany();
            $list->name = $request->name;
            $list->description = $request->description;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/publishingcompany/');
            $file->move($path,$filename);
            $list->image = $filename;
            $list->save();
            Session::flash('success','Thêm mới nhà xuất bản thành công !!!');
        }
        return redirect('admin/publishingcompany');
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
        $pub = PublishingCompany::findOrFail($id);
        return view('admin.publishingcompany.edit', compact('pub'));
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
            $list = PublishingCompany::where('id',$id)->first();
            $list->name = $request->name;
            $list->description = $request->description;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/publishingcompany/');
            $file->move($path,$filename);
            $list->image = $filename;
            $list->save();
            Session::flash('success','Cập nhập thông tin nhà xuất bản thành công !!!');
        }
        else{
            $list = PublishingCompany::where('id',$id)->first();
            $list->name = $request->name;
            $list->description = $request->description;
            $list->save();
            Session::flash('success','Cập nhập thông tin nhà xuất bản thành công !!!');
        }
        return redirect('admin/publishingcompany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = PublishingCompany::findOrFail($id);
        $row->is_deleted = '1';
        $row->save();
        Session::flash('success', 'Đã xóa nhà xuất bản "'.$row->name .'" thành công !' );
        return redirect('admin/publishingcompany');
    }
}
