@extends('template.admin')

@section('body')
    <h2>Thống kê doanh thu theo ngày</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Tổng doanh thu</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($revenue as $item)
            <tr>
                <td>{{ $item->date }}</td>
                <td>{{ number_format($item->total) }} VND</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
