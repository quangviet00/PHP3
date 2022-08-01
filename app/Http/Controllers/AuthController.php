<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getlogin()
    {
        return view('auth.login');
    }
    public function postlogin(LoginRequest $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
//attempt sẽ có key là tên cột trong db , value sẽ lấy từ form
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('user.list');
        } else {
            return redirect()->back()->with('thongbao', 'Đăng nhập không thành công');
        }




    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
