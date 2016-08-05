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
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item active">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer/create') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/contactcoordinator') }}" class="list-group-item">Contact Coordinator</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Units</h1>
                </div>

                <div class="panel-body">
                    <!-- Sample Content 1 -->
                    <h2><small>Year 1 Sem 1</small></h2>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisites</th>
                        </thead>
                        @foreach ($units as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unitName }}</td>
                            <td>{{ $unit->prerequisite }}</td>
                        </tr>
                        @endforeach
                    </table>

                    <!-- Sample Content 2 -->
                    <h2><small>Year 1 Winter Sem</small></h2>
                    <p>This semester have yet to have a study planner</p>
                    <!--
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisites</th>
                        </thead>

                        {{--
                            @if(empty($units))
                            <tr>
                                <td colspan="3">This semester have yet to have a study planner</td>
                            </tr>
                            @else

                            @foreach ($units as $unit)
                            <tr>
                                <td>{{ $unit->unitCode }}</td>
                                <td>{{ $unit->unitName }}</td>
                                <td>{{ $unit->prerequisite }}</td>
                            </tr>
                            @endforeach

                            @endif
                        --}}

                    </table>
                    -->
                </div>
            </div> <!-- end .panel -->

        </div>
    </div>
</div>
@stop
