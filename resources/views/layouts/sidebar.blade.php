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
                @if(Auth::user()->role_id == 1)
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
                @if(Auth::user()->role_id == 1)
                <a class="collapse-item" href="/grade/show">All Grade</a>
                @else
                <a class="collapse-item" href="/grade/show">My Grade</a>
                @endif
                <a class="collapse-item" href="/grade/input">Input Grade</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocument"
            aria-expanded="true" aria-controls="collapseDocument">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Document</span>
        </a>
        <div id="collapseDocument" class="collapse" aria-labelledby="headingDocument" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Document:</h6>
                @if(Auth::user()->role_id == 1)
                <a class="collapse-item" href="/document/show">All Document</a>
                @else
                <a class="collapse-item" href="/document/show">My Document</a>
                @endif
                <a class="collapse-item" href="/document/input">Upload Document</a>
            </div>
        </div>
    </li>
    @if(Auth::user()->role_id == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInterest"
            aria-expanded="true" aria-controls="collapseInterest">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Major interest</span>
        </a>
        <div id="collapseInterest" class="collapse" aria-labelledby="headingInterest" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Major Interest:</h6>
                <a class="collapse-item" href="/interest/show">All Major interest</a>
                <a class="collapse-item" href="/interest/input">Add Major Interest</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true"
            aria-controls="collapseNews">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>News</span>
        </a>
        <div id="collapseNews" class="collapse" aria-labelledby="headingNews" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">News:</h6>
                <a class="collapse-item" href="/news/show">All News</a>
                <a class="collapse-item" href="/news/input">Post New News</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaymentDetails"
            aria-expanded="true" aria-controls="collapsePaymentDetails">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Payment Details</span>
        </a>
        <div id="collapsePaymentDetails" class="collapse" aria-labelledby="headingNews" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Payment Details:</h6>
                <a class="collapse-item" href="/payment-details/show">All Details</a>
                <a class="collapse-item" href="/payment-details/input">Input New Payment Details</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSchedule"
            aria-expanded="true" aria-controls="collapseSchedule">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Schedule</span>
        </a>
        <div id="collapseSchedule" class="collapse" aria-labelledby="headingNews" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Schedule:</h6>
                <a class="collapse-item" href="/schedule/show">All Schedule</a>
                <a class="collapse-item" href="/schedule/input">Input New Schedule</a>
            </div>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"
            aria-expanded="true" aria-controls="collapsePayment">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Payment Confirmation</span>
        </a>
        <div id="collapsePayment" class="collapse" aria-labelledby="headingPayment" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Payment Confirmation:</h6>
                @if(Auth::user()->role_id == 1)
                <a class="collapse-item" href="/payment/show">All Payment</a>
                @endif
                <a class="collapse-item" href="/payment/show/{{Auth::user()->id}}">My Payment</a>
                <a class="collapse-item" href="/payment/input">Confirmation Your Payment</a>
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