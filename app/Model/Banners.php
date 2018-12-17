<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = "banners";
    public $status_option = array(
        'su_dung'=>'Sử Dụng',
        'dong'=>'Đóng'
    );
}
