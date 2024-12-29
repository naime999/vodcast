<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $page_title }}</h1>
    <div class="row">
        {{-- <div class="col-auto">
            <a href="#" class="btn btn-sm btn-primary dropdown-toggle" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-solid fa-video-plus"></i> Create
            </a>
        </div> --}}
        <div class="col-auto">
            <div class="btn-group dropdoun">
                    <a class="border-0 btn btn-sm btn-primary mb-2 dropdown-toggle no-caret" href="#" id="createDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-solid fa-video-plus mr-1"></i> Create
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow mt-1" aria-labelledby="createDropdown">
                        <label class="dropdown-item text-center">
                            Create Content
                        </label>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('users.content.create') }}">
                            <i class="fas fa-video-plus mr-2 text-gray-400"></i>
                            Create Post
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-list-alt mr-2 text-gray-400"></i>
                            Create Playlist
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>
