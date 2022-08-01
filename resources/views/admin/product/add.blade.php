
    @extends('layout.master')
    @section('content')
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Tên Sản phẩm</label>
            <input type="text" class="form-control" name="name" id="">
        </div>

        <div class="form-group">
            <label for="">Giá</label>
            <input type="number" class="form-control" name="price" id="">
        </div>
        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="img"  class = "form-control"id="">

        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="selectpicker">
                <option value="1" name = "role">1</option>
                <option value="0" name = "role">0</option>
            </select>



        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    @endsection
