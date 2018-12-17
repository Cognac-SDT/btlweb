<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 16/09/2018
 * Time: 8:42 PM
 */
namespace App\Http\Controllers\Page;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Manufacturer;
use App\Model\Products;

class ListController extends Controller{
    public function index($cat){
        $name = '';
        $now = Helper::getCurrentDate();
        $manufacturers = Manufacturer::all();
        $cat_name = Category::where('slug','=',$cat)->first();

        // ds san pham moi
        if($cat == 'san-pham-moi'){
            $name = 'Sản Phẩm Mới';
            $records = Products::where('created_at','<',$now)->paginate(8);
            return view('front-end.page.list_product_type',['records'=>$records,'cat'=>$name]);
        }
        // ds san pham giam gia
        if($cat == 'san-pham-giam-gia'){
            $name = 'Sản Phẩm Giảm Giá';
            $records = Products::where('promotion_price','>','0')->paginate(8);

            return view('front-end.page.list_product_type',['records'=>$records,'cat'=>$name]);
        }
        // danh sach hang san pham
        foreach ($manufacturers as $value){
            if($cat == $value->slug){
                $records = Products::where('manufacturer_id',$value->id)->paginate(20);
                return view('front-end.page.list_product_type',['records'=>$records,'cat'=>$name]);
            }
        }
        // danh sach san pham theo danh muc
/*        if($cat == $cat_name->slug){
            $records = Products::where('cat_id',$cat_name->id)->paginate(6);
            $name = $cat_name->name;
            return view('front-end.page.list_product_type',['records'=>$records,'cat'=>$name]);
        }*/

    }
}