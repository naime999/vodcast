<section class="recent-Vodcast section-padding">
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-semibold title">Listen to the most recent Vodcast.</h2>
                <p class="mt-2 font-normal text-neutral-500">Click on the music symbol and enjoy the Vodcast. </p>
            </div>
            <a href="{{ route('categories') }}">All Post</a>
        </div>
        <div class="row">
            @foreach ($contents->take(3) as $content)
            @if ($content->c_type != 1)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="Vodcast-item">
                    <div class="podc-description">
                        <img src="{{ $content->thumbnail_url }}" alt="">
                        <div class="pod-title">
                            <p class="text-neutral-700 text-sm font-medium leading-none mb-2">{{ $content->created_at->format('M d, Y') }}</p>
                            <a href="#" class="text-neutral-950  text-base font-semibold item-link">{{ $content->title }}</a>
                        </div>
                    </div>
                    <div class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 ">
                        <span class="youtube-btn text-center" onClick="playVideo(this)" youtubeid="{{ $content->youtube_id }}">
                            <i class="fas fa-play fa-fade text-white fs-5"></i>
                        </span>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="Vodcast-item">
                    <div class="podc-description">
                        {{-- <img src="{{ $content->thumbnail_url }}" alt=""> --}}
                        <div class="position-relative me-2">
                            <img class="rounded top-0" src="{{ youtubeVideoThumbnails($content->playlist_data->items[2]->snippet->thumbnails) }}">
                            <img class="rounded position-absolute playlist-thumbnail-1" src="{{ youtubeVideoThumbnails($content->playlist_data->items[1]->snippet->thumbnails) }}">
                            <img class="rounded position-absolute playlist-thumbnail-2" src="{{ youtubeVideoThumbnails($content->playlist_data->items[0]->snippet->thumbnails) }}">
                        </div>
                        <div class="pod-title">
                            <p class="text-neutral-700 text-sm font-medium leading-none mb-2">{{ $content->created_at->format('M d, Y') }}</p>
                            <a href="#" class="text-neutral-950  text-base font-semibold item-link">{{ $content->title }}</a>
                        </div>
                    </div>
                    <div class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 ">
                        <span class="youtube-btn text-center" onClick="playPlaylist(this)" youtubeid="{{ $content->youtube_id }}">
                            <i class="fas fa-play fa-fade text-white fs-5"></i>
                        </span>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
