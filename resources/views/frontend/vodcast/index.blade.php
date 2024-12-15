@extends('frontend.layouts.app')

@section('title', 'Vodcast')

@section('content')
    {{-- Banner Aria --}}
    @include('frontend.vodcast.banner')

    {{-- Content Aria --}}
    <section class="vodcast-area">
        <div class="container">
            <div class="section-title">
                <h2 class="font-semibold title">Vodcaster Popular PlayList</h2>
                <p class="mt-2 font-normal text-neutral-500">Discover 6 topics</p>
            </div>
            <div class="grid grid-cols-1 md-grid-cols-2 lg-grid-cols-3 xl-grid-cols-4 gap-6">
                <div class="grid gap-6">
                    <div class="relative rounded-75 overflow-hidden">
                        <div class="relative inline-block  w-full h-300">
                            <img class="img-abs" src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                        </div>
                        <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                        <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                            <a href="#"
                                class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">travel</a>

                            <div class="w-100 p-3 absolute left-0 right-0 bottom-7 text-center">

                                <div class="flex items-center justify-center">

                                    <div
                                        class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 me-3">
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
                                <h4 class="mt-2">
                                    <a class="text-white block font-semibold text-base" href="author.html">Listen To
                                        Microsoft CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>

                            </div>
                        </div>

                    </div>
                    <div class="relative rounded-75 overflow-hidden">
                        <div class="relative inline-block  w-full h-300">
                            <img class="img-abs" src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                        </div>
                        <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                        <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                            <a href="#"
                                class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">travel</a>

                            <div class="w-100 p-3 absolute left-0 right-0 bottom-7 text-center">

                                <div class="flex items-center justify-center">

                                    <div
                                        class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 me-3">
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
                                <h4 class="mt-2">
                                    <a class="text-white block font-semibold text-base" href="author.html">Listen To
                                        Microsoft CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="lg-col-span-2">
                    <div class="relative rounded-75 overflow-hidden">
                        <div class="relative inline-block  w-full h-650">
                            <img class="img-abs" src="{{ asset('frontend/assets/img/grid3.png') }}" alt="grid1">
                        </div>
                        <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                        <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                            <a href="#"
                                class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">travel</a>

                            <div class="w-100 p-3 absolute left-0 right-0 bottom-7 text-center">

                                <div class="flex items-center justify-center">

                                    <div
                                        class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 me-3">
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
                                <h4 class="mt-2">
                                    <a class="text-white block font-semibold text-base" href="author.html">Listen To
                                        Microsoft CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid gap-6">
                    <div class="relative rounded-75 overflow-hidden">
                        <div class="relative inline-block  w-full h-300">
                            <img class="img-abs" src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                        </div>
                        <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                        <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                            <a href="#"
                                class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">travel</a>

                            <div class="w-100 p-3 absolute left-0 right-0 bottom-7 text-center">

                                <div class="flex items-center justify-center">

                                    <div
                                        class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 me-3">
                                        <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="youtube-btn">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="h-8 text-white">
                                                <path
                                                    d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                                    fill="currentColor" stroke-width="0"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="mt-2">
                                    <a class="text-white block font-semibold text-base" href="#">Listen To Microsoft
                                        CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>

                            </div>
                        </div>

                    </div>
                    <div class="relative rounded-75 overflow-hidden">
                        <div class="relative inline-block  w-full h-300">
                            <img class="img-abs" src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                        </div>
                        <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                        <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                            <a href="#"
                                class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">Education</a>
                            <div class="w-100 p-3 absolute left-0 right-0 bottom-7 text-center">

                                <div class="flex items-center justify-center">

                                    <div
                                        class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 me-3">
                                        <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="youtube-btn">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="h-8 text-white">
                                                <path
                                                    d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                                    fill="currentColor" stroke-width="0"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="mt-2">
                                    <a class="text-white block font-semibold text-base" href="#">Listen To Microsoft
                                        CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <a href="allplay.html"
                    class="text-white btn bg-primary-500  transition rounded-md px-2 cursor-pointer py-2">All Play</a>
            </div>
        </div>
    </section>

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
    <section class="master-class-work ">
        <div class="container">
            <div class="master-bg">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5">
                        <div class="master-title">
                            <div class="section-title mb-3">
                                <h3 class="mt-2 text-white-50">Master Class At Work</h3>
                                <h2 class="font-semibold title text-white mt-2">
                                    Most Popular

                                </h2>
                                <p class="mt-2 font-normal text-neutral-500 text-white">

                                    MasterClass Logo
                                    Level Up Your Team
                                    See why leading organizations rely on MasterClass for learning & development</p>
                            </div>
                            <div class="d-flex gap-2 mt-4">
                                <a class="text-white btn bg-primary-500  transition rounded-md px-2 cursor-pointer py-2"
                                    href="#">Contact</a>
                                <a class="text-white bt transition rounded-md px-2 cursor-pointer py-2"
                                    href="vodcast.html">
                                    Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="none"
                                        viewBox="0 0 24 24" aria-hidden="true" role="img"
                                        class="mc-icon mc-icon--2 mc-ml-3">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M12.87 2.825a1.094 1.094 0 0 0-1.557 0 1.12 1.12 0 0 0 0 1.572l6.961 7.025H3.101c-.608 0-1.101.498-1.101 1.111 0 .614.493 1.112 1.1 1.112h15.108l-6.895 6.958a1.12 1.12 0 0 0 0 1.572c.43.433 1.127.433 1.557 0l8.808-8.89c.43-.433.43-1.137 0-1.57z"
                                            clip-rule="evenodd"></path>
                                    </svg></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="master-img">
                            <img src="{{ asset('frontend/assets/img/maw.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-categories section-padding">
        <div class="container">
            <div class="flex justify-between items-center">
                <div class="section-title">
                    <h2 class="font-semibold title">Top Categories</h2>
                    <p class="mt-2 font-normal text-neutral-500">Discover 6 topics</p>
                </div>
                <a href="categories.html">All Categories</a>
            </div>
            <div class="categories-wrapper grid grid-cols-1 md-grid-cols-2 lg-grid-cols-3 xl-grid-cols-6 gap-6">
                <a href="#">
                    <img src="{{ asset('frontend/assets/img/travel.jpg') }}" alt="" class="rounded-xl">
                    <div class="flex justify-between mt-2 px-2">
                        <h4 class="mb-0 text-base text-neutral-900 font-medium">Travel</h4>
                        <span class=" text-xs text-neutral-500">3 Posts</span>
                    </div>
                </a>
                <a href="#">
                    <img src="{{ asset('frontend/assets/img/sports.jpg') }}" alt="" class="rounded-xl">
                    <div class="flex justify-between mt-2 px-2">
                        <h4 class="mb-0 text-base text-neutral-900 font-medium">Sports</h4>
                        <span class=" text-xs text-neutral-500">3 Posts</span>
                    </div>
                </a>
                <a href="#">
                    <img src="{{ asset('frontend/assets/img/gaming.jpg') }}" alt="" class="rounded-xl">
                    <div class="flex justify-between mt-2 px-2">
                        <h4 class="mb-0 text-base text-neutral-900 font-medium">Gaming</h4>
                        <span class=" text-xs text-neutral-500">3 Posts</span>
                    </div>
                </a>
                <a href="#">
                    <img src="{{ asset('frontend/assets/img/music.jpg') }}" alt="" class="rounded-xl">
                    <div class="flex justify-between mt-2 px-2">
                        <h4 class="mb-0 text-base text-neutral-900 font-medium">Music</h4>
                        <span class=" text-xs text-neutral-500">3 Posts</span>
                    </div>
                </a>
                <a href="#">
                    <img src="{{ asset('frontend/assets/img/entertainment.jpg') }}" alt="" class="rounded-xl">
                    <div class="flex justify-between mt-2 px-2">
                        <h4 class="mb-0 text-base text-neutral-900 font-medium">Entertainment</h4>
                        <span class=" text-xs text-neutral-500">3 Posts</span>
                    </div>
                </a>
                <a href="#">
                    <img src="{{ asset('frontend/assets/img/entertainment.jpg') }}" alt="" class="rounded-xl">
                    <div class="flex justify-between mt-2 px-2">
                        <h4 class="mb-0 text-base text-neutral-900 font-medium">Education</h4>
                        <span class=" text-xs text-neutral-500">2 Posts</span>
                    </div>
                </a>
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
    </script>
@endsection
