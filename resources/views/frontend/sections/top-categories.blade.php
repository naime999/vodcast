<section class="top-categories section-padding">
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="section-title">
                <h2 class="font-semibold title">Our Categories</h2>
                <p class="mt-2 font-normal text-neutral-500">Discover 6 topics</p>
            </div>
            <a href="{{ route('categories') }}">All Categories</a>
        </div>
        <div class="categories-wrapper grid grid-cols-1 md-grid-cols-2 lg-grid-cols-3 xl-grid-cols-6 gap-6">
            @foreach ($categories->take(6) as $category)
            <a href="{{ route('category', $category->slug) }}">
                <img src="{{ asset($category->image) }}" alt="" class="rounded-xl">
                <div class="d-flex justify-content-between align-items-center mt-2 px-2">
                    <span class="mb-0 text-base text-neutral-900 font-medium">{{ $category->name }}</span>
                    <span class=" text-xs text-neutral-500">{{ $category->relations->count() }} {{ $category->relations->count() > 1 ? 'Posts' : 'Post' }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
