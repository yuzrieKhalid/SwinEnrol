@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item">Enrolment Status</a>
                <a href="{{ url('/student/history') }}" class="list-group-item active">Enrolment History</a>
                <a href="{{ url('/student/manageunits/create') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer/create') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/enrolmentissues') }}" class="list-group-item">Other Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Enrolment History</h1>
                </div>
                <div class="panel-body">

                    <!-- Completed Units Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Unit Code</th>
                                <th>Unit Title</th>
                                <th>Status</th>
                            </thead>

                            @if(empty($enrolled))
                                <tr><td colspan="3">No Units Enrolled Yet</td></tr>
                            @else
                                @foreach ($enrolled as $unit)
                                    <tr>
                                        <td>{{ $unit->unitCode }}</td>
                                        <td>{{ $unit->unit->unitName }}</td>
                                        @if($unit->status == 'confirmed')
                                            <!-- Has already passed -->
                                            <td><span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        @elseif($unit->status == 'pending')
                                            <!-- Waiting to be approved (Phase 2) -->
                                            <td><span class="glyphicon glyphicon glyphicon-alert" aria-hidden="true"></span></td>
                                        @else
                                            <!-- Is currently taken -->
                                            <td><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>

                    <!-- Exempted Units -> only for students who applied for exemption -->
                    <div class="table-responsive">
                        <table class="table">
                            <caption><h3>Advanced Standing (Exemption)</h3></caption>
                            <thead>
                                <th>Unit Code</th>
                                <th>Unit Title</th>
                            </thead>

                            @if(empty($exempted))
                                <tr><td colspan="2">No Units Exempted</td></tr>
                            @else
                                @foreach ($exempted as $unit)
                                    <tr>
                                        <td>{{ $unit->unitCode }}</td>
                                        <td>{{ $unit->unit->unitName }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>

                </div>
            </div> <!-- end .panel -->
        </div>
    </div>

</div>
@stop
