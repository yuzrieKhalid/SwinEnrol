@extends('layouts.app')

<!-- @section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="from-group panel-heading">
                    <h1>Current Enrolment
                      <span class="pull-right">
                          <a class="btn btn-default" data-toggle="collapse" title="Study Planner" href="#collapseExample"
                           aria-expanded="false" aria-controls="collapseExample" role="button">
                          <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a>
                      </span>
                    </h1>
                </div>
                <div class="collapse" id="collapseExample">


                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h1>Study Planner</h1>
                            </div>

                          </div> <!-- end .panel -->
                    </div>

                    <!-- ============== -->
                  </div>


                <div class="panel-body">
                  @include('student.phaseNotification')
                  <!-- <div class="col-md-6"> -->
                    <h2>
                        <small>Long Semester</small>
                    </h2>
                    <!-- </div> -->

                    <table class="table" id="enrolled_table" data-url="{{ route('student.manageunits.index') }}">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th colspan="2">Status</th>
                        </thead>

                        @if (!empty($enrolledLong))
                            @foreach ($enrolledLong as $unit)
                            <tr>
                                <td>{{ $unit->unitCode }}</td>
                                <td>{{ $unit->unit->unitName }}</td>
                                @if($unit->status == 'confirmed')
                                <!-- Has already passed -->
                                <td><span class="glyphicon glyphicon glyphicon-ok" data-toggle="tooltip" title="Enrolled" aria-hidden="true"></span></td>
                                @elseif($unit->status == 'dropped')
                                <!-- Dropped -->
                                <td><span class="glyphicon glyphicon glyphicon-remove" data-toggle="tooltip" title="Dropped" aria-hidden="true"></span></td>
                                @else
                                <!-- Waiting to be approved -->
                                <td><span class="glyphicon glyphicon glyphicon-alert" data-toggle="tooltip" title="Pending" aria-hidden="true"></span></td>
                                @endif
                                @if($phase->value == 1)
                                <td>
                                    <button type="submit" class="submit btn btn-sm" id="{{ $unit->unitCode }}" data-toggle="tooltip" title="Drop Unit"
                                        data-method="DELETE" data-url="{{ route('student.manageunits.destroy', $unit->unitCode) }}" data-length="{{ $unit->semesterLength }}">
                                        <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                    </button>
                                </td>

                                @elseif($phase->value == 6 || $phase->value == 7)
                                <td>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#adjustment-{{ $unit->unitCode }}-remove">
                                        <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                    </button>
                                </td>

                                <div class="modal fade" id="adjustment-{{ $unit->unitCode }}-remove" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title">Drop Unit</h2>
                                            </div>
                                            <div class="modal-body">
                                                <h4>{{ $unit->unitCode }} {{ $unit->unit->unitName }}</h4>
                                                <div class="form-group">
                                                    <label class="control-label">Reason: </label>
                                                    <textarea class="form-control custom-control reason" rows="3" style="resize:none"></textarea>
                                                </div>
                                                <p>IMPORTANT INFORMATION</p>
                                                <p>1.  It is the student's responsibility to check pre-requisite and mandatory requirements when changing their course components.</p>
                                                <p>2.  Enrolment Deadlines:</p>
                                                <p>(i)  Addition of units of study must be submitted by close of business on the Friday of the 1st week of classes for a 12 week semester or by close of business on the 1st day of 6 week term.</p>
                                                <p>(ii)  Withdrawal of units or before close of business of the Unit of Study will avoid academic penalties.  Withdrawal of unit is subject to forfeiture fee.  Please refer to the <a href="http://www.swinburne.edu.my/wp-content/uploads/2016/04/Refund-Tuition-Fees.pdf">Refund and Tuition Fee Policy</a>.</p>
                                            </div>

                                            <div class="panel-footer">
                                                <button type="button" class="adjustment_submit btn btn-danger" id="{{ $unit->unitCode }}" data-method="PUT" data-status="pending_drop"
                                                    data-url="{{ route('student.manageunits.update', $unit->unitCode) }}" data-length="{{ $unit->semesterLength }}">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </tr>
                            @endforeach
                        @else
                        <tr><td colspan="3">No units taken yet currently</td></tr>
                        @endif
                    </table>

                    <h2><small>Short Semester</small></h2>
                    <table class="table" id="enrolled_table" data-url="{{ route('student.manageunits.index') }}">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th colspan="2">Status</th>
                        </thead>

                        @if (!empty($enrolledShort))
                            @foreach ($enrolledShort as $unit)
                            <tr>
                                <td>{{ $unit->unitCode }}</td>
                                <td>{{ $unit->unit->unitName }}</td>
                                @if($unit->status == 'confirmed')
                                <!-- Has already passed -->
                                <td><span class="glyphicon glyphicon glyphicon-ok" data-toggle="tooltip" title="Enrolled" aria-hidden="true"></span></td>
                                @elseif($unit->status == 'pending')
                                <!-- Waiting to be approved (Phase 2) -->
                                <td><span class="glyphicon glyphicon glyphicon-alert" data-toggle="tooltip" title="Pending" aria-hidden="true"></span></td>
                                @else
                                <!-- Is currently taken -->
                                <td><span class="glyphicon glyphicon glyphicon-remove" data-toggle="tooltip" title="Remove" aria-hidden="true"></span></td>
                                @endif
                                @if($phase->value == 1 || $phase->value == 3 || $phase->value == 4)
                                <td>
                                  <button type="submit" class="submit btn btn-sm" id="{{ $unit->unitCode }}" data-toggle="tooltip" title="Drop Unit" data-method="DELETE" data-url="{{ route('student.manageunits.destroy', $unit->unitCode) }}" data-length="{{ $unit->semesterLength }}">
                                      <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                    </button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        @else
                        <tr><td colspan="3">No units taken yet currently</td></tr>
                        @endif
                    </table>
                </div>
            </div> <!-- end .panel -->

            <!-- Available units -->
            @if($phase->value == 1 || $phase->value == 3 || $phase->value == 6)
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Add Units
                            <!-- <span class="pull-right">
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span></a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                            </span> -->
                        </h1>
                    </div>

                    <div class="panel-body">
                        <div class="btn-group btn-group-justified" role="group" style="margin-bottom:10px;">
                            <!-- On press will make one of them hiddden -->
                            @if($phase->value == 1 || $phase->value == 6)
                                <a id="core_group" class="btn btn-default" href="#core-table" data-toggle="tab" role="button">Long Semester</a>
                            @endif
                            @if($phase->value == 1 || $phase->value == 3)
                                <a id="elective_group" class="btn btn-default" href="#elective-table" data-toggle="tab" role="button">Short Semester</a>
                            @endif
                        </div>

                        <div id="content" class="tab-content">
                            @if($phase->value == 1 || $phase->value == 6)
                                <div class="tab-pane fade active in @if ($errors->has('$unit->unitCode')) has-error @endif" id="core-table">
                                    <table class="table">
                                        <thead>
                                            <th>Unit Code</th>
                                            <th colspan="2">Unit Title</th>
                                        </thead>
                                        <!-- Check if already enrolled, don't add to this list -->
                                        @foreach ($longSemester as $unit)
                                            <tr>
                                                <td>{{ $unit->unitCode }}</td>
                                                <td>{{ $unit->unit->unitName }}</td>
                                                <td>
                                                    @if($phase->value == 6)
                                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#adjustment-{{ $unit->unitCode }}-add">
                                                        <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                                    </button>
                                                    @else
                                                    <button type="submit" id="{{ $unit->unitCode }}" class="submit btn btn-sm" data-method="POST" data-url="{{ route('student.manageunits.store') }}" data-length="long">
                                                        <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                                    </button>
                                                    @endif
                                                </td>
                                            </tr>

                                            @if($phase->value == 6)
                                            <div class="modal fade" id="adjustment-{{ $unit->unitCode }}-add" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h2 class="modal-title">Add Unit</h2>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>{{ $unit->unitCode }} {{ $unit->unit->unitName }}</h4>
                                                            <div class="form-group">
                                                                <label class="control-label">Reason: </label>
                                                                <textarea class="form-control custom-control reason" rows="3" style="resize:none"></textarea>
                                                            </div>
                                                            <p>IMPORTANT INFORMATION</p>
                                                            <p>1.  It is the student's responsibility to check pre-requisite and mandatory requirements when changing their course components.</p>
                                                            <p>2.  Enrolment Deadlines:</p>
                                                            <p>(i)  Addition of units of study must be submitted by close of business on the Friday of the 1st week of classes for a 12 week semester or by close of business on the 1st day of 6 week term.</p>
                                                            <p>(ii)  Withdrawal of units or before close of business of the Unit of Study will avoid academic penalties.  Withdrawal of unit is subject to forfeiture fee.  Please refer to the <a href="http://www.swinburne.edu.my/wp-content/uploads/2016/04/Refund-Tuition-Fees.pdf">Refund and Tuition Fee Policy</a>.</p>
                                                        </div>

                                                        <div class="panel-footer">
                                                            <button type="button" id="{{ $unit->unitCode }}" class="adjustment_submit btn btn-success" data-method="PUT"
                                                                data-url="{{ route('student.manageunits.update', $unit->unitCode) }}" data-length="long" data-status="pending_add">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            @endif

                            <div class="tab-pane fade @if($phase->value == 3) active in @endif" id="elective-table">
                                <table class="table">
                                    <thead>
                                        <th>Unit Code</th>
                                        <th colspan="2">Unit Title</th>
                                    </thead>
                                    @foreach ($shortSemester as $unit)
                                        <tr>
                                            <td>{{ $unit->unitCode }}</td>
                                            <td>{{ $unit->unit->unitName }}</td>
                                            <td>
                                                @if($phase->value == 3)
                                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#adjustment-{{ $unit->unitCode }}-add">
                                                    <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                                </button>
                                                @else
                                                <button type="submit" id="{{ $unit->unitCode }}" class="submit btn btn-sm" data-toggle="tooltip" title="Add Unit"
                                                    data-method="POST" data-url="{{ route('student.manageunits.store') }}" data-length="short">
                                                    <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                                </button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($phase->value == 3)
                                            <div class="modal fade" id="adjustment-{{ $unit->unitCode }}-add" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h2 class="modal-title">Add Unit</h2>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>{{ $unit->unitCode }} {{ $unit->unit->unitName }}</h4>
                                                            <div class="form-group">
                                                                <label class="control-label">Reason: </label>
                                                                <textarea class="form-control custom-control reason" rows="3" style="resize:none"></textarea>
                                                            </div>
                                                            <p>IMPORTANT INFORMATION</p>
                                                            <p>1.  It is the student's responsibility to check pre-requisite and mandatory requirements when changing their course components.</p>
                                                            <p>2.  Enrolment Deadlines:</p>
                                                            <p>(i)  Addition of units of study must be submitted by close of business on the Friday of the 1st week of classes for a 12 week semester or by close of business on the 1st day of 6 week term.</p>
                                                            <p>(ii)  Withdrawal of units or before close of business of the Unit of Study will avoid academic penalties.  Withdrawal of unit is subject to forfeiture fee.  Please refer to the <a href="http://www.swinburne.edu.my/wp-content/uploads/2016/04/Refund-Tuition-Fees.pdf">Refund and Tuition Fee Policy</a>.</p>
                                                        </div>

                                                        <div class="panel-footer">
                                                            <button type="button" id="{{ $unit->unitCode }}" class="adjustment_submit btn btn-success" data-method="PUT"
                                                                data-url="{{ route('student.manageunits.update', $unit->unitCode) }}" data-length="short" data-status="pending_add">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>


                </div> <!-- end .panel -->
            @endif
        </div>
    </div>
</div>
@stop

@section ('extra_js')
<script>
(function() {
    // tooltip
    $('[data-toggle="collapse"]').tooltip();

    // csrf token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // when clicking the '+' or 'x' button on phase 1
    $('.submit').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $(this).attr('id'),
            semesterLength: $(this).data('length')
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "POST") {
                if(data == 'ok')
                    window.location.reload()
                else
                    alert(data)
            } else {
                console.log('It is of unknown method')
                window.location.reload()
            }
        })
    })

    // when clicking the 'Submit' button on phase 3 or phase 6
    $('.adjustment_submit').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')

        let pendingstatus = $(this).data('status')
        let adjustmentreason = $(this).parent().parent().find('.modal-body').find('.form-group').find('.reason').val()
        if (adjustmentreason == 'undefined' || adjustmentreason == '') {
            adjustmentreason = 'No reason was given'
        }

        data = {
            _token: getToken(),
            unitCode: $(this).attr('id'),
            semesterLength: $(this).data('length'),
            reason: adjustmentreason,
            status: pendingstatus
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "PUT") {
                if(data == 'ok')
                    window.location.reload()
                else
                    alert(data)
            } else {
                console.log('It is of unknown method')
                window.location.reload()
            }
        })
    })
}) ()
</script>
@stop
