<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}
@include('users.common.head')

<body id="page-top">
    <div class="loader-overlay">
        <div class="lv-squares lv-mid md"></div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('users.common.sidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('users.common.header')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            @include('users.common.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

        <!-- Common Models -->
        @include('users.common.cropper_model')

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Modals-->
    @include('users.common.create.playlist-modal')
    @include('users.common.create.youtube-playlist-modal')
    @include('users.common.player')
    @include('users.common.logout-modal')
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ asset('frontend\vendor\fontawesome-pro\js\all.js') }}" ></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/js/all.min.js" ></script> --}}
    <script src="{{ asset('admin/vendor/cropper/cropper.js') }}"></script>
    <script>
        let loader = new lv();
        loader.initLoaderAll();
    </script>
    @yield('scripts')
    @include('users.common.cropper')
    @include('users.common.create-js')
</body>

</html>
