<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewApiController extends Controller
{
    // Lấy tất cả đánh giá
    public function index()
    {
        $reviews = Review::with('user')->orderByDesc('review_id')->get();
        return response()->json($reviews);
    }

    // Lấy chi tiết 1 đánh giá
    public function show($id)
    {
        $review = Review::with('user')->find($id);
        if (!$review) {
            return response()->json(['message' => 'Không tìm thấy đánh giá'], 404);
        }
        return response()->json($review);
    }

    // Thêm đánh giá mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'room_id'  => 'nullable|integer',
            'order_id' => 'nullable|integer',
            'rating'   => 'required|integer|min:1|max:5',
            'content'  => 'required|string'
        ]);

        $review = Review::create($validated);
        return response()->json($review, 201);
    }

    // Cập nhật đánh giá
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Không tìm thấy đánh giá'], 404);
        }

        $validated = $request->validate([
            'room_id'  => 'nullable|integer',
            'order_id' => 'nullable|integer',
            'rating'   => 'required|integer|min:1|max:5',
            'content'  => 'required|string'
        ]);

        $review->update($validated);
        return response()->json($review);
    }

    // Xóa mềm đánh giá
    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Không tìm thấy đánh giá'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Đã xóa đánh giá thành công']);
    }
}
