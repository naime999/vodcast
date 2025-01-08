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

    @canany(['content-list', 'content-playlist-list', 'youtube-playlist-list'])
    <hr class="sidebar-divider">
    <div class="sidebar-heading"> Vodcaster </div>
    <li class="nav-item {{ request()->routeIs('users.content') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vodcastDropDown"
            aria-expanded="false" aria-controls="vodcastDropDown">
            <i class="fas fa-podcast pr-1"></i>
            <span>Vodcast</span>
        </a>
        <div id="vodcastDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Vodcast</h6>
                @can('content-list')
                <a class="collapse-item" href="{{ route('users.content') }}">
                    <i class="fas fa-list pr-1"></i>
                    <span>Content List</span>
                </a>
                @endcan
                @can('content-playlist-list')
                <a class="collapse-item" href="{{ route('users.content.playlist') }}">
                    <i class="fas fa-list pr-1"></i>
                    <span>Content Playlist</span>
                </a>
                @endcan
                @can('youtube-playlist-list')
                <a class="collapse-item" href="{{ route('users.youtube.playlist') }}">
                    <i class="fas fa-list pr-1"></i>
                    <span>Youtube Playlist</span>
                </a>
                @endcan
            </div>
        </div>
    </li>
    @endcanany
    @canany(['view-playlist'])
    <hr class="sidebar-divider">
    <div class="sidebar-heading"> Views </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#playlistDropDown"
            aria-expanded="true" aria-controls="playlistDropDown">
            <i class="fas fa-list pr-1"></i>
            <span>Playlist</span>
        </a>
        <div id="playlistDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">View Contents</h6>
                @can('view-playlist')
                <a class="collapse-item" href="{{ route('users.view.playlist') }}">
                    <i class="fas fa-list pr-1"></i>
                    <span>Playlist Views</span>
                </a>
                @endcan
                {{-- @can('view-playlist') --}}
                <a class="collapse-item" href="{{ route('users.view.playlist') }}">
                    <i class="fa-solid fa-rectangle-vertical-history pr-1"></i>
                    <span>History Views</span>
                </a>
                {{-- @endcan --}}
            </div>
        </div>
    </li>
    @endcanany

    @hasrole('Admin')
        <!-- Divider -->
        <hr class="sidebar-divider">
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
    @endhasrole
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>

