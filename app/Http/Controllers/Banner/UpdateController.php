<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:30 AM
 */
namespace App\Http\Controllers\Banner;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller{
    private $_banner;

    public function __construct(Banners $banner){
        $this->_banner=$banner;
    }
    public function index(Request $request){
        $id=$request->input('id');

        $model=$this->_banner->find($id);
        if ($request->hasFile('banner')) {

            $model->images = Helper::uploadPhoto($request, "banner");

        }
        $model->status = $request->input('status');
        $model->data = $request->input("data");
        $model->save();
        return redirect()->route(
            'banner.index'
        )->with('status', 'Cập Nhật Dữ liệu Thành CÔng!');
    }
}