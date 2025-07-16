<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rooms & Suites</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .room-img { height: 180px; object-fit: cover; border-radius: 6px; }
    .room-box { border: 1px solid #ddd; border-radius: 10px; padding: 15px; margin-bottom: 20px; }
    .filter-bar select { margin-right: 10px; }
    .footer { background: #111; color: #ccc; padding: 40px 0; font-size: 14px; }
  </style>
</head>
<body>

<!-- Banner -->
<div class="position-relative">
  <img src="{{ asset('img/banner.jpg') }}" class="w-100" style="height: 400px; object-fit: cover;" alt="">
  <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
    <h1 class="display-4 fw-bold">ROOMS & SUITES</h1>
  </div>
</div>

<!-- Main Title -->
<div class="container text-center mt-4">
  <h5 class="fw-bold text-uppercase">ROOMS, SUITES & RESIDENCES</h5>
  <p>All of the accommodations feature contemporary interiors, thoughtful amenities and spacious balconies.</p>
</div>

<!-- Filter Bar -->
<div class="container filter-bar my-3 d-flex flex-wrap align-items-center">
  <select class="form-select w-auto"><option>Loại phòng</option></select>
  <select class="form-select w-auto"><option>Sức chứa</option></select>
  <select class="form-select w-auto"><option>Giá</option></select>
  <select class="form-select w-auto"><option>Tiện ích</option></select>
</div>

<!-- Room List -->
<div class="container">
  @php
    $rooms = [
      [
        'img' => '4.jpg',
        'name' => 'Minimalist Room',
        'desc' => 'Simple room with full facilities and elegant design.',
        'price' => '4.500.000₫/đêm'
      ],
      [
        'img' => '2.jpg',
        'name' => 'Natural Wood Room',
        'desc' => 'Room with warm wooden tones and peaceful atmosphere.',
        'price' => '5.300.000₫/đêm'
      ],
      [
        'img' => '3.jpg',
        'name' => 'Green Light Room',
        'desc' => 'Comfortable room with modern lighting and natural decor.',
        'price' => '5.500.000₫/đêm'
      ]
    ];
  @endphp

  @foreach($rooms as $room)
  <div class="room-box row">
    <div class="col-md-4">
      <img src="{{ asset('img/' . $room['img']) }}" class="img-fluid room-img" alt="{{ $room['name'] }}">
    </div>
    <div class="col-md-5">
      <h6 class="fw-bold">{{ $room['name'] }}</h6>
      <p class="text-muted small">{{ $room['desc'] }}</p>
      <div class="d-flex gap-3 text-secondary fs-6">
        <span><i class="bi bi-person-fill"></i> 2</span>
        <span><i class="bi bi-wifi"></i> Wifi</span>
        <span><i class="bi bi-cup-hot"></i> Breakfast</span>
        <span><i class="bi bi-snow"></i> AC</span>
      </div>
      <div class="mt-2 fw-bold">{{ $room['price'] }}</div>
    </div>
    <div class="col-md-3 d-flex flex-column justify-content-center align-items-end">
      <a href="#" class="btn btn-outline-dark btn-sm mb-2">View Details</a>
      <a href="#" class="btn btn-warning btn-sm">Book now</a>
    </div>
  </div>
  @endforeach
</div>

<!-- Pagination -->
<div class="container text-center my-4">
  <button class="btn btn-sm btn-outline-secondary">1</button>
  <button class="btn btn-sm btn-outline-secondary">2</button>
  <button class="btn btn-sm btn-outline-secondary">3</button>
</div>

<!-- Footer -->
<div class="footer mt-5">
  <div class="container">
    <div class="row text-center text-md-start">
      <div class="col-md-4">
        <h5>INDUG</h5>
        <p>Khách sạn cao cấp tại Việt Nam mang đến trải nghiệm đẳng cấp và thư giãn tuyệt vời cho kỳ nghỉ của bạn.</p>
      </div>
      <div class="col-md-4">
        <h6>Chính sách</h6>
        <p>Chính sách bảo mật<br>Chính sách hoàn hủy<br>Điều khoản sử dụng</p>
      </div>
      <div class="col-md-4">
        <h6>Gửi email hỗ trợ</h6>
        <input type="email" class="form-control mb-2" placeholder="Email của bạn">
        <button class="btn btn-outline-light btn-sm">Gửi</button>
        <p class="mt-3">Thanh toán:
          <img src="{{ asset('img/visa.png') }}" width="40">
          <img src="{{ asset('img/momo.png') }}" width="40">
        </p>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
