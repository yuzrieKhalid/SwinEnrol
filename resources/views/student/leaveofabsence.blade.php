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

                    {{-- Form: Leave of Absence --}}
                    <h4>APPLICATION FOR LEAVE OF ABSENCE</h4>
                    {{-- foreignStudentCheck --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>ARE YOU AN INTERNATIONAL STUDENT</h5>
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" name="isForeigner" id="isForeigner" checked>
                        </div>
                    </div>
                    {{-- internationalStdOfficer --}}
                    <div class="row isInternational">
                        <div class="col-md-4">
                            <h5>INTERNATIONAL STUDENT OFFICER</h5>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control iso_name" id="officer" type="text">
                        </div>
                    </div>
                    {{-- duration --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>TEACHING PERIOD</h5>
                        </div>
                        <div class="col-md-8">
                            <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd MM yyyy">
                                <input type="text" class="input-sm form-control period_from" id="dateS" value="" />
                                <span class="input-group-addon">to</span>
                                <input type="text" id="dateL" class="input-sm form-control period_to" value="" />
                            </div>
                        </div>
                    </div>
                    {{-- reason --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h5>REASON FOR LEAVE OF ABSENCE</h5>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control reasonForLOA" id="reason" rows="3" style="resize: none"></textarea>
                            <span id="chars">0</span> characters counted <span></span> (Min 50words) 
                        </div>
                    </div>

                    {{-- condtions --}}
                    <h5>CONDITIONS</h5>
                    <ol>
                        <li>
                            For domestic students the last date to lodge an application for leave of absence without a Financial Penalty is by close of business on the Unit of Study Census Date
                            OR prior to commencement of classes for unit of study undertaken in block mode. (For Unit of Study Census Date refer to your Confirmation of Enrolment /
                            Invoice)
                        </li>
                        <li>
                            Refunds are subject to the return of your University ID card, fee receipt, and any other University property or materials you may have in your possession
                        </li>
                        <li>
                            No refund of fees will be made when a student withdraws from a unit of study after close business of the Unit of Study Census Date
                        </li>
                        <li>
                            Before applying for leave of absence students are advised to read the 'Deferral and Leave of Absence' policies and regulations on
                            Academic Course Regulations 2013, Chapter 2 Part 4 Deferral and Part 5 Leave of Absence at
                            <a href="http://www.swinburne.edu.au/policies/regulations/courses.html">http://www.swinburne.edu.au/policies/regulations/courses.html</a>
                        </li>
                    </ol>
                </div> <!-- end .panel-body -->

                <div class="panel-footer">
                    <button class="btn btn-default submit" type="submit" id="submit" data-method="POST" data-redirect="{{ url('/student') }}"
                        data-url="{{ route('student.leaveofabsence.store') }}">
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

    $('.submit').attr("disabled", "disabled")

    let minLength = 0
    $('textarea').keyup(function() {
        var length = $(this).val().length;
        var length = minLength+length;
        $('#chars').text(length);
        var inputValue = $(this).val().length;
        if(inputValue >= 50){
            $('.submit').removeAttr('disabled')
        }
    })



    // CHECK IS FOREIGNER
    let isForeigner = ''
    $('#isForeigner:checked').change(function() {
        if ($('#isForeigner:checked').val()) {
            isForeigner = 'YES'
            $('.isInternational').removeClass('hidden')
        } else {
            isForeigner = 'NO'
            $('.isInternational').addClass('hidden')
        }
    })

    // CREATE ISSUE SCRIPT
    let createIssue = $('.submit').click(function() {

        if (isForeigner == 'YES') {
            if($('#officer').val().length == 0)
                alert("Please enter International Officer Name")
        } if($('#dateS').val().length == 0 && $('#dateL').val().length == 0){
            alert("Please enter LEAVE OF ABSENCE PERIOD")
        }else if($('#reason').val().length== 0){
            alert("Please briefly give your reason/s for requesting leave of absence")

        }else{

        // create a json object to store into submissionData : string -- a jsonstring
        let json_leave_of_absence = {}
        json_leave_of_absence["fromProgramCode"] = $('.fromProgramCode').text()
        json_leave_of_absence["fromProgramTitle"] = $('.fromProgramTitle').text()
        json_leave_of_absence["isForeigner"] = isForeigner
        json_leave_of_absence["iso_name"] = $('.iso_name').val()
        json_leave_of_absence["period_from"] = $('.period_from').val()
        json_leave_of_absence["period_to"] = $('.period_to').val()
        json_leave_of_absence["year"] = $('.year').val()
        json_leave_of_absence["reasonForLOA"] = $('.reasonForLOA').val()

        let submissionData = JSON.stringify(json_leave_of_absence)
        let attachmentData = null

        // AJAX Creating the Issue
        let method = $(this).data('method')
        let url = $(this).data('url')
        let homeredirect = $(this).data('redirect')
        let data = {
            '_token': getToken(),
            'issueID': 3,
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
    }
    })
}) ()
</script>
@stop
