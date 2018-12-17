@extends('front-end.layout.master')
@section('content')
    <div class="container">
        <div id="location">
            <a href="/"><i class="bg icon_home"></i></a>
            <span>&raquo;</span><a href="{!! url($name) !!}">{!! $name !!}</a><span>&raquo;</span><a
                    href="#">{!! $name!!}</a>
        </div>
        <div id="pro_detail_page">
            <div id="product_detail">
                <div id="wrap_scroll" style="width:350px; float:left;">
                    <div id="img_detail" class="p-itemTNRA040" data-id="30968">
                        <div id="img_large" class="container-icon" style="position:relative;">
                            <a class="MagicZoom" id="Zoomer" rel="selectors-effect-speed: 600"
                               href="{!! url('uploads/products/ '.$record->images) !!}"
                               title="Click để xem ảnh lớn">
                                <img src="{!! url('uploads/products/ '.$record->images) !!}"
                                     title="Click để xem ảnh lớn"
                                     alt="{!! $record->name !!}"/>
                            </a>
                        </div>
                        <ul id="img_thumb" class="ul">
                            @foreach($record->product_img as $value)
                                <li>
                                    <a class="img_thumb" href="{{url('uploads/products/details/'.$value->images_url)}}"
                                       title="{{$record->name}}" rel="zoom-id:Zoomer;"
                                       rev="{!! url('uploads/products/details/'.$value->imgeas_url) !!}"
                                       style="outline: 0px; display: inline-block;">
                                        <img src="{{url('uploads/products/details/'.$value->images_url)}}"
                                             alt="{{$record->name}}">
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                        <div class="name_show">{!! $record->name !!}</div>
                        <div class="space"></div>
                        <!-- <div class="button_buy" style="display:none;">
                           <a href="javascript:addToShoppingCart('pro','30968','1','1999000')" class="btn_red">Mua ngay</a>
                           <a href="javascript:addToShoppingCartStop('pro','30968','1','1999000')" class=" btn_cyan">Cho vào giỏ</a>
                           </div>
                           -->
                        <div class="clear"></div>
                    </div>
                    <!--img_detail-->
                </div>
                <!--wrap_scroll-->
                <div id="overview">
                    <h1>{!! $record->name !!}</h1>
                    <p class="float_l red">Mã SP: {!! $record->code !!}</p>
                    <p class="float_r"><i class="bg icon_fav"></i><a href="javascript:user_like_content(30968, 'pro');">Lưu
                            sản phẩm yêu thích</a>
                    </p>
                    <div class="hori_line"></div>
                    <div class="table_div">
                        <div class="cell">
                            <table>
                                <tr>
                                    <td>
                                        <b>Đánh giá:</b> <img src="{!! url('template/default/images/star_5.png') !!}"
                                                              alt="rate"/>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Kho hàng: </b>
                                        <span>{!! $record->status_pro == 1 ? 'Còn hàng':'Hết hàng' !!}: </span><br/>
                                        <span style="margin-left: 62px; color: red; font-size: 15px">
                           *391 Giảng Võ-Đống Đa-Hà Nội
                           </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Bảo hành:</b> {!! $record->service !!} Tháng <br/></td>
                                </tr>
                                <tr>
                                    <td><b>Giao hàng:</b> <br/>
                                        <span style="margin-left: 62px; font-size: 15px">
                           - Miễn phí giao hàng (Trong bán kính 20 km) cho đơn hàng từ 500.000 đ trở lên <a
                                                    href="/huong-dan-khach-hang/chinh-sach-van-chuyen-hang/a1423.html"
                                                    style="color: red" target="_blank">(Chi tiết)</a>
                           </span><br/>
                                        <span style="margin-left: 62px; font-size: 15px">
                           - Miễn phí giao hàng 300 km đối với khách hàng Games Net, Doanh Nghiệp, Dự Án
                           </span><br/>
                                        <span style="margin-left: 62px; font-size: 15px">
                           - Nhận giao hàng và lắp đặt từ 8h00 - 20h30 các ngày kể cả ngày lễ, thứ 7, CN
                           </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--cell-->
                        <div class="space2"></div>
                        <div class="line"></div>
                        <div id="price_detail" style="border:none;">
                            <div class="price_detail_left">
                                <div class="img_price_full"
                                     style="float:left;">{!!number_format( $record->promotion_price) !!}</div>
                                <br>
                                <div class="clear"></div>
                                <p>Giá chính hãng: <span class="line_through">{!! number_format($record->unit_price) !!}
                                        đ</span>
                                    <span class="percent_off">-<?php $record->getSale();?>%</span>
                                </p>
                                <p class="red">Tiết
                                    kiệm: {!! number_format($record->unit_price - $record->promotion_price) !!} đ</p>
                            </div>
                            <!--<img width="150px" src="/media/lib/vnpayqr.jpg"/ >-->
                            <div class="price_detail_left_vat">
                                <div style="">[Giá đã bao gồm VAT]</div>
                            </div>
                            <div>
                                <br><br><br><br><br>
                                <p><img src="#"/>- Giảm thêm 1% khi
                                    mua hàng Online<a style="color:red" target="blank"
                                                      href="#">
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!--price_detail-->
                    </div>
                    <!--table_div-->
                    <div class="clear"></div>
                    <div id="button_buy">
                        <a href="{!!url('gio-hang/addcart/'.$record->id)!!}" class="btn btn-success pull-right add">Thêm
                            vào giỏ </a>
                        <span>Đặt mua ngay</span> Giao hàng tận nơi nhanh chóng
                        </a>
                        <a href="{!!url('gio-hang/addcart/'.$record->id)!!}" class="btn btn-success pull-right add">Thêm
                            vào giỏ </a>

                        <span>Cho vào giỏ</span> Cho vào giỏ để chọn tiếp
                        </a>
                    </div>
                    <div class="space"></div>
                    <!-- AddThis Button BEGIN -->
                    <b>Hãy chia sẻ sản phẩm {!! $record->name !!}: </b><br>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox" style="text-align: left;"></div>
                    <script>
                        $(document).ready(function () {
                            $("#title_tab_scroll_pro a").click(function () {
                                $("#title_tab_scroll_pro a").removeClass("current");
                                $(this).addClass("current");

                                //$(".content_scroll_tab").hide();
                                //$($(this).attr("href")).show();

                                $('body,html').animate({scrollTop: $($(this).attr("href")).offset().top - 90}, 800);
                                return false;
                            });
                            var get_top = 0;
                            if (get_top == 0) get_top = $("#title_tab_scroll_pro").offset().top;

                            $(window).scroll(function () {
                                if ($(window).scrollTop() > get_top - 80) $("#title_tab_scroll_pro").addClass("fixed");
                                else $("#title_tab_scroll_pro").removeClass("fixed");
                            });

                            $(".btn_image_link").click(function () {
                                $('body,html').animate({scrollTop: $("#tab2").offset().top - 40}, 800);
                                return false;
                            });
                            $(".btn_video_link").click(function () {
                                $('body,html').animate({scrollTop: $("#tab6").offset().top - 40}, 800);
                                return false;
                            });
                            $("#go_comment").click(function () {
                                $('body,html').animate({scrollTop: $("#tab5").offset().top - 40}, 800);
                                return false;
                            });
                        });
                    </script>
                </div>
                <!--overview-->
                <div class="clear"></div>
            </div>
            <!--product_detail-->
            <div id="title_tab_scroll_pro" style="margin-top:0px;">
                <a href="#tab2" class="current">Đặc điểm nổi bật</a>
                <a href="#tab1">Thông số kỹ thuật</a>
                <a href="#tab3">Hình ảnh</a>
                <a href="#tab5">Video</a>
                <a href="#tab6">Đánh giá</a>
                <a href="#tab7">Tư vấn & bán hàng qua Facebook</a>
                <a href="#tab8">Sản phẩm liên quan</a>
            </div>
            <!--title_tab_scroll_pro-->
            <div class="clear"></div>
            <div id="tab2" class="content_scroll_tab">
                <h2 class="cufon title_box_scroll">Đặc điểm nổi bật</h2>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <p class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                           href="#collapseTwo">
                            {!!$record->r_intro!!}
                        </p>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse">
                        <div class="accordion-inner">
                            {!!$record->review!!}
                        </div>
                    </div>
                    <button class="SeeMore btn-primary" data-toggle="collapse" href="#collapseTwo"><b class="caret"></b>
                        Xem chi tiết
                    </button>
                </div>
                <div class="clear"></div>
                <div id="tab1" class="content_scroll_tab" style="display:block;">
                    <h2 class="cufon title_box_scroll">Thông số kỹ thuật</h2>
                    <table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th colspan="2">CẤU HÌNH CHI TIẾT SẢN PHẨM: <strong>{!!$slug!!}</strong></th>
                        </tr>
                        </thead>
                        @if(!empty($record->pro_details) )
                            <tbody>
                            <tr>
                                <td>Bo mạch (Mainboard)</td>
                                <td>{!!$record->pro_details->screen!!}</td>
                            </tr>
                            <tr>
                                <td>Vi xử lý (CPU)</td>
                                <td>{!!$record->pro_details->cpu!!}</td>
                            </tr>
                            <tr>
                                <td>Card đồ họa (VGA)</td>
                                <td>{!!$record->pro_details->vga!!}</td>
                            </tr>
                            <tr>
                                <td>RAM</td>
                                <td>{!!$record->pro_details->ram!!}</td>
                            </tr>
                            <tr>
                                <td>Lưu trữ</td>
                                <td>{!!$record->pro_details->storage!!}</td>
                            </tr>
                            <tr>
                                <td>FAN - Tản nhiệt</td>

                            </tr>
                            <tr>
                                <td>Nguồn (PSU)</td>

                            </tr>
                            <tr>
                                <td>Thùng máy (CASE)</td>

                            </tr>
                            <tr>
                                <td>Phụ kiện kèm theo</td>

                            </tr>
                            <tr>
                                <td>Cổng giao tiếp</td>

                            </tr>
                            </tbody>
                        @else
                            <tbody>Cấu Hình Đang Cập Nhật</tbody>
                        @endif
                    </table>
                    <div class="clear"></div>
                </div>
                <!--content_scroll_tab-->
            </div>
            <!--content_scroll_tab-->
            <div id="tab3" class="content_scroll_tab">
                <h2 class="cufon title_box_scroll">Hình ảnh</h2>
                <script type="text/javascript" language="javascript"
                        src="{!! url('template/default/script/mobiSlider.js') !!}"></script>
                <script>
                    $(function () {

                        $('.slider').mobilyslider({
                            content: '.sliderContent',
                            children: 'div',
                            transition: 'horizontal',
                            animationSpeed: 200,
                            autoplay: false,
                            autoplaySpeed: 5000,
                            pauseOnHover: false,
                            bullets: true,
                            arrows: true,
                            arrowsHide: true,
                            prev: 'prev',
                            next: 'next',
                            animationStart: function () {
                            },
                            animationComplete: function () {
                            }
                        });

                    });
                </script>
                <div class="slider" align='center'>
                    <div class="sliderContent">
                        @foreach($record->product_img as $value)
                            <div class="item">
                                <img src="{!! url('uploads/products/details/'.$value->images_url) !!}"
                                     alt="{!! $record->name !!}"
                                     title="Click để xem ảnh lớn"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!--content_scroll_tab-->
            <div id="tab5" class="content_scroll_tab">
                <h2 class="cufon title_box_scroll">Video</h2>
                <p>Đang cập nhật...</p>
                <div class="clear"></div>
            </div>
            <div id="tab7" class="content_scroll_tab">
                <h2 class="cufon title_box_scroll">Tư vấn bán hàng qua Facebook</h2>
                <div class="fb-comments"
                     data-href="https://www.hanoicomputer.vn/tai-nghe-razer-kraken-mobile-neon-red-rz04-01400300-r3m1/p30968.html"
                     data-width="100%" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <div id="tab6" class="content_scroll_tab" style="overflow:visible;">
                <h2 class="cufon title_box_scroll">Đánh giá</h2>
                <div id="comment">

                    <!--comment-form-->

                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php $list_product = \App\Model\Products::where('cat_id', $record->cat_id)->paginate(4);?>
        <div id="tab8" class="content_scroll_tab" style="overflow:visible;">
            <h2 class="cufon title_box_scroll">Sản phẩm liên quan</h2>
            <div class="product_list page_inside" id="similar-product-list">
                <ul class="ul">
                    @foreach($list_product as $value)
                        <li class="p-{{$value->code}}" data-id="{{$value->id}}">
                            <div class="bg iconSaleOff"></div>
                            <!--<div class="icon-km"><span>KM</span></div>-->
                            <div class="p_container container-icon">
                                <div class="p_sku">Mã SP: {{$value->code}}</div>
                                <a href="{!! url($value->category->slug.$value->id).'-'.$value->slug !!}" class="p_img"><img
                                            class="lazy" src="{!!url('uploads/products/'.$value->images)!!}"
                                            data-src="{!!url('uploads/products/'.$value->images)!!}"
                                            alt="{{$value->name}}"/></a>
                                @if($value->promotion_price ==0)
                                    <div class="p_price img_price">{{number_format($value->promotion_price)}}</div>
                                    <div class="container_old_price">
                                        <div class="p_old_price">{{number_format($value->unit_price)}} VND</div>
                                        <div class="price_off">-<?php \App\Helper::getSale($value)?></div>
                                    </div>
                                @else
                                    <div class="p_price img_price">{{number_format($value->promotion_price)}}</div>
                                @endif
                                <div class="clear"></div>
                                <a href="{!! url('san-pham-moi/'.$value->id).'-'.$value->slug !!}"
                                   class="p_name">{{$value->name}}</a>
                                <div class="p_quantity">
                                    <i class="bg icon_in_stock"></i>
                                </div>
                                <a href="javascript:addToShoppingCartStop('pro','{{$value->id}}',1,'<?php empty($value->promotion_price) ? $value->unit_price : $value->promotion_price ?>')"
                                   class="btn-cart-stop">Giỏ hàng</a>
                            </div>
                            <!--wrap_pro-->
                            <div class="hover_content_pro tooltip">
                                <a href="{!! url('san-pham-moi/'.$value->id).'-'.$value->slug !!}"
                                   class="hover_name">{{$value->name}} </a>
                                <a href="" class="hover_brand"><img
                                            src="{!! url('uploads/products/'.$value->images) !!}" alt=""/></a>
                                <div class="hori_line"></div>
                                <table>
                                    <tr>
                                        <td><b>Giá bán:</b></td>
                                        <td>
                                            <span class="img_price_full">{{number_format($value->unit_price)}}</span>
                                            <span class="hover_vat">
                           [Chưa bao gồm VAT]
                           </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Bảo hành:</b></td>
                                        <td>{{$value->security}} Tháng</td>
                                    </tr>
                                </table>
                                <div class="hori_line"></div>
                                <div class="hover_offer">
                                    <b>Mô tả tóm tắt:</b><br/>
                                    {{$value->description}}
                                </div>
                                <div class="hori_line"></div>
                                <div class="hover_offer">
                                    <b>Khuyến mại:</b><br/>
                                </div>
                            </div>
                            <!--hover_content_pro-->
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--prouduct_list-->
            <div class="clear"></div>
        </div>
        <!--content_scroll_tab-->
    </div>
    <!--pro_detail_page-->
    </div>
    </div>

@endsection