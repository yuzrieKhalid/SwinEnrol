@extends('layouts.app')

@section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Manage Units</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" method="GET" action="{{ route('coordinator.manageunits.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name='search' placeholder="Search" @if(isset($search)) value="{{ $search }}" @endif>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                        <div class="input-group">
                            <a class="btn btn-default" href="{{ route('coordinator.manageunits.index') }}" role="button">Reset</a>
                        </div>
                    </form>
                    <!-- the table needs and url to allow the ajax to fetch the data from the controller (which is the json array) -->
                    <table class="table student" id="units_table" data-url="{{ route('coordinator.manageunits.index') }}">
                        <thead>
                            <th>Unit ID</th>
                            <th>Unit Name</th>
                            <th></th>
                            <th><span><a class="btn btn-default" href="#" role="button" data-toggle="modal" title="Add New Unit" data-target="#addUnit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                        </thead>
                        @foreach($units as $unit)
                        @if(isset($unit))
                        <tr>
                            <td class="td_unitCode">{{ $unit->unitCode }}</td>
                            <td class="td_unitName">{{ $unit->unitName }}</td>
                            <td>
                                <div class="pull-right">
                                    <a class="btn btn-default" href="{{ route('coordinator.manageunits.edit', $unit->unitCode) }}" role="button">Edit</a>
                                    <a class="btn btn-default" href="{{ route('coordinator.managerequisites.edit', $unit->unitCode) }}" role="button">Manage Requisites</a>
                                </div>
                            </td>
                            <td class="td_unitDelete">
                                <button id="submit" type="submit" class="btn btn-danger submit" data-method="DELETE" data-url="{{ route('coordinator.manageunits.destroy', $unit->unitCode) }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </td>
                        </tr>
                        @else
                        <tr class="hidden tr_template">
                            <td class="td_unitCode"><a href="#"></a></td>
                            <td class="td_unitName"><a href="#"></a></td>
                            <td class="td_unitEdit">
                                <a class="btn btn-default  pull-right" href="{{ route('coordinator.manageunits.edit', 'id') }}" role="button">
                                    Edit
                                </a>
                            </td>
                            <td class="td_unitDelete">

                                <button id="submit" type="submit" class="btn btn-danger submit" data-method="DELETE" data-url="{{ route('coordinator.manageunits.destroy', $unit->unitCode) }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </td>

                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div> <!-- end .panel -->

            <!-- Add Unit Modal-->
            <div class="modal fade" id="addUnit" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Create New Unit</h2>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <!-- unitCode -->
                                        <label class="control-label">Unit Code:</label>
                                        <input type="text" class="form-control" id="unitCode">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group"> <!-- creditPoints -->
                                        <label class="control-label">Credit Points:</label>
                                        <input class="creditPoints" type="text" value="0" id="creditPoints">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group"> <!-- studyLevel -->
                                        <label class="control-label">Study Level:</label>
                                        <select class="form-control" name="studyLevel" id="studyLevel">
                                            @foreach($studyLevels as $studyLevel)
                                                <option value="{{ $studyLevel->studyLevel }}">{{ $studyLevel->studyLevel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group"> <!-- unitName -->
                                        <label class="control-label">Unit Name:</label>
                                        <input type="text" class="form-control" id="unitName">
                                    </div>
                                </div>
                            </div> <!-- end .row -->
                        </div> <!-- end .modal-body -->

                        <div class="modal-footer">
                            <button type="submit" class="submit btn btn-default" id="submit" data-method="POST" data-url="{{ route('coordinator.manageunits.store') }}">Create</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Add Unit Modal -->
        </div>
    </div>
</div>
@stop

@section('extra_js')

<script>
(function() {
    // prettify the numbers column
    $(".numbers").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })
    $(".numbers_duration").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        decimals: 1,                    // add decimal point
        step: 0.5,                      // adds 0.5 every increase/decrease
        postfix: 'HOURS'                // adds HOURS at the end of the input
    })
    $(".creditPoints").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999,                      // maximum number can be added
        decimals: 1,                    // add decimal point
        step: 12.5                       // adds 0.5 every increase/decrease
    })

    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // Adds a task to the task well
    let addUnit = function(unit) {
        if ($('#units_table').find('.tr_template') == true) {
            let tr_template = $('#units_table').find('.tr_template').clone()
            tr_template.removeClass('hidden')
            tr_template.removeClass('tr_template')

            let unitEdit = tr_template.children('.td_unitEdit').html()
            unitEdit = unitEdit.replace("id", unit.unitCode)
            let unitDelete = tr_template.children('.td_unitDelete').html()
            unitDelete = unitDelete.replace("id", unit.unitCode)

            tr_template.children('.td_unitCode').html(unit.unitCode)
            tr_template.children('.td_unitName').html(unit.unitName)
            tr_template.children('.td_unitEdit').html(`${unitEdit}`)
            tr_template.children('.td_unitDelete').html(`${unitDelete}`)

            $('#units_table').append(tr_template)
        }
    }


    // Get all tasks as a list
    // let getUnits = function() {
    //     let url = $('#units_table').data('url')
    //     $.get(url, function(data) {
    //         data.forEach(function(unit) {
    //             addUnit(unit);
    //         })
    //     })
    // }

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $('#unitCode').val(),
            unitName: $('#unitName').val(),
            creditPoints: $('#creditPoints').val(),
            studyLevel: $('#studyLevel').val()
        }

        let inputCheck = '';

        // check unit code
        if(data['unitCode'] == '')
            inputCheck += 'Please enter a Unit Code.';

        if(method == 'POST' && inputCheck != '')
            alert(inputCheck)
        else
        {
            $.ajax({
                'url': url,
                'method': method,
                'data': data
            }).done(function(data) {
                addUnit(data)
                window.location.reload()
            })
        }
    })
})()
</script>
@stop
