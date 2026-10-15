@props(['learningLogs' => null])

@php
    $items = $learningLogs;

    if ($items === null && class_exists(\App\Models\LearningLogEntry::class)) {
        $items = \App\Models\LearningLogEntry::published()->with('relatedProject')->latest('published_at')->get();
    }

    if (!$items || $items->isEmpty()) {
        $items = collect([
            (object)[
                'title' => 'Penerapan API Resources & Custom Form Requests',
                'content' => 'Praktik terbaik dalam memisahkan logika validasi input dengan Form Requests dan pemformatan output JSON dengan Eloquent API Resources untuk menjaga controller tetap clean dan scalable.',
                'tag' => 'production_ready',
                'category' => 'laravel',
                'relatedProject' => (object)['title' => 'OrderSync API'],
                'published_at' => \Carbon\Carbon::parse('2026-06-15'),
            ],
            (object)[
                'title' => 'Eksplorasi Dynamic Component & Scope Query di Laravel Eloquent',
                'content' => 'Catatan mengenai efisiensi penulisan reusable query scopes seperti scopePublished() dan scopeOrderedByComplexity() agar pengambilan data di controller tetap expressive.',
                'tag' => 'production_ready',
                'category' => 'laravel',
                'relatedProject' => (object)['title' => 'Portfolio CMS'],
                'published_at' => \Carbon\Carbon::parse('2026-08-25'),
            ],
            (object)[
                'title' => 'Eksplorasi Redis Caching untuk API Rate Limiting & Session',
                'content' => 'Mengevaluasi latensi pemindahan session store dan rate limiting throttling dari database ke Redis standalone server. Latensi throttling turun dari 15ms menjadi < 2ms.',
                'tag' => 'production_ready',
                'category' => 'cloud_engineering',
                'relatedProject' => (object)['title' => 'OrderSync API'],
                'published_at' => \Carbon\Carbon::parse('2026-06-01'),
            ],
            (object)[
                'title' => 'Containerization PHP 8.3 & Nginx dengan Docker Multi-Stage',
                'content' => 'Eksplorasi optimasi container image Laravel menggunakan Docker multi-stage build dan Alpine Linux untuk memangkas ukuran image dari 800MB menjadi di bawah 140MB siap deploy.',
                'tag' => 'exploring',
                'category' => 'cloud_engineering',
                'relatedProject' => (object)['title' => 'Portfolio CMS'],
                'published_at' => \Carbon\Carbon::parse('2026-09-02'),
            ],
        ]);
    }

    $laravelItems = $items->filter(fn($item) => ($item->category ?? 'laravel') === 'laravel');
    $cloudItems = $items->filter(fn($item) => ($item->category ?? '') === 'cloud_engineering');
@endphp

<section id="learning-log" class="relative bg-carbon-950/60 text-slate-100 py-20 lg:py-28 overflow-hidden border-b border-carbon-800/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ─── Section Header ─── -->
        <div class="mb-14 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 font-mono text-[11px] font-semibold uppercase tracking-widest text-vermilion-400 mb-3">
                <span class="w-3.5 h-px bg-vermilion-500 rounded"></span>
                // {{ __('log.tag') }}
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight tracking-tight">
                {{ __('log.title') }}
            </h2>
            <p class="mt-3 text-slate-400 text-sm leading-relaxed font-normal">
                {{ __('log.subtitle') }}
            </p>
        </div>

        <!-- ─── Two-Track Split Grid Layout ─── -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-start">

            <!-- ═════ TRACK 1: LARAVEL & SYSTEM ARCHITECTURE ═════ -->
            <div class="flex flex-col gap-5">
                <!-- Track Pillar Header -->
                <div class="flex items-center justify-between p-4 rounded-xl bg-carbon-900/90 border border-carbon-800 backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-vermilion-500/10 border border-vermilion-500/20 flex items-center justify-center text-vermilion-400 shrink-0">
                            <!-- Laravel / Code Layer Icon -->
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-mono text-[10px] uppercase font-bold text-vermilion-400 tracking-wider">// TRACK 01</span>
                            </div>
                            <h3 class="text-sm font-bold text-white tracking-tight">
                                {{ __('log.track_laravel_title') }}
                            </h3>
                        </div>
                    </div>
                    <span class="font-mono text-[10px] text-slate-400 bg-carbon-950 border border-carbon-800 px-2.5 py-1 rounded">
                        {{ $laravelItems->count() }} {{ $laravelItems->count() === 1 ? 'entry' : 'entries' }}
                    </span>
                </div>

                <p class="text-xs text-slate-400 font-sans px-1 -mt-2">
                    {{ __('log.track_laravel_desc') }}
                </p>

                <!-- Cards List -->
                <div class="flex flex-col gap-5">
                    @forelse($laravelItems as $log)
                        @php
                            $pubDate = null;
                            if (!empty($log->published_at)) {
                                $pubDate = is_string($log->published_at)
                                    ? \Carbon\Carbon::parse($log->published_at)->format('d M Y')
                                    : $log->published_at->format('d M Y');
                            }
                            $isProdReady = ($log->tag === 'production_ready' || (defined('\App\Models\LearningLogEntry::TAG_PRODUCTION_READY') && $log->tag === \App\Models\LearningLogEntry::TAG_PRODUCTION_READY));
                            $relatedName = is_object($log->relatedProject) ? $log->relatedProject->title : null;
                        @endphp

                        <article class="group flex flex-col justify-between rounded-xl bg-carbon-900 border border-carbon-800 hover:border-carbon-700/80 transition-all duration-200 hover:-translate-y-0.5 overflow-hidden">
                            <div>
                                <!-- Window Mockup Header Bar -->
                                <div class="flex items-center justify-between px-4 py-2.5 bg-carbon-950 border-b border-carbon-800 select-none">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-rose-500/80"></span>
                                        <span class="w-2 h-2 rounded-full bg-amber-400/80"></span>
                                        <span class="w-2 h-2 rounded-full bg-emerald-400/80"></span>
                                    </div>
                                    <div>
                                        @if($isProdReady)
                                            <span class="font-mono text-[10px] font-semibold text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded inline-flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                                {{ __('log.tag_production_ready') }}
                                            </span>
                                        @else
                                            <span class="font-mono text-[10px] font-semibold text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2 py-0.5 rounded inline-flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                                {{ __('log.tag_exploring') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="p-5 flex flex-col gap-2.5">
                                    <h4 class="text-sm sm:text-base font-bold text-white group-hover:text-vermilion-400 transition-colors leading-snug">
                                        {{ $log->title }}
                                    </h4>
                                    <p class="text-xs text-slate-300 leading-relaxed font-sans">
                                        {{ $log->content }}
                                    </p>
                                </div>
                            </div>

                            <!-- Card Footer Meta -->
                            <div class="px-5 pb-4 pt-3 flex items-center justify-between border-t border-carbon-800/80 mt-1 text-[11px] text-slate-400 font-mono">
                                <span class="text-[10px] text-slate-400">
                                    {{ $pubDate ?? '—' }}
                                </span>
                                @if($relatedName)
                                    <span class="text-[10px] font-medium text-slate-400 bg-carbon-950 border border-carbon-800 px-2 py-0.5 rounded truncate max-w-[180px]">
                                        {{ $relatedName }}
                                    </span>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="p-8 rounded-xl border border-dashed border-carbon-800 text-center font-mono text-xs text-slate-500 bg-carbon-950/40">
                            {{ __('log.empty_track') }}
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- ═════ TRACK 2: CLOUD ENGINEERING & INFRASTRUCTURE ═════ -->
            <div class="flex flex-col gap-5">
                <!-- Track Pillar Header -->
                <div class="flex items-center justify-between p-4 rounded-xl bg-carbon-900/90 border border-carbon-800 backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                            <!-- Cloud / Server Cluster Icon -->
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z" />
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-mono text-[10px] uppercase font-bold text-cyan-400 tracking-wider">// TRACK 02</span>
                            </div>
                            <h3 class="text-sm font-bold text-white tracking-tight">
                                {{ __('log.track_cloud_title') }}
                            </h3>
                        </div>
                    </div>
                    <span class="font-mono text-[10px] text-slate-400 bg-carbon-950 border border-carbon-800 px-2.5 py-1 rounded">
                        {{ $cloudItems->count() }} {{ $cloudItems->count() === 1 ? 'entry' : 'entries' }}
                    </span>
                </div>

                <p class="text-xs text-slate-400 font-sans px-1 -mt-2">
                    {{ __('log.track_cloud_desc') }}
                </p>

                <!-- Cards List -->
                <div class="flex flex-col gap-5">
                    @forelse($cloudItems as $log)
                        @php
                            $pubDate = null;
                            if (!empty($log->published_at)) {
                                $pubDate = is_string($log->published_at)
                                    ? \Carbon\Carbon::parse($log->published_at)->format('d M Y')
                                    : $log->published_at->format('d M Y');
                            }
                            $isProdReady = ($log->tag === 'production_ready' || (defined('\App\Models\LearningLogEntry::TAG_PRODUCTION_READY') && $log->tag === \App\Models\LearningLogEntry::TAG_PRODUCTION_READY));
                            $relatedName = is_object($log->relatedProject) ? $log->relatedProject->title : null;
                        @endphp

                        <article class="group flex flex-col justify-between rounded-xl bg-carbon-900 border border-carbon-800 hover:border-carbon-700/80 transition-all duration-200 hover:-translate-y-0.5 overflow-hidden">
                            <div>
                                <!-- Window Mockup Header Bar -->
                                <div class="flex items-center justify-between px-4 py-2.5 bg-carbon-950 border-b border-carbon-800 select-none">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-rose-500/80"></span>
                                        <span class="w-2 h-2 rounded-full bg-amber-400/80"></span>
                                        <span class="w-2 h-2 rounded-full bg-emerald-400/80"></span>
                                    </div>
                                    <div>
                                        @if($isProdReady)
                                            <span class="font-mono text-[10px] font-semibold text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded inline-flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                                {{ __('log.tag_production_ready') }}
                                            </span>
                                        @else
                                            <span class="font-mono text-[10px] font-semibold text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2 py-0.5 rounded inline-flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                                {{ __('log.tag_exploring') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="p-5 flex flex-col gap-2.5">
                                    <h4 class="text-sm sm:text-base font-bold text-white group-hover:text-cyan-400 transition-colors leading-snug">
                                        {{ $log->title }}
                                    </h4>
                                    <p class="text-xs text-slate-300 leading-relaxed font-sans">
                                        {{ $log->content }}
                                    </p>
                                </div>
                            </div>

                            <!-- Card Footer Meta -->
                            <div class="px-5 pb-4 pt-3 flex items-center justify-between border-t border-carbon-800/80 mt-1 text-[11px] text-slate-400 font-mono">
                                <span class="text-[10px] text-slate-400">
                                    {{ $pubDate ?? '—' }}
                                </span>
                                @if($relatedName)
                                    <span class="text-[10px] font-medium text-slate-400 bg-carbon-950 border border-carbon-800 px-2 py-0.5 rounded truncate max-w-[180px]">
                                        {{ $relatedName }}
                                    </span>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="p-8 rounded-xl border border-dashed border-carbon-800 text-center font-mono text-xs text-slate-500 bg-carbon-950/40">
                            {{ __('log.empty_track') }}
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

    </div>
</section>
