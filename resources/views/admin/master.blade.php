@php
session_start();
session_regenerate_id(true);
@endphp

@include('admin.include.header')


{{-- @php
    $id = Auth::user()->id;

    // dd($id);

    // $admin = App\Models\User::where('status','active')->where('role','admin')->where('username','admin')->find($id);
    // $developer = App\Models\User::where('status','active')->where('role','admin')->where('username','developer')->find($id);
    $user = App\Models\User::where([['id', $id],['status', 'active']])
        ->first();
    // dd($user);

    $role = 'user';
    $status = false;
    $username = '';
    if ($user != null) {
        $status = $user->status;
        $role = $user->role;
        $username = $user->username;

    }
@endphp --}}

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
