<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $entry->title }} — Ashidqy Handbook</title>
    <meta name="description" content="{{ Str::limit(strip_tags($entry->content), 155) }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $entry->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($entry->content), 155) }}">
    <meta property="og:type" content="article">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-web.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|jetbrains-mono:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ── Prose: Medium-style typography for Markdown-rendered content ── */
        .prose-note {
            --prose-body: #cbd5e1;        /* slate-300 */
            --prose-heading: #f1f5f9;     /* slate-100 */
            --prose-lead: #94a3b8;        /* slate-400 */
            --prose-code-bg: #141a27;     /* carbon-850 */
            --prose-code-border: #1e2638; /* carbon-800 */
            --prose-quote-border: #ff4d6d; /* vermilion-400 */
            --prose-hr: #1e2638;

            color: var(--prose-body);
            font-size: 1.0625rem; /* 17px — comfortable reading size */
            line-height: 1.8;
        }

        /* Headings */
        .prose-note h1,
        .prose-note h2,
        .prose-note h3,
        .prose-note h4 {
            color: var(--prose-heading);
            font-weight: 700;
            line-height: 1.3;
            margin-top: 2em;
            margin-bottom: 0.6em;
        }
        .prose-note h2 { font-size: 1.35rem; }
        .prose-note h3 { font-size: 1.15rem; }
        .prose-note h4 { font-size: 1.05rem; }

        /* Paragraphs */
        .prose-note p {
            margin-top: 0;
            margin-bottom: 1.4em;
        }

        /* Strong & Em */
        .prose-note strong { color: var(--prose-heading); font-weight: 600; }
        .prose-note em { color: #94a3b8; }

        /* Inline code */
        .prose-note code:not(pre > code) {
            background: var(--prose-code-bg);
            border: 1px solid var(--prose-code-border);
            border-radius: 4px;
            padding: 0.1em 0.4em;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85em;
            color: #fb923c; /* orange-400 — warm contrast */
        }

        /* Code blocks */
        .prose-note pre {
            background: var(--prose-code-bg) !important;
            border: 1px solid var(--prose-code-border);
            border-radius: 8px;
            padding: 1.25rem 1.5rem;
            overflow-x: auto;
            margin: 1.75em 0;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
            line-height: 1.7;
        }
        .prose-note pre code {
            background: none !important;
            border: none !important;
            padding: 0 !important;
            color: #e2e8f0 !important;
            font-size: inherit;
        }

        /* Blockquote */
        .prose-note blockquote {
            border-left: 3px solid var(--prose-quote-border);
            padding-left: 1.25rem;
            margin-left: 0;
            color: var(--prose-lead);
            font-style: italic;
        }

        /* Lists */
        .prose-note ul,
        .prose-note ol {
            padding-left: 1.5rem;
            margin-bottom: 1.4em;
        }
        .prose-note li { margin-bottom: 0.35em; }
        .prose-note ul { list-style-type: disc; }
        .prose-note ol { list-style-type: decimal; }

        /* Horizontal rule */
        .prose-note hr {
            border: none;
            border-top: 1px solid var(--prose-hr);
            margin: 2.5em 0;
        }

        /* Tables */
        .prose-note table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            margin: 1.75em 0;
        }
        .prose-note th {
            background: #1e2638;
            color: #f1f5f9;
            text-align: left;
            padding: 0.6rem 0.9rem;
            border-bottom: 2px solid #2d3748;
            font-weight: 600;
        }
        .prose-note td {
            padding: 0.5rem 0.9rem;
            border-bottom: 1px solid #1e2638;
            color: #cbd5e1;
        }
        .prose-note tr:last-child td { border-bottom: none; }
        .prose-note tr:hover td { background: rgba(30,38,56,0.4); }

        /* Images */
        .prose-note img {
            max-width: 100%;
            border-radius: 8px;
            border: 1px solid #1e2638;
            margin: 1.75em auto;
            display: block;
        }

        /* Links */
        .prose-note a {
            color: #ff4d6d;
            text-decoration: underline;
            text-underline-offset: 3px;
            transition: color 0.15s;
        }
        .prose-note a:hover { color: #fb7185; }

        /* Reading progress bar */
        #reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 2px;
            background: linear-gradient(to right, #ff4d6d, #fb923c);
            z-index: 9999;
            width: 0%;
            transition: width 0.1s linear;
        }
    </style>
</head>
<body class="bg-carbon-950 text-slate-100 font-sans antialiased selection:bg-rose-500 selection:text-white relative min-h-screen">

    <!-- Global grid background -->
    <div class="fixed inset-0 bg-[linear-gradient(to_right,#1f293d18_2px,transparent_2px),linear-gradient(to_bottom,#1f293d18_2px,transparent_2px)] bg-[size:3.5rem_3.5rem] pointer-events-none z-0"></div>

    <!-- Reading progress bar -->
    <div id="reading-progress" aria-hidden="true"></div>

    <div class="relative z-10">
        <!-- ── Minimal Header ── -->
        <header class="sticky top-0 z-50 backdrop-blur-md bg-carbon-950/80 border-b border-carbon-800/60">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 h-14 flex items-center justify-between gap-4">
                <!-- Back to home -->
                <a href="/"
                   class="flex items-center gap-2 text-slate-400 hover:text-white transition-colors text-sm font-medium group"
                   id="back-to-home-link">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="hidden sm:inline">Kembali</span>
                </a>

                <!-- Track badge + reading time -->
                <div class="flex items-center gap-2">
                    @if($entry->category === 'laravel')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-mono font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-400 animate-pulse"></span>
                            Laravel
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-mono font-medium bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                            Cloud Engineering
                        </span>
                    @endif

                    <span class="text-slate-500 text-xs font-mono">{{ $entry->reading_time }}</span>
                </div>
            </div>
        </header>

        <!-- ── Article ── -->
        <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

            <!-- Article header -->
            <header class="mb-10" id="article-header">

                <!-- Status badge -->
                @if($entry->tag === 'production_ready')
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-mono font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 mb-4">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Production Ready
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-mono font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20 mb-4">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        Exploring
                    </span>
                @endif

                <!-- Title -->
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight tracking-tight mb-4">
                    {{ $entry->title }}
                </h1>

                <!-- Meta bar -->
                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-slate-500 text-sm font-mono border-t border-carbon-800 pt-4">
                    @if($entry->published_at)
                        <time datetime="{{ $entry->published_at->format('Y-m-d') }}" class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $entry->published_at->format('d M Y') }}
                        </time>
                    @endif

                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $entry->reading_time }}
                    </span>

                    @if($entry->relatedProject)
                        <a href="#" class="flex items-center gap-1.5 text-slate-500 hover:text-vermilion-400 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                            {{ $entry->relatedProject->title }}
                        </a>
                    @endif
                </div>
            </header>

            <!-- Lead / Excerpt -->
            <div class="bg-carbon-900 border border-carbon-800 rounded-xl px-6 py-5 mb-10 text-slate-300 text-sm leading-relaxed font-sans italic border-l-2 border-l-rose-500/40">
                {{ $entry->content }}
            </div>

            <!-- ── Main content (rendered Markdown) ── -->
            <article class="prose-note" id="article-body">
                {!! $entry->body_html !!}
            </article>

        </main>

        <!-- ── Prev / Next Navigation ── -->
        @if($prevEntry || $nextEntry)
        <nav class="border-t border-carbon-800 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10" aria-label="Navigasi catatan">
            <p class="text-xs font-mono text-slate-500 uppercase tracking-widest mb-6">Catatan lainnya dalam track ini</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                @if($prevEntry)
                <a href="{{ route('notes.show', $prevEntry->slug) }}"
                   id="prev-note-link"
                   class="group flex flex-col gap-2 p-4 rounded-xl bg-carbon-900 border border-carbon-800 hover:border-slate-700 hover:bg-carbon-850 transition-all duration-200">
                    <span class="flex items-center gap-1.5 text-xs font-mono text-slate-500 group-hover:text-slate-400">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        Sebelumnya
                    </span>
                    <span class="text-sm font-medium text-slate-300 group-hover:text-white transition-colors leading-snug">
                        {{ $prevEntry->title }}
                    </span>
                </a>
                @else
                <div></div>
                @endif

                @if($nextEntry)
                <a href="{{ route('notes.show', $nextEntry->slug) }}"
                   id="next-note-link"
                   class="group flex flex-col gap-2 p-4 rounded-xl bg-carbon-900 border border-carbon-800 hover:border-slate-700 hover:bg-carbon-850 transition-all duration-200 sm:text-right">
                    <span class="flex items-center gap-1.5 text-xs font-mono text-slate-500 group-hover:text-slate-400 sm:justify-end">
                        Berikutnya
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </span>
                    <span class="text-sm font-medium text-slate-300 group-hover:text-white transition-colors leading-snug">
                        {{ $nextEntry->title }}
                    </span>
                </a>
                @endif

            </div>
        </nav>
        @endif

        <!-- ── Footer ── -->
        <footer class="border-t border-carbon-800 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between">
                <a href="/"
                   class="flex items-center gap-2 text-slate-500 hover:text-white transition-colors text-sm group">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Beranda
                </a>
                <span class="text-xs font-mono text-slate-600">Ashidqy Handbook</span>
            </div>
        </footer>

    </div>

    <!-- Reading progress JS -->
    <script>
        (function () {
            const bar   = document.getElementById('reading-progress');
            const body  = document.getElementById('article-body');
            if (!bar || !body) return;

            function updateProgress() {
                const rect        = body.getBoundingClientRect();
                const total       = rect.height;
                const scrolled    = Math.max(0, -rect.top);
                const viewHeight  = window.innerHeight;
                const progress    = Math.min(100, (scrolled / (total - viewHeight + 200)) * 100);
                bar.style.width   = progress + '%';
            }

            window.addEventListener('scroll', updateProgress, { passive: true });
        })();
    </script>
</body>
</html>
