@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item">Home</a>
                <a href="{{ url('/student/manageunits') }}" class="list-group-item active">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/contactcoordinator') }}" class="list-group-item">Contact Coordinator</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Units
                        <span class="pull-right">
                            <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span></a>
                            <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        </span>
                    </h1>
                </div>

                <div class="panel-body">
                    <div class="btn-group btn-group-justified" role="group" aria-label="..." style="margin-bottom:10px;"><!-- Style to add space below buttons -->
                        <a class="btn btn-default" href="#" role="button">Add</a>
                        <a class="btn btn-default" href="#" role="button">Drop</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th colspan="2">Unit Title</th>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Unit Title 1</td>
                            <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Unit Title 2</td>
                            <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Unit Title 3</td>
                            <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- end .panel -->

        </div>
    </div>
</div>
@stop
