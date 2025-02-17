<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-left">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets/images/logo_zs.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo_zs.png')}}" alt="" height="70">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('assets/images/logo_zs.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo_zs.png')}}" alt="" height="19">
                        </span>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 font-size-24 d-lg-none header-item waves-effect waves-light"
                    data-toggle="collapse" data-target="#topnav-menu-content">
                    <i class="mdi mdi-menu"></i>
                </button>
            </div>

            <div class="float-right">

                <!-- App Search-->
                {{-- <form class="app-search d-none d-lg-inline-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="fa fa-search"></span>
                    </div>
                </form> --}}

                {{-- <div class="dropdown d-none d-lg-inline-block ml-2">
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="mr-2" src="assets/images/flags/us_flag.jpg" alt="Header Language"
                            height="16"> English <span class="mdi mdi-chevron-down"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/germany_flag.jpg" alt="user-image" class="mr-1"
                                height="12"> <span class="align-middle"> German </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/italy_flag.jpg" alt="user-image" class="mr-1"
                                height="12"> <span class="align-middle"> Italian </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/french_flag.jpg" alt="user-image" class="mr-1"
                                height="12"> <span class="align-middle"> French </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/spain_flag.jpg" alt="user-image" class="mr-1"
                                height="12"> <span class="align-middle"> Spanish </span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/russia_flag.jpg" alt="user-image" class="mr-1"
                                height="12"> <span class="align-middle"> Russian </span>
                        </a>
                    </div>
                </div> --}}

                {{-- <div class="dropdown d-none d-lg-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen font-size-24"></i>
                    </button>
                </div> --}}

                {{-- <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}



                {{-- <div class="dropdown d-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger badge-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-0"> Notifications (258) </h5>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title border-success rounded-circle ">
                                            <i class="mdi mdi-cart-outline"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Your order is placed</h6>
                                        <div class="text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title border-warning rounded-circle ">
                                            <i class="mdi mdi-message"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">New Message received</h6>
                                        <div class="text-muted">
                                            <p class="mb-1">You have 87 unread messages</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title border-info rounded-circle ">
                                            <i class="mdi mdi-glass-cocktail"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                        <div class="text-muted">
                                            <p class="mb-1">It is a long established fact that a reader will</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title border-primary rounded-circle ">
                                            <i class="mdi mdi-cart-outline"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Your order is placed</h6>
                                        <div class="text-muted">
                                            <p class="mb-1">Dummy text of the printing and typesetting industry.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title border-warning rounded-circle ">
                                            <i class="mdi mdi-message"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">New Message received</h6>
                                        <div class="text-muted">
                                            <p class="mb-1">You have 87 unread messages</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top">
                            <a class="btn btn-sm btn-link font-size-14 btn-block text-center"
                                href="javascript:void(0)">
                                View all
                            </a>
                        </div>
                    </div>
                </div> --}}

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="assets/images/users/user-4.jpg"
                            alt="Header Avatar">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i
                                class="mdi mdi-account-circle font-size-17 text-muted align-middle mr-1"></i>
                            Profile</a>
                        <a class="dropdown-item" href="#"><i
                                class="mdi mdi-wallet font-size-17 text-muted align-middle mr-1"></i> My
                            Wallet</a>
                        <a class="dropdown-item d-block" href="#"><span
                                class="badge badge-success float-right">11</span><i
                                class="mdi mdi-settings font-size-17 text-muted align-middle mr-1"></i>
                            Settings</a>
                        <a class="dropdown-item" href="#"><i
                                class="mdi mdi-lock-open-outline font-size-17 text-muted align-middle mr-1"></i>
                            Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('member.logout_process')}}"><i
                                class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i>
                            Logout</a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-spin mdi-settings"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="top-navigation">
        <div class="page-title-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <h4>Dashboard</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Welcome</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="state-information d-none d-sm-block">
                            <div class="state-graph float-right">
                                <input type="button" value="Copy Referal Link" onclick="copyToClipboard(this)"
                                class="btn btn-sm btn-primary">
                            <div id="right_copied"></div>
                            </div>
                            {{-- <div class="state-graph">
                                <div id="header-chart-2"></div>
                                <div class="info">Item Sold 1230</div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>

        <div class="container-fluid">
            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">
                                    <i class="ti-dashboard"></i>Dashboard
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-email"></i>My Team
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                    <a href="email-inbox.html" class="dropdown-item">Inbox</a>
                                    <a href="email-read.html" class="dropdown-item">Email Read</a>
                                    <a href="email-compose.html" class="dropdown-item">Email Compose</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-support"></i>My Bounce
                                </a>

                                <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                    aria-labelledby="topnav-components">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="ui-alerts.html" class="dropdown-item">Alerts</a>
                                                <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                                <a href="ui-badge.html" class="dropdown-item">Badge</a>
                                                <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                                <a href="ui-carousel.html" class="dropdown-item">Carousel</a>
                                                <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                                <a href="ui-images.html" class="dropdown-item">Images</a>
                                                <a href="ui-lightbox.html" class="dropdown-item">Lightbox</a>
                                                <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                                <a href="ui-pagination.html"
                                                    class="dropdown-item">Pagination</a>
                                                <a href="ui-popover-tooltips.html" class="dropdown-item">Popover
                                                    &amp; Tooltips</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="ui-progressbars.html" class="dropdown-item">Progress
                                                    Bars</a>
                                                <a href="ui-sweet-alert.html"
                                                    class="dropdown-item">Sweet-Alert</a>
                                                <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs
                                                    &amp; Accordions</a>
                                                <a href="ui-typography.html"
                                                    class="dropdown-item">Typography</a>
                                                <a href="ui-video.html" class="dropdown-item">Video</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-forms"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-receipt"></i>Withdraw History
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-forms">
                                    <a href="form-elements.html" class="dropdown-item">Form Elements</a>
                                    <a href="form-validation.html" class="dropdown-item">Form Validation</a>
                                    <a href="form-advanced.html" class="dropdown-item">Form Advanced</a>
                                    <a href="form-editors.html" class="dropdown-item">Form Editors</a>
                                    <a href="form-uploads.html" class="dropdown-item">Form File Upload</a>
                                    <a href="form-xeditable.html" class="dropdown-item">Form Xeditable</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-menu-alt"></i>Ads
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-more">
                                    <a href="calendar.html" class="dropdown-item">Calendar</a>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-icons" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Icons <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                            <a href="icons-material.html" class="dropdown-item">Material
                                                Design</a>
                                            <a href="icons-ion.html" class="dropdown-item">Ion Icons</a>
                                            <a href="icons-fontawesome.html" class="dropdown-item">Font
                                                Awesome</a>
                                            <a href="icons-themify.html" class="dropdown-item">Themify Icons</a>
                                            <a href="icons-dripicons.html" class="dropdown-item">Dripicons</a>
                                            <a href="icons-typicons.html" class="dropdown-item">Typicons
                                                Icons</a>
                                        </div>
                                    </div>


                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-tables" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Tables <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-tables">
                                            <a href="tables-basic.html" class="dropdown-item">Basic Tables</a>
                                            <a href="tables-datatable.html" class="dropdown-item">Data Table</a>
                                            <a href="tables-responsive.html" class="dropdown-item">Responsive
                                                Table</a>
                                            <a href="tables-editable.html" class="dropdown-item">Editable
                                                Table</a>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-maps" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Maps <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-maps">
                                            <a href="maps-google.html" class="dropdown-item"> Google Map</a>
                                            <a href="maps-vector.html" class="dropdown-item"> Vector Map</a>
                                        </div>
                                    </div>


                                    <a href="ui-rangeslider.html" class="dropdown-item">Range Slider</a>
                                    <a href="ui-session-timeout.html" class="dropdown-item">Session Timeout</a>


                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-pie-chart"></i>My Account
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-charts">
                                    <a href="charts-morris.html" class="dropdown-item">Morris Chart</a>
                                    <a href="charts-chartist.html" class="dropdown-item">Chartist Chart</a>
                                    <a href="charts-chartjs.html" class="dropdown-item">Chartjs Chart</a>
                                    <a href="charts-flot.html" class="dropdown-item">Flot Chart</a>
                                    <a href="charts-c3.html" class="dropdown-item">C3 Chart</a>
                                    <a href="charts-other.html" class="dropdown-item">Jquery Knob Chart</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-support"></i>My Profile
                                </a>

                                <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-lg dropdown-menu-right"
                                    aria-labelledby="topnav-pages">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <a href="pages-timeline.html" class="dropdown-item">Timeline</a>
                                                <a href="pages-invoice.html" class="dropdown-item">Invoice</a>
                                                <a href="pages-directory.html"
                                                    class="dropdown-item">Directory</a>
                                                <a href="pages-login.html" class="dropdown-item">Login</a>
                                                <a href="pages-register.html" class="dropdown-item">Register</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <a href="pages-recoverpw.html" class="dropdown-item">Recover
                                                    Password</a>
                                                <a href="pages-lock-screen.html" class="dropdown-item">Lock
                                                    Screen</a>
                                                <a href="pages-blank.html" class="dropdown-item">Blank Page</a>
                                                <a href="pages-404.html" class="dropdown-item">Error 404</a>
                                                <a href="pages-500.html" class="dropdown-item">Error 500</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>

                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layouts"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-tablet"></i>Layouts
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layouts">
                                    <a href="layouts-vertical.html" class="dropdown-item">Vertical</a>
                                    <a href="layouts-preloader.html" class="dropdown-item">Preloader</a>
                                    <a href="layouts-boxed.html" class="dropdown-item">Boxed</a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
@section('Scripts')
<script>
    function copyToClipboard(ds, str) {
        var left =
            "{{ route('register',\Illuminate\Support\Facades\Auth::user()->name) }}";
        var el = document.createElement('textarea');
        el.value = left;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        $(ds).val(' Link Copied..!!');

        setTimeout(function () {
            $(ds).val('Copy ' + 'Referal' + ' Link');
        }, 2000);
    }
</script>
@endsection