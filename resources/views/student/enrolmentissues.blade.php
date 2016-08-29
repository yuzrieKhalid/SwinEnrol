@extends('layouts.app')

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
                                        <option>Select One</option>
                                        <option value="ict">Internal Course Transfer</option>
                                        <option value="exemption">Application for Advanced Standing (Exemptions)</option>
                                        <option value="programWithdrawal">Application Withdrawal from Program</option>
                                        <option value="others">Others (None of the above)</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <!-- Case: Internal Course Transfer -->
                            <div class="hidden" id="ict">
                                <h3>Internal Course Transfer</h3>
                                <h4>YEAR/SEMESTER OF REQUESTED TRANSFER</h4>
                                    <input type="text" name="yearOfRequestedTransfer" class="form-control">

                                <h4>CURRENT PROGRAM</h4>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="currentProgramCode" class="form-control" placeholder="fetch from db" disabled>
                                    </div>
                                        <label class="control-label col-sm-2">Program Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="currentProgramTitle" class="form-control" placeholder="fetch from db" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-5">Year of first enrolment in current program:</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="currentProgramIntakeYear" class="form-control">
                                    </div>
                                </div>

                                <h4>PROPOSED PROGRAM</h4>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="prname">Program Title:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="sPPn" id="prname">
                                            <option value="none"></option>
                                            <option value="one">I047 Bachelor in Computer Science</option>
                                            <option value="two">I046 Bachelor of Software Engineering</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pryear">Program Year:</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="sPPc" id="prcode">
                                            <option value="none"></option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Reasons for Requesting Transfer </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control custom-control" name="sReason" rows="3" style="resize:none"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" value="Submit" class="btn btn-default">
                                    </div>
                                </div>
                            </div>

                            <!-- Case: Exemption -->
                            <div class="hidden" id="exemption">
                                <h3>APPLICATION FOR ADVANCED STANDING (EXEMPTION)</h3>

                                <h4>Swinburne Unit (Exemption Sought)</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2" for="name">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="HIT0001" disabled>
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2" for="name">Program Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Makan Mi Maggie" disabled>
                                    </div>
                                </div>

                                <h4>Grounds Upon Which Exemption is Sought (Prior Study)</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2" for="name">Unit Code:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="HIT0001">
                                    </div>

                                    <label class="control-label col-sm-2" for="name">Year:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="2010">
                                    </div>
                                    <br>

                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2" for="name">Unit Title:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Makan Mi Maggie">
                                    </div>
                                    <!-- Unit Code-->

                                </div>
                            </div>

                            <!-- Case: Withdrawal -->
                            <div class="hidden" id="programWithdrawal">
                                <h3>APPLICATION FOR WITHDRAWAL FROM PROGRAM</h3>

                                <h4>Program Details</h4>
                                <div class="form-group">
                                    <!-- Unit Code-->
                                    <label class="control-label col-sm-2" for="name">Program Code:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="HIT0001" disabled>
                                    </div>
                                    <!-- Unit Title-->
                                    <label class="control-label col-sm-2" for="name">Program Title:</label>
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
<script>
// issueTitle change form script
(function() {
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
        console.log("Selected " + option);
        $('#' + option).removeClass("hidden")
    })
}) ()
</script>
@stop
