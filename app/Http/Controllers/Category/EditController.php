<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 8:58 AM
 */
namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Category;
use Illuminate\Http\Request;

class EditController extends Controller{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index($id){
        $cat = Category::all();
        $array_name = array();
        foreach ($cat->name as $key=>$value){
            $array_name[0] = 'Tất Cả';
            $array_name[$key] = $value;
        }
        $category = Category::find($id);
        return view('backend.page.category.edit',['cat'=>$array_name,'category'=>$category]);
    }
}