@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item">Home</a>
                <a href="{{ url('/student/manageunits') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer') }}" class="list-group-item active">Internal Course Transfer</a>
                <a href="{{ url('/student/contactcoordinator') }}" class="list-group-item">Contact Coordinator</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Internal Course Transfer</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" >
                        <h3>Personal Information</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Title: </label>
                            <div class="dropdown col-sm-10">
                                <select class="form-control">
                                    <option value="one">Select One</option>
                                    <option value="two">Mr</option>
                                    <option value="three">Mrs</option>
                                    <option value="four">Ms</option>
                                    <option value="five">Dr</option>
                                </select>
                            </div>

                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="Your Name (In Block)">
                            </div>

                            <label class="control-label col-sm-2" for="stID">Student Id:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="studentID" placeholder="Student Id">
                            </div>

                            <label class="control-label col-sm-2" for="dob">Date OF Birth</label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" id="dob" placeholder="Date OF Birth (MM/DD/YYYY)">
                            </div>

                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="dob" placeholder="example@example.com">
                            </div>

                            <label class="control-label col-sm-2" for="mn">Mobile Number:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mn" placeholder="+6.......">
                            </div>
                        </div>

                        <h3 for="personalnfo">Current Program</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="prname">Program Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prname" placeholder="...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="prcode">Program code:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="prcode" placeholder="...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pryear">Program Year:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="pryear" placeholder="...">
                            </div>
                        </div>

                        <h3>Proposed Program</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="prname">Program Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prname" placeholder="...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="prcode">Program code:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="prcode" placeholder="...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pryear">Program Year:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="pryear" placeholder="...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Reasons for Requesting Transfer </label>
                            <div class="col-sm-10">
                                <textarea class="form-control custom-control" rows="3" style="resize:none"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop
