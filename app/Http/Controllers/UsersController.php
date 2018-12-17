<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 25/07/2018
 * Time: 7:55 PM
 */
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller{
    public function index(){
        $user = User::orderBy('id')->paginate(20);
//        echo "<pre>";
//        print_r($user->toArray());die;
        return view('backend.page.users.index',['users'=>$user]);
    }
    public function getEdit($id){
        $user = User::find($id);
        return view('backend.page.users.edit',['user'=>$user]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'full_name'=>'required|min:3|max:100',
            'email'=>'required|min:3|max:100|email',
            'phone'=>'numeric',
        ],[
            'full_name.required'=>'Bạn chưa nhập họ tên',
            'full_name.min'=>'Họ tên phải từ 3 ký tự trở lên',
            'full_name.max'=>'Họ tên tối đa là 100 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.min'=>'Email phải từ 3 ký tự trở lên',
            'email.max'=>'Email tối đa là 100 ký tự',
            'email.email'=>'Email không đúng định dạng',
            'phone.numeric'=>'Số điện thoại không đúng định dạng',
        ]);
        $user = User::find($id);
        $user->username = $request->txtUserName;
        $user->email = $request->txtEmail;
        $user->phone = $request->txtPhone;
        $user->address = $request->txtAddress;

        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin\users\list')->with('status','Bạn Đã Cập Nhật Thành Công');
    }
    public function delete($id){

        $user = User::find($id);
        $user->delete();
        return redirect('admin\users\list')->with('status','Bạn Đã Xóa Thành Công');
    }
}