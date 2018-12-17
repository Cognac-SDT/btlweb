<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 28/07/2018
 * Time: 8:35 AM
 */
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model {
    protected $table = "manufacturers";
    public $status_option = array("0"=>"Mặc Định","1"=>"Mới","2"=>"Nổi Bật");
    public function product(){
        return $this->hasMany('App\Model\Products','manufacturer_id','id');
    }
}