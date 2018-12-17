<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Orders;
use App\Model\Orders_detail;
use Illuminate\Support\Facades\DB;

class OdersController extends Controller
{
    public function getlist()
    {
    	$data = Orders::paginate(10);
    	return view('back-end.oders.list',['data'=>$data]);
    }

    public function getdetail($id)
    {
    	$oder = Orders::where('id',$id)->first();
    	$data = DB::table('oders_detail')
    			 	->join('products', 'products.id', '=', 'oders_detail.pro_id')
    			 	->groupBy('oders_detail.id')
    			 	->where('o_id',$id)
    			 	->get();
    	return view('back-end.oders.detail',['data'=>$data,'oder'=>$oder]);
    }
    public function postdetail($id)
    {
    	$oder = Orders::find($id);

    	$oder->status = 1;
    	$oder->save();
    	return redirect('admin/donhang')
      	->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);    	

    }
     public function getdel($id)
    {       
    	$oder = Orders::where('id',$id)->first();
    	if ($oder->status ==1) {
    		return redirect()->back()
    		->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy đơn hàng số: '.$id.' vì đã được xác nhận!']);
    	} else {
    		$oder = Orders::find($id);
        	$oder->delete();
        	return redirect('admin/donhang')
         	->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ đơn hàng số:  '.$id.' !']);
     	}
    }
}
