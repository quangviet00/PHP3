

    @extends('layout.master')
    @section('title','Đăng ký thông tin')

@section('content')
  <div class="container">
      <h1>Đăng ký thành công</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Tên</th>
          <th scope="col">Email</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Mật khẩu</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>{{$name}}</td>
            <td>{{$email}}</td>

            <td>{{$password}}</td>

          </tr>
      </tbody>
    </table>
  </div>

</body>

@endsection
