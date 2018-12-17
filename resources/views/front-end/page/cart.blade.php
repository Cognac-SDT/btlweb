@extends('front-end.layout.master')
@section('content')
    <div class="container">
        <div id="content">
            <div id="location">
                <a href="{!! url('/') !!}"><i class="bg icon_home"></i></a>
                <span>&raquo;</span><a href="{!! url('cart') !!}">Giỏ hàng của bạn</a>
            </div>

            <p style="font-size:15px; margin:20px 0; text-align:center;">Bạn chưa chọn sản phẩm nào vào giỏ hàng <a
                        href="{!! url('/') !!}" class="btn_cyan btn_cart" style="display:inline-block;">Tiếp tục mua hàng</a></p>

        </div><!--content-->
        <div class="clear"></div>
    </div><!--container-->

@endsection