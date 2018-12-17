<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 28/07/2018
 * Time: 1:50 PM
 */

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\News;
use App\Model\Products;

class IndexController extends Controller
{
    public function index($id)
    {
        if ($id != 'all') {
            $pro = Products::where('cat_id', $id)->paginate(10);
            $cat = Category::all();
            return view('backend.page.product.index', ['records' => $pro, 'cat' => $cat, 'loai' => $id]);
        } else {
            $pro = Products::paginate(10);
            $cat = Category::all();
            return view('backend.page.product.index', ['records' => $pro, 'cat' => $cat, 'loai' => 0]);
        }
    }
}   