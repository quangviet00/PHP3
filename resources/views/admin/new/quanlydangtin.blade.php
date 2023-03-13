@extends('admin.master')

@section('title', ' Tin Tức')

@section('content-title', 'Tin Tức')


@section('content')
    <div class='my-3'>
        <a href="{{ route('admin.new.create') }}">
            <button class='btn btn-success'>Thêm tin</button>
        </a>
    </div>
    <h1>Danh sách tin tức đang chờ duyệt</h1>


    <form action="" class="form-inline" role="form">
        <div class="form-group">
            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Nhập từ khóa">
        </div>
        <button type="submit" class="btn btn-primary"> Tìm kiếm</button>
    </form>
    <br>
    <table class="table table-hover ">
        <thead>
            <tr>
                <th scope="1">ID</th>
                <th scope="col">Tên bài viết</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ảnh tin tức</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Nghiệp vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($new_list as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tieude }}</td>
                    <td>
                        <p
                            style="
                                                    
                            white-space: nowrap; 
                            width: 250px; 
                            overflow: hidden;
                            text-overflow: ellipsis; 
                         ">
                            {{ $item->noidung }}
                        </p>
                    </td>
                    <td><img src="{{ asset($item->anh) }}" alt="" width="100"></td>


                    <td>
                        @if ($item->trangthai == 0)
                            <a href="{{ route('admin.new.status', $item) }}"><button class="btn btn-primary"
                                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi không')">Đã duyệt</button></a>
                        @else
                            <a href="{{ route('admin.new.status', $item) }}"><button class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi không')">Chưa duyệt</button></a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.new.detail', $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-eye-fill"
                                viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg></a>
                    </td>

                    <td>
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
