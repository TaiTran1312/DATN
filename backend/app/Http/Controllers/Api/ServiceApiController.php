<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceApiController extends Controller
{
    // GET /services
    public function index()
    {
        $services = Service::orderByDesc('service_id')->get();

        $formatted = $services->map(function ($service) {
            return [
                'service_id' => $service->service_id,
                'name' => $service->name,
                'description' => $service->description,
                'price' => $service->price,
                'status' => $service->status,
                'image' => $service->image ? asset('storage/' . $service->image) : null
            ];
        });

        return response()->json(['data' => $formatted]);
    }

    // GET /services/{id}
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return response()->json([
            'data' => [
                'service_id' => $service->service_id,
                'name' => $service->name,
                'description' => $service->description,
                'price' => $service->price,
                'status' => $service->status,
                'image' => $service->image ? asset('storage/' . $service->image) : null
            ]
        ]);
    }

    // POST /services
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = $path;
        }

        $service = Service::create($validated);

        return response()->json(['data' => $service], 201);
    }

    // PUT /services/{id}
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = $path;
        }

        $service->update($validated);

        return response()->json(['data' => $service]);
    }

    // DELETE /services/{id}
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(['message' => '✅ Đã xóa dịch vụ thành công']);
    }
}
