<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('Title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @include('admin.components.styles')
    @yield('Styles')
    <style>
    .page-loader {
        display: none;
        position: absolute;
        z-index: 99999;
        background-color: #fff;
        width: 100%;
        height: 100%;
        opacity: .7;
    }

    .page-loader img {
        position: fixed;
        bottom: 37%;
        left: 50%;
        -moz-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        -o-transform: translate(-50%, 0);
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }
    </style>
</head>

<body data-sidebar="dark">
    @include('components.loader')
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.components.header')
        @include('admin.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('Content')
               
            </div>
            <!-- end main content-->
            @include('admin.components.footer')
        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('admin.components.change_layouts')

        <!-- /Right-bar -->
    </div>
    <!-- JAVASCRIPT -->
    @include('admin.components.scripts')
    @yield('Scripts')
    <script>
        $(document).ready(function () {
      $('.admin').on('click', function () {
          $('.admin_modal').modal('show');
      });
  });
  </script>
</body>
</html>
