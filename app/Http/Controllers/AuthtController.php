<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthtController extends Controller
{


    public function getLogin()
    {
        
        return view('admin.auth.login');
    }
    public function postLogin(LoginRequest $request)
    {
        $data = $request->all();
       
        $email = $data['email'];
        $password = $data['password'];
      
    //    $a = Auth::attempt(['email' => $email, 'password' => $password]);
    //    dd($email);   
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // dd('đăng nhập thành công');
            return redirect()->route('admin.new');
        }

//  dd(1);
        return redirect()->route('auth.getLogin');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.getLogin');
    }
    public function getRegister()
    {
        return view('admin.auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->ten = $request->ten;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->trangthai = 1;
        // dd($user);
        $user->save();
        return redirect()->route('auth.getLogin');
    }
}
