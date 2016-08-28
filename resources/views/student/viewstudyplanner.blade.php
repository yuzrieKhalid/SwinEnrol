@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Units<small id="sariful">Sariful here</small></h1>
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
