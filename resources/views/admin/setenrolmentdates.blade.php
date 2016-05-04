@extends('layouts.app')

@section('extra_head')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@stop

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
                        <!-- TODO: Add an option to open enrolment for which course -->
                        <h3>Semester 1</h3>
                        <div id="semester1">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="start" />
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" name="end" />
                            </div>
                        </div>

                        <!-- <input type="text" class="Semester1" id="start1" placeholder="Start Date"></input>
                        <span>to</span>
                        <input type="text" class="Semester1" id="end1" placeholder="End Date"></input> -->

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


@section('extra_js')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('#semester1 .input-daterange').datepicker({
    format: 'dd MM yyyy'
});
</script>
@stop
