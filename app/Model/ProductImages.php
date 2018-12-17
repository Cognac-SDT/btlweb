<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 5/08/2018
 * Time: 9:48 AM
 */
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends  Model{
    protected $table = "detail_img";
    public $status_option = ['0'=>'Ảnh Nổi Bật','1'=>'Ảnh mặc định'];
    public function products()
    {
        return $this->belongsTo('App\Model\Products','pro_id');
    }

}