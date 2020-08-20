<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Forms</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Forms:</h6>
                @if(Auth::user()->role_id == '1')
                <a class="collapse-item" href="/forms">All forms</a>
                @else
                <a class="collapse-item" href="/forms">My Form</a>
                @endif
                <a class="collapse-item" href="/forms/create">Create forms</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGrade" aria-expanded="true"
            aria-controls="collapseGrade">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Grade</span>
        </a>
        <div id="collapseGrade" class="collapse" aria-labelledby="headingGrade" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Grade:</h6>
                @if(Auth::user()->role_id == '1')
                <a class="collapse-item" href="/grade/show">All Grade</a>
                @else
                <a class="collapse-item" href="/grade/show">My Grade</a>
                @endif
                <a class="collapse-item" href="/grade/input">Input Grade</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->