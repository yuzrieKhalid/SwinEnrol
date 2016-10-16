<div class="col-md-3">
    <div class="list-group">
        <a href="{{ url('/student') }}" class="list-group-item @if(Request::is('student/student')) active @endif">Enrolment Status</a>
        <a href="{{ url('/student/enrolmenthistory') }}" class="list-group-item @if(Request::is('student/enrolmenthistory*')) active @endif">Enrolment History</a>
        <a href="{{ url('/student/manageunits/create') }}" class="list-group-item @if(Request::is('student/manageunits*')) active @endif">Manage Units</a>
        <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item @if(Request::is('student/viewstudyplanner*')) active @endif">View Study Planner</a>
        <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item @if(Request::is('student/viewunitlistings*')) active @endif">View Unit Listings</a>
        <a href="{{ url('/student/enrolmentissues') }}" class="list-group-item @if(Request::is('student/enrolmentissues*')) active @endif">Other Enrolment Issues</a>
    </div>
</div>
