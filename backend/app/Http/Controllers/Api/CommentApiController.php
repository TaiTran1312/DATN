<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentApiController extends Controller
{
    // GET /comments
    public function index()
    {
        return response()->json(Comment::with('user')->get());
    }

    // GET /comments/{id}
    public function show($id)
    {
        $comment = Comment::with('user')->findOrFail($id);
        return response()->json($comment);
    }

    // POST /comments
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id() ?? 1, // fallback nếu chưa có auth
            'body' => $validated['body']
        ]);

        return response()->json($comment, 201);
    }

    // PUT /comments/{id}
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $validated = $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->update($validated);
        return response()->json($comment);
    }

    // DELETE /comments/{id}
    public function destroy($id)
    {
        Comment::destroy($id);
        return response()->json(['message' => 'Đã xóa bình luận thành công']);
    }
}
