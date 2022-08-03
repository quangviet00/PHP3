@extends('layout.master')

@section('title',' Quản Lý Người Dùng')

@section('content-title','Quản Lý Người Dùng')

@section('content')
{{-- <a href="{{route('user.add')}}">Thêm</a> --}}
{{-- chỉ user có role = 1 mới được thêm --}}
@if(Auth::user()->role == 1)
<a href="{{route('user.add')}}">Thêm</a>
@endif


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
            <th>Quyền</th>
            @if(Auth::user()->role == 1)
            <th>Thao Tác</th>
            @endif

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
        <td><select name="{{$user->role}}" id="">
            <option value="1" {{$user->role == 1 ? 'selected' : ''}}>Admin</option>
            <option value="2" {{$user->role == 2 ? 'selected' : ''}}>Nhân Viên</option>
            <option value="3" {{$user->role == 3 ? 'selected' : ''}}>Khách Hàng</option>

        </select></td>

        @if(Auth::user()->role == 1)
        <td>
            <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</a>
      <form action="{{route('user.delete',$user->id)}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger "> <i class="fa fa-trash"></i> Xóa</button>

        {{-- <a href="/user/delete/{{ $user->id }}" class="btn btn-danger" ><i class="fa fa-trash"></i>Delete</a> --}}

      </form>
        </td>
        @endif


        </tr>
        @endforeach

    </tbody>
</table>
<div class="flex">
    {{ $user_list->links() }}
</div>

@endsection

