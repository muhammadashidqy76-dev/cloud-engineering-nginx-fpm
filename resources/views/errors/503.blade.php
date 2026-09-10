<x-layout title="503 Service Unavailable">
    <div class="error-code">503</div>
    <h1 class="error-title">Under Maintenance</h1>
    <p class="error-desc">The site is temporarily offline for scheduled maintenance. We'll be back shortly — thank you for your patience.</p>

    <div class="code-hint">
        <div><span class="prompt">$</span><span class="output">php artisan down --status=503</span></div>
        <div class="gc-1"><span class="output">  <span class="503-1">INFO</span>   Application is now in maintenance mode</span></div>
        <div class="gc-3"><span class="output">  Retry-After: <span class="accent">soon™</span></span></div>
    </div>

    <a href="{{ url('/') }}" class="btn-home">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
        Back to Home
    </a>
</x-layout>
