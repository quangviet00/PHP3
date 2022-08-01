@extends('layout.master')

@section('title',' Quản Lý Người Dùng')

@section('content-title','Quản Lý Người Dùng')

@section('content')
<a href="{{route('user.add')}}">Thêm</a>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Mã Nhân Viên</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>

            <th>Email</th>
            <th>Avatar</th>
            <th>Phòng Ban</th>
            <th>Thao Tác</th>
        </tr>

    </thead>
    <tbody>
        @foreach($user_list as $user)
        <tr>
             <td>{{$user->id}}</td>
             <td>{{$user->user_name}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->birthday}}</td>


        <td>{{$user->email}}</td>
        <td><img src="{{asset($user->avatar)}}"  width="100px" height="100px" alt=""></td>
        <td>{{$user->room->name}}</td>
        <td>
            <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</a>
      <form action="{{route('user.delete',$user->id)}}" method="post">
        @csrf
        @method('delete')
<button class="btn btn-danger "> <i class="fa fa-trash"></i> Xóa</button>
        {{-- <a href="/user/delete/{{ $user->id }}" class="btn btn-danger" ><i class="fa fa-trash"></i>Delete</a> --}}

      </form>


        </tr>
        @endforeach

    </tbody>
</table>
<div class="flex">
    {{ $user_list->links() }}
</div>

@endsection

