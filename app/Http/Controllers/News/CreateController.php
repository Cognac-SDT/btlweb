<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:03 AM
 */
namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Category;
use App\Model\News;

class CreateController extends Controller{
    public function index(){
        $cat= Category::where('parent_id',21)->get();
//        echo "<pre>";print_r($cat->toArray());die;

        return view('backend.page.news.create',['cat'=>$cat]);
    }
}