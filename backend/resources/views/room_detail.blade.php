@extends('user')

@section('body')
<style>
    .breadcrumb { background: none; padding: 10px 0; }
    .room-thumbnail img { height: 60px; object-fit: cover; cursor: pointer; }
    .utilities i, .utilities span { margin-right: 10px; }
    .room-card img { height: 150px; object-fit: cover; }
    .footer { background: #111; color: #ccc; padding: 40px 0; font-size: 14px; }
    .img-thumbnail { height: 60px; width: 100px; object-fit: cover; }

            .zoom-hover {
                transition: transform 0.3s ease;
            }

            .zoom-hover:hover {
                transform: scale(1.05);
            }

            .card-img-top {
                transition: transform 0.3s ease;
            }

            a.room-link {
                text-decoration: none;
                color: inherit;
            }
        </style>
<!-- Breadcrumb -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Room</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $room->name }}</li>
        </ol>
    </nav>
</div>

<!-- Room Detail -->
<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-8">
            <img src="{{ asset('img/' . $room->image) }}" class="img-fluid rounded shadow" alt="{{ $room->name }}">

            <!-- Thumbnail giả lập -->
            <div class="d-flex gap-2 mt-3">
                @for ($i = 0; $i < 4; $i++)
                    <img src="{{ asset('img/' . $room->image) }}" class="img-thumbnail" alt="thumb">
                @endfor
            </div>
        </div>

        <div class="col-md-4">
            <h5 class="text-warning fw-bold">{{ $room->name }}</h5>
            <p class="text-muted">{{ $room->description }}</p>
            <p class="fw-bold">{{ number_format($room->price, 0, ',', '.') }}đ / đêm</p>
            <p><i class="bi bi-person-fill"></i> Max guests: {{ $room->max_guests }}</p>

            <div class="border p-3 rounded shadow-sm bg-light">
                <form action="{{ url('/book-room') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Check-in:</label>
                        <input type="date" class="form-control" name="checkin">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Check-out:</label>
                        <input type="date" class="form-control" name="checkout">
                    </div>
                    <button class="btn btn-warning w-100 fw-semibold" type="submit">Book now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Utilities -->
<div class="container mt-5">
    <h6 class="text-warning fw-bold">Utilities</h6>
    <div class="d-flex gap-4 utilities mt-2 fs-6 text-secondary">
        <span><i class="bi bi-tv"></i> TV</span>
        <span><i class="bi bi-wifi"></i> Free Wifi</span>
        <span><i class="bi bi-cup-hot"></i> Breakfast</span>
        <span><i class="bi bi-snow"></i> Air-conditioner</span>
    </div>
</div>
<!-- Room Article -->
<!-- Room Article -->
<div class="container my-5">
    <h5 class="fw-bold text-warning">Room Article</h5>
    <div class="row g-4 mt-2">

        @foreach($relatedRooms as $item)
        <div class="col-md-4">
            <a href="{{ url('/room/' . $item->room_id) }}" class="room-link">
                <div class="card h-100 border rounded-3 zoom-hover">
                    <img src="{{ asset('img/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h6 class="card-title fw-semibold">{{ $item->name }}</h6>
                        <p class="text-muted mb-2">{{ number_format($item->price, 0, ',', '.') }}₫/đêm</p>
                        <div class="d-flex flex-wrap gap-3 text-secondary mb-3 fs-6">
                            <span><i class="bi bi-person-fill"></i> {{ $item->max_guests ?? 2 }}</span>
                            <span><i class="bi bi-wifi"></i></span>
                            <span><i class="bi bi-snow"></i></span>
                            <span><i class="bi bi-cup-hot"></i></span>
                        </div>
                        <div class="text-end">
                            <span class="btn btn-outline-dark btn-sm">View</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>

<!-- Footer -->
<div class="footer mt-5">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-md-4 mb-3">
                <h5>INDUG</h5>
                <p>Khách sạn cao cấp tại Việt Nam mang đến trải nghiệm đẳng cấp và thư giãn tuyệt vời cho kỳ nghỉ của bạn.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h6>Chính sách</h6>
                <p>Chính sách bảo mật<br>Chính sách hoàn hủy<br>Điều khoản sử dụng</p>
            </div>
            <div class="col-md-4 mb-3">
                <h6>Gửi email hỗ trợ</h6>
                <input type="text" class="form-control mb-2" placeholder="Email của bạn">
                <button class="btn btn-outline-light btn-sm">Gửi</button>
                <p class="mt-3">Phương thức thanh toán:<br>
                    <img src="{{ asset('img/visa.png') }}" width="40">
                    <img src="{{ asset('img/momo.png') }}" width="40">
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
