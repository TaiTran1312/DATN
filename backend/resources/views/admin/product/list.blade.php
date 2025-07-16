@extends('template.admin') {{-- layout admin nếu có --}}

@section('body')
<div class="container mt-4">
    <h2 class="mb-4">Quản lý sản phẩm</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">+ Thêm sản phẩm</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Giá Sale</th>
                <th>Mô tả</th>
                <th>Đánh giá</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><img src="{{ asset('img/' . $item->image) }}" width="80" alt=""></td>

                <td>{{ number_format($item->price) }}đ</td>
                <td>{{ $item->sale_price ? number_format($item->sale_price) . 'đ' : 'Không có' }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->rating }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->category->name ?? 'Không xác định' }}</td>
                <td>
                    <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
