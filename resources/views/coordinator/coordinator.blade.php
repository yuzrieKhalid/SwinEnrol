@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
            <!-- Reserve 3 space for navigation column -->
        @include('coordinator.menu')

        <div class="col-md-9">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>{{ $courseCode }} {{ $courseName }}</h1>
                </div>

                <div class="panel-body">
                    <h2>
                        <small class="text-success">Unit Listing : {{ $semester }} {{ $year }}</small>
                    </h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-11">
                                <select class="form-control" name="units">
                                    @foreach($planner_units as $unit)
                                        <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unit->unitName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-success submit"><span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" data-url="{{ route('coordinator.home.index') }}" id="homeIndexTable">
                            <thead>
                                <th>Unit Code</th>
                                <th>Unit Title</th>
                                <th>Enrolled</th>
                                <th>Max. Space</th>
                                <th>Lecture Groups</th>
                                <th>Tutorial Groups</th>
                            </thead>
                            <tr class="hidden tr_template">
                                <td class="unitCode"></td>
                                <td class="unitTitle"></td>
                                <td class="enrolledStudents"></td>
                                <td class="maxStudents"></td>
                                <td class="lectureGroupCount"></td>
                                <td class="tutorialGroupCount"></td>
                            </tr>
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
    // 2. Populate the table
    let addData = function(data) {
        // cloning and populating table data
        let tr_template = $('#homeIndexTable').find('.tr_template').clone()
        tr_template.removeClass('hidden')
        tr_template.removeClass('tr_template')

        tr_template.children('.unitCode').html(data.unitCode)
        tr_template.children('.unitTitle').html(data.unit.unitName)
        tr_template.children('.enrolledStudents').html("_ /" + student_count)
        tr_template.children('.maxStudents').html(data.unit.maxStudentCount)
        tr_template.children('.lectureGroupCount').html(data.unit.lectureGroupCount)
        tr_template.children('.tutorialGroupCount').html(data.unit.tutorialGroupCount)

        $('#homeIndexTable').append(tr_template)
    }

    // 1. fetch submissionData from the Controller and decode them
    let student_count = 0
    let getInformationData = function() {
        let url = $('#homeIndexTable').data('url')
        $.get(url, function(objectdata) {
            student_count = objectdata['student_count']
            objectdata['semesterUnits'].forEach(function(data) {
                addData(data)
            })
        })
    }
    getInformationData()
})()
</script>
@stop
