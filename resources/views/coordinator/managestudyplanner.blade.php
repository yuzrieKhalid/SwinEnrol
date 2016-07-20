@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Reserve 3 space for navigation column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('/coordinator') }}" class="list-group-item">Home</a>
                    <a href="{{ url('/coordinator/managestudyplanner/create') }}" class="list-group-item active">Manage Study Planner</a>
                    <a href="{{ url('/coordinator/manageunitlisting/create') }}" class="list-group-item">Manage Unit Listings</a>
                    <a href="{{ url('/coordinator/manageunits/create') }}" class="list-group-item">Manage Units</a>
                    <a href="{{ url('/coordinator/resolveenrolmentissues/create') }}" class="list-group-item">Resolve Enrolment Issues</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Study Planner</h1>
                    </div>

                    {{-- todo: fetch dropdown data from database --}}
                    <div class="panel-body">
                        <a class="pull-right btn btn-default" data-toggle="modal" data-target="#addUnit" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <div class="btn-group btn-group" role="group" aria-label="...">
                            <!-- Year Dropdown -->
                            <div class="btn-group" role="group">
                                <button type="button" id="dropdown-year" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Year
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-year">
                                    <li><a href="#">Year 1</a></li>
                                    <li><a href="#">Year 2</a></li>
                                    <li><a href="#">Year 3</a></li>
                                </ul>
                            </div>

                            <!-- Semester Dropdown -->
                            <div class="btn-group" role="group">
                                <button type="button" id="dropdown-semester" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Semester
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-semester">
                                    <li><a href="#">Semester 1</a></li>
                                    <li><a href="#">Semester 2</a></li>
                                    <li><a href="#">Semester 3</a></li>
                                </ul>
                            </div>

                            <!-- Course Dropdown -->
                            <div class="btn-group" role="group">
                                <button type="button" id="dropdown-course" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Course
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-course">
                                    <li><a href="#">Course 1</a></li>
                                    <li><a href="#">Course 2</a></li>
                                    <li><a href="#">Course 3</a></li>
                                </ul>
                            </div>
                        </div>

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

                                <!-- required by form -->
                                <div class="form-group hidden">
                                    <label class="control-label col-sm-2" for="term">Term:</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $semester }}</p>
                                    </div>
                                    <input type="hidden" name="term" id="term" value="{{ $semester }}">
                                </div>
                                <div class="form-group hidden">
                                    <label class="control-label col-sm-2" for="year">Year:</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $year }}</p>
                                    </div>
                                    <input type="hidden" name="year" id="year" value="{{ $year }}">
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
                term: $('#term').val()
            }
        }
        if(method == "DELETE")
        {
            data = {
                _token: getToken(),
                unitCode: $(this).data('unitCode'),
                enrolmentTerm: $(this).data('enrolmentTerm'),
                year: $('#year').val(),
                term: $('#term').val()
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
