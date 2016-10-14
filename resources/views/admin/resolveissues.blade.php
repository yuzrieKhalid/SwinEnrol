@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        <!-- @include('admin.menu') -->

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Resolve Issues</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="panel-body">
                                <table class="table table-hover" id="student_enrolment_issues_table" data-url="{{ route('admin.resolveissue.index') }}">
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
                                                <h3 class="modal-title">Issues Information</h3>
                                            </div>

                                            <!-- body -->
                                            <div class="modal-body">
                                                <!-- Generate According to the issueID -->
                                                <div class="issue_3 hidden">
                                                    <p>Student ID: <span class="text-warning studentID">4318595</span></p>
                                                    <p>Issue ID : <span class="text-warning issue">[Leave of Absence]</span></p>
                                                    <p>Status: <span class="text-warning status">Pending</span></p>

                                                    <h3>Withdrawal From Program Details</h3>
                                                    <p>Teaching Period: <span class="text-primary teachingPeriod">[4 Years]</span></p>
                                                    <p>Year: <span class="text-primary year">2018</span></p>
                                                    <p>Is An International Student: <span class="text-primary isForeigner">[YES]</span></p>
                                                    <p>International Student Officer: <span class="text-primary iso_name">[31-08-2016]</span></p>
                                                    <hr>
                                                    <p>Reason of Transfer:</p>
                                                    <blockquote>
                                                        <p class="reason">[Reason]</p>
                                                    </blockquote>
                                                </div>
                                            </div>

                                            <!-- footer -->
                                            <div class="modal-footer">
                                                <div class="hidden data-temporary">
                                                    <pre class="stdID">stdID</pre>
                                                    <pre class="issID">issID</pre>
                                                </div>
                                                <button type="button" class="btn btn-success submit" data-method="PUT" data-stdid="" data-issid=""
                                                    data-url="{{ route('admin.resolveissue.approve', ['studentID' => 'stdID', 'issueID' => 'issID' ]) }}">
                                                    Approve
                                                </button>
                                                <button type="button" class="btn btn-danger submit" data-method="DELETE"
                                                    data-url="{{ route('admin.resolveissue.disapprove', ['studentID' => 'stdID', 'issueID' => 'issID' ]) }}">
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
    // 3.1 Leave of Absence
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

        modal_template.find('.teachingPeriod').html(submissionData.teachingPeriod)
        modal_template.find('.year').html(submissionData.year)
        modal_template.find('.isForeigner').html(submissionData.isForeigner)
        modal_template.find('.iso_name').html(submissionData.iso_name)
        modal_template.find('.reason').html(submissionData.reasonForLOA)

        // needs to be this long because .replace() only creates new string, and does not replace the old string
        // replace the id to be passed into the route
        let route = modal_template.find('.modal-footer').children('.submit').data('url')
        route = route.replace('stdID', issue.studentID)
        route = route.replace('issID', issue.issueID)

        // replace the original data-url with the replaced stdID and issID
        modal_template.find('.modal-footer').children('.submit').attr('data-url', route)

        modal_template.find('.modal-footer').children('.submit').attr('data-stdid', issue.studentID)
        modal_template.find('.modal-footer').children('.submit').attr('data-issid', issue.issueID)

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
        if (issue.issueID == 3) {
            addModalData_3(issue)
        } else if (issue.issueID == 4) {
            addModalData_4(issue)
        } else {
            console.log("Something is wrong, this shouldn't occur");
        }
    }

    // 1. fetch submissionData from the Controller and decode them
    let getSubmissionData = function() {
        let url = $('#student_enrolment_issues_table').data('url')
        $.get(url, function(data) {
            data.forEach(function(issue) {
                console.log(issue);
                addData(issue)
            })
        })
    }
    getSubmissionData()

    // 4. AJAX
    $(document).delegate(".submit", "click", function(){
        let url = $(this).data('url')
        let method = $(this).data('method')
        let issid = $(this).data('issid')
        let stdid = $(this).data('stdid')

        // update the url
        url = url.replace('stdID', stdid)
        url = url.replace('issID', issid)

        let data = {
            '_token': getToken()
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
