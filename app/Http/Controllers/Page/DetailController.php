<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 16/09/2018
 * Time: 5:02 PM
 */

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\News;
use App\Model\Products;


class DetailController extends Controller
{
    public function index( $slug, $id)
    {
        $record = Products::find($id);
        $list_product = Products::where('cat_id',$record->category)->paginate(4);
        return view('front-end.page.chitiet',['record'=>$record,'name'=>$record->category->name,'list_product'=>$list_product]);
    }
}