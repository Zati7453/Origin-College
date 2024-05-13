@php
    $admin = \App\Models\User::where('id',Auth::user()->id)->where('role','admin')->first();
    $notifications = \App\Helpers\NotificationHelper::getAdminNotifications(20);
@endphp
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('admin')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('front_asset/images/logooic.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('front_asset/images/logooic.png')}}" alt="" height="17">
                    </span>
                </a>

                <a href="{{url('admin')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('front_asset/images/logooic.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('front_asset/images/logooic.png')}}" alt="" height="18">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            {{-- <div class="d-none d-sm-block">
                <div class="dropdown dropdown-topbar pt-3 mt-1 d-inline-block">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create <i class="mdi mdi-chevron-down"></i>
                        </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="d-flex">

             <!-- App Search-->
             {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="fa fa-search"></span>
                </div>
            </form> --}}

            {{-- <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">
            
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

            {{-- <div class="dropdown d-none d-md-block ml-2">
                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="mr-2" src="assets/images/flags/us_flag.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="assets/images/flags/germany_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> German </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="assets/images/flags/italy_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Italian </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="assets/images/flags/french_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> French </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="assets/images/flags/spain_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Spanish </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="assets/images/flags/russia_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Russian </span>
                    </a>
                </div>
            </div> --}}

            {{-- <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </button>
            </div> --}}

            <div class="dropdown d-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-bell"></i>
                    @if($notifications['count'] > 0)
                    <span class="badge badge-pill badge-danger noti-icon-badge" style="position: absolute;
                    top: 8px;left:24px">
                        {{$notifications['count']}}
                    </span>
                @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0"> Notifications ({{$notifications['count']}}) </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 300px">
                        @if(isset($notifications['data']))
                        @foreach($notifications['data'] as $key => $notification)
                        <a href="{{$notification['route']}}" class="text-reset notification-item {{$notification['is_read'] == 1 ? '' : 'active'}}">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title border-success rounded-circle ">
                                        <i class="mdi mdi-file"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">{{$notification['heading']}}</h6>
                                    <div class="text-muted">
                                        <p class="mb-1"> {{$notification['detail']}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                       
                    </div>
                    {{-- <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            View all
                        </a>
                    </div> --}}
                </div>
            </div>
    

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class=" btn btn-primary">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/user-4.jpg')}}"
                        alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item admin" href="#"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle mr-1"></i> Profile</a>
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('admin.logout_process')}}"><i class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i> Logout</a>
                </div>
            </div>

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-spin mdi-settings"></i>
                </button>
            </div> --}}
    
        </div>
    </div>
</header>


{{-- Modal for Admin Profile --}}

<div class="modal fade bs-example-modal-center admin_modal" tabindex="-1" role="dialog"
aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">Admin Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.update_admin') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                   <div class="row">
                    <input type="hidden" name="id" value="{{$admin->id}}">
                       <div class="col-lg-12">
                           <label for="">Username</label>
                           <input type="text" class="form-control" name="name" value="{{$admin->name}}">
                       </div>
                       <div class="col-lg-12 mt-3">
                           <label for="">Email</label>
                           <input type="email" class="form-control" name="email" value="{{$admin->email}}">
                       </div>
                       <div class="col-lg-12 mt-3">
                           <label for="">Phone</label>
                           <input type="text" class="form-control" name="phone" value="{{$admin->phone_no}}">
                       </div>
                       <div class="col-lg-12 mt-3">
                           <label for="">Password</label>
                           <input type="text" class="form-control" name="password" >
                       </div>
                     
                       <div class="col-lg-12 mt-3">
                           <button class="btn btn-dark">Update</button>
                       </div>
                   </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->