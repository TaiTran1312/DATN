<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewApiController extends Controller
{
    public function index()
    {
        return response()->json(Review::with('user')->orderByDesc('review_id')->get());
    }

    public function show($id)
    {
        $review = Review::with('user')->find($id);
        return $review
            ? response()->json($review)
            : response()->json(['message' => 'Không tìm thấy đánh giá'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'rating'   => 'required|integer|min:1|max:5',
            'content'  => 'required|string',
            'room_id'  => 'nullable|integer',
            'order_id' => 'nullable|integer'
        ]);

        $review = Review::create($validated);
        return response()->json($review, 201);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Không tìm thấy đánh giá'], 404);
        }

        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'content' => 'required|string'
        ]);

        $review->update($validated);
        return response()->json($review);
    }

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
