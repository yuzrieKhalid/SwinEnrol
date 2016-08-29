@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <!-- Reserve 3 space for navigation column -->
            @include('coordinator.menu')

            <div class="col-md-9">
                <!-- To be fixed -->
                <p class="pull-left visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
                </p>
                
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h1>Study Planner</h1>
                    </div>

                    <div class="panel-body">
                        <a class="pull-right btn btn-default" data-toggle="modal" data-target="#addUnit" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <!-- Planner selection form -->
                        <form class="form-inline" method="POST" action="{{ route('coordinator.managestudyplanner.create') }}">
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
                                            <th colspan="2">Unit Title</th>
                                        </thead>
                                        {{-- Fetch data for study planner --}}
                                        @foreach ($termUnits as $unit)
                                            @if($n == $unit->enrolmentTerm)
                                                <tr>
                                                    <td>{{ $unit->unitCode }}</td>
                                                    <td>{{ $unit->unit->unitName }}</td>
                                                    <td><a id="submit" data-unit-code="{{ $unit->unitCode }}" data-enrolment-term="{{ $n }}" data-method="DELETE" data-url="{{ route('coordinator.managestudyplanner.destroy', $unit->unitCode) }}" class="submit pull-right" href="" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
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

            <!-- Add Unit Modal-->
            <div class="modal fade" id="addUnit" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Create New Unit</h2>
                        </div>
                        <div class="modal-body">
                            <!-- Form -->
                            <form class="form-horizontal">
                                <!-- Unit selection -->
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="unitCode">Unit:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="unitCode" id="unitCode">
                                            @foreach($units as $unit)
                                            <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} - {{ $unit->unitName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Semester selection -->
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="enrolmentTerm">Semester:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="enrolmentTerm" id="enrolmentTerm">
                                            @for($n = 0; $n < $size; $n++)
                                                <option value="{{ $n }}">{{ $term[$n] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="submit btn btn-default" id="submit" data-method="POST" data-url="{{ route('coordinator.managestudyplanner.store') }}">Create</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Add Unit Modal -->
        </div>
    </div>
@stop

@section('extra_js')
<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        if(method == "POST")
        {
            data = {
                _token: getToken(),
                unitCode: $('select[name=unitCode]').val(),
                enrolmentTerm: $('select[name=enrolmentTerm]').val(),
                year: $('#year').val(),
                term: $('#term').val(),
                courseCode: $('#courseCode').val()
            }
        }
        if(method == "DELETE")
        {
            data = {
                _token: getToken(),
                unitCode: $(this).data('unitCode'),
                enrolmentTerm: $(this).data('enrolmentTerm'),
                year: $('#year').val(),
                term: $('#term').val(),
                courseCode: $('#courseCode').val()
            }
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            window.location.reload()
        })
    })
    // data.forEach is not a function
    // getUnits()
})()
</script>
@stop
