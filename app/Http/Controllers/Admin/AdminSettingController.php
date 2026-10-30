<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\WebsiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminSettingController extends Controller
{
    public function index(): View
    {
        $settings = WebsiteSetting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $fields = [
            'site_name',
            'site_tagline',
            'contact_email',
            'contact_hotline',
            'contact_phone',
            'contact_address',
            'working_hours',
            'social_facebook',
            'social_telegram',
            'social_youtube',
            'social_github',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'stat_clients',
            'stat_products',
            'stat_users',
            'stat_years',
            'stat_satisfaction',
            'default_locale',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                WebsiteSetting::set($field, $request->input($field));
            }
        }

        ActivityLog::log('settings_updated', 'Đã cập nhật cấu hình chung website LushSoftware.');

        return back()->with('success', 'Đã lưu cấu hình website thành công.');
    }

    public function clearCache(): RedirectResponse
    {
        Artisan::call('optimize:clear');
        ActivityLog::log('cache_cleared', 'Đã xóa toàn bộ bộ nhớ đệm cache hệ thống.');

        return back()->with('success', 'Đã xóa sạch bộ nhớ cache, view compiled và config thành công!');
    }
}
