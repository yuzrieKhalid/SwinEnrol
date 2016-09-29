@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Other Enrolment Issues</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name="cForm" role="form" action="{{ url('/student/contactcoordinator') }}" onsubmit="return validateForm()" method="POST">

                        {{--
                        <hr>
                        <div class="studentPersonalDetails">
                            <h4>PERSONAL DETAILS</h4>
                                <div class="form-group">
                                    <!-- Title -->
                                    <label class="control-label col-sm-2" for="name">Title:</label>
                                    <div class="col-sm-1">
                                        <select>
                                            <option value="Dr">Dr</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Ms">Ms</option>
                                            <option value="Mdm">Mdm</option>
                                        </select>
                                    </div>
                                    <!-- Student ID -->
                                    <label class="control-label col-sm-2" for="name">Student ID:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="1000001" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Surname -->
                                    <label class="control-label col-sm-2" for="name">Surname:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Doe" disabled>
                                    </div>
                                    <!-- Given Name -->
                                    <label class="control-label col-sm-2" for="name">Given Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="John" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Program Code and Title -->
                                    <label class="control-label col-sm-2" for="name">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="IO47" disabled>
                                    </div>
                                    <label class="control-label col-sm-2" for="name">Program Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Bachelor in Computer Science" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Country -->
                                    <label class="control-label col-sm-2" for="name">Country:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="Malaysia" disabled>
                                    </div>
                                    <!-- State -->
                                    <label class="control-label col-sm-1" for="name">State:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Sarawak" disabled>
                                    </div>
                                    <!-- Postcode -->
                                    <label class="control-label col-sm-1" for="name">Postcode:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="96100" disabled>
                                    </div>
                                </div>
                        </div>
                        --}}
                        <hr>

                        <div class="studentIssue">
                            <h4>ENROLMENT RELATED APPLICATIONS</h4>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Course Coordinator: </label>
                                <div class="dropdown col-sm-10">
                                    <!-- populate this from database -->
                                    <!-- only list out coordinators from the course -->
                                    <select class="form-control">
                                        <option value="khsim">Sim Kwan Hua (khsim@swinburne.edu.my)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Title:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="issueTitle">
                                        <option>Select One</option>
                                        <option value="course_transfer">Internal Course Transfer</option>
                                        <option value="exemption">Application for Advanced Standing (Exemptions)</option>
                                        <option value="leave_of_absence">Application for Leave of Absence</option>
                                        <option value="preclusion">Application for Unit Preclusion</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <!-- Case: Internal Course Transfer -->
                            <div class="hidden" id="course_transfer">
                                <h3>Internal Course Transfer</h3>
                                <h4>YEAR/SEMESTER OF REQUESTED TRANSFER</h4>
                                <input type="text" class="form-control yearOfRequestedTransfer" placeholder="e.g., 3 / 5">

                                <h4>CURRENT PROGRAM</h4>

                                @foreach($studentcourse as $course)
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control fromProgramCode" value="{{ $course->courseCode }}" disabled>
                                    </div>
                                        <label class="control-label col-sm-2">Program Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control fromProgramTitle" value="{{ $course->courseName }}" disabled>
                                    </div>
                                </div>
                                @endforeach

                                <div class="form-group">
                                    <label class="control-label col-sm-5">Year of first enrolment in current program:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control fromProgramIntakeYear">
                                    </div>
                                </div>

                                <h4>PROPOSED PROGRAM</h4>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Program Title:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control toProgramCode">
                                            <option value="none"></option>
                                            @foreach($courses as $course)
                                            <option value="{{ $course->courseCode }}">{{ $course->courseCode }} <span class="toProgramTitle">{{ $course->courseName }}</span></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2">Program Year:</label>
                                    <div class="col-sm-2">
                                        <select class="form-control toProgramYear">
                                            <option value="none"></option>
                                            <option value="{{ $currentyear }}">{{ $currentyear }}</option>
                                            <option value="{{ $nextyear }}">{{ $nextyear }}</option>
                                            <option value="{{ $next2year }}">{{ $next2year }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2">Reasons for Requesting Transfer </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control custom-control toReasons" rows="3" style="resize:none"></textarea>
                                    </div>
                                </div>
                            </div> <!-- end .course_transfer -->

                            <!-- Case: Exemption -->
                            <div class="hidden" id="exemption">
                                <h3>APPLICATION FOR ADVANCED STANDING (EXEMPTION)</h3>

                                <h4>Swinburne Unit (Exemption Sought)</h4>
                                @foreach($studentcourse as $course)
                                <div class="form-group">
                                    <!-- Program Code-->
                                    <label class="control-label col-sm-2">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control fromProgramCode" value="{{ $course->courseCode }}" disabled>
                                    </div>
                                    <!-- Program Title-->
                                    <label class="control-label col-sm-2">Program Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control fromProgramTitle" value="{{ $course->courseName }}" disabled>
                                    </div>
                                </div>
                                @endforeach

                                <h4>Grounds Upon Which Exemption is Sought (Prior Study)</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2">Unit Code:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control exemptionUnitCode">
                                    </div>

                                    <!-- Program Year-->
                                    <label class="control-label col-sm-2">Year:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control exemptionUnitYear">
                                    </div>
                                    <br><br>

                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2">Unit Title:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control exemptionUnitTitle">
                                    </div>
                                    <br><br>

                                    <!-- Attach Proof -->
                                    <label class="control-label col-sm-2">Attachment: </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="attachFile">
                                    </div>
                                </div>
                            </div>

                            <!-- Case: Withdrawal -->
                            <div class="hidden" id="leave_of_absence">
                                <h3>APPLICATION FOR LEAVE OF ABSENCE</h3>

                                @foreach($studentcourse as $course)
                                <h4>Program Details</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="{{ $course->courseCode }}" disabled>
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2">Program Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $course->courseName }}" disabled>
                                    </div>
                                </div>
                                @endforeach

                                <div class="form-group">
                                    <!-- Dual Qualification? -->
                                    <label class="control-label col-sm-5">Are you an international student holding a student visa?<span class="help-block">Leave the box empty if "No"</span></label>
                                    <label class="radio-inline"><input type="checkbox" name="isForeigner" id="isForeigner" checked> YES</label>
                                </div>

                                <div class="hidden isInternational">
                                    <label class="control-label">International Student Officer Name</label>
                                    <input class="form-control iso_name" type="text" value="">
                                    <hr>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered applicationTable">
                                        <tr>
                                            <th>Teaching Period</th>
                                            <th>Year</th>
                                        </tr>
                                        <tr class="tr_template">
                                            <td><input class="form-control teachingPeriod" type="text" value=""></td>
                                            <td><input class="form-control year" type="text" value="2016"></td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Reason for Withdrawal -->
                                <label class="control-label">Reasons for Leave Of Absence:</label>
                                <textarea class="form-control reasonForLOA" rows="3"></textarea>

                                <!-- Conditions -->
                                <h4>Conditions</h4>
                                <p>
                                    1. For domestic students the last date to lodge an application for leave of absence without a Financial Penalty is by close of business on the Unit of Study Census Date
                                    OR prior to commencement of classes for unit of study undertaken in block mode. (For Unit of Study Census Date refer to your Confirmation of Enrolment /
                                    Invoice).
                                </p>
                                <p>
                                    2. Refunds are subject to the return of your University ID card, fee receipt, and any other University property or materials you may have in your possession.
                                </p>
                                <p>
                                    3. No refund of fees will be made when a student withdraws from a unit of study after close business of the Unit of Study Census Date.
                                </p>
                                <p>
                                    4. Before applying for leave of absence students are advised to read the 'Deferral and Leave of Absence' policies and regulations on
                                    Academic Course Regulations 2013, Chapter 2 Part 4 Deferral and Part 5 Leave of Absence at <a href="http://www.swinburne.edu.au/policies/regulations/courses.html">http://www.swinburne.edu.au/policies/regulations/courses.html</a>
                                </p>
                            </div>

                            <!-- Case: Preclusion -->
                            <div class="hidden" id="preclusion">
                                <h3>APPLICATION FOR UNIT PRECLUSION</h3>

                                <div class="form-group">
                                    <!-- Dual Qualification? -->
                                    <label class="control-label col-sm-5">Are you an international student holding a student visa?<span class="help-block">Leave the box empty if "No"</span></label>
                                    <label class="radio-inline"><input type="checkbox" name="isForeigner" id="isForeigner" checked> YES</label>
                                </div>

                                <div class="hidden isInternational">
                                    <label class="control-label">International Student Officer Name</label>
                                    <input class="form-control iso_name" type="text" value="">
                                    <hr>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered applicationTable">
                                        <tr>
                                            <th>Teaching Period</th>
                                            <th>Year</th>
                                        </tr>
                                        <tr class="tr_template">
                                            <td><input class="form-control teachingPeriod" type="text" value=""></td>
                                            <td><input class="form-control year" type="text" value="2016"></td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Reason for Withdrawal -->
                                <label class="control-label">Reasons for Leave Of Absence:</label>
                                <textarea class="form-control reasonForLOA" rows="3"></textarea>

                                <!-- Conditions -->
                                <h4>Conditions</h4>
                                <p>
                                    1. For domestic students the last date to lodge an application for leave of absence without a Financial Penalty is by close of business on the Unit of Study Census Date
                                    OR prior to commencement of classes for unit of study undertaken in block mode. (For Unit of Study Census Date refer to your Confirmation of Enrolment /
                                    Invoice).
                                </p>
                                <p>
                                    2. Refunds are subject to the return of your University ID card, fee receipt, and any other University property or materials you may have in your possession.
                                </p>
                                <p>
                                    3. No refund of fees will be made when a student withdraws from a unit of study after close business of the Unit of Study Census Date.
                                </p>
                                <p>
                                    4. Before applying for leave of absence students are advised to read the 'Deferral and Leave of Absence' policies and regulations on
                                    Academic Course Regulations 2013, Chapter 2 Part 4 Deferral and Part 5 Leave of Absence at <a href="http://www.swinburne.edu.au/policies/regulations/courses.html">http://www.swinburne.edu.au/policies/regulations/courses.html</a>
                                </p>
                            </div>

                        </div> <!-- end #studentIssue -->
                    </form>
                </div>

                <div class="panel-footer">
                    <button class="btn btn-default submit" data-method="POST" data-url="{{ route('student.enrolmentissues.store') }}">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script>
// Application For Withdrawal From Program datepicker
$('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    startDate: '-3d'
});
</script>

<script>
// issueTitle change form script
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // CHECK IS FOREIGNER // TODO fix bug: detect the change on checked
    if ($('#isForeigner:checked').val()) {
        isForeigner = 'YES'
        $('.isInternational').removeClass('hidden')
    } else {
        isForeigner = 'NO'
        $('.isInternational').addClass('hidden')
    }

    // SELECT ISSUE SCRIPT
    let selectIssue = $("#issueTitle")

    selectIssue.data("prev",selectIssue.val())
    $('#' + selectIssue.data("prev")).removeClass("hidden")

    selectIssue.change(function(data){
        // retains the previous data before change
        let previousOption = $(this);
        // console.log("Previous " + previousOption.data("prev"))
        $('#' + previousOption.data("prev")).addClass("hidden")

        // overwrites the previousOption with the selected option
        previousOption.data("prev",previousOption.val());

        // always the latest selected option
        let option = $(this).find('option:selected').val()
        $('#' + option).removeClass("hidden")
    })

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
        // placeholder for the data
        let submissionData = ""
        let attachmentData = null
        let issueID = 0

        // get the issueTitle value and get the data based on the issue
        let option = $('#issueTitle').find('option:selected').val()
        if (option == 'course_transfer') {
            // keep everything in an array to be stringified into a JSON Object
            let json_ict = {}
            json_ict["yearOfRequestedTransfer"] = $('.yearOfRequestedTransfer').val()
            json_ict["fromProgramCode"] = $('.fromProgramCode').val()
            json_ict["fromProgramTitle"] = $('.fromProgramTitle').val()
            json_ict["fromProgramIntakeYear"] = $('.fromProgramIntakeYear').val()
            json_ict["toProgramCode"] = $('.toProgramCode').val()
            json_ict["toProgramTitle"] = $('.toProgramTitle').val()
            json_ict["toProgramYear"] = $('.toProgramYear').val()
            json_ict["toReasons"] = $('.toReasons').val()

            // stringify the array into JSON Object
            submissionData = JSON.stringify(json_ict)
            attachmentData = null
            issueID = 1
            // end option == 'course_transfer'

        } else if (option == 'exemption') {
            // convert the string to base64 encoding
            let encodedContent = btoa(attached_data)

            let json_exemption = {}
            json_exemption["fromProgramCode"] = $('.fromProgramCode').val()
            json_exemption["fromProgramTitle"] = $('.fromProgramTitle').val()
            json_exemption["exemptionUnitCode"] = $('.exemptionUnitCode').val()
            json_exemption["exemptionUnitYear"] = $('.exemptionUnitYear').val()
            json_exemption["exemptionUnitTitle"] = $('.exemptionUnitTitle').val()

            submissionData = JSON.stringify(json_exemption)
            attachmentData = encodedContent
            issueID = 2

        } else if (option == 'leave_of_absence') {


            let json_withdrawal = {}
            json_withdrawal["fromProgramCode"] = $('.fromProgramCode').val()
            json_withdrawal["fromProgramTitle"] = $('.fromProgramTitle').val()
            json_withdrawal["isForeigner"] = isForeigner
            json_withdrawal["iso_name"] = $('.iso_name').val()
            json_withdrawal["teachingPeriod"] = $('.teachingPeriod').val()
            json_withdrawal["year"] = $('.year').val()
            json_withdrawal["reasonForLOA"] = $('.reasonForLOA').val()

            submissionData = JSON.stringify(json_withdrawal)
            attachmentData = null
            issueID = 3

        } else {
            console.log("Something is wrong, this shouldn't occur");
        }

        // AJAX Creating the Issue
        let method = $(this).data('method')
        let url = $(this).data('url')
        let data = {
            '_token': getToken(),
            'issueID': issueID,
            'submissionData': submissionData,
            'attachmentData': attachmentData
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data,
            enctype: 'multipart/form-data'
        }).done(function(data) {
            window.location.reload()
            // console.log(issueID);
            // console.log("SubmissionData: " + submissionData);
            // console.log("AttachmentData: " + attachmentData);
        })
    })
}) ()
</script>

<!-- <script>

$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  // other options
});
</script> -->
@stop
