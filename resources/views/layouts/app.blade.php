<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Enrolment System</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('image/swinburne-logo.jpg') }}" />

    @yield('extra_head')
</head>

<body background="{{ asset('image/background.jpg') }}" id="app-layout">
    @if(!Auth::guest())
    <nav class="navbar navbar-default navbar-offcanvas-touch navbar-offcanvas-fade">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="navbar-logo" src="{{ asset('image/logo.png') }}" style="float:left"/>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}">Logout</a></li>

                                @if(Auth::user()->permissionLevel == '3')
                                <a href="{{ url('/admin') }}" class="list-group-item @if(Request::is('admin')) active @endif">Home</a>
                                <a href="{{ url('/admin/managestudents') }}" class="list-group-item @if(Request::is('admin/managestudents*')) active @endif">Manage Students</a>
                                <a href="{{ url('/admin/setenrolmentdates/create') }}" class="list-group-item @if(Request::is('admin/setenrolmentdates*')) active @endif">Set Enrolment Dates</a>
                                <a href="{{ url('/admin/resolveissue/create') }}" class="list-group-item @if(Request::is('admin/resolveissue*')) active @endif">Resolve Leave of Absence</a>
                                <a href="{{ url('/admin/approvedissues/create') }}" class="list-group-item @if(Request::is('admin/approvedissues*')) active @endif">Approved Issues</a>
                                <a href="{{ url('/admin/enrolmentstatus') }}" class="list-group-item @if(Request::is('admin/enrolmentstatus*')) active @endif">Enrolment Status</a>
                                @endif

                                @if(Auth::user()->permissionLevel == '1')
                                <a href="{{ url('/student') }}" class="list-group-item @if(Request::is('student/student')) active @endif">Enrolment Status</a>
                                <a href="{{ url('/student/enrolmenthistory') }}" class="list-group-item @if(Request::is('student/enrolmenthistory*')) active @endif">Enrolment History</a>
                                <a href="{{ url('/student/manageunits/create') }}" class="list-group-item @if(Request::is('student/manageunits*')) active @endif">Manage Units</a>
                                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item @if(Request::is('student/viewstudyplanner*')) active @endif">View Study Planner</a>
                                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item @if(Request::is('student/viewunitlistings*')) active @endif">View Unit Listings</a>
                                <a href="{{ url('/student/enrolmentissues') }}" class="list-group-item @if(Request::is('student/enrolmentissues*')) active @endif">Other Enrolment Issues</a>
                                @endif

                                @if(Auth::user()->permissionLevel == '2')
                                <a href="{{ url('/coordinator') }}" class="list-group-item @if(Request::is('coordinator')) active @endif">Home</a>
                                <a href="{{ url('/coordinator/managestudyplanner/create') }}" class="list-group-item @if(Request::is('coordinator/managestudyplanner*')) active @endif">Manage Study Planner</a>
                                <a href="{{ url('/coordinator/manageunitlisting/create') }}" class="list-group-item @if(Request::is('coordinator/manageunitlisting*')) active @endif">Manage Unit Listings</a>
                                <a href="{{ url('/coordinator/manageunits/create') }}" class="list-group-item @if(Request::is('coordinator/manageunits*')) active @endif">Manage Units</a>
                                <a href="{{ url('/coordinator/enrolmentamendment/create') }}" class="list-group-item @if(Request::is('coordinator/enrolmentamendment*')) active @endif">Resolve Enrolment Amendement</a>
                                <a href="{{ url('/coordinator/resolveenrolmentissues/create') }}" class="list-group-item @if(Request::is('coordinator/resolveenrolmentissues*')) active @endif">Resolve Enrolment Issues</a>

                                @endif

                                @if(Auth::user()->permissionLevel == '4')
                                <a href="{{ url('/super') }}" class="list-group-item @if(Request::is('super')) active @endif">Home</a>
                                <a href="{{ url('/super/config') }}" class="list-group-item @if(Request::is('super/config*')) active @endif">Configuration</a>
                                <a href="{{ url('/super/managecourse/create') }}" class="list-group-item @if(Request::is('super/managecourse/*')) active @endif">Manage Course</a>
                                <a href="{{ url('/super/managestudentadmin') }}" class="list-group-item @if(Request::is('super/managestudentadmin*')) active @endif">Manage Student Administrators</a>
                                <a href="{{ url('/super/managecoordinator') }}" class="list-group-item @if(Request::is('super/managecoordinator*')) active @endif">Manage Course Coordinators</a>
                                <a href="{{ url('/super/managestudent') }}" class="list-group-item @if(Request::is('super/managestudent') || Request::is('super/managestudent/*'))) active @endif">Manage Students</a>
                                <a href="{{ url('/super/manageunittype') }}" class="list-group-item @if(Request::is('super/manageunittype*')) active @endif">Manage Unit Types</a>

                                @endif

                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @endif

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{ asset('resources/assets/js/app.js') }}"></script> -->
    @yield('extra_js')
</body>
</html>
