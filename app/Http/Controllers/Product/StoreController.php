<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:10 AM
 */

namespace App\Http\Controllers\Product;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductsRequest;
use App\Model\ProDetails;
use App\Model\ProductImages;
use App\Model\Products;
use Illuminate\Http\Request;
use DateTime, Illuminate\Http\File, Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
    }

    public function index(AddProductsRequest $rq)
    {

        $pro = new Products();

        $pro->name = $rq->txtname;
        $pro->slug = str_slug($rq->txtname,'-');
        $pro->intro = $rq->txtintro;
        $pro->promo1 = $rq->txtpromo1;
        $pro->promo2 = $rq->txtpromo2;
        $pro->promo3 = $rq->txtpromo3;
        $pro->packet = $rq->txtpacket;
        $pro->r_intro = $rq->txtre_Intro;
        $pro->review = $rq->txtReview;
        $pro->tag = $rq->txttag;
        $pro->price = $rq->txtprice;
        $pro->cat_id = $rq->sltCate;
        $pro->status = '1';
        $f = $rq->file('txtimg')->getClientOriginalName();
        $filename = time().'_'.$f;
        $pro->images = $filename;
        $rq->file('txtimg')->move('uploads/products/',$filename);
        $pro->save();
        $pro_id =$pro->id;
        $pro_detail = new ProDetails();

        $response = "Thêm Sản Phẩm Thành Công";
        return redirect()->route('product.index')->with('status', $response);


    }
}