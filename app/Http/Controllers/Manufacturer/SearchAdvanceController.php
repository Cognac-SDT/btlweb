<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 23/08/2018
 * Time: 7:15 PM
 */
namespace App\Http\Controllers\Manufacturer;
use App\Http\Controllers\Controller;
use App\Model\Manufacturer;
use Illuminate\Http\Request;

use App\Model\Category;

class SearchAdvanceController extends Controller{
    public function index(Request $request){
        $array_where = array();
        foreach ($request->toArray() as $key => $value)
        {
            if ($value != '')
            {
                if ($key == 'start_date')
                {
                    $array_where[] = ['manufacturer.created_at', '>', $value . " 00:00:00"];
                }
                elseif ($key == 'end_date')
                {
                    $array_where[] = ['manufacturer.created_at', '<', $value . " 23:59:59"];
                }
                elseif($key == 'page')
                {
                    continue;
                }
                else
                {
                    $array_where[] = [str_replace('-','.',$key), 'like', "%$value%"];
                }
            }
        }
        if(count($array_where)>0)
        {
            $records = Manufacturer::where($array_where)->paginate(50);
        }
        else
        {
            $records = Manufacturer::paginate(50);
        }
        $records->setPath("");

        return view('backend.page.manufacturer.index',[
            'records'=>$records
        ]);

    }
}