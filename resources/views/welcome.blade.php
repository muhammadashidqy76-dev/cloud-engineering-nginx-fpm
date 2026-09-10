<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ashidqy — Laravel Backend Developer</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-web.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0b0f19] text-slate-100 font-sans antialiased selection:bg-red-500 selection:text-white">
    <x-navbar />
    <x-hero-section />
    <x-featured-projects />
    <x-tech-stack />
    <x-work-experience-section />

    <!-- ─── Progressive Collapsible Secondary Sections (Learning Journey & Learning Log) ─── -->
    <div x-data="{
        stage: 0,
        nextStage() {
            if (this.stage < 2) {
                this.stage++;
            } else {
                this.stage = 0;
            }
        }
    }" class="relative bg-[#0b0f19]">

        <!-- Section 1: Learning Journey & Credentials (Shown when stage >= 1) -->
        <div x-show="stage >= 1"
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4">
            <x-journey-section />
        </div>

        <!-- Section 2: Learning Log & Technical Notes (Shown when stage >= 2) -->
        <div x-show="stage >= 2"
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4">
            <x-learning-log-section />
        </div>

        <!-- Horizontal Centered Trigger Bar (Positioned dynamically beneath the last active section) -->
        <div class="relative py-12 flex items-center justify-center border-t border-slate-800/80">
            <div class="relative flex justify-center z-10">
                <button type="button"
                        @click="nextStage()"
                        class="inline-flex items-center gap-3 px-6 py-3.5 rounded-full bg-slate-900/95 hover:bg-slate-900 border border-slate-800 hover:border-slate-700 text-slate-300 hover:text-white transition-all duration-200 shadow-xl hover:shadow-red-500/5 hover:-translate-y-0.5 group focus:outline-none focus:ring-2 focus:ring-red-500/40 cursor-pointer">
                    
                    <span class="w-2 h-2 rounded-full bg-red-500/80 group-hover:bg-red-400"
                          :class="stage === 2 ? 'bg-amber-400' : 'animate-pulse'"></span>
                    
                    <span class="text-xs sm:text-sm font-semibold tracking-wide"
                          x-text="stage === 0 
                                    ? 'Tampilkan Learning Journey &amp; Credentials' 
                                    : (stage === 1 
                                        ? 'Lanjut: Tampilkan Learning Log &amp; Technical Notes' 
                                        : 'Tutup Riwayat &amp; Catatan Teknis')">
                    </span>

                    <div class="w-6 h-6 rounded-full bg-slate-800/80 border border-slate-700/60 flex items-center justify-center text-slate-400 group-hover:text-white transition-transform duration-300"
                         :class="stage === 2 ? 'rotate-180 bg-red-500/20 text-red-300 border-red-500/30' : ''">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>

    </div>

    <x-footer />
</body>
</html>
