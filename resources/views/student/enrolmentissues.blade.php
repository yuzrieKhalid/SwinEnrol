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
                    <!-- remember, there's no form here-->
                    {{-- FORM HEAD --}}

                    <h4>ENROLMENT RELATED APPLICATIONS</h4>
                    <div class="row">
                        <div class="col-md-2">
                            <h5>Course Coordinator</h5>
                        </div>
                        <div class="col-md-10">
                            <select class="form-control">
                                <option value="khsim">Sim Kwan Hua (khsim@swinburne.edu.my)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <h5>Select Form</h5>
                        </div>
                        <div class="col-md-10">
                            <select class="form-control" id="issueTitle">
                                <option>Select One</option>
                                <option value="course_transfer">Internal Course Transfer</option>
                                <option value="exemption">Application for Advanced Standing (Exemptions)</option>
                                <option value="leave_of_absence">Application for Leave of Absence</option>
                                <option value="special_case">Application for Unit Preclusion</option>
                            </select>
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

                    {{-- FORM BODY --}}

                    {{-- Form: Internal Course Transfer --}}
                    <div class="hidden" id="course_transfer">
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
                    </div> <!-- end .course_transfer -->

                    {{-- Form: Exemption --}}
                    <div class="hidden" id="exemption">
                        <h4>APPLICATION FOR ADVANCED STANDING (EXEMPTION)</h4>
                        <div class="row">
                            {{-- Exemption Sought --}}
                            <div class="col-md-6">
                                <h4>Exemption Sought - Swinburne Unit</h4>
                                {{-- Swinburne: Unit Code --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>Unit Code:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control exemptionUnitCodeSought">
                                    </div>
                                </div>
                                {{-- Swinburne: Unit Title --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>Unit Title</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control exemptionUnitTitleSought">
                                    </div>
                                </div>
                            </div>
                            {{-- Grounds on Which Exemption is Sought --}}
                            <div class="col-md-6">
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
                        </div>
                    </div>

                    {{-- Form: Leave of Absence --}}
                    <div class="hidden" id="leave_of_absence">
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
                                <input class="form-control iso_name" type="text">
                            </div>
                        </div>
                        {{-- duration --}}
                        <div class="row">
                            <div class="col-md-4">
                                <h5>TEACHING PERIOD</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="input-sm form-control" id="period_from_" value="" />
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" id="period_to_" value="" />
                                </div>
                            </div>
                        </div>
                        {{-- reason --}}
                        <div class="row">
                            <div class="col-md-4">
                                <h5>REASON FOR LEAVE OF ABSENCE</h5>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control reasonForLOA" rows="3" style="resize: none"></textarea>
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
                    </div>

                    {{-- Form: Special Case --}}
                    <div class="hidden" id="special_case">
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
                                <select class="form-control selectedForPreclusion">
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
                    </div>

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
    $('#isForeigner:checked').change(function() {
        if ($('#isForeigner:checked').val()) {
            isForeigner = 'YES'
            $('.isInternational').removeClass('hidden')
        } else {
            isForeigner = 'NO'
            $('.isInternational').addClass('hidden')
        }
    })

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
            json_ict["fromProgramCode"] = $('.fromProgramCode').text()
            json_ict["fromProgramTitle"] = $('.fromProgramTitle').text()
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
            json_exemption["fromProgramCode"] = $('.fromProgramCode').text()
            json_exemption["fromProgramTitle"] = $('.fromProgramTitle').text()
            json_exemption["soughtUnitCode"] = $('.exemptionUnitCodeSought').val()
            json_exemption["soughtUnitTitle"] = $('.exemptionUnitTitleSought').val()
            json_exemption["exemptionUnitCodePrior"] = $('.exemptionUnitCodePrior').val()
            json_exemption["exemptionUnitYearPrior"] = $('.exemptionUnitYearPrior').val()
            json_exemption["exemptionUnitTitlePrior"] = $('.exemptionUnitTitlePrior').val()

            submissionData = JSON.stringify(json_exemption)
            attachmentData = encodedContent
            issueID = 2

        } else if (option == 'leave_of_absence') {

            let json_leave_of_absence = {}
            json_leave_of_absence["fromProgramCode"] = $('.fromProgramCode').text()
            json_leave_of_absence["fromProgramTitle"] = $('.fromProgramTitle').text()
            json_leave_of_absence["isForeigner"] = isForeigner
            json_leave_of_absence["iso_name"] = $('.iso_name').val()
            json_leave_of_absence["teachingPeriod"] = $('.teachingPeriod').val()
            json_leave_of_absence["year"] = $('.year').val()
            json_leave_of_absence["reasonForLOA"] = $('.reasonForLOA').val()

            submissionData = JSON.stringify(json_leave_of_absence)
            attachmentData = null
            issueID = 3

        } else if (option == 'preclusion') {

            let json_preclusion = {}
            json_preclusion["fromProgramCode"] = $('.fromProgramCode').text()
            json_preclusion["fromProgramTitle"] = $('.fromProgramTitle').text()
            json_preclusion["selectedForPreclusion"] = $('.selectedForPreclusion').val()
            json_preclusion["selectedPrerequisite"] = $('.selectedPrerequisite').val()
            json_preclusion["reasonForPreclusion"] = $('.reasonForPreclusion').val()

            submissionData = JSON.stringify(json_preclusion)
            attachmentData = null
            issueID = 5

            console.log(json_preclusion)

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
        })
    })
}) ()
</script>
@stop
