<?php

use App\Http\Controllers\Admin\AdminActivityLogController;
use App\Http\Controllers\Admin\AdminArticleCategoryController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminProductCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminTranslationController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - LushSoftware
|--------------------------------------------------------------------------
*/

// SEO Sitemap XML
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Public Live Search API (Rate-limited)
Route::middleware('throttle:60,1')->get('api/search', [SearchController::class, 'search'])->name('api.search');

// Localization Switcher
Route::get('lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions.index');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
Route::get('/news', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/news/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/downloads/file/{file}', [DownloadController::class, 'downloadDirect'])->name('downloads.direct')->where('file', '.*');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

// Checkout & License Lookup
Route::post('/checkout/create-order', [OrderController::class, 'createOrder'])->name('checkout.create');
Route::post('/checkout/confirm-order/{order_code}', [OrderController::class, 'confirmPayment'])->name('checkout.confirm');
Route::get('/license-check', [OrderController::class, 'licenseCheck'])->name('license.check');

// Admin Authentication Routes (/lush-admin)
Route::get('/lush-admin', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/lush-admin', [AuthController::class, 'login']);

// Legacy / Redirect Routes (Disabling public register and redirecting to admin portal)
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', fn () => redirect()->route('home'))->name('register');
Route::post('/register', fn () => redirect()->route('home'));
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', fn () => redirect()->route('home'))->name('profile');
});

// Admin Dashboard Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Products CRUD & Product Categories
    Route::delete('products/{product}/images/{image}', [AdminProductController::class, 'deleteImage'])->name('products.images.destroy');
    Route::resource('products', AdminProductController::class);
    Route::resource('product-categories', AdminProductCategoryController::class)->except(['create', 'edit', 'show']);

    // Articles CRUD & Article Categories
    Route::resource('articles', AdminArticleController::class);
    Route::resource('article-categories', AdminArticleCategoryController::class)->except(['create', 'edit', 'show']);

    // Banners, Testimonials, Partners & Media Library CRUD
    Route::resource('banners', AdminBannerController::class);
    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);
    Route::resource('partners', AdminPartnerController::class)->except(['show']);
    Route::resource('media', AdminMediaController::class)->only(['index', 'store', 'destroy']);

    // Customers Management
    Route::get('customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::patch('customers/{user}/status', [AdminCustomerController::class, 'toggleStatus'])->name('customers.toggle-status');
    Route::patch('customers/{user}/role', [AdminCustomerController::class, 'toggleRole'])->name('customers.toggle-role');
    Route::delete('customers/{user}', [AdminCustomerController::class, 'destroy'])->name('customers.destroy');

    // Orders & License Management
    Route::get('orders/export', [AdminOrderController::class, 'export'])->name('orders.export');
    Route::post('orders/{order}/approve', [AdminOrderController::class, 'approvePayment'])->name('orders.approve');
    Route::resource('orders', AdminOrderController::class);

    // Contacts Management & CSV Export
    Route::get('contacts/export', [AdminContactController::class, 'export'])->name('contacts.export');
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::put('contacts/{contact}', [AdminContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Website Settings & Cache Clear
    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [AdminSettingController::class, 'update'])->name('settings.update');
    Route::post('settings/clear-cache', [AdminSettingController::class, 'clearCache'])->name('settings.clear-cache');

    // Multi-language Translations
    Route::get('translations', [AdminTranslationController::class, 'index'])->name('translations.index');
    Route::post('translations', [AdminTranslationController::class, 'update'])->name('translations.update');

    // System Activity Logs
    Route::get('activity-logs', [AdminActivityLogController::class, 'index'])->name('activity-logs.index');
});
