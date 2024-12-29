@extends('users.layouts.app')

@section('title', 'Users List')

@section('css')
@endsection
@section('content')
    {{-- @include('users.users.delete-modal') --}}

@endsection

@section('scripts')
<script>
    var load = $('.loader-overlay');
    $(document).ready(function() {
        load.hide();
    });
</script>
@endsection
