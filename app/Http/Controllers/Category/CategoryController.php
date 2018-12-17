<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Category;
use App\Http\Requests\AddCategoryRequest;
use DateTime;

class CategoryController extends Controller
{
   public function getlist()
   {
		$data = Category::all();
		return View ('back-end.category.cat-list',['data'=>$data]);
   }
   public function getadd()
   {	
		$data = Category::all();
		return View ('back-end.category.add',['data'=>$data]);
   }
   public function postadd(AddCategoryRequest $rq)
   {
		$cat = new Category();
      $cat->parent_id= $rq->sltCate;
      $cat->name= $rq->txtCateName;
      $cat->slug = str_slug($rq->txtCateName,'-');
       if($rq->hasFile('icon')){

           $file = $rq->file('icon');

           $name = $file->getClientOriginalName();
           $hinh = str_random(5)."-".$name;
           while(file_exists("uploads/category/".$hinh))
           {
               $hinh = str_random(5)."-".$name;
           }
           $file->move("uploads/category/",$hinh);
           $cat->img = $hinh;
       }
      $cat->save();
      return redirect()->route('getcat')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);
         
   }
   public function getedit($id)   {
      $cat = Category::all();
      $data = Category::find($id);
      return View ('back-end.category.edit',['cat'=>$cat,'data'=>$data]);
   }
   public function postedit($id,AddCategoryRequest $request)
   {
      $cat = Category::find($id);
      $cat->name = $request->txtCateName;
      $cat->slug = str_slug($request->txtCateName,'-');
      $cat->parent_id = $request->sltCate;
       if($request->hasFile('icon')){

           $file = $request->file('icon');

           $name = $file->getClientOriginalName();
           $hinh = str_random(5)."-".$name;
           while(file_exists("uploads/category/".$hinh))
           {
               $hinh = str_random(5)."-".$name;
           }
           $file->move("uploads/category/",$hinh);
           $cat->img = $hinh;
       }
      $cat->save();
      return redirect()->route('getcat')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa']);

   }
   public function getdel($id)
   {
      $parent_id = Category::where('parent_id',$id)->count();
      if ($parent_id==0) {
         $category = Category::find($id);
         $category->delete();
         return redirect()->route('getcat')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
      } else{
         echo '<script type="text/javascript">
                  alert("Không thể xóa danh mục này !");                
                window.location = "';
                echo route('getcat');
            echo '";
         </script>';
      }
   }
}
