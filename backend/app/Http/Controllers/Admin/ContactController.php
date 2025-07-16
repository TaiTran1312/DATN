<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Hiển thị danh sách liên hệ
    public function index()
    {
        $contacts = Contact::orderByDesc('contact_id')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('admin.contacts.create');
    }

    // Lưu liên hệ mới
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Thêm liên hệ thành công!');
    }

    // Hiển thị form cập nhật
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    // Cập nhật liên hệ
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Cập nhật liên hệ thành công!');
    }
}
