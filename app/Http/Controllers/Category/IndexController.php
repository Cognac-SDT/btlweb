<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 28/07/2018
 * Time: 1:50 PM
 */
namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Model\Category;
//use App\Model\News;

class IndexController extends Controller{
    public function index(){
        $records = Category::orderBy('id','asc')->paginate(20);
//        echo "<pre>";
//        print_r($records->toArray());
//        die;
        return view('backend.page.category.index',['category'=>$records]);
    }
}   