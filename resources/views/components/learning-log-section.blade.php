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

<section id="learning-log" class="relative bg-carbon-950/60 text-slate-100 py-20 lg:py-28 overflow-hidden border-b border-carbon-800/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ─── Section Header ─── -->
        <div class="mb-12 max-w-2xl">
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

        <!-- ─── 3-Column Grid Layout ─── -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">

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
                <article class="group flex flex-col justify-between rounded-xl bg-carbon-900 border border-carbon-800 hover:border-carbon-700/80 transition-all duration-200 hover:-translate-y-0.5 overflow-hidden h-full">
                    
                    <div>
                        <!-- Window Mockup Header Bar (3 colored dots) -->
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
                        <div class="p-5 sm:p-6 flex flex-col gap-3">
                            <h3 class="text-sm sm:text-base font-bold text-white group-hover:text-vermilion-400 transition-colors leading-snug">
                                {{ $log->title }}
                            </h3>

                            <p class="text-xs text-slate-300 leading-relaxed font-sans">
                                {{ $log->content }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Footer Meta -->
                    <div class="px-5 pb-5 pt-3 sm:px-6 sm:pb-6 flex items-center justify-between border-t border-carbon-800 mt-3 text-[11px] text-slate-400 font-mono">
                        @if($pubDate)
                            <span class="text-[10px] text-slate-400">
                                {{ $pubDate }}
                            </span>
                        @else
                            <span></span>
                        @endif

                        @if($relatedName)
                            <span class="text-[10px] font-medium text-slate-400 bg-carbon-950 border border-carbon-800 px-2 py-0.5 rounded truncate max-w-[150px]">
                                {{ $relatedName }}
                            </span>
                        @endif
                    </div>

                </article>
            @endforeach

        </div>

    </div>
</section>
