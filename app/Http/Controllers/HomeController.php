<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Testimonial;
use App\Models\WebsiteSetting;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $heroBanner = Banner::where('position', 'home_hero')
            ->where('is_active', true)
            ->orderBy('order')
            ->first();

        $categories = ProductCategory::where('is_active', true)
            ->orderBy('order')
            ->withCount(['products' => function ($query) {
                $query->where('status', 'published');
            }])
            ->get();

        $featuredProducts = Product::published()
            ->with(['category', 'features', 'pricings'])
            ->orderBy('order')
            ->take(6)
            ->get();

        $stats = [
            'clients' => WebsiteSetting::get('stat_clients', '15,000+'),
            'products' => WebsiteSetting::get('stat_products', '12+'),
            'users' => WebsiteSetting::get('stat_users', '50,000+'),
            'years' => WebsiteSetting::get('stat_years', '6+'),
            'satisfaction' => WebsiteSetting::get('stat_satisfaction', '99.2%'),
        ];

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->get();

        $latestArticles = Article::published()
            ->with(['category', 'author'])
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $partners = Partner::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('home', compact(
            'heroBanner',
            'categories',
            'featuredProducts',
            'stats',
            'testimonials',
            'latestArticles',
            'partners'
        ));
    }
}
