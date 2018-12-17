<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:30 AM
 */
namespace App\Http\Controllers\Category;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditCategoryRequest;
use App\Model\Banners;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller{
    private $_category;

    public function __construct(Category $category){
        $this->_category=$category;
    }
    public function index(EditCategoryRequest $request){

        $id=$request->input('id');
        $model = $this->_category::find($id);
        if ($request->hasFile('icon')) {

            $file = $request->file('icon');


            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("uploads/category/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            $file->move("uploads/category/",$hinh);
            $model->icon = $hinh;

        }
        $model->name = $request->input('txtCateName');
        $model->slug = str_slug($request->input('txtCateName'));
        $model->status = $request->input('status');
//        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        $model->parent_id = $request->sltCate;
        $model->save();


        return redirect()->route(
            'category.index'
        )->with('status', 'Dữ Liệu Được Cập Nhật!');
    }
}