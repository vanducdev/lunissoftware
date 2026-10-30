<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * Get active featured products with eager-loaded relations to eliminate N+1.
     */
    public function getFeaturedProducts(int $limit = 6): Collection
    {
        return Product::with(['category', 'features'])
            ->published()
            ->featured()
            ->orderBy('order')
            ->take($limit)
            ->get();
    }

    /**
     * Get paginated products for catalog with filtering and search.
     */
    public function getCatalog(Request $request, int $perPage = 12): LengthAwarePaginator
    {
        $query = Product::with(['category', 'pricings'])
            ->published();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('q')) {
            $term = $request->q;
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('tagline', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%");
            });
        }

        return $query->orderBy('order')->paginate($perPage)->withQueryString();
    }

    /**
     * Real-time live search matching both Products and Articles for auto-complete.
     */
    public function liveSearch(string $term, int $limit = 6): array
    {
        if (trim($term) === '') {
            return ['products' => [], 'articles' => []];
        }

        $products = Product::published()
            ->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('tagline', 'like', "%{$term}%");
            })
            ->take($limit)
            ->get()
            ->map(fn ($p) => [
                'id' => $p->id,
                'title' => $p->name,
                'subtitle' => $p->tagline,
                'category' => $p->category?->name ?? 'Software',
                'url' => route('products.show', $p->slug),
                'icon' => $p->logo,
            ]);

        $articles = Article::where('status', 'published')
            ->where(function ($q) use ($term) {
                $q->where('title', 'like', "%{$term}%")
                    ->orWhere('summary', 'like', "%{$term}%");
            })
            ->take($limit)
            ->get()
            ->map(fn ($a) => [
                'id' => $a->id,
                'title' => $a->title,
                'subtitle' => $a->category?->name ?? 'Tin tức',
                'category' => 'Bài viết',
                'url' => route('articles.show', $a->slug),
                'thumbnail' => $a->thumbnail_url,
            ]);

        return [
            'products' => $products,
            'articles' => $articles,
        ];
    }
}
