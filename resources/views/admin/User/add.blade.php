{{-- form thêm --}}
@extends('layout.master')

@section('title',' Thêm Mới')

@section('content-title','Thêm Mới')

@section('content')
@if ($errors->any())
@php

@endphp
<div class="alert alert-danger">
    <ul class="danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

@endif
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm User
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form  action="{{ route('user.store') }}"   method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên User</label>
                                <input class="form-control" name="name" placeholder="Nhập tên User">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" name="password" placeholder="Nhập mật khẩu">
                            </div>
                         <div class="form-group">
                            <label for="">Mã User</label>
                            <input class="form-control" name="user_name" placeholder="Nhập mã user">

                         </div>
                            <div class="form-group">
                                <label for="">Birthday</label>
                                <input type="date" name="birthday" class="form-control" placeholder="Nhập ngày sinh">
                            </div>
                            <div>
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                            </div>
                            <div>
                                <label for="">Ảnh </label>
                                <input type="file" name="avatar" class="form-control" placeholder="Nhập ảnh">
                            </div>
                            <div class="form-group">
                                <label for="">Phòng Ban</label>
                                <select name="room_id" class="form-control">
                                    @foreach($room_list as $room)
                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng Thái</label>
                                <select name="status" class="selectpicker">
                                    <option value="1" name = "role">1</option>
                                    <option value="0" name = "role">0</option>
                                </select>



                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="selectpicker" name="role">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
  @endsection

