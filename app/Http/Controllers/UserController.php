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

        // $users = User::all();
        // $users=User::select('id', 'name', 'birthday','avatar', 'user_name', 'email','room_id')
        // $user=User::find(9);
        // $room = $user->room;
        // dd($room,$user);

        //cha con cùng bảng
        $room = Room::find(3);
        $roomChildren = $room->children;

         $users=User::select('id', 'name', 'birthday','avatar', 'user_name', 'email','room_id')
         ->where('id','>',3)
         ->with('room')

        // ->where('id', '>', 3)// (tên trường , toán tử điều kiện , giá trị   )
        // ->Where('id', '<=', 10)// (tên trường , toán tử điều kiện , giá trị   )
        ->paginate(7);
        // ->cursorPaginate(6);


// dd($users);
        return view('admin.user.list', ['user_list' => $users]);
    }
    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        if($id){
            $users = User::find($id);
            $users->delete();
            return redirect()->back();
        }
        // $users = User::find($id);

        // $users->delete();
        // return redirect()->route('user.list');

    }
    public function edit($id){
        $users = User::find($id);
        $users->birthday = date('Y-m-d', strtotime($users->birthday));
        $rooms = Room::all();

        return view('admin.user.edit', ['user' => $users],
        ['room_list' => $rooms]);
    }
    public function update( UserUpdateRequest $request, $id){
        $users = User::find($id);
        $users->name = $request->name;
        $users->birthday = $request->birthday;
        $users->user_name = $request->user_name;
        $users->email = $request->email;
        $users->room_id = $request->room_id;


        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->user_name.'-'.$avatarName;
          //    dd( $avatar->storeAs('images',$avatarName));
          $users->avatar = $avatar ->storeAs('images/users',$avatarName);

          }
        //   else
        //   {
        //       $users->avatar = '';
        //   }
          $users->save();


// dd($users,$request->all());
        return redirect()->route('user.list');
    }
    public function add(){
        $rooms = Room::Select('id', 'name')->from('rooms')->get();
        return view('admin.user.add',[
            'room_list' => $rooms

        ]);
    }


    public function store(Request $request){
        //0.định nghĩa các điều kiện dữ liệu phù hợp để kiểm tra
        $request->validate([
            'name' => 'required|min:6|max:32',
            'birthday' => 'required|date',
            'user_name' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
            'room_id' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //Nếu k đáp ứng các điều kiện trên rhud quay lại form kèm theo thông báo lỗi
        //thoát hà và quay lại form với thông báo lỗi
        // nếu đáp ứng dk qqu=iều kiện thì sẽ chạy tiếp xuống code bên dưới


        // Kiểm tra xem dữ liệu từ client gửi lên bao gốm những gì
        // dd($request->all());
        $users = new User();
        // gán dữ liệu gửi lên vào biến data
        // $data = $request->all();
        $users -> fill($request->all());
       if($request->hasFile('avatar')){
          $avatar = $request->avatar;
          $avatarName = $avatar->hashName();
          $avatarName = $request->user_name.'-'.$avatarName;
        //    dd( $avatar->storeAs('images',$avatarName));
        $users->avatar = $avatar ->storeAs('images/users',$avatarName);

        }else
        {
            $users->avatar = '';
        }
        $users->save();

        // mã hóa password trước khi đẩy lên DB
        $data['password'] = Hash::make($request->password);

        // Tạo mới user với các dữ liệu tương ứng với dữ liệu được gán trong $data

        echo"success create user";
        return redirect()->route('user.list');
    }
    //lab: thục hiện chwusc năng chỉnh sửa , method: put , có dữ liệu của user để chỉnh sửa

}
