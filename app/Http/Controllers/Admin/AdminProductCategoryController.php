<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminProductCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ProductCategory::withCount('products')->orderBy('order')->get();

        return view('admin.product_categories.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'order' => ['nullable', 'integer'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $originalSlug = $validated['slug'];
        $count = 1;
        while (ProductCategory::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = "{$originalSlug}-".$count++;
        }

        $validated['order'] = $request->input('order', 0);
        $category = ProductCategory::create($validated);

        ActivityLog::log('product_category_created', "Đã tạo danh mục sản phẩm: {$category->name}");

        return back()->with('success', "Đã tạo danh mục '{$category->name}'.");
    }

    public function update(Request $request, ProductCategory $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('product_categories')->ignore($category->id)],
            'description' => ['nullable', 'string', 'max:500'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $category->update($validated);

        ActivityLog::log('product_category_updated', "Đã cập nhật danh mục: {$category->name}");

        return back()->with('success', 'Đã cập nhật danh mục thành công.');
    }

    public function destroy(ProductCategory $category): RedirectResponse
    {
        $name = $category->name;
        $category->delete();

        ActivityLog::log('product_category_deleted', "Đã xóa danh mục: {$name}");

        return back()->with('success', 'Đã xóa danh mục.');
    }
}
