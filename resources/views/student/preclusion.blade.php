@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Enrolment Issues</h3>
                </div>

                <div class="panel-body">
                    <h4>ENROLMENT RELATED APPLICATIONS</h4>
                    <div class="row">
                        <div class="col-md-2">
                            <h5>Course Coordinator</h5>
                        </div>
                        <div class="col-md-10">
                            <h5>{{ $coursecoordinator->name }}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <h5>Current Program</h5>
                        </div>
                        <div class="col-md-10">
                            <h5>
                                <span class="fromProgramCode">{{ $studentcourse->courseCode }}</span>
                                <span class="fromProgramTitle">{{ $studentcourse->courseName }}</span>
                            </h5>
                        </div>
                    </div> <!-- end .row -->
                    <hr>
                    {{-- Form: Special Case --}}
                    <h4>SPECIAL CASE / PRECLUSION</h4>
                    {{-- preclusion --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>UNIT FOR PRECLUSION</h5>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control selectedForPreclusion">
                                <option value="none"></option>
                                @foreach($semesterUnits as $unit)
                                <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} <span class="">{{ $unit->unit->unitName }}</span></option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- end .row -->
                    {{-- prerequisites --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>PREREQUISITE UNIT FOR PRECLUSION</h5>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control selectedPrerequisite">
                                <option value="none"></option>
                                @foreach($semesterUnits as $unit)
                                <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} <span class="">{{ $unit->unit->unitName }}</span></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- reason --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>REASON FOR PRECLUSION</h5>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control reasonForPreclusion" rows="3" style="resize: none"></textarea>
                        </div>
                    </div> <!-- end .row -->
                    <!-- Conditions -->
                    <h5>CONDITIONS</h5>
                    <ol>
                        <li>You may only apply for this if you failed <strong>ONE</strong> prerequisite to the selected unit</li>
                        <li>Before submitting the form, you must remember to enrol the failed prerequisite along with the selected unit</li>
                    </ol>
                </div> <!-- end .panel-body -->

                <div class="panel-footer">
                    <button class="btn btn-default submit" data-method="POST" data-redirect="{{ url('/student') }}"
                        data-url="{{ route('student.preclusion.store') }}">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script>
// issueTitle change form script
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // CREATE ISSUE SCRIPT
    let createIssue = $('.submit').click(function() {

        // create a json object to store into submissionData : string -- a jsonstring
        let json_preclusion = {}
        json_preclusion["fromProgramCode"] = $('.fromProgramCode').text()
        json_preclusion["fromProgramTitle"] = $('.fromProgramTitle').text()
        json_preclusion["selectedForPreclusion"] = $('.selectedForPreclusion').val()
        json_preclusion["selectedPrerequisite"] = $('.selectedPrerequisite').val()
        json_preclusion["reasonForPreclusion"] = $('.reasonForPreclusion').val()

        let submissionData = JSON.stringify(json_preclusion)
        let attachmentData = null

        // AJAX Creating the Issue
        let method = $(this).data('method')
        let url = $(this).data('url')
        let homeredirect = $(this).data('redirect')
        let data = {
            '_token': getToken(),
            'issueID': 5,
            'submissionData': submissionData,
            'attachmentData': attachmentData
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data,
            enctype: 'multipart/form-data'
        }).done(function(data) {
            window.location.replace(homeredirect)
        })
    })
}) ()
</script>
@stop
