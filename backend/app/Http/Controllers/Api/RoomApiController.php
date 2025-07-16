<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomApiController extends Controller
{
    // GET /rooms
    public function index()
    {
        return response()->json(Room::all());
    }

    // GET /rooms/{id}
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    // POST /rooms
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'max_guests' => 'required|integer|min:1',
            'type' => 'nullable|string',
            'status' => 'required|in:available,unavailable'
        ]);

        $room = Room::create($validated);
        return response()->json($room, 201);
    }

    // PUT /rooms/{id}
    public function update(Request $request, $id)
    {
        try {
            $room = Room::findOrFail($id);

            $validated = $request->validate([
                'room_type_id' => 'required|exists:room_types,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'max_guests' => 'required|integer|min:1',
                'status' => 'required|in:available,unavailable'
            ]);

            $room->update($validated);
            return response()->json($room);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    // DELETE /rooms/{id}
    public function destroy($id)
    {
        Room::destroy($id);
        return response()->json(['message' => 'Đã xóa phòng thành công']);
    }
}
