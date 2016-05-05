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
                <a href="{{ url('/student/internalcoursetransfer') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/contactcoordinator') }}" class="list-group-item active">Contact Coordinator</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Contact Course Coordinator</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name="cForm" role="form" action="{{ url('/student/contactcoordinator') }}" onsubmit="return validateForm()" method="POST">
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                            <input type="text" name="sName" class="form-control" id="pwd" placeholder="Your Name">
                        </div>

                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Title:</label>
                          <div class="col-sm-10">
                            <input type="text" name="tName" class="form-control" id="pwd" placeholder="...">
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Content: </label>
                            <div class="col-sm-10">
                                <textarea class="form-control custom-control" name="cName" rows="3" style="resize:none"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Course Coordinator: </label>
                            <div class="dropdown col-sm-10">
                                <!-- populate this from database -->
                                <select class="form-control">
                                    <option value="one">Jason..............</option>
                                    <option value="two">Yuzrie.............</option>
                                    <option value="three">.........................</option>
                                    <option value="four">CC4</option>
                                    <option value="five">CC5</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script>
function validateForm() {
    var x = document.forms["cForm"]["sName"].value;
    var y = document.forms["cForm"]["tName"].value;
    var z = document.forms["cForm"]["cName"].value;

    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
    if (y == null || y == "") {
        alert("Title must be filled out");
        return false;
    }
    if (z == null || z == "") {
        alert("Please type your message");
        return false;
    }
}
</script>
@stop
