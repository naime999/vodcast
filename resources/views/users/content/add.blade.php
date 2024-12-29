@extends('users.layouts.app')

@section('title', 'Users List')

@section('css')
<link href="{{asset('user/css/sb-admin-2.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid p-0">
    <div class="d-flex flex-row">
        <div class="w-100 p-3">
            {{-- Page Head --}}
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Create Post</h1>
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-chevron-left pr-1"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            {{-- Page Body --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">New Post</h5>
                </div>
                <div class="card-body table-responsive">
                    <form class="row contentStore" action="{{ route('users.content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Categories --}}
                        <div class="col-md-6 mb-2 form-group">
                            <label for="category-id">Category <span style="color:red;">*</span></label>
                            <select name="category_id" id="category-id" class="form-control @error('category_id') is-invalid @enderror">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Video Title -->
                        <div class="col-md-6 mb-2 form-group">
                            <label for="title">Title <span style="color:red;">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter your video title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Video id -->
                        <div class="col-md-6 mb-2 form-group">
                            <label for="youtube-id">Youtube video id <span style="color:red;">*</span></label>
                            <input type="text" name="youtube_id" id="youtube-id" class="form-control mb-3 @error('youtube_id') is-invalid @enderror" placeholder="Youtube video id">
                            <div class="video-view"></div>
                            @error('youtube_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Thumbnail url -->
                        <div class="col-md-6 mb-2 form-group">
                            <label for="thumbnail-url">Youtube video thumbnail url <span style="color:red;">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">https://example.com</span>
                                <input type="text" name="thumbnail_url" id="thumbnail-url" class="form-control @error('thumbnail_url') is-invalid @enderror" placeholder="Youtube video thumbnail url">
                            </div>
                            @error('thumbnail_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Video Description -->
                        <div class="col-md-12 mb-2 form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="10" placeholder="Enter your video description text"></textarea>
                        </div>

                        <!-- Public/Private -->
                        <div class="col-md-6 mb-2 form-group">
                            <label for="is-public">Visibility Status <span style="color:red;">*</span></label>
                            <select name="is_public" id="is-public" class="form-control">
                                <option value="0">Public</option>
                                <option value="1">Private</option>
                                <option value="2">Only Me</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-2 form-group">
                            <label for="status">Status <span style="color:red;">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12 mt-4 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Upload Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- @include('frontend.users.delete-modal') --}}

@endsection

@section('scripts')
    <script src="{{ asset('admin/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @include('frontend.common.alert_js')
    <script>
        var load = $('.loader-overlay');
        $(document).ready(function() {
            load.hide();
        });

        $(document).on("input", "#youtube-id", function () {
            var id = $(this).val().trim(); // Get the input value
            $.ajax({
                url: "{{ route('users.youtube.data') }}",
                method: "POST",
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $(".video-view").html(response.player.embedHtml);
                    swal.fire({
                        title: "Are you sure?",
                        text: "Use this content, like title, thumbnail and content",
                        icon: "info",
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: `Yes`,
                        cancelButtonText: `No`,
                    }).then((result) => {
                        if (result.value == true) {
                            $('#title').val(response.snippet.title);
                            $('#thumbnail-url').val(response.snippet.thumbnails.maxres.url);
                            $('#description').val(response.snippet.description);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    $(".video-view").html('<span class="text-danger"> The video ID is incorrect </span>');
                }
            });
        });
    </script>
@endsection
