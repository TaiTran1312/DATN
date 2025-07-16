@extends('template.admin')

@section('body')
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>
    <p><strong>Khách hàng:</strong> {{ $order->user->name }}</p>
    <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
    <p><strong>Trạng thái:</strong> {{ $order->status }}</p>

    <h4>Sản phẩm:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($order->orderDetails as $detail)
            <tr>
                <td>{{ $detail->product->name }}</td>
                <td>
                    <img src="{{ asset('img/'.$detail->product->image) }}" alt="{{ $detail->product->name }}" width="100">
                </td>
                <td>{{ $detail->price }}</td>
                <td>{{ $detail->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Quay lại</a>
@endsection
