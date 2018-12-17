<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 23/07/2018
 * Time: 8:54 PM
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller{

    public function getIndex(){

        return view('backend.login');
    }
    public function postLogin(Request $request){
//        echo "<pre>";print_r($request->toArray());die;
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:3|max:100',
        ],[
            'email.required'=>'Bạn chưa nhập tài khoản email',
            'email.email'=>'Email chưa đúng định dạng',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 3 ký tự',
            'password.max'=>'mật khẩu tối đa 100 ký tự',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/index');
        }
        else
        {
            return redirect('admin/login')->with('status_danger','Tài khoản hoặc mật khẩu không đúng');
        }
    }
}