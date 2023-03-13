@extends('admin.auth.auth')
{{-- đăng ký --}}
@section('title',' Đăng Ký')


@section('content-title','Đăng Ký')


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

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{route('auth.getRegister')}}" method="post">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Đăng Ký
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="text" name="ten" id="name" value="{{old('ten')}}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Tên</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="email" name="email" value="{{old('email')}}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="matkhau" name="matkhau">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Mật Khẩu</span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Đăng Ký
                        </button>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('../../images/bg2.jpg');">
                </div>
            </div>
        </div>
    </div>
@endsection








