<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: #fff;
            padding: 32px 28px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            width: 350px;
        }
        .login-title {
            font-weight: bold;
            margin-bottom: 24px;
            text-align: center;
        }
        .form-control:focus {
            box-shadow: 0 0 0 2px #007bff33;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <h2 class="login-title">Đăng nhập Admin</h2>
        @if ($errors->any())
            <div class="alert alert-danger py-2">
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.login.process') }}" autocomplete="on">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email"
                       name="email"
                       id="email"
                       class="form-control"
                       required
                       value="{{ old('email') }}"
                       autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       required
                       autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        </form>
    </div>
</div>
</body>
</html>
