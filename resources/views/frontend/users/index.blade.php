@extends('frontend.layouts.app')

@section('title', 'Users List')

@section('css')
<link href="{{asset('user/css/sb-admin-2.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid p-0">
    @include('frontend.users.sidebar')
    <div id="content">
        @include('admin.common.header')
        <!-- Begin Page Content -->
        {{-- @yield('content') --}}
        <!-- /.container-fluid -->

    </div>
</div>

    {{-- @include('frontend.users.delete-modal') --}}

@endsection

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        var load = $('.loader-overlay');
        $(document).ready(function() {
            load.hide();
        });
    </script>
@endsection
