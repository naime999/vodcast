<div class="modal fade" id="playlistPlayerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Playlist Videos</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2 row">
                <div class="col-md-8" id="playlist-viewer"></div>
                <div class="col-md-4 list-group overflow-scroll" id="playlist-video-items" style="max-height:400px;">
                    <div class="col-md-12 row" onclick="playVideoInPlaylist(this)" data-id="">
                        <div class="col-md-4">
                            <img class="rounded" src="">
                        </div>
                        <div class="col-md-8">
                            <h4>Video Title</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="likeButton-playlist" type="button" onclick="likeContent(this)" data-id=""><span class="me-2">( 5 )</span><i class="fa-solid fa-thumbs-up"></i></button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
