@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    {{-- Banner Aria --}}
    @include('frontend.home.banner')

    {{-- Content Aria --}}
    <section class="banner-area mb-50">
        <div class="container">
            <div class="section-title">
                <h2 class="font-semibold title">How customers use Vimeo</h2>
                <p class="mt-2 font-normal text-neutral-500">Use cases</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="use-case">
                        <div class="use-video-item  position-relative">
                            <img src="{{ asset('frontend/assets/img/case1.png') }}" alt="case1">
                            <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="video-icon youtube-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.2661 10.4837C20.258 11.2512 20.258 12.7487 19.2661 13.5162C16.2685 15.8356 12.9213 17.6637 9.34979 18.9322L8.69731 19.1639C7.44904 19.6073 6.13053 18.7627 5.96154 17.4742C5.48938 13.8739 5.48938 10.126 5.96154 6.52574C6.13053 5.23719 7.44904 4.39263 8.69732 4.83597L9.34979 5.06771C12.9213 6.33619 16.2685 8.16434 19.2661 10.4837ZM18.3481 12.3298C18.5639 12.1628 18.5639 11.837 18.3481 11.6701C15.4763 9.44796 12.2695 7.69648 8.84777 6.4812L8.19529 6.24947C7.87034 6.13406 7.49691 6.35401 7.44881 6.72079C6.99363 10.1915 6.99363 13.8084 7.4488 17.2791C7.49691 17.6459 7.87034 17.8658 8.19529 17.7504L8.84777 17.5187C12.2695 16.3034 15.4763 14.5519 18.3481 12.3298Z"
                                        fill="black"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="use-case-title mt-3">
                            <h5>Morgan Cooper</h5>
                            <p>
                                The three-time Staff Picked director shares his deeply personal, powerful short films with
                                Vimeo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="use-case">
                        <div class="use-video-item  position-relative">
                            <img src="{{ asset('frontend/assets/img/case2.png') }}" alt="case1">
                            <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="video-icon youtube-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.2661 10.4837C20.258 11.2512 20.258 12.7487 19.2661 13.5162C16.2685 15.8356 12.9213 17.6637 9.34979 18.9322L8.69731 19.1639C7.44904 19.6073 6.13053 18.7627 5.96154 17.4742C5.48938 13.8739 5.48938 10.126 5.96154 6.52574C6.13053 5.23719 7.44904 4.39263 8.69732 4.83597L9.34979 5.06771C12.9213 6.33619 16.2685 8.16434 19.2661 10.4837ZM18.3481 12.3298C18.5639 12.1628 18.5639 11.837 18.3481 11.6701C15.4763 9.44796 12.2695 7.69648 8.84777 6.4812L8.19529 6.24947C7.87034 6.13406 7.49691 6.35401 7.44881 6.72079C6.99363 10.1915 6.99363 13.8084 7.4488 17.2791C7.49691 17.6459 7.87034 17.8658 8.19529 17.7504L8.84777 17.5187C12.2695 16.3034 15.4763 14.5519 18.3481 12.3298Z"
                                        fill="black"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="use-case-title mt-3">
                            <h5>Morgan Cooper</h5>
                            <p>
                                The three-time Staff Picked director shares his deeply personal, powerful short films with
                                Vimeo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="use-case">
                        <div class="use-video-item  position-relative">
                            <img src="{{ asset('frontend/assets/img/case3.png') }}" alt="case1">
                            <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="video-icon youtube-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.2661 10.4837C20.258 11.2512 20.258 12.7487 19.2661 13.5162C16.2685 15.8356 12.9213 17.6637 9.34979 18.9322L8.69731 19.1639C7.44904 19.6073 6.13053 18.7627 5.96154 17.4742C5.48938 13.8739 5.48938 10.126 5.96154 6.52574C6.13053 5.23719 7.44904 4.39263 8.69732 4.83597L9.34979 5.06771C12.9213 6.33619 16.2685 8.16434 19.2661 10.4837ZM18.3481 12.3298C18.5639 12.1628 18.5639 11.837 18.3481 11.6701C15.4763 9.44796 12.2695 7.69648 8.84777 6.4812L8.19529 6.24947C7.87034 6.13406 7.49691 6.35401 7.44881 6.72079C6.99363 10.1915 6.99363 13.8084 7.4488 17.2791C7.49691 17.6459 7.87034 17.8658 8.19529 17.7504L8.84777 17.5187C12.2695 16.3034 15.4763 14.5519 18.3481 12.3298Z"
                                        fill="black"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="use-case-title mt-3">
                            <h5>Morgan Cooper</h5>
                            <p>
                                The three-time Staff Picked director shares his deeply personal, powerful short films with
                                Vimeo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vodcast-area">
        <div class="container">
            <div class="section-title">
                <h2 class="font-semibold title">Title</h2>
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
                            <div class="w-100 p-3 absolute left-0 right-0">
                                <h4 class="mb-5">
                                    <a class="text-white block font-semibold text-base" href="author.html">Listen To
                                        Microsoft CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset('frontend/assets/img/grid_pro1.png') }}" class="rounded-full w-10 h-10" alt="grid_pro1"
                                            loading="lazy">
                                        <div class="ms-2">
                                            <h5 class="text-sm font-medium text-white">Zannat Humaira</h5>
                                            <span class="text-xs text-white">Feb 18, 2024</span>
                                        </div>
                                    </div>
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
                            <div class="w-100 p-3 absolute left-0 right-0">
                                <h4 class="mb-5">
                                    <a class="text-white block font-semibold text-base" href="#">Listen To Microsoft
                                        CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset('frontend/assets/img/grid_pro1.png') }}" class="rounded-full w-10 h-10"
                                            alt="grid_pro1" loading="lazy">
                                        <div class="ms-2">
                                            <h5 class="text-sm font-medium text-white">Zannat Humaira</h5>
                                            <span class="text-xs text-white">Feb 18, 2024</span>
                                        </div>
                                    </div>
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
                            <div class="w-100 p-3 absolute left-0 right-0">
                                <h4 class="mb-5">
                                    <a class="text-white block font-semibold text-base" href="#">Listen To Microsoft
                                        CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset('frontend/assets/img/grid_pro1.png') }}" class="rounded-full w-10 h-10"
                                            alt="grid_pro1" loading="lazy">
                                        <div class="ms-2">
                                            <h5 class="text-sm font-medium text-white">Zannat Humaira</h5>
                                            <span class="text-xs text-white">Feb 18, 2024</span>
                                        </div>
                                    </div>
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

                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 md-grid-cols-2 xl-grid-cols-1 md-col-span-3 xl-col-span-1">
                    <div class="relative rounded-75 overflow-hidden">
                        <div class="relative inline-block  w-full h-300">
                            <img class="img-abs" src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                        </div>
                        <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                        <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                            <a href="#"
                                class="px-3 py-1 mb-2 inline-block rounded-lg font-normal text-white text-xs capitalize absolute right-5 bg-gray-500 top-5">travel</a>
                            <div class="w-100 p-3 absolute left-0 right-0">
                                <h4 class="mb-5">
                                    <a class="text-white block font-semibold text-base" href="#">Listen To Microsoft
                                        CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset('frontend/assets/img/grid_pro1.png') }}" class="rounded-full w-10 h-10"
                                            alt="grid_pro1" loading="lazy">
                                        <div class="ms-2">
                                            <h5 class="text-sm font-medium text-white">Zannat Humaira</h5>
                                            <span class="text-xs text-white">Feb 18, 2024</span>
                                        </div>
                                    </div>
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
                            <div class="w-100 p-3 absolute left-0 right-0">
                                <h4 class="mb-5">
                                    <a class="text-white block font-semibold text-base" href="#">Listen To Microsoft
                                        CEO Explain Windows 12 Boot Bugsty</a>
                                </h4>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset('frontend/assets/img/grid_pro1.png') }}" class="rounded-full w-10 h-10"
                                            alt="grid_pro1" loading="lazy">
                                        <div class="ms-2">
                                            <h5 class="text-sm font-medium text-white">Zannat Humaira</h5>
                                            <span class="text-xs text-white">Feb 18, 2024</span>
                                        </div>
                                    </div>
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

                            </div>
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
                    <h2 class="font-semibold title">Our Categories</h2>
                    <p class="mt-2 font-normal text-neutral-500">Discover 6 topics</p>
                </div>
                <a href="categories.html">All Categories</a>
            </div>
            <div class="categories-wrapper grid grid-cols-1 md-grid-cols-2 lg-grid-cols-3 xl-grid-cols-6 gap-6">
                <a href="categories.html">
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

    <section class="recent-Vodcast section-padding">
        <div class="container">
            <div class="flex justify-between items-center">
                <div class="section-title">
                    <h2 class="font-semibold title">Listen to the most recent Vodcast.</h2>
                    <p class="mt-2 font-normal text-neutral-500">Click on the music symbol and enjoy the Vodcast. </p>
                </div>
                <a href="categories.html">All Post</a>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="Vodcast-item">
                        <div class="podc-description">
                            <img src="{{ asset('frontend/assets/img/travel.jpg') }}" alt="">
                            <div class="pod-title">
                                <p class="text-neutral-700 text-sm font-medium leading-none mb-2">Mar 6, 2024</p>
                                <a href="#" class="text-neutral-950  text-base font-semibold item-link">CoinGain -
                                    Earn Free Coins, Cryptocurrencies Gift Cards Vue Nuxt Template910</a>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500 ">
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
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="Vodcast-item">
                        <div class="podc-description">
                            <img src="{{ asset('frontend/assets/img/travel.jpg') }}" alt="">
                            <div class="pod-title max-w-64">
                                <p class="text-neutral-700 text-sm font-medium leading-none mb-2">Mar 6, 2024</p>
                                <a href="#" class="text-neutral-950  text-base font-semibold item-link">CoinGain -
                                    Earn Free Coins, Cryptocurrencies Gift Cards Vue Nuxt Template910</a>
                            </div>
                        </div>
                        <div class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500">
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
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="Vodcast-item">
                        <div class="podc-description">
                            <img src="{{ asset('frontend/assets/img/travel.jpg') }}" alt="">
                            <div class="pod-title">
                                <p class="text-neutral-700 text-sm font-medium leading-none mb-2">Mar 6, 2024</p>
                                <a href="#" class="text-neutral-950  text-base font-semibold item-link">CoinGain -
                                    Earn Free Coins, Cryptocurrencies Gift Cards Vue Nuxt Template910</a>
                            </div>
                        </div>
                        <div class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-primary-500">
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
                </div>
            </div>
        </div>
    </section>

    <section class="highlight-Vodcast section-padding">
        <div class="container">
            <div class="flex justify-between items-center">
                <div class="section-title">
                    <h2 class="font-semibold title">Top Picks: Video Vodcast Highlight
                    </h2>
                    <p class="mt-2 font-normal text-neutral-500">Discover the Latest Trends in Engaging Video Content
                </div>
                <a href="categories.html">All Post</a>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="highlight-item bg-white overflow-hidden">
                        <div class="relative ">
                            <a class="px-2 py-1 mb-2 inline-block rounded-lg font-normal bg-primary-100 text-primary-500 text-xs capitalize absolute z-10 top-5 left-5 zindex-1"
                                href="#">travel</a>
                            <div class="relative inline-block rounded-2xl h-250 w-full">
                                <img src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                            </div>
                            <div
                                class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 right-5 ">
                                Feb 18, 2024</div>
                            <div class="absolute bottom-47 left-5">

                                <div
                                    class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-white">
                                    <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="youtube-btn">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-8 text-primary-500">
                                            <path
                                                d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                                fill="currentColor" stroke-width="0"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <h4 class="mt-2 p-2"><a class="text-neutral-950 font-semibold item-link text-lg"
                                    href="#">Listen To Microsoft CEO Explain Windows 12 Boot Bugsty</a></h4>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="highlight-item bg-white overflow-hidden">
                        <div class="relative ">
                            <a class="px-2 py-1 mb-2 inline-block rounded-lg font-normal bg-primary-100 text-primary-500 text-xs capitalize absolute z-10 top-5 left-5 zindex-1"
                                href="#">travel</a>
                            <div class="relative inline-block rounded-2xl h-250 w-full">
                                <img src="{{ asset('frontend/assets/img/grid3.png') }}" alt="grid1">
                            </div>
                            <div
                                class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 right-5 ">
                                Feb 18, 2024</div>
                            <div class="absolute bottom-47 left-5">

                                <div
                                    class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-white">
                                    <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="youtube-btn">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-8 text-primary-500">
                                            <path
                                                d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                                fill="currentColor" stroke-width="0"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <h4 class="mt-2 p-2"><a class="text-neutral-950 font-semibold item-link text-lg"
                                    href="#">Listen To Microsoft CEO Explain Windows 12 Boot Bugsty</a></h4>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="highlight-item bg-white overflow-hidden">
                        <div class="relative ">
                            <a class="px-2 py-1 mb-2 inline-block rounded-lg font-normal bg-primary-100 text-primary-500 text-xs capitalize absolute z-10 top-5 left-5 zindex-1"
                                href="#">travel</a>
                            <div class="relative inline-block rounded-2xl h-250 w-full">
                                <img src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                            </div>
                            <div
                                class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 right-5 ">
                                Feb 18, 2024</div>
                            <div class="absolute bottom-47 left-5">

                                <div
                                    class="flex items-center justify-center rounded-full cursor-pointer h-10 w-10 bg-white">
                                    <a href="https://www.youtube.com/watch?v=WTUCPceDk0w" class="youtube-btn">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-8 text-primary-500">
                                            <path
                                                d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                                fill="currentColor" stroke-width="0"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <h4 class="mt-2 p-2"><a class="text-neutral-950 font-semibold item-link text-lg"
                                    href="#">Listen To Microsoft CEO Explain Windows 12 Boot Bugsty</a></h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="excellence  section-padding">
        <div class="container">
            <div class="flex justify-between items-center">
                <div class="section-title">
                    <h2 class="font-semibold title">Top Picks: Video Vodcast Highlight
                    </h2>
                    <p class="mt-2 font-normal text-neutral-500">Discover the Latest Trends in Engaging Video Content
                </div>
                <a href="categories.html">All Post</a>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="excell-item">
                        <div class="relative rounded-75 overflow-hidden">
                            <div class="relative inline-block  w-full h-300">
                                <img class="img-abs" src="{{ asset('frontend/assets/img/entertainment.jpg') }}" alt="grid1">
                            </div>
                            <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                            <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                                <div
                                    class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 left-5 ">
                                    Feb 18, 2024</div>
                                <div class="w-100 p-3 absolute left-0 right-0">

                                    <div class="flex items-center justify-between">

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
                                        <h4 class="exe-title flex-1">
                                            <a class="text-white block font-semibold" href="author.html">Listen To
                                                Microsoft CEO Explain Windows 12 Boot Bugsty</a>
                                        </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="excell-item">
                        <div class="relative rounded-75 overflow-hidden">
                            <div class="relative inline-block  w-full h-300">
                                <img class="img-abs" src="{{ asset('frontend/assets/img/entertainment2.png') }}" alt="grid1">
                            </div>
                            <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                            <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                                <div
                                    class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 left-5 ">
                                    Feb 18, 2024</div>
                                <div class="w-100 p-3 absolute left-0 right-0">

                                    <div class="flex items-center justify-between">

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
                                        <h4 class="exe-title flex-1">
                                            <a class="text-white block font-semibold" href="author.html">Listen To
                                                Microsoft CEO Explain Windows 12 Boot Bugsty</a>
                                        </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="excell-item">
                        <div class="relative rounded-75 overflow-hidden">
                            <div class="relative inline-block  w-full h-300">
                                <img class="img-abs" src="{{ asset('frontend/assets/img/grid1.png') }}" alt="grid1">
                            </div>
                            <div class="absolute top-0 left-0 w-full h-full  to-black"></div>
                            <div class="absolute bottom-0 left-0 w-full h-full flex justify-center items-end">
                                <div
                                    class="px-2 py-1 mb-2 inline-block rounded-lg font-semibold bg-white text-gray-800 text-xs capitalize absolute top-5 left-5 ">
                                    Feb 18, 2024</div>
                                <div class="w-100 p-3 absolute left-0 right-0">

                                    <div class="flex items-center justify-between">

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
                                        <h4 class="exe-title flex-1">
                                            <a class="text-white block font-semibold" href="author.html">Listen To
                                                Microsoft CEO Explain Windows 12 Boot Bugsty</a>
                                        </h4>
                                    </div>

                                </div>
                            </div>

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
