<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserApiController extends Controller
{
    // ✅ Danh sách người dùng (trả mảng trực tiếp)
    public function index()
    {
        $users = User::select([
            'user_id',
            'name',
            'email',
            'phone',
            'avatar',
            'address',
            'role',
            'status',
            'created_at',
            'updated_at'
        ])->orderByDesc('user_id')->get();

        return response()->json($users);
    }

    // ✅ Tạo mới người dùng
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone'    => 'nullable|string|max:20',
            'avatar'   => 'nullable|string',
            'address'  => 'nullable|string|max:255',
            'role'     => 'required|string',
            'status'   => 'required|string'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return response()->json($user, 201);
    }

    // ✅ Chi tiết người dùng
    public function show($id)
    {
        $user = User::where('user_id', $id)->first();
        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }

        return response()->json($user);
    }

    // ✅ Cập nhật thông tin
    public function update(Request $request, $id)
    {
        $user = User::where('user_id', $id)->first();
        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }

        $validated = $request->validate([
            'name'     => 'nullable|string|max:255',
            'email'    => ['nullable', 'email', Rule::unique('users')->ignore($id, 'user_id')],
            'phone'    => 'nullable|string|max:20',
            'avatar'   => 'nullable|string',
            'address'  => 'nullable|string|max:255',
            'role'     => 'nullable|string',
            'status'   => 'nullable|string'
        ]);

        $user->update($validated);
        return response()->json($user);
    }

    // ✅ Xóa người dùng
    public function destroy($id)
    {
        $user = User::where('user_id', $id)->first();
        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'Đã xóa người dùng thành công']);
    }
}
