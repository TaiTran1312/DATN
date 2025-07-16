@extends('template.admin')

@section('body')
<h2>Thêm danh mục</h2>

<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Ảnh</label>
        <input type="file" name="image" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Danh mục cha</label>
        <select name="parent_id" class="form-control">
            <option value="">-- Không chọn --</option>
            @foreach($categories as $cate)
                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success mt-2">Tạo danh mục</button>
</form>
@endsection
