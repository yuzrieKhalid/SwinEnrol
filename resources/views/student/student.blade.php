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
                    <!-- by right, should get $student->get(loginID)->stdName  -->
                    <h2>{{ $students->get(0)->stdName }} <small>{{ $students->get(0)->stdID }}</small></h2>
                    <table class="table">
                        <caption><h3>Enrolled Unit</h3></caption>
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Status</th>
                        </thead>
                        <tr>
                            <td>{{ $units->get(0)->unitCode }}</td>
                            <td>{{ $units->get(0)->unitName }}</td>
                            <td><span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                        </tr>
                        <tr>
                            <td>Code 2</td>
                            <td>Unit Title 2</td>
                            <td><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                        </tr>
                        <tr>
                            <td>Code 3</td>
                            <td>Unit Title 3</td>
                            <td><span class="glyphicon glyphicon glyphicon-alert" aria-hidden="true"></span></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- end .panel -->
        </div>
    </div>

</div>
@stop
