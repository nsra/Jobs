<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Session;
use Illuminate\Support\Facades\Hash;
class HomeController extends BaseController
{
    public function index(){
        return view("admin.home.index");
    }
    
    public function changepassword()
    {
        return view('admin.home.changepassword');
    }
    
    //post
    public function postChangepassword(ChangePasswordRequest $request){
		
		//المستخدم اللي عامل دخول
		$user = \Auth::user();
		
		if($this->IsValidOldPassword($request->input("oldpassword")))
		{
			$user->password=Hash::make($request['password']);
			$user->save();			
			Session::flash("msg","s:تمت عملية تغيير كلمة المرور بنجاح");
			return redirect("/admin/home/changepassword");
		}
		else
		{			
			Session::flash("msg","e:كلمة المرور الحالية غير صحيحة");
			return redirect("/admin/home/changepassword");
		}
	}
    
    
	function IsValidOldPassword($password)
	{
		$user = \Auth::User();
		
		$credentials2 = ['email' => $user->email, 
			'password' => $password];

		if (\Auth::validate($credentials2)) {
			return 1;
		}
		else
			return 0;
	}
}