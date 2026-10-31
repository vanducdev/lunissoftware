@props(['slug' => '', 'size' => 'md', 'class' => ''])

@php
    $sizeClasses = match($size) {
        'sm' => 'w-9 h-9 rounded-xl',
        'lg' => 'w-14 h-14 rounded-2xl',
        'xl' => 'w-20 h-20 rounded-3xl',
        default => 'w-12 h-12 rounded-2xl', // md
    };

    $svgSizes = match($size) {
        'sm' => 'w-4.5 h-4.5',
        'lg' => 'w-7 h-7',
        'xl' => 'w-10 h-10',
        default => 'w-6 h-6',
    };
@endphp

@switch($slug)
    @case('lush-marketing-pro')
        <div class="relative flex items-center justify-center shrink-0 {{ $sizeClasses }} bg-gradient-to-br from-[#168BD2] via-[#0284C7] to-[#0878BD] text-white shadow-lg shadow-[#168BD2]/30 ring-1 ring-white/20 {{ $class }}">
            <svg class="{{ $svgSizes }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        @break

    @case('lush-social-hub')
        <div class="relative flex items-center justify-center shrink-0 {{ $sizeClasses }} bg-gradient-to-br from-[#6366F1] via-[#4F46E5] to-[#4338CA] text-white shadow-lg shadow-[#6366F1]/30 ring-1 ring-white/20 {{ $class }}">
            <svg class="{{ $svgSizes }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
        </div>
        @break

    @case('lush-crm-enterprise')
        <div class="relative flex items-center justify-center shrink-0 {{ $sizeClasses }} bg-gradient-to-br from-[#059669] via-[#10B981] to-[#0D9488] text-white shadow-lg shadow-[#059669]/30 ring-1 ring-white/20 {{ $class }}">
            <svg class="{{ $svgSizes }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
        </div>
        @break

    @case('lush-data-scraper')
        <div class="relative flex items-center justify-center shrink-0 {{ $sizeClasses }} bg-gradient-to-br from-[#0284C7] via-[#0369A1] to-[#075985] text-white shadow-lg shadow-[#0284C7]/30 ring-1 ring-white/20 {{ $class }}">
            <svg class="{{ $svgSizes }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
            </svg>
        </div>
        @break

    @case('lush-chatbot-ai')
        <div class="relative flex items-center justify-center shrink-0 {{ $sizeClasses }} bg-gradient-to-br from-[#8B5CF6] via-[#7C3AED] to-[#6D28D9] text-white shadow-lg shadow-[#8B5CF6]/30 ring-1 ring-white/20 {{ $class }}">
            <svg class="{{ $svgSizes }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
        </div>
        @break

    @case('lush-traffic-booster')
        <div class="relative flex items-center justify-center shrink-0 {{ $sizeClasses }} bg-gradient-to-br from-[#EA580C] via-[#F59E0B] to-[#D97706] text-white shadow-lg shadow-[#EA580C]/30 ring-1 ring-white/20 {{ $class }}">
            <svg class="{{ $svgSizes }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
            </svg>
        </div>
        @break

    @default
        <div class="relative flex items-center justify-center shrink-0 {{ $sizeClasses }} bg-gradient-to-br from-[#168BD2] via-[#2094DB] to-[#48B4E5] text-white shadow-lg shadow-[#168BD2]/30 ring-1 ring-white/20 {{ $class }}">
            <svg class="{{ $svgSizes }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </div>
@endswitch

