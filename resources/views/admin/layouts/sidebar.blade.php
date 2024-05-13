<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{url('admin')}}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

             

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Departments</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.department_list')}}">Departments</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Programmes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.programmes_list')}}">Programmes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Intakes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.intake_list')}}">Intakes</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Learning Centre</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.center_list')}}">Learning Centre</a></li>
                           
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Programmes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.programmes_list')}}">Programmes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        
                        <span>Applications</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.pending_application_list')}}">Pending</a></li>
                        <li><a href="{{route('admin.accepted_application_list')}}">Accepted</a></li>
                        <li><a href="{{route('admin.rejected_application_list')}}">Rejected</a></li>
                    </ul>
                </li>

                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>