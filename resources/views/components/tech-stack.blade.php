@props(['techStack' => null])

@php
    $itemsGrouped = $techStack;

    if (!$itemsGrouped) {
        $all = \App\Models\TechStackItem::orderBy('display_order')->get();
        if ($all->isNotEmpty()) {
            $itemsGrouped = $all->groupBy('category');
        } else {
            $itemsGrouped = collect([
                'Backend' => [
                    ['name' => 'Laravel'],
                    ['name' => 'PHP'],
                    ['name' => 'RESTful API'],
                ],
                'Database' => [
                    ['name' => 'MySQL'],
                    ['name' => 'Redis'],
                ],
                'Frontend' => [
                    ['name' => 'Blade Templating'],
                    ['name' => 'Tailwind CSS'],
                    ['name' => 'Alpine.js'],
                ],
                'Tools' => [
                    ['name' => 'Git & GitHub'],
                    ['name' => 'Composer'],
                    ['name' => 'Postman'],
                    ['name' => 'Docker'],
                ],
            ]);
        }
    }

    $desiredOrder = ['Backend', 'Database', 'Frontend', 'Tools'];

    $categoryMeta = [
        'Backend' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>',
            'color' => 'text-rose-400',
        ],
        'Database' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>',
            'color' => 'text-emerald-400',
        ],
        'Frontend' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
            'color' => 'text-sky-400',
        ],
        'Tools' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
            'color' => 'text-amber-400',
        ],
    ];

    // Hanya path SVG (tanpa warna) — warna icon & badge ditentukan di titik render
    // dari $item->status_badge_classes (Eloquent) atau fallback array rose (placeholder).
    $techIconPaths = [
        'Laravel'          => '<path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
        'PHP'              => '<path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h10M7 16h10"/>',
        'RESTful API'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>',
        'MySQL'            => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>',
        'Redis'            => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 2l9 4.9v9.8L12 22l-9-4.9V6.9L12 2z"/>',
        'Blade Templating' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z"/>',
        'Blade'            => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z"/>',
        'Tailwind CSS'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
        'Alpine.js'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>',
        'Git & GitHub'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 7h8M8 12h8M8 17h8"/>',
        'Composer'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 12h14M5 16h14"/>',
        'Postman'          => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>',
        'Docker'           => '<path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>',
    ];

    // Fallback path untuk tech yang belum punya icon spesifik
    $fallbackIconPath = '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>';
@endphp

<section id="tech-stack" class="relative bg-[#0b0f19] text-slate-100 py-20 lg:py-28 overflow-hidden border-t border-slate-800/60">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-600/5 rounded-full blur-[100px] pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/5 rounded-full blur-[100px] pointer-events-none translate-y-1/2 -translate-x-1/3"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ─── Section Header (Exact Match to Section 2) ─── -->
        <div class="mb-12 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-widest text-red-400 mb-3">
                <span class="w-4 h-px bg-red-400/80 rounded"></span>
                {{ __('tech.tag') }}
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight tracking-tight">
                {{ __('tech.title') }}
            </h2>
            <p class="mt-3 text-slate-400 text-sm leading-relaxed">
                {{ __('tech.subtitle') }}
            </p>
        </div>

        <!-- ─── Cards Grid ─── -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($desiredOrder as $cat)
                @if(isset($itemsGrouped[$cat]) && count($itemsGrouped[$cat]) > 0)
                    @php
                        $meta = $categoryMeta[$cat] ?? [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
                            'color' => 'text-slate-400',
                        ];
                        $count = count($itemsGrouped[$cat]);
                    @endphp

                    <div class="flex flex-col p-6 rounded-xl bg-[#0f1422]/90 border border-slate-800/80 hover:border-slate-700/80 transition-all duration-200 justify-between">
                        
                        <!-- Card Top Bar: Icon + Title on left, Badge on right -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-2.5">
                                <svg class="w-5 h-5 {{ $meta['color'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    {!! $meta['icon'] !!}
                                </svg>
                                <h3 class="text-base font-bold text-white tracking-tight">
                                    {{ $cat }}
                                </h3>
                            </div>

                            <span class="font-mono text-xs text-rose-300/80 bg-slate-800/60 border border-slate-700/50 px-2.5 py-1 rounded-md">
                                {{ $count }} {{ $count > 1 ? __('tech.technologies') : __('tech.technology') }}
                            </span>
                        </div>

                        <!-- Card Bottom: Tech Pills Horizontal Grid -->
                        <div class="flex flex-wrap gap-2.5">
                            @foreach($itemsGrouped[$cat] as $item)
                                @php
                                    $name = is_array($item) ? $item['name'] : $item->name;

                                    // Badge classes: text + bg + border dinamis dari status.
                                    // Fallback ke rose jika data berasal dari array placeholder
                                    // (DB kosong) yang tidak punya accessor Eloquent.
                                    $badgeClasses = ($item instanceof \App\Models\TechStackItem)
                                        ? $item->status_badge_classes
                                        : ['text' => 'text-rose-400', 'bg' => 'bg-rose-400/10', 'border' => 'border-rose-400/20'];

                                    $iconPath = $techIconPaths[$name] ?? $fallbackIconPath;
                                @endphp
                                <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg {{ $badgeClasses['bg'] }} border {{ $badgeClasses['border'] }} text-xs font-mono font-medium transition-colors">
                                    <span class="shrink-0">
                                        <svg class="w-3.5 h-3.5 {{ $badgeClasses['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            {!! $iconPath !!}
                                        </svg>
                                    </span>
                                    <span class="{{ $badgeClasses['text'] }}">{{ $name }}</span>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endif
            @endforeach
        </div>

    </div>
</section>
