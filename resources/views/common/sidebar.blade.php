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
            <li class="nav-item">
                <a class="nav-link active" href="{{route('home')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <div class="dropdown text-center">
                <li class="nav-item">
                    <a href="#rolesandpermissions" class="nav-link" data-bs-toggle="collapse" aria-expanded="true" >
                        <i class="fa-solid fa-arrows-to-circle"></i>
                        <span class="sidenav- mx-3">Roles And Permissions</span>
                    </a>
                    <div class="collapse show" id="rolesandpermissions">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <span class="nav-link-test">Permissions</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <span class="nav-link-text">Roles</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </div>
{{--            <div class="dropdown">--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" data-bs-toggle="collapse" aria-expanded="true" href="#warnWhiteList">--}}
{{--                        <i class="fa-solid fa-arrows-to-circle"></i>--}}
{{--                        <span class="sidenav-normal dropdown-toggle">WhiteList</span>--}}
{{--                    </a>--}}
{{--                    <div class="collapse show" id="warnWhiteList" style="">--}}
{{--                        <ul class="nav nav-sm flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="https://dashboard.x-alert.network/x-warning/white-listing-live">--}}
{{--                                    <span class="nav-link-text">Live</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="https://dashboard.x-alert.network/x-warning/white-listing-historical">--}}
{{--                                    <span class="nav-link-text">Historical</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </div>--}}
        </ul>
    </div>
    <div class="sidenav-footer hr-blurry">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="">
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
