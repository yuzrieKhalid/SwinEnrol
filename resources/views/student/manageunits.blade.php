@extends('layouts.app')

<!-- @section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop -->

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

        <div class="modal fade" id="rR" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Drop Unit</h2>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="reasonD">Reason: </label>
                                <textarea class="form-control custom-control" id="reasonD" rows="3" style="resize:none"></textarea>
                            </div>
                            <p>IMPORTANT INFORMATION</p>

                            <p>1.  It is the student's responsibility to check pre-requisite and mandatory requirements when changing their course components.</p>

                            <p>2.  Enrolment Deadlines:</p>

                            <p>(i)  Addition of units of study must be submitted by close of business on the Friday of the 1st week of classes for a 12 week semester or by close of business on the 1st day of 6 week term.</p>

                            <p>(ii)  Withdrawal of units or before close of business of the Unit of Study will avoid academic penalties.  Withdrawal of unit is subject to forfeiture fee.  Please refer to the <a href="http://www.swinburne.edu.my/wp-content/uploads/2016/04/Refund-Tuition-Fees.pdf">Refund and Tuition Fee Policy</a>.</p>

                        </div>

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal" >Submit</button>
                        </div>
                    </div>
                </div>
        </div>

        <div class="modal fade" id="rA" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Add Unit</h2>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="reasonD">Reason: </label>
                                <textarea class="form-control custom-control" id="reasonD" rows="3" style="resize:none"></textarea>
                            </div>
                            <p>IMPORTANT INFORMATION</p>

                            <p>1.  It is the student's responsibility to check pre-requisite and mandatory requirements when changing their course components.</p>

                            <p>2.  Enrolment Deadlines:</p>

                            <p>(i)  Addition of units of study must be submitted by close of business on the Friday of the 1st week of classes for a 12 week semester or by close of business on the 1st day of 6 week term.</p>

                            <p>(ii)  Withdrawal of units or before close of business of the Unit of Study will avoid academic penalties.  Withdrawal of unit is subject to forfeiture fee.  Please refer to the <a href="http://www.swinburne.edu.my/wp-content/uploads/2016/04/Refund-Tuition-Fees.pdf">Refund and Tuition Fee Policy</a>.</p>

                        </div>

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="from-group panel-heading">
                    <h1>Current Enrolment</h1>
                </div>

                <div class="panel-body">
                    <table class="table" id="enrolled_table" data-url="{{ route('student.manageunits.index') }}">
                        <thead>
                            <th>Unit Code</th>
                            <th colspan="2">Unit Title</th>
                        </thead>

                        <tr class="hidden tr_template">
                            <td class="td_unitCode"></td>
                            <td class="td_unitName"></td>
                            <td class="td_unitDelete">

                            </td>
                        </tr>

                        @if (!empty($enrolled))
                            @foreach ($enrolled as $unit)
                            <tr>
                                <td>{{ $unit->unitCode }}</td>
                                <td>{{ $unit->unit->unitName }}</td>
                                <td>
                                  <button type="submit" class="submit btn btn-sm" data-method="DELETE" data-url="{{ route('student.manageunits.destroy', $unit->unitCode) }}">
                                      <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                    </button>
                                </td>
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
                            <span class="pull-right">
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span></a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                            </span>
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
                                                <button type="submit" id="{{ $unit->unitCode }}"
                                                   class="submit btn btn-sm" data-method="POST"
                                                     data-url="{{ route('student.manageunits.store') }}">
                                                    <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                                </button>
                                            </td>
                                        </tr>
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
                                            <button type="submit" id="{{ $unit->unitCode }}"
                                               class="submit btn btn-sm" data-method="POST"
                                                 data-url="{{ route('student.manageunits.store') }}">
                                                <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
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
// TODO: implement the '+' button

(function() {

    // csrf token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // add another row in the enrolled unit panel
    let addUnit = function(unit) {
        if ($('#enrolled_table').find('.tr_template') == true) {
            let tr_template = $('#enrolled_table').find('.tr_template').clone()
            tr_template.removeClass('hidden')
            tr_template.removeClass('tr_template')

            let unitDelete = tr_template.children('.td_unitDelete').html()
            unitDelete = unitDelete.replace("id", unit.unitCode)
            tr_template.children('.td_unitCode').html(unit.unitCode)
            tr_template.children('.td_unitName').html(unit.unitName)
            tr_template.children('.td_unitDelete').html(`${unitDelete}`)

            $('#enrolled_table').append(tr_template)
        }
    }

    // fetch data from database through data-url
    let getUnits = function() {
        let url = $('#enrolled_table').data('url')
        $.get(url, function(data) {
            data.forEach(function(unit) {
                // add the unit to the datadata-target="#rR"
                addUnit(unit)
            })
        })
    }

    // when clicking the '+' button
    $('.submit').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $(this).attr('id')
        }
            $(this).parent().parent().remove();

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "POST") {
                addUnit(data)
                window.location.reload()
            } else {
                console.log('It is of unknown method')
                window.location.reload()
            }
        })

        // $('#rA').modal('show');

        // @if(Session::has('error'))
        //   alert("{{Session::get('error')}}");
        // @endif

        // $(document).on("click", "remove" , function() {
        //     $(this).parent().remove();
        // });
    })
}) ()
</script>
@stop
