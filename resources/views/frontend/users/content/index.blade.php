@extends('frontend.layouts.app')

@section('title', 'Users List')

@section('css')
<link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
<link href="{{asset('user/css/sb-admin-2.css')}}" rel="stylesheet">
@include('admin.common.datatable_style')
@endsection
@section('content')
<div class="container-fluid p-0">
    <div class="d-flex flex-row">
        @include('frontend.users.sidebar')
        <div class="w-100 p-3">
            {{-- Page Head --}}
            @include('frontend.users.header')

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
    </div>
</div>

    {{-- @include('frontend.users.delete-modal') --}}

@endsection

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
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
                    {data: 'description', name: 'description'},
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
@endsection
