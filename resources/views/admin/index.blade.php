@extends('admin.layouts.master')

@section('title')
Admin
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
@endsection

@section('content')
<div class="contianer">
    @foreach($db as $item)
        <div class="flip-box">
            <div class="productShow">
                <div class="flip-box-front">
                    <?php
                    $checkExist = DB::table('booking')
                        ->whereRaw('DAY(bk_thoiGianBatDau) = DAY(CURRENT_TIMESTAMP) and bk_trangThai = 2 and p_ma = ?', [$item->p_ma])
                        ->first();
                    ?>
                    @if($item->p_trangThai == 1)
                        <h1 class="room" style="background-color: rgb(255, 55, 55); border-radius: 15px;" class="button button3" id="r1"><strong>ROOM {{$item->p_ten}}</strong></h1>
                    @else
                        @if ($checkExist)
                            <h1 class="room" style="background-color: rgb(231, 235, 42); border-radius: 15px;" class="button button3" id="r1"><strong>ROOM {{$item->p_ten}}</strong></h1>
                        @else
                            <h1 class="room" style="background-color: rgb(61, 129, 255); border-radius: 15px;" class="button button3" id="r1"><strong>ROOM {{$item->p_ten}}</strong></h1>
                        @endif
                    @endif
                    <img src="{{ asset('/storage/photos/' . $item->lp_hinh) }}" class="img-list">
                </div>

                <div class="overlay" style="font-family: 'Nunito', sans-serif;">
                    @if($item->p_trangThai == 2)
                        @if($checkExist)
                            <?php $hoten = DB::table('khachhang')->where('id', $checkExist->kh_ma)->first(); ?>
                            <p><h3 style="background-color: rgb(61, 129, 255); border-radius: 15px;" class="button button3">{{$hoten->kh_hoTen}}</h3></p>
                            <p><h3 style="background-color: rgb(61, 129, 255); border-radius: 15px;" class="button button3">{{$hoten->kh_dienThoai}}</h3></p>
                            <p><a href="{{route('backend.booking.checkin', [$checkExist->bk_ma])}}"><button title="Thủ tục nhận phòng cho khách đặt phòng" class="checkinout" onclick="return confirm('Bạn xác nhận CHECK IN cho khách hàng đặt phòng ');" style="display: inline-block;">Thêm Khách Đặt Phòng</button></a></p>
                        @else
                            <p><a href="{{route('admin.create', [$item->p_ma])}}"><button class="checkinout" title="Thủ tục nhận phòng cho khách chưa đặt phòng" onclick="return confirm('Bạn xác nhận CHECK IN cho khách hàng MỚI ');" style="display: inline-block;">Check in</button></a></p>
                        @endif
                    @endif
                    @if($item->p_trangThai == 1)
                        <p><a href="{{route('admin.update', [$item->p_ma])}}"><button class="checkinout" title="Thủ tục trả phòng" onclick="return confirm('Bạn xác nhận cập nhật lại ngày trả phòng cho hóa đơn ');" style="display: inline-block;">Check out</button></a></p>
                        <a href="{{route('admin.show', [$item->p_ma])}}"><button title="Thủ tục thanh toán" style="margin-left: 100px" class="pay">Pay</button></a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection