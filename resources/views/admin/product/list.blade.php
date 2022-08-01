
    @extends('layout.master')
    @section('content')
    <h1>List sản phâm</h1>
    <div><a href="{{route('product.add')}}">Thêm</a></div>
    <br />
<form action="" class="form-inline" role="form">
    <div class="form-group">
        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Nhập từ khóa">
    </div>
    <button type="submit" class="btn btn-primary"> Tìm kiếm</button>
</form>
    <table class="table table-hover " border="1">
        <thead>
          <tr>
            <th scope="1">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá</th>
            <th scope="col">Avatar</th>
            <th scope="col">status</th>
          </tr>
        </thead>
        <tbody>
                @foreach ($product_list as $item)
                <tr>
                    <td>{{$item->id}}</td>

           <td>{{$item->name}}</td>

           <td>{{$item->price}}</td>
           <td><img src="{{$item->img}}" alt="" width="250px"></td>

            <td>
                <select name="" id="" disabled="disabled">
                    <option value="1" {{$item->status == 1 ? 'selected' : ''}}>Còn hàng</option>
                    <option value="0" {{$item->status == 0 ? 'selected' : ''}}>Hết hàng</option>

                </select>
                @if ($item->status == 1)
                <a href="{{ route('product.update-status', ['id'=>$item->id]) }}" class="btn btn-primary">kích hoạt</a>

                @else
                <a href="{{ route('product.update-status', ['id'=>$item->id]) }}" class="btn btn-warning" >Không kích hoạt</a>
                @endif
            </td>

              <td> <a href="{{route('product.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Sửa</a></td>
                <td>  <form action="{{route('product.delete',$item->id)}}" method="post">
                    @csrf
                    @method('delete')
            <button class="btn btn-danger "> <i class="fa fa-trash"></i> Xóa</button>
                    {{-- <a href="/user/delete/{{ $user->id }}" class="btn btn-danger" ><i class="fa fa-trash"></i>Delete</a> --}}

                  </form></td>

         </tr>
           @endforeach
            <tr>
                <td colspan="5">{{$product_list->links()}}</td>

            </tr>
        </tbody>
    </table>

  @endsection

