@extends('template.admin')

@section('body')
<h2>Danh sách danh mục</h2>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Danh mục cha</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $cate)
            <tr>
                <td>{{ $cate->id }}</td>
                <td>{{ $cate->name }}</td>
                <td><img src="{{ asset('img/' . $cate->image) }}" width="60"></td>
                <td>{{ $cate->parent?->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('categories.destroy', $cate->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
