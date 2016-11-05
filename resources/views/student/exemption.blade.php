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

                    {{-- Form: Exemption --}}
                    <h4>APPLICATION FOR ADVANCED STANDING (EXEMPTION)</h4>
                    {{-- Exemption Sought --}}
                    <h4>Exemption Sought - Swinburne Unit</h4>
                    {{-- Swinburne: Unit Code --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Unit Sought:</h5>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control exemptionUnitCodeSought">
                                @foreach($allunits as $unit)
                                    <option value="{{ $unit->unitCode }}"> {{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Grounds on Which Exemption is Sought --}}
                    <h4>Prior Study Proof</h4>
                    {{-- Prior Study: Unit Code --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Unit Code:</h5>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control exemptionUnitCodePrior">
                        </div>
                    </div>
                    {{-- Prior Study: Unit Title --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Unit Title</h5>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control exemptionUnitTitlePrior">
                        </div>
                    </div>
                    {{-- Prior Study: Year --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Year</h5>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control exemptionUnitYearPrior">
                        </div>
                    </div>
                    {{-- Prior Study: Academenic Transcript Upload --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Upload Transcript</h5>
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="attachFilePrior">
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <button class="btn btn-default submit" data-method="POST" data-redirect="{{ url('/student') }}"
                        data-url="{{ route('student.exemption.store') }}">
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

    // UPLOAD FILE SCRIPT
    let attached_data = ""
    let attachFile = $('.attachFile').change(function() {
        let file = document.querySelector('input[type=file]').files[0]
        let reader = new FileReader()

        reader.onload = function(event) {
            attached_data = event.target.result
            // console.log(attached_data);
        }   // read the raw binary data (not yet encoded to base64)
        reader.readAsBinaryString(file)
    })

    // CREATE ISSUE SCRIPT
    let createIssue = $('.submit').click(function() {

        // convert the string to base64 encoding
        let encodedContent = btoa(attached_data)

        // create a json object to store into submissionData : string -- a jsonstring
        let json_exemption = {}
        json_exemption["fromProgramCode"] = $('.fromProgramCode').text()
        json_exemption["fromProgramTitle"] = $('.fromProgramTitle').text()
        json_exemption["soughtUnitCode"] = $('.exemptionUnitCodeSought').val()
        json_exemption["exemptionUnitCodePrior"] = $('.exemptionUnitCodePrior').val()
        json_exemption["exemptionUnitYearPrior"] = $('.exemptionUnitYearPrior').val()
        json_exemption["exemptionUnitTitlePrior"] = $('.exemptionUnitTitlePrior').val()

        let submissionData = JSON.stringify(json_exemption)
        let attachmentData = encodedContent

        // AJAX Creating the Issue
        let method = $(this).data('method')
        let url = $(this).data('url')
        let homeredirect = $(this).data('redirect')
        let data = {
            '_token': getToken(),
            'issueID': 2,
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
