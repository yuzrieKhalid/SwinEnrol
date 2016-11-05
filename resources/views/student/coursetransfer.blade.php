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

                    {{-- Form: Course Transfer --}}
                    <h4>INTERNAL COURSE TRANSFER</h4>
                    {{-- fromProgramIntakeYear --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>YEAR OF FIRST ENROLMENT IN CURRENT PROGRAM</h5>
                        </div>
                        <div class="col-md-8">
                            <h5>
                                <span class="fromProgramIntakeYear">{{ $student->year }}</span>
                            </h5>
                        </div>
                    </div> <!-- end .row -->

                    {{-- proposedProgram --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>PROPOSED PROGRAM</h5>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control toProgramCode">
                                <option value="none"></option>
                                @foreach($courses as $course)
                                <option value="{{ $course->courseCode }}">{{ $course->courseCode }} <span class="toProgramTitle">{{ $course->courseName }}</span></option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- end .row -->

                    {{-- proposedProgramYear --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>PROPOSED TRANSFER YEAR</h5>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control toProgramYear">
                                <option value="none"></option>
                                <option value="{{ $currentyear }}">{{ $currentyear }}</option>
                                <option value="{{ $nextyear }}">{{ $nextyear }}</option>
                                <option value="{{ $next2year }}">{{ $next2year }}</option>
                            </select>
                        </div>
                    </div> <!-- end .row -->

                    {{-- reason for transfer --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>REASON FOR TRANSFER</h5>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control toReasons" rows="3" style="resize:none"></textarea>
                        </div>
                    </div> <!-- end .row -->
                </div> <!-- end .panel-body -->
                <div class="panel-footer">
                    <button class="btn btn-default submit" data-method="POST" data-redirect="{{ url('/student') }}"
                        data-url="{{ route('student.coursetransfer.store') }}">
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
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // CREATE ISSUE SCRIPT
    let createIssue = $('.submit').click(function() {

        // create a json object to store into submissionData : string -- a jsonstring
        let json_ict = {}
        json_ict["yearOfRequestedTransfer"] = $('.yearOfRequestedTransfer').val()
        json_ict["fromProgramCode"] = $('.fromProgramCode').text()
        json_ict["fromProgramTitle"] = $('.fromProgramTitle').text()
        json_ict["fromProgramIntakeYear"] = $('.fromProgramIntakeYear').val()
        json_ict["toProgramCode"] = $('.toProgramCode').val()
        json_ict["toProgramTitle"] = $('.toProgramTitle').val()
        json_ict["toProgramYear"] = $('.toProgramYear').val()
        json_ict["toReasons"] = $('.toReasons').val()

        // stringify the array into JSON Object before saving it
        let submissionData = JSON.stringify(json_ict)
        let attachmentData = null

        // AJAX Creating the Issue
        let method = $(this).data('method')
        let url = $(this).data('url')
        let homeredirect = $(this).data('redirect')
        let data = {
            '_token': getToken(),
            'issueID': 1,
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
