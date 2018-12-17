var SHOPPING_CART_URL = '/gio-hang';
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
function writeStringToPrice(str){
    str = (str+'').replace(/\./g, "");
    var first_group = str.substr(0,str.length % 3);
    var remain_group = str.replace(first_group,"");
    var num_group = remain_group.length/3;
    var result = "", group_of_three;
    for(var i=0;i < num_group;i++){
        group_of_three = remain_group.substr(i*3,3);
        result += group_of_three;
        if(i != (num_group-1)) result += ".";
    }
    if(first_group.length > 0) {
        if(result != "") return first_group + "." + result ;
        else return first_group;
    }else{
        if(result != "") return result;
        else return "";
    }
}
function getItemUnitPrice(item_type, id){
    var unit_price = document.getElementById('sell_price_'+item_type+'_'+id).innerHTML;
    while(unit_price.indexOf(".") > 0){
        unit_price = unit_price.replace('.','');
    }
    unit_price = parseInt(unit_price);
    return unit_price;
}
function updatePrice(item_type, id, new_quantity){
    if(!check_interger(new_quantity)){
        alert('Vui lòng nhập số > 0');
        //reset quantity
        new_quantity = 1;
        $("#quantity_"+item_type+'_'+id).val(new_quantity);
    }
    /*	else{
     unit_price = getItemUnitPrice(id);
     document.getElementById('price_'+id).innerHTML = writeStringToPrice(unit_price * new_quantity + '');
     reCountTotal();
     }
     */
    show_cart_total(item_type, id, new_quantity);

    //01-10-2013
    //check if user is using coupon, recount
    var coupon_code = $('#discount_code').val();
    if(coupon_code.length > 0) {
        var cart_total = document.getElementById('total_value').innerHTML;
        while(cart_total.indexOf(".") > 0){
            cart_total = cart_total.replace('.','');
        }
        check_discount('coupon', coupon_code, parseInt(cart_total));
    }
}
function show_cart_total(item_type, id, quantity){
    var unit_price = getItemUnitPrice(item_type, id);
    document.getElementById('price_'+item_type+'_'+id).innerHTML = writeStringToPrice(unit_price * quantity + '');
    reCountTotal();
}
function check_interger(quantity){
    var intRegex = /^\d+$/;
    if(intRegex.test(quantity)) {
        if(parseInt(quantity) > 0) return true;
        else return false;
    }
    return false;
}
function reCountTotal(){
    var new_cart = "";
    var all_item = 	document.getElementById('item_update_quantity').value;
    var all_item_array = all_item.split(",");
    var total_price = 0;
    var combo_array = [], item_id, unformat_price, item_price, item_quantity, default_price_currency;
    for(var i=0;i<all_item_array.length;i++){
        item_id = all_item_array[i];
        if(item_id.length > 0){
            unformat_price = document.getElementById('sell_price_'+item_id.replace("-","_")).innerHTML;

            if(default_price_currency == 'usd') {
                while(unformat_price.indexOf(",") > 0){
                    unformat_price = unformat_price.replace(',','');
                }
            }else{
                //vnd
                while(unformat_price.indexOf(".") > 0){
                    unformat_price = unformat_price.replace('.','');
                }
            }

            item_price = parseFloat(unformat_price);
            item_quantity = parseInt(document.getElementById('quantity_'+item_id.replace("-","_")).value);
            new_cart += ","+item_id+"-"+item_quantity+"-"+item_price;
            total_price += item_price * item_quantity;
        }
    }
    hura_create_cookie('shopping_cart_store',new_cart,30);
    document.getElementById('total_value').innerHTML = writeStringToPrice(total_price + '');
    document.getElementById('total_cart_value').value = total_price;

    var cart_holder_total = document.getElementById('total_shopping_cart_store');
    if(cart_holder_total != 'undefined' && cart_holder_total != null){
        cart_holder_total.innerHTML = writeStringToPrice(total_price + '');
    }

}
function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function makeUrlAcceptQuery(url){
    if(url.search("?") > 0) return url;
    else return url + "?";
}
function checkCartForm(){
    //check cart has item
    var current_cart=hura_read_cookie("shopping_cart_store");
    if(current_cart == null) return false;

    var ca=current_cart.split(',');
    var number_product=ca.length;
    if(number_product <=1 ){
        if(confirm("Giỏ hàng chưa có sản phẩm. Vui lòng chọn sản phẩm vào giỏ hàng")){
            window.location = "/";
        };
        return false;
    }else{
        //check user information
        var error = "";
        var check_name = document.getElementById('buyer_name').value;
        if(check_name.length < 4) error += "- Bạn chưa nhập tên\n";
        var check_tel = document.getElementById('buyer_mobile').value;
        if(check_tel.length < 5) error += "- Bạn chưa nhập số di động\n";
        var check_add = document.getElementById('buyer_address').value;
        if(check_add.length < 10) error += "- Bạn chưa nhập địa chỉ";
        //var check_note = document.getElementById('buyer_note').value;
        //if(check_name.length < 4) error += "- Bạn chưa nhập tên\n";
        if(error != "") {
            alert(error); return false;
        }
        return true;
    }
}
function add_compare_product(productId) {
    var current_list = document.getElementById("product_compare_list");
    if(current_list == 'undefined' || current_list == null){
        alert("Cần có biến product_compare_list trong template");
        return false;
    }
    if(current_list.value == '') current_list.value = ",";
    //count current item
    var currentNumItem = 0;
    if(current_list.value.length > 1){
        current_list_id = current_list.value.split(",");
        currentNumItem = current_list_id.length - 1;
    }

    var check_box_id = document.getElementById("compare_box_" + productId);
    var text_compare = document.getElementById("text_compare_" + productId);
    if (check_box_id.checked) {
        if (currentNumItem > 6) {
            //Cho phep so sánh tối đa 3 sản phẩm
            check_box_id.checked = "";
            alert("Bạn chỉ có thể so sánh tối đa 6 sản phẩm\nDanh sách đã có đủ 6");
        }
        else {
            document.getElementById("product_compare_list").value = current_list.value + productId + ",";
            if(text_compare != 'undefined' && text_compare != null){
                text_compare.innerHTML = "Chờ so sánh";
                text_compare.style.backgroundColor = '#FFCC00';
            }
        }
    } else {
        document.getElementById("product_compare_list").value = current_list.value.replace("," + productId + ",", ",");
        if(text_compare != 'undefined' && text_compare != null){
            text_compare.innerHTML = "Chọn so sánh ";
            text_compare.style.backgroundColor = '#FFF';
        }
    }
}
function compare_product(){
    var current_list = document.getElementById("product_compare_list");
    if(current_list == 'undefined' || current_list == null){
        alert("Cần có biến product_compare_list trong template");
        return false;
    }
    var currentNumItem = 0;
    if(current_list.value.length > 1){
        current_list_id = current_list.value.split(",");
        currentNumItem = current_list_id.length - 2;
    }

    if (currentNumItem > 1) {
        window.location = "/so-sanh?list=" + current_list.value;
    }else{
        alert("Bạn cần chọn tối thiểu 2 sản phẩm để so sánh");
        return false;
    }
}
function save_product_view_history(product_id){
    if(!check_interger(product_id)){
        return false;
    }
    var cookie_name = 'product_view_history';
    if(hura_read_cookie(cookie_name)==null){hura_create_cookie(cookie_name,',',30);}
    var current_list = hura_read_cookie(cookie_name);
    if(current_list.search(','+product_id+',') == -1){
        var new_list=current_list+','+product_id+',';
        hura_create_cookie(cookie_name,new_list,30);
    }
}
function remove_from_history(product_id){
    if(confirm("Bạn chắc chắn muốn xóa sản phẩm này ?")) {
        if(!check_interger(product_id)){
            return false;
        }
        var cookie_name = 'product_view_history';
        if(hura_read_cookie(cookie_name)==null){hura_create_cookie(cookie_name,',',30);}
        var current_list = hura_read_cookie(cookie_name);
        if(current_list.search(','+product_id+',') !=-1){
            var new_list = current_list.replace(','+product_id+',', ',');
            hura_create_cookie(cookie_name,new_list,30);
        }
        //refresh page
        window.location = window.location;
    }
}


