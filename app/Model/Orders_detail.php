<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders_detail extends Model
{
    protected $table ='oder_detail';
	protected $guarded =[];

	 public function orders()
    {
        return $this->belongsTo('App\Model\Orders','o_id');
    }

    public function products()
    {
        return $this->hasOne('App\Model\Products','pro_id');
    }

}
