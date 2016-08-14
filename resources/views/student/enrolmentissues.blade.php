@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item">Enrolment Status</a>
                <a href="{{ url('/student/enrolmenthistory') }}" class="list-group-item">Enrolment History</a>
                <a href="{{ url('/student/manageunits/create') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer/create') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/enrolmentissues') }}" class="list-group-item active">Other Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Contact Course Coordinator <small>for Enrolment Issues</small></h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name="cForm" role="form" action="{{ url('/student/contactcoordinator') }}" onsubmit="return validateForm()" method="POST">

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
                                        <option value="exemption">Application for Advanced Standing (Exemptions)</option>
                                        <option value="programWithdrawal">Application Withdrawal from Program</option>
                                        <option value="leaveOfAbsence">Application for Leave of Absence</option>
                                        <option value="timetableClash">Form for Student with Irreconcilable Timetable Clashes</option>
                                        <option value="deferAnOffer">Application to Defer an Offer (Locals Only)</option>
                                        <option value="others">Others (None of the above)</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <!-- Case: Exemption -->
                            <div class="hidden" id="exemption">
                                <h3>APPLICATION FOR ADVANCED STANDING (EXEMPTION)</h3>

                                <h4>Swinburne Unit (Exemption Sought)</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2" for="name">Unit Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="HIT0001" disabled>
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2" for="name">Unit Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Makan Mi Maggie" disabled>
                                    </div>
                                </div>

                                <h4>Grounds Upon Which Exemption is Sought (Prior Study)</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2" for="name">Unit Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="HIT0001">
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2" for="name">Unit Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Makan Mi Maggie">
                                    </div>
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2" for="name">Year:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="HIT0001">
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2" for="name">Institution Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Makan Mi Maggie">
                                    </div>
                                </div>
                            </div>

                            <!-- Case: Withdrawal -->
                            <div class="hidden" id="programWithdrawal">
                                <h3>APPLICATION FOR WITHDRAWAL FROM PROGRAM</h3>

                                <h4>Program Details</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2" for="name">Unit Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="HIT0001" disabled>
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2" for="name">Unit Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Makan Mi Maggie" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Withdrawal effective-->
                                    <label class="control-label col-sm-4" for="name">Withdrawal effective from year:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- Teaching period-->
                                    <label class="control-label col-sm-3" for="name">Teaching Period:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Dual Qualification? -->
                                    <label class="control-label col-sm-4" for="name">Is this a dual qualification?</label>
                                    <div class="col-sm-2">
                                        <label class="radio-inline"><input type="radio" name="dualYes">Yes</label>
                                        <label class="radio-inline"><input type="radio" name="dualNo">No</label>
                                    </div>
                                    <!-- Date of last class attended -->
                                    <label class="control-label col-sm-3" for="name">Last class attended:</label>
                                    <div class="col-sm-3" id="lastClassAttended_withdrawal">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="lastClassAttended" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Reason for Withdrawal -->
                                <label class="control-label" for="name">Reasons for withdrawal:</label>
                                <textarea class="form-control custom-control" name="cName" rows="3" style="resize:none"></textarea>

                                <!-- Conditions -->
                                <h4>Conditions</h4>
                                <p>
                                    1. For domestic students the last date for withdrawal without a Financial Penalty is by close of business on the Unit of Study Census Date OR prior to commencement of classes for unit of study undertaken in block mode. (For Unit of Study Census Date refer to your Confirmation of Enrolment/ Invoice).
                                </p>
                                <p>
                                    2. Refunds are subject to the return of your University ID card, fee receipt, and any other University property or materials you may have in your possession.
                                </p>
                                <p>
                                    3. No refund of fees will be made where a student withdraws from a unit of study after close of business of the Unit of Study Census Date.
                                </p>
                                <p>
                                    4. The final date for withdrawal without an Academic Penalty on your results is dependent on the number of teaching weeks for your unit of study or program. The dates
                                    are listed below:
                                    -> 12 and/or 14 week semester - by close of business on the Friday of the fourth teaching week
                                    -> 6 week term / semester - by close of business on the Friday of the second teaching week
                                </p>
                                <p>
                                    5. Before withdrawing students are advised to read the Withdrawal from Program or Unit of Study policy and procedure on
                                    Academic Course Regulations 2013, Chapter 2 Part 3: Withdrawal and cancellation at
                                    <a href="http://www.swinburne.edu.au/policies/regulations/courses.html">http://www.swinburne.edu.au/policies/regulations/courses.html</a>
                                </p>
                            </div>

                            <!-- Case: Leave of Absence -->
                            <div class="hidden" id="leaveOfAbsence">
                                <h3>APPLICATION FOR LEAVE OF ABSENCE</h3>

                                <h4>Details</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-3" for="name">Teaching Period:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-1" for="name">Year:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Date of last class attended -->
                                    <label class="control-label col-sm-3" for="name">Last class attended:</label>
                                    <div class="col-sm-3" id="lastClassAttended_loa">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="lastClassAttended" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Reason for LoA -->
                                <label class="control-label" for="name">Reasons for Leave of Absence:</label>
                                <textarea class="form-control custom-control" name="cName" rows="3" style="resize:none"></textarea>

                                <!-- Conditions -->
                                <h4>Conditions</h4>
                                <p>
                                    1. For domestic students the last date to lodge an application for leave of absence without a Financial Penalty is by close of business on the Unit of Study Census Date
                                    OR prior to commencement of classes for unit of study undertaken in block mode. (For Unit of Study Census Date refer to your Confirmation of Enrolment/Invoice).
                                </p>
                                <p>
                                    2. Refunds are subject to the return of your University ID card, fee receipt, and any other University property or materials you may have in your possession.
                                </p>
                                <p>
                                    3. No refund of fees will be made when a student withdraws from a unit of study after close business of the Unit of Study Census Date.
                                </p>
                                <p>
                                    4. Before applying for leave of absence students are advised to read the 'Deferral and Leave of Absence' policies and regulations on
                                    Academic Course Regulations 2013, Chapter 2 Part 4 Deferral and Part 5 Leave of Absence at
                                    <a href="http://www.swinburne.edu.au/policies/regulations/courses.html">http://www.swinburne.edu.au/policies/regulations/courses.html</a>
                                </p>
                            </div>

                            <!-- Case: Timetable Clash -->
                            <div class="hidden" id="timetableClash">
                                <h3>IRRECONCILABLE TIMETABLE CLASHES FORM</h3>

                                <h4>Timetable Clash Details</h4>
                                <h5>Unit 1</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Unit Code</td>
                                            <td>Activity (EG: LE1/01)</td>
                                            <td>Day</td>
                                            <td>Time</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </table>
                                </div>

                                <h5>Unit 2</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Unit Code</td>
                                            <td>Activity (EG: LE1/01)</td>
                                            <td>Day</td>
                                            <td>Time</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </table>
                                </div>

                                <h4>Special Conditions [ <small><span class="label label-primary"><span class="glyphicon glyphicon-ok"></span></span> the related box</small> ]</h4>
                                <div id="timetableSpecialCondition">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="spCase1">
                                            A final year mandatory unit has a timetable clash with another mandatory unit.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="spCase2">
                                            A mandatory pre-requisite unit (which cannot be deferred to a later semester in course) clashes with another unit.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="spCase3">
                                            A mandatory unit is offered once a year (which cannot be deferred to a later semester in course) and is clashed with another unit.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="spCase4">
                                            A mandatory unit is phasing out.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="spCase5">
                                            A mandatory unit is clashes with elective/minor units and there is no feasible replacement unit.
                                        </label>
                                    </div>
                                </div>

                                <h4>Informing the Unit Convenors</h4>
                                <h5>Unit Convenor 1</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Name</td>
                                            <td>Unit Code</td>
                                            <td>Date</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </table>
                                </div>

                                <h5>Unit Convenor 2</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Name</td>
                                            <td>Unit Code</td>
                                            <td>Date</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Disclaimers -->
                                <h4>Disclaimers</h4>
                                <p>
                                    1. It is your decision to enroll into the unit with timetable clashes.
                                </p>
                                <p>
                                    2. It is your responsibility to put in extra time and effort to revise on the lessons that you might have missed.
                                    Do not expect the academic staff (your lecturers) to repeat the lessons that you have missed. Academic staff will extend
                                    their assistance to you as much as they are able to, but the responsibility for you to cope with your lessons is solely yours.
                                </p>
                                <p>
                                    3. The University will not entertain any special consideration appeals if you are not able to cope in your studies due to your decision to attend clashes classes.
                                </p>
                                <p>
                                    4. The unit convenors of the units that have a timetable clash have to be informed about the timetable clash.
                                </p>
                            </div>

                            <!-- Case: Defer an Offer -->
                            <div class="hidden" id="deferAnOffer">
                                <h3>APPLICATION TO DEFER AN OFFER</h3>

                                <h4>Program Details</h4>
                                <div class="form-group">
                                    <!-- Program Code-->
                                    <label class="control-label col-sm-2" for="name">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- The Offered Program-->
                                    <label class="control-label col-sm-5" for="name">Program for which offer was received:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Major -->
                                    <label class="control-label col-sm-2" for="name">Major:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- Semester/Year -->
                                    <label class="control-label col-sm-2" for="name">Semester/Year:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- Semester/Year -->
                                    <label class="control-label col-sm-2" for="name">Deferment Period:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <!-- Reason for LoA -->
                                <label class="control-label" for="name">Reasons for Deferment:</label>
                                <textarea class="form-control custom-control" name="cName" rows="3" style="resize:none"></textarea>

                                <!-- Conditions -->
                                <h4>Conditions</h4>
                                <p>
                                    1. The granting of deferment is not automatic and requests are assessed on a case by case basis. Eligibility to defer an offer should be checked with the offering Faculty
                                </p>
                                <p>
                                    2. Ensure all sections of the form are completed including the "Applicant's Declaration" in Section D.
                                </p>
                                <p>
                                    3. Notify Student Central immediately of any change of address.
                                </p>
                                <p>
                                    4. The Enrolment Officer will contact you should further information be required.
                                </p>
                                <p>
                                    5. All applicants will be notified in writing of the outcome of their application.
                                </p>
                                <p>
                                    6. Applicants are advised to refer to the 'Deferment and Leave of Absence' policies and regulations on
                                    Academic Course Regulations 2013, Chapter 2 Part 4 Deferral and Part 5 Leave of Absence at
                                    <a href="http://www.swinburne.edu.au/policies/regulations/courses.html">http://www.swinburne.edu.au/policies/regulations/courses.html</a>
                                </p>
                            </div>

                        </div> <!-- end #studentIssue -->

                        <!-- if none of the above, show the basic content box -->
                        <div class="hidden" id="others">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Content: </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control custom-control" name="cName" rows="3" style="resize:none"></textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
// datepicker scripts
// withdrawal datepicker
$('#lastClassAttended_withdrawal .input-daterange').datepicker({
    format: 'dd MM yyyy'
})
// loa datepicker
$('#lastClassAttended_loa .input-daterange').datepicker({
    format: 'dd MM yyyy'
})
</script>

<script>
// issueTitle change form script
(function() {
    let selectIssue = $("#issueTitle");

    selectIssue.data("prev",selectIssue.val());
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
        console.log("Selected " + option);
        $('#' + option).removeClass("hidden")
    })
}) ()
</script>
@stop
