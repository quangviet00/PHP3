@extends('admin.auth.auth')

@section('title', ' Đăng Nhập')

@section('content-title', 'Đăng Nhập')

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập để bắt đầu phiên của bạn</p>

                <form action="{{ route('auth.postLogin') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    @if ($errors->has('email'))
                        <span>{{ $errors->first('email') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="password" name="password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @if ($errors->has('password'))
                        <span>{{ $errors->first('password') }}</span>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Nhớ tôi
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>Đăng nhập bằng tài khoản Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>Đăng nhập bằng tài khoản Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{ asset('/') }}">Home</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('auth.getRegister') }}" class="text-center">Đăng ký thành viên mới</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
