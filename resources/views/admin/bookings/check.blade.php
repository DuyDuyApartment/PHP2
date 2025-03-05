@extends('admin.layouts.app') <!-- Hoặc @extends('layouts.app') tùy cấu trúc -->
@section('title')
    Danh Sách Đặt Phòng Đợi Duyệt
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
            Danh Sách Đặt Phòng Đợi Duyệt
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
                            <th>Thời gian đặt</th>
                            <th>Phòng</th>
                            <th>Bắt Đầu Từ Ngày</th>
                            <th>Kết Thúc Từ Ngày</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($bookings) === 0)
                            <tr>
                                <td colspan="10" class="text-center">Không có đặt phòng nào đang chờ duyệt.</td>
                            </tr>
                        @else
                            @foreach($bookings as $booking)
                                <tr data-entry-id="{{ $booking->bk_ma }}">
                                    <td></td>
                                    <td>{{ $booking->bk_ma }}</td>
                                    <td>{{ $booking->kh_hoTen }}</td>
                                    <td>{{ $booking->kh_dienThoai }}</td>
                                    <td>{{ date('d-m / H:i', strtotime($booking->bk_taoMoi)) }}</td>
                                    <td>{{ $booking->p_ten }}</td>
                                    <td>{{ date('d-m', strtotime($booking->bk_thoiGianBatDau)) }}</td>
                                    <td>{{ date('d-m', strtotime($booking->bk_thoiGianKetThuc)) }}</td>
                                    <td>Đang xử lý</td>
                                    <td>
                                        <form method="POST" action="{{ route('backend.booking.update', $booking->bk_ma) }}" onsubmit="return confirm('Bạn có xác nhận duyệt đặt phòng?');" style="display: inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <input type="submit" class="btn btn-xs btn-success" value="Duyệt">
                                        </form>
                                        <form method="POST" action="{{ route('backend.booking.edit', $booking->bk_ma) }}" onsubmit="return confirm('Bạn có xác nhận hủy đặt phòng?');" style="display: inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" class="btn btn-xs btn-danger" value="Hủy">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
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
            // Kiểm tra nếu DataTable đã được khởi tạo, hủy (destroy) trước khi khởi tạo lại
            if ($.fn.DataTable.isDataTable('.datatable-Room:not(.ajaxTable)')) {
                $('.datatable-Room:not(.ajaxTable)').DataTable().destroy();
            }
            $('.datatable-Room:not(.ajaxTable)').DataTable({
                buttons: dtButtons,
                order: [[1, 'desc']],
                pageLength: 50,
                responsive: true // Thêm responsive để cải thiện hiển thị
            });
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection