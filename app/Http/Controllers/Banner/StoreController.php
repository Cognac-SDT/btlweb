<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:10 AM
 */

namespace App\Http\Controllers\Banner;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use Illuminate\Http\Request;
use DateTime, Illuminate\Http\File, Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            'banner' => 'required',
        ]);
        $model = new Banners;
        if ($request->hasFile('banner')) {

            $model->images = Helper::uploadPhoto($request, "banner");
            $response = 'Thêm banner thành công';
        }


        $model->status = $request->input('status');
        $model->data = $request->input("data");
        $model->save();

        return redirect()->route('banner.index')->with('status', $response);


    }
}