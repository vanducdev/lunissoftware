<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\ContactMessage;
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
        $recentActivities = ActivityLog::with('user')->orderByDesc('created_at')->take(8)->get();
        $recentArticles = Article::with('category')->orderByDesc('created_at')->take(4)->get();

        return view('admin.dashboard', compact('stats', 'dailyInquiries', 'recentContacts', 'recentActivities', 'recentArticles'));
    }
}
