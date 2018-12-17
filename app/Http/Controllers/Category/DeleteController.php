<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:06 AM
 */
namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Category;

class DeleteController extends Controller{
    public $_category;

    public function __construct(Category $category){
        $this->_category=$category;
    }
    public function index($id){
        $parent_id = Category::where('parent_id',$id)->count();
        if ($parent_id==0) {
            $category = Category::find($id);
            $category->delete();
            return redirect()->route('category.index')
                ->with('status','Xóa Danh mục Thành Công');
        } else{
            echo '<script type="text/javascript">
                  alert("Không thể xóa danh mục này !");                
                window.location = "';
            echo route('category.index');
            echo '";
         </script>';
        }
    }
}