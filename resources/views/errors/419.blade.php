<x-layout title="419 Page Expired">
    <div class="error-code">419</div>
    <h1 class="error-title">Page Expired</h1>
    <p class="error-desc">Your session or CSRF token has expired. This usually happens after a long period of inactivity. Please go back and try again.</p>

    <div class="code-hint">
        <div><span class="prompt">$</span><span class="output">artisan session:status</span></div>
        <div style="margin-top:6px"><span class="output">  <span style="color:#ef4444">WARNING</span>  CSRF token mismatch detected</span></div>
        <div style="margin-top:4px"><span class="output">  Token lifetime: <span class="accent">expired</span> (max 120min)</span></div>
        <div style="margin-top:4px"><span class="output">  Hint: refresh the page to get a fresh token</span></div>
    </div>

    <a href="{{ url('/') }}" class="btn-home">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
        Back to Home
    </a>
</x-layout>
