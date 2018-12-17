<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 16/09/2018
 * Time: 4:30 PM
 */
namespace App\Http\Controllers\Page;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Category;
use App\Model\CategoryNews;
use App\Model\Manufacturer;
use App\Model\News;
use App\Model\Products;

class IndexController extends Controller{
    public function index(){
        $now = Helper::getCurrentDate();
        // Lây banner theo dieu kien su dung
        $banner = Banners::where('status','su_dung')->paginate(3);
        // Hiển thị danh sách tin tức nổi bật
        $space_news = News::where('status',2)->paginate(5);
        // Hien thi danh sach tin tuc moi trước 5 ngày
        $new_post = News::where('created_at','<',Helper::getSubDate($now,5));
        // hien thi danh sach san pham
            // hien thi ds san pham moi
        $product_sale = Products::where('promotion_price','>','0')->paginate(8);
        // Ds san pham moi
        $product_new = Products::where('created_at','=',$now)->paginate(8);
        // Ds nha san xuat
        $brand = Manufacturer::where('status',2)->get();
        // Danh sach list san pham
        $list_cat = Category::where('parent_id',0)->get();

        return view('front-end.page.index',['banner'=>$banner,
            'news'=>$space_news,
            'post_news'=>$new_post,
            'product_sale'=>$product_sale,
            'product_new'=>$product_new,
            'brand'=>$brand,
            'list_cat'=>$list_cat
            ]);
    }
}