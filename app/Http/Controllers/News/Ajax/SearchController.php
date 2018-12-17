<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 2/08/2018
 * Time: 9:31 AM
 */

namespace App\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use App\Model\News;
use App\Model\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query) {
            $records = News::where('id', 'LIKE', "%$query%")
                ->orWhere('title', 'LIKE', "%$query%")
                ->orWhere('author', 'LIKE', "%$query%")
                ->orWhere('source', 'LIKE', "%$query%")

                ->paginate(20);
        }
        else $records = News::orderBy('id','desc')->paginate(20);
        $view = view('backend.page.news.ajax.tab_ajax_search_news',["records"=>$records])->render();
        return response()->json($view);
    }
}