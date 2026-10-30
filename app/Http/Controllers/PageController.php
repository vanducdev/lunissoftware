<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmitRequest;
use App\Models\Product;
use App\Models\WebsiteSetting;
use App\Services\ContactService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(
        protected ContactService $contactService
    ) {}

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
        $products = Product::where('is_active', true)->orderBy('sort_order')->get();

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

    public function submitContact(ContactSubmitRequest $request): JsonResponse|RedirectResponse
    {
        $this->contactService->handleSubmission(
            $request->validated(),
            $request->ip(),
            $request->userAgent()
        );

        $successMsg = __('Your message has been sent successfully! Our team will contact you shortly.');

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMsg,
            ]);
        }

        return redirect()->route('contact')->with('success', $successMsg);
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
