@extends('layouts.app')

@section('title')
    Hóa đơn đặt phòng
@endsection

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hóa đơn đặt phòng #{{ $hoadon->hd_ma }}</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">Thông tin khách hàng:</h6>
                            <div>
                                <strong>Tên:</strong> {{ $hoadon->kh_hoTen }}<br>
                                <strong>Email:</strong> {{ $hoadon->kh_email }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3">Thông tin phòng:</h6>
                            <div>
                                <strong>Phòng:</strong> {{ $hoadon->p_ten }}<br>
                                <strong>Loại phòng:</strong> {{ $hoadon->lp_ten }}<br>
                                <strong>Ngày tạo:</strong> {{ \Carbon\Carbon::parse($hoadon->hd_taoMoi)->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Mô tả</th>
                                    <th class="right">Đơn giá/đêm</th>
                                    <th class="right">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $hoadon->lp_ten }}</td>
                                    <td class="right">{{ number_format($hoadon->lp_giaBan, 0, ',', '.') }} VNĐ</td>
                                    <td class="right">{{ number_format($hoadon->hd_gia, 0, ',', '.') }} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if($hoadon->hd_trangThai == 2)
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{ route('orders.pay', $hoadon->hd_ma) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Thanh toán ngay
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-success mt-4">
                        Đã thanh toán
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 