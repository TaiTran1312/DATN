<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationApiController extends Controller
{
    public function index()
    {
        return response()->json(Notification::with('user')->get());
    }

    public function show($id)
    {
        return response()->json(Notification::with('user')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'title' => 'required|string',
            'message' => 'required|string'
        ]);


        $notification = Notification::create($validated);

        return response()->json($notification, 201);
    }


    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'is_read' => 'boolean'
        ]);

        $notification->update($validated);
        return response()->json($notification);
    }

    public function destroy($id)
    {
        Notification::destroy($id);
        return response()->json(['message' => 'Đã xóa thông báo thành công']);
    }
}
