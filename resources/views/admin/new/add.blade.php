
    @extends('admin.master')
    @section('content')
    <form action="{{route('admin.new.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tiều đề</label>
            <input type="text" class="form-control" name="tieude" id="">
        </div>

        <div class="form-group">
            <label for="">Nội dung</label>
            
            <textarea class="form-control" name="noidung" cols="30" rows="10"></textarea>
        </div>
        <div class='form-group'>
            <label for="">Ảnh đại diện</label>
            <input type="file" name='anh' class='form-control'>
          
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    @endsection
