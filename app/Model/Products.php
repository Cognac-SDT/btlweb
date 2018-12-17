<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
   	protected $table ='products';
	protected $guarded =[];
	public $status_option = [
	    '0'=>'Mặc Định',
        '1'=>'Giảm Giá',
        '2'=>'Mới'

    ];
    public $status_pro_option = [
        "0"=>"Liên Hệ",
        "1"=>"Còn Hàng"
    ];
    protected $fillable = ['name'];
	public function category()
	{
		return $this->belongsTo('App\Model\Category','cat_id');
	}
	public function pro_details()
    {
        return $this->hasOne('App\Model\ProDetails','pro_id');
    }
    public function product_img()
    {
        return $this->hasMany('App\Model\ProductImages','pro_id');
    }
    public function oders_detail()
    {
        return $this->hasOne('App\Model\Orders_detail','pro_id');
    }
    public function manufacturer(){
	    return $this->belongsTo('App\Model\Manufacturer','manufacturer_id');
    }

    // tính phần trăm giảm giá
    public function getSale(){
	    if($this->promotion_price != 0 || !empty($this->promotion_price))
	        return 100*($this->unit_price - $this->promotion_price)/($this->unit_price);
        else return 0;
    }
}
