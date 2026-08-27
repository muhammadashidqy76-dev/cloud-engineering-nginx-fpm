<section class="relative min-h-[90vh] flex items-center justify-center bg-[#0b0f19] text-slate-100 overflow-hidden py-20 lg:py-28">
    <!-- Ambient Background Lighting / Blobs -->
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-red-600/15 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-amber-500/10 rounded-full blur-[120px] pointer-events-none"></div>
    
    <!-- Grid Overlay Pattern (Subtle) -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#1f293715_1px,transparent_1px),linear-gradient(to_bottom,#1f293715_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)] pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Content & CTAs -->
            <div class="lg:col-span-7 flex flex-col items-start text-left">
                
                <!-- Badge Pill -->
                <div class="inline-flex items-center gap-2 p-1 pr-3 rounded-full bg-slate-900/90 border border-slate-800/80 shadow-lg shadow-black/40 mb-8 backdrop-blur-md">
                    <span class="bg-red-500/15 text-red-400 border border-red-500/20 px-3 py-1 rounded-full text-xs font-semibold tracking-wide flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-400 animate-pulse"></span>
                        Laravel Backend Developer
                    </span>
                    <a href="#projects" class="text-slate-400 hover:text-slate-200 text-xs font-medium flex items-center gap-1 transition-colors pl-1">
                        <span>Open to Work</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

                <!-- Main Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.15]">
                    Backend Developer
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-rose-400 to-amber-400 mt-1">
                        Built with Laravel
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="mt-6 text-lg sm:text-xl text-slate-400 max-w-2xl leading-relaxed font-normal">
                    Fokus membangun backend Laravel yang scalable dan maintainable — dari query optimization sampai queue processing.
                </p>

                <!-- CTAs -->
                <div class="mt-8 flex flex-wrap items-center gap-4 sm:gap-5 w-full sm:w-auto">
                    <a href="#projects" class="w-full sm:w-auto text-center bg-red-600 hover:bg-red-500 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg shadow-red-600/25 hover:shadow-red-500/35 transition-all duration-200 flex items-center justify-center gap-2 group">
                        <span>View Projects</span>
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                    
                    <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto text-center text-slate-300 hover:text-white font-medium px-5 py-3.5 rounded-xl border border-slate-800 hover:border-slate-700 bg-slate-900/50 hover:bg-slate-800/50 transition-all duration-200 flex items-center justify-center gap-2 group">
                        <span>View on GitHub</span>
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>

                <!-- Social Links -->
                <div class="mt-10 pt-8 border-t border-slate-800/80 flex items-center gap-4 w-full">
                    <span class="text-xs uppercase tracking-wider text-slate-500 font-semibold mr-2">Connect:</span>
                    
                    <!-- GitHub -->
                    <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white p-2.5 rounded-lg bg-slate-900/60 border border-slate-800 hover:border-slate-700 hover:bg-slate-800/60 transition-all" aria-label="GitHub">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                        </svg>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white p-2.5 rounded-lg bg-slate-900/60 border border-slate-800 hover:border-slate-700 hover:bg-slate-800/60 transition-all" aria-label="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.25V10.9H6.46M7.86 6.74a1.6 1.6 0 1 0 0 3.2 1.6 1.6 0 0 0 0-3.2z" />
                        </svg>
                    </a>

                    <!-- Email -->
                    <a href="mailto:contact@example.com" class="text-slate-400 hover:text-white p-2.5 rounded-lg bg-slate-900/60 border border-slate-800 hover:border-slate-700 hover:bg-slate-800/60 transition-all" aria-label="Email">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Column: Code Editor Mockup -->
            <div class="lg:col-span-5 w-full">
                <div class="relative group">
                    <!-- Glow Behind Window -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600/30 to-amber-500/20 rounded-2xl blur-xl opacity-75 group-hover:opacity-100 transition duration-500"></div>

                    <!-- IDE Window -->
                    <div class="relative rounded-2xl bg-[#0f172a] border border-slate-800/90 shadow-2xl overflow-hidden font-mono text-xs sm:text-sm">
                        
                        <!-- IDE Header Bar -->
                        <div class="px-4 py-3 bg-[#0b0f19]/90 border-b border-slate-800/90 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-500/80 inline-block"></span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-slate-400 bg-slate-900/80 px-3 py-1 rounded-md border border-slate-800 text-xs">
                                <svg class="w-3.5 h-3.5 text-red-400" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                                <span class="font-medium text-slate-300">Developer.php</span>
                            </div>

                            <div class="text-[10px] tracking-wider uppercase text-slate-500 font-semibold px-2 py-0.5 rounded bg-slate-900 border border-slate-800">
                                PHP 8.2
                            </div>
                        </div>

                        <!-- IDE Code Body -->
                        <div class="p-4 sm:p-6 overflow-x-auto text-slate-300 leading-relaxed">
                            <table class="border-collapse w-full">
                                <tbody>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">1</td>
                                        <td><span class="text-rose-400 font-semibold">&lt;?php</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">2</td>
                                        <td><span class="text-slate-500 italic">/**</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">3</td>
                                        <td><span class="text-slate-500 italic">&nbsp;* Hi, I'm Ashidqy 👋</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">4</td>
                                        <td><span class="text-slate-500 italic">&nbsp;* Backend Developer specializing in Laravel</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">5</td>
                                        <td><span class="text-slate-500 italic">&nbsp;* Currently learning WordPress as a PHP-ecosystem extension</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">6</td>
                                        <td><span class="text-slate-500 italic">&nbsp;*/</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">7</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">8</td>
                                        <td>
                                            <span class="text-rose-400 font-semibold">class</span> 
                                            <span class="text-amber-300 font-semibold">Developer</span> 
                                            <span class="text-rose-400 font-semibold">extends</span> 
                                            <span class="text-sky-400">BackendEngineer</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">9</td>
                                        <td>{</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">10</td>
                                        <td class="pl-4">
                                            <span class="text-rose-400 font-semibold">protected</span> 
                                            <span class="text-sky-300">$stack</span> 
                                            <span class="text-slate-400">=</span> 
                                            [<span class="text-emerald-400">'Laravel'</span>, <span class="text-emerald-400">'MySQL'</span>, <span class="text-emerald-400">'Eloquent'</span>];
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">11</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">12</td>
                                        <td class="pl-4">
                                            <span class="text-rose-400 font-semibold">public function</span> 
                                            <span class="text-amber-300 font-semibold">introduce</span>(): <span class="text-purple-400">string</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">13</td>
                                        <td class="pl-4">{</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">14</td>
                                        <td class="pl-8">
                                            <span class="text-rose-400 font-semibold">return</span> 
                                            <span class="text-emerald-400">"Building reliable backend systems, one API at a time."</span>;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">15</td>
                                        <td class="pl-4">}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 text-slate-600 text-right select-none w-6">16</td>
                                        <td>}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
