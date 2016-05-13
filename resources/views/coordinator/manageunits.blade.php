@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link href="{{ asset('css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/coordinator') }}" class="list-group-item">Home</a>
                <a href="{{ url('/coordinator/managestudyplanner') }}" class="list-group-item">Manage Study Planner</a>
                <a href="{{ url('/coordinator/manageunitlisting') }}" class="list-group-item">Manage Unit Listings</a>
                <a href="{{ url('/coordinator/manageunits/create') }}" class="list-group-item active">Manage Units</a>
                <a href="{{ url('/coordinator/resolveenrolmentissues') }}" class="list-group-item">Resolve Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <!--  this panel shows the created units -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Manage Units</h1>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Unit ID</th>
                            <th>Unit Name</th>
                            <th></th>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Unit Name 1</td>
                            <td>
                                <a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </td>
                        </tr>

                        {{-- this is a laravel style comment, more powerful than <!-- -->; use this to comment laravel-specific codes--}}
                        {{-- I fetch all data for Unit in the controller and add each one here --}}
                        @foreach ($units as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unitName }}</td>
                            <td>
                                <a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addUnit">Create New Unit </button>
                </div>
            </div> <!-- end .panel -->
            <div class="row">
                <div class="page-header">
                    <h1>Units<a id="create" href="{{ route('coordinator.manageunits.create') }}" class="btn btn-primary pull-right">Create</a></h1>
                </div>
                <div id="unit_well" class="well" data-url="{{ route('coordinator.manageunits.index') }}">
                    <div id="unit_template" class="panel panel-primary hidden">
                        <div class="panel-heading">
                            <a href="{{ route('coordinator.manageunits.edit', 'id') }}" class="btn btn-warning pull-right">Update</a>
                        </div>
                        <div class="panel-body">
                            Data
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal 1-->
            <div class="modal fade" id="addUnit" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Create New Unit</h2>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="unitCode">Unit Code:</label>
                                <input type="text" name="unitCode" class="form-control" id="unitCode">

                                <label class="control-label" for="unitName">Unit Name:</label>
                                <input type="text" name="unitName" class="form-control" id="unitName">

                                <label class="control-label" for="courseCode">Course Code:</label>
                                <!-- <input type="text" name="courseCode" class="form-control" id="courseCode"> -->
                                <select class="form-control">
                                    <option value="0">None</option>

                                    @foreach($courses as $course)
                                    <option value="{{ $course->courseCode }}">{{ $course->courseCode }}</option>
                                    @endforeach
                                </select>

                                <div class="form-group">
                                    <label for="prerequisite">Prerequisite</label>
                                    <!-- <input type="text" name="prerequisite" class="form-control" id="prerequisite"> -->
                                    <select class="form-control">
                                        <option value="None">None</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->courseCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="corequisite">Corequisite</label>
                                    <!-- <input type="text" name="corequisite" class="form-control" id="corequisite"> -->
                                    <select class="form-control">
                                        <option value="None">None</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->courseCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="antirequisite">Antirequisite</label>
                                    <!-- <input type="text" name="antirequisite" class="form-control" id="antirequisite"> -->
                                    <select class="form-control">
                                        <option value="None">None</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->courseCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label" for="minimumCompletedUnits">Minimum Completed Units:</label>
                                <input id="minimumCompletedUnits" type="text" name="minimumCompletedUnits" value="0">

                                <label class="control-label" for="core">This is a Core:
                                    <input type="checkbox" autocomplete="off" name="core" id="core">
                                </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="submit btn btn-default" id="submit" data-method="POST" data-url="{{ route('coordinator.manageunits.store') }}">Create</button>
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
<script src="{{ asset('js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script>
$("input[name='minimumCompletedUnits']").TouchSpin({
  verticalbuttons: true
});
</script>

<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // Adds a task to the task well
    let addUnit = function(unit) {
        // TODO: for now follow using well and panel
        let unit_panel = $('#unit_template').clone()
        unit_panel.removeClass('hidden')
        // Gets update button HTML
        let update_button = unit_panel.children('.panel-heading').html()
        update_button = update_button.replace("id", unit.id) // Change URL to new ID
        unit_panel.children('.panel-heading').html(`${update_button} <h4>${unit.unitCode}</h4>`)
        unit_panel.children('.panel-body').html(unit.unitName)
        $('#unit_well').append(unit_panel)
    }

    // Get all tasks as a list
    let getUnits = function() {
        let url = $('#unit_well').data('url')
        $.get(url, function(data) {
            data.forEach(function(unit) {
                addUnit(unit);
            })
        })
    }

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $('#unitCode').val(),
            unitName: $('#unitName').val(),
            courseCode: $('#courseCode').val(),
            prerequisite: $('#prerequisite').val(),
            corequisite: $('#corequisite').val(),
            antirequisite: $('#antirequisite').val(),
            minimumCompletedUnits: $('#minimumCompletedUnits').val(),
            core: $('#core').val()
        }



        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "POST") {
                addUnit(data)
            } else {
                window.location = $('#create').attr('href')
            }
        })
    })
    // data.forEach is not a function
    getUnits()
})()
</script>
@stop
