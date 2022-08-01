@extends('layout.master')
@section('title','Đăng ký thông tin')

@section('content')
    {{-- form đăng nhập --}}
    <form action="./register-success" method="get">
        <div class="form-group">
            <label for="">Họ tên</label>
            <input type="text" class="form-control" name="name" id="">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="">
        </div>
        {{-- <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="img"  class = "form-control"id="">
        </div> --}}
        <div class="form-group">
            <label for="">PassWord</label>
            <input type="password" class="form-control" name="password" id="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    @endsection
