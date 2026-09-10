@props(['learningLogs' => null])

@php
    $items = $learningLogs;

    if ($items === null && class_exists(\App\Models\LearningLogEntry::class)) {
        $items = \App\Models\LearningLogEntry::published()->with('relatedProject')->latest('published_at')->get();
    }

    if (!$items || $items->isEmpty()) {
        $items = collect([
            (object)[
                'title' => 'Eksplorasi Redis Caching untuk API Rate Limiting',
                'content' => 'Mencoba memindahkan session dan rate limiting throttling dari database/file driver ke Redis server lokal. Hasilnya latensi throttling turun dari 15ms menjadi < 2ms.',
                'tag' => 'exploring',
                'relatedProject' => (object)['title' => 'OrderSync API'],
                'published_at' => \Carbon\Carbon::parse('2026-06-01'),
            ],
            (object)[
                'title' => 'Penerapan API Resources & Custom Form Requests',
                'content' => 'Praktik terbaik dalam memisahkan logika validasi input dengan Form Requests dan pemformatan output JSON dengan Eloquent API Resources untuk menjaga controller tetap clean.',
                'tag' => 'production_ready',
                'relatedProject' => (object)['title' => 'OrderSync API'],
                'published_at' => \Carbon\Carbon::parse('2026-06-15'),
            ],
            (object)[
                'title' => 'Eksplorasi Dynamic Component & Scope Query di Laravel Eloquent',
                'content' => 'Catatan mengenai efisiensi penulisan scope query seperti scopePublished() dan scopeOrderedByComplexity() agar kode pengambilan data di controller tetap expressive.',
                'tag' => 'production_ready',
                'relatedProject' => (object)['title' => 'Portfolio CMS'],
                'published_at' => \Carbon\Carbon::parse('2026-08-25'),
            ],
        ]);
    }
@endphp

<section id="learning-log" class="relative bg-[#0b0f19] text-slate-100 py-20 lg:py-28 overflow-hidden border-t border-slate-800/60">
    <!-- Ambient Background Lighting -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-600/5 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/5 rounded-full blur-[100px] pointer-events-none translate-y-1/2 -translate-x-1/3"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ─── Section Header ─── -->
        <div class="mb-12 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-widest text-red-400 mb-3">
                <span class="w-4 h-px bg-red-400/80 rounded"></span>
                Learning Log &amp; Technical Notes
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight tracking-tight">
                Catatan Eksplorasi &amp; Production Notes
            </h2>
            <p class="mt-3 text-slate-400 text-sm leading-relaxed">
                Log teknis bergaya blog singkat mengenai eksperimen, temuan optimasi, serta praktik terbaik yang siap diterapkan ke lingkungan produksi.
            </p>
        </div>

        <!-- ─── 3-Column Grid Layout ─── -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($items as $log)
                @php
                    $pubDate = null;
                    if (!empty($log->published_at)) {
                        $pubDate = is_string($log->published_at)
                            ? \Carbon\Carbon::parse($log->published_at)->format('d M Y')
                            : $log->published_at->format('d M Y');
                    }
                    $isProdReady = ($log->tag === 'production_ready' || $log->tag === \App\Models\LearningLogEntry::TAG_PRODUCTION_READY);
                    $relatedName = is_object($log->relatedProject) ? $log->relatedProject->title : null;
                @endphp

                <!-- Window Mockup Card for Learning Log Entry -->
                <article class="group flex flex-col justify-between rounded-xl bg-slate-900/70 border border-slate-800 hover:border-slate-700/80 transition-all duration-200 hover:-translate-y-0.5 overflow-hidden">
                    
                    <div>
                        <!-- Window Mockup Header Bar (3 colored dots) -->
                        <div class="flex items-center justify-between px-4 py-3 bg-slate-900 border-b border-slate-800/60">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-rose-500/70"></span>
                                <span class="w-2 h-2 rounded-full bg-amber-400/70"></span>
                                <span class="w-2 h-2 rounded-full bg-emerald-400/70"></span>
                            </div>
                            
                            <div>
                                @if($isProdReady)
                                    <span class="font-mono text-[10px] font-semibold text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-0.5 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Production-Ready
                                    </span>
                                @else
                                    <span class="font-mono text-[10px] font-semibold text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2.5 py-0.5 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                        Exploring
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex flex-col gap-3">
                            <h3 class="text-sm sm:text-base font-bold text-white group-hover:text-sky-400 transition-colors leading-snug">
                                {{ $log->title }}
                            </h3>

                            <p class="text-xs text-slate-300 leading-relaxed">
                                {{ $log->content }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Footer Meta -->
                    <div class="px-5 pb-5 pt-3 sm:px-6 sm:pb-6 flex items-center justify-between border-t border-slate-800/60 mt-3 text-[11px] text-slate-400">
                        @if($pubDate)
                            <span class="font-mono text-[10px] text-slate-400">
                                {{ $pubDate }}
                            </span>
                        @else
                            <span></span>
                        @endif

                        @if($relatedName)
                            <span class="text-[10px] font-medium text-slate-400 bg-slate-800/80 border border-slate-700/60 px-2.5 py-0.5 rounded truncate max-w-[150px]">
                                {{ $relatedName }}
                            </span>
                        @endif
                    </div>

                </article>
            @endforeach

        </div>

    </div>
</section>
