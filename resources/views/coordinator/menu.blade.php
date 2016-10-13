<div class="col-md-3">
    <div class = "list-group">
        <a href="{{ url('/coordinator') }}" class="list-group-item @if(Request::is('coordinator')) active @endif">Home</a>
        <a href="{{ url('/coordinator/managestudyplanner/create') }}" class="list-group-item @if(Request::is('coordinator/managestudyplanner*')) active @endif">Manage Study Planner</a>
        <a href="{{ url('/coordinator/manageunitlisting/create') }}" class="list-group-item @if(Request::is('coordinator/manageunitlisting*')) active @endif">Manage Unit Listings</a>
        <a href="{{ url('/coordinator/manageunits/create') }}" class="list-group-item @if(Request::is('coordinator/manageunits*')) active @endif">Manage Units</a>
        <a href="{{ url('/coordinator/enrolmentamendment/create') }}" class="list-group-item @if(Request::is('coordinator/enrolmentamendment*')) active @endif">Resolve Enrolment Amendement</a>
        <a href="{{ url('/coordinator/resolveenrolmentissues/create') }}" class="list-group-item @if(Request::is('coordinator/resolveenrolmentissues*')) active @endif">Resolve Enrolment Issues</a>
        <a href="{{ url('/coordinator/graduationrequirements/create') }}" class="list-group-item @if(Request::is('coordinator/graduationrequirements*')) active @endif">Graduation Requirement</a>
    </div>
</div>

<!-- <script>
// $("#sidebarLeft").trigger("offcanvas.toggle");

</script> -->
