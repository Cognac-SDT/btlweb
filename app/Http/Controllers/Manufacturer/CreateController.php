<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:03 AM
 */
namespace App\Http\Controllers\Manufacturer;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Manufacturer;

class CreateController extends Controller{
    public function index(){
        $manufacturer = Manufacturer::all();
        $model = new Manufacturer();
        return view('back-end.brand.create',['manufacturer'=>$manufacturer,'model'=>$model]);
    }
}