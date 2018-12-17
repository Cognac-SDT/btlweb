<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:06 AM
 */
namespace App\Http\Controllers\Banner;
use App\Http\Controllers\Controller;
use App\Model\Banners;

class DeleteController extends Controller{
    public $_banner;

    public function __construct(Banners $banner){
        $this->_banner=$banner;
    }
    public function index($id){
        $this->_banner->find($id)->delete();
        return redirect()->route('banner.index');
    }
}