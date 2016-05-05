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
                <a href="{{ url('/admin') }}" class="list-group-item">Home</a>
                <a href="{{ url('/admin/managestudents') }}" class="list-group-item">Manage Students</a>
                <a href="{{ url('/admin/setenrolmentdates') }}" class="list-group-item active">Set Enrolment Dates</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Enrolment Dates</h3>
                </div>

                <div class="panel-body">
                    <form>
                        <!-- TODO: Add an option to open enrolment for which course -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Foundation</div>
                            <div class="panel-body">
                                <p>Semester 1</p>
                                <div id="semester1">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" />
                                    </div>
                                </div>

                                <p>Winter Semester</p>
                                <div id="winter_semester">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" />
                                    </div>
                                </div>

                                <p>Semester 2</p>
                                <div id="semester2">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" />
                                    </div>
                                </div>

                                <p>Summer Semester</p>
                                <div id="summer_semester">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" />
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Update Enrolment Dates</button>
                                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close Enrolment for Foundation</button>
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
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('#semester1 .input-daterange').datepicker({
    format: 'dd MM yyyy'
});
</script>
@stop
