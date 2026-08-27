@props(['projects' => null])

@php
    $defaultProjects = [
        [
            'complexity_order' => 1,
            'title' => 'StockGuard',
            'subtitle' => 'E-Commerce Checkout Engine',
            'type' => 'browser',
            'url' => 'stockguard.app/checkout',
            'demo_url' => 'https://demo.example.com/stockguard',
            'preview_image' => 'https://placehold.co/800x400/0d1117/6366f1?text=StockGuard',
            'problem_statement' => 'Mengatasi race condition stok saat flash sale yang berpotensi menyebabkan overselling.',
            'architecture_highlights' => [
                'Pessimistic Locking (lockForUpdate) + DB Transactions',
                'Laravel Queue (Redis) untuk async invoice processing',
            ],
            'tech_tags' => ['Laravel', 'PHP', 'MySQL', 'Redis', 'Docker'],
            'impact_metric' => '300+ checkout simultan tanpa overselling, <150ms',
        ],
        [
            'complexity_order' => 2,
            'title' => 'OrderSync API',
            'subtitle' => 'Multi-Channel Order Aggregator',
            'type' => 'json',
            'endpoint' => 'GET /api/v1/orders',
            'demo_url' => 'https://demo.example.com/ordersync',
            'json_preview' => "{\n  \"status\": \"success\",\n  \"data\": [\n    { \"id\": 1, \"channel\": \"tokopedia\" },\n    { \"id\": 2, \"channel\": \"website\" }\n  ]\n}",
            'problem_statement' => 'Menyatukan pesanan dari beberapa channel (marketplace, POS, website) ke satu data terpusat tanpa duplikasi.',
            'architecture_highlights' => [
                'API Resource untuk konsistensi JSON response ke semua consumer',
                'Sanctum token auth untuk otorisasi tiap channel/client',
            ],
            'tech_tags' => ['Laravel', 'PHP', 'MySQL', 'Sanctum'],
            'impact_metric' => '3 channel terpusat, response time rata-rata <200ms',
        ],
        [
            'complexity_order' => 3,
            'title' => '[Project TBD]',
            'subtitle' => 'Portfolio CMS',
            'type' => 'browser',
            'url' => 'cms.portfolio.dev/admin',
            'demo_url' => '#',
            'preview_image' => 'https://placehold.co/800x400/0d1117/38bdf8?text=CMS+Admin',
            'problem_statement' => '[Problem statement will be updated when project is finalized.]',
            'architecture_highlights' => [
                '[Architecture highlight #1 TBD]',
                '[Architecture highlight #2 TBD]',
            ],
            'tech_tags' => ['Laravel', 'Livewire', 'MySQL'],
            'impact_metric' => '[Impact metric TBD]',
        ],
    ];

    $items = $projects ?? $defaultProjects;
@endphp

<section id="projects" class="relative bg-[#0b0f19] text-slate-100 py-20 lg:py-28 overflow-hidden border-t border-slate-800/60">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-600/5 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/5 rounded-full blur-[100px] pointer-events-none translate-y-1/2 -translate-x-1/3"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="mb-12 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-widest text-red-400 mb-3">
                <span class="w-4 h-px bg-red-400/80 rounded"></span>
                Featured Projects
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight tracking-tight">
                Architected for Performa &amp; Reliability
            </h2>
            <p class="mt-3 text-slate-400 text-sm leading-relaxed">
                Tiga project dari kompleksitas rendah ke tinggi &mdash; Monolith, Headless API, CMS.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $project)

            <article class="group flex flex-col rounded-xl bg-slate-900/70 border border-slate-800 hover:border-slate-700 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/30 overflow-hidden">

                <div class="relative flex-none bg-slate-950 border-b border-slate-800">
                    @if(($project['type'] ?? 'browser') === 'browser')

                        <div class="flex items-center gap-2 px-3.5 py-2.5 bg-slate-900 border-b border-slate-800/60">
                            <div class="flex gap-1">
                                <span class="w-2 h-2 rounded-full bg-rose-500/70"></span>
                                <span class="w-2 h-2 rounded-full bg-amber-400/70"></span>
                                <span class="w-2 h-2 rounded-full bg-emerald-400/70"></span>
                            </div>
                            <span class="flex-1 text-center font-mono text-[10px] text-slate-500 bg-slate-950/60 px-2.5 py-0.5 rounded border border-slate-800 truncate max-w-[180px] mx-auto">
                                {{ $project['url'] ?? 'app.local' }}
                            </span>
                        </div>

                        <div class="h-28 overflow-hidden">
                            @php $img = $project['preview_image'] ?? ''; @endphp
                            @if($img)
                                <img src="{{ $img }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover opacity-90 group-hover:scale-[1.02] transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950">
                                    <span class="text-xs font-mono text-slate-600">{{ $project['title'] }}</span>
                                </div>
                            @endif
                        </div>

                    @else

                        <div class="flex items-center justify-between px-3.5 py-2.5 bg-slate-900 border-b border-slate-800/60">
                            <div class="flex gap-1">
                                <span class="w-2 h-2 rounded-full bg-rose-500/70"></span>
                                <span class="w-2 h-2 rounded-full bg-amber-400/70"></span>
                                <span class="w-2 h-2 rounded-full bg-emerald-400/70"></span>
                            </div>
                            <span class="text-[10px] text-emerald-400 font-mono bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded">
                                {{ $project['endpoint'] ?? 'GET /api/v1' }}
                            </span>
                        </div>
                        <pre class="h-28 p-3.5 text-[11px] leading-relaxed text-emerald-300/90 bg-[#080d14] overflow-hidden font-mono select-none"><code>{{ $project['json_preview'] ?? "{\n  \"status\": \"success\"\n}" }}</code></pre>

                    @endif
                </div>

                <div class="flex flex-col flex-1 p-5 sm:p-6 gap-3.5">

                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-[9px] font-mono font-bold tracking-widest uppercase text-slate-500 bg-slate-800/60 border border-slate-700/60 px-2 py-0.5 rounded">
                                #{{ $project['complexity_order'] }}
                            </span>
                        </div>
                        <h3 class="text-[15px] font-bold text-white leading-snug group-hover:text-red-400 transition-colors">
                            {{ $project['title'] }}
                            <span class="block text-xs font-normal text-slate-400 mt-1">{{ $project['subtitle'] ?? '' }}</span>
                        </h3>
                    </div>

                    <p class="text-xs text-slate-400 leading-relaxed line-clamp-2">
                        {{ $project['problem_statement'] }}
                    </p>

                    <ul class="space-y-1.5">
                        @foreach($project['architecture_highlights'] ?? [] as $h)
                        <li class="flex items-start gap-1.5 text-[11px] text-slate-300 leading-snug">
                            <svg class="w-3 h-3 text-red-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $h }}
                        </li>
                        @endforeach
                    </ul>

                    <div class="flex flex-wrap gap-1.5 pt-1">
                        @foreach($project['tech_tags'] ?? [] as $tag)
                            <span class="text-[10px] font-medium px-2.5 py-0.5 rounded-full bg-slate-800 text-slate-300 border border-slate-700/60">{{ $tag }}</span>
                        @endforeach
                    </div>

                </div>

                <div class="px-5 pb-5 sm:px-6 sm:pb-6 flex flex-col gap-3 mt-auto">
                    <div class="text-[11px] text-red-300/80 flex items-center gap-1.5">
                        <svg class="w-3 h-3 text-red-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="font-medium truncate">{{ $project['impact_metric'] }}</span>
                    </div>

                    <div class="border-t border-slate-800/80"></div>

                    <div class="flex gap-2.5">
                        <a href="#project-{{ $project['complexity_order'] }}"
                           class="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-lg bg-red-600 hover:bg-red-500 text-white text-xs font-semibold transition-colors shadow-sm shadow-red-600/20">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Detail
                        </a>
                        <a href="{{ $project['demo_url'] ?? '#' }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-xs font-semibold border border-slate-700 hover:border-slate-600 transition-colors">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Live Demo
                        </a>
                    </div>
                </div>

            </article>
            @endforeach
        </div>

    </div>
</section>
