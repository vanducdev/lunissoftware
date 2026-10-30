import './bootstrap';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS (Animate on Scroll)
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 700,
        easing: 'ease-out-cubic',
        once: true,
        offset: 50,
        disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    });

    // Initialize Swiper for Testimonials
    if (document.querySelector('.testimonial-swiper')) {
        new Swiper('.testimonial-swiper', {
            modules: [Pagination, Autoplay],
            slidesPerView: 1,
            spaceBetween: 24,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }

    // Initialize Swiper for Partners
    if (document.querySelector('.partners-swiper')) {
        new Swiper('.partners-swiper', {
            modules: [Autoplay],
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                480: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                1024: { slidesPerView: 5 },
            },
        });
    }

    // Dark Mode Toggle
    const themeToggleBtns = document.querySelectorAll('.theme-toggle-btn');
    themeToggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('lush_theme', isDark ? 'dark' : 'light');
        });
    });

    // Mobile Drawer Toggle
    const drawerOpenBtn = document.getElementById('mobile-drawer-open');
    const drawerCloseBtn = document.getElementById('mobile-drawer-close');
    const mobileDrawer = document.getElementById('mobile-drawer');
    const drawerBackdrop = document.getElementById('drawer-backdrop');

    function openDrawer() {
        if (!mobileDrawer) return;
        mobileDrawer.classList.remove('translate-x-full');
        if (drawerBackdrop) drawerBackdrop.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        if (!mobileDrawer) return;
        mobileDrawer.classList.add('translate-x-full');
        if (drawerBackdrop) drawerBackdrop.classList.add('hidden');
        document.body.style.overflow = '';
    }

    if (drawerOpenBtn) drawerOpenBtn.addEventListener('click', openDrawer);
    if (drawerCloseBtn) drawerCloseBtn.addEventListener('click', closeDrawer);
    if (drawerBackdrop) drawerBackdrop.addEventListener('click', closeDrawer);

    // Floating Island Capsule Glow on Scroll
    const navCapsule = document.getElementById('nav-capsule');
    if (navCapsule) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 15) {
                navCapsule.classList.add('shadow-[0_16px_45px_-5px_rgba(22,139,210,0.16)]', 'border-[#168BD2]/30');
            } else {
                navCapsule.classList.remove('shadow-[0_16px_45px_-5px_rgba(22,139,210,0.16)]', 'border-[#168BD2]/30');
            }
        });
    }

    // Scroll Progress Bar
    const progressBar = document.getElementById('page-progress-bar');
    if (progressBar) {
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + '%';
        });
    }
});

// Global Toast Notification Helper
window.showToast = function (message, type = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    const isSuccess = type === 'success';

    toast.className = `flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg text-sm font-medium transition-all duration-300 transform translate-y-2 opacity-0 ${
        isSuccess
            ? 'bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 border border-emerald-500/30 border-l-4 border-l-emerald-500'
            : 'bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 border border-rose-500/30 border-l-4 border-l-rose-500'
    }`;

    toast.innerHTML = `
        <svg class="w-5 h-5 ${isSuccess ? 'text-emerald-500' : 'text-rose-500'} flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            ${isSuccess 
                ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>' 
                : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>'}
        </svg>
        <span class="flex-1">${message}</span>
        <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200" onclick="this.parentElement.remove()">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    `;

    container.appendChild(toast);

    requestAnimationFrame(() => {
        toast.classList.remove('translate-y-2', 'opacity-0');
    });

    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-2');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
};
