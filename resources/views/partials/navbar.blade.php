 {{-- dasboard navbar --}}
 <nav class="w-100 d-flex px-4 py-3 border-bottom">
    {{-- close sidebar --}}
    <button class="btn py-0 d-lg-none" id="open-sidebar">
      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
    </svg>
    </button>
    
    <div class="d-flex align-items-center ms-auto">

      <a href="{{ route('notifications.index') }}" class="btn btn-transparent p-0 position-relative me-1">
            {{-- unread notifications --}}
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="unread-notifications-count-bell">{{ auth()->user()->unreadNotifications->count() }}</span>
            <svg viewBox="0 0 24 24" class="text-primar" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
      </a>

      <div class="dropdown ms-auto">
        <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <small class="me-2 text-muted">{{ auth()->user()->fullName }}</small>
          <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </button>
        <div class="dropdown-menu dropdown-menu-right small" aria-labelledby="logout-dropdown">

          
          <a class="dropdown-item" href="#">Settings</a>

          <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item p-0">Logout</button>
          </form>
  
        </div>
      </div>
      
    </div>


  
  </nav>

