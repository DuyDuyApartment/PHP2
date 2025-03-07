@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 450px; border-radius: 10px;">
        <div class="card-body text-center">
            <h3 class="text-primary mb-3">Login User / Admin</h3>
            
            <div class="d-flex justify-content-center gap-3 mb-3">
                <a href="#" class="btn btn-outline-danger"><i class="fa fa-google"></i></a>
                <a href="#" class="btn btn-outline-primary"><i class="fa fa-facebook"></i></a>
                <a href="#" class="btn btn-outline-info"><i class="fa fa-twitter"></i></a>
                <a href="#" class="btn btn-outline-dark"><i class="fa fa-linkedin"></i></a>
            </div>
            
            <p class="text-muted">or sign in with:</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required autocomplete="email" autofocus>

                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="current-password">

                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check text-start mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" 
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    <a href="{{ route('admin.login') }}" class="btn btn-secondary">Admin Login</a>
                </div>
            </form>
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
