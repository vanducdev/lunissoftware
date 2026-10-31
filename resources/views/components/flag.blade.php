@props(['country' => 'vi', 'class' => 'w-5 h-3.5'])

@php
    $c = strtolower($country);
@endphp

@if($c === 'vi' || $c === 'vn')
    <!-- Vietnam Flag -->
    <svg class="{{ $class }} rounded-[3px] shadow-2xs shrink-0 overflow-hidden ring-1 ring-black/10 dark:ring-white/10" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
        <rect width="640" height="480" fill="#DA251D"/>
        <polygon fill="#FFFF00" points="320,84 357.6,200.2 479.8,200.2 381,272 418.6,388.2 320,316.4 221.4,388.2 259,272 160.2,200.2 282.4,200.2"/>
    </svg>
@elseif($c === 'en' || $c === 'gb' || $c === 'us')
    <!-- United Kingdom / English Flag -->
    <svg class="{{ $class }} rounded-[3px] shadow-2xs shrink-0 overflow-hidden ring-1 ring-black/10 dark:ring-white/10" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
        <path fill="#012169" d="M0 0h640v480H0z"/>
        <path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z"/>
        <path fill="#C8102E" d="m424 288 216 159v33h-44L366 304l58-16zM640 0v10L454 150l34 26L640 26V0zM0 480v-11l186-138-34-26L0 454v26zM184 192 0 55V21h44l212 158-72 13z"/>
        <path fill="#FFF" d="M240 0h160v480H240zM0 160h640v160H0z"/>
        <path fill="#C8102E" d="M267 0h106v480H267zM0 187h640v106H0z"/>
    </svg>
@elseif($c === 'zh' || $c === 'cn')
    <!-- China Flag -->
    <svg class="{{ $class }} rounded-[3px] shadow-2xs shrink-0 overflow-hidden ring-1 ring-black/10 dark:ring-white/10" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
        <rect width="640" height="480" fill="#DE2910"/>
        <!-- Large Star -->
        <polygon fill="#FFDE00" points="107,60 125,108 176,108 135,138 151,186 107,156 63,186 79,138 38,108 89,108"/>
        <!-- Small Stars -->
        <polygon fill="#FFDE00" points="208,44 214,57 228,55 218,65 222,78 210,71 199,78 202,65 192,56 206,56" transform="rotate(-121 213 60)"/>
        <polygon fill="#FFDE00" points="253,92 259,105 273,103 263,113 267,126 255,119 244,126 247,113 237,104 251,104" transform="rotate(-98 258 108)"/>
        <polygon fill="#FFDE00" points="253,164 259,177 273,175 263,185 267,198 255,191 244,198 247,185 237,176 251,176" transform="rotate(-74 258 180)"/>
        <polygon fill="#FFDE00" points="208,212 214,225 228,223 218,233 222,246 210,239 199,246 202,233 192,224 206,224" transform="rotate(-51 213 228)"/>
    </svg>
@elseif($c === 'ko' || $c === 'kr')
    <!-- South Korea Flag -->
    <svg class="{{ $class }} rounded-[3px] shadow-2xs shrink-0 overflow-hidden ring-1 ring-black/10 dark:ring-white/10" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
        <rect width="640" height="480" fill="#FFFFFF"/>
        <!-- Taegeuk -->
        <g transform="translate(320 240) rotate(-56.31)">
            <path d="M-120 0a120 120 0 0 0 240 0 60 60 0 0 0-120 0 60 60 0 0 1-120 0" fill="#C60C30"/>
            <path d="M120 0a120 120 0 0 0-240 0 60 60 0 0 0 120 0 60 60 0 0 1 120 0" fill="#003478"/>
        </g>
        <!-- Trigrams -->
        <g fill="#000000" stroke="#FFFFFF" stroke-width="3">
            <!-- Top Left: Geon -->
            <g transform="translate(190 126) rotate(-56.31)">
                <rect x="-42" y="-18" width="84" height="8" rx="2"/>
                <rect x="-42" y="-4" width="84" height="8" rx="2"/>
                <rect x="-42" y="10" width="84" height="8" rx="2"/>
            </g>
            <!-- Bottom Right: Gon -->
            <g transform="translate(450 354) rotate(-56.31)">
                <rect x="-42" y="-18" width="38" height="8" rx="2"/><rect x="4" y="-18" width="38" height="8" rx="2"/>
                <rect x="-42" y="-4" width="38" height="8" rx="2"/><rect x="4" y="-4" width="38" height="8" rx="2"/>
                <rect x="-42" y="10" width="38" height="8" rx="2"/><rect x="4" y="10" width="38" height="8" rx="2"/>
            </g>
            <!-- Top Right: Gam -->
            <g transform="translate(450 126) rotate(56.31)">
                <rect x="-42" y="-18" width="38" height="8" rx="2"/><rect x="4" y="-18" width="38" height="8" rx="2"/>
                <rect x="-42" y="-4" width="84" height="8" rx="2"/>
                <rect x="-42" y="10" width="38" height="8" rx="2"/><rect x="4" y="10" width="38" height="8" rx="2"/>
            </g>
            <!-- Bottom Left: Ri -->
            <g transform="translate(190 354) rotate(56.31)">
                <rect x="-42" y="-18" width="84" height="8" rx="2"/>
                <rect x="-42" y="-4" width="38" height="8" rx="2"/><rect x="4" y="-4" width="38" height="8" rx="2"/>
                <rect x="-42" y="10" width="84" height="8" rx="2"/>
            </g>
        </g>
    </svg>
@else
    <span class="inline-block w-5 h-3.5 rounded-[3px] bg-gray-200 uppercase text-[9px] font-bold text-center leading-3.5">{{ substr($country, 0, 2) }}</span>
@endif

