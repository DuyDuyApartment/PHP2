@extends('user.orders.app')

@section('title')
    BOOKING ROOM
@endsection

@section('content')
    <!-- Thông báo -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- =========== TIÊU ĐỀ TRANG ========== -->
    <div class="page_title gradient_overlay" style="background: url({{ asset('app/images/page_title_bg.jpg') }});">
        <div class="container">
            <div class="inner">
                <h1>Đặt phòng {{ $loaiphong->lp_ten }}</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('orders.listlp') }}">List Room Type</a></li>
                    <li>Booking Room</li>
                </ol>
            </div>
            <div class="price">
                <div class="inner">
                    {{ number_format($loaiphong->lp_giaBan, 0, ',', '.') }} VNĐ <span>mỗi đêm</span>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== NỘI DUNG CHÍNH ========== -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Thông tin phòng</h3>
                        <p>{{ $loaiphong->lp_thongTin }}</p>
                        <img src="{{ asset('storage/photos/' . $loaiphong->lp_hinh) }}" 
                             class="img-fluid mb-3" alt="{{ $loaiphong->lp_ten }}">
                        
                        <!-- Form đặt phòng -->
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="p_ma" value="{{ $phongTrong->p_ma }}">
                            
                            <div class="form-group">
                                <label for="checkin">Ngày nhận phòng</label>
                                <input type="date" class="form-control" id="checkin" name="checkin" required>
                            </div>

                            <div class="form-group">
                                <label for="checkout">Ngày trả phòng</label>
                                <input type="date" class="form-control" id="checkout" name="checkout" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="adults">Số người lớn</label>
                                <input type="number" class="form-control" id="adults" name="adults" min="1" value="1" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="children">Số trẻ em</label>
                                <input type="number" class="form-control" id="children" name="children" min="0" value="0">
                            </div>

                            <!-- <div class="form-group mb-3">
                                <label for="notes">Ghi chú thêm</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3" 
                                    placeholder="Vui lòng nhập yêu cầu đặc biệt nếu có"></textarea>
                            </div> -->

                            <button type="submit" class="btn btn-primary">Xác nhận đặt phòng</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Thông tin tổng kết -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Tóm tắt đặt phòng</h4>
                        <hr>
                        <p><strong>Loại phòng:</strong> {{ $loaiphong->lp_ten }}</p>
                        <p><strong>Giá mỗi đêm:</strong> {{ number_format($loaiphong->lp_giaBan, 0, ',', '.') }} VNĐ</p>
                        <div id="summary">
                            <!-- Phần JavaScript sẽ cập nhật thông tin tổng tiền -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkinInput = document.getElementById('checkin');
    const checkoutInput = document.getElementById('checkout');
    
    const today = new Date().toISOString().split('T')[0];
    checkinInput.min = today;
    
    checkinInput.addEventListener('change', function() {
        checkoutInput.min = this.value;
        if(checkoutInput.value && checkoutInput.value < this.value) {
            checkoutInput.value = this.value;
        }
    });
});
</script>
@endsection