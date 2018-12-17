<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 8:58 AM
 */
namespace App\Http\Controllers\Manufacturer;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Manufacturer;
use Illuminate\Http\Request;

class EditController extends Controller{
    private $manufacturer;
    public function __construct(Manufacturer $manufacturer)
    {
        $this->$manufacturer = $manufacturer;
    }

    public function index($id){
        $manufacturer = Manufacturer::find($id);
        return view('back-end.brand.edit',['manufacturer'=>$manufacturer]);
    }
}