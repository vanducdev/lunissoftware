<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('order')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $request->input('order', 0);

        $testimonial = Testimonial::create($validated);

        ActivityLog::log('testimonial_created', "Đã thêm đánh giá khách hàng: {$testimonial->name}");

        return redirect()->route('admin.testimonials.index')->with('success', 'Đã thêm đánh giá khách hàng thành công.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $request->input('order', 0);

        $testimonial->update($validated);

        ActivityLog::log('testimonial_updated', "Đã cập nhật đánh giá khách hàng: {$testimonial->name}");

        return redirect()->route('admin.testimonials.index')->with('success', 'Đã cập nhật đánh giá thành công.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $name = $testimonial->name;
        $testimonial->delete();

        ActivityLog::log('testimonial_deleted', "Đã xóa đánh giá của: {$name}");

        return redirect()->route('admin.testimonials.index')->with('success', 'Đã xóa đánh giá.');
    }
}
