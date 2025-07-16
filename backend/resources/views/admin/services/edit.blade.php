@extends('template.admin')

@section('title', 'Sửa Dịch Vụ')

@section('body')
<h2 class="mb-4">Chỉnh sửa Dịch vụ</h2>

<form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tên dịch vụ</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name', $service->name) }}">
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control">{{ old('description', $service->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Giá (VNĐ)</label>
        <input type="number" name="price" class="form-control" required value="{{ old('price', $service->price) }}">
    </div>

    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
