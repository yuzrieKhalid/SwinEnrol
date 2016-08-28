@extends('layouts.app')

@section('extra_head')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        @include('admin.menu')

        <div class="col-md-9">
        <p class="pull-left visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
                </p> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Enrolment Dates</h3>
                </div>

                <div class="panel-body">
                    <form>
                        <!-- Sample 1: Foundation -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Foundation</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Semester 1</p>
                                        <div id="foundation_semester1">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="start" />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class="input-sm form-control" name="end" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Adjustment Date Due</p>
                                        <div id="foundation_semester1_due">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="adjust" />
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Semester 2</p>
                                        <div id="foundation_semester2">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="start" />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class="input-sm form-control" name="end" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Adjustment Date Due</p>
                                        <div id="foundation_semester2_due">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="adjust" />
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

                        <!-- Sample 2: Degree -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Degree</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Semester 1</p>
                                        <div id="degree_semester1">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="start" />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class="input-sm form-control" name="end" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Adjustment Date Due</p>
                                        <div id="degree_semester1_due">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="adjust" />
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Semester 2</p>
                                        <div id="degree_semester2">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="start" />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class="input-sm form-control" name="end" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Adjustment Date Due</p>
                                        <div id="degree_semester2_due">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="adjust" />
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div> <!-- end panel-body -->

                            <div class="panel-footer">
                                <!-- if the dates are updated, activated the asterisk, otherwise, remove it and let the button disabled -->
                                <button type="button" class="btn btn-default">Update</button>
                                <span class="label label-warning"><span class="glyphicon glyphicon-asterisk"></span></span>

                                <button type="button" class="btn btn-danger pull-right">Close Enrolment</button>
                            </div>
                        </div>

                        <!-- before activating the button, verify if all four levels have been opened, if no, only checks which has not yet been opened yet -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newEnrolment">Open New Enrolment</button>
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
                                <option>Foundation</option>
                                <option>Diploma</option>
                                <option>Degree</option>
                                <option>MA (TESOL)</option>
                                <option>MBA</option>
                                <option>Intensive English</option>
                            </select>

                            <label class="control-label" for="semesterTime">Level:</label>
                            <select class="form-control" name="semesterTime" id="semesterTime">
                                <option>Semester 1 & Winter Term</option>
                                <option>Semester 2 & Summer Term</option>
                                <option>Semester 1 & Semester 2</option>
                                <option>Semester 1 Only</option>
                                <option>Semester 2 Only</option>
                                <option>Winter Term Only</option>
                                <option>Summer Term Only</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Open</button>
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
    format: 'dd MM yyyy'
});
$('#foundation_semester2 .input-daterange').datepicker({
    format: 'dd MM yyyy'
});

$('#degree_semester2 .input-daterange').datepicker({
    format: 'dd MM yyyy'
});
$('#degree_winter_semester .input-daterange').datepicker({
    format: 'dd MM yyyy'
});

// due dates datepicker
$('#foundation_semester1_due .input-daterange').datepicker({
    format: 'dd MM yyyy'
});
$('#foundation_semester2_due .input-daterange').datepicker({
    format: 'dd MM yyyy'
});

$('#degree_semester1_due .input-daterange').datepicker({
    format: 'dd MM yyyy'
});
$('#degree_semester2_due .input-daterange').datepicker({
    format: 'dd MM yyyy'
});
</script>
@stop
