@extends('admin.layouts.app')

@section('title', 'User Request')
@section('css')
@include('admin.common.datatable_style')
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Request's</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Request's</h6>
            </div>
            <div class="card-body table-responsive">
                <table id="requestTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.categories.add-modal')
    @include('admin.categories.edit-modal')

@endsection

@section('scripts')
<script src="{{ asset('admin/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.js') }}"></script>
@include('admin.common.datatable_js')
<script src="{{ asset('admin/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
            });
        });
    </script>
@endif
@if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
            });
        });
    </script>
@endif
@if($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let errorMessages = '';
            @foreach($errors->all() as $error)
                errorMessages += '{{ $error }}<br>';
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Field Error',
                html: errorMessages,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
            }).then((result) => {
                // console.log("idhodshgdf");
                $('#addModal').modal('show');
            });
        });
    </script>
@endif
<script>
    // ----------------------------------------------------- Datatable
    function showDatatable(){
        var devisData = $('#requestTable').DataTable({
            bAutoWidth: false,
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            ajax: {
                url: "{{ route('super-admin.requests.get') }}",
                method: "GET",
                data: function (d) {
                    d._token = "{{ csrf_token() }}";
                }
            },
            columnDefs: [
                {width: '5%', className: 'text-center', targets: [0] },
                {width: '5%', className: 'text-center', targets: [5] },
            ],
             columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "aaSorting": [],
            language: {
                emptyTable: '<div class="py-4 border-1">No available proposal</div>'
            },
        });
    }
    showDatatable();

    function changeStatus(btnData){
        var requestId = $(btnData).attr('data-id');
        var selected = $(btnData).attr('data-select');
        swal.fire({
            title: "Change User Status",
            text: "Are you sure? You want to change status and this user role?",
            input: "select",
            inputPlaceholder: "Select request status",
            inputValue: selected,
            inputOptions: {
                0: "Pending",
                1: "Approved",
                2: "Declined",
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
            if (result.value) {
                load.show();
                $.ajax({
                    url: "{{ route('super-admin.requests.change.status') }}",
                    method: "POST",
                    data: {
                        id: requestId,
                        'select_status': result.value,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        load.hide();
                        console.log(response);
                        $('#requestTable').DataTable().ajax.reload();
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.message,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        }
                    },
                    error: function(xhr, statusCode, error) {
                        load.hide();
                        $('#requestTable').DataTable().ajax.reload();
                        if(xhr.status === 403){
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: xhr.responseJSON.message,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred. Please try again later.',
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        }
                    }
                });
            }
        });
    }

    function deleteCategory(id){
        var catId = $(id).attr('data-id');
        swal.fire({
            title: "Are you sure?",
            text: "You want to delete this category",
            icon: "warning",
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: `Delete`,
        }).then((result) => {
            if (result.value == true) {
                load.show();
                $.ajax({
                    url: "{{ route('super-admin.category.delete') }}",
                    method: "POST",
                    data: {
                        id: catId,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        load.hide();
                        $('#requestTable').DataTable().ajax.reload();
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.message,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        load.hide();
                        $('#requestTable').DataTable().ajax.reload();
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
