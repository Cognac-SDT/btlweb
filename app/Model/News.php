<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table ='news';
	protected $guarded =[];
    public $status_option =[
        '0'=>'Mặc Định',
        '1'=>'Mới',
        '2'=>'Nổi Bật'
   ];
    public function users(){
        return $this->hasMany('App\User','user_id','id');
    }
	public function category_news()
	{
		return $this->belongsTo('App\Model\CategoryNews','cat_id','id');
	}
}
