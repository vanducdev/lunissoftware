<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\ArticleCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminArticleCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ArticleCategory::withCount('articles')->orderBy('order')->get();

        return view('admin.article_categories.index', compact('categories'));
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
        while (ArticleCategory::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = "{$originalSlug}-".$count++;
        }

        $validated['order'] = $request->input('order', 0);
        $category = ArticleCategory::create($validated);

        ActivityLog::log('article_category_created', "Đã tạo chuyên mục bài viết: {$category->name}");

        return back()->with('success', "Đã tạo chuyên mục '{$category->name}'.");
    }

    public function update(Request $request, ArticleCategory $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('article_categories')->ignore($category->id)],
            'description' => ['nullable', 'string', 'max:500'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $category->update($validated);

        ActivityLog::log('article_category_updated', "Đã cập nhật chuyên mục: {$category->name}");

        return back()->with('success', 'Đã cập nhật chuyên mục thành công.');
    }

    public function destroy(ArticleCategory $category): RedirectResponse
    {
        $name = $category->name;
        $category->delete();

        ActivityLog::log('article_category_deleted', "Đã xóa chuyên mục: {$name}");

        return back()->with('success', 'Đã xóa chuyên mục.');
    }
}
