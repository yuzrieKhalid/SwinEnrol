<div class="col-md-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">
        <a href="{{ url('/admin') }}" class="list-group-item @if(Request::is('admin')) active @endif">Home</a>
        <a href="{{ url('/admin/managestudents') }}" class="list-group-item @if(Request::is('admin/managestudents*')) active @endif">Manage Students</a>
        <a href="{{ url('/admin/setenrolmentdates/create') }}" class="list-group-item @if(Request::is('admin/setenrolmentdates*')) active @endif">Set Enrolment Dates</a>
    </div>
</div>
