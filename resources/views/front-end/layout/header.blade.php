<div id="wrap-head">
    <div id="header">
        <div class="container">
            <a href="{!! url('/') !!}" id="logo"><img src="media/banner/logo.png" alt="HERA GAMING" /> </a>
            <div id="search">
                <form method="get" action="/tim" enctype="multipart/form-data">
                    <select name="scat_id" id="sel_cat" style="display: none;">
                        <option value="0">Tất cả</option>
                        <option value="159">Laptop & Phụ kiện</option>
                        <option value="325">PC đồng bộ & PC Gaming</option>
                        <option value="388">Máy chủ & Workstations</option>
                        <option value="6">Linh kiện máy tính</option>
                        <option value="105">Gaming Gear</option>
                        <option value="364">Gaming Console</option>
                        <option value="379">Tản nhiệt - Cooling</option>
                        <option value="304">GameNet - Phòng Game</option>
                        <option value="12">Thiết bị văn phòng</option>
                        <option value="395">TB siêu thị & Cửa hàng</option>
                        <option value="41">TB Nghe Nhìn & Giải Trí</option>
                        <option value="18">Thiết bị lưu trữ</option>
                        <option value="23">Thiết bị mạng</option>
                        <option value="455">Phụ kiện các loại</option>
                        <option value="260">Camera quan sát</option>
                        <option value="165">Sản phẩm thanh lý</option>
                    </select>
                    <div id="ul_cat" class="ul">
                        <div class="selected"><span>Tất cả</span> <i class="bg icon_drop"></i> </div>
                        <ul style="display: none;">
                            <li title="0">Tất cả</li>
                            <li title="159">Laptop & Phụ kiện</li>
                            <li title="325">PC đồng bộ & PC Gaming</li>
                            <li title="388">Máy chủ & Workstations</li>
                            <li title="6">Linh kiện máy tính</li>
                            <li title="105">Gaming Gear</li>
                            <li title="364">Gaming Console</li>
                            <li title="379">Tản nhiệt - Cooling</li>
                            <li title="304">GameNet - Phòng Game</li>
                            <li title="12">Thiết bị văn phòng</li>
                            <li title="395">TB siêu thị & Cửa hàng</li>
                            <li title="41">TB Nghe Nhìn & Giải Trí</li>
                            <li title="18">Thiết bị lưu trữ</li>
                            <li title="23">Thiết bị mạng</li>
                            <li title="455">Phụ kiện các loại</li>
                            <li title="260">Camera quan sát</li>
                            <li title="165">Sản phẩm thanh lý</li>
                        </ul>
                    </div>
                    <input type="text" class="text" id="text_search" name="q" placeholder="Gõ từ khóa tìm kiếm..." autocomplete="off" />
                    <input type="submit" id="submit_search" value="Tìm kiếm" />
                </form>
                <div class="autocomplete-suggestions"></div>
            </div>
            <!--search-->
            <div id="hotline-header">
                Mua hàng Online<br /> <b>0941005969</b>
                <div class="sub">
                    <div class="item"><b>0</b><span>Bấm 0 gặp chăm sóc khách hàng (từ 8h00 đến 17h30)</span></div>
                    <div class="item"><b>1</b><span>Bấm 1 mua hàng trực tuyến (từ 8h00 đến 21h30)</span></div>
                    <div class="item"><b>2</b><span>Bấm 2 hỗ trợ kỹ thuật (từ 8h00 đến 21h30)</span></div>
                    <div class="item"><b>3</b><span>Bấm 3 yêu cầu dịch vụ kỹ thuật - bảo hành (từ 8h00 đến 19h00)</span></div>
                </div>
                <!--sub-->
            </div>
            <!--hotline-header-->
            <div id="header_right">
                <a href="{!! url('gio-hang') !!}" id="cart">
                    <span>Giỏ hàng</span> <b id="count_shopping_cart_store">0</b>
                </a>
                <a id="build-pc" href="#" rel="nofollow">Xây Dựng Cấu Hình</a>

            </div>
            <!--header_right-->
        </div>
        <!--container-->
    </div>
    <!--header-->
    <div class="clear"></div>
    <div id="nav-main">
        <div class="container">
            <div id="nav_vertical">
                <div class="title_nav_verticle">Danh mục sản phẩm</div>
                <ul class="ul ul_menu">
                  @include('front-end.layout.menu')
                </ul>
                <div class="clear"></div>
            </div><!--nav_vertical-->
            <div id="nav_horizontal">
                <a href="/tien-ich-ung-dung/san-pham-chinh-hang-100/a1422.html"><img src="template/default/images/new_icon_chinhhang.png" alt="" />Tin Tức Nổi Bật</a>
                <a href="/huong-dan-khach-hang/quy-dinh-ve-doi-tra-hang/a574.html"><img src="template/default/images/icon-doi-tra.png" alt="" />Cách Thức Mua Hàng</a>
                <a href="/huong-dan-khach-hang/quy-dinh-ve-doi-tra-hang/a574.html"><img src="template/default/images/icon-doi-tra.png" alt="" />Chế độ Bảo Hành</a>/a>
            </div><!--nav-->
            <div class="clear"></div>
        </div><!--container-->
    </div><!--nav-main-->
</div>