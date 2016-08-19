@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/admin') }}" class="list-group-item active">Home</a>
                <a href="{{ url('/admin/managestudents') }}" class="list-group-item">Manage Students</a>
                <a href="{{ url('/admin/setenrolmentdates/create') }}" class="list-group-item">Set Enrolment Dates</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Home</h1>
                </div>

                <div class="panel-body">
                    <!-- Shows which enrolment is already opened -->
                    Student Admin Homepage. This page will display which enrolment are opened and show the time remaining until the enrolment is closed. We will use a time counter for this.
                </div>
            </div>
        </div>
    </div>
</div>
@stop
