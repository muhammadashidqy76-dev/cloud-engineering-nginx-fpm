<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 font-mono text-xs text-slate-400 mb-1">
                    <a href="{{ route('dashboard') }}" class="hover:text-white transition-colors">cms</a>
                    <span class="text-slate-600">/</span>
                    <span class="text-vermilion-400">projects</span>
                </div>
                <h1 class="text-xl sm:text-2xl font-bold font-mono text-white tracking-tight flex items-center gap-2">
                    <span>Featured Projects</span>
                    <span class="text-xs px-2 py-0.5 rounded font-normal font-mono bg-carbon-800 border border-carbon-700 text-slate-300">
                        Batch 2 &bull; Active
                    </span>
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-vermilion-500 hover:bg-vermilion-600 active:bg-vermilion-700 font-mono text-xs font-semibold text-white uppercase tracking-wider transition-all duration-150 shadow-lg shadow-vermilion-500/20 hover:shadow-vermilion-500/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Proyek Baru</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Flash Session Status -->
            @if (session('status'))
                <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 font-mono text-xs flex items-center justify-between shadow-lg">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>{{ session('status') }}</span>
                    </div>
                    <span class="text-[11px] text-emerald-500/80">CMS_SYNCED</span>
                </div>
            @endif

            <!-- Informational Banner -->
            <div class="p-4 sm:p-5 rounded-xl bg-carbon-900 border border-carbon-800 flex flex-col md:flex-row md:items-center justify-between gap-4 text-xs font-mono shadow-xl">
                <div class="flex items-start md:items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-carbon-950 border border-carbon-800 flex items-center justify-center text-vermilion-400 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-semibold">Aturan Arsitektur &amp; Kompleksitas</div>
                        <p class="text-slate-400 mt-0.5">
                            Urutan Featured Projects disusun dari kompleksitas rendah ke tinggi: 
                            <span class="text-slate-200">#1 E-Commerce</span> &rarr; 
                            <span class="text-slate-200">#2 API/Headless Backend</span> &rarr; 
                            <span class="text-slate-200">#3 Modular CMS</span>.
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3 text-[11px] text-slate-400 shrink-0 border-t md:border-t-0 md:border-l border-carbon-800 pt-3 md:pt-0 md:pl-4">
                    <div>Total: <span class="text-white font-bold">{{ $projects->count() }}</span></div>
                    <div>Live: <span class="text-emerald-400 font-bold">{{ $projects->where('status', 'published')->count() }}</span></div>
                    <div>Draft: <span class="text-slate-500 font-bold">{{ $projects->where('status', 'draft')->count() }}</span></div>
                </div>
            </div>

            <!-- Project Cards List -->
            <div class="space-y-4">
                @forelse ($projects as $project)
                    <div class="rounded-xl bg-carbon-900 border border-carbon-800 hover:border-carbon-700/80 transition-all p-5 shadow-xl overflow-hidden">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
                            
                            <!-- Left Section: Thumbnail & Core Details -->
                            <div class="flex items-start gap-4">
                                <!-- Thumbnail Preview -->
                                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg bg-carbon-950 border border-carbon-800 overflow-hidden shrink-0 relative flex items-center justify-center">
                                    @if ($project->preview_image_url)
                                        <img src="{{ $project->preview_image_url }}" 
                                             alt="{{ $project->title }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <!-- API / Mockup Icon placeholder -->
                                        <div class="flex flex-col items-center justify-center text-slate-500 font-mono text-[10px]">
                                            <svg class="w-6 h-6 text-vermilion-500/60 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                            </svg>
                                            <span>API / Code</span>
                                        </div>
                                    @endif

                                    <!-- Complexity Badge on top of thumbnail -->
                                    <span class="absolute top-1 left-1 px-1.5 py-0.5 rounded text-[9px] font-mono font-bold bg-carbon-950/90 border border-carbon-800 text-vermilion-400">
                                        #0{{ $project->complexity_order }}
                                    </span>
                                </div>

                                <!-- Text Details -->
                                <div class="space-y-1.5 min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h3 class="font-mono text-base font-bold text-white hover:text-vermilion-400 transition-colors">
                                            <a href="{{ route('projects.edit', $project) }}">
                                                {{ $project->title }}
                                            </a>
                                        </h3>

                                        <!-- Status Badge -->
                                        <span class="px-2 py-0.5 rounded text-[10px] font-mono font-medium {{ $project->status === 'published' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-slate-800 text-slate-400 border border-slate-700' }}">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    </div>

                                    <!-- Slug, Live Demo Button & Impact Metric -->
                                    <div class="flex items-center gap-2.5 text-xs font-mono text-slate-400 flex-wrap">
                                        <span class="text-slate-500">/{{ $project->slug }}</span>

                                        

                                        @if ($project->impact_metric)
                                            <span class="text-slate-700">&bull;</span>
                                            <span class="text-slate-300 truncate max-w-xs" title="{{ $project->impact_metric }}">{{ $project->impact_metric }}</span>
                                        @endif
                                    </div>

                                    <!-- Problem Statement Preview -->
                                    <p class="text-xs text-slate-400 line-clamp-2 max-w-3xl">
                                        {{ $project->problem_statement }}
                                    </p>

                                    <!-- Attached Tech Stack Items (Pivot) -->
                                    <div class="flex flex-wrap gap-1.5 pt-1">
                                        @forelse ($project->techStackItems as $tech)
                                            <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-carbon-950 border border-carbon-800 text-slate-300">
                                                {{ $tech->name }}
                                            </span>
                                        @empty
                                            <span class="text-[11px] font-mono text-slate-600 italic">Belum ada tech stack yang dihubungkan</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <!-- Right Section: Actions -->
                            <div class="flex items-center gap-2 self-end lg:self-center shrink-0 border-t lg:border-t-0 border-carbon-800/80 pt-3 lg:pt-0 w-full lg:w-auto justify-end">
                            

                                        @if ($project->demo_url)
                                            <a href="{{ $project->demo_url }}" 
                                               target="_blank" 
                                               rel="noopener noreferrer"
                                               title="Buka Demo URL: {{ $project->demo_url }}"
                                               class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-mono font-medium text-cyan-300 bg-cyan-500/10 hover:bg-cyan-500/20 active:bg-cyan-500/30 border border-cyan-500/30 hover:border-cyan-400/60 shadow-sm hover:shadow-cyan-500/10 transition-all duration-150 group">
                                                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 group-hover:bg-cyan-300 group-hover:scale-125 transition-transform animate-pulse"></span>
                                                <span>Live Demo</span>
                                                <svg class="w-3 h-3 text-cyan-400 group-hover:text-cyan-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </a>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-[11px] font-mono text-slate-500 bg-carbon-950/80 border border-carbon-850 select-none">
                                                <span class="w-1.5 h-1.5 rounded-full bg-slate-600"></span>
                                                <span>Tanpa Demo URL</span>
                                            </span>
                                        @endif   
                            <!-- Edit Button -->
                                <a href="{{ route('projects.edit', $project) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-mono text-xs font-medium text-slate-200 bg-carbon-800 hover:bg-carbon-750 border border-carbon-700 hover:border-slate-600 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span>Edit</span>
                                </a>

                                <!-- Delete Form with Alpine confirmation -->
                                <form method="POST" action="{{ route('projects.destroy', $project) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek \'{{ addslashes($project->title) }}\'? Relasi ke timeline dan tech stack akan dilepas.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-mono text-xs font-medium text-rose-400 hover:text-rose-300 bg-rose-500/10 hover:bg-rose-500/20 border border-rose-500/20 hover:border-rose-500/30 transition-colors cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="rounded-xl bg-carbon-900 border border-carbon-800 p-12 text-center shadow-xl">
                        <div class="w-12 h-12 rounded-xl bg-carbon-950 border border-carbon-800 flex items-center justify-center text-slate-500 mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="font-mono text-sm font-bold text-white mb-1">Belum Ada Featured Projects</h3>
                        <p class="text-xs text-slate-400 max-w-sm mx-auto mb-4 font-mono">
                            Mulai tambahkan 3 proyek utama backend Anda untuk ditampilkan di beranda portofolio.
                        </p>
                        <a href="{{ route('projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-vermilion-500 hover:bg-vermilion-600 font-mono text-xs font-semibold text-white uppercase tracking-wider">
                            <span>+ Tambah Proyek Pertama</span>
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
