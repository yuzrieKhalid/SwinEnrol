@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Reserve 3 space for navigation column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('/super/managestudentadmin') }}" class="list-group-item">Home</a>
                    <a href="{{ url('/super/config') }}" class="list-group-item active">Configuration</a>
                    <a href="{{ url('/super/managestudentadmin') }}" class="list-group-item">Manage Student Administrators</a>
                    <a href="{{ url('/super/managecoordinator') }}" class="list-group-item">Manage Course Coordinators</a>
                    <a href="{{ url('/super/managestudent') }}" class="list-group-item">Manage Students</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Config</h1>
                    </div>
                    <div class="panel-body">
                        <p>{{ $config }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
