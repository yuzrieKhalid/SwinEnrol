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
                    <img class="navbar-logo" title="Swinburne Student Enrolment System" src="{{ asset('image/logo.png') }}" style="float:left"/>
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
                            <a href="#" class="dropdown-toggle" title="Menu" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>


                            <ul class="dropdown-menu" role="menu">
                              <li><a title="Log Out" href="{{ url('/logout') }}">Log Out</a></li>
                              <li class="divider"></li>
                                @if(Auth::user()->permissionLevel == '3')
                                <li class="dropdown-header">MENU</li>
                                <li><a href="{{ url('/admin') }}">Home</a></li>
                                <li><a href="{{ url('/admin/managestudents') }}">Manage Students</a></li>
                                <li><a href="{{ url('/admin/setenrolmentdates/create') }}">Set Enrolment Dates</a></li>
                                <li><a href="{{ url('/admin/resolveissue/create') }}">Resolve Leave of Absence</a></li>
                                <li><a href="{{ url('/admin/approvedissues/create') }}">Approved Issues</a></li>
                                <li><a href="{{ url('/admin/enrolmentstatus/create') }}">Enrolment Status</a></li>
                                @endif

                                @if(Auth::user()->permissionLevel == '1')
                                <li class="dropdown-header">MENU</li>
                                <li><a href="{{ url('/student') }}">Home</a></li>
                                <li><a href="{{ url('/student/manageunits/create') }}">Manage Units</a></li>
                                <li><a href="{{ url('/student/viewstudyplanner') }}">View Study Planner</a></li>
                                <li><a href="{{ url('/student/viewunitlistings') }}">View Unit Listings</a></li>
                                <li><a href="{{ url('/student/enrolmentissues') }}">Other Enrolment Issues</a></li>
                                @endif

                                @if(Auth::user()->permissionLevel == '2')
                                <li class="dropdown-header">MENU</li>
                                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                                <li><a href="{{ url('/coordinator/managestudyplanner/create') }}">Manage Study Planner</a></li>
                                <li><a href="{{ url('/coordinator/manageunitlisting/create') }}">Manage Unit Listings</a></li>
                                <li><a href="{{ url('/coordinator/manageunits') }}">Manage Units</a></li>
                                <li><a href="{{ url('/coordinator/enrolmentamendment/create') }}">Resolve Enrolment Amendement</a></li>
                                <li><a href="{{ url('/coordinator/resolveenrolmentissues/create') }}">Resolve Enrolment Issues</a></li>
                                <li><a href="{{ url('/coordinator/graduationrequirements/create') }}">Graduation Requirements</a></li>
                                @endif

                                @if(Auth::user()->permissionLevel == '4')
                                <li class="dropdown-header">MENU</li>
                                <li><a href="{{ url('/super') }}">Home</a></li>
                                <li><a href="{{ url('/super/config') }}">Configuration</a>
                                <li><a href="{{ url('/super/managecourse/create') }}">Manage Course</a></li>
                                <li><a href="{{ url('/super/managestudentadmin') }}">Manage Student Administrators</a></li>
                                <li><a href="{{ url('/super/managecoordinator') }}">Manage Course Coordinators</a></li>
                                <li><a href="{{ url('/super/managestudent') }}">Manage Students</a></li>
                                <li><a href="{{ url('/super/manageunittype') }}">Manage Unit Types</a></li>
                                @endif

                                @if(Auth::user()->permissionLevel == '5')
                                <li class="dropdown-header">MENU</li>
                                <li><a href="{{ url('/adminofficer') }}">Home</a></li>
                                <li><a href="{{ url('/adminofficer/manageunitinfo') }}">Manage Unit Info</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul> <!-- end .navbar -->
            </div> <!-- end. collapse-->
        </div> <!-- end .container -->
    </nav>
    @endif

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('extra_js')
</body>
</html>
