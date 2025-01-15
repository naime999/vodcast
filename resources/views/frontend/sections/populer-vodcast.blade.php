<section class="highlight-Vodcast section-padding">
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-semibold title">Most Populer: Video Vodcast Highlight
                </h2>
                <p class="mt-2 font-normal text-neutral-500">Discover the Latest Trends in Engaging Video Content
            </div>
            <a href="{{ route('categories') }}">All Post</a>
        </div>
        <div class="row">
            @foreach ($contents->sortByDesc('likes')->take(3) as $content)
                <div class="col-md-4">
                    <div class="excell-item">
                        <div class="relative rounded-75 overflow-hidden">
                            <div class="relative inline-block  w-full h-300">
                                <img class="img-abs" src="{{ $content->thumbnail_url }}" alt="grid1">
                            </div>
                            <div class="absolute top-0 left-0 w-full h-full to-black"></div>
                            <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                                <div class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 left-5 ">{{ $content->created_at->format('M d, Y') }}</div>
                                @if ($content->likes != 0)
                                <span class="px-2 py-1 inline-block rounded-lg font-normal bg-primary-100 text-primary-500 text-xs capitalize absolute z-10 top-5 right-5 zindex-1">{{ $content->likes }} <i class="fa-solid fa-thumbs-up"></i></span>
                                @endif
                                <div class="w-100 p-3 absolute left-0 right-0">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 me-3">
                                            @if ($content->c_type == 1)
                                                <span class="youtube-btn text-center" onClick="playPlaylist(this)" youtubeid="{{ $content->youtube_id }}">
                                                    <i class="fas fa-play fa-fade text-white fs-5"></i>
                                                </span>
                                            @else
                                                <span class="youtube-btn text-center" onClick="playVideo(this)" youtubeid="{{ $content->youtube_id }}">
                                                    <i class="fas fa-play fa-fade text-white fs-5"></i>
                                                </span>
                                            @endif
                                        </div>
                                        <h4 class="exe-title flex-1"><a class="text-neutral-950 text-white">{{ $content->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
