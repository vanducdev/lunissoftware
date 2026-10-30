<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request): View
    {
        $query = ContactMessage::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%");
            });
        }

        $messages = $query->orderByDesc('created_at')->paginate(12)->withQueryString();

        return view('admin.contacts.index', compact('messages'));
    }

    public function show(ContactMessage $contact): View
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function update(Request $request, ContactMessage $contact): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,processing,resolved'],
            'admin_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $contact->update($validated);

        ActivityLog::log('contact_updated', "Đã cập nhật yêu cầu liên hệ #{$contact->id} ({$contact->name}) trạng thái: {$contact->status}");

        return back()->with('success', 'Đã cập nhật trạng thái yêu cầu liên hệ.');
    }

    public function destroy(ContactMessage $contact): RedirectResponse
    {
        $name = $contact->name;
        $contact->delete();

        ActivityLog::log('contact_deleted', "Đã xóa yêu cầu liên hệ từ: {$name}");

        return redirect()->route('admin.contacts.index')->with('success', 'Đã xóa yêu cầu liên hệ.');
    }
}
