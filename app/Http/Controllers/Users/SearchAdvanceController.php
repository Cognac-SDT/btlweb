<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 23/08/2018
 * Time: 7:15 PM
 */
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Model\Products;
use App\Model\User;
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
                    $array_where[] = ['users.created_at', '>', $value . " 00:00:00"];
                }
                elseif ($key == 'end_date')
                {
                    $array_where[] = ['users.created_at', '<', $value . " 23:59:59"];
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
            $users = User::where($array_where)->paginate(50);
        }
        else
        {
            $users = User::paginate(50);
        }
        $users->setPath("");

        return view('backend.page.users.index',[
            'users'=>$users
        ]);

    }
}