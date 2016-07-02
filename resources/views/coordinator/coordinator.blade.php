@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/coordinator') }}" class="list-group-item active">Home</a>
                <a href="{{ url('/coordinator/managestudyplanner/create') }}" class="list-group-item">Manage Study Planner</a>
                <a href="{{ url('/coordinator/manageunitlisting/create') }}" class="list-group-item">Manage Unit Listings</a>
                <a href="{{ url('/coordinator/manageunits/create') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/coordinator/resolveenrolmentissues/create') }}" class="list-group-item">Resolve Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Home</h1>
                </div>

                <div class="panel-body">
                    Coordinator Homepage
                </div> <!-- end .panel-body -->
            </div> <!-- end .panel -->

        </div>
    </div>
</div>
@stop
