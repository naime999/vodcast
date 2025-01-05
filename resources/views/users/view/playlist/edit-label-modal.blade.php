<div class="modal fade" id="editLabelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Playlist label</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-playlist-label" class="row" method="POST" action="{{ route('users.playlist.label.update') }}">
                    @csrf
                    <input type="hidden" name="id">
                    {{-- Name --}}
                    <div class="col-md-12 mb-3">
                        <label>Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Enter your label name" name="name" value="{{ old('name') }}">

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
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success"
                    onclick="event.preventDefault(); document.getElementById('edit-playlist-label').submit();">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
