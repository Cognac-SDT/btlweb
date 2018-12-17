<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 8:11 AM
 */
namespace App\Http\Controllers\Banner;
use App\Http\Controllers\Controller;
use App\Model\Banners;

class BannerController extends Controller{

    public function index(){
        $banner = Banners::orderBy('id','desc')->paginate(20);
        return view('back-end.banner.list',['banner'=>$banner]);
    }
}