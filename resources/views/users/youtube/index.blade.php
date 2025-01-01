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
    bottom: 10px;
    text-align: center;
    color: white;
    background: rgba(0, 0, 0, 0.6);
    padding: 5px 10px;
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
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Youtube Playlist</h5>
                </div>
                <div class="card-body table-responsive">
                    <table id="vYoutubePlaylistTable" class="table table-bordered table-striped">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('users.youtube.edit-playlist-modal')
@endsection

@section('scripts')
    {{-- <script src="{{ asset('admin/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.js') }}"></script> --}}
    @include('admin.common.datatable_js')
    <script src="{{ asset('admin/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @include('frontend.common.alert_js')
    <script>
        var load = $('.loader-overlay');
        $(document).ready(function() {
            load.hide();
        });
    </script>

    {{-- Datatable --}}
    <script>
        function format ( d ) {
            console.log(d);
            var count = 0;
            var html = '';
            html += '<div class="p-2 row">';
                d.items.forEach(datarow => {
                    console.log(count, datarow.snippet.thumbnails.high);
                    count++;
                    if(datarow.status.privacyStatus === "public"){
                    html += '<div class="col-md-3 mb-4">';
                    html += '   <div class="card video-card overflow-hidden position-relative" style="background: linear-gradient(90deg, #c7daf8, #e7eef8);">';
                    html += '       <img src="'+datarow.snippet.thumbnails.high.url+'" alt="Video Thumbnail" class="card-img-top video-thumbnail">';
                    html += '       <div class="video-title">';
                    html += '          <h5 class="text-truncate">'+datarow.snippet.title+'</h5>';
                    html += '       </div>';
                    html += '       <span class="video-icon" onClick="playVideo(this)" youtubeid="'+datarow.snippet.resourceId.videoId+'">';
                    html += '          <i class="fas fa-play fa-fade text-danger fs-2"></i>';
                    html += '       </span>';
                    html += '   </div>';;
                    html += '</div>';
                    }
                });
            html += '</div>';
            return html;
        }

        function showDatatable(){
            var devisData = $('#vYoutubePlaylistTable').DataTable({
                bAutoWidth: false,
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                orderable: false,
                ajax: {
                    url: "{{ route('users.youtube.playlist.get') }}",
                    method: "GET",
                    data: function (d) {
                        d._token = "{{ csrf_token() }}";
                    }
                },
                columnDefs: [
                    {width: '5%', targets: [0] },
                    {className: 'align-middle', targets: [1] },
                    {width: '5%', className: 'text-center align-middle', targets: [2] },
                    {width: '15%',className: 'align-middle', targets: [3] },
                    {width: '10%', className: 'align-middle', targets: [4] },
                    {width: '5%', className: 'align-middle', targets: [5] },
                ],
                columns: [
                    {
                        className: "dt-control align-middle",
                        orderable: false,
                        data: null,
                        defaultContent: '',
                    },
                    {data: 'title', name: 'title'},
                    {data: 'count', name: 'count'},
                    {data: 'thumbnail', name: 'thumbnail'},
                    {data: 'is_public', name: 'is_public'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                // "aaSorting": [],
                language: {
                    emptyTable: '<div class="py-4 border-1">No available content</div>'
                },
            });

            $('#vYoutubePlaylistTable tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = devisData.row( tr );
                // console.log(row);
                if ( row.child.isShown() ) {
                    row.child.hide();
                    tr.removeClass('shown');
                }else {
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                    // $(tr).next('tr').children().addClass('p-0');
                }
            });
        }

        showDatatable();
    </script>
    {{-- Actions --}}
    <script>
        function editPlaylist(btnData){
            var id = $(btnData).attr('data-id');
            swal.fire({
                title: "Are you sure?",
                text: "You want to edit this playlist? Please click continue button.",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Continue`,
            }).then((result) => {
                if (result.value == true) {
                    $.ajax({
                        url: "{{ route('users.youtube.playlist.edit') }}",
                        method: "POST",
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            $('#edit-youtube-playlist').find('input[name="id"]').val(response.id);
                            $('#edit-youtube-playlist').find('input[name="title"]').val(response.title);
                            $('#edit-youtube-playlist').find('input[name="youtube_id"]').val(response.youtube_id);
                            $('#edit-youtube-playlist').find('input[name="thumbnail_url"]').val(response.thumbnail_url);
                            let selectCategory = $('#edit-youtube-playlist').find('select[name="category_id"]');
                            if (selectCategory.find(`option[value="${response.category_id}"]`).length) {
                                selectCategory.val(response.category_id);
                            } else {
                                selectCategory.val('0');
                            }
                            $('#edit-youtube-playlist').find('textarea[name="description"]').val(response.description);
                            let selectVisiblity = $('#edit-youtube-playlist').find('select[name="is_public"]');
                            if (selectVisiblity.find(`option[value="${response.is_public}"]`).length) {
                                selectVisiblity.val(response.is_public);
                            } else {
                                selectVisiblity.val('0');
                            }
                            let selectStatus = $('#edit-youtube-playlist').find('select[name="status"]');
                            if (selectStatus.find(`option[value="${response.status}"]`).length) {
                                selectStatus.val(response.status);
                            } else {
                                selectStatus.val('0');
                            }
                            // var thumbnail_url = `{{ asset('${response.thumbnail}') }}`
                            // $('#thumbnail_edit_preview').css({
                            //     "background-image": "url('"+thumbnail_url+"')",
                            //     "background-size": "contain",
                            //     "background-position": "center",
                            //     "background-repeat": "no-repeat"
                            // });
                            // $("#noimage").hide();
                            $('#yEditPlaylistModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            $('#vYoutubePlaylistTable').DataTable().ajax.reload();
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred. Please try again later.',
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        }

        function changeStatus(btnData){
            var id = $(btnData).attr('data-id');
            var selected = $(btnData).attr('data-selected');
            Swal.fire({
                title: "Playlist Visibility",
                input: "select",
                inputPlaceholder: "Select visibility type",
                inputValue: selected,
                inputOptions: {
                    0: "Public",
                    1: "Private",
                    2: "Only Me",
                },
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Confirm`,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        console.log(resolve);
                        if (value === "") {
                            resolve("Please select a type");
                        } else {
                            resolve();
                        }
                    });
                }
            }).then((result) => {
                // console.log(result.value);
                // result.dismiss
                if (result.value) {
                    $.ajax({
                        url: "{{ route('users.youtube.playlist.visibility') }}",
                        method: "POST",
                        data: {
                            id: id,
                            'is_public': result.value,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if(response.status == 'success'){
                                $('#vYoutubePlaylistTable').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: response.status,
                                    title: "Success",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1500
                                });
                            }else{
                                Swal.fire({
                                    icon: response.status,
                                    title: "Error!",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1500
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#vYoutubePlaylistTable').DataTable().ajax.reload();
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred. Please try again later.',
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        }

        function deletePlaylist(btnData){
            var id = $(btnData).attr('data-id');
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this Playlist",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Delete`,
            }).then((result) => {
                if (result.value == true) {
                    $.ajax({
                        url: "{{ route('users.youtube.playlist.delete') }}",
                        method: "POST",
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if(response.status == 'success'){
                                $('#vYoutubePlaylistTable').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: response.status,
                                    title: "Success",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1500
                                });
                            }else{
                                Swal.fire({
                                    icon: response.status,
                                    title: "Error!",
                                    text: response.message,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1500
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#vYoutubePlaylistTable').DataTable().ajax.reload();
                            console.log(error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred. Please try again later.',
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        }

        function playVideo(btnData){
            var vid = $(btnData).attr('youtubeid');
            load.show();
            $.ajax({
                url: "{{ route('users.youtube.player.data') }}",
                method: "POST",
                data: {
                    vid: vid,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    load.hide();
                    $('#videoPlayerModal').find('.modal-title').text(response.snippet.title);
                    $('#videoPlayerModal').find('.modal-body').html(response.player.embedHtml);
                    $('#videoPlayerModal').modal('show');

                    // const alt = Swal.fire({
                    //     title: response.snippet.title,
                    //     html: response.player.embedHtml,
                    //     showCloseButton: true,
                    //     showCancelButton: true,
                    //     showConfirmButton: false,
                    //     cancelButtonText:'close',
                    //     customClass: {
                    //         header: 'mr-5 pb-3',
                    //         title: 'fs-6 text-truncate',
                    //         actions: 'd-flex flex-row-reverse',
                    //     }
                    // });
                },
                error: function(xhr, status, error) {
                    load.hide();
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An unexpected error occurred. Please try again later.',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1500
                    });
                }
            });
        }
        $('#videoPlayerModal').on('hidden.bs.modal', () => {
            const modal = $('#videoPlayerModal');
            modal.find('.modal-body').html('');  // Clear the video content
        });
    </script>
@endsection


