<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 12:42 PM
 */
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller{
    public function index(){
        $user = User::orderBy('id','asc')->paginate(20);
        return view('backend.page.users.index',['users'=>$user]);
    }
}