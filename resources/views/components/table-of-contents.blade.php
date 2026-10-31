{{-- Smart Auto-Generated Table of Contents (Mục Lục Tự Động Chuẩn SEO Google) --}}
@props([
    'target' => '.prose',
    'title' => 'Mục Lục Nội Dung'
])

<div id="toc-box" class="hidden not-prose mb-10 p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-[#F8FAFC] to-[#F1F5F9] dark:from-[#131E2A] dark:to-[#0B1118] border border-[#168BD2]/30 shadow-xs">
    <div class="flex items-center justify-between cursor-pointer" onclick="document.getElementById('toc-content').classList.toggle('hidden'); document.getElementById('toc-arrow').classList.toggle('rotate-180');">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M4 6h16M4 12h16M4 18h7"/></svg>
            </div>
            <div>
                <span class="text-xs font-black text-[#172B3A] dark:text-white uppercase tracking-wider block">{{ $title }}</span>
                <span class="text-[10px] text-[#718096] dark:text-[#94A3B8]">Bấm vào để cuộn nhanh đến đề mục</span>
            </div>
        </div>
        <svg id="toc-arrow" class="w-4 h-4 text-[#718096] transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
    <div id="toc-content" class="mt-4 pt-3.5 border-t border-[#E2E8F0] dark:border-[#1E293B]">
        <ul id="toc-list" class="space-y-2 text-xs font-semibold text-[#475569] dark:text-[#94A3B8]"></ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const prose = document.querySelector('{{ $target }}');
    if (!prose) return;
    const headings = prose.querySelectorAll('h2, h3');
    if (headings.length < 2) return;

    const tocBox = document.getElementById('toc-box');
    const tocList = document.getElementById('toc-list');
    if (!tocBox || !tocList) return;

    headings.forEach((h, idx) => {
        if (!h.id) {
            h.id = 'section-' + (idx + 1);
        }
        const li = document.createElement('li');
        li.className = h.tagName.toLowerCase() === 'h3' ? 'pl-4 border-l-2 border-[#168BD2]/30 py-0.5' : 'py-0.5';
        const a = document.createElement('a');
        a.href = '#' + h.id;
        a.className = 'hover:text-[#168BD2] dark:hover:text-[#38BDF8] transition-colors flex items-center gap-1.5';
        a.innerHTML = '<span class="text-[#168BD2] font-black">' + (idx + 1) + '.</span> <span>' + h.innerText + '</span>';
        li.appendChild(a);
        tocList.appendChild(li);
    });

    tocBox.classList.remove('hidden');
});
</script>
