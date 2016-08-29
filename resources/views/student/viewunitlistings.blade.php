@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

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
                        </thead>
                        {{-- Fetch data for unit listing (long semester) --}}
                        @foreach ($termUnits as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
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
                        </thead>
                        {{-- Fetch data for unit listing (short semester) --}}
                        @foreach ($termUnitsShort as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
