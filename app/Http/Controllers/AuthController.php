<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
	public function __construct()
    {
        $this->middleware('check')->except(['getLoginAdmin','postLoginAdmin']);
    }
	public function getLoginAdmin(){
		return view('auth.loginadmin');
	}
	public function postLoginAdmin(Request $request){
		$name = $request->name;
		$password = $request->password;
		if (Auth::guard('admin')->attempt(['name'=>$name, 'password'=>$password])) {
			return redirect('admin');
		}
		else {
			return back()->with('section',"nhập lại thông tin");
		}
	}
	public function logout_admin(){
		Auth::guard('admin')->logout();
		return redirect('login');
	}
}
