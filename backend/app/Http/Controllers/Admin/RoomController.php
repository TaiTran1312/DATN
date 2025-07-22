<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'max_guests' => 'required|integer',
            'room_type_id' => 'required|exists:room_types,room_type_id',
            'status' => 'required|in:available,unavailable',
            'image' => 'nullable|image',
            'gallery.*' => 'nullable|image'
        ]);

        // Xử lý lưu ảnh vào storage nếu có
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('rooms');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('rooms');
            }
            $validated['gallery'] = json_encode($gallery);
        }

        $room = Room::create($validated);

        return response()->json(['success' => true, 'data' => $room]);
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Cập nhật phòng thành công!');
    }

    public function destroy($id)
    {
        Room::destroy($id);
        return redirect()->route('rooms.index')->with('success', 'Xóa phòng thành công!');
    }
}
