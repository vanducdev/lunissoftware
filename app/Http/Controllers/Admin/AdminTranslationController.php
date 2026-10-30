<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminTranslationController extends Controller
{
    public function index(Request $request): View
    {
        $selectedLocale = $request->query('locale', 'vi');
        if (! in_array($selectedLocale, ['vi', 'en', 'zh', 'ko'], true)) {
            $selectedLocale = 'vi';
        }

        $path = base_path("lang/{$selectedLocale}.json");
        $translations = File::exists($path) ? json_decode(File::get($path), true) : [];

        return view('admin.translations.index', compact('translations', 'selectedLocale'));
    }

    public function update(Request $request): RedirectResponse
    {
        $selectedLocale = $request->input('locale', 'vi');
        if (! in_array($selectedLocale, ['vi', 'en', 'zh', 'ko'], true)) {
            $selectedLocale = 'vi';
        }

        $items = $request->input('translations', []);
        $path = base_path("lang/{$selectedLocale}.json");

        File::put($path, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        ActivityLog::log('translations_updated', "Đã cập nhật bản dịch ngôn ngữ: {$selectedLocale}");

        return back()->with('success', "Đã lưu bản dịch cho ngôn ngữ [{$selectedLocale}] thành công.");
    }
}
