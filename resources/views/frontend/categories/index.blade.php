@extends('frontend.layouts.app')

@section('title', 'Categories')

@section('content')
    {{-- Banner Aria --}}
    @include('frontend.categories.banner')

    {{-- Content Aria --}}
    <div class="categories-full-area mb-50">
        <div class="container ">

            <div class="section-title ">
                <h2 class="font-semibold title">Select Categories</h2>
            </div>
            <!-- Nav Tabs Carousel -->
            <div class="nav-form my-4">
                <div class="row">
                    <div class="col-md-12 pb-10">
                        <div class="categories-slider owl-carousel  owl-theme nav">
                            @foreach ($categories as $category)
                                <div class="item">
                                    <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#content-{{ $category->id }}" type="button">
                                        <div class="slider-top">
                                            <img src="{{ asset($category->image) }}" alt="">
                                            <span>{{ $category->name }}</span>
                                        </div>
                                        <div class="count-number">{{ $category->relations->count() }}</div>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tab Content -->
            <div class="tab-content mt-5">
                @foreach ($categories as $key => $category)
                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="content-{{ $category->id }}" role="tabpanel">
                    <div class="excellence ">
                        <div class="row">
                            @foreach ($category->relations as $content)
                            <div class="col-md-4">
                                <div class="excell-item">
                                    <div class="relative rounded-75 overflow-hidden">
                                        <div class="relative inline-block  w-full h-300">
                                            <img class="img-abs" src="{{ $content->thumbnail_url }}">
                                        </div>
                                        <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                                        <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                                            <div class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 left-5 ">{{ $content->created_at->format('M d, Y') }}</div>
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
                                                    <h4 class="exe-title flex-1">
                                                        <a class="text-white block font-semibold">{{ $content->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="text-end mt-3">
                            <button class="text-white btn bg-primary-500 transition rounded-md px-2 cursor-pointer py-2">Next</button>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="carousel-section">
        <div class="container">
            <div class="section-title">
                <h2 class="font-semibold title ">Trending Classes</h2>
                <p class="mt-2 font-normal text-neutral-500">Discover 6 topics</p>
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
    <section class="subscribe">
        <div class="container">
            <div class="subscribe-form">
                <div class="section-title">
                    <h2 class="font-semibold title">Stay Up to Date </h2>
                    <p class="mt-2 font-normal text-neutral-500">Subscribe to our newsletter to receive our weekly feed.
                </div>
                <form action="">
                    <div class="flex max-w-xl mx-auto rounded-full bg-white mt-10 px-3 py-2">

                        <input type="text" placeholder="Email"
                            class="p-2 outline-none w-full rounded-full px-3 py-3">
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
    </script>
@endsection
