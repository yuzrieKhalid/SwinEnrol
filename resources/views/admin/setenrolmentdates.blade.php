@extends('layouts.app')

@section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
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

                <div class="panel-body" id="enrolmentData" data-url="{{ route('admin.setenrolmentdates.index') }}">
                    @foreach($dates as $enrolment)
                    <div class="panel panel-default" id="template">
                        <div class="panel-heading" id="template_heading">
                            <h4>[<small>{{ $enrolment->year }}</small>] {{ $enrolment->level }} {{ $enrolment->term }} </h4>
                        </div>

                        <div class="panel-body" id="template_body">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Enrolment Period</label>
                                    <div id="open_close_dates">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="start" placeholder="{{ $enrolment->reenrolmentOpenDate }}" />
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" name="end" placeholder="{{ $enrolment->reenrolmentCloseDate }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Adjustment Date Due</label>
                                    <div id="adjustment_date">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="adjust" placeholder="{{ $enrolment->adjustmentCloseDate }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Current Term Final Exams Result Release</label>
                                    <div id="results_release_date">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="adjust" placeholder="{{ $enrolment->examResultsRelease }}" />
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->

                        </div> <!-- end panel-body -->

                        <div class="panel-footer">
                            <button type="button" class="btn btn-default submit" id="update"
                                data-method="POST" data-url="{{ route('admin.setenrolmentdates.update', 'enrolment->id') }}">
                                Update
                            </button>

                            <button type="button" class="btn btn-danger pull-right submit" id="delete"
                                data-method="POST" data-url="{{ route('admin.setenrolmentdates.destroy', $enrolment->id) }}">
                                Close Enrolment
                            </button>
                        </div>
                    </div>
                    @endforeach

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newEnrolment">Open New Enrolment</button>
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
                            <label class="control-label">Year:</label>
                            <input class="form-control" type="number" id="year" value="2016"/>

                            <label class="control-label" for="studyLevel">Level:</label>
                            <select class="form-control" name="level" id="level">
                                <option value="Foundation">Foundation</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Degree">Degree</option>
                                <option value="MA (TESOL)">MA (TESOL)</option>
                                <option value="MBA">MBA</option>
                                <option value="Intensive English">Intensive English</option>
                            </select>

                            <label class="control-label">Semester Term:</label>
                            <select class="form-control" name="term" id="term">
                                <option value="Term 1">Term1</option>
                                <option value="Term 2">Term2</option>
                                <option value="Winter Term">WinterTerm</option>
                                <option value="Summer Term">SummerTerm</option>
                            </select>

                            <label>Enrolment Period</label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" id="reenrolmentCloseDate" name="start"/>
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" id="reenrolmentOpenDate" name="end"/>
                            </div>

                            <label>Adjustment Date Due</label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" id="adjustmentCloseDate" name="adjust"/>
                            </div>

                            <label>Current Term Final Exams Result Release</label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" id="examResultsRelease" name="adjust"/>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default submit" id="openEnrolment"
                                 data-method="POST" data-url="{{ route('admin.setenrolmentdates.store') }}">
                                 Open
                             </button>
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
// $('#foundation_semester1 .input-daterange').datepicker({
//     format: 'yyyy-mm-dd'
// })

(function() {

    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            year: $('#year').val(),
            term: $('select[name=term]').val(),
            level: $('select[name=level]').val(),
            reenrolmentCloseDate: $('#reenrolmentCloseDate').val(),
            reenrolmentOpenDate: $('#reenrolmentOpenDate').val(),
            adjustmentCloseDate: $('#adjustmentCloseDate').val(),
            examResultsRelease: $('#examResultsRelease').val()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "POST") {
                window.location.reload()
            }
        })
    })
}) ()
</script>
@stop
