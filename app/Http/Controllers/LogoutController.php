<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 23/07/2018
 * Time: 9:23 PM
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller {
    public function getIndex(){
           Auth::logout();
            return redirect('admin/login');

    }

}
