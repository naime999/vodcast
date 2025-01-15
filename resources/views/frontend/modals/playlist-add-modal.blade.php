<div class="modal fade" id="playlistAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Videos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-playlist" class="row" method="POST" action="{{ route('users.label.add.video') }}">
                    @csrf
                    <input type="hidden" name="video_id">
                    <ul class="list-group p-3 m-0" id="playlist-items">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="labels[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-success"
                    onclick="event.preventDefault(); document.getElementById('add-playlist').submit();">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
