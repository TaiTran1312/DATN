@extends('template.admin')

@section('title', 'Thêm Dịch Vụ')

@section('body')
<h2 class="mb-4">Thêm Dịch vụ mới</h2>

<form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Tên dịch vụ</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Giá (VNĐ)</label>
        <input type="number" name="price" class="form-control" required value="{{ old('price') }}">
    </div>

    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
