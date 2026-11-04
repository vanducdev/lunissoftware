{{-- Advanced Real-time SEO Suite Component (Yoast/RankMath Style) --}}
@props(['article' => null])

@php
    $currentFocus = old('focus_keyword', $article->focus_keyword ?? '');
    $currentSeoTitle = old('seo_title', $article->seo_title ?? '');
    $currentSeoDesc = old('seo_description', $article->seo_description ?? '');
    $currentSeoKeys = old('seo_keywords', $article->seo_keywords ?? '');
    $currentSlug = old('slug', $article->slug ?? '');
    $currentCanonical = old('canonical_url', $article->canonical_url ?? '');
    $currentRobots = old('robots_meta', $article->robots_meta ?? 'index, follow');
    $currentReadingTime = old('reading_time', $article->reading_time ?? 5);
@endphp

<div id="seo-suite-container" class="space-y-6">
    <!-- Main SEO Analyzer & Live Score Card -->
    <div class="lush-card p-6 sm:p-8 space-y-6 border border-[#168BD2]/20 shadow-sm relative overflow-hidden">
        <!-- Ambient Top Accent Glow -->
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-[#168BD2] via-[#38BDF8] to-emerald-500"></div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shadow-[0_0_8px_#10B981]"></span>
                    <h3 class="text-base font-black text-[#172B3A] dark:text-white uppercase tracking-wider">Bộ Công Cụ SEO Master Google 2026</h3>
                </div>
                <p class="text-xs text-[#718096] dark:text-[#94A3B8] mt-0.5">Phân tích on-page, đo lường điểm số SEO và xem trước kết quả tìm kiếm theo chuẩn thuật toán Google RankBrain & EEAT</p>
            </div>

            <!-- Dynamic SEO Score Meter Badge -->
            <div class="flex items-center gap-3 bg-[#F8FAFC] dark:bg-[#111A24] px-4 py-2 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] shrink-0">
                <div class="text-right">
                    <span class="text-[10px] font-bold text-[#718096] uppercase tracking-wider block">Điểm SEO On-Page</span>
                    <span id="seo-score-text" class="text-xs font-black text-rose-500">Chưa tối ưu</span>
                </div>
                <div class="relative w-12 h-12 flex items-center justify-center">
                    <svg class="w-12 h-12 transform -rotate-90" viewBox="0 0 36 36">
                        <path class="text-slate-200 dark:text-slate-800" stroke-width="3.5" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                        <path id="seo-score-circle" class="text-rose-500 transition-all duration-500" stroke-width="3.5" stroke-dasharray="0, 100" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                    </svg>
                    <span id="seo-score-number" class="absolute text-sm font-black text-[#172B3A] dark:text-white">0</span>
                </div>
            </div>
        </div>

        <!-- 1. Focus Keyword Input (Từ khóa mục tiêu) -->
        <div class="bg-gradient-to-br from-[#F0F8FF] to-white dark:from-[#111D2B] dark:to-[#0B1118] p-4 sm:p-5 rounded-2xl border border-[#168BD2]/30">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                <label for="focus_keyword_input" class="text-xs font-bold text-[#172B3A] dark:text-white flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span>Từ Khóa Mục Tiêu Chính (Focus Keyword) <span class="text-rose-500">*</span></span>
                </label>
                <span class="text-[11px] text-[#718096] dark:text-[#94A3B8]">Cụm từ người dùng tìm kiếm trên Google (VD: <em>phần mềm nuôi nick</em>)</span>
            </div>
            <div class="relative">
                <input type="text" id="focus_keyword_input" name="focus_keyword" value="{{ $currentFocus }}" placeholder="Nhập từ khóa trọng tâm để hệ thống phân tích..." class="w-full pl-4 pr-24 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-sm font-semibold text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2] focus:ring-2 focus:ring-[#168BD2]/20 transition-all">
                <div class="absolute right-2.5 top-1/2 -translate-y-1/2 flex items-center gap-1 text-[11px] font-bold text-[#168BD2] bg-[#168BD2]/10 px-2 py-1 rounded-lg">
                    <span id="keyword-count-display">0</span> lần trong bài
                </div>
            </div>
        </div>

        <!-- 2. Google SERP Snippet Preview (Desktop & Mobile & Social) -->
        <div class="space-y-3" x-data="{ serpTab: 'desktop' }">
            <div class="flex items-center justify-between">
                <label class="text-xs font-bold text-[#172B3A] dark:text-white flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <span>Xem Trước Kết Quả Tìm Kiếm Google & Mạng Xã Hội</span>
                </label>

                <!-- Toggle Buttons -->
                <div class="flex items-center gap-1 bg-[#F1F5F9] dark:bg-[#1E293B] p-1 rounded-xl text-xs font-semibold">
                    <button type="button" @click="serpTab = 'desktop'" :class="serpTab === 'desktop' ? 'bg-white dark:bg-[#0B1118] text-[#168BD2] shadow-xs' : 'text-[#64748B] hover:text-[#0F172A]'" class="px-2.5 py-1 rounded-lg transition-all flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>Máy tính</span>
                    </button>
                    <button type="button" @click="serpTab = 'mobile'" :class="serpTab === 'mobile' ? 'bg-white dark:bg-[#0B1118] text-[#168BD2] shadow-xs' : 'text-[#64748B] hover:text-[#0F172A]'" class="px-2.5 py-1 rounded-lg transition-all flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        <span>Di động</span>
                    </button>
                    <button type="button" @click="serpTab = 'social'" :class="serpTab === 'social' ? 'bg-white dark:bg-[#0B1118] text-[#168BD2] shadow-xs' : 'text-[#64748B] hover:text-[#0F172A]'" class="px-2.5 py-1 rounded-lg transition-all flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        <span>Mạng xã hội</span>
                    </button>
                </div>
            </div>

            <!-- Preview Box Frame -->
            <div class="p-4 sm:p-5 rounded-2xl border border-[#E2E8F0] dark:border-[#1E293B] bg-white dark:bg-[#0E1722] font-sans">
                <!-- Desktop & Mobile Google SERP View -->
                <div x-show="serpTab === 'desktop' || serpTab === 'mobile'" class="space-y-1.5" :class="serpTab === 'mobile' ? 'max-w-md mx-auto p-3 border border-slate-200 dark:border-slate-800 rounded-xl bg-white dark:bg-[#0B1118]' : ''">
                    <!-- Google URL & Favicon Line -->
                    <div class="flex items-center gap-2 text-xs text-[#202124] dark:text-[#BDC1C6]">
                        <div class="w-5 h-5 rounded-full bg-[#168BD2]/10 flex items-center justify-center text-[10px] text-[#168BD2] font-bold overflow-hidden shrink-0">
                            <img src="{{ asset('images/logo.png') }}" alt="Favicon" class="w-full h-full object-cover" onerror="this.style.display='none'">
                        </div>
                        <div class="flex flex-col leading-tight">
                            <span class="text-xs font-medium text-[#202124] dark:text-[#E8EAED]">LushSoftware</span>
                            <span class="text-[11px] text-[#4D5156] dark:text-[#9AA0A6] truncate max-w-sm">
                                {{ url('/news') }}/<span id="preview-slug" class="text-[#168BD2]">{{ $currentSlug ?: 'tieu-de-bai-viet-chuan-seo' }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Google Blue Title -->
                    <h4 id="preview-title" class="text-lg sm:text-[19px] font-medium text-[#1A0DAB] dark:text-[#8AB4F8] hover:underline cursor-pointer leading-snug line-clamp-2">
                        {{ $currentSeoTitle ?: ($article->title ?? 'Tiêu đề bài viết hiển thị trên Google...') }}
                    </h4>

                    <!-- Google Snippet Description -->
                    <p id="preview-desc" class="text-xs sm:text-[13px] text-[#4D5156] dark:text-[#BDC1C6] leading-relaxed line-clamp-2">
                        {{ $currentSeoDesc ?: ($article->excerpt ?? 'Mô tả bài viết hấp dẫn, chứa từ khóa chính giúp thu hút tỷ lệ nhấp chuột (CTR) cao nhất từ khách hàng tiềm năng trên Google...') }}
                    </p>
                </div>

                <!-- Social Media Share Preview (Facebook / Zalo Card) -->
                <div x-show="serpTab === 'social'" class="max-w-md mx-auto rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-xs bg-slate-50 dark:bg-[#131D27]">
                    <div class="h-44 bg-slate-200 dark:bg-slate-800 relative flex items-center justify-center overflow-hidden">
                        @if($article && $article->thumbnail)
                            <img id="preview-social-img" src="{{ asset('storage/' . $article->thumbnail) }}" alt="Preview" class="w-full h-full object-cover">
                        @else
                            <img id="preview-social-img" src="{{ asset('images/banner.png') }}" alt="Preview" class="w-full h-full object-cover">
                        @endif
                        <span class="absolute top-2 right-2 px-2 py-0.5 rounded bg-black/60 text-white text-[10px] font-bold">1200 x 630</span>
                    </div>
                    <div class="p-3.5 space-y-1">
                        <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">LUSHSOFTWARE.VN</span>
                        <h5 id="preview-social-title" class="text-sm font-bold text-slate-900 dark:text-white line-clamp-1 leading-snug">
                            {{ $currentSeoTitle ?: ($article->title ?? 'Tiêu đề bài viết khi chia sẻ') }}
                        </h5>
                        <p id="preview-social-desc" class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 leading-relaxed">
                            {{ $currentSeoDesc ?: ($article->excerpt ?? 'Mô tả ngắn gọn hiển thị sinh động trên News Feed Facebook và Zalo') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Form Inputs for SEO Optimization -->
        <div class="space-y-4 pt-2">
            <!-- SEO Title with Character Count & Progress Bar -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label class="text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                        SEO Title (Tiêu Đề Tìm Kiếm Google)
                    </label>
                    <div class="text-[11px] font-semibold text-[#718096]">
                        <span id="seo-title-count">0</span> / 60 ký tự
                        <span id="seo-title-status" class="ml-1 font-bold text-amber-500">(Ngắn)</span>
                    </div>
                </div>
                <input type="text" id="seo_title_input" name="seo_title" value="{{ $currentSeoTitle }}" placeholder="Tiêu đề chuẩn SEO (để trống sẽ tự động lấy từ tiêu đề bài viết)" class="w-full px-4 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-sm text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
                <!-- Progress meter -->
                <div class="w-full h-1.5 bg-slate-100 dark:bg-slate-800 rounded-full mt-1.5 overflow-hidden">
                    <div id="seo-title-bar" class="h-full bg-amber-400 transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>

            <!-- SEO Description with Character Count & Progress Bar -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label class="text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                        Meta Description (Thẻ Mô Tả Google)
                    </label>
                    <div class="text-[11px] font-semibold text-[#718096]">
                        <span id="seo-desc-count">0</span> / 160 ký tự
                        <span id="seo-desc-status" class="ml-1 font-bold text-amber-500">(Ngắn)</span>
                    </div>
                </div>
                <textarea id="seo_desc_input" name="seo_description" rows="2" placeholder="Tóm tắt nội dung hấp dẫn 120-160 ký tự, kích thích người dùng bấm vào xem..." class="w-full px-4 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-sm text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">{{ $currentSeoDesc }}</textarea>
                <!-- Progress meter -->
                <div class="w-full h-1.5 bg-slate-100 dark:bg-slate-800 rounded-full mt-1.5 overflow-hidden">
                    <div id="seo-desc-bar" class="h-full bg-amber-400 transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>

            <!-- URL Slug Customizer -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">
                        Đường dẫn URL Slug <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" id="article_slug_input" name="slug" value="{{ $currentSlug }}" placeholder="duong-dan-bai-viet-chuan-seo" class="w-full pl-3 pr-20 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs font-mono text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
                        <button type="button" id="btn-slugify-title" class="absolute right-1.5 top-1/2 -translate-y-1/2 px-2 py-1 bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 text-[10px] font-bold text-slate-700 dark:text-slate-300 rounded-lg cursor-pointer transition-colors" title="Tạo lại từ tiêu đề">
                            Tạo tự động
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">
                        Từ khóa phụ (SEO Keywords)
                    </label>
                    <input type="text" name="seo_keywords" value="{{ $currentSeoKeys }}" placeholder="phan mem lush, tu dong hoa, crm..." class="w-full px-3 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <!-- Advanced Robots & Canonical -->
            <div class="pt-2 border-t border-[#E8EDF2] dark:border-[#1E2D3D]" x-data="{ showAdvanced: false }">
                <button type="button" @click="showAdvanced = !showAdvanced" class="flex items-center gap-1.5 text-xs font-bold text-[#168BD2] hover:underline cursor-pointer">
                    <span x-text="showAdvanced ? 'Ẩn cấu hình nâng cao & Canonical' : 'Cấu hình chỉ thị Robots & Canonical URL ▾'"></span>
                </button>

                <div x-show="showAdvanced" class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3 pt-2">
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Chỉ thị Robots Meta</label>
                        <select name="robots_meta" class="w-full px-3 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
                            <option value="index, follow" {{ $currentRobots === 'index, follow' ? 'selected' : '' }}>index, follow (Mặc định)</option>
                            <option value="noindex, follow" {{ $currentRobots === 'noindex, follow' ? 'selected' : '' }}>noindex, follow (Không lập chỉ mục)</option>
                            <option value="index, nofollow" {{ $currentRobots === 'index, nofollow' ? 'selected' : '' }}>index, nofollow</option>
                            <option value="noindex, nofollow" {{ $currentRobots === 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow (Ẩn hoàn toàn)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Canonical URL (Nếu có)</label>
                        <input type="url" name="canonical_url" value="{{ $currentCanonical }}" placeholder="https://..." class="w-full px-3 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Thời gian đọc (phút)</label>
                        <input type="number" id="reading_time_input" name="reading_time" value="{{ $currentReadingTime }}" min="1" max="120" class="w-full px-3 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Interactive Live SEO Checklist (10 Google Ranking Criteria) -->
        <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-3">
            <h4 class="text-xs font-black text-[#172B3A] dark:text-white uppercase tracking-wider flex items-center gap-1.5">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Bảng Kiểm Tra Chuẩn SEO On-Page Thời Gian Thực</span>
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5 text-xs font-medium">
                <!-- 1. Focus Keyword in Title -->
                <div id="check-kw-title" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Từ khóa trong SEO Title</span>
                </div>

                <!-- 2. Focus Keyword near beginning of Title -->
                <div id="check-kw-title-start" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Từ khóa nằm ở đầu tiêu đề</span>
                </div>

                <!-- 3. Title Length (45-60) -->
                <div id="check-title-length" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Độ dài tiêu đề đạt chuẩn (45-60 ký tự)</span>
                </div>

                <!-- 4. Focus Keyword in Meta Description -->
                <div id="check-kw-desc" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Từ khóa trong Meta Description</span>
                </div>

                <!-- 5. Meta Description Length (120-160) -->
                <div id="check-desc-length" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Độ dài mô tả đạt chuẩn (120-160 ký tự)</span>
                </div>

                <!-- 6. Focus Keyword in URL Slug -->
                <div id="check-kw-slug" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Từ khóa trong đường dẫn URL (Slug)</span>
                </div>

                <!-- 7. Focus Keyword in First 10% Content -->
                <div id="check-kw-intro" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Từ khóa xuất hiện trong đoạn mở đầu</span>
                </div>

                <!-- 8. Keyword Density (0.8% - 2.5%) -->
                <div id="check-density" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Mật độ từ khóa đạt 0.8% - 2.5%</span>
                </div>

                <!-- 9. Heading Tags (H2, H3) Structure -->
                <div id="check-headings" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Có phân chia thẻ H2, H3 chứa từ khóa</span>
                </div>

                <!-- 10. Content Word Count >= 600 words -->
                <div id="check-word-count" class="flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-600 dark:text-slate-400">
                    <span class="w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0">✕</span>
                    <span class="label">Độ dài nội dung chuyên sâu (≥ 600 từ)</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Real-time JavaScript Engine for SEO Calculation & Preview --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.querySelector('input[name="title"]');
    const contentInput = document.querySelector('textarea[name="content"]');
    const excerptInput = document.querySelector('textarea[name="excerpt"]');
    const focusInput = document.getElementById('focus_keyword_input');
    const seoTitleInput = document.getElementById('seo_title_input');
    const seoDescInput = document.getElementById('seo_desc_input');
    const slugInput = document.getElementById('article_slug_input');
    const btnSlugify = document.getElementById('btn-slugify-title');
    const readingTimeInput = document.getElementById('reading_time_input');

    // Previews
    const previewTitle = document.getElementById('preview-title');
    const previewDesc = document.getElementById('preview-desc');
    const previewSlug = document.getElementById('preview-slug');
    const previewSocialTitle = document.getElementById('preview-social-title');
    const previewSocialDesc = document.getElementById('preview-social-desc');

    // Counters & Meters
    const titleCount = document.getElementById('seo-title-count');
    const titleStatus = document.getElementById('seo-title-status');
    const titleBar = document.getElementById('seo-title-bar');

    const descCount = document.getElementById('seo-desc-count');
    const descStatus = document.getElementById('seo-desc-status');
    const descBar = document.getElementById('seo-desc-bar');

    const kwCountDisplay = document.getElementById('keyword-count-display');
    const scoreText = document.getElementById('seo-score-text');
    const scoreNum = document.getElementById('seo-score-number');
    const scoreCircle = document.getElementById('seo-score-circle');

    // Checklist Elements
    const checkKwTitle = document.getElementById('check-kw-title');
    const checkKwTitleStart = document.getElementById('check-kw-title-start');
    const checkTitleLength = document.getElementById('check-title-length');
    const checkKwDesc = document.getElementById('check-kw-desc');
    const checkDescLength = document.getElementById('check-desc-length');
    const checkKwSlug = document.getElementById('check-kw-slug');
    const checkKwIntro = document.getElementById('check-kw-intro');
    const checkDensity = document.getElementById('check-density');
    const checkHeadings = document.getElementById('check-headings');
    const checkWordCount = document.getElementById('check-word-count');

    function removeVietnameseTones(str) {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");
        return str;
    }

    function slugify(text) {
        return removeVietnameseTones(text)
            .toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

    if (btnSlugify && titleInput && slugInput) {
        btnSlugify.addEventListener('click', function() {
            if (titleInput.value) {
                slugInput.value = slugify(titleInput.value);
                analyzeSEO();
            }
        });
    }

    function setCheck(el, passed, customLabel = null) {
        if (!el) return;
        const icon = el.querySelector('.icon');
        const label = el.querySelector('.label');
        if (customLabel && label) label.textContent = customLabel;

        if (passed) {
            el.className = 'flex items-center gap-2 p-2.5 rounded-xl border border-emerald-200 dark:border-emerald-900/50 bg-emerald-50/70 dark:bg-emerald-950/20 text-emerald-700 dark:text-emerald-300 transition-all';
            icon.className = 'w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-emerald-500 icon shrink-0';
            icon.textContent = '✓';
        } else {
            el.className = 'flex items-center gap-2 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-[#101923] text-slate-500 dark:text-slate-400 transition-all';
            icon.className = 'w-4 h-4 rounded-full flex items-center justify-center text-[10px] font-bold text-white bg-slate-400 icon shrink-0';
            icon.textContent = '✕';
        }
    }

    function analyzeSEO() {
        const titleVal = (seoTitleInput.value || titleInput.value || '').trim();
        const descVal = (seoDescInput.value || excerptInput.value || '').trim();
        const contentVal = (contentInput.value || '').trim();
        const slugVal = (slugInput.value || '').trim();
        const focusVal = (focusInput.value || '').trim().toLowerCase();

        // Update previews
        previewTitle.textContent = titleVal || 'Tiêu đề bài viết hiển thị trên Google...';
        previewSocialTitle.textContent = titleVal || 'Tiêu đề bài viết khi chia sẻ';
        previewDesc.textContent = descVal || 'Mô tả bài viết hấp dẫn, chứa từ khóa chính...';
        previewSocialDesc.textContent = descVal || 'Mô tả ngắn gọn hiển thị trên News Feed';
        previewSlug.textContent = slugVal || slugify(titleVal || 'tieu-de-bai-viet');

        // Length meters
        const titleLen = titleVal.length;
        titleCount.textContent = titleLen;
        let titlePct = Math.min(100, Math.round((titleLen / 60) * 100));
        titleBar.style.width = titlePct + '%';
        if (titleLen >= 45 && titleLen <= 60) {
            titleStatus.textContent = '(Tuyệt vời)';
            titleStatus.className = 'ml-1 font-bold text-emerald-600 dark:text-emerald-400';
            titleBar.className = 'h-full bg-emerald-500 transition-all duration-300';
        } else if (titleLen > 60) {
            titleStatus.textContent = '(Quá dài - sẽ bị cắt ...)';
            titleStatus.className = 'ml-1 font-bold text-rose-500';
            titleBar.className = 'h-full bg-rose-500 transition-all duration-300';
        } else {
            titleStatus.textContent = '(Hơi ngắn)';
            titleStatus.className = 'ml-1 font-bold text-amber-500';
            titleBar.className = 'h-full bg-amber-400 transition-all duration-300';
        }

        const descLen = descVal.length;
        descCount.textContent = descLen;
        let descPct = Math.min(100, Math.round((descLen / 160) * 100));
        descBar.style.width = descPct + '%';
        if (descLen >= 120 && descLen <= 160) {
            descStatus.textContent = '(Tuyệt vời)';
            descStatus.className = 'ml-1 font-bold text-emerald-600 dark:text-emerald-400';
            descBar.className = 'h-full bg-emerald-500 transition-all duration-300';
        } else if (descLen > 160) {
            descStatus.textContent = '(Quá dài)';
            descStatus.className = 'ml-1 font-bold text-rose-500';
            descBar.className = 'h-full bg-rose-500 transition-all duration-300';
        } else {
            descStatus.textContent = '(Hơi ngắn)';
            descStatus.className = 'ml-1 font-bold text-amber-500';
            descBar.className = 'h-full bg-amber-400 transition-all duration-300';
        }

        // Plain text & word count calculation
        const cleanContent = contentVal.replace(/<[^>]+>/g, ' ');
        const words = cleanContent.trim().split(/\s+/).filter(w => w.length > 0);
        const wordCount = words.length;

        // Auto update reading time
        if (readingTimeInput) {
            const calculatedMinutes = Math.max(1, Math.ceil(wordCount / 200));
            readingTimeInput.value = calculatedMinutes;
        }

        // Count keyword occurrence
        let kwOccurrences = 0;
        if (focusVal.length > 1) {
            const regex = new RegExp(focusVal.replace(/[-/\\^$*+?.()|[\]{}]/g, '\\$&'), 'gi');
            const matches = cleanContent.match(regex);
            kwOccurrences = matches ? matches.length : 0;
        }
        kwCountDisplay.textContent = kwOccurrences;

        // Keyword density
        let density = wordCount > 0 ? ((kwOccurrences * focusVal.split(/\s+/).length / wordCount) * 100).toFixed(1) : 0;

        let score = 0;

        // 1. Keyword in Title (15 pts)
        const hasKwInTitle = focusVal.length > 1 && titleVal.toLowerCase().includes(focusVal);
        setCheck(checkKwTitle, hasKwInTitle);
        if (hasKwInTitle) score += 15;

        // 2. Keyword near start of Title (10 pts)
        const kwAtStart = hasKwInTitle && (titleVal.toLowerCase().indexOf(focusVal) < 25);
        setCheck(checkKwTitleStart, kwAtStart);
        if (kwAtStart) score += 10;

        // 3. Title length optimal (10 pts)
        const isTitleLenGood = titleLen >= 45 && titleLen <= 65;
        setCheck(checkTitleLength, isTitleLenGood, `Độ dài tiêu đề đạt chuẩn (${titleLen}/60 ký tự)`);
        if (isTitleLenGood) score += 10;
        else if (titleLen >= 30) score += 5;

        // 4. Keyword in Meta Description (15 pts)
        const hasKwInDesc = focusVal.length > 1 && descVal.toLowerCase().includes(focusVal);
        setCheck(checkKwDesc, hasKwInDesc);
        if (hasKwInDesc) score += 15;

        // 5. Meta Description length optimal (10 pts)
        const isDescLenGood = descLen >= 110 && descLen <= 165;
        setCheck(checkDescLength, isDescLenGood, `Độ dài mô tả đạt chuẩn (${descLen}/160 ký tự)`);
        if (isDescLenGood) score += 10;
        else if (descLen >= 70) score += 5;

        // 6. Keyword in Slug (10 pts)
        const focusSlug = slugify(focusVal);
        const hasKwInSlug = focusSlug.length > 1 && slugVal.includes(focusSlug);
        setCheck(checkKwSlug, hasKwInSlug);
        if (hasKwInSlug) score += 10;

        // 7. Keyword in Intro Paragraph (10 pts)
        const first10Percent = cleanContent.substring(0, Math.max(300, Math.round(cleanContent.length * 0.15))).toLowerCase();
        const hasKwInIntro = focusVal.length > 1 && first10Percent.includes(focusVal);
        setCheck(checkKwIntro, hasKwInIntro);
        if (hasKwInIntro) score += 10;

        // 8. Keyword Density (10 pts)
        const isDensityGood = density >= 0.8 && density <= 2.5;
        setCheck(checkDensity, isDensityGood, `Mật độ từ khóa: ${density}% (${kwOccurrences} lần)`);
        if (isDensityGood) score += 10;
        else if (density > 0 && density <= 3.5) score += 5;

        // 9. Headings structure (H2/H3) (5 pts)
        const hasHeadings = /<h[23][^>]*>.*<\/h[23]>/i.test(contentVal);
        setCheck(checkHeadings, hasHeadings, hasHeadings ? 'Có cấu trúc thẻ H2/H3 bài viết' : 'Chưa có thẻ Heading H2/H3');
        if (hasHeadings) score += 5;

        // 10. Word count (5 pts)
        const isWordCountGood = wordCount >= 600;
        setCheck(checkWordCount, isWordCountGood, `Độ dài nội dung: ${wordCount} từ (Chuẩn ≥ 600 từ)`);
        if (wordCount >= 1000) score += 5;
        else if (wordCount >= 500) score += 3;

        // Update Overall Score Display
        score = Math.min(100, Math.max(0, score));
        scoreNum.textContent = score;
        scoreCircle.setAttribute('stroke-dasharray', `${score}, 100`);

        if (score >= 80) {
            scoreText.textContent = 'Rất Tốt (Top 1)';
            scoreText.className = 'text-xs font-black text-emerald-600 dark:text-emerald-400';
            scoreCircle.setAttribute('class', 'text-emerald-500 transition-all duration-500');
        } else if (score >= 50) {
            scoreText.textContent = 'Khá Tốt';
            scoreText.className = 'text-xs font-black text-amber-500';
            scoreCircle.setAttribute('class', 'text-amber-500 transition-all duration-500');
        } else {
            scoreText.textContent = 'Cần Tối Ưu';
            scoreText.className = 'text-xs font-black text-rose-500';
            scoreCircle.setAttribute('class', 'text-rose-500 transition-all duration-500');
        }
    }

    // Attach listeners
    [titleInput, contentInput, excerptInput, focusInput, seoTitleInput, seoDescInput, slugInput].forEach(el => {
        if (el) {
            el.addEventListener('input', analyzeSEO);
            el.addEventListener('keyup', analyzeSEO);
            el.addEventListener('change', analyzeSEO);
        }
    });

    // Initial analysis
    analyzeSEO();
});
</script>

