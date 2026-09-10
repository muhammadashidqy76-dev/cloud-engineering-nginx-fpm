<x-layout title="500 Server Error">
    <div class="error-code">500</div>
    <h1 class="error-title">Something Broke on the Server</h1>
    <p class="error-desc">An unexpected error occurred on our end. No action is required from you — we're aware and working on a fix. Please try again in a moment.</p>

    <div class="code-hint">
        <div><span class="prompt">$</span><span class="output">tail -f storage/logs/laravel.log</span></div>
        <div class="gc-1"><span class="output">  [<span class="accent">{{ now()->format('Y-m-d H:i:s') }}</span>] production.ERROR</span></div>
        <div class="gc-3"><span class="output">  <span class="gc-2">Unhandled exception</span> — details logged server-side</span></div>
        <div class="gc-3"><span class="output">  If this persists, please contact the administrator</span></div>
    </div>

    <a href="{{ url('/') }}" class="btn-home">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Home
    </a>
</x-layout>
