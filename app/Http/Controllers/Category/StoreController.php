<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:10 AM
 */

namespace App\Http\Controllers\Category;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Model\Category;
use App\Model\categorys;
use Illuminate\Http\Request;

use DateTime, Illuminate\Http\File, Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\String_;

class StoreController extends Controller
{
    public function __construct()
    {
    }

    public function index(AddCategoryRequest $request)
    {
        $model = new Category();
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
        $response = 'Thêm Danh Mục thành công';
        $model->save();
        return redirect()->route('category.index')->with('status', $response);

    }
}