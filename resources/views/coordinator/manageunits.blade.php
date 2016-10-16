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
                            <hr>

                            <!-- Prerequisite -->
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label>Prerequisite</label><button id="addPrerequisiteGroup" type="button" class="btn btn-default pull-right">Add Group</button>
                                </div>
                            </div>
                            <div class="prerequisite_groups">
                                <div class="panel panel-default panel-body  prerequisite_group_template">
                                    <div class="prerequisites">
                                        <div class="row form-group">
                                            <div class="col-md-11">
                                                <label>Prerequisite Group</label>
                                                <button type="button" class="btn btn-danger remove_group">Remove Group</button>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-default addPrerequisite"><span class="glyphicon glyphicon-plus"></span></button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="prerequisiteGroupCount">Minimum Units to Complete:</label>
                                                <input type="text" class="form-control" id="prerequisiteGroupCount">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row  prerequisite_template">
                                            <div class="col-md-11">
                                                <div class="form-group prerequisite">
                                                    <select class="form-control" name="prerequisite[]">
                                                        <option value="None">Select one</option>
                                                        @foreach($units as $unit)
                                                        <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-danger remove_input"><span class="glyphicon glyphicon-remove"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <!-- Corequisite -->
                            <div class="row form-group">
                                <div class="col-md-11">
                                    <label>Corequisite</label>
                                </div>
                                <div class="col-md-1">
                                    <button id="addCorequisite" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>
                                </div>
                            </div>
                            <div class="corequisites">
                                <div class="row hidden corequisite_template">
                                    <div class="col-md-11">
                                        <div class="form-group corequisite">
                                            <select class="form-control" name="corequisite[]">
                                                <option value="None">Select one</option>
                                                @foreach($units as $unit)
                                                <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger remove_input"><span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <!-- Antirequisite -->
                            <div class="row form-group">
                                <div class="col-md-11">
                                    <label>Antirequisite</label>
                                </div>
                                <div class="col-md-1">
                                    <button id="addAntirequisite" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>
                                </div>
                            </div>
                            <div class="antirequisites">
                                <div class="row hidden antirequisite_template">
                                    <div class="col-md-11">
                                        <div class="form-group antirequisite">
                                            <select class="form-control" name="antirequisite[]">
                                                <option value="None">Select one</option>
                                                @foreach($units as $unit)
                                                <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger remove_input"><span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    // get prerequisite information
    let getPrerequisite = function() {
        // get the number of requisites
        let requisite_count = $('.prerequisite').length - 1

        // get the values in each selection
        let requisite_inputs = $('select[name^=prerequisite]').map(function(id, element) { return $(element).val() }).get()

        // get the array without the first hidden element
        let requisite = []
        for (let i = 0; i < requisite_count; i++) { requisite[i] = requisite_inputs[i+1] }

        // create json string and return
        return requisite
    }

    // get corequisite information
    let getCorequisite = function() {
        // get the number of requisites
        let requisite_count = $('.corequisite').length - 1

        // get the values in each selection
        let requisite_inputs = $('select[name^=corequisite]').map(function(id, element)  { return $(element).val() }).get()

        // get the array without the first hidden element
        let requisite = []
        for (let i = 0; i < requisite_count; i++) { requisite[i] = requisite_inputs[i+1] }

        // create json string and return
        return requisite
    }

    // get antirequisite information
    let getAntirequisite = function() {
        // get the number of requisites
        let requisite_count = $('.antirequisite').length - 1

        // get the values in each selection
        let requisite_inputs = $('select[name^=antirequisite]').map(function(id, element)  { return $(element).val() }).get()

        // get the array without the first hidden element
        let requisite = []
        for (let i = 0; i < requisite_count; i++) { requisite[i] = requisite_inputs[i+1] }

        // create json string and return
        return requisite
    }

    // add prerequisite group
    $('#addPrerequisiteGroup').click(function() {
        let newRequisiteTextbox = $(this).parent().parent().parent().find('.prerequisite_group_template').clone()
        newRequisiteTextbox.removeClass('prerequisite_group_template')
        newRequisiteTextbox.removeClass('hidden')
        newRequisiteTextbox.addClass('prerequisite_group')

        $('.prerequisite_groups').append(newRequisiteTextbox)

        // remove pre-requisite group selection when pressing the x button
        $('.prerequisite_groups').on('click', '.remove_group', function() {
            $(this).parent().parent().parent().parent().remove()
        })

        // remove pre-requisite selection when pressing the x button
        $('.prerequisites').on('click', '.remove_input', function() {
            $(this).parent().parent().parent().remove()
        })
    })

    // add prerequisite
    $('.prerequisites').on('click', '.addPrerequisite', function() {
        let newRequisiteTextbox = $(this).parent().parent().parent().find('.prerequisite_template').clone()
        newRequisiteTextbox.find('.prerequisite_template')
        newRequisiteTextbox.removeClass('prerequisite_template')
        newRequisiteTextbox.removeClass('hidden')
        newRequisiteTextbox.addClass('input_prerequisite')

        $('.prerequisites').append(newRequisiteTextbox)
    })

    // add corequisite
    $('#addCorequisite').click(function() {
        let newRequisiteTextbox = $('.corequisites').find('.corequisite_template').clone()
        newRequisiteTextbox.removeClass('corequisite_template')
        newRequisiteTextbox.removeClass('hidden')
        newRequisiteTextbox.addClass('input_corequisite')

        $('.corequisites').append(newRequisiteTextbox)
    })

    // add antirequisite
    $('#addAntirequisite').click(function() {
        let newRequisiteTextbox = $('.antirequisites').find('.antirequisite_template').clone()
        newRequisiteTextbox.removeClass('antirequisite_template')
        newRequisiteTextbox.removeClass('hidden')
        newRequisiteTextbox.addClass('input_antirequisite')

        $('.antirequisites').append(newRequisiteTextbox)
    })

    // remove requisite selection when pressing the x button
    $('.prerequisites').on('click', '.remove_input', function() {
        $(this).parent().parent().parent().remove()
    })
    $('.corequisites').on('click', '.remove_input', function() {
        $(this).parent().parent().parent().remove()
    })
    $('.antirequisites').on('click', '.remove_input', function() {
        $(this).parent().parent().parent().remove()
    })

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
    $(".creditPoints").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999,                      // maximum number can be added
        decimals: 1,                    // add decimal point
        step: 0.5                       // adds 0.5 every increase/decrease
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
            prerequisite: getPrerequisite(),
            corequisite: getCorequisite(),
            antirequisite: getAntirequisite(),
            creditPoints: $('#creditPoints').val(),
            maxStudentCount: $('#maxStudents').val(),
            lectureDuration: $('#lectureDuration').val(),
            lectureGroupCount: $('#lectureGroups').val(),
            tutorialDuration: $('#tutorialDuration').val(),
            tutorialGroupCount: $('#tutorialGroups').val(),
            studyLevel: $('#studyLevel').val(),
            unitInfo: getUnitInformation()
        }

        let inputCheck = '';
        let prerequisite = []
        let corequisite = []
        let antirequisite = []

        // check unit code
        if(data['unitCode'] == '')
            inputCheck += 'Please enter a Unit Code.';

        // check if requisites are set
        data['prerequisite'].forEach(function(unit){
            if(prerequisite.indexOf(unit) >= 0)
                inputCheck += '\nPrerequisite has a duplicate unit. (' + unit + ')';

            prerequisite.push(unit)

            if(unit == 'None')
                inputCheck += '\nPrerequisite has unselected units.';
        })
        data['corequisite'].forEach(function(unit){
            if(corequisite.indexOf(unit) >= 0)
                inputCheck += '\nCorequisite has a duplicate unit. (' + unit + ')';

            corequisite.push(unit)

            if(unit == 'None')
                inputCheck += '\nCorequisite has unselected units.';
        })
        data['antirequisite'].forEach(function(unit){
            if(antirequisite.indexOf(unit) >= 0)
                inputCheck += '\nAntirequisite has a duplicate unit. (' + unit + ')';

            antirequisite.push(unit)

            if(unit == 'None')
                inputCheck += '\nAntirequisite has unselected units.';
        })

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
    // data.forEach is not a function
    getUnits()
})()
</script>
@stop
