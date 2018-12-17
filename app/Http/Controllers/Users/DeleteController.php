<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 1:09 PM
 */
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\User;

class DeleteController extends Controller{
    public $_user;

    public function __construct(User $user){
        $this->_user=$user;
    }
    public function index($id){
        $this->_user->find($id)->delete();
        return redirect()->route('users.index');
    }
}