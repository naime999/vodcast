@extends('users.layouts.app')

@section('title', 'Users List')

@section('css')
@include('users.common.datatable_style')
<style>
.add-video {
    background: linear-gradient(90deg, #c7daf8, #e7eef8);
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
                    <h5 class="m-0 font-weight-bold text-primary">Content Playlist</h5>
                </div>
                <div class="card-body table-responsive">
                    <table id="vContentPlaylistTable" class="table table-bordered table-striped">
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

@include('users.common.create.playlist-edit-modal')
@include('users.content.playlist.video-add-modal')
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
                d.list_items.forEach(datarow => {
                    count++;
                    html += '<div class="col-md-3 mb-4">';
                    html += '    <div class="card video-card" style="background: linear-gradient(90deg, #c7daf8, #e7eef8);">';
                    html += '        <img src="'+datarow.video.thumbnail_url+'" alt="Video Thumbnail" class="card-img-top video-thumbnail">';
                    html += '        <div class="card-body p-2">';
                    html += '            <h6 class="card-title text-truncate">'+datarow.video.title+'</h6>';
                    html += '            <div class="d-flex flex-row-reverse">';
                    html += '                <button class="btn btn-sm" onClick="deleteVideo(this)" data-id="'+datarow.id+'"><i class="fa-sharp fa-solid fa-circle-xmark fa-fade fs-3"></i></button>';
                    html += '            </div>';
                    html += '        </div>';
                    html += '    </div>';
                    html += '</div>';
                    // html += '<div class="col-md-2 card" style="">'+datarow.video.title+'</div>';
                });
                html += '<div class="col-md-3 mb-4">';
                html += '    <button class="btn h-100 w-100 d-flex align-items-center justify-content-center add-video" onClick="addVideo(this)" data-id="'+d.id+'">';
                html += '        <i class="fa-solid fa-video-plus fa-fade text-success fs-1 p-5"></i>';
                html += '    </button>';
                html += '</div>';
            html += '</div>';
            return html;
        }

        function showDatatable(){
            var devisData = $('#vContentPlaylistTable').DataTable({
                bAutoWidth: false,
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                orderable: false,
                ajax: {
                    url: "{{ route('users.content.playlist.get') }}",
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

            $('#vContentPlaylistTable tbody').on('click', 'td.dt-control', function () {
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
                        url: "{{ route('users.content.playlist.edit') }}",
                        method: "POST",
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            $('#edit-playlist').find('input[name="id"]').val(response.id);
                            $('#edit-playlist').find('input[name="name"]').val(response.name);
                            let selectElement = $('#edit-playlist').find('select[name="is_public"]');
                            if (selectElement.find(`option[value="${response.is_public}"]`).length) {
                                selectElement.val(response.is_public);
                            } else {
                                selectElement.val('0');
                            }
                            $('#edit-playlist').find('textarea[name="description"]').val(response.description);
                            var thumbnail_url = `{{ asset('${response.thumbnail}') }}`
                            $('#thumbnail_edit_preview').css({
                                "background-image": "url('"+thumbnail_url+"')",
                                "background-size": "contain",
                                "background-position": "center",
                                "background-repeat": "no-repeat"
                            });
                            $("#noimage").hide();
                            $('#cPlaylistEditModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            $('#vContentPlaylistTable').DataTable().ajax.reload();
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
                        url: "{{ route('users.content.playlist.update.individual') }}",
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
                                $('#vContentPlaylistTable').DataTable().ajax.reload();
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
                            $('#vContentPlaylistTable').DataTable().ajax.reload();
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
                        url: "{{ route('users.content.playlist.delete') }}",
                        method: "POST",
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if(response.status == 'success'){
                                $('#vContentPlaylistTable').DataTable().ajax.reload();
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
                            $('#vContentPlaylistTable').DataTable().ajax.reload();
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

        function addVideo(btnData){
            var id = $(btnData).attr('data-id');
            $('#videoAddModal').find('input[name="playlist_id"]').val(id);
            $("#videoAddModal").modal('show');
        }

        function deleteVideo(btnData){
            var id = $(btnData).attr('data-id');
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this item in Playlist",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Delete`,
            }).then((result) => {
                if (result.value == true) {
                    load.show();
                    $.ajax({
                        url: "{{ route('users.playlist.video.delete') }}",
                        method: "POST",
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            load.hide();
                            if(response.status == 'success'){
                                $('#vContentPlaylistTable').DataTable().ajax.reload();
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
                            $('#vContentPlaylistTable').DataTable().ajax.reload();
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
            });
        }
    </script>
@endsection
