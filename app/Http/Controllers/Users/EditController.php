<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 1:06 PM
 */
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\User;

class EditController extends Controller{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index($id){
        $user = User::find($id);
        return view('backend.page.users.edit',['user'=>$user]);
    }
}