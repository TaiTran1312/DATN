@extends('template.admin')

@section('body')
<div class="container mt-4">
    <h2>Sửa sản phẩm</h2>
    <form method="POST" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="form-group mb-3">
            <label>Ảnh hiện tại:</label><br>
            @if($product->image)
                <img src="{{ asset('uploads/'.$product->image) }}" width="120">
            @endif
            <input type="file" name="image" class="form-control mt-2">
        </div>
        <div class="form-group mb-3">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group mb-3">
            <label>Giá sale</label>
            <input type="number" name="sale_price" class="form-control" value="{{ $product->sale_price }}">
        </div>
        <div class="form-group mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label>Đánh giá</label>
            <input type="number" name="rating" class="form-control" step="0.1" value="{{ $product->rating }}">
        </div>
        <div class="form-group mb-3">
            <label>Số lượng</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
        </div>
        <div class="form-group mb-3">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
