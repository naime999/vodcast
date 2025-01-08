@extends('admin.layouts.app')

@section('title', 'Proposal List')
@section('css')
@include('admin.common.datatable_style')
@endsection
@section('content')
    <div class="container-fluid category-list">

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            <div class="d-flex align-items-center justify-content-between bd-highlight">
                @can('category-create')
                    <button class="btn btn-sm btn-primary mr-3" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus"></i> New Category
                    </button>
                @endcan
                {{-- <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-check"></i> Export To Excel
                </a> --}}
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Category</h6>

            </div>
            <div class="card-body table-responsive">
                <table id="categoryTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
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
        var devisData = $('#categoryTable').DataTable({
            bAutoWidth: false,
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            ajax: {
                url: "{{ route('super-admin.categories.get') }}",
                method: "GET",
                data: function (d) {
                    d._token = "{{ csrf_token() }}";
                }
            },
            columnDefs: [
                {width: '5%', className: 'text-center', targets: [0] },
                {width: '5%', className: 'text-center', targets: [3] },
            ],
             columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "aaSorting": [],
            language: {
                emptyTable: '<div class="py-4 border-1">No available proposal</div>'
            },
        });
    }
    showDatatable();

    function editCategory(id){
        load.show();
        var catId = $(id).attr('data-id');
        $.ajax({
            url: "{{ route('super-admin.category.get') }}",
            method: "GET",
            data: {
                id: catId,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data) {
                load.hide();
                console.log(data);
                $('#category-edit-form').find('input[name="id"]').val(data.id);
                $('#category-edit-form').find('input[name="title"]').val(data.name);
                $('#category-edit-form').find('textarea[name="description"]').val(data.description);
                $('#editModal').modal('toggle');
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
                        $('#categoryTable').DataTable().ajax.reload();
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
                        $('#categoryTable').DataTable().ajax.reload();
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
