@extends('back-end.layouts.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Danh mục Bài Viết</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!!url('admin/danhmuc-tin-tuc/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm mới danh mục bài viết mới</button></a>

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
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $record)
                                <tr>
                                  <td>{{$record->id}}</td>
                                    <td>{!! $record->title !!}</td>
                                    <td>
                                        <a href="{!!url('admin/danhmuc-tin-tuc/edit/'.$record->id)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">edit</span> </a>
                                        <a href="{!!url('admin/danhmuc-tin-tuc/del/'.$record->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
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