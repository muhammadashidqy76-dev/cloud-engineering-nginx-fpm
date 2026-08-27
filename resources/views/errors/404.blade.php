<x-layout title="404 Not Found">
    <div class="error-code">404</div>
    <h1 class="error-title">Route Not Found</h1>
    <p class="error-desc">The page you're looking for doesn't exist — it may have been moved, deleted, or the URL was mistyped.</p>

    <!-- Terminal-style stack trace flavour -->
    <div class="code-hint">
        <div><span class="prompt">$</span><span class="output">php artisan route:list --path=<span class="accent">{{ request()->path() }}</span></span></div>
        <div style="margin-top:6px"><span class="output">  <span style="color:#ef4444">ERROR</span>  Route not found: <span class="accent">GET /{{ request()->path() }}</span></span></div>
        <div style="margin-top:4px"><span class="output">  No matching route definition in routes/web.php</span></div>
    </div>

    <a href="{{ url('/') }}" class="btn-home">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Home
    </a>
</x-layout>
