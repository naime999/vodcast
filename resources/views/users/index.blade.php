@extends('users.layouts.app')

@section('title', 'Users List')

@section('css')
@endsection
@section('content')
    {{-- @include('users.users.delete-modal') --}}
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between m-3">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div> --}}

        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="text-center mb-3">Welcome To {{ getSetting('app-name')->value }} Dashboard!</h2>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row m-3">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <a class="row no-gutters align-items-center" href="{{ route('users.index') }}">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                    Content
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-file fa-2x text-gray-300"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <a class="row no-gutters align-items-center" href="{{ route('users.index') }}">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                                    Views
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">5k</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-users fa-2x text-gray-300"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var load = $('.loader-overlay');
    $(document).ready(function() {
        load.hide();
    });
</script>
@endsection
