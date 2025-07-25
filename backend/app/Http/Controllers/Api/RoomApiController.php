<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Service;
use App\Models\TypeRoom as RoomType;

class RoomApiController extends Controller
{
    // GET /rooms
    public function index()
    {
        $rooms = Room::with('roomType')->get();

        $formatted = $rooms->map(function ($room) {
            return [
                'room_id' => $room->room_id,
                'name' => $room->name,
                'description' => $room->description,
                'price' => $room->price,
                'max_guests' => $room->max_guests,
                'status' => $room->status,
                'room_type_name' => optional($room->roomType)->name ?? 'Không xác định',
                'image' => $room->image ? asset('storage/rooms/' . $room->image) : null,
                'created_at' => $room->created_at
            ];
        });

        return response()->json(['data' => $formatted]);
    }

    // GET /rooms/{id}
    public function show($id)
    {
        $room = Room::with('roomType')->findOrFail($id);

        return response()->json([
            'data' => [
                'room_id' => $room->room_id,
                'name' => $room->name,
                'description' => $room->description,
                'price' => $room->price,
                'max_guests' => $room->max_guests,
                'status' => $room->status,
                'room_type_name' => optional($room->roomType)->name ?? 'Không xác định',
                'image' => $room->image ? asset('storage/rooms/' . $room->image) : null,
                'created_at' => $room->created_at
            ]
        ]);
    }

    // POST /rooms
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_type_id' => 'required|exists:room_types,room_type_id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'max_guests' => 'required|integer|min:1',
            'type' => 'nullable|string',
            'status' => 'required|in:available,unavailable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            $validated['image'] = basename($path);
        }

        $room = Room::create($validated);
        return response()->json(['data' => $room], 201);
    }

    // PUT /rooms/{id}
    public function update(Request $request, $id)
    {
        try {
            $room = Room::findOrFail($id);

            $validated = $request->validate([
                'room_type_id' => 'required|exists:room_types,room_type_id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'max_guests' => 'required|integer|min:1',
                'status' => 'required|in:available,unavailable',
                'image' => 'nullable|image|max:2048'
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('rooms', 'public');
                $validated['image'] = basename($path);
            }

            $room->update($validated);
            return response()->json(['data' => $room]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // DELETE /rooms/{id}
    public function destroy($id)
    {
        Room::destroy($id);
        return response()->json(['message' => '✅ Đã xóa phòng thành công']);
    }

    // Quan hệ
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_service', 'room_id', 'service_id');
    }
    private function getImageUrl($filename)
    {
        return $filename ? asset('storage/rooms/' . $filename) : null;
    }

    public function roomServices()
    {
        return $this->belongsToMany(Service::class, 'room_service', 'room_id', 'service_id');
    }
}
