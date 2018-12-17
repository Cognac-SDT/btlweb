@extends('front-end.layout.master')
@section('head')
    <title></title>
@endsection
@section('content')
    <div class="container">
        <div id="location">
            <a href="/"><i class="bg icon_home"></i></a>
            <span>&raquo;</span><a href="{!! url($cat) !!}">{{$cat}}</a>

        </div>
        <div id="content_center">
            <input type="hidden" id="product_compare_list" value="" />
            <div class="top_area_list_page">
                <h1>{{$cat}}</h1>
                <div class="compare_area">
                    <button type="button" class="btn_compare bg" onclick="compare_product('https://www.hanoicomputer.vn/collection/thanh-ly-hang-ton-kho?display=grid')" style="display:none;"></button>
                </div>
                <div class="sort_style">
                    <span>Lựa chọn</span>
                    <a href="javascript:void(0)" onclick="setUserOption('product_display', 'list', '{!! url($cat) !!}?display=grid')" class="bg list_style "></a>
                    <a href="javascript:void(0)" onclick="setUserOption('product_display', 'grid', '{!! url($cat) !!}?display=grid')" class="bg grid_style "></a>
                </div>
                <div class="sort_pro">
                    <span>Sắp xếp sản phẩm <span class="bg icon_drop"></span> </span>

                </div>
                <div class="paging">
                    <a href="#" class="current">1</a>

                </div>
                <!--paging-->
            </div>
            <!--top_area_list_page-->
            <div class="product_list page_inside">
                <ul class="ul">
                    @foreach($records as $value)
                        <li class="p-{{$value->code}}" data-id="{{$value->id}}">
                            <div class="bg iconSaleOff"></div>
                            <!--<div class="icon-km"><span>KM</span></div>-->
                            <div class="p_container container-icon">
                                <div class="p_sku">Mã SP: {{$value->code}}</div>
                                <a href="{!! url($cat.'/'.$value->id).'-'.$value->slug !!}" class="p_img"><img
                                            class="lazy" src="{!!url('uploads/products/'.$value->images)!!}"
                                            data-src="{!!url('uploads/products/'.$value->images)!!}"
                                            alt="{{$value->name}}"/></a>
                                @if($value->promotion_price ==0)
                                    <div class="p_price img_price">{{number_format($value->promotion_price)}}</div>
                                    <div class="container_old_price">
                                        <div class="p_old_price">{{number_format($value->unit_price)}} VND</div>
                                        <div class="price_off">-{!! $value->getSale() !!}</div>
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
                                <a href="{!! url($cat.'/'.$value->id).'-'.$value->slug !!}"
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

            <!--top_area_list_page-->
        </div>
        <!--content_center-->

        <!--content_right-->
    </div>


@endsection