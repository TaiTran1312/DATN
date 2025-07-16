<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Đăng nhập | The Reverie Saigon</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: Arial, sans-serif; background: #f2f2f2; }
    .container { display: flex; min-height: 100vh; }
    .left {
      flex: 1; background: white; text-align: center; padding: 40px;
      display: flex; flex-direction: column; justify-content: center; align-items: center;
      border-right: 1px solid #eee;
    }
    .left img { width: 250px; margin-bottom: 20px; }
    .left .welcome { font-weight: bold; font-size: 18px; line-height: 1.5; }
    .right { flex: 1; background: white; display: flex; justify-content: center; align-items: center; padding: 40px; }
    .form { width: 100%; max-width: 400px; background: white; padding: 10px; }
    .form h2 { text-align: center; margin-bottom: 20px; }
    .form input[type="text"],
    .form input[type="password"] {
      width: 100%; padding: 12px 16px; margin-bottom: 12px;
      border-radius: 25px; border: 1px solid #ccc; font-size: 14px;
    }
    .btn-login {
      width: 100%; background: #f58020; color: white;
      padding: 12px; border: none; border-radius: 25px;
      font-size: 16px; cursor: pointer; margin-top: 10px;
    }
    .or {
      text-align: center; margin: 20px 0; position: relative;
    }
    .or::before, .or::after {
      content: ""; position: absolute; top: 50%; width: 40%;
      height: 1px; background: #ccc;
    }
    .or::before { left: 0; }
    .or::after { right: 0; }
    .socials {
      display: flex; justify-content: space-between;
    }
    .btn-facebook, .btn-google {
      flex: 1; margin: 5px; padding: 10px;
      border-radius: 25px; border: 1px solid #ccc;
      cursor: pointer; font-size: 14px;
    }
    .btn-facebook { background: #3b5998; color: white; }
    .btn-google { background: #db4437; color: white; }
    .note {
      text-align: center; font-size: 13px; margin-top: 10px; color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Cột trái -->
    <div class="left">
      <img src="https://i.imgur.com/W3fF3GI.png" alt="The Reverie Saigon">
      <p class="welcome">Chào mừng đến với<br><strong>THE REVERIE SAIGON</strong></p>
    </div>

    <!-- Cột phải: form -->
    <div class="right">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <form class="form" action="{{ route('login.process') }}" method="POST">
        @csrf
        <h2>ĐĂNG NHẬP</h2>

        <input type="text" name="email" placeholder="Email / Số điện thoại" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>

        <button type="submit" class="btn-login">Đăng nhập</button>

        <div class="or">Hoặc</div>

        <div class="socials">
          <button type="button" class="btn-facebook">Facebook</button>
          <button type="button" class="btn-google">Google</button>
        </div>

        <div class="note">
          Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
