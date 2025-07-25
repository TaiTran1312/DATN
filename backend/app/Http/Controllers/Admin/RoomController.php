<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('roomType')->latest()->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $roomTypes = TypeRoom::all();
        return view('admin.rooms.create', compact('roomTypes'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('rooms', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('room_gallery', 'public');
            }
            $validated['gallery'] = json_encode($gallery);
        }

        $room = Room::create($validated);

        return redirect()->route('admin.rooms.index')->with('success', '✅ Thêm phòng thành công!');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $roomTypes = TypeRoom::all();
        return view('admin.rooms.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'max_guests' => 'required|integer',
            'room_type_id' => 'required|exists:room_types,room_type_id',
            'status' => 'required|in:available,unavailable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('rooms', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('room_gallery', 'public');
            }
            $validated['gallery'] = json_encode($gallery);
        }

        $room->update($validated);

        return redirect()->route('admin.rooms.index')->with('success', '✅ Cập nhật phòng thành công!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', '✅ Xóa phòng thành công!');
    }
}
