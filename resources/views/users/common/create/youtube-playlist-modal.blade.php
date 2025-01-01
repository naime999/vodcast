<div class="modal fade" id="yPlaylistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Playlist</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-youtube-playlist" class="row" method="POST" action="{{ route('users.youtube.playlist.store') }}">
                    @csrf
                    {{-- Categories --}}
                    <div class="col-md-6 mb-3 form-group">
                        <label for="category-id">Category <span style="color:red;">*</span></label>
                        <select name="category_id" id="category-id" class="form-control @error('category_id') is-invalid @enderror">
                            <option selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Playlist Title -->
                    <div class="col-md-6 mb-3 form-group">
                        <label for="title">Playlist Title <span style="color:red;">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter your video title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Playlist id -->
                    <div class="col-md-6 mb-3 form-group">
                        <label for="youtube-id">Youtube playlist id <span style="color:red;">*</span></label>
                        <input type="text" name="youtube_id" class="youtube-playlist-id form-control mb-3 @error('youtube_id') is-invalid @enderror" placeholder="Youtube playlist id">
                        {{-- <div class="video-view"></div> --}}
                        @error('youtube_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Thumbnail url -->
                    <div class="col-md-6 mb-2 form-group">
                        <label for="thumbnail-url">Youtube playlist thumbnail url <span style="color:red;">*</span></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">https://example.com</span>
                            <input type="text" name="thumbnail_url" id="thumbnail-url" class="form-control @error('thumbnail_url') is-invalid @enderror" placeholder="Youtube playlist thumbnail url">
                        </div>
                        @error('thumbnail_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Video Description -->
                    <div class="col-md-12 mb-2 form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="10" placeholder="Enter your video description text"></textarea>
                    </div>

                    {{-- Select status --}}
                    <div class="col-md-6 mb-3">
                        <label>Status <span style="color:red;">*</span></label>
                        <select class="form-control form-control-user @error('is_public') is-invalid @enderror" name="is_public">
                            <option value="0" selected>Public</option>
                            <option value="1">Private</option>
                            <option value="2">Draft</option>
                        </select>
                        @error('is_public')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-2 form-group">
                        <label for="status">Status <span style="color:red;">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" onclick="event.preventDefault(); document.getElementById('create-youtube-playlist').submit();">
                    Create
                </button>
            </div>
        </div>
    </div>
</div>
