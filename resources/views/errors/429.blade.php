<x-layout title="429 Too Many Requests">
    <div class="error-code">429</div>
    <h1 class="error-title">Too Many Requests</h1>
    <p class="error-desc">You've sent too many requests in a short period. Please slow down and try again in a moment — rate limits exist to protect the server.</p>

    <div class="code-hint">
        <div><span class="prompt">$</span><span class="output">curl -I {{ request()->url() }}</span></div>
        <div style="margin-top:6px"><span class="output">  HTTP/1.1 <span style="color:#ef4444">429 Too Many Requests</span></span></div>
        <div style="margin-top:4px"><span class="output">  Retry-After: <span class="accent">60s</span></span></div>
        <div style="margin-top:4px"><span class="output">  X-RateLimit-Limit: 60  X-RateLimit-Remaining: <span style="color:#ef4444">0</span></span></div>
    </div>

    <a href="{{ url('/') }}" class="btn-home">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Home
    </a>
</x-layout>
