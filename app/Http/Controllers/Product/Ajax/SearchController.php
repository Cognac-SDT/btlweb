<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 2/08/2018
 * Time: 9:31 AM
 */

namespace App\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query) {
            $records = User::where('id', 'LIKE', "%$query%")
                ->orWhere('username', 'LIKE', "%$query%")
                ->orWhere('email', 'LIKE', "%$query%")
                ->orWhere('phone', 'LIKE', "%$query%")

                ->paginate(20);
        }
        else $records = User::orderBy('id','desc')->paginate(20);
        $view = view('backend.page.products.ajax.tab_ajax_search_user',["records"=>$records])->render();
        return response()->json($view);
    }
}