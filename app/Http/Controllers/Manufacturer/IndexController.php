<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 28/07/2018
 * Time: 1:50 PM
 */
namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Model\Manufacturer;
use App\Model\News;

class IndexController extends Controller{
    public function index(){
        $records = Manufacturer::orderBy('id','desc')->paginate(20);
        return view('back-end.brand.list',['records'=>$records]);
    }
}   