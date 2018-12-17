<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 16/09/2018
 * Time: 4:56 PM
 */
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Model\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller{
    public function index(){
        return view('front-end.page.cart');
    }
    public function addItem($id,Request $request){
        $products = Products::find($id); // get prodcut by id
        if(isset($request->newPrice))
        {
            $price = $request->newPrice; // if size select
        }
        else{
            $price = $products->pro_price; // default price
        }
        Cart::add($id,$products->pro_name,1,$price,['img' => $products->pro_img,'stock' => $products->stock]);

        return back();
    }
    public function destroy($id){
        Cart::remove($id);
        return back(); // will keep same page
    }
}