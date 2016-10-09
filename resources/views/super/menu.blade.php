<div class="col-md-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">
        <a href="{{ url('/super') }}" class="list-group-item @if(Request::is('super')) active @endif">Home</a>
        <a href="{{ url('/super/config') }}" class="list-group-item @if(Request::is('super/config*')) active @endif">Configuration</a>
        <a href="{{ url('/super/managestudentadmin') }}" class="list-group-item @if(Request::is('super/managestudentadmin*')) active @endif">Manage Student Administrators</a>
        <a href="{{ url('/super/managecoordinator') }}" class="list-group-item @if(Request::is('super/managecoordinator*')) active @endif">Manage Course Coordinators</a>
        <a href="{{ url('/super/managestudent') }}" class="list-group-item @if(Request::is('super/managestudent') || Request::is('super/managestudent/*'))) active @endif">Manage Students</a>
        <a href="{{ url('/super/manageunittype') }}" class="list-group-item @if(Request::is('super/manageunittype*')) active @endif">Manage Unit Types</a>
    </div>
</div>
