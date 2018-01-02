<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLoginAdmin()
    {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('manager_student.index');
        }
        else{
            return view('auth.login_admin');
        }
    }

    public function postLoginAdmin(LoginAdminRequest $request)
    {
        $name = $request->name;
        $password = $request->password;
        if (Auth::guard('admin')->attempt(['name' => $name, 'password' => $password])) {
            return redirect()->route('manager_student.index');
        } else {
            return back()->withErrors(['error'=>'messages.error-login-admin']);
        }
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('get_login');
    }
}
