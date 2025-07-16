<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class PageController extends Controller
{
    public function index()
    {
        // Lấy danh sách phòng có trạng thái 'available' và phân trang 8 phòng mỗi trang
        $rooms = Room::where('status', 'available')->paginate(4);

        return view('home', compact('rooms'));
    }

    public function roomDetail($id)
    {
        // Lấy chi tiết phòng theo ID
        $room = Room::findOrFail($id);

        // Gợi ý 3 phòng khác
        $relatedRooms = Room::where('room_id', '!=', $id)->take(3)->get();

        return view('room_detail', compact('room', 'relatedRooms'));
    }
}
