@extends('admin.master')

@section('title',' Sửa')

@section('content-title','Sửa')

@section('content')
<form action="{{ route('admin.new.update', $new->id) }}" method="post" enctype="multipart/form-data">
    <input type="hidden" value="PUT" name="_method" />
    @csrf
    <div class="form-group">
        <label for="">Tiều đề</label>
        <input type="text" class="form-control" name="tieude" id="" value="{{ $new->tieude }}">
    </div>

    <div class="form-group">
        <label for="">Nội dung</label>
        
        <textarea  name="noidung" cols="30" rows="10" value="{{ $new->noidung }}">{{ $new->noidung }}</textarea>

    </div>
    <div class='form-group'>
        <label for="">Ảnh đại diện</label>
        <input type="file" name='anh' class='form-control' value="{{ $new->anh }}">
       
    </div>
   
  
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
