<div class="modal fade" id="videoAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Videos</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-video" class="row" method="POST" action="{{ route('users.playlist.add.video') }}">
                    @csrf
                    <input type="hidden" name="playlist_id">
                    {{-- Name --}}
                    @foreach ($viewPlaylists as $viewPlaylist)
                        <div class="col-md-12 row">
                            <div class="col-md-12">
                                <label for="">{{ $viewPlaylist->name }}</label>
                            </div>
                            @foreach ($viewPlaylist->listItems as $listItem)
                                <div class="col-md-3 mb-4">
                                    <div class="card video-card" style="background: linear-gradient(90deg, #c7daf8, #e7eef8);">
                                        <img src="{{ $listItem->video->thumbnail_url }}" alt="Video Thumbnail" class="card-img-top video-thumbnail">
                                        <div class="card-body p-2">
                                            <h6 class="card-title">{{ $listItem->video->title }}</h6>
                                            <div class="d-flex flex-row-reverse">
                                                <input class="" type="checkbox" name="video_ids[]" value="{{ $listItem->video->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success"
                    onclick="event.preventDefault(); document.getElementById('add-video').submit();">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
