<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $products = Product::where('status', 'active')->orderByDesc('updated_at')->get();
        $articles = Article::published()->orderByDesc('updated_at')->get();
        $categories = ArticleCategory::where('is_active', true)->orderBy('order')->get();

        $staticRoutes = [
            route('home'),
            route('products.index'),
            route('solutions.index'),
            route('pricing.index'),
            route('articles.index'),
            route('about'),
            route('contact'),
            route('downloads.index'),
            route('terms'),
            route('privacy'),
        ];

        $xml = view('sitemap', compact('products', 'articles', 'categories', 'staticRoutes'))->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
