<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Models\Room;
use App\Models\User;
use App\Models\Position;
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

        //phân quyền admin với role = 0 mới đăng nhập được
        // if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 0])) {
        //     return redirect()->route('admin.index');
        // } else {
        //     return redirect()->back()->with('thongbao', 'Đăng nhập không thành công');
        // }




    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
    //đăng ký
    public function getRegister()
    {  $rooms = Room::Select('id', 'name')->from('rooms')->get();
        $positions = Position::Select('id', 'name')->from('positions')->get();
        return view('auth.register',['room_list' => $rooms,
            'position_list' => $positions]);
    }
    public function postregister(Request $request)
    {

        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->user_name = $data['user_name'];
        $user->phone = $data['phone'];
        $user->birthday = $data['birthday'];
        $user->room_id = $data['room_id'];
        $user->role = $data['role'];
        $user->status = $data['status'];


        $user->password = bcrypt($data['password']);
        $user->save();
        return redirect()->route('auth.login');
    }
    //update role
    public function getUpdateRole($id)
    {
        $user = User::find($id);
        $user->role = 1;
        $user->save();
        return redirect()->route('user.list');
    }

}
