<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 14/09/2018
 * Time: 7:03 AM
 */
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model{
    protected $table = 'category_news';
    protected $guarded =[];
    public function news(){
        return $this->hasMany('App\Model\News','cat_id','id');
    }
}