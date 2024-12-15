<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}

@include('frontend.common.head')

<body>
    <!-- Page Loader -->
    <div class="loader-overlay">
        <div class="lv-bordered_line sm lv-mid"></div>
    </div>
    <!-- Page header menu -->
    @include('frontend.common.header')

    {{-- ==================== Body Start ==================== --}}
    <main>
        @yield('content')
    </main>
    {{-- ==================== Body End ==================== --}}

    <!-- Page Footer -->
    @include('frontend.common.footer')

    <!-- js -->
    @include('frontend.common.js')

    <!-- Page js -->
    @yield('scripts')
</body>

</html>
