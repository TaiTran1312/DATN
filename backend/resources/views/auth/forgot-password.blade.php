@extends('user')

@section('body')
<div class="container3">
    <div class="login-box">
        <h2>Quên Mật Khẩu</h2>
        <p>Nhập email để nhận link đặt lại mật khẩu</p>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>

            <button type="submit" class="btn-login">Gửi Link</button>

            <p class="signup-link">
                <a href="{{ route('login') }}">Quay lại đăng nhập</a>
            </p>
        </form>
    </div>
</div>
@endsection
