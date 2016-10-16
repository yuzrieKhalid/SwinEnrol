@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Study Planner</h1>
                </div>

                <div class="panel-body">
                    <!-- Planner selection form -->
                    <form class="form-inline" method="POST" action="{{ url('student/managestudents.index2') }}">
                        <!-- Year Selection -->
                        <div class="form-group">
                            <select class="form-control" name="year" id="year" onchange="this.form.submit()">
                                @for($n = $currentYear - 5; $n < $currentYear + 1; $n++)
                                    @if($n == $year)
                                        <option value="{{ $n }}" selected>{{ $n }}</option>
                                    @else
                                        <option value="{{ $n }}">{{ $n }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>

                        <!-- Semester Selection -->
                        <div class="form-group">
                            <select class="form-control" name="semester" id="semester" onchange="this.form.submit()">
                                @if($semester == "Semester 1")
                                    <option value="Semester 1" selected>Semester 1</li>
                                @else
                                    <option value="Semester 1">Semester 1</li>
                                @endif

                                @if($semester == "Semester 2")
                                    <option value="Semester 2" selected>Semester 2</li>
                                @else
                                    <option value="Semester 2">Semester 2</li>
                                @endif
                            </select>
                        </div>

                        <!-- Course Selection -->
                        <div class="form-group">
                            <select class="form-control" name="courseCode" id="courseCode" onchange="this.form.submit()">
                                @foreach($courses as $course)
                                    @if($course->courseCode == $courseCode)
                                        <option value="{{ $course->courseCode }}">{{ $course->courseCode }} - {{ $course->courseName }}</li>
                                    @endif
                                @endforeach

                                @foreach($courses as $course)
                                    @if($course->courseCode != $courseCode)
                                        <option value="{{ $course->courseCode }}">{{ $course->courseCode }} - {{ $course->courseName }}</li>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </form>
                    <!-- end Planner selection form -->

                    {{-- generate semester/unit list --}}
                    @if(count($semesterUnits) > 0)
                        @for($n = 0; $n < $size; $n++)
                            @if($count[$n] > 0)
                                <h2>
                                    <small>{{ $term[$n] }}</small>
                                </h2>
                                <table class="table">
                                    <col width="125">
                                    <thead>
                                        <th>Unit Code</th>
                                        <th>Unit Title</th>
                                        <th>Pre-requisite</th>
                                        <th>Co-requisite</th>
                                        <th>Anti-requisite</th>
                                    </thead>
                                    {{-- Fetch data for study planner --}}
                                    @foreach ($semesterUnits as $unit)
                                        @if($n == $unit->enrolmentTerm)
                                            <tr>
                                                <td>{{ $unit->unitCode }}</td>
                                                <td>{{ $unit->unit->unitName }}</td>
                                                <td>@if(isset($requisite[$unit->unitCode]['prerequisite'])) @if(count($requisite[$unit->unitCode]['prerequisite']) > 0) {{ $requisite[$unit->unitCode]['prerequisite'][0] }} @if(count($requisite[$unit->unitCode]['prerequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['prerequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['prerequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                                                <td>@if(isset($requisite[$unit->unitCode]['corequisite'])) @if(count($requisite[$unit->unitCode]['corequisite']) > 0) {{ $requisite[$unit->unitCode]['corequisite'][0] }} @if(count($requisite[$unit->unitCode]['corequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['corequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['corequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                                                <td>@if(isset($requisite[$unit->unitCode]['antirequisite'])) @if(count($requisite[$unit->unitCode]['antirequisite']) > 0) {{ $requisite[$unit->unitCode]['antirequisite'][0] }} @if(count($requisite[$unit->unitCode]['antirequisite']) > 1) @for($i = 1; $i < count($requisite[$unit->unitCode]['antirequisite']); $i++) AND <br/> {{ $requisite[$unit->unitCode]['antirequisite'][$i] }} @endfor @endif @endif @else - @endif</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            @endif
                        @endfor
                    @endif
                </div>
            </div> <!-- end .panel -->

        </div>
    </div>
</div>
@stop
