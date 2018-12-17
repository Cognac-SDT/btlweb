<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:03 AM
 */
namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Category;

class CreateController extends Controller{
    public function index(){
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('name','id')->all();
        $all_cate = array();
        $data = Category::all();

        foreach ($allCategories as $key=>$value){
            $all_cate[null]= 'tat_ca';
            $all_cate[$key] = $value;
        }

//        return view('categoryTreeview',compact('categories','allCategories'));
        return view('backend.page.category.create',['categories'=>$categories,'data'=>$data]);
    }
}