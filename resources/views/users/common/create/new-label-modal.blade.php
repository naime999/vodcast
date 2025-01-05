<div class="modal fade" id="newLabelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Playlist label</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-playlist-label" class="row" method="POST" action="{{ route('users.playlist.label.add') }}">
                    @csrf
                    {{-- Name --}}
                    <div class="col-md-12 mb-3">
                        <label>Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Enter your label title" name="name" value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" id="editor" rows="5" class="form-control" autofocus>{{ old('description') }}</textarea>
                        </div>
                    </div>
                    {{-- Thumbnail --}}
                    {{-- <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input type="hidden" id="thumbnail_baseImage" name="thumbnail_baseImage" value="" />
                            <input type="file" name="thumbnail" onchange="fileDetailsCrop(this)" data-size="857x482" data-ratio="16/9" id="thumbnail-image" class="image pt-1 form-control d-none" accept="image/*">
                            <label class="btn btn-sm btn-primary rounded m-0" for="thumbnail-image"><i class="fas fa-image pr-2"></i> Select Thumbnail<label>
                        </div>
                        <div class="border rounded d-flex justify-content-center align-items-center" id="thumbnail_preview" style="height: 150px; background-color: #ececec;">
                            <label class="rounded m-0" id="noimage">No Thumbnail Image</label>
                        </div>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success"
                    onclick="event.preventDefault(); document.getElementById('create-playlist-label').submit();">
                    Create
                </button>
            </div>
        </div>
    </div>
</div>
