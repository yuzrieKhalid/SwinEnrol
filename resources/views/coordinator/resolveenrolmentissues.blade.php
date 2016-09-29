@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        @include('coordinator.menu')

        <div class="col-md-9">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Resolve Enrolment Issues</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form">
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

                                                    <h3>Advanced Standing (Exemption) Details</h3>
                                                    <p>Current Program: <span class="text-primary currentProgram">[I047] [Bachelor of Computer Science]</span></p>
                                                    <hr>
                                                    <p>Exemption Unit: <span class="text-success exemptionUnit">[HIT 1302] [Introduction to Business Information System]</span></p>
                                                    <p>Exemption Year: <span class="text-success exemptionYear">[2018]</span></p>
                                                    <p class="attachmentData">Attachment: <a href="#">iCATS Results Slip.pdf</a></p>
                                                </div>
                                            </div>

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
                    </form>
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

        console.log(modal_template.find('.modal-footer').children('.submit').data('url'));
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
        modal_template.find('.exemptionUnit').html(submissionData.exemptionUnitCode + ' ' + submissionData.exemptionUnitTitle)
        modal_template.find('.exemptionYear').html(submissionData.exemptionUnitYear)
        // TODO: ABILITY TO DOWNLOAD THE ATTACHMENT
        // modal_template.find('.attachmentData').children('a').attr('data-url', issue.attachmentData)
        // modal_template.find('.attachmentData').children('a').html(issue.attachmentData.file)

        // replace the id to be passed into the route
        let route = modal_template.find('.modal-footer').children('.submit').data('url')
        route = route.replace('stdID', issue.studentID)
        route = route.replace('issID', issue.issueID)

        // replace the original data-url with the replaced stdID and issID
        modal_template.find('.modal-footer').children('.submit').attr('data-url', route)

        modal_template.find('.modal-footer').children('.submit').attr('data-stdid', issue.studentID)
        modal_template.find('.modal-footer').children('.submit').attr('data-issid', issue.issueID)

        modal_template.find('.modal-footer').children('.submit').attr('data-first', submissionData.exemptionUnitCode)
        modal_template.find('.modal-footer').children('.submit').attr('data-second', submissionData.exemptionUnitYear)

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
        let code  = $(this).data('first')
        let year = $(this).data('second')

        // contains all the data to be passed
        let data = []

        // update the url
        url = url.replace('stdID', stdid)
        url = url.replace('issID', issid)
        console.log(url)

        if (issid == 1) {
            // case: course transfer
            data = {
                '_token': getToken(),
                'proposedProgramCode': code,
                'proposedIntakeYear': year
            }
        // endif
        } else if (issid == 2) {
            // case: exemption
            data = {
                '_token': getToken(),
                'exemptionUnitCode': code,
                'exemptionYear': year
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
