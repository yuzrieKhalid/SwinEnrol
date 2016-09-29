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
                            <th>Pre-requisite</th>
                            <th>Co-requisite</th>
                            <th>Anti-requisite</th>
                        </thead>
                        {{-- Fetch data for unit listing (long semester) --}}
                        @foreach ($termUnits as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td>@if(isset($requisite[$unit->unitCode]['prerequisite'])) @if(count($requisite[$unit->unitCode]['prerequisite']) > 0) {{ $requisite[$unit->unitCode]['prerequisite'][0] }} @if(count($requisite[$unit->unitCode]['prerequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['prerequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['prerequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                            <td>@if(isset($requisite[$unit->unitCode]['corequisite'])) @if(count($requisite[$unit->unitCode]['corequisite']) > 0) {{ $requisite[$unit->unitCode]['corequisite'][0] }} @if(count($requisite[$unit->unitCode]['corequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['corequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['corequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                            <td>@if(isset($requisite[$unit->unitCode]['antirequisite'])) @if(count($requisite[$unit->unitCode]['antirequisite']) > 0) {{ $requisite[$unit->unitCode]['antirequisite'][0] }} @if(count($requisite[$unit->unitCode]['antirequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['antirequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['antirequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
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
                            <th>Co-requisite</th>
                            <th>Anti-requisite</th>
                        </thead>
                        {{-- Fetch data for unit listing (short semester) --}}
                        @foreach ($termUnitsShort as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td>@if(isset($requisiteShort[$unit->unitCode]['prerequisite'])) {{ $requisiteShort[$unit->unitCode]['prerequisite'] }} @else None @endif</td>
                            <td>@if(isset($requisiteShort[$unit->unitCode]['corequisite'])) {{ $requisiteShort[$unit->unitCode]['corequisite'] }} @else None @endif</td>
                            <td>@if(isset($requisiteShort[$unit->unitCode]['antirequisite'])) {{ $requisiteShort[$unit->unitCode]['antirequisite'] }} @else None @endif</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
