<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$view_title}}</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;


    }
</style>
<body>
    @extends('layout.master')
    @section('content')
    <table class="table table-hover " border="1">
        <thead>
          <tr>

            <th scope="col">Họ tên</th>
            <th scope="col">Tuổi</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user_list as $item)
                 <tr>

            <td>{{$item['name']}}</td>

            <td>{{$item['age']}}</td>
            <td>{{$item['address']}}</td>
            @if ($item['status'] === 1){
                 <td> kích hoạt</td>
            }@else
            <td>Không kích hoạt</td>

            @endif

            {{-- <td>{{$item['status']? 'kích hoạt':'không kích hoạt'}}</td> --}}

          </tr>
            @endforeach


        </tbody>
      </table>

    @endsection
</body>
</html>
