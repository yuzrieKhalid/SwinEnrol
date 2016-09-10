@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item">Enrolment Status</a>
                <a href="{{ url('/student/enrolmenthistory') }}" class="list-group-item">Enrolment History</a>
                <a href="{{ url('/student/manageunits/create') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item active">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer/create') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/enrolmentissues') }}" class="list-group-item">Other Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Unit Listings</h1>
                </div>

                <div class="panel-body">
                    <h2>
                        <small>Enrolment Units</small>
                    </h2>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisite</th>
                        </thead>
                        {{-- Fetch data for unit listing (long semester) --}}
                        @foreach ($termUnits as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td>{{ $unit['unit']->prerequisite }}</td>
                        </tr>
                        @endforeach
                    </table>

                    <h2>
                        <small>Short Term Units</small>
                    </h2>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisite</th>
                        </thead>
                        {{-- Fetch data for unit listing (short semester) --}}
                        @foreach ($termUnitsShort as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td>{{ $unit['unit']->prerequisite }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
