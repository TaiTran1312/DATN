<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách Sạn Cao Cấp</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="cart.js" defer></script>
   <style>
    body {
        font-family: 'Segoe UI', sans-serif;
    }
    header {
      background: #fff;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #eee;
    }
     nav a {
      margin: 0 15px;
      text-decoration: none;
      color: #000;
      font-weight: bold;
    }

    .booking-btn {
      background: #f58020;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      text-decoration: none;
    }

    .carousel-caption h2 {
        font-size: 2.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 8px black;
    }
.carousel-item img {
    max-height: 500px; /* bạn có thể điều chỉnh 400px, 300px tùy ý */
    object-fit: cover;
}

    .section-title {
        font-weight: bold;
        font-size: 32px;
        margin: 40px 0 20px;
    }

    .room-card img {
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .footer {
        background: #111;
        color: #eee;
        padding: 40px 0;
        font-size: 14px;
    }

    .footer a {
        color: #ccc;
        text-decoration: none;
    }


</style>

  <!-- Header -->
  <header>
    <div class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="120">
    </div>
    <nav>
      <a href="#">HOME</a>
      <a href="#">ROOMS</a>
      <a href="#">SERVICE</a>
      <a href="#">CONTACT</a>
    @auth
  <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="booking-btn" style="background: none; border: none; color: #000; font-weight: bold;">LOGOUT</button>
  </form>
@else
  <a href="{{ route('login') }}">LOGIN</a>
@endauth


      <a href="#" class="booking-btn">Booking now</a>
    </nav>
  </header>
<!-- Carousel Section -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/2.jpg') }}" class="d-block w-100" alt="Hotel Banner">
            <div class="carousel-caption d-none d-md-block">
                <h2>Welcome to</h2>
                <h2>REVERIE SAIGON HOTEL</h2>
                <a class="btn btn-warning mt-3" href="#">Booking Now</a>
            </div>
        </div>
    </div>
</div>


    @yield('body')


<!-- Footer -->
<div class="footer">
    <div class="container text-center">
        <p>© 2025 Reverie Saigon Hotel | Hotline: 1800 123 456</p>
        <p>
            Follow us:
            <a href="#">Facebook</a> |
            <a href="#">Instagram</a>
        </p>
        <p>
            Payment methods:
            <img src="{{ asset('img/visa.png') }}" width="40">
            <img src="{{ asset('img/mastercard.png') }}" width="40">
        </p>
    </div>
</div>
