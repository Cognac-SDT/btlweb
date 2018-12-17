<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:06 AM
 */
namespace App\Http\Controllers\Manufacturer;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Manufacturer;

class DeleteController extends Controller{
    public $manafacturer;

    public function __construct(Manufacturer $manafacturer){
        $this->manafacturer=$manafacturer;
    }
    public function index($id){
        $this->manafacturer->find($id)->delete();
        return redirect()->route('brand.index');
    }
}