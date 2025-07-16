<?php
namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'price' => 'required|numeric'
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Thêm dịch vụ thành công!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required', 'price' => 'required|numeric'
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Cập nhật dịch vụ thành công!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Xóa dịch vụ thành công!');
    }
}
