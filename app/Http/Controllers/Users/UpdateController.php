<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 1:37 PM
 */
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UpdateController extends Controller{

    public function index(Request $request){
        $id=$request->input('id');
//        $submit = $request->input('submit');
        $user=User::find($id);
        $this->validate($request,[

            'email'=>'required|min:6|max:100|email|unique:users,email',
            'password'=>'required|min:6|max:100',
            'passwordAgain'=>'required|same:password',
            'phone'=>'numeric',
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'email.min'=>'Email phải từ 3 ký tự trở lên',
            'email.max'=>'Email tối đa là 100 ký tự',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải từ 3 ký tự trở lên',
            'password.max'=>'Mật khẩu tối đa 100 ký tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Nhập lại mật khẩu chưa đúng',
            'phone.numeric'=>'Số điện thoại không đúng định dạng',
        ]);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->phone = $request->phone;
        $user->status = 1;
        $user->address = $request->address;
        $user->save();
        return redirect('admin/nguoi-dung/danh-sach')->with('status','Sửa Thành Công Người Dùng');

    }
}