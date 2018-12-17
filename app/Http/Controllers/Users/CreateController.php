<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 1:04 PM
 */
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\User;

class CreateController extends Controller{
    public function index(){
        $user = User::all();
        return view('backend.page.users.create',['users'=>$user]);
    }
}