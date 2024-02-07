 <header>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-light py-2">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="letter-spacing: 0.08rem">
            <span class="text-primary">WORK</span>FLOW
            </a>
            <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-nav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbar-nav">
                <ul class="navbar-nav ms-auto">
                   
                    {{-- login & logout --}}
                    
                    @guest
                    <li class="nav-item">
                        <a class="nav-link me-lg-2" href="{{ route('login.create') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.create') }}">Register</a>
                    </li>
                    @endguest

                    {{-- dashboard --}}

                    @auth
                    <li class="nav-item">
    
                        <a class="btn btn-primary d-flex align-items-center" href="{{ route('dashboard') }}">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                               <span class="ms-1">Dashboard</span>
                        </a>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>

