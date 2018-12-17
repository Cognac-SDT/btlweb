<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 8:12 AM
 */
namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;
use App\Model\Orders;

class IndexController extends Controller{
    public function index(){
        $order = Orders::orderBy('id','desc')->paginate(20);
        return view('backend.page.orders.index',['order'=>$order]);
    }
}