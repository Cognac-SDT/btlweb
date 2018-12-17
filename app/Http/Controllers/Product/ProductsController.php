<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Model\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductsRequest;
use App\Http\Requests\EditProductsRequest;
use App\Http\Requests;
use App\Model\Products;
use App\Model\Category;
use App\Model\ProDetails;
use App\Model\ProductImages;

use DateTime,File,Input,DB;


class ProductsController extends Controller
{
	public function getlist($id)
	{

        if ($id!='all') {
            $pro = Products::where('cat_id',$id)->paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>$id]);                    
        } else {
            $pro = Products::paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>0]);
        }		
	}
    public function getadd($id)
    {
       $loai = Category::where('id',$id)->first();
       $cate = Category::all();
       $brand = Manufacturer::all();
        return view('back-end.products.add',['loai'=>($loai)?$loai->name:'Danh Mục Cha','brand'=>$brand,'cat'=>$cate]);
    }
    public function postadd(AddProductsRequest $rq)
    {

    	$pro = new Products();
    	$pro->name = $rq->txtname;
    	$pro->slug = str_slug($rq->txtname);
    	$pro->intro = $rq->txtintro;
    	$pro->promo1 = $rq->txtpromo1;
    	$pro->promo2 = $rq->txtpromo2;
    	$pro->promo3 = $rq->txtpromo3;
    	$pro->packet = $rq->txtpacket;
    	$pro->r_intro = $rq->txtre_Intro;
    	$pro->review = $rq->txtReview;
    	$pro->tag = $rq->txttag;
    	$pro->unit_price = $rq->txtprice;
    	$pro->promotion_price = $rq->txtproprice;
    	$pro->cat_id = $rq->sltCate;
    	$pro->service = $rq->txtservice;
    	$pro->code = $rq->txtcode;
    	$pro->created_at = new datetime;
    	$pro->status = '1';
    	$f = $rq->file('txtimg')->getClientOriginalName();
    	$filename = time().'_'.$f;
    	$pro->images = $filename;    	
    	$rq->file('txtimg')->move('uploads/products/',$filename);
    	$pro->save();    	
    	$pro_id =$pro->id;

    	$detail = new ProDetails();
        $detail->cpu = $rq->txtCpu;
        $detail->ram = $rq->txtRam;
        $detail->screen = $rq->txtScreen;
        $detail->graphics = $rq->txtVga;
        $detail->storage = $rq->txtStorage;
        $detail->pro_id = $pro_id;
        $detail->note = $rq->txtNote;
        $detail->case = $rq->txtCase;

    	$detail->save();

    	if ($rq->hasFile('txtdetail_img')) {
    		$df = $rq->file('txtdetail_img');
    		foreach ($df as $row) {
    			$img_detail = new ProductImages();
    			if (isset($row)) {
    				$name_img= time().'_'.$row->getClientOriginalName();
    				$img_detail->images_url = $name_img;
    				$img_detail->pro_id = $pro_id;
    				$img_detail->created_at = new datetime;
    				$row->move('uploads/products/details/',$name_img);
    				$img_detail->save();
    			}
    		}
		}
	return redirect('admin/sanpham/'.$pro->cat_id)
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);    	

    }
    public function getdel($id)
    {
        $detail = ProDetails::where('pro_id',$id)->get();
        foreach ($detail as $row) {                
               $dt = ProDetails::find($row->id);
               $pt = public_path('uploads/products/details/').$dt->images_url; 
               // dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
    	$pro = Products::find($id);
        $pro->delete();
        return redirect('admin/sanpham/all')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
    }
    public function getedit($id)
    {
        $dt = Products::find($id);
        $cat = Category::where('id',$dt->cat_id)->get();
        return view('back-end.products.edit',['pro'=>$dt,'cat'=>$cat]);
    }
    public function postedit($id,EditProductsRequest $rq)
    {
    	$pro = Products::find($id);

        $pro->name = $rq->txtname;
        $pro->slug = str_slug($rq->txtname,'-');
        $pro->intro = $rq->txtintro;
        $pro->promo1 = $rq->txtpromo1;
        $pro->promo2 = $rq->txtpromo2;
        $pro->promo3 = $rq->txtpromo3;
        $pro->packet = $rq->txtpacket;
        $pro->r_intro = $rq->txtre_Intro;
        $pro->review = $rq->txtReview;
        $pro->tag = $rq->txttag;
        $pro->unit_price = $rq->txtprice;
        $pro->promotion_price = $rq->txtproprice;
        $pro->cat_id = $rq->sltCate;
//        $pro->user_id = Auth::guard('admin')->user()->id;
        $pro->updated_at = new datetime;
        $pro->status = '1';
        $file_path = public_path('uploads/products/').$pro->images;        
        if ($rq->hasFile('txtimg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }
            
            $f = $rq->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $rq->file('txtimg')->move('uploads/products/',$filename);
        }       
        $pro->save();
        $pro->pro_details->cpu = $rq->txtCpu;
        $pro->pro_details->ram = $rq->txtRam;
        $pro->pro_details->screen = $rq->txtScreen;
        $pro->pro_details->vga = $rq->txtVga;
        $pro->pro_details->storage = $rq->txtStorage;
        $pro->pro_details->case = $rq->txtCase;
        $pro->pro_details->note = $rq->note;
        $pro->pro_details->os = $rq->txtOs;
       /* if ($rq->txtSIM =='') {
            $pro->pro_details->sim= 'Không có';
        } else {
            $pro->pro_details->sim = $rq->txtSIM;
        }
       
        if ($rq->txtPin =='') {
            $pro->pro_details->pin= 'Không có';
        } else {
            $pro->pro_details->pin = $rq->txtPin;
        }
        $pro->pro_details->os = $rq->txtOs;
        $pro->pro_details->updated_at = new datetime;        */

        if ($rq->hasFile('txtdetail_img')) {
            $detail = ProDetails::where('pro_id',$id)->get();
            $df = $rq->file('txtdetail_img');
            foreach ($detail as $row) {                
               $dt = ProDetails::find($row->id);
               $pt = public_path('uploads/products/details/').$dt->images_url; 
               // dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
            foreach ($df as $row) {
                $img_detail = new ProductImages();
                if (isset($row)) {
                    $name_img= time().'_'.$row->getClientOriginalName();
                    $img_detail->images_url = $name_img;
                    $img_detail->pro_id = $id;
                    $img_detail->created_at = new datetime;
                    $row->move('uploads/products/details/',$name_img);
                    $img_detail->save();
                }
            }
        }
   /* $pro->pro_details->save();*/
    return redirect('admin/sanpham/all')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã lưu !']);       
    }
}
