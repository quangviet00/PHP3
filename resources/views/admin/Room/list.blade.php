
{{-- list room --}}
@extends('layout.master')
@section('title',' Quản Lý Phòng')


@section('content-title','Quản Lý Phòng')


@section('content')
<a href="#">Thêm</a>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên Phòng Ban</th>
            <th>Nhân Viên</th>
            <th>Thao Tác</th>
        </tr>

    </thead>
    <tbody>
        @foreach($room_list as $item)
        <tr>
             <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
            <ul>
                @foreach($item->user_list as $user)
                <li>{{$user->name}}</li>
                @endforeach
            </ul>
        </td>
        <td>
            <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</a>
      <form action="{{route('room.delete',$item->id)}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger "> <i class="fa fa-trash"></i> Xóa</button>

        </form>

        </td>

        </tr>

@endforeach
<tr>
    <td colspan="3">
        <div class="flex">
            {{ $room_list->links() }}
        </div>
    </td>
</tr>

</tbody>
</table>

@endsection



