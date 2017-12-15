<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function __construct()
    //    {
    //        $this->middleware('check')->except(['getLoginAdmin','postLoginAdmin']);
    //    }
    public function getLoginAdmin()
    {
        return view('auth.login_admin');
    }

    public function postLoginAdmin(LoginAdminRequest $request)
    {
        $name = $request->name;
        $password = $request->password;
        if (Auth::guard('admin')->attempt(['name' => $name, 'password' => $password])) {
            return redirect()->route('manager_student.index');
        } else {
            return back()->with('sucsess', "nhập lại thông tin");
        }
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('get_login');
    }
}
