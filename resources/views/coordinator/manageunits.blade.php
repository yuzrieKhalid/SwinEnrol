@extends('layouts.app')

@section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        @include('coordinator.menu')

        <div class="col-md-9">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Manage Units</h1>
                </div>
                <div class="panel-body">
                    <!-- the table needs and url to allow the ajax to fetch the data from the controller (which is the json array) -->
                    <table class="table" id="units_table" data-url="{{ route('coordinator.manageunits.index') }}">
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
                                <a class="btn btn-default pull-right" href="{{ route('coordinator.manageunits.edit', $unit->unitCode) }}"  role="button">
                                    Edit
                                </a>
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

                                    <div class="form-group"> <!-- unitName -->
                                        <label class="control-label">Unit Name:</label>
                                        <input type="text" class="form-control" id="unitName">
                                    </div>

                                    <div class="form-group"> <!-- minimumCompletedUnits -->
                                        <label class="control-label">Minimum Completed Units:</label>
                                        <input class="numbers" type="text" value="0" id="minimumCompletedUnits">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prerequisite">Prerequisite</label>
                                        <select class="form-control" name="prerequisite">
                                            <option value="None">None</option>
                                            @foreach($units as $unit)
                                            <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="corequisite">Corequisite</label>
                                        <select class="form-control" name="corequisite">
                                            <option value="None">None</option>
                                            @foreach($units as $unit)
                                            <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="antirequisite">Antirequisite</label>
                                        <select class="form-control" name="antirequisite">
                                            <option value="None">None</option>
                                            @foreach($units as $unit)
                                            <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end .row -->
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>UNIT CONVENOR</label>
                                        <input class="form-control" type="text" id="unitConvenor">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>MAXIMUM NUMBER OF STUDENTS FOR UNIT</label>
                                        <input class="numbers" type="text" value="0" id="maxStudents">
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 col_lecture">
                                    <!-- Lecture Duration and Number of Group(s) -->
                                    <h4>LECTURE</h4>
                                    <div class="form-group">
                                        <label class="control-label">Duration (Hours)</label>
                                        <input class="numbers_duration" type="text" id="lectureDuration">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Number of Groups</label>
                                        <input class="numbers" type="text" value="0" id="lectureGroups">
                                    </div>
                                    <div class="form-group">
                                        <button id="addLecturer" type="button"><span class="glyphicon glyphicon-plus"></span> Add Lecturer</button>
                                    </div>
                                    <div class="form-group hidden lecturer_template">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="input_lecturer[]">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger remove_input"><span class="glyphicon glyphicon-remove"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col_tutorial">
                                    <!-- Tutorials Duration and Number of Group(s) -->
                                    <h4>
                                        TUTORIALS
                                        <span class="pull-right"><small><a id="toggle_tutorial" href="#" data-id="1">DISABLE TUTORIAL</a></small></span>
                                    </h4>
                                    <div class="tutorial_section">
                                        <div class="form-group">
                                            <label class="control-label">Duration (Hours)</label>
                                            <input class="numbers_duration" type="text" id="tutorialDuration">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Number of Groups</label>
                                            <input class="numbers" type="text" value="0" id="tutorialGroups">
                                        </div>

                                        <div class="form-group">
                                            <button id="addTutor" type="button"><span class="glyphicon glyphicon-plus"></span> Add Tutors</button>
                                        </div>
                                        <div class="form-group hidden tutor_template">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="input_tutor[]">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-danger remove_input"><span class="glyphicon glyphicon-remove"></span></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div> <!-- end .tutorial_section -->
                                </div> <!-- end .col -->
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
    // get dynamic data from the more information section
    // returns a string jsondata
    let getUnitInformation = function() {
        // get the name of the convenor, lecture and tutor details
        let convenor = $('#unitConvenor').val()
        let lectureDuration = $('#lectureDuration').val()
        let lectureGroups = $('#lectureGroups').val()
        let tutorialDuration = $('#tutorialDuration').val()
        let tutorialGroups = $('#tutorialGroups').val()
        let maxStudents = $('#maxStudents').val()

        // get the number of input boxes
        let lecturers_count = $('.input_lecturer').length
        let tutors_count = $('.input_tutor').length

        // get the value for each inputboxes including the first hidden input box
        let lecturers_inputs = $('input[name^=input_lecturer]').map(function(id, element)  { return $(element).val() }).get()
        let tutors_inputs    = $('input[name^=input_tutor]').map(function(id, element)     { return $(element).val() }).get()

        // get the array that skips the first empty/hidden element
        let lecturers = []
        let tutors = []
        for (let i = 0; i < lecturers_count; i++) { lecturers[i] = lecturers_inputs[i+1] }
        for (let i = 0; i < tutors_count; i++)    { tutors[i] = tutors_inputs[i+1] }

        // create the JSON Object manually when tutorial is disabled/enabled
        let jsondata = []
        if ($('#toggle_tutorial').attr('data-id') == 1) {
            // Tutorial is Enabled
            jsondata = [ {convenor}, {lecturers, lecturers_count}, {tutors, tutors_count} ]
        } else {
            // Tutorial is Disabled
            jsondata = [ {convenor}, {lecturers, lecturers_count} ]
        }

        // stringify before return
        let unitInfo = JSON.stringify(jsondata)

        // for testing only
        // let parser = JSON.parse(information)
        // console.log(parser)

        return unitInfo
    }

    // cleanly remove all three parents when pressing the x button
    //        <button>   <span>   <div>
    $('.col_lecture').on('click', '.remove_input', function() {
        $(this).parent().parent().parent().remove()
    })
    $('.col_tutorial').on('click', '.remove_input', function() {
        $(this).parent().parent().parent().remove()
    })

    // disabling Tutorial Section
    $('#toggle_tutorial').click(function() {
        if ($('#toggle_tutorial').attr('data-id') == 1) {
            // data-id = 1 : tutorial_section currently enabled
            $('.tutorial_section').addClass('hidden')       // hide the section
            $('#toggle_tutorial').html('ENABLE TUTORIAL')   // change the anchor text
            $('#toggle_tutorial').attr('data-id', 0)        // update the data-id
        } else {
            // data-id = 0 : tutorial_section currently disabled
            $('.tutorial_section').removeClass('hidden')    // show the section
            $('#toggle_tutorial').html('DISABLE TUTORIAL')  // change the anchor text
            $('#toggle_tutorial').attr('data-id', 1)        // update the data-id
            console.log('data-id: ' + $('#toggle_tutorial').attr('data-id'))
        }
    })

    // add lecturers
    $('#addLecturer').click(function() {
        let newLecturerTextbox = $('.col_lecture').find('.lecturer_template').clone()
        newLecturerTextbox.removeClass('lecturer_template')
        newLecturerTextbox.removeClass('hidden')
        newLecturerTextbox.addClass('input_lecturer')

        $('.col_lecture').append(newLecturerTextbox)
    })

    // add tutors
    $('#addTutor').click(function() {
        let newTutorTextbox = $('.col_tutorial').find('.tutor_template').clone()
        newTutorTextbox.removeClass('tutor_template')
        newTutorTextbox.removeClass('hidden')
        newTutorTextbox.addClass('input_tutor')

        $('.col_tutorial').append(newTutorTextbox)
    })

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
    let getUnits = function() {
        let url = $('#units_table').data('url')
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
            prerequisite: $('select[name=prerequisite]').val(),
            corequisite: $('select[name=corequisite]').val(),
            antirequisite: $('select[name=antirequisite]').val(),
            minimumCompletedUnits: $('#minimumCompletedUnits').val(),
            maxStudents: $('#maxStudents').val(),
            lectureDuration: $('#lectureDuration').val(),
            lectureGroupCount: $('#lectureGroups').val(),
            tutorialDuration: $('#tutorialDuration').val(),
            tutorialGroupCount: $('#tutorialGroups').val(),
            unitInfo: getUnitInformation()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            addUnit(data)
            window.location.reload()
        })
    })
    // data.forEach is not a function
    getUnits()
})()
</script>
@stop
