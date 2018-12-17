<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='category';
    protected $guarded =[];
	public $status_option = [
	    '0'=>'',
	    "1"=>'Mới',
	    "2"=>"Nổi Bật",
        "3"=>"Mặc Định"
    ];

    public $fillable = ['name','parent_id'];


	public function products()
	{
		return $this->hasMany('App\Model\Products','cat_id');
	}
    public function news(){
	    return $this->hasMany('App\Model\News','cat_id');
    }

    public function parents()
    {
        return $this->belongsTo('App\Model\Category', 'parent_id');
    }
    public function getParentsNames() {
        if($this->parent) {
            return $this->parent->getParentsNames(). " > " . $this->name;
        } else {
            return $this->name;
        }
    }
    public function children()
    {
        return $this->hasMany('App\Model\Category', 'parent_id');
    }
}
