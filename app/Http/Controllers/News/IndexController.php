<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 28/07/2018
 * Time: 1:50 PM
 */
namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Model\News;

class IndexController extends Controller{
    public function index(){
        $records = News::orderBy('id','asc')->paginate(20);
        return view('backend.page.news.index',['news'=>$records]);
    }
}