<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_articles' => Article::count(),
            'pending_contacts' => ContactMessage::where('status', 'pending')->count(),
            'total_contacts' => ContactMessage::count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('payment_status', 'pending')->count(),
            'total_revenue' => Order::where('payment_status', 'paid')->sum('amount'),
        ];

        // 7-day inquiries distribution
        $dailyInquiries = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dayLabel = $date->locale('vi')->isoFormat('dddd');
            $count = ContactMessage::whereDate('created_at', $date->toDateString())->count();
            $dailyInquiries[] = [
                'day' => ucfirst($dayLabel),
                'date' => $date->format('d/m'),
                'count' => $count,
                'height' => min(100, max(15, ($count + 1) * 20)),
            ];
        }

        $recentContacts = ContactMessage::orderByDesc('created_at')->take(5)->get();
        $recentOrders = Order::orderByDesc('created_at')->take(5)->get();
        $recentActivities = ActivityLog::with('user')->orderByDesc('created_at')->take(8)->get();
        $recentArticles = Article::with('category')->orderByDesc('created_at')->take(4)->get();

        // SEO Health Audit
        $articlesTotal = Article::count();
        $articlesOptimized = Article::whereNotNull('focus_keyword')->where('focus_keyword', '!=', '')->count();
        $productsTotal = Product::count();
        $productsOptimized = Product::whereNotNull('focus_keyword')->where('focus_keyword', '!=', '')->count();

        $seoAudit = [
            'articles_total' => $articlesTotal,
            'articles_optimized' => $articlesOptimized,
            'articles_percent' => $articlesTotal > 0 ? round(($articlesOptimized / $articlesTotal) * 100) : 100,
            'products_total' => $productsTotal,
            'products_optimized' => $productsOptimized,
            'products_percent' => $productsTotal > 0 ? round(($productsOptimized / $productsTotal) * 100) : 100,
            'sitemap_urls' => 10 + $productsTotal + $articlesTotal,
            'overall_health_score' => 96,
        ];

        return view('admin.dashboard', compact('stats', 'dailyInquiries', 'recentContacts', 'recentOrders', 'recentActivities', 'recentArticles', 'seoAudit'));
    }
}
