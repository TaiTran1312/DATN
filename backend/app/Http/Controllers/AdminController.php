<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Hiển thị form đăng nhập admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Xử lý đăng nhập admin
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, kiểm tra role
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Bạn không có quyền truy cập trang này.',
                ])->withInput();
            }
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->withInput();
    }

    // Đăng xuất admin
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    // Hiển thị trang dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
