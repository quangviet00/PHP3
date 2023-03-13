<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Image;
use Carbon\carbon;

class UserController extends Controller


{

    public function index()
    {

        $user = User::get();
        // dd($user);
        return view('admin.user.list', [
            'user_list' => $user
        ]);
    }
    public function delete(Request $request)
    {
        // Tìm đến đối tượng muốn xóa
        User::destroy($request->id);
        return redirect()->back();
    }
    public function edit($id)
    {
    }
   
}
