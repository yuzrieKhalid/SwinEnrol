@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>{{ $courseCode }} {{ $courseName }}</h3>
                </div>

                <div class="panel-body">
                    <h2>
                        <small class="text-success">Select a unit to track</small>
                    </h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-11">
                                <select class="form-control" id="selectedUnit">
                                    @foreach($planner_units as $unit)
                                        <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unit->unitName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-success submit"
                                    data-method="POST" data-url="{{ route('coordinator.home.store') }}">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Unit Code</th>
                                <th>Unit Name</th>
                                <th>Enrolled / Size</th>
                                <th>Lecture Groups</th>
                                <th>Tutorial Groups</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($coordinator_units as $unit)
                                <tr>
                                    <td>{{ $unit->unitCode }}</td>
                                    <td>{{ $unit->unit->unitName }}</td>
                                    <td>{{ $student_count }} / {{ $unit->unit->maxStudentCount }}</td>
                                    <td>{{ $unit->unit->lectureGroupCount }}</td>
                                    <td>{{ $unit->unit->tutorialGroupCount }}</td>
                                    <td>
                                        <a id="submit" data-method="DELETE" data-url="{{ route('coordinator.home.destroy', $unit->unitCode) }}" class="submit pull-right" href="" role="button">
                                            <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end .table-reponsive -->
                </div> <!-- end .panel-body -->
            </div> <!-- end .panel -->

        </div>
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

    $('.submit').click(function() {
        // AJAX Parameters
        let method = $(this).data('method')
        let url = $(this).data('url')
        let data = {
            '_token': getToken(),
            'unitCode': $('#selectedUnit').val()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            window.location.reload()
        })
    })
})()
</script>
@stop
