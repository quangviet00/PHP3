@extends('admin.master')

@section('title', ' Quản Lý Người Dùng')

@section('content-title', 'Quản Lý Người Dùng')

@section('content')
    {{-- <a href="{{route('user.add')}}">Thêm</a> --}}
    {{-- chỉ user có role = 1 mới được thêm --}}
    {{-- @if (Auth::user()->role == 1)
<a href="{{route('user.add')}}">Thêm</a>
@endif --}}


    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên Nhân Viên</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Quyền</th>
                <th>Thao Tác</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($user_list as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->ten }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->trangthai == '0' ? 'Hoạt động' : 'Không hoạt động' }}</td>
                    <td>{{ $user->quyen == '0' ? 'ADMIN' : 'Nhân viên' }}</td>
                    
                        <td> <a href="" class="btn btn-primary"><i class="fa fa-edit"></i>
                                Sửa</a></td>
                        <td>

                            <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class='btn btn-danger'>Xoá</button>
                            </form>
                        </td>
                 


                </tr>
            @endforeach

        </tbody>
    </table>


@endsection
