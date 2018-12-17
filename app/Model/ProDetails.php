<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProDetails extends Model
{
    protected $table ='pro_details';
	protected $guarded =[];
	public function product(){
	    return $this->hasOne('App\Model\Products','pro_id','id');
    }
}
