@extends('template.admin')

@section('body')
    <h2>Thêm Phòng mới</h2>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên phòng</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá phòng (VNĐ)</label>
            <input type="number" name="price" class="form-control" required min="0">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" class="form-select">
                <option value="available">Còn trống</option>
                <option value="unavailable">Đã đặt</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Sức chứa</label>
            <input type="number" name="capacity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Lưu phòng</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
