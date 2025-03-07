<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="\css\loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
    <!-- Form without bootstrap -->
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Create Account
                    </h2>
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">or use your email for registration:</p>
                    </div>

                    <form action="{{ route('register') }}" method="post" class="login-form">
                        @csrf
                        <input type="text" name="kh_hoTen" class="auth-form-input" 
                            placeholder="Họ tên" value="{{ old('kh_hoTen') }}" required>

                        <input type="text" name="kh_dienThoai" class="auth-form-input" 
                            placeholder="Số điện thoại" value="{{ old('kh_dienThoai') }}" required>

                        <input type="email" name="kh_email" class="auth-form-input" 
                            placeholder="Email" value="{{ old('kh_email') }}" required>

                        <input type="text" name="kh_taiKhoan" class="auth-form-input" 
                            placeholder="Tên đăng nhập" value="{{ old('kh_taiKhoan') }}" required>

                        <input type="text" name="kh_diaChi" class="auth-form-input" 
                            placeholder="Địa chỉ" value="{{ old('kh_diaChi') }}" required>

                        <select name="kh_gioiTinh" class="auth-form-input" required>
                            <option value="">Chọn giới tính</option>
                            <option value="1" {{ old('kh_gioiTinh') == '1' ? 'selected' : '' }}>Nam</option>
                            <option value="0" {{ old('kh_gioiTinh') == '0' ? 'selected' : '' }}>Nữ</option>
                        </select>

                        <div class="input-icon">
                            <input type="password" name="password" class="auth-form-input" 
                                placeholder="Mật khẩu" required>
                            <i class="fa fa-eye show-password"></i>
                        </div>

                        <div class="footer-action">
                            <input type="submit" value="Đăng ký" class="auth-submit">
                            <a href="{{ route('login') }}" class="auth-btn-direct">Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                </div>
            </div>
        </div>
    </div>
    <script src="js/common.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

</body>
</html>
