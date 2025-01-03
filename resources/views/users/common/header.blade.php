<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto align-items-center">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <div class="d-flex nav-link dropdown-toggle" id="createDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button class=" btn btn-sm btn-primary">
                    <i class="fas fa-solid fa-video-plus mr-1"></i> Create
                </button>
            </div>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in overflow-hidden p-0" aria-labelledby="createDropdown">
                <label class="dropdown-item text-center m-0 py-2">
                    Create Content
                </label>
                <div class="dropdown-divider m-0"></div>
                <a class="dropdown-item py-2" href="{{ route('users.content.create') }}">
                    <i class="fas fa-video-plus mr-2 text-gray-400"></i>
                    Create Post
                </a>
                <a class="dropdown-item py-2" href="#" data-toggle="modal" data-target="#cPlaylistModal">
                    <i class="fas fa-list-alt mr-2 text-gray-400"></i>
                    Create Playlist
                </a>
                <a class="dropdown-item py-2" href="#" data-toggle="modal" data-target="#yPlaylistModal">
                    <i class="fa-brands fa-youtube mr-2 text-gray-400"></i>
                    Youtube Playlist
                </a>
            </div>
        </li>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ getUserName() }}
                </span>
                <img class="img-profile rounded-circle" src="{{ getAvatar() }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('super-admin.profile.detail') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
