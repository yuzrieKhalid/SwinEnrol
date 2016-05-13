@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item active">Home</a>
                <a href="{{ url('/student/manageunits') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/contactcoordinator') }}" class="list-group-item">Contact Coordinator</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Enrolment Status</h1>
                </div>
                <div class="panel-body">
                    @foreach( $students as $student)
                    <h2>{{ $student->givenName }} {{ $student->surname }} <small>{{ $student->studentID }}</small></h2>
                    @endforeach
                    <table class="table">
                        <caption><h3>Enrolled Unit</h3></caption>
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Status</th>
                        </thead>
                        @foreach ($units as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unitName }}</td>
                            @if($unit->status == 'confirmed')
                            <?php echo '<td><span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span></td>'; ?>
                            @elseif($unit->status == 'pending')
                            <?php echo '<td><span class="glyphicon glyphicon glyphicon-alert" aria-hidden="true"></span></td>'; ?>
                            @else
                            <?php echo '<td><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></td>'; ?>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div> <!-- end .panel -->
        </div>
    </div>

</div>
@stop
