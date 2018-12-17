<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 2/08/2018
 * Time: 9:31 AM
 */

namespace App\Http\Controllers\Manufacturer\Ajax;

use App\Http\Controllers\Controller;
use App\Model\Manufacturer;
use App\Model\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query) {
            $records = Manufacturer::where('id', 'LIKE', "%$query%")
                ->orWhere('name', 'LIKE', "%$query%")
                ->orWhere('status', 'LIKE', "%$query%")


                ->paginate(20);
        }
        else $records = Manufacturer::orderBy('id','desc')->paginate(20);
        $view = view('backend.page.manufacturer.ajax.tab_ajax_search_manufacturer',["records"=>$records])->render();
        return response()->json($view);
    }
}