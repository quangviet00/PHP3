@extends('auth.auth')

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
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="{{route('auth.login')}}" method="post">
                @csrf
                <span class="login100-form-title p-b-43">
                    Login to continue
                </span>


                {{-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div> --}}
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

                    <input type="email" class="input100" id="email" name="email"  value="{{old('email')}}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" id="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                    @error('password')

                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div> --}}

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                        <a href="/auth/register">
                            <i class="fa fa-facebook-official">Đăng ký ??</i>

                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        or sign up using
                    </span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('../../images/bg2.jpg');">
            </div>
        </div>
    </div>
</div>
{{-- <div>
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
@endsection --}}
