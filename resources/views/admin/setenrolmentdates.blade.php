@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/admin/managestudents') }}" class="list-group-item">Manage Students</a>
                <a href="{{ url('/admin/setenrolmentdates') }}" class="list-group-item active">Set Enrolment Dates</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Enrolment Dates</h1>
                </div>

                <div class="panel-body">
                    <form>
                        <h2>Set Enrolment Dates</h2>

                        <h3>Semester 1</h3>
                        <input type="text" class="Semester1" id="start1" placeholder="Start Date"></input>
                        <span>to</span>
                        <input type="text" class="Semester1" id="end1" placeholder="End Date"></input>

                        <h3>Winter Semester</h3>
                        <input type="text" class="Semester2" id="start2" placeholder="Start Date"></input>
                        <span>to</span>
                        <input type="text" class="Semester2" id="end2" placeholder="End Date"></input>

                        <h3>Semester 2</h3>
                        <input type="text" class="Semester1" id="start1" placeholder="Start Date"></input>
                        <span>to</span>
                        <input type="text" class="Semester1" id="end1" placeholder="End Date"></input>

                        <h3>Summer Semester</h3>
                        <input type="text" class="Semester2" id="start2" placeholder="Start Date"></input>
                        <span>to</span>
                        <input type="text" class="Semester2" id="end2" placeholder="End Date"></input>

                        <br/><br/>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop
