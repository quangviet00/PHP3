@extends('layout.master')

@section('title',' Đăng Nhập')

@section('content-title','Đăng Nhập')

@section('content')

<div>
    @if($errors->any())
     <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
     </ul>
    @endif
</div>

<form action="{{route('auth.login')}}" method="post">
   @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>

</form>
@endsection
