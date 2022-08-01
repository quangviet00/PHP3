@extends('layout.master')

@section('title',' Quản Lý Người Dùng')

@section('content-title','Quản Lý Người Dùng')

@section('content')
<button class="btn btn-success"><i class="fa fa-add"></i> Thêm</button>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Status</th>

            <th>Thao Tác</th>
        </tr>

    </thead>
    <tbody>
        @foreach($position_list as $positions)
        <tr>
             <td>{{$positions->id}}</td>
        <td>{{$positions->name}}</td>
        <td>{{$positions->status}}</td>

        <td><button class="btn btn-primary"><i class=" fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger"><i class="fa fa-trash"></i> Trash</button></td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection

