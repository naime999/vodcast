<div class="container">
    <div class="section-title text-center pb-2 border-bottom">
        <h2 class="font-semibold title">Search Result</h2>
    </div>
    <div class="row">
        @foreach ($contents as $content)
            @if ($content->c_type != 1)
            <div class="col-md-4 use-case px-3 mb-3">
                <div class="use-video-item  position-relative">
                    <img class="rounded" src="{{ $content->thumbnail_url }}">
                    <span class="video-icon" onClick="playVideo(this)" youtubeid="{{ $content->youtube_id }}">
                        <i class="fas fa-play fa-fade text-danger fs-2"></i>
                    </span>
                </div>
                <div class="use-case-title mt-3 ">
                    <div class="d-flex ustify-content-between">
                        <h5 class="mb-2">{{ $content->title }}</h5>
                        <div class="dropdown">
                            <a class="dropdown-toggle p-2 no-arrow" href="javascript:;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end m-0 p-0" style="min-width: 15rem;">
                                <span class="dropdown-item py-2 text-center text-bold">Options</span>
                                <div class="dropdown-divider m-0"></div>
                                @if (auth()->check())
                                <li><button onClick="addPlaylist(this)" data-id="{{ $content->id }}" class="dropdown-item py-2 text-primary"><i class="fa-solid fa-bookmark pe-3"></i> Add Playlist</button></li>
                                @else
                                <li><a class="dropdown-item py-2 text-danger" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket fa-fade pe-3"></i> Sign in</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <p class="fs-6 fw-light text-sm-start">{!! \Illuminate\Support\Str::limit($content->description, 150, '...') !!}</p>
                </div>
            </div>
            @else
            <div class="col-md-4 use-case px-3 mb-3">
                <div class="use-video-item  position-relative">
                    <img class="rounded top-0" src="{{ youtubeVideoThumbnails($content->playlist_data->items[2]->snippet->thumbnails) }}">
                    <img class="rounded position-absolute playlist-thumbnail-1" src="{{ youtubeVideoThumbnails($content->playlist_data->items[1]->snippet->thumbnails) }}">
                    <img class="rounded position-absolute playlist-thumbnail-2" src="{{ youtubeVideoThumbnails($content->playlist_data->items[0]->snippet->thumbnails) }}">
                    <span class="video-icon" onClick="playPlaylist(this)" youtubeid="{{ $content->youtube_id }}">
                        <i class="fas fa-play fa-fade text-danger fs-2"></i>
                    </span>
                    <div class="rounded position-absolute bottom-0 end-0 bg-dark px-3 py-1">
                        <span class="text-light">{{ count($content->playlist_data->items) }} {{ count($content->playlist_data->items) > 1 ? 'Videos' : 'Video' }}</span>
                    </div>
                </div>
                <div class="use-case-title mt-3 ">
                    <div class="d-flex ustify-content-between">
                        <h5 class="mb-2">{{ $content->title }}</h5>
                    </div>
                    <p class="fs-6 fw-light text-sm-start">{!! \Illuminate\Support\Str::limit($content->description, 150, '...') !!}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
