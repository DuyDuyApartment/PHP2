@extends('layouts.app')

@section('title')
Khách sạn | Danh sách phòng
@endsection

@section('custom-css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
@endsection

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Danh sách phòng trống</h2>
    
  
    
    @if(isset($db) && $db->count() > 0)
        <div class="row">
            @foreach ($db as $room)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        @if(isset($room->lp_hinh))
                            <img src="{{ asset('storage/photos/' . $room->lp_hinh) }}" 
                                 class="card-img-top" alt="{{ $room->lp_ten }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-secondary" style="height: 200px;"></div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->lp_ten }}</h5>
                            <p class="card-text">{{ $room->lp_thongTin }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">{{ number_format($room->lp_giaBan, 0, ',', '.') }} VNĐ/đêm</h6>
                                <a href="{{ route('orders.create', ['id' => $room->lp_ma]) }}" 
                                   class="btn btn-primary">Đặt phòng</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            Không có phòng nào khả dụng
        </div>
    @endif
</div>
@endsection




