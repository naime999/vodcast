<section class="highlight-Vodcast section-padding">
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-semibold title">Top Views: Video Vodcast Highlight
                </h2>
                <p class="mt-2 font-normal text-neutral-500">Discover the Latest Trends in Engaging Video Content
            </div>
            <a href="{{ route('categories') }}">All Post</a>
        </div>
        <div class="row">
            @foreach ($contents->sortByDesc('views')->take(3) as $content)
                <div class="col-md-4">
                    <div class="h-100 bg-white rounded-2xl overflow-hidden">
                        <div class="relative ">
                            <a class="px-2 py-1 mb-2 inline-block rounded-lg font-normal bg-primary-100 text-primary-500 text-xs capitalize absolute z-10 top-5 left-5 zindex-1" href="{{ route('category', $content->category->slug) }}">{{ $content->category->name }}</a>
                            <div class="relative inline-block h-250 w-full">
                                <img src="{{ $content->thumbnail_url }}">
                                <div class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 right-5 ">{{ $content->created_at->format('M d, Y') }}</div>
                                <div class="absolute bottom-0 mb-3 left-5">
                                    <div class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-white">
                                        @if ($content->c_type == 1)
                                            <span class="youtube-btn text-center" onClick="playPlaylist(this)" youtubeid="{{ $content->youtube_id }}">
                                                <i class="fas fa-play fa-fade text-danger fs-5"></i>
                                            </span>
                                        @else
                                            <span class="youtube-btn text-center" onClick="playVideo(this)" youtubeid="{{ $content->youtube_id }}">
                                                <i class="fas fa-play fa-fade text-danger fs-5"></i>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                @if ($content->views != 0)
                                <span class="px-2 py-1 m-3 inline-block rounded-lg font-normal bg-primary-100 text-primary-500 text-xs capitalize absolute z-10 bottom-0 end-0 zindex-1">{{ $content->views }} <i class="fa-duotone fa-solid fa-eye"></i></span>
                                @endif
                            </div>
                            <h5 class="mt-2 p-3"><a class="text-neutral-950" href="#">{{ $content->title }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
