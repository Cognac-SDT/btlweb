<!DOCTYPE html>
<html lang="vi">
@include('front-end.layout.head')
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5T9JTFZ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="social-right-fixed">
    <a href="javascript:void(0)" onclick="showPopup('popup-facebook');"><i class="icons icon-sright-fb"></i></a>
    <a href="javascript:void(0)" onclick="showPopup('popup-youtube');"><i class="icons icon-sright-yo"></i></a>
    <a href="javascript:void(0)" onclick="showPopup('popup-lien-he');"><i class="icons icon-sright-mail"></i></a>
    <a href="javascript:void(0)" onclick="showPopup('popup-address');"><i class="icons icon-sright-tel"></i></a>
    <a href="javascript:void(0)" id="gotoTop" title="Lên đầu trang" style="display:none;"><i class="icons icon-sright-up"></i></a>
</div>
<!--social-right-fixed-->
<div class="popup-common" id="popup-lien-he">
    <div class="title-popup"><span>Liên hệ với chúng tôi</span><i class="close" onclick="closePopup()">x</i></div>
    <div class="content-popup">
        <form>
            <table width="100%" class="tbl-common">
                <tr>
                    <td><b>Tên đầy đủ</b></td>
                    <td><input type="text" size="50" name="contact_name" id="contact_name" class="inputText" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td><input type="text" size="50" name="contact_email" id="contact_email" class="inputText" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><b>Điện thoại</b></td>
                    <td><input type="text" size="50" name="contact_tel" id="contact_tel" class="inputText" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><b>Thông tin liên hệ</b></td>
                    <td><textarea rows="8" name="contact_message" id="contact_message" style="width:329px;"></textarea></td>
                </tr>
                <!--
                   <tr>
                     <td><b>Mã bảo vệ</b></td>
                     <td>
                       <span id="check_captcha_contact" style="color:#d00; font-size:12px; display:block;"></span>
                       <input type="text" size="10" onkeyup="check_user_captcha_contact(this.value,'check_captcha_contact')" id='captcha' class="inputText" name="captcha" style="float:left; width:100px; padding:0 5px; text-align:center;font-size:18px;"/><img src="/includes/captcha/captcha.php?v=" id='captchar_holder' style="float:left; height:50px;" alt="captcha"/> <a href="javascript:change_captcha('captchar_holder')" style="float:left;">[Đổi mã khác]</a></td>
                   </tr>
                   -->
                <tr>
                    <td></td>
                    <td>
                        <input type="button" class="btn btn-default" value="Hủy" onclick="closePopup()" style="cursor:pointer;" />
                        <input type="button" class="btn btn-blue" value="Gửi liên hệ" onclick="return check_form_contact();" style="cursor:pointer;" />
                    </td>
                </tr>
            </table>
            <input type="hidden" value="send" name="action" />
            <input type="hidden" name="return_url" value="https://www.facebook.com/phuongmanh.hung1311" />
        </form>
    </div>
    <!--content-popup-->
</div>
<!--popup-->
<div class="popup-common" id="popup-youtube">
    <div class="title-popup"><span>Quan tâm đến chúng tôi</span><i class="close" onclick="closePopup()">x</i></div>
    <input type="hidden" value="https://www.youtube.com/embed/8Jf2xyalwXk" id="url-video-popup" />
    <div class="content-popup" style="padding:0; height:315px;" id="content-popup-youtube">
    </div>
    <!--content-popup-->
</div>
<!--popup-->
<div class="popup-common" id="popup-address">
    <div class="title-popup"><span>Địa chỉ liên hệ mua hàng</span><i class="close" onclick="closePopup()">x</i></div>
    <div class="content-popup" style="padding:0 20px; font-size:14px; line-height:1.6;">
        <p><b>Số 129+131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội</b><br />Điện thoại: <span class="red">(024) 36285551</span></p>
        <p><b>43 Thái Hà - Đống Đa - Hà Nội</b><br />Điện thoại: <span class="red">(024) 35380088</span></p>
        <p><b>57 Nguyễn Văn Huyên - Cầu Giấy - Hà Nội</b><br />Điện thoại: <span class="red">(024)38610088/ (024) 38610099</span></p>
        <p><b>A1-6 Lô 8A - Lê Hồng Phong - Ngô Quyền - Hải Phòng</b><br />Điện thoại: <span class="red">(0225) 8830030</span></p>
    </div>
    <!--content-popup-->
</div>
<!--popup-->
<div class="popup-common" id="popup-facebook">
    <div class="title-popup"><span>Quan tâm đến chúng tôi</span><i class="close" onclick="closePopup()">x</i></div>
    <div class="content-popup" style="padding:10px 20px; font-size:14px; line-height:1.6;">
        <div style="height:130px;">
            <div class="fb-page" data-href="https://www.facebook.com/phuongmanh.hung1311" data-width="455" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/phuongmanh.hung1311" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/phuongmanh.hung1311">Fanpage</a></blockquote>
            </div>
        </div>
        <div class="line"></div>
        <p><i>Hãy <b class="red">Like fanpage</b> để trở thành <b class="blue">Fan của HERA GAMING</b> ngay trong hôm nay!</i></p>
        <p><b>Số 129+131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội</b><br />Điện thoại: <span class="red">(024) 36285551</span></p>
        <p><b>43 Thái Hà - Đống Đa - Hà Nội</b><br />Điện thoại: <span class="red">(024) 35380088</span></p>
        <p><b>57 Nguyễn Văn Huyên - Cầu Giấy - Hà Nội</b><br />Điện thoại: <span class="red">(024)38610088/ (024) 38610099</span></p>
        <p><b>A1-6 Lô 8A - Lê Hồng Phong - Ngô Quyền - Hải Phòng</b><br />Điện thoại: <span class="red">(0225) 8830030</span></p>
        <div class="clear"></div>
    </div>
    <!--content-popup-->
</div>
<!--popup-->
<div id="bg-opacity" onclick="closePopup()"></div>
<script type="text/javascript" src="{!! url('template/default/script/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('template/default/script/set_data.js') !!}"></script>
<script type="text/javascript" src="{!! url('template/default/script/carousel.js') !!}"></script>
<script type="text/javascript" src="{!! url('template/default/script/lazyload.js') !!}"></script>
<div id="wrap">
    <div id="top">
        @include('front-end.layout.top')
    </div>
    <!--top-->
    <div class="clear"></div>
    @include('front-end.layout.header')
    <!--wrap-head-->
    <div class="clear"></div>
    <script type="text/javascript" src="{!! url('template/default/script/owl.carousel.js') !!}"></script>
</div>
<input type="hidden" id="product_compare_list" value="" />
<div id="compare_area_home">
    <span>So sánh sản phẩm</span>
    <div class="compare_area">
        <button type="button" class="btn_compare bg" onclick="compare_product('https://www.HERA GAMING.vn/')" style="display:none;"></button>
    </div>
</div>
@yield('content')
<!--container-->
<div class="clear"></div>
@include('front-end.layout.footer')
<script>
    function subscribe_newsletter() {
        var email = document.getElementById('email_newsletter').value;
        if (email.length > 3) {
            $.post("/ajax/register_for_newsletter.php", { email: email }, function (data) {
                if (data == 'success') { alert("Quý khách đã đăng ký thành công "); $("#email_newsletter").val("Nhập Email nhận bản tin"); }
                else if (data == 'exist') { alert("Email này đã tồn tại"); }
                else { alert('Lỗi xảy ra, vui lòng thử lại '); }

            });
        } else { alert('Vui lòng nhập địa chỉ email'); }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-highstreet").on('click tap', function () {
            $(".highsteet-gallery").toggle();
        });
    });

    $(".remove_qc").on('click tap', function () {
        $.session.set('remove_qc', 'true');
        $("#highstreet").hide();
    });

    if ($.session.get('remove_qc') == 'true') $("#highstreet").hide();
</script>
<div class="bn-fixfooter" style="display: block; bottom: 0px; position:fixed; left:0; z-index:999;">
    <!-- <a href="javascript:;" onclick="jQuery('.bn-fixfooter').slideToggle()" style="display: inline-block;background: #fff;position: absolute;right: 0;color: #333;font-size: 15px;font-weight: bold;padding: 2px 5px;text-decoration: none;" title="Đóng">x</a>-->
    <a href="/ad.php?id=1118" target='_blank' rel='nofollow'><img border=0 src="https://HERA GAMINGcdn.commedia/banner/banner_c60d060b.png" width='224' height='28' alt="" /></a>
</div>
<script>
    function open_oauth(service) {
        window.open("/login_oauth.php?service=" + service + "&return_url=https://www.HERA GAMING.vn/", "Login_OAuth", "width=600, height=500");
    }
</script>
<!-- Begin subizChat-->
<script type='text/javascript'>window._sbzq || function (e) { e._sbzq = []; var t = e._sbzq; t.push(["_setAccount", 9377]); var n = e.location.protocol == "https:" ? "https:" : "http:"; var r = document.createElement("script"); r.type = "text/javascript"; r.async = true; r.src = n + "//static.subiz.com/public/js/loader.js"; var i = document.getElementsByTagName("script")[0]; i.parentNode.insertBefore(r, i) }(window);</script>
<script type="text/javascript" src="includes/js/common.js"></script>
<div id="backgroundPopupForCart"></div>
<div id="popupCart">
    <p class="note">Sản phẩm đã được thêm vào giỏ hàng</p>
    <a href='javascript:void(0)' onclick="$('#popupCart').fadeOut(); $('#backgroundPopupForCart').fadeOut('fast');" class="button">Xem sản phẩm khác</a>
    <a href='javascript:void(0)' onclick="location.href='/gio-hang'" class="button orange">Tiếp tục mua hàng</a>
</div>
<script>
    function addToShoppingCartStop(e, t, n, r) {
        if (hura_read_cookie("shopping_cart_store") == null) {
            hura_create_cookie("shopping_cart_store", ",", 1)
        }
        var i = hura_read_cookie("shopping_cart_store");
        if (i.search("," + e + "-" + t + "-") == -1) {
            var s = i + "," + e + "-" + t + "-" + n + "-" + r;
            hura_create_cookie("shopping_cart_store", s, 1);
            countShoppingCart("shopping_cart_store");
            //$("#popupCart .note").text("Sản phẩm đã được thêm vào giỏ hàng");
            //$("#backgroundPopupForCart").show();
            //$("#popupCart").fadeIn();
        } else {
            //$("#popupCart .note").text("Sản phẩm đã có trong giỏ hàng");
            //$("#backgroundPopupForCart").show();
            //$("#popupCart").fadeIn();
        }
        $("#count_shopping_cart_store_2").text($("#count_shopping_cart_store").text());
        $("#cart-fixed").addClass("hover");
        setTimeout(function () { $("#cart-fixed").removeClass("hover"); }, 2000);
    }
</script>
<div id="cart-fixed" onclick="location.href='/gio-hang'">
    <img src="template/default/images/icon_cart_fixed.png" alt="" />
    <p>Giỏ hàng của bạn <br /><b>Có <span id="count_shopping_cart_store_2">0</span> sản phẩm</b></p>
</div>
<script>$(function () { $("#count_shopping_cart_store_2").text($("#count_shopping_cart_store").text()) })</script>
<!--script type="text/javascript" src="/includes/js/swfobject.js"></script-->
<script type="text/javascript" src="template/default/script/cufon.js"></script>
<script type="text/javascript" src="template/default/script/font.js"></script>
<script>Cufon.replace(".cufon");</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-42369638-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="#"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=1945738209002819&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script>
    window.addEventListener('load', function () {
        if (window.location.href.indexOf('/gui-don-hang') > -1) {
            if (jQuery('h3:contains(Cảm ơn quý khách đã đặt hàng)').length > 0) {
                gtag('event', 'Mua', { 'event_category': 'Dat Hang', 'event_label': 'Dat Hang Thanh Cong' });
            }
        }
    })

</script>
<script>

    function addToShoppingCartStop(e, t, n, r) {
        if (hura_read_cookie("shopping_cart_store") == null) {
            hura_create_cookie("shopping_cart_store", ",", 1)
        }
        var i = hura_read_cookie("shopping_cart_store");
        if (i.search("," + e + "-" + t + "-") == -1) {
            var s = i + "," + e + "-" + t + "-" + n + "-" + r;
            hura_create_cookie("shopping_cart_store", s, 1);
            countShoppingCart("shopping_cart_store");
            //$("#popupCart .note").text("Sản phẩm đã được thêm vào giỏ hàng");
            //$("#backgroundPopupForCart").show();
            //$("#popupCart").fadeIn();
        } else {
            //$("#popupCart .note").text("Sản phẩm đã có trong giỏ hàng");
            //$("#backgroundPopupForCart").show();
            //$("#popupCart").fadeIn();
        }
        $("#count_shopping_cart_store_2").text($("#count_shopping_cart_store").text());
        $("#cart-fixed").addClass("hover");
        setTimeout(function () { $("#cart-fixed").removeClass("hover"); }, 2000);
    }
</script>

</script>
@yield('js')
<script type="text/javascript" src="includes/js/index.js"></script>
</body>
</html>