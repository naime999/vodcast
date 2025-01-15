@extends('frontend.layouts.app')

@section('title', 'Home')
@section('css')
<style>
    .no-arrow::after {
        content: none; /* Removes the arrow content */
    }
    .playlist-thumbnail-1{
        left: 5px;
        top: 5px;
    }
    .playlist-thumbnail-2{
        left: 10px;
        top: 10px;
    }
    .list-group-item.active-item {
        z-index:2;
        color:#fff;
        background-color:#4e00009c;
        border-color:#4e00009c
    }
</style>
@endsection
@section('content')
    {{-- Banner Aria --}}
    @include('frontend.home.banner')

    {{-- Content Aria --}}
    <section class="banner-area mb-50">
        <div class="container">
            <div class="section-title">
                <h2 class="font-semibold title">How customers use video</h2>
                <p class="mt-2 font-normal text-neutral-500">Use cases</p>
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
    </section>
    {{-- Topics Aria --}}
    @include('frontend.sections.topics')
    {{-- Top Categories Aria --}}
    @include('frontend.sections.top-categories')

    <section class="carousel-section">
        <div class="container">
            <div class="section-title">
                <h2 class="font-semibold title">Trending Classes</h2>
                <p class="mt-2 font-normaltext-neutral-500">Discover 6 topics</p>
            </div>
            <div class="trending-carousel owl-carousel owl-theme">
                <div class="carousel-wrapper">
                    <div class="carousel-item__card">
                        <span class="version-n">New</span>
                        <img src="{{ asset('frontend/assets/img/vodcaster1.jpg') }}" alt="vodcaster1">

                        <div class="vodcast-his">
                            <a href="vodcast.html" class="vodcaster-name">Gordan <br> Ramsay</a>
                            <hr>
                            <div class="d-inline-block mb-2">
                                <div
                                    class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500">
                                    <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="youtube-btn">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-8 text-white">
                                            <path
                                                d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                                fill="currentColor" stroke-width="0"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <h5 class="vodcaster-desi">Teacher Cooking</h5>
                            <p class="vodcaster-time">3 hours 54 minutes</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-wrapper">
                    <div class="carousel-item__card">
                        <span class="version-n">Popular</span>
                        <img src="{{ asset('frontend/assets/img/vodcaster2.jpg') }}" alt="vodcaster1">
                        <div class="vodcast-his">
                            <a href="vodcast.html" class="vodcaster-name">Gordan <br> Ramsay</a>
                            <hr>
                            <h5 class="vodcaster-desi">Teacher Cooking</h5>
                            <p class="vodcaster-time">3 hours 54 minutes</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-wrapper">
                    <div class="carousel-item__card">
                        <span class="version-n">Most Views</span>
                        <img src="{{ asset('frontend/assets/img/vodcaster3.jpg') }}" alt="vodcaster1">
                        <div class="vodcast-his">
                            <a href="vodcast.html" class="vodcaster-name">Gordan <br> Ramsay</a>
                            <hr>
                            <h5 class="vodcaster-desi">Teacher Cooking</h5>
                            <p class="vodcaster-time">3 hours 54 minutes</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-wrapper">
                    <div class="carousel-item__card">
                        <span class="version-n">New</span>
                        <img src="{{ asset('frontend/assets/img/vodcaster4.jpg') }}" alt="vodcaster1">
                        <div class="vodcast-his">
                            <a href="vodcast.html" class="vodcaster-name">Gordan <br> Ramsay</a>
                            <hr>
                            <h5 class="vodcaster-desi">Teacher Cooking</h5>
                            <p class="vodcaster-time">3 hours 54 minutes</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-wrapper">
                    <div class="carousel-item__card">
                        <span class="version-n">New</span>
                        <img src="{{ asset('frontend/assets/img/vodcaster1.jpg') }}" alt="vodcaster1">
                        <div class="vodcast-his">
                            <a href="vodcast.html" class="vodcaster-name">Gordan <br> Ramsay</a>
                            <hr>
                            <h5 class="vodcaster-desi">Teacher Cooking</h5>
                            <p class="vodcaster-time">3 hours 54 minutes</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-wrapper">
                    <div class="carousel-item__card">
                        <span class="version-n">Most Views</span>
                        <img src="{{ asset('frontend/assets/img/vodcaster2.jpg') }}" alt="vodcaster1">
                        <div class="vodcast-his">
                            <a href="vodcast.html" class="vodcaster-name">Gordan <br> Ramsay</a>
                            <hr>
                            <h5 class="vodcaster-desi">Teacher Cooking</h5>
                            <p class="vodcaster-time">3 hours 54 minutes</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-wrapper">
                    <div class="carousel-item__card">
                        <span class="version-n">New</span>
                        <img src="{{ asset('frontend/assets/img/vodcaster4.jpg') }}" alt="vodcaster1">
                        <div class="vodcast-his">
                            <a href="vodcast.html" class="vodcaster-name">Gordan <br> Ramsay</a>
                            <hr>
                            <h5 class="vodcaster-desi">Teacher Cooking</h5>
                            <p class="vodcaster-time">3 hours 54 minutes</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Recent Vodcast Aria --}}
    @include('frontend.sections.recent-vodcast')

    {{-- Top Views Vodcast Aria --}}
    @include('frontend.sections.highlight-vodcast')

    {{-- Most Populer Vodcast Aria --}}
    @include('frontend.sections.populer-vodcast')

    <section class="subscribe">
        <div class="container">
            <div class="subscribe-form">
                <div class="section-title">
                    <h2 class="font-semibold title">Stay Up to Date </h2>
                    <p class="mt-2 font-normal text-neutral-500">Subscribe to our newsletter to receive our weekly feed.
                </div>
                <form action="">
                    <div class="flex max-w-xl mx-auto rounded-full bg-white mt-10 px-3 py-2">

                        <input type="text" placeholder="Email" class="p-2 outline-none w-full rounded-full px-3 py-3">
                        <button type="submit"
                            class="py-2 bg-primary-500 rounded-full text-white shadow-sm px-7">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    var load = $('.loader-overlay');
    $(document).ready(function() {
        load.hide();
    });

    function addPlaylist(data){
        var videoId = $(data).attr('data-id');
        load.show();
        $.ajax({
            url: "{{ route('users.view.playlist.get') }}",
            method: "POST",
            data: {
                playlist_id: 0,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data) {
                load.hide();
                console.log(data);
                $('#add-playlist').find('input[name="video_id"]').val(videoId);
                var html = $('#playlist-items').html('');
                data.forEach(item => {
                    var checked = '';
                    if(item.list_items.some(citem => citem.content_id == videoId)){
                        checked = 'checked';
                    }
                    var itemHtml =  '<li class="list-group-item">'+
                                    '    <div class="form-check">'+
                                    '        <input class="form-check-input" type="checkbox" name="labels[]" value="'+item.id+'" id="flexCheckChecked" '+checked+'>'+
                                    '        <label class="form-check-label" for="flexCheckChecked">'+item.name+'</label>'+
                                    '    </div>'+
                                    '</li>';
                    html.append(itemHtml);
                });
                $('#playlistAddModal').modal('show');
            }
        });
    }
</script>
@endsection
