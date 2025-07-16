<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotel Admin Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .sidebar {
      height: 100vh;
      background-color: #fff;
      border-right: 1px solid #dee2e6;
    }
    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: #333;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #f1f1f1;
    }
    .card-box {
      padding: 20px;
      border-radius: 8px;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .map-img { width: 100%; }
    .user-info {
      display: flex;
      align-items: center;
    }
    .user-info img {
      border-radius: 50%;
      width: 35px;
      height: 35px;
      margin-left: 10px;
    }
    .progress { height: 10px; }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h4 class="text-center mt-4">Hotel Admin</h4>
        <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('rooms.index') }}"><i class="fas fa-bed"></i> Quản lý phòng</a>
        {{-- <a href="{{ route('admin.room-types.index') }}"><i class="fas fa-th-list"></i> Loại phòng</a> --}}
        {{-- <a href="{{ route('admin.bookings.index') }}"><i class="fas fa-calendar-check"></i> Quản lý đặt phòng</a>
        <a href="{{ route('admin.services.index') }}"><i class="fas fa-concierge-bell"></i> Dịch vụ</a> --}}
        <a href="{{ route('users.index') }}"><i class="fas fa-users"></i> Khách hàng</a>
        <a href="{{ route('services.index') }}"><i class="fas fa-tags"></i> Dịch vụ</a>
        {{-- <a href="{{ route('admin.reviews.index') }}"><i class="fas fa-star"></i> Đánh giá</a>
        <a href="{{ route('admin.vouchers.index') }}"><i class="fas fa-ticket-alt"></i> Mã giảm giá</a>
        <a href="{{ route('admin.statistics.revenue') }}"><i class="fas fa-coins"></i> Thống kê doanh thu</a>
        <a href="{{ route('admin.statistics.occupancy') }}"><i class="fas fa-chart-bar"></i> Thống kê công suất</a>
        <a href="{{ route('admin.settings') }}"><i class="fas fa-cogs"></i> Cài đặt hệ thống</a> --}}
      </div>

      <!-- Main -->
      <div class="col-md-10">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
          <h4><i class="fas fa-hotel"></i> Hotel Booking Admin</h4>
          <div class="user-info">
            <!-- Thông báo (giả lập có thông báo mới) -->
            <div class="position-relative mr-3">
              <i class="fas fa-bell text-danger"></i>
              {{-- Nếu có thông báo mới, hiển thị chấm đỏ --}}
              @if(isset($hasNotification) && $hasNotification)
                <span style="position:absolute;top:0;right:0;width:10px;height:10px;background:red;border-radius:50%;display:inline-block;border:2px solid #fff;"></span>
              @endif
            </div>
            <!-- Email (nếu có) -->
            <i class="fas fa-envelope text-danger mr-3"></i>
            @if(Auth::check())
              <span class="mr-2" style="font-weight:bold;{{ Auth::user()->email ? 'color:red;' : '' }}">
                {{ Auth::user()->name }}
                @if(Auth::user()->email)
                  <span style="font-size:0.9em;color:#555;">({{ Auth::user()->email }})</span>
                @endif
              </span>
              <!-- Avatar dropdown -->
              <div class="dropdown d-inline">
                <a href="#" id="avatarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="https://i.pravatar.cc/40" alt="User">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="avatarDropdown">
                  <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                  </form>
                </div>
              </div>
            @else
              <span>Admin</span>
              <img src="https://i.pravatar.cc/40" alt="User">
            @endif
          </div>
        </div>

        @yield('body')
      </div>
    </div>
  </div>

  <!-- Thêm script Bootstrap dropdown nếu chưa có -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
