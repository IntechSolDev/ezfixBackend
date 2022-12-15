<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>{{config('app.name')}} || @yield('title')</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/plugins/charts-c3/plugin.css')}}" />

    <link rel="stylesheet" href="{{asset('public/plugins/morrisjs/morris.min.css')}}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('public/css/style.min.css')}}">

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{asset('public/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
</head>

<body class="theme-blush">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('public/images/logo.png')}}" width="48"
                    height="48" alt="Wordly"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>


    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="navbar-brand">
            <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
            <a href="index.html"><img src="{{asset('public/images/logo.png')}}" width="70" alt="Wordly"><span
                    class="m-l-10">{{config('app.name')}}</span></a>
        </div>
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info">
                        <a class="image" href="profile.html"><img src="{{asset('public/images/user.png')}}"
                                alt="User"></a>
                        <div class="detail">
                            <h4>{{Auth::guard('admin')->user()->name}}</h4>
                            <small>{{Auth::guard('admin')->user()->email}}</small>
                        </div>
                    </div>
                </li>
                <li class="active open"><a href="./"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li class="{{ (request()->is('admin/all_users')) ? 'active' : '' }}"><a
                        href="{{url('admin/all_users')}}"><i class="zmdi zmdi-account"></i><span>All User</span></a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-lock"></i><span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{asset('public/bundles/libscripts.bundle.js')}}"></script>
    <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('public/bundles/vendorscripts.bundle.js')}}"></script>
    <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{asset('public/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{asset('public/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
    <script src="{{asset('public/bundles/c3.bundle.js')}}"></script>



    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('public/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/js/pages/tables/jquery-datatable.js')}}"></script>

    <script src="{{asset('public/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('public/js/pages/index.js')}}"></script>
    @yield('page-script')
</body>

</html>