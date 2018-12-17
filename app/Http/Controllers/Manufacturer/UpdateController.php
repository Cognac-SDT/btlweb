<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:30 AM
 */

namespace App\Http\Controllers\Manufacturer;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Model\Manufacturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    private $manufacturer;

    public function __construct(Manufacturer $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function index(Request $request)
    {
        $id = $request->input('id');
        $model = Manufacturer::find($id);
        if ($request->hasFile('manufacturer')) {
            $file = $request->file('manufacturer');
            $name = $file->getClientOriginalName();
            $hinh = str_random(5) . "-" . $name;
            while (file_exists("uploads/manufacturer/" . $hinh)) {
                $hinh = str_random(5) . "-" . $name;
            }
            $file->move("uploads/manufacturer/", $hinh);
            $model->icon = $hinh;
        }
        $model->status = $request->input('status');
        $model->name = $request->input("name");
        $model->save();
        return redirect()->route(
            'brand.index'
        )->with('status', 'Dữ liệu Đã Cập Nhật!');
    }
}