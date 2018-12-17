<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:30 AM
 */
namespace App\Http\Controllers\Product;
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
        $submit = $request->input('submit');
        $model=$this->_banner->find($id);
        if($request->hasFile('category_icon')) {
            $model =  Banners::find($id);

            $file = $request->file('category_icon');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/category/them')->with('error_img', 'Bạn chọn hình không đúng định dạng');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5) . "-" . $name;
            while (file_exists("uploads/category/" . $hinh)) {
                $hinh = str_random(5) . "-" . $name;
            }
            $file->move("uploads/category/", $hinh);
            $model->images = $hinh;
            $model->status = $request->input('status');


            $response = 'Sửa danh mục thành công';


            $model->save();
        }
        return redirect()->route(
            'category.index'
        )->with('status', 'Data updated!');
    }
}