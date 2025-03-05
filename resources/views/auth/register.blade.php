@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="kh_hoTen">Họ tên</label>
                            <input type="text" name="kh_hoTen" value="{{ old('kh_hoTen') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="kh_gioiTinh">Giới tính</label>
                            <select name="kh_gioiTinh" class="form-control" required>
                                <option value="">Chọn giới tính</option>
                                <option value="1" {{ old('kh_gioiTinh') == '1' ? 'selected' : '' }}>Nam</option>
                                <option value="0" {{ old('kh_gioiTinh') == '0' ? 'selected' : '' }}>Nữ</option>
                            </select>
                            @error('kh_gioiTinh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kh_email">Email</label>
                            <input type="email" name="kh_email" value="{{ old('kh_email') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="kh_diaChi">Địa chỉ</label>
                            <input type="text" name="kh_diaChi" value="{{ old('kh_diaChi') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="kh_dienThoai">Số điện thoại</label>
                            <input type="text" name="kh_dienThoai" value="{{ old('kh_dienThoai') }}" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script type="text/javascript" src="{{ asset('vendor/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.min.js') }}"></script>
@endsection
