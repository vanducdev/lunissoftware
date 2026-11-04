@props(['items' => []])

@if(!empty($items))
<nav aria-label="Breadcrumb" class="py-1 text-xs">
    <ol class="flex items-center flex-wrap gap-2 text-[#718096] dark:text-[#94A3B8]" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="inline-flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="{{ route('home') }}" class="hover:text-[#168BD2] transition-colors flex items-center gap-1" itemprop="item">
                <svg class="w-3.5 h-3.5 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span itemprop="name">{{ __('Home') }}</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>

        @foreach($items as $index => $item)
            <li class="inline-flex items-center gap-2" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <svg class="w-3.5 h-3.5 text-[#CBD5E1] dark:text-[#334155]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                
                @if(isset($item['url']) && !$loop->last)
                    <a href="{{ $item['url'] }}" class="hover:text-[#168BD2] transition-colors" itemprop="item">
                        <span itemprop="name">{{ $item['label'] }}</span>
                    </a>
                @else
                    <span class="font-semibold text-[#172B3A] dark:text-[#E2E8F0]" aria-current="page" itemprop="name">
                        {{ $item['label'] }}
                    </span>
                @endif
                <meta itemprop="position" content="{{ $index + 2 }}" />
            </li>
        @endforeach
    </ol>
</nav>
@endif

