<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:06 AM
 */
namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use App\Model\products;

class DeleteController extends Controller{
    public $_product;

    public function __construct(Products $product){
        $this->_product=$product;
    }
    public function index($id){
        $this->_product->find($id)->delete();
        return redirect('admin/san-pham/danh-sach')->with('status','Dữ Liệu Đã Cập Nhập');
    }
}