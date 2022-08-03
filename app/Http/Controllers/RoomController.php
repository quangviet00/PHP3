<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;


class RoomController extends Controller
{
    //
    public function index(){
        $rooms = Room::with('users')->paginate(5);
        if ($keyword = request('keyword')) {
            $rooms = Room::with('users')->where('name','like','%'.$keyword.'%')->paginate(5);
        }


        return view('admin.room.list', ['room_list' => $rooms]);
    }
    public function delete($id){
        $rooms = Room::all();
        if($id){
            $rooms = Room::find($id);
            $rooms->delete();
            return redirect()->back();
        }
        return view('admin.room.delete', ['room_list' => $rooms]);
    }

}
