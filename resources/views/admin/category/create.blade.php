@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- OVERVIEW -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title"> THÊM MỚI THỂ LOẠI</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thông tin chung
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{Form::open(['method' => 'POST','url' => 'admin/category','role' => 'form']) }}
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title" id="txtTitle">
                                        <p class="help-block">Hãy nhập tên thẻ loại sách tại đây!!</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div style="float: right">
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>
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
        <!-- END OVERVIEW -->
    </div>
@endsection
