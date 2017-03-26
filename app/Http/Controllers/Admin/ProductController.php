<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\PublishingCompany;
use App\Author;
use  Session;

class ProductController extends Controller
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
            $products = Product::select('products.id','products.name','products.price','products.thumbnail','authors.name as author')
                ->join('authors', 'authors.id', '=', 'products.author_id')
                ->where([
                    ['products.name', 'like', '%'.$keyword.'%'],
                    ['products.is_deleted', '=', '0']])
                ->paginate(12);
        }
        else{
            $products = Product::select('products.id','products.name','products.price','products.thumbnail','authors.name as author')
                ->join('authors', 'authors.id', '=', 'products.author_id')
                ->where(
                'products.is_deleted', '=', '0')
                ->paginate(12);
        }
        return view('admin.product.list', compact('products','keyword'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aut = Author::all();
        $pub = PublishingCompany::all();
        $cate = Category::all();
        return view('admin.product.create', compact('cate','aut','pub'));
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
            $row = new Product();
            $row->name = $request->name;
            $row->price = $request->price;
            $row->category_id = $request->category;
            $row->discount = $request->discount;
            $row->description = $request->description;
            $row->content = $request->contentt;
            $row->author_id = $request->author;
            $row->publishing_date = $request->publishing_date;
            $row->publishing_company_id = $request->publishing_company;
            $row->number_of_pages = $request->number_of_pages;
            $row->size = $request->size;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/publishingcompany/');
            $file->move($path,$filename);
            $row->thumbnail =  $filename;
            $row->save();
            Session::flash('success','Thêm mới sách thành công !!!');
        }
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = Product::where('products.id','=',$id)->select('products.id','products.name','products.price','products.thumbnail',
            'products.discount','products.description','products.content','products.publishing_date','products.number_of_pages','products.size',
            'categories.title as category','publishing_companies.name as publishing_company','authors.name as author')
            ->join('authors', 'authors.id', '=', 'products.author_id')
            ->join('publishing_companies', 'publishing_companies.id', '=', 'products.publishing_company_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->first();
        return view('admin.product.show', compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::all();
        $aut = Author::all();
        $pub = PublishingCompany::all();
        $pro = Product::findOrFail($id);
        return view('admin.product.edit', compact('pro','cate','aut','pub'));
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
            $row = Product::where('id', $id)->first();
            $row->name = $request->name;
            $row->price = $request->price;
            $row->category_id = $request->category;
            $row->discount = $request->discount;
            $row->description = $request->description;
            $row->content = $request->contentt;
            $row->author_id = $request->author;
            $row->publishing_date = $request->publishing_date;
            $row->publishing_company_id = $request->publishing_company;
            $row->number_of_pages = $request->number_of_pages;
            $row->size = $request->size;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('uploads/publishingcompany/');
            $file->move($path,$filename);
            $row->thumbnail = $filename;
            $row->save();
            Session::flash('success','Cập nhập thông tin sách thành công !!!');
        }
        else if( isset($id) && $request != null){

            $row = Product::where('id', $id)->first();
            $row->name = $request->name;
            $row->price = $request->price;
            $row->category_id = $request->category;
            $row->discount = $request->discount;
            $row->description = $request->description;
            $row->content = $request->contentt;
            $row->author_id = $request->author;
            $row->publishing_date = $request->publishing_date;
            $row->publishing_company_id = $request->publishing_company;
            $row->number_of_pages = $request->number_of_pages;
            $row->size = $request->size;
            $row->save();
            Session::flash('success','Cập nhập thông tin sách thành công !!!');
        }
        return redirect('admin/product/'.$id.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Product::findOrFail($id);
        if($row){
            $row->is_deleted = 1;
            $row->save();
            Session::flash('success','Đã xóa "'. $row->name. '" thành công !');
        }
        return redirect('admin/product');
    }
}
