@extends('template.admin')

@section('body')
    <h2>Sửa đơn hàng #{{ $order->id }}</h2>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="payment_method">Phương thức thanh toán</label>
            <select name="payment_method" class="form-control" id="payment_method">
                <option value="COD" {{ $order->payment_method == 'COD' ? 'selected' : '' }}>COD</option>
                <option value="Banking" {{ $order->payment_method == 'Banking' ? 'selected' : '' }}>Banking</option>
                <option value="Wallet" {{ $order->payment_method == 'Wallet' ? 'selected' : '' }}>Wallet</option>
                <option value="Card" {{ $order->payment_method == 'Card' ? 'selected' : '' }}>Card</option>
            </select>
        </div>

        <div class="form-group">
            <label for="payment_status">Trạng thái thanh toán</label>
            <select name="payment_status" class="form-control" id="payment_status">
                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Chờ thanh toán</option>
                <option value="done" {{ $order->payment_status == 'done' ? 'selected' : '' }}>Đã thanh toán</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái đơn hàng</label>
            <select name="status" class="form-control" id="status">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection
