@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Study Planner</h1>
                </div>

                <div class="panel-body">
                    <!-- Planner selection form -->
                    <form class="form-inline" method="POST" action="{{ url('student/viewstudyplanner') }}">
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
                            <select class="form-control" name="term" id="term" onchange="this.form.submit()">
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
                    @if(count($termUnits) > 0)
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
                                        <th>
                                          Co-requisite
                                        </th>
                                        <th>
                                          Anti-Requisite
                                        </th>
                                    </thead>
                                    {{-- Fetch data for study planner --}}
                                    @foreach ($termUnits as $unit)
                                        @if($n == $unit->enrolmentTerm)
                                            <tr>
                                                <td>{{ $unit->unitCode }}</td>
                                                <td>{{ $unit->unit->unitName }}</td>
                                                <td>{{ $unit['unit']->prerequisite }}</td>
                                                <td>{{ $unit['unit']->corequisite }}</td>
                                                <td>{{ $unit['unit']->antirequisite }}</td>
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
