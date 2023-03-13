@extends('admin.master')

@section('title', ' Tin Tức')

@section('content-title', 'Tin Tức')


@section('content')
    <div class='my-3'>
        <a href="{{ route('admin.new.create') }}">
            <button class='btn btn-success'>Thêm tin</button>
        </a>
    </div>
    <h1>Danh sách đăng tin</h1>


   
   
    <table class="table table-hover ">
        <thead>
            <tr>
                <th scope="1">ID</th>
                <th scope="col">Tên bài viết</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ảnh tin tức</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($new_list as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tieude }}</td>
                    <td>{{ $item->noidung }}</td>
                    <td><img src="{{ asset($item->anh) }}" alt="" width="100"></td>

                    <td>{{ $item->trangthai == '0' ? 'Đã duyệt' : 'Chưa duyệt' }}</td>
                    <td>
                        <a href="{{ route('admin.new.detail', $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-eye-fill"
                                viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg></a>
                    </td>
               
                        <td> <a href="{{ route('admin.new.edit', $item->id) }}" class="btn btn-primary"><i
                                    class="fa fa-edit"></i>
                                Sửa</a>
                            <form action="{{ route('admin.new.delete', $item->id) }}" method="post">
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
