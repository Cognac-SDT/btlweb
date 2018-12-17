<?php $cat_news = \App\Model\News::where('status',2)->get();?>
<div class="container">
    <div class="banner_scroll scroll_left"><a href="/ad.php?id=1312" target='_blank' rel='nofollow'><img border=0 src="{!! url('media/banner/12_Jul642c983ae7e7c36b0b3b0e8596c1418c.jpg') !!}" width='70' height='412' alt="" /></a></div>
    <div class="banner_scroll scroll_right"><a href="/ad.php?id=1125" target='_blank' rel='nofollow'><img border=0 src="{!! url('media/banner/banner_c21002f4.jpg') !!}" width='70' height='412' alt="" /></a></div>
    <ul class="ul">

        <li id="support_top">
            <span><img class="icon-top" src="template/default/images/new_icon_banhang.png" />Bán hàng trực tuyến</span>
            <div id="h_menu_sub_on1" class="h_menu_sub hOnline">
            </div>
            <!--h_menu_sub-->
        </li>
        <li>
                  <span>
                  <a href="/khuyen-mai-HERA GAMING.html">
                  <img class="icon-top" src="template/default/images/new_icon_km.png" />Khuyến mại
                  </a>
                  </span>
        </li>
        <li id="list_hot_news_top">
            <a href="/tin-tuc"><img class="icon-top" src="{!! url('template/default/images/new_icon_tintuc.png') !!}" />Tin nổi bật</a>
            <i class="bg icon_drop"></i>
            <ul class="ul">
               @foreach($cat_news as $value)
                <li>
                    <a href="{!! url('tin-tuc/'.$value->id.'/'.$value->slug) !!}">
                        <img src="{!! url('uploads/news/'.$value->images) !!}" />
                        <span>{!!$value->title !!}</span>
                    </a>
                </li>
               @endforeach

            </ul>
        </li>

        <li>
            <div id="account-header">
                <!--<h4 onclick="location.href='/taikhoan'">Tài khoản</h4>-->
                <a href="/dang-ky" rel="nofollow">Đăng ký</a> | <a href="/dang-nhap" rel="nofollow">Đăng nhập</a>
                <div class="list">
                    <a href="/dang-ky" class="btn">Đăng ký</a>
                    <a href="/dang-nhap" class="btn">Đăng nhập</a>
                    <a href="javascript:open_oauth('Google')">
                        <img src="template/default/images/log-in-with-google.jpg?v=2.1" alt="Đăng nhập bằng Google">
                    </a>
                    <a href="javascript:open_oauth('Facebook')">
                        <img src="template/default/images/log-in-with-facebook.jpg?v=2.1" alt="Đăng nhập bằng Facebook">
                    </a>
                </div>

            </div>

        </li>

    </ul>
</div>