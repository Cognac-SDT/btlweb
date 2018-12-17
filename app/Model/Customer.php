<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 18/08/2018
 * Time: 11:01 PM
 */
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $table = 'customer';
    public function order(){
        return $this->hasMany('App\Model\Orders','c_id');
    }
}