@extends('back-end.layouts.master')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Banner</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><small>Thêm Mới Banner</small></h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
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
                                <div class="position-center">
                                    <form action="{{route('banner.store')}}" method="post" role="form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">File Ảnh</label>
                                            <input type="file" name="banner" class="form-control" id="images">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ghi Chú</label>
                                            <input type="text" name="data" class="form-control" id="data">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Trạng Thái</label>
                                            <select name="status" id="" class="form-control">
                                                <?php \App\Helper::optionSelect2($model->status_option,'su_dung'); ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </form>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
@endsection