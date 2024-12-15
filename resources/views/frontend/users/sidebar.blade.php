<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('users.index') }}">
        <div class="sidebar-brand-text mx-3">User Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link py-2" href="{{ route('super-admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt pr-1"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading"> Personal Settings </div>

    <li class="nav-item {{ request()->routeIs('') ? 'active' : '' }}">
        <a class="nav-link py-2" href="{{ route('home') }}">
            <i class="fas fa-solid fa-user pr-1"></i>
            <span>Profile Setup</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading"> Vodcaster </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vodcastDropDown"
            aria-expanded="true" aria-controls="vodcastDropDown">
            <i class="fas fa-podcast pr-1"></i>
            <span>Vodcast</span>
        </a>
        <div id="vodcastDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#vodcastDropDown">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Vodcast</h6>
                <a class="collapse-item" href="{{ route('users.content') }}">
                    <i class="fas fa-list pr-1"></i>
                    <span>Content List</span>
                </a>
                <a class="collapse-item" href="{{ route('home') }}">Categories

                </a>
                {{-- <a class="collapse-item" href="{{ route('super-admin.import') }}">Import Data</a> --}}
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading"> Vodcaster </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#playlistDropDown"
            aria-expanded="true" aria-controls="playlistDropDown">
            <i class="fas fa-list pr-1"></i>
            <span>Playlist</span>
        </a>
        <div id="playlistDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#playlistDropDown">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">My Playlist</h6>
                <a class="collapse-item" href="{{ route('home') }}">Group View</a>
                <a class="collapse-item" href="{{ route('home') }}">History</a>
                {{-- <a class="collapse-item" href="{{ route('super-admin.import') }}">Import Data</a> --}}
            </div>
        </div>
    </li>
    @can('proposal-list')
        <li class="nav-item {{ request()->routeIs('super-admin.proposals') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('super-admin.proposals') }}">
                <i class="fas fa-solid fa-file"></i>
                <span>Proposals</span>
                @if (getProposalCount() > 0)
                    <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ getProposalCount() }}
                    </span>
                @endif
            </a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    @hasrole('Admin')
        <!-- Heading -->
        <div class="sidebar-heading"> Admin Section </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
                aria-expanded="true" aria-controls="taTpDropDown">
                <i class="fas fa-user-alt"></i>
                <span>User Management</span>
            </a>
            <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User Management:</h6>
                    <a class="collapse-item" href="{{ route('super-admin.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('super-admin.create') }}">Add New</a>
                    <a class="collapse-item" href="{{ route('super-admin.import') }}">Import Data</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Masters</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Role & Permissions</h6>
                    <a class="collapse-item" href="{{ route('super-admin.roles.index') }}">Roles</a>
                    <a class="collapse-item" href="{{ route('super-admin.permissions.index') }}">Permissions</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endhasrole

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    {{-- <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div> --}}
</ul>

