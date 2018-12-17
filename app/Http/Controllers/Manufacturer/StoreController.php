<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:10 AM
 */
namespace App\Http\Controllers\Manufacturer;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Manufacturer;
use Illuminate\Http\Request;
use DateTime,Illuminate\Http\File,Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller{
    public function __construct(){
    }
    public function index(Request $request){
        $model = new Manufacturer();

        if($request->hasFile('manufacturer')){

            $file = $request->file('manufacturer');

            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."-".$name;
            while(file_exists("uploads/manufacturer/".$hinh))
            {
                $hinh = str_random(5)."-".$name;
            }
            $file->move("uploads/manufacturer/",$hinh);
            $model->icon = $hinh;
        }

        $model->status = $request->input('status');
        $model->name=$request->input("name");


        $model->save();

        return redirect()->route('brand.index')->with('status','Thêm Thông Tin Thành Công');



    }
}