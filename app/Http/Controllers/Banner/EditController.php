<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 8:58 AM
 */
namespace App\Http\Controllers\Banner;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use Illuminate\Http\Request;

class EditController extends Controller{
    private $banner;
    public function __construct(Banners $banner)
    {
        $this->banner = $banner;
    }

    public function index($id){
        $banner = Banners::find($id);
        return view('back-end.banner.edit',['banner'=>$banner]);
    }
}