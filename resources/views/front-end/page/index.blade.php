@extends('front-end.layout.master')
@section('js')
<script>
    var SHOPPING_CART_URL = '{!! url('gio-hang') !!}';
    var ProductAddon = {
        addCart : function(productId, selected_addon) {
            console.log("selected_addon =" + selected_addon);
            if(hura_read_cookie('shopping_cart_addon') == null){
                hura_create_cookie('shopping_cart_addon',',',30);
            }
            var current_cart = hura_read_cookie('shopping_cart_addon');
            if(current_cart.search(','+productId+':'+selected_addon+',') == -1){
                var new_cart = ','+productId+':'+selected_addon + current_cart;
                hura_create_cookie('shopping_cart_addon', new_cart, 30);
            }else{
                console.log("đã có trong giỏ hàng: " + current_cart);
            }
        },
        removeFromCart : function(productId, selected_addon) {
            var current_cart = hura_read_cookie('shopping_cart_addon');
            if(current_cart == null) return ;

            if(current_cart.search(','+productId+':'+selected_addon) !== -1){
                var new_cart = current_cart.replace(','+productId+':'+selected_addon, ",");
                hura_create_cookie('shopping_cart_addon', new_cart, 30);
                window.location = SHOPPING_CART_URL;
            }
        },
        //remove a product
        removeProduct : function(productId) {
            var current_cart = hura_read_cookie('shopping_cart_addon');
            if(current_cart == null) return ;
            var re = new RegExp(","+productId+":([0-9]+),","i");
            var new_cart = current_cart.replace(re, ",");
            hura_create_cookie('shopping_cart_addon',new_cart,30);
        },
        //search for addon selected
        checkSelect : function(productId) {
            var self = this;
            $(".product-addon-"+productId).each(function() {
                if($(this).prop('checked')) {
                    var selected_addon = parseInt(this.value);
                    if(selected_addon > 0) self.addCart(productId, selected_addon);
                }
            });
        }
    };
    function hura_read_cookie(name){
        var nameEQ=name+"=";
        var ca=document.cookie.split(';');
        for(var i=0;i<ca.length;i++){
            var c=ca[i];
            while(c.charAt(0)==' ')c=c.substring(1,c.length);
            if(c.indexOf(nameEQ)==0) return Base64.decode(c.substring(nameEQ.length,c.length));
        }
        return null;
    }
    function addToShoppingCartStop(item_type, sellid, quantity, unit_price, holder_id){
        addItemToCart(item_type,sellid,quantity,unit_price);
        var element =  document.getElementById(holder_id);
        if (typeof(element) != 'undefined' && element != null)
        {
            $("#"+holder_id).html("Đã thêm vào giỏ hàng");
        }
    }

    function deleteShoppingCartItem(item_type, sellid){
        if(confirm('Bạn muốn xóa bỏ sản phẩm này khỏi giỏ hàng ? ')){
            removeShoppingCartItem(item_type, sellid);
            window.location = SHOPPING_CART_URL;
        }
    }

    function removeShoppingCartItem(item_type,sellid){
        var current_cart = hura_read_cookie('shopping_cart_store');
        if(current_cart == null) return ;
        current_cart += ",";
        var re = new RegExp(","+item_type+"-"+sellid+"-(.*?)-(.*?),","i");
        var new_cart = current_cart.replace(re, ",");
        var new_cart = new_cart.substr(0, new_cart.length-1);
        hura_create_cookie('shopping_cart_store',new_cart,30);
        //remove all addons if any
        ProductAddon.removeProduct(sellid);
    }

</script>
@endsection
@section('content')
    <div class="container">
        <div id="content_top_right">
            <!--<div class="video"><iframe width="320" height="240" src="P9ZLGFqos-A" frameborder="0" allowfullscreen></iframe></div>-->
            <!--<div><a href="https://www.facebook.com/phuongmanh.hung1311" rel="nofollow">Fanpage</a> </div>-->
            <div>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FH%E1%BB%99i-Hoa-S%E1%BB%AFa-CLC-352847861398428%2F&tabs=timeline&width=250&height=180&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="250" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            </div>
            <div id="hot_news_home">
                <div class="title_box_right">
                    <h2 class="cufon h_title">Tin tức nổi bật</h2>
                </div>
                <div class="content_box">
                    <div class="bg_gradient_bottom_title"></div>

                    <div class="top_news">
                        @foreach($news as $value)
                        <a href="{!! url('tin-tuc/'.$value->id.'/'.$value->slug) !!}">
                            <img src="{!! url('uploads/news/'.$value->images) !!}" alt="{!! $value->title !!}" />
                        </a>
                        @endforeach
                    </div>

                    <ul>
                        @foreach($post_news as $value)
                        <li><a href="{!! url('tin-tuc/'.$value->id.'/'.$value->slug) !!}"> &raquo; {!! $value->title !!} ... ({!! $value->created_at !!})</a></li>
                         @endforeach
                    </ul>
                </div>
            </div>
            <div class="banner-right-slider">
                <img border=0 src="https://HERA GAMINGcdn.commedia/banner/banner_28267ab8.jpg" width='250' height='155' alt="" />
                <a href="/ad.php?id=713" target='_blank' rel='nofollow'><img border=0 src="https://HERA GAMINGcdn.commedia/banner/banner_07c5807d.gif" width='250' height='100' alt="" /></a>
            </div>
        </div>
        <div id="container_slider">
            <div id="slider">
                <div id="sync1" class="owl-carousel owl-theme">
                    @foreach($banner as $value)
                    <div class="item"><a href="#" target='_blank' rel='nofollow'><img border=0 src="{!! url('uploads/banner/'.$value->images) !!}" width='720' height='382' alt="MUA NHIỀU GIẢM LỚN" /></a></div>
                    @endforeach
                </div>
                <div id="sync2" class="owl-carousel">
                  @foreach($banner as $value)
                    <div class="item">
                        <span>{!! $value->data !!}</span>
                    </div>
                      @endforeach
                </div>
            </div>
            <div class="clear space"></div>
        </div>
        <!--container_slider-->
        <div class="clear space"></div>
        <div id="banner_cs_home">
        </div>
        <div class="clear"></div>
        <div id="box_pro_special_home">
            <div class="title_tab">
                <a href="#tab2" class="cufon1 a_tab current">Sản phẩm Giảm Giá</a>
                <a href="#tab3" class="cufon1 a_tab">Sản phẩm mới</a>
            </div>
            <!--title_tab-->
            <div class="clear"></div>
            <div class="content_tab">
                <div class="product_list">
                    <ul id="tab2" style="display:block;" class="ul cf">
                        <a href="{!! url('san-pham-giam-gia') !!}" class="viewall">Xem tất cả >></a>
                        @foreach($product_sale as $value)
                        <li class="p-".{{$value->code}} data-id="{!! $value->id !!}">
                            <div class="bg iconSaleOff"></div>
                            <!--<div class="icon-km"><span>KM</span></div>-->
                            <div class="p_container container-icon">
                                <div class="p_sku">Mã SP: {!! $value->code !!}</div>
                                <a href="{!! url('san-pham-giam-gia/'.$value->id."-".$value->slug) !!}" class="p_img"><img class="lazy" src="{!! url('uploads/products/'.$value->images) !!}" data-src="{{url('uploads/products/'.$value->images)}}" alt="{!! $value->name !!}" /></a>
                                @if($value->promotion_price == 0)
                                <div class="p_price img_price">{!! number_format($value->unit_price) !!}</div>
                                @else
                                    <div class="p_price img_price">{!! number_format($value->promotion_price)  !!}</div>

                                    <div class="container_old_price">
                                    <div class="p_old_price">{!! number_format($value->unit_price) !!} VND</div>
                                    <div class="price_off">-{!! $value->getSale() !!}%</div>
                                 @endif
                                </div>
                                <div class="clear"></div>
                                <a href="{!! url('san-pham-giam-gia/'.$value->id."-".$value->slug) !!}" class="p_name">{!! $value->name !!}</a>
                                <div class="p_quantity">
                                    <i class="bg icon_in_stock"></i>
                                </div>
                                <a href="{!! url('/cart/addItem').$value->id !!}" class="btn-cart-stop">Giỏ hàng</a>
                            </div>
                            <!--wrap_pro-->
                            <div class="hover_content_pro tooltip">
                                <a href="{!! url('san-pham-giam-gia/'.$value->id."-".$value->slug) !!}" class="hover_name">{!! $value->name !!}</a>
                                <a href="" class="hover_brand"><img src="{!! url('uploads/manufacturers/'.(!empty($value->manufacturer->icon)?$value->manufacturer->icon:null)) !!}" alt="" /></a>
                                <div class="hori_line"></div>
                                <table>
                                    <tr>
                                        <td><b>Giá bán:</b></td>
                                        <td>
                                            <span class="img_price_full">{!! ($value->promotion_price ==0)?$value->unit_price:$value->promotion_price !!}</span>
                                            <span class="hover_vat">
                                    [Chưa bao gồm VAT]
                                    </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Bảo hành:</b></td>
                                        <td>{!! $value->service !!} Tháng</td>
                                    </tr>
                                    <tr>
                                        <td><b>Kho hàng:</b></td>
                                        <td>Còn hàng tại 391 Giảng Võ - Đống Đa - Hà Nội </td>
                                    </tr>
                                </table>
                                <div class="hori_line"></div>
                                <div class="hover_offer">
                                    {!! $value->intro !!}
                                </div>
                                <div class="hori_line"></div>
                                <div class="hover_offer">
                                    <b>Khuyến mại:</b><br />
                                    {!! $value->pro_1 !!}
                                 </div>
                            </div>
                            <!--hover_content_pro-->
                        </li>
                            @endforeach
                    </ul>
                    <ul id="tab3" class="ul cf">
                        <a href="{!! url('san-pham-moi') !!}" class="viewall">Xem tất cả >></a>
                        @foreach($product_new as $value)
                        <li class="p-".{{$value->code}} data-id="{!! $value->id !!}">
                            <div class="bg iconSaleOff"></div>
                            <!--<div class="icon-km"><span>KM</span></div>-->
                            <div class="p_container container-icon">
                                <div class="p_sku">Mã SP: {!! $value->code !!}</div>
                                <a href="{!! url('san-pham-giam-gia/'.$value->id."-".$value->slug) !!}" class="p_img"><img class="lazy" src="{!! url('uploads/products/'.$value->images) !!}" data-src="{{url('uploads/products/'.$value->images)}}" alt="{!! $value->name !!}" /></a>
                                @if($value->promotion_price == 0)
                                    <div class="p_price img_price">{!! number_format($value->unit_price) !!}</div>
                                @else
                                    <div class="p_price img_price">{!! number_format($value->promotion_price)  !!}</div>

                                    <div class="container_old_price">
                                        <div class="p_old_price">{!! number_format($value->unit_price) !!} VND</div>
                                        <div class="price_off">-30%</div>
                                        @endif
                                    </div>
                                    <div class="clear"></div>
                                    <a href="{!! url('san-pham-giam-gia/'.$value->id."-".$value->slug) !!}" class="p_name">{!! $value->name !!}</a>
                                    <div class="p_quantity">
                                        <i class="bg icon_in_stock"></i>
                                    </div>
                                    <a href="{!!  url('/cart/addItem').$value->id !!}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                            </div>
                            <!--wrap_pro-->
                            <div class="hover_content_pro tooltip">
                                <a href="{!! url('san-pham-giam-gia/'.$value->id."-".$value->slug) !!}" class="hover_name">{!! $value->name !!}</a>
                                <a href="" class="hover_brand"><img src="media/brand/vantech.jpg" alt="" /></a>
                                <div class="hori_line"></div>
                                <table>
                                    <tr>
                                        <td><b>Giá bán:</b></td>
                                        <td>
                                            <span class="img_price_full">{!! ($value->promotion_price ==0)?$value->unit_price:$value->promotion_price !!}</span>
                                            <span class="hover_vat">
                                    [Chưa bao gồm VAT]
                                    </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Bảo hành:</b></td>
                                        <td>{!! $value->service !!} Tháng</td>
                                    </tr>
                                    <tr>
                                        <td><b>Kho hàng:</b></td>
                                        <td>Còn hàng tại 391 Giảng Võ - Đống Đa - Hà Nội </td>
                                    </tr>
                                </table>
                                <div class="hori_line"></div>
                                <div class="hover_offer">
                                    {!! $value->intro !!}
                                </div>
                                <div class="hori_line"></div>
                                <div class="hover_offer">
                                    <b>Khuyến mại:</b><br />
                                    {!! $value->pro_1 !!}
                                </div>
                            </div>
                            <!--hover_content_pro-->
                        </li>
                            @endforeach
                    </ul>
                </div>
                <!--prouduct_list-->
            </div>
            <!--content_tab-->
        </div>
        <!--box_pro_special_home-->

        <!--hot_news_home-->
        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->
        @foreach($list_cat as $item)
            <div class="clear"></div>
            <div class="title_box_center">
                <h2 class="cufon h_title">{{$item->name}}</h2>
                <div class="sub_cat_title">
                    @foreach($item->children as $value)
                        <a href="{!! url($value->slug) !!}">{{$value->name}}</a>
                    @endforeach
                </div>
                <a href="{!! url($item->slug) !!}" class="viewall">Xem tất cả</a>
            </div>
            <!--title_box_center-->
            <?php $list_product = \App\Model\Products::where('cat_id',$item->id)->get(); ?>
            <div class="bg_gradient_bottom_title"></div>
            <div class="banner_top_pro">
            </div>
            <div class="clear space"></div>
            <div class="product_list float_l" style="width:940px;">
                <ul class="ul">
                    {{--List san pham--}}
                    @foreach($list_product as $value)
                        <li class="p-{{$value->code}}" data-id="{{$value->id}}">
                            <div class="bg iconSaleOff"></div>
                            <!--<div class="icon-km"><span>KM</span></div>-->
                            <div class="p_container container-icon">
                                <div class="p_sku">Mã SP: {{$value->code}}</div>
                                <a href="{!! url('san-pham-moi/'.$value->id).'-'.$value->slug !!}" class="p_img"><img
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
                                <a href="javascript:addToShoppingCartStop('pro','{!! $value->id !!}',1,'{!! ($value->promotion_price ==0)?$value->unit_price:$value->promotion_price !!}')" class="btn-cart-stop">Giỏ hàng</a>
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
            <div class="banner_right_pro">
                <a href="https://www.HERA GAMING.vn/collection/dat-hang-truoc-ruoc-ve-ngay"><img class="lazy"
                                                                                                 data-src="media/banner/15_Jun0d5d99a53dd610dcc2db5d13f617af2e.jpg"
                                                                                                 alt=""/></a>
            </div>
            <div class="clear space"></div>
    @endforeach


    <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <!--Laptop-->
        <!--PC đồng bộ & PC Gaming-->
        <!--PC Workstation-->
        <!--linh kien-->
        <!--TBVP-->
        <!--Thiet bị sieu thi-->
        <!--Game net-->
        <!--gaming gear-->
        <!--Gaming Console-->
        <!--cooling, tan nhiet-->
        <!--TB Luu tru-->
        <!--TB nghe nhin-->
        <!--Thiet bi mang-->
        <!--Camera quan sat-->
        <!--Phụ kiện các loại-->

        <script type="text/javascript">
            $(window).load(function () {
                $('#brand_list ul').carouFredSel({
                    auto: {
                        play: true,
                        pauseOnHover: true
                    },
                    prev: '.prev',
                    next: '.next',
                    'direction': 'left',
                    mousewheel: true,
                    scroll: 1,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    }
                });
            });
        </script>
        <div id="brand_list">
            <a href="javascript:void(0)" class="bg btn_carousel1 prev"></a>
            <a href="javascript:void(0)" class="bg btn_carousel1 next"></a>
            <ul class="ul">
                @foreach($brand as $value)
                <li><a href=""><img class="lazy" data-src="{!! url('uploads/manufacturer/ '.$value->icon) !!}" alt="" /></a></li>
                @endforeach
            </ul>
        </div>
        <!--brand_list-->
    </div>
    <!--container-->
    <div class="container">
        <div class="clear space2"></div>
        <!--<div id="likebox_bottom">
           <div class="fb-page" data-href="https://www.facebook.com/phuongmanh.hung1311" data-width="735" data-height="329" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
               <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/www.HERA GAMING.vn"><a href="https://www.facebook.com/phuongmanh.hung1311">HERA GAMING</a></blockquote></div>
           </div>
           </div>-->
        <!--<div id="support_center">
           <div class="you-ft">
               <b class="red font16">YOUTUBE</b>
               <a href="#" target="_blank"><i class="icons icon-subscrible"></i></a>
               <div class="you-content">
                   <iframe width="300" height="250" src="https://www.youtube.com/embed/NtN9uHRGjlI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
               </div>
           </div>
           <div class="tg-ft">
               <b class="red font20">Tổng đài trợ giúp</b>
               <p>Nhanh chóng - tiện lợi - hài lòng</p>
               <ul>
                   <li>
                       <b>Hỗ trợ Online</b><br />
                       <b>Tổng đài:</b> 0941005969<br />
                       - Bấm phím 0 để gặp chăm sóc khách hàng (8h-17h30) <br>
                       - Bấm phím 1 để mua hàng trực tuyến (8h-21h30) <br>
                       - Bấm phím 2 để hỗ trợ kỹ thuật (8h-21h30)<br>
                       - Bấm phím 3 để yêu cầu dịch vụ kỹ thuật, bảo hành (8h-19h) <br>
                   </li>
                   <li>
                       <b>Góp ý, thắc mắc, khiếu nại</b><br />
                       <b>Email:</b> cskh@HERA GAMING.com<br />
                       <b>Tổng đài:</b> 1900.1903, ấn phím 0 <br />
                       <b>Hotline:</b> 097.858.0088<br />
                   </li>
               </ul>
           </div>
           </div>-->
        <!--support_center-->
    </div>
@endsection