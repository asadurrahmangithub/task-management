
@include('admin.include.header')

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                @include('admin.include.nav')
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                @include('admin.include.left-sitebar')
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('content')
                    </div>

                </div>
                <!-- End Page-content -->

                @include('admin.include.footer-top')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        @include('admin.include.footer')

    </body>

</html>
