@extends('layout.master')

@section('title',' Sửa')

@section('content-title','Sửa')

@section('content')
<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="">Tên Sản phẩm</label>
        <input type="text" class="form-control" name="name" id="" value="{{ $product->name }}">
    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="number" class="form-control" name="price" id="" value="{{ $product->price }}">
    </div>
    <label for="">Ảnh </label>
    <input type="file" name="img" class="form-control">
    @if(isset($product)&&$product->avatar)
    <img src="{{asset($product->avatar)}}" width="100px" height="100px" alt="{{$product->avatar}}">
    @endif
    <div class="form-group">
        <label for="">Status</label>
        <select name="status" class="selectpicker" value = "{{$product->status}}">
            <option value="1" name = "role">1</option>
            <option value="0" name = "role">0</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
