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
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Status</th>
                        </thead>
                        <tr>
                            <td>Code 1</td>
                            <td>Unit Title 1</td>
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
