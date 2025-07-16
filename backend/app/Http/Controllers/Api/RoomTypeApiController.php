<?php
namespace App\Http\Controllers\Api;

use App\Models\TypeRoom as RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypeApiController extends Controller
{
    public function index()
    {
        return response()->json(RoomType::all());
    }

    // ✅ Chi tiết loại phòng
    public function show($id)
    {
        $type = RoomType::find($id);

        if (!$type) {
            return response()->json(['message' => 'Không tìm thấy loại phòng'], 404);
        }

        return response()->json($type);
    }

    // ✅ Thêm mới loại phòng
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        try {
            $type = RoomType::create($validated);
            return response()->json($type, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi tạo loại phòng'], 500);
        }
    }

     public function update(Request $request, $id)
    {
        $type = RoomType::find($id);

        if (!$type) {
            return response()->json(['message' => 'Không tìm thấy loại phòng'], 404);
        }

        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        try {
            $type->update($validated);
            return response()->json($type);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi cập nhật loại phòng'], 500);
        }
    }

    // ✅ Xóa loại phòng
    public function destroy($id)
    {
        $type = RoomType::find($id);

        if (!$type) {
            return response()->json(['message' => 'Không tìm thấy loại phòng'], 404);
        }

        $type->delete();
        return response()->json(['message' => 'Đã xóa loại phòng thành công']);
    }
}
