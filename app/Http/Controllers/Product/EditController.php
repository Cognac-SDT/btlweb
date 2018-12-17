<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 8:58 AM
 */
namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Products;
use Illuminate\Http\Request;

class EditController extends Controller{
    private $products;
    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function index($id){
        $product = Products::find($id);
        return view('backend.page.product.edit',['product'=>$product]);
    }
}