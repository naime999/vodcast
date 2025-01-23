<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto align-items-center">
        <!-- Nav Item - User Information -->
        @if (auth()->user()->user_info != null && auth()->user()->user_info->vodcaster_image != null && auth()->user()->user_info->youtube_id != null && auth()->user()->user_info->description != null)
            @if (requestForVodcast() != null)
            {!! requestForVodcast() !!}
            @else
                {{-- @canany([]) --}}
                @hasrole('User')
                <li class="nav-item dropdown no-arrow">
                    <button class="btn btn-sm btn-secondary" onclick="requestVodcaster()">
                        <i class="fa-solid fa-messages-question pr-1"></i> Request
                    </button>
                </li>
                @endhasrole
            @endif
        @else
        <div class="alert alert-warning m-0" role="alert">If you want to request a Vodcaster, you need to fill out the For Vodcaster fields in your profile. <a href="{{ route('terms') }}" class="alert-link">Learn more</a></div>
        @endif
            {{-- @endcanany --}}
            @canany(['content-create', 'content-playlist-create', 'youtube-playlist-create'])
            <li class="nav-item dropdown no-arrow">
                <div class="d-flex nav-link dropdown-toggle" id="createDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class=" btn btn-sm btn-primary">
                        <i class="fas fa-solid fa-video-plus mr-1"></i> Create
                    </button>
                </div>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in overflow-hidden p-0" aria-labelledby="createDropdown">
                    <label class="dropdown-item text-center m-0 py-2">
                        Create Contents
                    </label>
                    <div class="dropdown-divider m-0"></div>
                    @can('content-create')
                    <a class="dropdown-item py-2" href="{{ route('users.content.create') }}">
                        <i class="fas fa-video-plus mr-2 text-gray-400"></i>
                        Create Post
                    </a>
                    @endcan
                    @can('content-playlist-create')
                    <a class="dropdown-item py-2" href="#" data-toggle="modal" data-target="#cPlaylistModal">
                        <i class="fas fa-list-alt mr-2 text-gray-400"></i>
                        Create Playlist
                    </a>
                    @endcan
                    @can('youtube-playlist-create')
                    <a class="dropdown-item py-2" href="#" data-toggle="modal" data-target="#yPlaylistModal">
                        <i class="fa-brands fa-youtube mr-2 text-gray-400"></i>
                        Youtube Playlist
                    </a>
                    @endcan
                </div>
            </li>
            @endcanany
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ getUserName() }}
                </span>
                <div class="position-relative">
                    @if (auth()->user()->user_info != null && auth()->user()->user_info->profile_image != null)
                    <img class="img-profile rounded-circle" src="{{ asset(auth()->user()->user_info->profile_image) }}">
                    @else
                    <img class="img-profile rounded-circle" src="{{ getAvatar() }}">
                    @endif
                    @if (requestData() != null && requestData()->status == 2)
                    <div class="m-0 p-0 position-absolute top-100 start-100 translate-middle rounded-circle">
                        <i class="fa-sharp fa-solid fa-badge-check text-success fs-5"></i>
                    </div>
                    @endif
                </div>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.profile.details') }}">
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
