<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminArticleController extends Controller
{
    public function index(Request $request): View
    {
        $query = Article::with(['category', 'author']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $articles = $query->orderByDesc('created_at')->paginate(10)->withQueryString();
        $categories = ArticleCategory::orderBy('order')->get();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create(): View
    {
        $categories = ArticleCategory::where('is_active', true)->orderBy('order')->get();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:article_categories,id'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,scheduled'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Article::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = "{$originalSlug}-".$count++;
        }

        $validated['author_id'] = Auth::id();
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['published_at'] = $validated['published_at'] ?? now();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('articles', 'public');
        }

        $article = Article::create($validated);

        ActivityLog::log('article_created', "Đã tạo bài viết mới: {$article->title}");

        return redirect()->route('admin.articles.index')->with('success', "Bài viết '{$article->title}' đã được tạo thành công.");
    }

    public function edit(Article $article): View
    {
        $categories = ArticleCategory::where('is_active', true)->orderBy('order')->get();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('articles')->ignore($article->id)],
            'category_id' => ['nullable', 'exists:article_categories,id'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,scheduled'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('articles', 'public');
        }

        $article->update($validated);

        ActivityLog::log('article_updated', "Đã cập nhật bài viết: {$article->title}");

        return redirect()->route('admin.articles.index')->with('success', "Cập nhật bài viết '{$article->title}' thành công.");
    }

    public function destroy(Article $article): RedirectResponse
    {
        $title = $article->title;
        $article->delete();

        ActivityLog::log('article_deleted', "Đã xóa bài viết: {$title}");

        return redirect()->route('admin.articles.index')->with('success', "Đã xóa bài viết '{$title}'.");
    }
}
