<!DOCTYPE html>
    <html lang="en">

    <head>
        <title>mini project</title>
        @include('layouts.head')
    </head>
    
    <body id="body" class="navbar-fixed sidebar-fixed">
        <script>
            NProgress.configure({ showSpinner: false });
            NProgress.start();
        </script>

        <!-- Page Wrapper -->
        <div class="wrapper">

            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div class="page-wrapper">

                <!-- Main Content -->

                    <!-- Topbar -->
                    @include('layouts.topbar')
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="content-wrapper">
                        <div class="content">

                        @yield('content')
                        
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                <!-- End of Main Content -->

                <!-- Footer -->
                @include('layouts.footer')
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        @include('layouts.script')

    </body>

</html>
