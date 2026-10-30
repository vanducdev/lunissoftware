<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Banner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index(): View
    {
        $banners = Banner::orderBy('order')->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create(): View
    {
        return view('admin.banners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:500'],
            'badge' => ['nullable', 'string', 'max:100'],
            'link_url' => ['nullable', 'string', 'max:255'],
            'link_text' => ['nullable', 'string', 'max:100'],
            'secondary_link_url' => ['nullable', 'string', 'max:255'],
            'secondary_link_text' => ['nullable', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner = Banner::create($validated);

        ActivityLog::log('banner_created', "Đã tạo banner: {$banner->title}");

        return redirect()->route('admin.banners.index')->with('success', "Banner '{$banner->title}' đã được tạo.");
    }

    public function edit(Banner $banner): View
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:500'],
            'badge' => ['nullable', 'string', 'max:100'],
            'link_url' => ['nullable', 'string', 'max:255'],
            'link_text' => ['nullable', 'string', 'max:100'],
            'secondary_link_url' => ['nullable', 'string', 'max:255'],
            'secondary_link_text' => ['nullable', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($validated);

        ActivityLog::log('banner_updated', "Đã cập nhật banner: {$banner->title}");

        return redirect()->route('admin.banners.index')->with('success', "Cập nhật banner '{$banner->title}' thành công.");
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        $title = $banner->title;
        $banner->delete();

        ActivityLog::log('banner_deleted', "Đã xóa banner: {$title}");

        return redirect()->route('admin.banners.index')->with('success', 'Đã xóa banner.');
    }
}
