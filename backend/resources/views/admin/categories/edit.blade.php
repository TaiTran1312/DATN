@extends('template.admin')

@section('body')
<h2>Chỉnh sửa danh mục #{{ $category->id }}</h2>

<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Ảnh mới (nếu muốn đổi)</label>
        <input type="file" name="image" class="form-control">
        <img src="{{ asset('img/' . $category->image) }}" width="80" class="mt-2">
    </div>

    <div class="form-group">
        <label>Danh mục cha</label>
        <select name="parent_id" class="form-control">
            <option value="">-- Không chọn --</option>
            @foreach($categories as $cate)
                <option value="{{ $cate->id }}" @selected($category->parent_id == $cate->id)>{{ $cate->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
</form>
@endsection
