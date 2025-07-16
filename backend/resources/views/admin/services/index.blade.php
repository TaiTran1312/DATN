@extends('template.admin')

@section('title', 'Quản lý Dịch Vụ')

@section('body')
    <h2 class="mb-4">Danh sách Dịch vụ</h2>

    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Thêm Dịch vụ</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($services->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($service->description, 50) }}</td>
                        <td>{{ number_format($service->price, 0, ',', '.') }} VNĐ</td>
                        <td>
                            <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-warning">Sửa</a>

                            <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa dịch vụ này?')">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Chưa có dịch vụ nào được đăng.</div>
    @endif
@endsection
