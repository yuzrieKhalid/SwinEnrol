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
                    <h3>Resolve Enrolment Issues</h3>
                </div>

                <div class="panel-body">
                        <div class="form-group">
                            <div class="panel-body">
                                <table class="table table-hover" id="student_enrolment_issues_table" data-url="{{ route('coordinator.resolveenrolmentissues.index') }}">
                                    <thead>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Issue Type</th>
                                        <th>Date</th>
                                    </thead>

                                    <tr class="hidden tr_template clickable-row" data-toggle="modal" data-target="">
                                        <td class="td_studentID"></td>
                                        <td class="td_studentName"></td>
                                        <td class="td_issueType"></td>
                                        <td class="td_date"></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Modal Template -->
                            <div id="modal_placeholder">
                                <div class="modal fade modal_template" id="" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- header -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title">Student Enrolment Information</h3>
                                            </div>

                                            <!-- body -->
                                            <div class="modal-body">
                                                <!-- Generate According to the issueID -->
                                                <div class="issue_1 hidden">
                                                    <p>Student ID: <span class="text-warning studentID">4318595</span></p>
                                                    <p>Issue : <span class="text-warning issue">[Course Transfer]</span></p>
                                                    <p>Status: <span class="text-warning status">Pending</span></p>

                                                    <h3>Internal Course Transfer Details</h3>
                                                    <p>Year of Requested Transfer: <span class="text-primary yearOfRequestedTransfer">2008</span></p>
                                                    <p>Current Program: <span class="text-primary currentProgram">[I047] [Bachelor of Computer Science]</span></p>
                                                    <p>Current Program Intake: <span class="text-primary currentIntake">[April 2014]</span></p>
                                                    <p>Proposed Program: <span class="text-success proposedProgram">[B123] [Business]</span></p>
                                                    <p>Proposed Year: <span class="text-success proposedIntakeYear">[2018]</span></p>
                                                    <hr>
                                                    <p>Reason of Transfer:</p>
                                                    <blockquote>
                                                        <p class="reason">[Reason]</p>
                                                    </blockquote>
                                                </div>

                                                <div class="issue_2 hidden">
                                                    <p>Student ID: <span class="text-warning studentID">4318595</span></p>
                                                    <p>Issue : <span class="text-warning issue">[Exemption]</span></p>
                                                    <p>Status: <span class="text-warning status">Pending</span></p>
                                                    <p>Current Program: <span class="text-primary currentProgram">[I047] [Bachelor of Computer Science]</span></p>

                                                    <h3>Exemption Sought</h3>
                                                    <p>Sought Unit: <span class="text-success exemptionUnitCodeSought">[HIT 1302] [Introduction to Business Information System]</span></p>
                                                    <hr>

                                                    <h3>Grounds on Which Exemption is Sought</h3>
                                                    <p>Prior Study Unit: <span class="text-success exemptionUnitCodePrior">[HIT 1302] [Introduction to Business Information System]</span></p>
                                                    <p>Prior Study Year: <span class="text-success exemptionUnitYearPrior">[2018]</span></p>
                                                    <p class="attachmentData">Attachment: <a href="#">iCATS Results Slip.pdf</a></p>
                                                </div>

                                                <div class="issue_3 hidden">
                                                    <p>Student ID: <span class="text-warning studentID">4318595</span></p>
                                                    <p>Issue : <span class="text-warning issue">[Preclusion]</span></p>
                                                    <p>Status: <span class="text-warning status">Pending</span></p>

                                                    <h3>Special Case: Preclusion</h3>
                                                    <p>Selected Unit for Preclusion: <span class="text-success preclusionUnit">[HIT 1302] [Introduction to Business Information System]</span></p>
                                                    <p>Prerequisite of Selected Unit: <span class="text-success prerequisiteUnit">[HIT 1301] [Introduction to a System]</span></p>
                                                    <p>Reason for Preclusion: <span class="text-success reasonForPreclusion">[Reason]</span></p>

                                                    <h3>Student Enrolment Status</h3>
                                                    <button class="btn btn-primary display-enrolment-status" data-id="" data-show="{{ route('coordinator.resolveenrolmentissues.show', 'stdID') }}">Show Student Enrolment Status</button>

                                                    <div class="student-enrolment-status hidden">
                                                        <div class="btn-group btn-group-justified" role="group" style="margin-bottom:10px;">
                                                            <!-- On press will make one of them hiddden -->
                                                            <a class="btn btn-default" href=".current-enrolment-table" data-toggle="tab" role="button">Current Enrolment</a>
                                                            <a class="btn btn-default" href=".completed-units-table" data-toggle="tab" role="button">Completed Units</a>
                                                        </div>

                                                        <div id="content" class="tab-content">
                                                            <div class="tab-pane fade active in current-enrolment-table">
                                                                <table class="table table-bordered table-striped current_enrolment_table">
                                                                <h4>Current Enrolment</h4>
                                                                    <thead>
                                                                        <th>Unit Code</th>
                                                                        <th colspan="2">Unit Name</th>
                                                                    </thead>
                                                                    <tr class="tr_template_current hidden">
                                                                        <td class="td_unitCode"></td>
                                                                        <td class="td_unitName"></td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                            <div class="tab-pane fade completed-units-table">
                                                                <h4>Completed Units</h4>
                                                                <table class="table table-bordered table-striped completed_table">
                                                                    <thead>
                                                                        <th>Unit Code</th>
                                                                        <th colspan="2">Unit Name</th>
                                                                    </thead>
                                                                    <tr class="tr_template_completed hidden">
                                                                        <td class="td_unitCode"></td>
                                                                        <td class="td_unitName"></td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                        </div> <!-- end .tab-content -->
                                                    </div> <!-- end .student-enrolment-status-->
                                                </div> <!-- end .issue_3 -->
                                            </div> <!-- end .modal-body -->

                                            <!-- footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success submit" data-method="PUT" data-stdid="" data-issid="" data-first="" data-second=""
                                                    data-url="{{ route('coordinator.resolveenrolmentissues.approve', ['studentID' => 'stdID', 'issueID' => 'issID' ]) }}">
                                                    Approve
                                                </button>
                                                <button type="button" class="btn btn-danger submit" data-method="DELETE" data-stdid="" data-issid=""
                                                    data-url="{{ route('coordinator.resolveenrolmentissues.disapprove', ['studentID' => 'stdID', 'issueID' => 'issID' ]) }}">
                                                    Disapprove
                                                </button>
                                            </div>
                                        </div> <!-- .modal-content> -->
                                    </div> <!-- .modal-dialog -->
                                </div> <!-- .modal_template-->
                            </div> <!-- .modal_placeholder -->
                        </div> <!-- end .form-group -->
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

    // 4. Get Student Enrolment Information
    $(document).delegate(".display-enrolment-status", "click", function(){
        // for the url for show
        let show = $(this).data('show')
        // for parameter
        let studentID = $(this).data('id')
        // for keeping track
        let button = $(this)

        // update the id
        show = show.replace('stdID', studentID)


        // on click
        $(this).parent().find('.student-enrolment-status').removeClass('hidden')
        $(this).addClass('hidden')

        let populateCurrentTable = function(data) {
            let current_enrolment_template = button.parent().find('.tr_template_current').clone()

            current_enrolment_template.removeClass('hidden')
            current_enrolment_template.removeClass('tr_template_current')

            current_enrolment_template.children('.td_unitCode').html(data.unitCode)
            current_enrolment_template.children('.td_unitName').html(data.unit.unitName)

            button.parent().find('.current_enrolment_table').append(current_enrolment_template)
        }

        let populateCompletedTable = function(data) {
            let completed_template = button.parent().find('.tr_template_completed').clone()

            completed_template.removeClass('hidden')
            completed_template.removeClass('tr_template_completed')

            completed_template.children('.td_unitCode').html(data.unitCode)
            completed_template.children('.td_unitName').html(data.unit.unitName)

            button.parent().find('.completed_table').append(completed_template)
        }

        // get the student's enrolment history and status
        let getEnrolmentInformation = function() {
            $.get(show, function(data) {
                data.current.forEach(function(enrolment) {
                    populateCurrentTable(enrolment)
                })

                data.history.forEach(function(enrolment) {
                    populateCompletedTable(enrolment)
                })
            })
        }
        getEnrolmentInformation()
    })

    // 3 Adding submissionData appropriately
    // 3.1 Internal Course Transfer
    let addModalData_1 = function(issue) {
        // parsing the JSON Object
        let submissionData = JSON.parse(issue.submissionData)

        // cloning and populating the data
        let modal_template = $('#modal_placeholder').find('.modal_template').clone()
        modal_template.find('.issue_1').removeClass('hidden')
        modal_template.removeClass('modal_template')
        modal_template.attr('id', issue.studentID + '_' + issue.issueID)

        modal_template.find('.studentID').html(issue.studentID)
        modal_template.find('.issue').html(issue.enrolment_issues.issueType)
        modal_template.find('.status').html(issue.status)

        modal_template.find('.yearOfRequestedTransfer').html(submissionData.yearOfRequestedTransfer)
        modal_template.find('.currentProgram').html(submissionData.fromProgramCode + ' ' + submissionData.fromProgramTitle)
        modal_template.find('.currentIntake').html(submissionData.fromProgramIntakeYear)
        modal_template.find('.proposedProgram').html(submissionData.toProgramCode + ' ' + submissionData.toProgramTitle)
        modal_template.find('.proposedIntakeYear').html(submissionData.toProgramYear)
        modal_template.find('.reason').html(submissionData.toReasons)

        // replace the id to be passed into the route
        let route = modal_template.find('.modal-footer').children('.submit').data('url')
        route = route.replace('stdID', issue.studentID)
        route = route.replace('issID', issue.issueID)

        // replace the original data-url with the replaced stdID and issID
        modal_template.find('.modal-footer').children('.submit').attr('data-url', route)

        modal_template.find('.modal-footer').children('.submit').attr('data-stdid', issue.studentID)
        modal_template.find('.modal-footer').children('.submit').attr('data-issid', issue.issueID)

        modal_template.find('.modal-footer').children('.submit').attr('data-first', submissionData.toProgramCode)
        modal_template.find('.modal-footer').children('.submit').attr('data-second', submissionData.toProgramYear)

        $('#modal_placeholder').append(modal_template)
    }

    // 3.2 Advanced Standing (Exemption)
    let addModalData_2 = function(issue) {
        // parsing the JSON Object
        let submissionData = JSON.parse(issue.submissionData)

        // cloning and populating the data
        let modal_template = $('#modal_placeholder').find('.modal_template').clone()
        modal_template.find('.issue_2').removeClass('hidden')
        modal_template.removeClass('modal_template')
        modal_template.attr('id', issue.studentID + '_' + issue.issueID)

        modal_template.find('.studentID').html(issue.studentID)
        modal_template.find('.issue').html(issue.enrolment_issues.issueType)
        modal_template.find('.status').html(issue.status)

        modal_template.find('.currentProgram').html(submissionData.fromProgramCode + ' ' + submissionData.fromProgramTitle)
        modal_template.find('.exemptionUnitCodeSought').html(submissionData.soughtUnitCode)
        modal_template.find('.exemptionUnitCodePrior').html(submissionData.exemptionUnitCodePrior + ' ' + submissionData.exemptionUnitTitlePrior)
        modal_template.find('.exemptionUnitYearPrior').html(submissionData.exemptionUnitYearPrior)

        // replace the id to be passed into the route
        let route = modal_template.find('.modal-footer').children('.submit').data('url')
        route = route.replace('stdID', issue.studentID)
        route = route.replace('issID', issue.issueID)

        // replace the original data-url with the replaced stdID and issID
        modal_template.find('.modal-footer').children('.submit').attr('data-url', route)

        modal_template.find('.modal-footer').children('.submit').attr('data-stdid', issue.studentID)
        modal_template.find('.modal-footer').children('.submit').attr('data-issid', issue.issueID)

        modal_template.find('.modal-footer').children('.submit').attr('data-first', submissionData.soughtUnitCode)
        modal_template.find('.modal-footer').children('.submit').attr('data-second', submissionData.exemptionUnitYearPrior)

        $('#modal_placeholder').append(modal_template)
    }

    // 3.3 Special Case: Preclusion
    let addModalData_3 = function(issue) {
        // parsing the JSON Object
        let submissionData = JSON.parse(issue.submissionData)

        // cloning and populating the data
        let modal_template = $('#modal_placeholder').find('.modal_template').clone()
        modal_template.find('.issue_3').removeClass('hidden')
        modal_template.removeClass('modal_template')
        modal_template.attr('id', issue.studentID + '_' + issue.issueID)

        modal_template.find('.studentID').html(issue.studentID)
        modal_template.find('.issue').html(issue.enrolment_issues.issueType)
        modal_template.find('.status').html(issue.status)

        modal_template.find('.preclusionUnit').html(submissionData.selectedForPreclusion)
        modal_template.find('.prerequisiteUnit').html(submissionData.selectedPrerequisite)
        modal_template.find('.reasonForPreclusion').html(submissionData.reasonForPreclusion)
        modal_template.find('.display-enrolment-status').attr('data-id', issue.studentID)

        // replace the id to be passed into the route
        let route = modal_template.find('.modal-footer').children('.submit').data('url')
        route = route.replace('stdID', issue.studentID)
        route = route.replace('issID', issue.issueID)

        // replace the original data-url with the replaced stdID and issID
        modal_template.find('.modal-footer').children('.submit').attr('data-url', route)

        modal_template.find('.modal-footer').children('.submit').attr('data-stdid', issue.studentID)
        modal_template.find('.modal-footer').children('.submit').attr('data-issid', issue.issueID)

        modal_template.find('.modal-footer').children('.submit').attr('data-first', modal_template.find('.preclusionUnit').html())
        modal_template.find('.modal-footer').children('.submit').attr('data-second', modal_template.find('.prerequisiteUnit').html())

        $('#modal_placeholder').append(modal_template)
    }

    // 2. Populate the table `student_enrolment_issues_table`
    let addData = function(issue) {
        let tr_template = $('#student_enrolment_issues_table').find('.tr_template').clone()
        tr_template.removeClass('hidden')
        tr_template.removeClass('tr_template')
        tr_template.attr('data-target', "#" + issue.studentID + "_" + issue.issueID)

        tr_template.children('.td_studentID').html(issue.studentID)
        tr_template.children('.td_studentName').html(issue.student.givenName + " " + issue.student.surname)
        tr_template.children('.td_issueType').html(issue.enrolment_issues.issueType)
        tr_template.children('.td_date').html(issue.created_at)

        $('#student_enrolment_issues_table').append(tr_template)

        // lastly, add the submissionData appropriately
        if (issue.issueID == 1) {
            addModalData_1(issue)
        } else if (issue.issueID == 2) {
            addModalData_2(issue)
        } else if (issue.issueID == 5) {
            addModalData_3(issue)
        } else {
            console.log("Something is wrong, this shouldn't occur");
        }
    }

    // 1. fetch submissionData from the Controller and decode them
    let getSubmissionData = function() {
        let url = $('#student_enrolment_issues_table').data('url')
        $.get(url, function(data) {
            data.forEach(function(issue) {
                addData(issue)
            })
        })
    }
    getSubmissionData()

    // 4. AJAX
    $(document).delegate(".submit", "click", function(){
        let url = $(this).data('url')
        let method = $(this).data('method')

        // for parameter
        let issid = $(this).data('issid')
        let stdid = $(this).data('stdid')

        // for the data to be passed
        let first  = $(this).data('first')
        let second = $(this).data('second')

        // contains all the data to be passed
        let data = []

        // update the url
        url = url.replace('stdID', stdid)
        url = url.replace('issID', issid)
        // console.log(url)

        if (issid == 1) {
            // case: course transfer
            data = {
                '_token': getToken(),
                'proposedProgramCode': first,
                'proposedIntakeYear': second
            }
        // endif
        } else if (issid == 2) {
            // case: exemption
            data = {
                '_token': getToken(),
                'exemptionUnitCode': first,
                'exemptionYear': second
            }
        // endif
        } else if (issid == 5) {
            // case: exemption
            data = {
                '_token': getToken(),
                'preclusionUnit': first,
                'prerequisiteUnit': second
            }
        // endif
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function() {
            window.location.reload()
        })
    })
}) ()
</script>
@stop
