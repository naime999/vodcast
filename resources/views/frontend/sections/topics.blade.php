<section class="vodcast-area">
    <div class="container">
        <div class="section-title">
            <h2 class="font-semibold title">Title</h2>
            <p class="mt-2 font-normal text-neutral-500">Discover 6 topics</p>
        </div>
        <div class="grid grid-cols-1 md-grid-cols-2 lg-grid-cols-3 xl-grid-cols-4 gap-6">
            <div class="grid gap-6">
                @foreach ($categories->take(2) as $category)
                @php
                    $content = $category->relations->first();
                    // dd($content);
                @endphp
                @if ($content)
                <div class="relative rounded-75 overflow-hidden">
                    <div class="relative inline-block  w-full h-300">
                        <img class="img-abs" src="{{ $content->thumbnail_url }}" alt="grid1">
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                    <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                        <a href="#" class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">{{ $category->name }}</a>
                        <div class="w-100 p-3 absolute left-0 right-0">
                            <h4 class="mb-5">
                                <a class="text-white block font-semibold text-base" href="author.html">{{ $content->title }}</a>
                            </h4>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ getAvatar($content->user->id) }}" class="rounded-full w-10 h-10">
                                    <div class="ms-2">
                                        <h5 class="text-sm font-medium text-white">{{ getUserName($content->user->id) }}</h5>
                                        <span class="text-xs text-white">{{ $content->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
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
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            {{-- Type 2 --}}
            @foreach ($categories->skip(2)->take(1) as $category)
            @php
                $content = $category->relations->first();
            @endphp
            @if ($content)
            <div class="lg-col-span-2">
                <div class="relative rounded-75 overflow-hidden">
                    <div class="relative inline-block  w-full h-650">
                        <img class="img-abs" src="{{ $content->thumbnail_url }}" alt="grid1">
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                    <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                        <a href="#"
                            class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">{{ $category->name }}</a>
                        <div class="w-100 p-3 absolute left-0 right-0">
                            <h4 class="mb-5">
                                <a class="text-white block font-semibold text-base" href="#">{{ $content->title }}</a>
                            </h4>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ getAvatar($content->user->id) }}" class="rounded-full w-10 h-10" alt="grid_pro1" loading="lazy">
                                    <div class="ms-2">
                                        <h5 class="text-sm font-medium text-white">{{ getUserName($content->user->id) }}</h5>
                                        <span class="text-xs text-white">{{ $content->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
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
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            @endif
            @endforeach
            {{-- Type 3 --}}
            <div class="grid grid-cols-1 gap-6 md-grid-cols-2 xl-grid-cols-1 md-col-span-3 xl-col-span-1">
                @foreach ($categories->skip(3)->take(2) as $category)
                @php
                    $content = $category->relations->first();
                    // dd($content);
                @endphp
                @if ($content)
                <div class="relative rounded-75 overflow-hidden">
                    <div class="relative inline-block  w-full h-300">
                        <img class="img-abs" src="{{ $content->thumbnail_url }}" alt="grid1">
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                    <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                        <a href="#" class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">{{ $category->name }}</a>
                        <div class="w-100 p-3 absolute left-0 right-0">
                            <h4 class="mb-5">
                                <a class="text-white block font-semibold text-base" href="author.html">{{ $content->title }}</a>
                            </h4>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ getAvatar($content->user->id) }}" class="rounded-full w-10 h-10">
                                    <div class="ms-2">
                                        <h5 class="text-sm font-medium text-white">{{ getUserName($content->user->id) }}</h5>
                                        <span class="text-xs text-white">{{ $content->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
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
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
