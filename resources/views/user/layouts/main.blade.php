<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard User | ZS CREITIVE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose user & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('user.components.styles')
    @yield('Style')
</head>

<body data-topbar="light" data-layout="horizontal">
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('user.components.header')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('Content')
                @include('user.components.footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('user.components.change_layouts')

        <!-- /Right-bar -->
    </div>
    <!-- JAVASCRIPT -->
    @include('user.components.scripts')
    @yield('Scripts')
</body>

</html>
