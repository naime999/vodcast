@extends('users.layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
            <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
        </div>

        {{-- Alert Messages --}}
        {{-- @include('user.common.alert') --}}

        {{-- Page Content --}}
        <div class="row">
            {{-- <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="{{ getAvatar() }}">
                    <span class="font-weight-bold">{{ auth()->user()->full_name }}</span>
                    <span class="text-black-50"><i>Role: {{ auth()->user()->roles ? auth()->user()->roles->pluck('name')->first() : 'N/A' }}</i></span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                </div>
            </div> --}}
            <div class="col-md-12 border-right">
                {{-- Profile --}}
                <div class="p-3 py-5">
                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div> --}}
                    <form action="{{ route('users.profile.update') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-12 d-flex justify-content-center mb-2">
                                <div class="position-relative" style="width: 200px;">
                                    <div class="border rounded-circle d-flex justify-content-center align-items-center" width="100%" id="profile_image_preview" style="height: 200px;">
                                        {{-- <label class="rounded m-0" id="noimage">No Image</label> --}}
                                        @if (auth()->user()->user_info != null && auth()->user()->user_info->profile_image != null)
                                        <img class="rounded-circle" width="100%" src="{{ asset(auth()->user()->user_info->profile_image) }}">
                                        @else
                                        <img class="rounded-circle" width="100%" src="{{ getAvatar() }}">
                                        @endif
                                    </div>
                                    <div class="form-group position-absolute translate-middles bottom-0" style="right:10px;">
                                        <input type="hidden" id="profile_image_baseImage" name="profile_image_baseImage" value="" />
                                        <input type="file" name="profile_image" onchange="fileDetailsCrop(this)" data-size="500x500" data-ratio="1/1" id="profile_image-image" class="image pt-1 form-control d-none" accept="image/*">
                                        <label class="btn btn-sm btn-primary rounded-circle border-5 border-white m-0" for="profile_image-image" ><i class="fas fa-image"></i><label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-5">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <span class="font-weight-bold fs-5">{{ auth()->user()->full_name }}</span>
                                    <span class="text-black-50"><i><strong>User Role: </strong>{{ auth()->user()->roles ? auth()->user()->roles->pluck('name')->first() : 'N/A' }}</i></span>
                                    <span class="text-black-50"><strong>User Email: </strong>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" placeholder="First Name"
                                    value="{{ old('first_name') ? old('first_name') : auth()->user()->first_name }}">

                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="labels">Last Name</label>
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') ? old('last_name') : auth()->user()->last_name }}" placeholder="Last Name">

                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') ? old('mobile_number') : auth()->user()->mobile_number }}" placeholder="Mobile Number">
                                @error('mobile_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <label>For Vodcaster <span style="color:red;">*</span></label>
                            <div class="col-md-12 mb-3">
                                <div class="row m-0 p-3 border">
                                    <div class="col-md-6 mb-2 form-group">
                                        <label for="youtube-id">Vodcaster video profile</label>
                                        <input type="text" name="youtube_id" id="youtube-id" class="form-control mb-3 @error('youtube_id') is-invalid @enderror" placeholder="Youtube video id" value="{{ auth()->user()->user_info != null && auth()->user()->user_info->youtube_id != null ? auth()->user()->user_info->youtube_id : old('youtube_ids') }}">
                                        <div class="video-view">
                                            @if (auth()->user()->user_info != null && auth()->user()->user_info->youtube_data != null)
                                                {!! auth()->user()->user_info->youtube_data->player->embedHtml !!}
                                            @endif
                                        </div>
                                        @error('youtube_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input type="hidden" id="vodcaster_image_baseImage" name="vodcaster_image_baseImage" value="" />
                                            <input type="file" name="vodcaster_image" onchange="fileDetailsCrop(this)" data-size="395x592" data-ratio="10.5/16" id="vodcaster_image-image" class="image pt-1 form-control d-none" accept="image/*">
                                            <label class="btn btn-sm btn-primary rounded m-0" for="vodcaster_image-image"><i class="fas fa-image pr-2"></i> Select Vodcaster Image<label>
                                        </div>
                                        <div class="border rounded d-flex justify-content-center align-items-center" id="vodcaster_image_preview" style="height: 300px; background-color: #ececec;">
                                            @if (auth()->user()->user_info != null && auth()->user()->user_info->vodcaster_image != null)
                                            <img class="" height="100%" src="{{ asset(auth()->user()->user_info->vodcaster_image) }}">
                                            @else
                                            <label class="rounded m-0" id="noimage">No Vodcaster Image</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Vodcaster Description</label>
                                            <textarea name="description" id="editor" cols="59" rows="10" class="form-control" autofocus>{{ auth()->user()->user_info != null && auth()->user()->user_info->description != null ? auth()->user()->user_info->description : old('descriptions') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-end">
                            <button class="btn btn-primary profile-button" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>

                <hr>
                {{-- Change Password --}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Change Password</h4>
                    </div>

                    <form action="{{ route('users.profile.change-password') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Current Password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Current Password" required>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">New Password</label>
                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Confirm Password</label>
                                <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" required placeholder="Confirm Password">
                                @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success profile-button" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('admin/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
@include('frontend.common.alert_js')
<script>
    var load = $('.loader-overlay');
    $(document).ready(function() {
        load.hide();
    });
    var description = CKEDITOR.replace('editor');
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
                    text: "Use this content description",
                    icon: "info",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: `Yes`,
                    cancelButtonText: `No`,
                }).then((result) => {
                    if (result.value == true) {
                        description.setData(response.snippet.description);
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
