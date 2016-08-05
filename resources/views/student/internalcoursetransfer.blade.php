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
                <a href="{{ url('/student/internalcoursetransfer/create') }}" class="list-group-item active">Internal Course Transfer</a>
                <a href="{{ url('/student/enrolmentissues') }}" class="list-group-item">Other Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Internal Course Transfer</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="cForm" method="POST" action="{{ url('/student/internalcoursetransfer') }}" onsubmit="return validateForm()">

                        <h3>Proposed Program</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="prname">Program Title:</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" name="sPPn" class="form-control" id="prname" placeholder="..."> -->
                                <select class="form-control" name="sPPn" id="prname">
                                    <option value="none"></option>
                                    <option value="one">I047 Bachelor in Computer Science</option>
                                    <option value="two">I046 Bachelor of Software Engineering</option>
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="prcode">Program code:</label>
                            <div class="col-sm-2">
                                <input type="text" name="sPPc" class="form-control" id="prcode" placeholder="...">
                            </div>
                        </div>
                         -->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pryear">Program Year:</label>
                            <div class="col-sm-2">
                                <!-- <input type="text" class="form-control" id="pryear" placeholder="..."> -->
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
                    </form>
                </div>
            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script>
function validateForm() {
    var h = document.forms["cForm"]["sPPn"].value;
    var i = document.forms["cForm"]["sPPc"].value;
    var j = document.forms["cForm"]["sReason"].value;

    // need to be updated to get "select option" data
    if (h == null || h == "") {
        alert("Enter new Program Name");
        return false;
    }
    if (i == null || i == "") {
        alert("Enter your Program Code");
        return false;
    }
    if (j == null || j == "") {
        alert("Please enter a reason");
        return false;
    }
}
</script>
@stop
