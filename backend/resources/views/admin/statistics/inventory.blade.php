@extends('layouts.admin') {{-- hoặc layout riêng nếu bạn có --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Thống kê hàng tồn kho</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng còn</th>
                <th>Giá</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                    <td>
                        @if($product->quantity == 0)
                            <span class="badge bg-danger">Hết hàng</span>
                        @elseif($product->quantity < 5)
                            <span class="badge bg-warning text-dark">Sắp hết</span>
                        @else
                            <span class="badge bg-success">Còn hàng</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Không có sản phẩm nào</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
