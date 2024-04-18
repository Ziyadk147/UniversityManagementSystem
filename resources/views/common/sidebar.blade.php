<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{route('home')}}" >
            <img src="{{asset('theme/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">University System</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @canany(['view-live-announcements' , 'view-historical-announcements'])
            <div class="dropdown text-center">
                <li class="nav-item">
                    <a href="#announcements" class="nav-link" data-bs-toggle="collapse" >
                        <i class="fa-solid fa-bell  text-primary text-sm opacity-10"></i>
                        <span class="nav-link-text mx-3">Announcements</span>
                    </a>
                    <div class="collapse show" id="announcements">
                        <ul class="nav nav-sm flex-column">
                            @can('view-live-announcements')
                                <li class="nav-item">
                                    <a href="{{route('announcement.index')}}" class="nav-link">
                                        <span class="nav-link-test">Live Announcements</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-historical-announcements')
                                <li class="nav-item">
                                    <a href="{{route('announcement.historical')}}" class="nav-link">
                                        <span class="nav-link-text">Announcement Historical</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            </div>
            @endcanany
            @can('sidebar-view-dashboard')

            <li class="nav-item">
                <a class="nav-link active" href="{{route('home')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @endcan
            @can('sidebar-view-users')
            <li class="nav-item">
                <a class="nav-link active" href="{{route('user.index')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-solid fa-user text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            @endcan
            @can('sidebar-view-courses')
            <li class="nav-item">
                <a class="nav-link active" href="{{route('course.index')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-solid fa-book text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Courses</span>
                </a>
            </li>
            @endcan
                        @canany(['sidebar-view-permissions	' , 'sidebar-view-roles'])
            <div class="dropdown text-center">
                <li class="nav-item">
                    <a href="#rolesandpermissions" class="nav-link" data-bs-toggle="collapse" >
                        <i class="fa-solid fa-arrows-to-circle  text-primary text-sm opacity-10"></i>
                        <span class="nav-link-text mx-3">Roles And Permissions</span>
                    </a>
                    <div class="collapse show" id="rolesandpermissions">
                        <ul class="nav nav-sm flex-column">
                            @can('view-permissions')
                            <li class="nav-item">
                                <a href="{{route('permission.index')}}" class="nav-link">
                                    <span class="nav-link-test">Permissions</span>
                                </a>
                            </li>
                            @endcan
                            @can('view-roles')
                            <li class="nav-item">
                                <a href="{{route('role.index')}}" class="nav-link">
                                    <span class="nav-link-text">Roles</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            </div>
                @endcanany
        </ul>
    </div>
    <div class="sidenav-footer hr-blurry">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('user.show' , \Illuminate\Support\Facades\Auth::id())}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-solid fa-user mb-1 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                </a>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-solid fa-sign-out mb-1 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{(__('Logout'))}}</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

</aside>
