@extends('template.admin')

@section('body')
    <h2>Danh sách Phòng</h2>

    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Thêm Phòng</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($rooms->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên phòng</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Sức chứa</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->description }}</td>
                        <td>{{ number_format($room->price, 0, ',', '.') }}₫</td>
                        <td>{{ ucfirst($room->status) }}</td>
                        <td>{{ $room->capacity }} người</td>
                        <td>{{ $room->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning">Sửa</a>

                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa phòng này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Chưa có phòng nào được thêm.</div>
    @endif
@endsection
