@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Unit Listings</h3>
                </div>

                <div class="panel-body">
                    <h2><small>{{ $semester }} {{ $year }}</small></h2>

                    {{-- Search Long Semester Units Only --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-criteria-long" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="search-long">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div> <!-- end .input-group -->
                        </div> <!-- end .col -->
                    </div> <!-- end .row -->

                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisite</th>
                            <th>Co-requisite</th>
                            <th>Anti-requisite</th>
                        </thead>
                        {{-- Fetch data for unit listing (long semester) --}}
                        @foreach ($semesterUnits as $unit)
                        <tr class="longsemesterunit">
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td>@if(isset($requisite[$unit->unitCode]['prerequisite'])) @if(count($requisite[$unit->unitCode]['prerequisite']) > 0) {{ $requisite[$unit->unitCode]['prerequisite'][0] }} @if(count($requisite[$unit->unitCode]['prerequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['prerequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['prerequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                            <td>@if(isset($requisite[$unit->unitCode]['corequisite'])) @if(count($requisite[$unit->unitCode]['corequisite']) > 0) {{ $requisite[$unit->unitCode]['corequisite'][0] }} @if(count($requisite[$unit->unitCode]['corequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['corequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['corequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                            <td>@if(isset($requisite[$unit->unitCode]['antirequisite'])) @if(count($requisite[$unit->unitCode]['antirequisite']) > 0) {{ $requisite[$unit->unitCode]['antirequisite'][0] }} @if(count($requisite[$unit->unitCode]['antirequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['antirequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['antirequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                        </tr>
                        @endforeach
                    </table>

                    @if($semester == 'Semester 1')
                        <h2><small>Summer Term {{ $year+1 }}</small></h2>
                    @else
                        <h2><small>Winter Term {{ $year }}</small></h2>
                    @endif

                    {{-- Search Short Semester Units Only --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-criteria-short" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="search-short">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div> <!-- end .input-group -->
                        </div> <!-- end .col -->
                    </div> <!-- end .row -->

                    {{-- Short Semester Table --}}
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisite</th>
                            <th>Co-requisite</th>
                            <th>Anti-requisite</th>
                        </thead>
                        {{-- Fetch data for unit listing (short semester) --}}
                        @foreach ($semesterUnitsShort as $unit)
                        <tr class="shortsemesterunit">
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

@section('extra_js')
<script type="text/javascript">
(function() {
    // Search Long Semester Units
    $("#search-criteria-long").keyup(function() {
        // when something is typed in the box, it will hide all
        let searchvalue = $(this).val().toLowerCase()
        $('.longsemesterunit').hide()

        // if the text from the tr matches any part of the search value (indexOf), show
        $('.longsemesterunit').each(function() {
            let text = $(this).text().toLowerCase()
            if (text.indexOf(searchvalue) != -1)
                $(this).show()
        })
    })
    
    // Search Short Semester Units
    $("#search-criteria-short").keyup(function() {
        // when something is typed in the box, it will hide all
        let searchvalue = $(this).val().toLowerCase()
        $('.shortsemesterunit').hide()

        // if the text from the tr matches any part of the search value (indexOf), show
        $('.shortsemesterunit').each(function() {
            let text = $(this).text().toLowerCase()
            if (text.indexOf(searchvalue) != -1)
                $(this).show()
        })
    })
}) ()
</script>
@endsection
