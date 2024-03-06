<!-- sidebar -->
<div class="col-10 col-md-3 col-xl-2 px-0  border-end bg-white position-fixed d-print-none
    top-0 left-0 h-100 overflow-auto sidebar" id="sidebar" style="z-index: 100;">
    
    <h5 class="px-3 my-3 fw-bold" href="{{ route('dashboard') }}" style="letter-spacing: 0.08rem">
      <span class="text-primary">WORK</span>FLOW
    </h5>

    <div class="list-group rounded-0">
      <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action border-0 d-flex align-items-center {{ request()->route()->named('dashboard') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        <span class="ms-2">Home</span>
      </a>


      <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action border-0 align-items-center {{ request()->routeIs('projects.*') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
        <span class="ms-2">Projects</span>
      </a>
  


      <a href="{{ route('tasks.index') }}" class="list-group-item list-group-item-action border-0 align-items-center {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        <span class="ms-2">Tasks</span>
      </a>


      <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        <span class="ms-2">Inbox</span>
      </a>
  
      
      <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        <span class="ms-2">Users</span>
      </a>

      
  
      <button 
      class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center
      {{ request()->route()->named('update.account.create') || request()->route()->named('change.password.create') ? 'active' : '' }}" 
      data-bs-toggle="collapse" data-bs-target="#settings-collapse">
        <div>
          <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" ><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
          <span class="ms-2">Settings</span>
        </div>
        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </button>
      <div class="collapse  {{ request()->route()->named('update.account.create') || request()->route()->named('change.password.create') ? 'show' : '' }}" id="settings-collapse" data-bs-parent="#sidebar">
        <div class="list-group">
          <a href="{{ route('update.account.create') }}" class="list-group-item list-group-item-action border-0 ps-4">Update Account</a>
          <a href="{{ route('change.password.create') }}" class="list-group-item list-group-item-action border-0 ps-4">Change Password</a>
        </div>
      </div>
    </div>
  </div>
  
  {{-- overlay --}}
  <div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>
