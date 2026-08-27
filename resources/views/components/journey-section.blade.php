@props(['journeyEntries' => null])

@php
    $items = $journeyEntries;

    if ($items === null && class_exists(\App\Models\JourneyEntry::class)) {
        $items = \App\Models\JourneyEntry::published()->with('appliedProject')->chronological()->get();
    }

    if (!$items || $items->isEmpty()) {
        $items = collect([
            (object)[
                'course_name' => 'Laravel Database Transactions & Concurrency Handling',
                'source' => 'Laracasts',
                'learned' => 'Mempelajari penggunaan DB::transaction(), pessimistic locking (lockForUpdate), dan mitigasi race condition pada query database.',
                'appliedProject' => (object)['title' => 'StockGuard — E-Commerce Checkout Engine'],
                'result' => 'Mencegah terjadinya stok minus / overselling pada saat checkout produk e-commerce berkategori high demand.',
                'completed_at' => \Carbon\Carbon::parse('2026-02-15'),
            ],
            (object)[
                'course_name' => 'Mastering RESTful API Architecture & Sanctum Authentication',
                'source' => 'Udemy',
                'learned' => 'Mempelajari standar desain RESTful API, Eloquent API Resources, JWT/Sanctum bearer token authentication, dan rate-limiting middleware.',
                'appliedProject' => (object)['title' => 'OrderSync API — Multi-Channel Order Aggregator'],
                'result' => 'Membangun API headless backend modular dengan struktur respon JSON standar (data, meta, error handling) dan proteksi endpoint terautentikasi.',
                'completed_at' => \Carbon\Carbon::parse('2026-05-10'),
            ],
            (object)[
                'course_name' => 'Laravel Breeze Scaffolding & Dynamic CMS Data Architecture',
                'source' => 'Official Documentation',
                'learned' => 'Mempelajari otentikasi Breeze, pengelolaan relasi Eloquent komplek, scope query (scopePublished), serta penanganan data-driven content.',
                'appliedProject' => (object)['title' => 'Modular Portfolio CMS'],
                'result' => 'Mengubah situs portfolio statis menjadi CMS berbasis database yang fleksibel untuk manajemen konten jangka panjang.',
                'completed_at' => \Carbon\Carbon::parse('2026-08-20'),
            ],
        ]);
    }
@endphp

<section id="journey" class="relative bg-[#0b0f19] text-slate-100 py-20 lg:py-28 overflow-hidden border-t border-slate-800/60">
    <!-- Ambient Background Lighting -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-600/5 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/5 rounded-full blur-[100px] pointer-events-none translate-y-1/2 -translate-x-1/3"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ─── Section Header ─── -->
        <div class="mb-12 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-widest text-red-400 mb-3">
                <span class="w-4 h-px bg-red-400/80 rounded"></span>
                Learning Journey &amp; Background
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight tracking-tight">
                Timeline Pembelajaran Self-Directed
            </h2>
            <p class="mt-3 text-slate-400 text-sm leading-relaxed">
                Pengganti pengalaman kerja formal &mdash; pembuktian kemampuan melalui siklus belajar terstruktur, aplikasi langsung ke project nyata, dan hasil terukur.
            </p>
        </div>

        <!-- ─── Collapsible Accordion Wrapper (Alpine.js) ─── -->
        <div x-data="{ open: false }" class="w-full">

            <!-- Accordion Trigger Button -->
            <button type="button"
                    @click="open = !open"
                    class="w-full flex items-center justify-between p-4 sm:p-5 rounded-xl bg-[#0f1422]/90 border border-slate-800/80 hover:border-slate-700/80 transition-all duration-200 group text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500/40">
                <div class="flex items-center gap-4 sm:gap-5 min-w-0 pr-4">
                    <div class="w-10 h-10 shrink-0 rounded-lg bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-400 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-1 min-w-0">
                        <span class="text-sm sm:text-base font-bold text-white block group-hover:text-red-400 transition-colors truncate">
                            Timeline &amp; Course History
                        </span>
                        <span class="text-xs text-slate-400 leading-normal">
                            <span x-text="open ? 'Sembunyikan detail timeline' : 'Tampilkan {{ count($items) }} riwayat pembelajaran (learned → applied → result)'"></span>
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-3 shrink-0">
                    <span class="font-mono text-xs text-rose-300/80 bg-slate-800/60 border border-slate-700/50 px-2.5 py-1 rounded-md">
                        {{ count($items) }} {{ count($items) > 1 ? 'courses' : 'course' }}
                    </span>
                    <span class="p-1.5 rounded-lg bg-slate-800/80 text-slate-400 group-hover:text-white transition-colors">
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </div>
            </button>

            <!-- Collapsible Content -->
            <div x-show="open"
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="mt-8 space-y-6">

                @foreach($items as $entry)
                    @php
                        $completedDate = null;
                        if (!empty($entry->completed_at)) {
                            $completedDate = is_string($entry->completed_at)
                                ? \Carbon\Carbon::parse($entry->completed_at)->format('M Y')
                                : $entry->completed_at->format('M Y');
                        }
                        $appliedProjectName = is_object($entry->appliedProject)
                            ? $entry->appliedProject->title
                            : null;
                    @endphp

                    <!-- Window Mockup Card for Journey Entry -->
                    <article class="group flex flex-col rounded-xl bg-slate-900/70 border border-slate-800 hover:border-slate-700/80 transition-all duration-200 hover:-translate-y-0.5 overflow-hidden">
                        
                        <!-- Window Mockup Header Bar (3 colored dots) -->
                        <div class="flex items-center justify-between px-4 py-3 bg-slate-900 border-b border-slate-800/60">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-rose-500/70"></span>
                                <span class="w-2 h-2 rounded-full bg-amber-400/70"></span>
                                <span class="w-2 h-2 rounded-full bg-emerald-400/70"></span>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                @if(!empty($entry->source))
                                    <span class="font-mono text-[10px] text-slate-400 bg-slate-950/60 px-2.5 py-0.5 rounded border border-slate-800 truncate">
                                        {{ $entry->source }}
                                    </span>
                                @endif
                                @if($completedDate)
                                    <span class="font-mono text-[10px] text-rose-300/80 bg-red-500/10 border border-red-500/20 px-2.5 py-0.5 rounded">
                                        {{ $completedDate }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex flex-col gap-4">
                            <!-- Course Title -->
                            <h3 class="text-base font-bold text-white group-hover:text-red-400 transition-colors leading-snug">
                                {{ $entry->course_name }}
                            </h3>

                            <!-- Structured 3-Pillar List (Learned -> Applied -> Result) -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 pt-1">
                                
                                <!-- Pillar 1: Learned -->
                                <div class="flex flex-col p-4 rounded-lg bg-[#080d14] border border-slate-800/80 gap-2.5">
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-mono font-bold uppercase text-sky-400 bg-sky-500/10 border border-sky-500/20 px-2 py-0.5 rounded">
                                            1. Learned
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-300 leading-relaxed">
                                        {{ $entry->learned }}
                                    </p>
                                </div>

                                <!-- Pillar 2: Applied -->
                                <div class="flex flex-col p-4 rounded-lg bg-[#080d14] border border-slate-800/80 gap-2.5">
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-mono font-bold uppercase text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2 py-0.5 rounded">
                                            2. Applied
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-300 leading-relaxed">
                                        @if($appliedProjectName)
                                            Diimplementasikan pada <span class="font-semibold text-white">{{ $appliedProjectName }}</span>
                                        @else
                                            Diaplikasikan langsung pada eksperimen fitur backend.
                                        @endif
                                    </p>
                                </div>

                                <!-- Pillar 3: Result -->
                                <div class="flex flex-col p-4 rounded-lg bg-[#080d14] border border-slate-800/80 gap-2.5">
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-mono font-bold uppercase text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded">
                                            3. Result
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-300 leading-relaxed">
                                        {{ $entry->result }}
                                    </p>
                                </div>

                            </div>

                        </div>
                    </article>
                @endforeach

            </div>
        </div>

    </div>
</section>
