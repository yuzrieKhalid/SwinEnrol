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
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3>Enrolment Dates</h3>
                </div>

                <div class="panel-body">
                    <form>
                        @foreach($dates as $enrolment)
                        <!-- Sample 1: Foundation -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>[<small>{{ $enrolment->year }}</small>] {{ $enrolment->level }} {{ $enrolment->term }} </h4>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Enrolment Period</label>
                                        <div id="foundation_semester1">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="start" placeholder="{{ $enrolment->reenrolmentOpenDate }}" />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class="input-sm form-control" name="end" placeholder="{{ $enrolment->reenrolmentCloseDate }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Adjustment Date Due</label>
                                        <div id="foundation_semester1_due">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="adjust" placeholder="{{ $enrolment->adjustmentCloseDate }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Current Term Final Exams Result Release</label>
                                        <div id="exam_results_release">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="adjust" placeholder="{{ $enrolment->examResultsRelease }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->

                            </div> <!-- end panel-body -->

                            <div class="panel-footer">
                                <button type="button" class="btn btn-default" disabled>Update</button>
                                <button type="button" class="btn btn-danger pull-right">Close Enrolment</button>
                            </div>
                        </div>
                        @endforeach


                        <!-- before activating the button, verify if all four levels have been opened, if no, only checks which has not yet been opened yet -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newEnrolment">Open New Enrolment</button>
                    </form>
                </div>
            </div> <!-- end .panel -->

            <!-- Modal 1-->
            <div class="modal fade" id="newEnrolment" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Open New Enrolment</h2>
                        </div>

                        <div class="modal-body">
                            <label class="control-label" for="studyLevel">Level:</label>
                            <select class="form-control" name="studyLevel" id="studyLevel">
                                <option value="Foundation">Foundation</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Degree">Degree</option>
                                <option value="MA (TESOL)">MA (TESOL)</option>
                                <option value="MBA">MBA</option>
                                <option value="Intensive English">Intensive English</option>
                            </select>

                            <label class="control-label">Level:</label>
                            <select class="form-control" name="semesterTime" id="semesterTime">
                                <option value="Term 1">Term 1</option>
                                <option value="Term 2">Term 2</option>
                                <option value="Winter Term">Winter Term</option>
                                <option value="Summer Term">Summer Term</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="openEnrolment" data-dismiss="modal">Open</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal 1End -->
        </div>
    </div>
</div>
@stop


@section('extra_js')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
// semester datepicker
$('#foundation_semester1 .input-daterange').datepicker({
    // format: 'dd MM yyyy'
    format: 'yyyy-mm-dd'
})

$('#foundation_semester1_due .input-daterange').datepicker({
    format: 'yyyy-mm-dd'
})

$('#exam_results_release .input-daterange').datepicker({
    format: 'yyyy-mm-dd'
})

</script>
@stop
