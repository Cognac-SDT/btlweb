<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 2/08/2018
 * Time: 9:31 AM
 */

namespace App\Http\Controllers\Category\Ajax;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query) {
            $records = Category::where('id', 'LIKE', "%$query%")
                     ->orWhere('name', 'LIKE', "%$query%")
                     ->paginate(20);
        }
        else $records = Category::orderBy('id','desc')->paginate(20);
        $view = view('backend.page.category.ajax.tab_ajax_search_category',["category"=>$records])->render();
        return response()->json($view);
    }
}