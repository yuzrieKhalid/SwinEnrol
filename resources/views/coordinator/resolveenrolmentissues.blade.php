@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/coordinator') }}" class="list-group-item">Home</a>
                <a href="{{ url('/coordinator/managestudyplanner') }}" class="list-group-item">Manage Study Planner</a>
                <a href="{{ url('/coordinator/manageunitlisting') }}" class="list-group-item">Manage Unit Listings</a>
                <a href="{{ url('/coordinator/manageunits') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/coordinator/resolveenrolmentissues') }}" class="list-group-item active">Resolve Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Resolve Enrolment Issues</h1>
                </div>

                <div class="panel-body">
                    This is the page for Resolving Enrolment Issues
                </div>
            </div>
        </div>
    </div>
</div>
@stop
