<?php
    $a = DB::select('SELECT DISTINCT *, bk.bk_ma FROM booking as bk
       INNER JOIN khachhang as kh ON kh.id = bk.kh_ma
       INNER JOIN nhanvien as nv ON nv.id = bk.nv_ma
       INNER JOIN phong as p ON p.p_ma = bk.p_ma
       WHERE bk.kh_ma = '.Auth::user()->id.' ORDER BY bk_ma DESC');
?>

<div class="card shadow-lg border-0 rounded-lg">
    <div class="card-header bg-primary text-white text-center py-3">
        <h4 class="mb-0 bolder" >Lịch Sử Đặt Phòng</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Họ và Tên Khách</th>
                        <th>Phòng</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Giá tiền</th>   
                        <th>Trạng Thái</th>
                        <th>Hủy Đơn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($a as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->kh_hoTen }}</td>
                            <td>{{ $booking->p_ten }}</td>
                            <td>{{ date('d-m-Y', strtotime($booking->bk_thoiGianBatDau)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($booking->bk_thoiGianKetThuc)) }}</td>
                            <td>{{ number_format($booking->bk_gia * 1000, 0, ',', '.') }} VND</td>
                            <td>
                                @php
                                    $statusClasses = [
                                        1 => 'badge bg-warning',
                                        2 => 'badge bg-primary',
                                        3 => 'badge bg-info',
                                        4 => 'badge bg-success',
                                        5 => 'badge bg-secondary',
                                        6 => 'badge bg-danger'
                                    ];
                                    $statusText = [
                                        1 => 'Đang đợi xử lý',
                                        2 => 'Đã xác nhận',
                                        3 => 'Đang sử dụng',
                                        4 => 'Đã hoàn thành',
                                        5 => 'Khách đã hủy',
                                        6 => 'Không thành công'
                                    ];
                                @endphp
                                <span class="{{ $statusClasses[$booking->bk_trangThai] ?? 'badge bg-dark' }}">
                                    {{ $statusText[$booking->bk_trangThai] ?? 'Không xác định' }}
                                </span>
                            </td>
                            <td>
                                @if ($booking->bk_trangThai == 1 || $booking->bk_trangThai == 2)
                                    <form action="{{ route('orders.update', [$booking->bk_ma]) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy?');" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-times"></i> Hủy
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (session('success'))
            <div class="alert alert-success mt-3 text-center">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
