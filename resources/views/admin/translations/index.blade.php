@extends('layouts.admin')

@section('page_title', 'Quản Lý Bản Dịch Đa Ngôn Ngữ')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Bản Dịch Đa Ngôn Ngữ Hệ Thống</h2>
            <p class="text-xs text-[#718096]">Quản lý và chỉnh sửa trực tiếp các chuỗi từ vựng cho 4 ngôn ngữ (Tiếng Việt, English, 中文, 한국어)</p>
        </div>

        <!-- Language switch tabs -->
        <div class="flex items-center gap-1.5 p-1 bg-white dark:bg-[#131D27] rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D]">
            <a href="{{ route('admin.translations.index', ['locale' => 'vi']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold transition-colors {{ $selectedLocale === 'vi' ? 'bg-[#168BD2] text-white shadow-sm' : 'text-[#718096] hover:text-[#172B3A]' }}">
                Tiếng Việt (VI)
            </a>
            <a href="{{ route('admin.translations.index', ['locale' => 'en']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold transition-colors {{ $selectedLocale === 'en' ? 'bg-[#168BD2] text-white shadow-sm' : 'text-[#718096] hover:text-[#172B3A]' }}">
                English (EN)
            </a>
            <a href="{{ route('admin.translations.index', ['locale' => 'zh']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold transition-colors {{ $selectedLocale === 'zh' ? 'bg-[#168BD2] text-white shadow-sm' : 'text-[#718096] hover:text-[#172B3A]' }}">
                中文 (ZH)
            </a>
            <a href="{{ route('admin.translations.index', ['locale' => 'ko']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold transition-colors {{ $selectedLocale === 'ko' ? 'bg-[#168BD2] text-white shadow-sm' : 'text-[#718096] hover:text-[#172B3A]' }}">
                한국어 (KO)
            </a>
        </div>
    </div>

    <!-- Translations Editor Form -->
    <div class="lush-card p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.translations.update') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="locale" value="{{ $selectedLocale }}">

            <div class="flex items-center justify-between pb-4 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                <div>
                    <span class="text-xs uppercase font-bold text-[#168BD2]">Đang chỉnh sửa:</span>
                    <span class="text-sm font-bold text-[#172B3A] dark:text-white ml-1">
                        @if($selectedLocale === 'vi') Tiếng Việt (lang/vi.json)
                        @elseif($selectedLocale === 'en') English (lang/en.json)
                        @elseif($selectedLocale === 'zh') 中文 (lang/zh.json)
                        @else 한국어 (lang/ko.json) @endif
                    </span>
                </div>
                <span class="text-xs text-[#718096]">{{ count($translations) }} cụm từ được cấu hình</span>
            </div>

            <div class="space-y-3 max-h-[600px] overflow-y-auto pr-2">
                @foreach($translations as $key => $val)
                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center p-2 rounded-lg bg-[#F8FAFC] dark:bg-[#0B1118]/50 border border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <div class="sm:col-span-5">
                            <span class="text-xs font-bold text-[#172B3A] dark:text-white font-mono select-all">{{ $key }}</span>
                        </div>
                        <div class="sm:col-span-7">
                            <input type="text" name="translations[{{ $key }}]" value="{{ $val }}" class="w-full px-3 py-1.5 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] text-xs focus:outline-none focus:border-[#168BD2]">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-end">
                <button type="submit" class="lush-btn-primary !text-xs !py-3 !px-6">
                    Lưu Bản Dịch [{{ strtoupper($selectedLocale) }}]
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
