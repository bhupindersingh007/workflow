@if(session('success'))

    <article class="alert alert-primary fade show d-flex align-items-center justify-content-between" id="success">
        <div class="d-flex align-items-center">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-brown">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            <span class="mx-1">{{ session('success') }}</span>
        </div>
        <button class="btn btn-close" data-bs-dismiss="alert"></button>
    </article>

@endif

