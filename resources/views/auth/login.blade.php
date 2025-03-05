@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-container">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                   Login User
                </h2>
                <div class="auth-external-container">
                    <div class="auth-external-list">
                        <ul>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <p class="auth-sgt">or sign in with:</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input id="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" 
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="auth-action-right">
            <div class="auth-image">
                <img src="data:image/jpeg;base64,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" alt="login">
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
@endsection


























