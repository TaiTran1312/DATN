<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\Service;
use App\Models\User;
use App\Models\Booking;

class DashboardApiController extends Controller
{
    // GET /api/dashboard
    public function index()
    {
        return response()->json([
            'rooms' => Room::with('roomType')->latest()->get(),
            'roomTypes' => TypeRoom::all(),
            'services' => Service::all(),
            'users' => User::latest()->get(),
            'bookings' => Booking::with('room', 'user')->latest()->get(),
        ]);
    }

    // GET /api/dashboard/stats
    public function stats()
    {
        return response()->json([
            'total_rooms' => Room::count(),
            'total_room_types' => TypeRoom::count(),
            'total_services' => Service::count(),
            'total_users' => User::count(),
            'total_bookings' => Booking::count(),
        ]);
    }

    // GET /api/dashboard/chart (tuỳ chọn nếu cần biểu đồ)
    public function chart()
    {
        $monthlyBookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        foreach ($monthlyBookings as $item) {
            $labels[] = 'Tháng ' . $item->month;
            $data[] = $item->total;
        }

        return response()->json([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Lượt đặt phòng theo tháng',
                    'backgroundColor' => '#007bff',
                    'data' => $data
                ]
            ]
        ]);
    }

    // GET /api/dashboard/users (tuỳ chọn bảng xếp hạng)
    public function topUsers()
    {
        $users = User::withCount('bookings')
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();

        return response()->json($users);
    }

    // GET /api/dashboard/groups (tuỳ chọn nếu có nhóm)
    public function topGroups()
    {
        // giả sử có bảng groups hoặc phân loại theo user_type
        $groups = ['Sales', 'Marketing', 'Support', 'Admin', 'Khách hàng'];
        return response()->json($groups);
    }
}
