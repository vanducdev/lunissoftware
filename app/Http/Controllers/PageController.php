<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\WebsiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(): View
    {
        $stats = [
            'clients' => WebsiteSetting::get('stat_clients', '15,000+'),
            'products' => WebsiteSetting::get('stat_products', '12+'),
            'users' => WebsiteSetting::get('stat_users', '50,000+'),
            'years' => WebsiteSetting::get('stat_years', '6+'),
        ];

        return view('pages.about', compact('stats'));
    }

    public function contact(Request $request): View
    {
        $selectedProduct = $request->query('product');
        $products = Product::published()->orderBy('order')->get();

        $settings = [
            'hotline' => WebsiteSetting::get('contact_hotline', '1900 886 996'),
            'phone' => WebsiteSetting::get('contact_phone', '+84 988 123 456'),
            'email' => WebsiteSetting::get('contact_email', 'contact@lushsoftware.vn'),
            'address' => WebsiteSetting::get('contact_address', 'Tầng 18, Tòa nhà Công Nghệ Cao Lush Tower, Cầu Giấy, Hà Nội'),
            'hours' => WebsiteSetting::get('working_hours', 'Thứ 2 - Thứ 7: 08:00 - 18:00'),
            'telegram' => WebsiteSetting::get('social_telegram', 'https://t.me/lushsoftware_official'),
            'facebook' => WebsiteSetting::get('social_facebook', 'https://facebook.com/lushsoftware'),
        ];

        return view('pages.contact', compact('products', 'selectedProduct', 'settings'));
    }

    public function submitContact(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'company' => ['nullable', 'string', 'max:255'],
            'product_interest' => ['nullable', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $message = ContactMessage::create($validated);

        ActivityLog::log('contact_submitted', "Khách hàng {$validated['name']} ({$validated['email']}) đã gửi yêu cầu tư vấn.");

        $successMsg = __('Your message has been sent successfully! Our team will contact you shortly.');

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMsg,
            ]);
        }

        return redirect()->back()->with('success', $successMsg);
    }

    public function terms(): View
    {
        return view('pages.terms');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }
}
