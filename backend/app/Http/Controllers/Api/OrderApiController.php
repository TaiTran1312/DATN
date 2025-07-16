<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderApiController extends Controller
{
    // ✅ Danh sách đơn hàng
    public function index()
    {
        return response()->json(Order::with('user')->orderByDesc('order_id')->get());
    }

    // ✅ Chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'details.room'])->find($id);
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }
        return response()->json($order);
    }

    // ✅ Tạo đơn hàng mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'payment_gateway_id' => 'nullable|integer',
            'payment_date' => 'nullable|date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string',
            'details' => 'required|array|min:1',
            'details.*.room_id' => 'required|exists:rooms,room_id',
            'details.*.checkin_date' => 'required|date',
            'details.*.checkout_date' => 'required|date|after_or_equal:details.*.checkin_date',
            'details.*.amount' => 'required|numeric|min:0',
            'details.*.status' => 'nullable|string',
            'details.*.booking_date' => 'nullable|date'
        ]);

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $validated['user_id'],
                'payment_gateway_id' => $validated['payment_gateway_id'] ?? null,
                'payment_date' => $validated['payment_date'] ?? null,
                'total_amount' => $validated['total_amount'],
                'status' => $validated['status']
            ]);

            foreach ($validated['details'] as $item) {
                $order->details()->create([
                    'room_id' => $item['room_id'],
                    'checkin_date' => $item['checkin_date'],
                    'checkout_date' => $item['checkout_date'],
                    'amount' => $item['amount'],
                    'status' => $item['status'] ?? 'pending',
                    'booking_date' => $item['booking_date'] ?? now()
                ]);
            }

            DB::commit();
            return response()->json($order->load(['details.room']), 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Lỗi khi tạo đơn hàng', 'error' => $e->getMessage()], 500);
        }
    }

    // ✅ Cập nhật đơn hàng
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        $validated = $request->validate([
            'payment_gateway_id' => 'nullable|integer',
            'payment_date' => 'nullable|date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string'
        ]);

        $order->update($validated);
        return response()->json($order);
    }

    // ✅ Xóa đơn hàng
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Đã xóa đơn hàng thành công']);
    }
}
