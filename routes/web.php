<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminTranslationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - LushSoftware
|--------------------------------------------------------------------------
*/

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
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// Admin Dashboard Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Products CRUD
    Route::resource('products', AdminProductController::class);

    // Articles CRUD
    Route::resource('articles', AdminArticleController::class);

    // Banners CRUD
    Route::resource('banners', AdminBannerController::class);

    // Customers Management
    Route::get('customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::patch('customers/{user}/status', [AdminCustomerController::class, 'toggleStatus'])->name('customers.toggle-status');
    Route::patch('customers/{user}/role', [AdminCustomerController::class, 'toggleRole'])->name('customers.toggle-role');
    Route::delete('customers/{user}', [AdminCustomerController::class, 'destroy'])->name('customers.destroy');

    // Contacts Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::put('contacts/{contact}', [AdminContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Website Settings
    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [AdminSettingController::class, 'update'])->name('settings.update');

    // Multi-language Translations
    Route::get('translations', [AdminTranslationController::class, 'index'])->name('translations.index');
    Route::post('translations', [AdminTranslationController::class, 'update'])->name('translations.update');
});
