<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Partner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminPartnerController extends Controller
{
    public function index(): View
    {
        $partners = Partner::orderBy('order')->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create(): View
    {
        return view('admin.partners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $request->input('order', 0);

        $partner = Partner::create($validated);

        ActivityLog::log('partner_created', "Đã thêm đối tác: {$partner->name}");

        return redirect()->route('admin.partners.index')->with('success', 'Đã thêm đối tác thành công.');
    }

    public function edit(Partner $partner): View
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $request->input('order', 0);

        $partner->update($validated);

        ActivityLog::log('partner_updated', "Đã cập nhật đối tác: {$partner->name}");

        return redirect()->route('admin.partners.index')->with('success', 'Đã cập nhật đối tác thành công.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        $name = $partner->name;
        $partner->delete();

        ActivityLog::log('partner_deleted', "Đã xóa đối tác: {$name}");

        return redirect()->route('admin.partners.index')->with('success', 'Đã xóa đối tác.');
    }
}
