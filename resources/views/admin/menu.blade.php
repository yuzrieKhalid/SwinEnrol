<div class="col-md-3">
    <div class="list-group">
        <a href="{{ url('/admin') }}" class="list-group-item @if(Request::is('admin')) active @endif">Home</a>
        <a href="{{ url('/admin/managestudents') }}" class="list-group-item @if(Request::is('admin/managestudents*')) active @endif">Manage Students</a>
        <a href="{{ url('/admin/setenrolmentdates/create') }}" class="list-group-item @if(Request::is('admin/setenrolmentdates*')) active @endif">Set Enrolment Dates</a>
        <a href="{{ url('/admin/resolveissue/create') }}" class="list-group-item @if(Request::is('admin/resolveissue*')) active @endif">Resolve Issues</a>
        <a href="{{ url('/admin/approvedissues/create') }}" class="list-group-item @if(Request::is('admin/approvedissues*')) active @endif">Approved Issues</a>
    </div>
</div>
