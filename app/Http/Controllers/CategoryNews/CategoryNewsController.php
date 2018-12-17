<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 14/09/2018
 * Time: 7:06 AM
 */
namespace App\Http\Controllers\CategoryNews;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryNewsRequest;
use App\Http\Requests\AddCategoryRequest;
use App\Model\CategoryNews;

class CategoryNewsController extends Controller{
    public function index(){
        $data = CategoryNews::all();
        return View ('back-end.category_news.cat-list',['data'=>$data]);
    }
    public function getAdd(){
        $data = CategoryNews::all();
        return View ('back-end.category_news.add',['data'=>$data]);
    }
    public function postAdd(AddCategoryNewsRequest $rq){
        $cat = new CategoryNews();
        $cat->title = $rq->txtCateTitle;
        $cat->slug = str_slug($rq->txtCateTitle);
        $cat->save();
        return redirect()->route('category_news.list')->with('status','Thêm thành công');
    }
    public function getDel($id){
        $cat = CategoryNews::find($id);
        $cat->delete();
        return redirect()->route('category_news.list')->with('status','Xóa Danh Mục Thành Công');
    }
    public function getEdit($id){
        $cat = CategoryNews::find($id);
        return view('back-end.category_news.edit',['cat'=>$cat]);
    }
    public function postEdit(AddCategoryNewsRequest $rq,$id){
        $cat = CategoryNews::find($id);
        $cat->title = $rq->txtCateTitle;
        $cat->slug = str_slug($rq->txtCateTitle);
        $cat->save();
        return redirect()->route('category_news.list')->with('status','Sửa thành công');
    }
}