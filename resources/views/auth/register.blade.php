@extends('auth.auth')
{{-- đăng ký --}}
@section('title',' Đăng Ký')


@section('content-title','Đăng Ký')


@section('content')


{{-- <div>
    @if($errors->any())
     <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
     </ul>
    @endif
</div> --}}

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{route('auth.register')}}" method="post">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Đăng Ký
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="text" name="name" id="name" value="{{old('name')}}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Tên</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="text" name="user_name" id="user_name" value="{{old('use_name')}}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Mã Nhân Viên</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="email" name="email" value="{{old('email')}}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Mật Khẩu</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="password" name="password_confirmation">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Xác Nhận Mật Khẩu</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="number" name="phone">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Sđt</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <input class="input100" type="date" name="birthday">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Ngày Sinh</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <label for="">Phòng Ban</label>
                        <select name="room_id" class="form-control">
                            @foreach($room_list as $rooms)
                            <option value="{{$rooms->id}}">{{$rooms->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <label>Quyền</label>
                        <select class="selectpicker" name="role">
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required:">
                        <label for="">Trạng Thái</label>
                        <select name="status" class="selectpicker">
                            <option value="1" name = "role">1</option>
                            <option value="0" name = "role">0</option>
                        </select>



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








