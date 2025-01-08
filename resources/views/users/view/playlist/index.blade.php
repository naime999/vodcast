@extends('users.layouts.app')

@section('title', 'Users List')

@section('css')
@include('users.common.datatable_style')
<style>
.add-video {
    background: linear-gradient(90deg, #c7daf8, #e7eef8);
}
.video-card .video-icon {
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    opacity: 0;
    visibility: hidden;
    padding: 15px;
    background-color: #FFFFFF;
    border-style: solid;
    border-width: 2px 2px 2px 2px;
    border-radius: 100px 100px 100px 100px;
    border-color: #FFFFFF;
    animation: ripple 1s linear infinite;
    display: inline-block;
    transition: all 0.3s ease 0s !important;

}
.video-card:hover .video-icon{
    opacity: 1;
    visibility: visible;
    top: 50%;
}
.video-title {
    position: absolute;
    bottom: 0px;
    color: white;
    background: rgba(0, 0, 0, 0.6);
    padding: 5px 15px;
    animation: slideIn 1s ease-in-out;
}
.video-title h5 {
    margin: 0;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
}
.video-viewer iframe{
    width: 100%;
    height: 500px;
}

@keyframes ripple{
    0% {
        -webkit-box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.3), 0 0 0 5px rgba(255, 255, 255, 0.3), 0 0 0 10px rgba(255, 255, 255, 0.3);
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.3), 0 0 0 5px rgba(255, 255, 255, 0.3), 0 0 0 10px rgba(255, 255, 255, 0.3);
    }

    100% {
        -webkit-box-shadow: 0 0 0 5px rgba(255, 255, 255, 0.3), 0 0 0 10px rgba(255, 255, 255, 0.3), 0 0 0 20px rgba(255, 255, 255, 0);
        box-shadow: 0 0 0 5px rgba(255, 255, 255, 0.3), 0 0 0 10px rgba(255, 255, 255, 0.3), 0 0 0 20px rgba(2241, 42, 2, 0);
    }
}
@keyframes slideIn {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>
@endsection
@section('content')
<div class="container-fluid p-0">
    <div class="d-flex flex-row">
        <div class="w-100 p-3">
            {{-- Page Body --}}
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between py-3">
                    <h5 class="m-0 font-weight-bold text-primary">View Playlist</h5>
                    <div class="text-right">
                        <button class="btn btn-sm btn-warning" id="labelEdit" onclick="editLabel(this)" data-id=""><i class="fas fa-pen pr-2"></i>Edit</button>
                        <button class="btn btn-sm btn-danger" id="labelDelete" onclick="deleteLabel(this)" data-id=""><i class="fas fa-trash pr-2"></i>Delete</button>
                        <button class="btn btn-sm btn-primary" onclick="newLabel()"><i class="fas fa-plus pr-2"></i>Add New</button>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <button class="list-group-item text-start active" data-id="0" onclick="showPlaylistItem(this)">All Items</button>
                            @foreach ($viewPlaylists as $viewPlaylist)
                                <button class="list-group-item text-start" data-id="{{ $viewPlaylist->id }}" onclick="showPlaylistItem(this)">{{ $viewPlaylist->name }}</button>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-9 rounded row m-0" id="item-view">
                    </div>
                    {{-- <table id="vYoutubePlaylistTable" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Items</th>
                                <th>Thumbnail</th>
                                <th>Public</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@include('users.view.playlist.edit-label-modal')
@endsection

@section('scripts')
    {{-- <script src="{{ asset('admin/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.js') }}"></script> --}}
    @include('admin.common.datatable_js')
    <script src="{{ asset('admin/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @include('frontend.common.alert_js')

    {{-- Datatable --}}
    <script>
        var load = $('.loader-overlay');
        $(document).ready(function() {
            getItems(0);
            load.hide();
        });

        var labelEdit = $('#labelEdit');
        var labelDelete = $('#labelDelete');

        function showPlaylistItem(data) {
            $('.active').removeClass('active');
            $(data).addClass('active');
            var playlist_id = $(data).attr('data-id');
            getItems(playlist_id);
        }

        function getItems(playlist_id) {
            $.ajax({
                url: "{{ route('users.view.playlist.get') }}",
                method: "POST",
                data: {
                    playlist_id: playlist_id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    showData (data);
                }
            });
        }

        function showData (data){
            var view = '';
            if(Array.isArray(data))
            {
                labelEdit.addClass("disabled");
                labelEdit.attr('data-id', "");
                labelDelete.addClass("disabled");
                labelDelete.attr('data-id', "");
                if(data.length > 0){
                    data.forEach(pList =>{
                        var html = '';
                        if(pList.list_items.length > 0){
                        html += '<div class="col-md-12 mb-3 border-bottom">';
                        html += '   <h5>'+pList.name+'</h5>';
                        html += '</div>';
                        }
                        html += '<div class="col-md-12 row mb-4">';
                        pList.list_items.forEach(item => {
                            var htmlItem = '<div class="col-md-4 mb-4">';
                            htmlItem += '      <div class="card video-card overflow-hidden position-relative" style="background: linear-gradient(90deg, #c7daf8, #e7eef8);">';
                            htmlItem += '          <img src="'+item.video.thumbnail_url+'" alt="Video Thumbnail" class="card-img-top video-thumbnail">';
                            htmlItem += '          <div class="video-title">';
                            htmlItem += '             <h6>'+item.video.title+'</h6>';
                            htmlItem += '          </div>';
                            htmlItem += '          <span class="video-icon" onClick="playVideo(this)" youtubeid="'+item.video.youtube_id+'">';
                            htmlItem += '             <i class="fas fa-play fa-fade text-danger fs-2"></i>';
                            htmlItem += '          </span>';
                            htmlItem += '      </div>';;
                            htmlItem += '   </div>';
                            html += htmlItem;
                        });
                        html += '</div>';
                        view += html;
                    });
                }else{
                    var html  = '    <div class="col-md-12 d-flex justify-content-center align-items-center">';
                        html += '       <div class="w-50 card mb-4 shadow">';
                        html += '           <div class="card-body text-center">';
                        html += '               <h5 class="card-title m-0">No Available Content</h5>';
                        html += '           </div>';
                        html += '       </div>';
                        html += '   </div>';
                        view += html;
                }
            }else{
                labelEdit.removeClass("disabled");
                labelEdit.attr('data-id', data.id);
                labelDelete.removeClass("disabled");
                labelDelete.attr('data-id', data.id);
                if(data.list_items.length > 0){
                    data.list_items.forEach(item => {
                        var html = '<div class="col-md-4 mb-4">';
                        html += '      <div class="card video-card overflow-hidden position-relative" style="background: linear-gradient(90deg, #c7daf8, #e7eef8);">';
                        html += '          <img src="'+item.video.thumbnail_url+'" alt="Video Thumbnail" class="card-img-top video-thumbnail">';
                        html += '          <div class="video-title">';
                        html += '             <h6>'+item.video.title+'</h6>';
                        html += '          </div>';
                        html += '          <span class="video-icon" onClick="playVideo(this)" youtubeid="'+item.video.youtube_id+'">';
                        html += '             <i class="fas fa-play fa-fade text-danger fs-2"></i>';
                        html += '          </span>';
                        html += '      </div>';;
                        html += '   </div>';
                        view += html;
                    });
                }else{
                    var html  = '    <div class="col-md-12 d-flex justify-content-center align-items-center">';
                        html += '       <div class="w-50 card mb-4 shadow">';
                        html += '           <div class="card-body text-center">';
                        html += '               <h5 class="card-title m-0">No Available Content</h5>';
                        html += '           </div>';
                        html += '       </div>';
                        html += '   </div>';
                        view += html;
                }
            }
            $("#item-view").html(view);
        }
        // Actions
        function editLabel(btnData){
            var id = $(btnData).attr('data-id');
            console.log("id", id);
            swal.fire({
                title: "Are you sure?",
                text: "You want to edit this Label? Please click continue button.",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Continue`,
            }).then((result) => {
                if (result.value == true) {
                    $.ajax({
                        url: "{{ route('users.playlist.label.select') }}",
                        method: "POST",
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            $('#edit-playlist-label').find('input[name="id"]').val(response.id);
                            $('#edit-playlist-label').find('input[name="name"]').val(response.name);
                            $('#edit-playlist-label').find('textarea[name="description"]').val(response.description);
                            $('#editLabelModal').modal('show');
                        },
                    });
                }
            });
        }

        function deleteLabel(btnData){
            var id = $(btnData).attr('data-id');
            if(id === ""){
                Swal.fire({
                    icon: 'error',
                    title: "Error!",
                    text: "Please select a label",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1500
                });
                return
            }
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this label",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Delete`,
            }).then((result) => {
                if (result.value == true) {
                    $.ajax({
                        url: "{{ route('users.playlist.label.delete') }}",
                        method: "POST",
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            // console.log(response);
                            if(response.status == 'success'){
                                Swal.fire({
                                    icon: response.status,
                                    title: "Success",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1500
                                }).then(function(){
                                    location.reload()
                                });
                            }else{
                                Swal.fire({
                                    icon: response.status,
                                    title: "Error!",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1500
                                }).then(function(){
                                    location.reload()
                                });
                            }
                        },
                    });
                }
            });
        }
    </script>
@endsection


