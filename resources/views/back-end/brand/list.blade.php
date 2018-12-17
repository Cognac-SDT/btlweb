@extends('back-end.layouts.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Banner</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh Sách Hãng Sản Xuất
                        <a href="{!!url('admin/brand/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm Hãng Mới</button></a>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (Session()->has('flash_level'))
                        <div class="alert alert-success">
                            <ul>
                                {!! Session::get('flash_massage') !!}
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body" style="font-size: 13px;">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Icon</th>
                                    <th>Tên Hãng Sản Xuất</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td> <img src="{!!url('uploads/manufacturer/'.$value->icon)!!}" alt="" width="40" height="40"> </td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->status_option[$value->status]}}</td>
                                        <td style="width: 120px;">
                                            <a href="{!!url('admin/brand/edit/'.$value->id)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">edit</span> </a>
                                            <a href="{!!url('admin/brand/del/'.$value->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection