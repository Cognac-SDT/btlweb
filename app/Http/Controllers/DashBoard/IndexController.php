<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 3/08/2018
 * Time: 7:20 AM
 */
namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\Model\Orders;
use App\Model\Products;

class IndexController extends Controller{
    public function index(){
        $cusomer = Customer::all();
        $products = Products::where('status','1')->get();
        $order = Orders::orderBy('id')->get();
        return view('backend.page.dashboard.index',['customers'=>$cusomer,'products'=>$products,'orders'=>$order]);
    }
}