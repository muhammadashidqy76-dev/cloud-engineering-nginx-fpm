<x-layout title="403 Forbidden">
    <div class="error-code">403</div>
    <h1 class="error-title">Access Forbidden</h1>
    <p class="error-desc">You don't have permission to access this resource. If you believe this is a mistake, please contact the site owner.</p>

    <div class="code-hint">
        <div><span class="prompt">$</span><span class="output">curl -I {{ request()->url() }}</span></div>
        <div style="margin-top:6px"><span class="output">  HTTP/1.1 <span style="color:#ef4444">403 Forbidden</span></span></div>
        <div style="margin-top:4px"><span class="output">  X-Policy: authorization check failed</span></div>
    </div>

    <a href="{{ url('/') }}" class="btn-home">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Home
    </a>
</x-layout>
