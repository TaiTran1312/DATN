@extends('template.admin')

@section('body')
    <h2>Danh sách đơn hàng</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                            <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </form>
                </td>
                <td>{{ $order->created_at }}</td>
                <td><a href="{{ route('admin.orders.show', $order->id) }}">Chi tiết</a></td>
                <td><a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Sửa</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
