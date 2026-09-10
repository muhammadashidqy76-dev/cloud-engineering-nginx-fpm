@props(['projects' => null])

@php
    $items = $projects;

    if ($items === null && class_exists(\App\Models\Project::class)) {
        $items = \App\Models\Project::published()
            ->with('techStackItems')
            ->orderedByComplexity()
            ->get();
    }

    if (!$items || (is_countable($items) && count($items) === 0)) {
        $items = collect([
            (object)[
                'title' => 'StockGuard — E-Commerce Checkout Engine',
                'slug' => 'stockguard-ecommerce-checkout-engine',
                'complexity_order' => 1,
                'problem_statement' => 'Mengatasi masalah race condition pada stok produk saat lonjakan checkout simultan (promo/flash sale) yang berpotensi menyebabkan overselling (stok minus).',
                'architecture_decision_summary' => "1. Pessimistic Locking & Database Transactions: Mengombinasikan DB::transaction() dengan lockForUpdate() pada stok produk.\n2. Async Job Processing: Memanfaatkan Laravel Queue berbasis Redis untuk proses berat.\n3. Service Layer Pattern: Enkapsulasi logika bisnis checkout terpisah dari Controller.",
                'impact_metric' => '300+ checkout simultan tanpa overselling, response time <150ms',
                'preview_image_path' => 'https://placehold.co/800x450/0f0f23/6366f1?text=StockGuard+Dashboard',
                'tech_tags' => ['Laravel', 'PHP', 'MySQL', 'Blade Templating', 'Tailwind CSS'],
                'demo_url' => '#',
            ],
            (object)[
                'title' => 'OrderSync API — Multi-Channel Order Aggregator',
                'slug' => 'ordersync-api-multi-channel-order-aggregator',
                'complexity_order' => 2,
                'problem_statement' => 'Menyatukan data pesanan dari beberapa channel penjualan (marketplace, POS, website) ke dalam satu sumber data terpusat tanpa duplikasi atau konflik status order.',
                'architecture_decision_summary' => "1. Laravel API Resource untuk konsistensi respon JSON.\n2. Sanctum token-based authentication untuk otorisasi akses client.",
                'impact_metric' => 'Menyatukan 3 channel penjualan ke 1 API terpusat, response time rata-rata <200ms',
                'preview_image_path' => null,
                'tech_tags' => ['Laravel', 'PHP', 'RESTful API', 'MySQL', 'Redis'],
                'demo_url' => '#',
            ],
            (object)[
                'title' => 'Modular Portfolio CMS & Learning Tracker',
                'slug' => 'modular-portfolio-cms',
                'complexity_order' => 3,
                'problem_statement' => 'Merancang sistem CMS khusus portfolio dev yang memungkinkan pembaruan konten dinamis tanpa hardcode view.',
                'architecture_decision_summary' => "1. Laravel Breeze auth scaffolding untuk keamanan CMS.\n2. Relasi Eloquent dan scope query khusus untuk publikasi konten dinamis.",
                'impact_metric' => 'Memangkas waktu publikasi update portfolio dari 30 menit menjadi <2 menit via CMS.',
                'preview_image_path' => 'projects/portfolio-cms.jpg',
                'tech_tags' => ['Laravel', 'PHP', 'MySQL', 'Git & GitHub', 'Blade Templating', 'Tailwind CSS'],
                'demo_url' => '#',
            ],
        ]);
    }
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
                @php
                    $title = is_array($project) ? ($project['title'] ?? '') : $project->title;
                    $slug = is_array($project) ? ($project['slug'] ?? '') : $project->slug;
                    $order = is_array($project) ? ($project['complexity_order'] ?? 1) : $project->complexity_order;
                    $problem = is_array($project) ? ($project['problem_statement'] ?? '') : $project->problem_statement;
                    $archSummary = is_array($project) ? ($project['architecture_decision_summary'] ?? '') : $project->architecture_decision_summary;
                    $impact = is_array($project) ? ($project['impact_metric'] ?? '') : $project->impact_metric;
                    $previewImage = is_array($project) ? ($project['preview_image_path'] ?? $project['preview_image'] ?? null) : $project->preview_image_path;
                    $demoUrl = is_array($project) ? ($project['demo_url'] ?? '#') : ($project->demo_url ?? '#');

                    // Title splitting
                    $mainTitle = $title;
                    $subtitle = '';
                    if (str_contains($title, '—')) {
                        [$mainTitle, $subtitle] = array_map('trim', explode('—', $title, 2));
                    } elseif (str_contains($title, ' - ')) {
                        [$mainTitle, $subtitle] = array_map('trim', explode(' - ', $title, 2));
                    }

                    // Architecture highlights
                    $highlights = [];
                    if (!empty($archSummary)) {
                        $lines = preg_split('/\r\n|\r|\n/', trim($archSummary));
                        foreach ($lines as $line) {
                            $line = trim($line);
                            if (!empty($line)) {
                                $cleanLine = preg_replace('/^(\d+\.|\-|\*)\s*/', '', $line);
                                $highlights[] = $cleanLine;
                            }
                        }
                    }

                    // Tech tags from relation or array
                    $techTags = [];
                    if ($project instanceof \App\Models\Project && $project->relationLoaded('techStackItems')) {
                        $techTags = $project->techStackItems->pluck('name')->all();
                    } elseif (is_array($project) && isset($project['tech_tags'])) {
                        $techTags = $project['tech_tags'];
                    } elseif (isset($project->tech_tags)) {
                        $techTags = $project->tech_tags;
                    } elseif ($project instanceof \App\Models\Project) {
                        $techTags = $project->techStackItems()->pluck('name')->all();
                    }

                    // Mockup type: Order 2 or API without preview image uses code mockup
                    $isApiMockup = ($order == 2) || (empty($previewImage) && (str_contains(strtolower($title), 'api') || $order == 2));
                    $browserUrl = $slug ? ($slug . '.local') : 'app.local';
                @endphp

                <article class="group flex flex-col rounded-xl bg-slate-900/70 border border-slate-800 hover:border-slate-700 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/30 overflow-hidden h-full">

                    <!-- Top Preview / Window Mockup -->
                    <div class="relative flex-none bg-slate-950 border-b border-slate-800">
                        @if(!$isApiMockup)
                            <!-- Browser Window Header -->
                            <div class="flex items-center gap-2 px-3.5 py-2.5 bg-slate-900 border-b border-slate-800/60">
                                <div class="flex gap-1">
                                    <span class="w-2 h-2 rounded-full bg-rose-500/70"></span>
                                    <span class="w-2 h-2 rounded-full bg-amber-400/70"></span>
                                    <span class="w-2 h-2 rounded-full bg-emerald-400/70"></span>
                                </div>
                                <span class="flex-1 text-center font-mono text-[10px] text-slate-500 bg-slate-950/60 px-2.5 py-0.5 rounded border border-slate-800 truncate max-w-[180px] mx-auto">
                                    {{ $browserUrl }}
                                </span>
                            </div>

                            <!-- Browser Window Content -->
                            <div class="h-28 overflow-hidden relative">
                                @if(!empty($previewImage))
                                    @php
                                        $imageSrc = \Illuminate\Support\Str::startsWith($previewImage, ['http://', 'https://'])
                                            ? $previewImage
                                            : asset($previewImage);
                                    @endphp
                                    <img src="{{ $imageSrc }}"
                                         alt="{{ $title }}"
                                         class="w-full h-full object-cover opacity-90 group-hover:scale-[1.02] transition-transform duration-300"
                                         loading="lazy"
                                         onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');" />
                                    <div class="hidden w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 p-4 text-center">
                                        <span class="text-xs font-mono text-slate-500">{{ $title }}</span>
                                    </div>
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 p-4 text-center">
                                        <span class="text-xs font-mono text-slate-500">{{ $title }}</span>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- API / Terminal Window Header -->
                            <div class="flex items-center justify-between px-3.5 py-2.5 bg-slate-900 border-b border-slate-800/60">
                                <div class="flex gap-1">
                                    <span class="w-2 h-2 rounded-full bg-rose-500/70"></span>
                                    <span class="w-2 h-2 rounded-full bg-amber-400/70"></span>
                                    <span class="w-2 h-2 rounded-full bg-emerald-400/70"></span>
                                </div>
                                <span class="text-[10px] text-emerald-400 font-mono bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded">
                                    GET /api/v1/orders
                                </span>
                            </div>
                            <!-- API JSON Code Block -->
                            <pre class="h-28 p-3.5 text-[11px] leading-relaxed text-emerald-300/90 bg-[#080d14] overflow-hidden font-mono select-none"><code>{
                                "status": "success",
                                "code": 200,
                                "data": {
                                    "sync": "multi_channel",
                                    "orders": 3,
                                    "latency": "&lt;200ms"
                                }
                                }</code></pre>
                        @endif
                    </div>

                    <!-- Card Body -->
                    <div class="flex flex-col flex-1 p-5 sm:p-6 gap-3.5">

                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-[9px] font-mono font-bold tracking-widest uppercase text-slate-500 bg-slate-800/60 border border-slate-700/60 px-2 py-0.5 rounded">
                                    #0{{ $order }}
                                </span>
                            </div>
                            <h3 class="text-[15px] font-bold text-white leading-snug group-hover:text-red-400 transition-colors">
                                {{ $mainTitle }}
                                @if(!empty($subtitle))
                                    <span class="block text-xs font-normal text-slate-400 mt-1">{{ $subtitle }}</span>
                                @endif
                            </h3>
                        </div>

                        <p class="text-xs text-slate-400 leading-relaxed line-clamp-2">
                            {{ $problem }}
                        </p>

                        @if(count($highlights) > 0)
                            <ul class="space-y-1.5">
                                @foreach(array_slice($highlights, 0, 3) as $h)
                                    <li class="flex items-start gap-1.5 text-[11px] text-slate-300 leading-snug">
                                        <svg class="w-3 h-3 text-red-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="line-clamp-2">{{ $h }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if(count($techTags) > 0)
                            <div class="flex flex-wrap gap-1.5 pt-1 mt-auto">
                                @foreach($techTags as $tag)
                                    <span class="text-[10px] font-medium px-2.5 py-0.5 rounded-full bg-slate-800 text-slate-300 border border-slate-700/60">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <!-- Card Footer / Actions -->
                    <div class="px-5 pb-5 sm:px-6 sm:pb-6 flex flex-col gap-3 mt-auto">
                        @if(!empty($impact))
                            <div class="text-[11px] text-red-300/80 flex items-center gap-1.5">
                                <svg class="w-3 h-3 text-red-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="font-medium truncate">{{ $impact }}</span>
                            </div>
                        @endif

                        <div class="border-t border-slate-800/80"></div>

                        <div class="flex gap-2.5">
                            <a href="#project-{{ $order }}"
                               class="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-lg bg-red-600 hover:bg-red-500 text-white text-xs font-semibold transition-colors shadow-sm shadow-red-600/20">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Detail
                            </a>
                            <a href="{{ $demoUrl }}"
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

