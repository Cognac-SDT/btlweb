<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 23/07/2018
 * Time: 7:25 PM
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class AdminController extends Controller{

    public function getIndex(){
        return view('backend.page.index');
    }
}