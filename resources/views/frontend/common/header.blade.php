<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page"href="{{ route('vodcast') }}">Vodcast</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories') }}">Category</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('search') }}">Search</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
            <div class="ms-3">
                {{-- @dd(auth()->user()->hasRole('User')) --}}
                @if(auth()->check())
                    @if (auth()->user()->hasRole('Admin'))
                        <a class="text-white btn bg-primary-500  transition rounded-md px-2 cursor-pointer py-2" href="{{ route('super-admin.index') }}">Admin Dashboard</a>
                    @else
                        @if (request()->is('users') || request()->is('users/*'))
                            <ul class="navbar-nav ml-auto">
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                            {{ getUserName() }}
                                        </span>
                                        <img class="img-profile rounded-circle" src="{{ getAvatar() }}" style="max-width: 30xp !important;">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Dashboard
                                        </a>
                                        <div class="dropdown-divider"></div>
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
                        @else
                            <a class="text-white btn bg-primary-500  transition rounded-md px-2 cursor-pointer py-2" href="{{ route('users.index') }}">Dashboard</a>
                        @endif
                    @endif
                @else
                    <a class="text-white btn bg-primary-500 transition rounded-md px-2 cursor-pointer py-2" href="{{ route('login') }}">Sign in</a>
                @endif

            </div>

          </ul>
        </div>
      </div>
    </nav>
  </header>
