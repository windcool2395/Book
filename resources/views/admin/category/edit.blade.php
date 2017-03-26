@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> CẬP NHẬP THÔNG TIN THỂ LOẠI </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin thể loại sách {{ $cate->title }}
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {{Form::open([
                                      'method' => 'PATCH',
                                      'url' => ['admin/category', $cate->id],
                                      'role' => 'form']) }}
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" id="txtTitle" value="{{ $cate->title }}">
                                        <p class="help-block">Hãy nhập tên thể loại sách tại đây!!</p>
                                    </div>
                            </div>
                            <div class="col-lg-12">
                                <div style="float: right">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <a href="{{url('admin/category')}}" class="btn btn-default"> Cancel</a>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection