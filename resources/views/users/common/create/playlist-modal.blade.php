<div class="modal fade" id="cPlaylistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Playlist</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-playlist" class="row" method="POST" action="{{ route('users.content.playlist.create') }}">
                    @csrf
                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label>Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName" placeholder="Enter your proposal name" name="name" value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                    {{-- Description --}}
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="editor" rows="10" class="form-control" autofocus>{{ old('description') }}</textarea>
                        </div>
                    </div>
                    {{-- Thumbnail --}}
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input type="hidden" id="thumbnail_baseImage" name="thumbnail_baseImage" value="" />
                            <input type="file" name="thumbnail" onchange="fileDetailsCrop(this)" data-size="857x482" data-ratio="16/9" id="thumbnail-image" class="image pt-1 form-control d-none" accept="image/*">
                            <label class="btn btn-sm btn-primary rounded m-0" for="thumbnail-image"><i class="fas fa-image pr-2"></i> Select Thumbnail<label>
                        </div>
                        <div class="border rounded d-flex justify-content-center align-items-center" id="thumbnail_preview" style="height: 150px; background-color: #ececec;">
                            <label class="rounded m-0" id="noimage">No Thumbnail Image</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success"
                    onclick="event.preventDefault(); document.getElementById('create-playlist').submit();">
                    Create
                </button>
            </div>
        </div>
    </div>
</div>
