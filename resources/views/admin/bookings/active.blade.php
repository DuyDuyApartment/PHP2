@extends('admin.hoadon.app')
@section('title')
    Danh Sách Phòng Đang Sử Dụng
@endsection
@section('content')
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

    <div class="card">
        <div class="card-header" style="font-size: 16px">
            Danh Sách Phòng Đang Sử Dụng
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Room">
                    <thead>
                        <tr>
                            <th width="10"></th>
                            <th>ID</th>
                            <th>Họ Và Tên Khách</th>
                            <th>Số điện thoại</th>
                            <th>Phòng</th>
                            <th>Bắt Đầu Từ Ngày</th>
                            <th>Kết Thúc Từ Ngày</th>
                            <th>Trạng Thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr data-entry-id="{{ $booking->bk_ma }}">
                                <td></td>
                                <td>{{ $booking->bk_ma }}</td>
                                <td>{{ $booking->kh_hoTen }}</td>
                                <td>{{ $booking->kh_dienThoai }}</td>
                                <td>{{ $booking->p_ten }}</td>
                                <td>{{ date('d-m', strtotime($booking->bk_thoiGianBatDau)) }}</td>
                                <td>{{ date('d-m', strtotime($booking->bk_thoiGianKetThuc)) }}</td>
                                <td>Đã xác nhận</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 50,
            });
            $('.datatable-Room:not(.ajaxTable)').DataTable({ buttons: dtButtons });
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection