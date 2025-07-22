<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostApiController extends Controller
{
    // GET /posts
    public function index()
    {
        $posts = Post::with('user')->orderByDesc('post_id')->get();

        $formatted = $posts->map(function ($post) {
            return [
                'post_id' => $post->post_id,
                'title' => $post->title,
                'content' => $post->content,
                'image' => $post->image ? asset('storage/' . $post->image) : null,
                'user_id' => $post->user_id,
                'author' => optional($post->user)->name ?? 'Không xác định',
                'created_at' => optional($post->created_at)->format('d/m/Y H:i')
            ];
        });

        return response()->json(['data' => $formatted]);
    }

    // GET /posts/{id}
    public function show($id)
    {
        $post = Post::with('user')->find($id);

        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }

        return response()->json([
            'data' => [
                'post_id' => $post->post_id,
                'title' => $post->title,
                'content' => $post->content,
                'image' => $post->image ? asset('storage/' . $post->image) : null,
                'user_id' => $post->user_id,
                'author' => optional($post->user)->name ?? 'Không xác định',
                'created_at' => optional($post->created_at)->format('d/m/Y H:i')
            ]
        ]);
    }

    // POST /posts
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        $post = Post::create($validated);

        return response()->json(['data' => $post], 201);
    }

    // PUT /posts/{id}
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        $post->update($validated);
        return response()->json(['data' => $post]);
    }

    // DELETE /posts/{id}
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Đã xóa bài viết thành công']);
    }
}
