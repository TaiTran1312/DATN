

@section('body')
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
    }

    .container {
      display: flex;
      min-height: 100vh;
    }

    .left {
      flex: 1;
      background: white;
      text-align: center;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      border-right: 1px solid #eee;
    }

    .left img {
      width: 250px;
      margin-bottom: 20px;
    }

    .left .slogan {
      font-weight: bold;
      font-size: 18px;
      line-height: 1.5;
    }

    .right {
      flex: 1;
      background: white;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .form {
      width: 100%;
      max-width: 400px;
      background: white;
    }

    .form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form input[type="text"],
    .form input[type="password"] {
      width: 100%;
      padding: 12px 16px;
      margin-bottom: 12px;
      border-radius: 25px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .captcha {
      display: flex;
      align-items: center;
      margin: 10px 0;
      font-size: 14px;
    }

    .captcha input {
      margin-right: 8px;
    }

    .captcha img {
      margin-left: auto;
      width: 100px;
    }

    .btn-register {
      width: 100%;
      background: #f58020;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    .or {
      text-align: center;
      margin: 20px 0;
      position: relative;
    }

    .or::before,
    .or::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 40%;
      height: 1px;
      background: #ccc;
    }

    .or::before {
      left: 0;
    }

    .or::after {
      right: 0;
    }

    .socials {
      display: flex;
      justify-content: space-between;
    }

    .btn-facebook,
    .btn-google {
      flex: 1;
      margin: 5px;
      padding: 10px;
      border-radius: 25px;
      border: 1px solid #ccc;
      cursor: pointer;
      font-size: 14px;
    }

    .btn-facebook {
      background: #3b5998;
      color: white;
    }

    .btn-google {
      background: #db4437;
      color: white;
    }
  </style>

<div class="container">
  <div class="left">
    <img src="https://i.imgur.com/W3fF3GI.png" alt="The Reverie Saigon">
    <p class="slogan">Đăng ký tài khoản để<br>đặt phòng ngay</p>
  </div>

  <div class="right">
      @if ($errors->any())
      <div style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
<form class="form" method="POST" action="{{ route('register.store') }}">
@csrf

      <h2>ĐĂNG KÝ</h2>

      <input type="text" name="name" placeholder="Họ tên" value="{{ old('name') }}" required>
      <input type="text" name="email" placeholder="Email / Số điện thoại" value="{{ old('email') }}" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>


      <button type="submit" class="btn-register">Đăng ký</button>

      <div class="or">Hoặc</div>
      <div class="socials">
        <button type="button" class="btn-facebook">Facebook</button>
        <button type="button" class="btn-google">Google</button>
      </div>
    </form>
  </div>
</div>
