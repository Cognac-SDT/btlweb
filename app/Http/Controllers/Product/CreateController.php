<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:03 AM
 */
namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Manufacturer;
use App\Model\ProDetails;
use App\Model\ProductImages;
use App\Model\Products;

class CreateController extends Controller{
    public function index($id){
        $pro = new Products;
        $loai = Category::find($id);
        $cat = Category::all();
        $manu = Manufacturer::all();
        return view('backend.page.product.create',
            ['pro'=>$pro,'cat'=>$cat,'manu'=>$manu,'loai'=>$loai]);
    }
}