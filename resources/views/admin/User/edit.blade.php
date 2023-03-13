{{-- form edit
@extends('layout.master')

@section('title',' Sửa')

@section('content-title','Sửa')

@section('content')



<form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Tên User</label>
        <input class="form-control" name="name" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" name="email" value="{{ $user->email }}">
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input class="form-control" name="password" value="{{ $user->password }}">

    </div>
 <div class="form-group">
    <label for="">Mã User</label>
    <input class="form-control" name="user_name" value="{{ $user->user_name }}">

 </div>
    <div class="form-group">
        <label for="">Birthday</label>
        <input type="date" name="birthday" class="form-control" value="{{ $user->birthday }}">

    </div>
    <div>
        <label for="">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" >
    </div>
    <div>
        <label for="">Ảnh </label>
        <input type="file" name="avatar" class="form-control">
        @if(isset($user)&&$user->avatar)
        <img src="{{asset($user->avatar)}}" width="100px" height="100px" alt="{{$user->avatar}}">
        @endif
    </div>
    <div class="form-group">
        <label for="">Phòng Ban</label>
        <select name="room_id" class="form-control" value="{{ $user->room_id }}">
            @foreach($room_list as $room)
            <option value="{{$room->id}}">{{$room->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Trạng Thái</label>
        <select name="status" class="selectpicker" value="{{ $user->status }}">
            <option value="1" name = "role">1</option>
            <option value="0" name = "role">0</option>
        </select>



    </div>
    <div class="form-group">
        <label>Quyền</label>
        <select class="selectpicker" name="role" value = "{{ $user->role }}">
            <option value="1">Admin</option>
            <option value="2">User</option>
            <option value="3">Nhân viên</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
@endsection


 --}}
