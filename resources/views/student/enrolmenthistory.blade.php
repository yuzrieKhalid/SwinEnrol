@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Enrolment History</h1>
                </div>
                <div class="panel-body">

                    <!-- Completed Units Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <caption><h3>Completed Units</h3></caption>
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

                    <!-- Ongoing Units Table -->
                    <!-- <div class="table-responsive">
                        <table class="table">
                            <caption><h3>Current Semester Units</h3></caption>
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
                                            <!Waiting to be approved (Phase 2) -->
                                            <!-- <td><span class="glyphicon glyphicon glyphicon-alert" aria-hidden="true"></span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>  -->

                    <!-- Units Not Yet Taken / Failed Table -->
                    <!-- <div class="table-responsive">
                        <table class="table">
                            <caption><h3>Not Completed Units</h3></caption>
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
                                            <! Is currently taken -->
                                            <!-- <td><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>  -->

                </div>
            </div> <!-- end .panel -->
        </div>
    </div>

</div>
@stop
