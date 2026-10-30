<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $query = Article::published()->with(['category', 'author']);

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->query('category'));
            });
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $articles = $query->orderByDesc('published_at')->paginate(6)->withQueryString();

        $categories = ArticleCategory::where('is_active', true)
            ->withCount(['articles' => function ($q) {
                $q->where('status', 'published');
            }])
            ->orderBy('order')
            ->get();

        $featuredArticles = Article::published()
            ->featured()
            ->with('category')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $currentCategory = $request->filled('category')
            ? ArticleCategory::where('slug', $request->query('category'))->first()
            : null;

        return view('articles.index', compact('articles', 'categories', 'featuredArticles', 'currentCategory'));
    }

    public function show(string $slug): View
    {
        $article = Article::published()
            ->where('slug', $slug)
            ->with(['category', 'author'])
            ->firstOrFail();

        $article->increment('view_count');

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
