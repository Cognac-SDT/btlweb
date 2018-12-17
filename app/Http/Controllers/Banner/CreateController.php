<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:03 AM
 */
namespace App\Http\Controllers\Banner;
use App\Http\Controllers\Controller;
use App\Model\Banners;

class CreateController extends Controller{
    public function index(){
        $banner = Banners::all();
        $model = new Banners();
        return view('back-end.banner.create',['banner'=>$banner,'model'=>$model]);
    }
}