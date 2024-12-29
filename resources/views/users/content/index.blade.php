@extends('users.layouts.app')

@section('title', 'Users List')

@section('css')
@include('users.common.datatable_style')
@endsection
@section('content')
<div class="container-fluid p-0">
    <div class="d-flex flex-row">
        <div class="w-100 p-3">
            {{-- Page Body --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Content List</h5>
                </div>
                <div class="card-body table-responsive">
                    <table id="vContentTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Likes</th>
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

@include('users.content.view-modal')

@endsection

@section('scripts')
    <script src="{{ asset('admin/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.js') }}"></script>
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
        function showDatatable(){
            var devisData = $('#vContentTable').DataTable({
                bAutoWidth: false,
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                orderable: false,
                ajax: {
                    url: "{{ route('users.content.get') }}",
                    method: "GET",
                    data: function (d) {
                        d._token = "{{ csrf_token() }}";
                    }
                },
                columnDefs: [
                    {width: '5%', className: 'text-center', targets: [0] },
                ],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'views', name: 'views'},
                    {data: 'likes', name: 'likes'},
                    {data: 'is_public', name: 'is_public'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                // "aaSorting": [],
                language: {
                    emptyTable: '<div class="py-4 border-1">No available proposal</div>'
                },
            });
        }
        showDatatable();
    </script>
    {{-- Actions --}}
    <script>
        function viewContent(btnData){
            var id = $(btnData).attr('data-id');
            $.ajax({
                url: "{{ route('users.youtube.get') }}",
                method: "POST",
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    var html = '';
                    html += '<div class="col-auto float-md-start mb-3 mr-3" id="view-player">'+response.youtube.player.embedHtml+'</div>';
                    html += '<h5 class="mb-1">'+response.title+'</h5>';
                    html += '<div class="d-flex">';
                        if(response.views > 1){
                            html += '<div class="px-3 py-2 border rounded mr-2"><strong>Views : </strong>'+response.views+'</div>';
                        }else{
                            html += '<div class="px-3 py-2 border rounded mr-2"><strong>View : </strong>'+response.views+'</div>';
                        }
                        if(response.likes > 1){
                            html += '<div class="px-3 py-2 border rounded"><strong>Likes : </strong>'+response.likes+'</div>';
                        }else{
                            html += '<div class="px-3 py-2 border rounded"><strong>Like : </strong>'+response.likes+'</div>';
                        }
                    html += '</div>';
                    html += '<p class="mt-3">'+response.description+'</p>';
                    $("#view-player").html(html);

                    $('#viewModal').modal('show');
                },
                error: function(xhr, status, error) {
                    $('#proposalTable').DataTable().ajax.reload();
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

        function editContent(btnData){
            var id = $(btnData).attr('data-id');
            swal.fire({
                title: "Are you sure?",
                text: "You want to update this post",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Continue`,
            }).then((result) => {
                if (result.value == true) {
                    let url = `{{ url('users/content/edit') }}/${id}`;
                    window.open(url, '_self');
                }
            });
        }

        function deleteContent(btnData){
            var id = $(btnData).attr('data-id');
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this post",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: `Delete`,
            }).then((result) => {
                if (result.value == true) {
                    let url = `{{ url('users/content/delete') }}/${id}`;
                    window.open(url, '_self');
                }
            });
        }

        function changeStatus(btnData){
            var id = $(btnData).attr('data-id');
            var selected = $(btnData).attr('data-selected');
            Swal.fire({
                title: "Visibility Type",
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
                if (result.value != "") {
                    $.ajax({
                        url: "{{ route('users.content.update.individual') }}",
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
                                $('#vContentTable').DataTable().ajax.reload();
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
                            $('#vContentTable').DataTable().ajax.reload();
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
