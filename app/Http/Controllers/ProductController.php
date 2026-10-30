<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::published()->with(['category', 'features', 'pricings']);

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->query('category'));
            });
        }

        // Search by keyword
        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('tagline', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sort
        $sort = $request->query('sort', 'order');
        if ($sort === 'popular') {
            $query->orderByDesc('view_count');
        } elseif ($sort === 'newest') {
            $query->orderByDesc('created_at');
        } elseif ($sort === 'name') {
            $query->orderBy('name');
        } else {
            $query->orderBy('order')->orderBy('id');
        }

        $products = $query->paginate(9)->withQueryString();

        $categories = ProductCategory::where('is_active', true)
            ->withCount(['products' => function ($q) {
                $q->where('status', 'published');
            }])
            ->orderBy('order')
            ->get();

        $currentCategory = $request->filled('category')
            ? ProductCategory::where('slug', $request->query('category'))->first()
            : null;

        return view('products.index', compact('products', 'categories', 'currentCategory'));
    }

    public function show(string $slug): View
    {
        $product = Product::published()
            ->where('slug', $slug)
            ->with(['category', 'features', 'images', 'pricings', 'faqs'])
            ->firstOrFail();

        // Increment view count
        $product->increment('view_count');

        // Related products in same category
        $relatedProducts = Product::published()
            ->where('id', '!=', $product->id)
            ->where('category_id', $product->category_id)
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
