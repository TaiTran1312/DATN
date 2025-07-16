<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Swimming Pool | The Reverie Saigon</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background: #fff;
      color: #333;
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

    .banner img {
      width: 100%;
      height: auto;
    }

    .service-detail {
      max-width: 1000px;
      margin: auto;
      padding: 40px 20px;
    }

    .service-detail img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      margin-bottom: 30px;
    }

    .service-detail h2 {
      font-size: 24px;
      margin-bottom: 10px;
      color: #222;
    }

    .service-detail p {
      font-size: 15px;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .service-detail .time {
      font-weight: bold;
      color: #444;
      margin-top: 10px;
    }

    footer {
      background: #222;
      color: white;
      padding: 40px 20px;
    }

    .footer-container {
      max-width: 1100px;
      margin: auto;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .footer-box {
      width: 30%;
      min-width: 250px;
      margin-bottom: 20px;
    }

    .footer-box h4 {
      margin-bottom: 10px;
    }

    .footer-box input, .footer-box textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 5px;
    }

    .footer-box .socials a {
      color: white;
      margin-right: 10px;
      text-decoration: none;
    }

    .payment-icons img {
      height: 30px;
      margin-right: 5px;
    }

    .policy-list, .connect, .support-form {
      font-size: 14px;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="logo">
      <img src="https://i.imgur.com/W3fF3GI.png" alt="Logo" width="120">
    </div>
    <nav>
      <a href="#">HOME</a>
      <a href="#">ROOMS</a>
      <a href="#">SERVICE</a>
      <a href="#">CONTACT</a>
      <a href="#">LOGIN</a>
      <a href="#" class="booking-btn">Booking now</a>
    </nav>
  </header>

  <!-- Banner -->
  <div class="banner">
    <img src="https://i.imgur.com/VcAHxIM.jpg" alt="Banner dịch vụ">
  </div>

  <!-- Nội dung chi tiết dịch vụ -->
  <section class="service-detail">
    <img src="2.jpg" alt="Swimming Pool">
    <h2>🏊 Swimming Pool</h2>
    <p>Our luxurious pool is spacious and beautifully designed, providing the perfect escape for guests looking to unwind after a long day. The infinity-edge pool offers a breathtaking view of the city skyline, enhancing your relaxation experience.</p>
    <p>Enjoy crystal-clear water, comfortable lounge chairs, and professional poolside service. Whether you're swimming laps or soaking up the sun, our pool area ensures comfort and tranquility.</p>
    <p class="time">Opening Time: 6:00 AM – 10:00 PM (Daily)</p>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-box">
        <p><strong>THE REVERIE SAIGON</strong></p>
        <p>Là địa điểm nghỉ dưỡng lý tưởng với không gian sang trọng, dịch vụ đẳng cấp và phong cách phục vụ chuyên nghiệp.</p>
        <img src="2.jpg" alt="Chứng nhận" height="40">
      </div>

      <div class="footer-box policy-list">
        <h4>CHÍNH SÁCH</h4>
        <p>Chính sách & quy định</p>
        <p>Chính sách bảo mật</p>
        <p>Điều khoản sử dụng</p>
      </div>

      <div class="footer-box support-form">
        <h4>GỬI GMAIL HỖ TRỢ</h4>
        <input type="text" placeholder="Họ và tên">
        <input type="email" placeholder="Email">
        <textarea rows="3" placeholder="Nội dung cần hỗ trợ"></textarea>
      </div>

      <div class="footer-box">
        <h4>KẾT NỐI</h4>
        <div class="socials">
          <a href="#">Facebook</a>
          <a href="#">Instagram</a>
        </div>
        <h4>PHƯƠNG THỨC THANH TOÁN</h4>
        <div class="payment-icons">
          <img src="https://i.imgur.com/MdFPl5j.png" alt="Visa">
          <img src="https://i.imgur.com/XJSkWdr.png" alt="MasterCard">
          <img src="https://i.imgur.com/bJxUEDY.png" alt="Momo">
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
