@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h2>Update Unit Information <br>
                <small>[ {{ $unit->unitCode }} {{ $unit->unitName }} ]</small>
            </h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"> <!-- unitCode -->
                        <label class="control-label">Unit Code:</label>
                        <input type="text" class="form-control" id="unitCode" value="{{ $unit->unitCode }}">
                    </div>

                    <div class="form-group"> <!-- unitName -->
                        <label class="control-label">Unit Name:</label>
                        <input type="text" class="form-control" id="unitName" value="{{ $unit->unitName }}">
                    </div>

                    <div class="form-group"> <!-- minimumCompletedUnits -->
                        <label class="control-label">Minimum Completed Units:</label>
                        <input class="numbers" type="text" value="{{ $unit->minimumCompletedUnits }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prerequisite">Prerequisite</label>
                        <select class="form-control" name="prerequisite">
                            <!-- check if there's a prerequisite/corequisite/antirequisite to show -->
                            @if($prerequisite !== null)
                                <option value="{{ $prerequisite->unitCode }}">{{ $prerequisite->unitCode }} {{ $prerequisite->unitName }}</option>
                            @else
                                <option value="None">None</option>
                            @endif

                            <!-- populate the dropdown list -->
                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->prerequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="corequisite">Corequisite</label>
                        <select class="form-control" name="corequisite">
                            <!-- check if there's a prerequisite/corequisite/antirequisite to show -->
                            @if($corequisite !== null)
                                <option value="{{ $corequisite->unitCode }}">{{ $corequisite->unitCode }} {{ $corequisite->unitName }}</option>
                            @else
                                <option value="None">None</option>
                            @endif

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->corequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="antirequisite">Antirequisite</label>
                        <select class="form-control" name="antirequisite">
                            <!-- check if there's a prerequisite/corequisite/antirequisite to show -->
                            @if($antirequisite !== null)
                                <option value="{{ $antirequisite->unitCode }}">{{ $antirequisite->unitCode }} {{ $antirequisite->unitName }}</option>
                            @else
                                <option value="None">None</option>
                            @endif

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->antirequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
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
                        <input class="form-control" type="text" id="unitConvenor" value="{{ $convenor }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAXIMUM NUMBER OF STUDENTS FOR UNIT</label>
                        <input class="numbers" type="text" value="{{ $maxStudents }}" id="maxStudents">
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
                        <input class="numbers_duration" type="text" value="{{ $lectureDuration }}" id="lectureDuration">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Number of Groups</label>
                        <input class="numbers" type="text" value="{{ $lectureGroups }}" id="lectureGroups">
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

                    <!-- fetch from database if got -->
                    @if(isset($lecturers))
                    @foreach($lecturers as $lecturer)
                    <div class="form-group input_lecturer">
                        <div class="input-group">
                            <input class="form-control" type="text" name="input_lecturer[]" value="{{ $lecturer }}">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger remove_input"><span class="glyphicon glyphicon-remove"></span></button>
                            </span>
                        </div>
                    </div>
                    @endforeach
                    @endif
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
                            <input class="numbers_duration" type="text" value="{{ $tutorialDuration }}" id="tutorialDuration">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Number of Groups</label>
                            <input class="numbers" type="text" value="{{ $tutorialGroups }}" id="tutorialGroups">
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
                        @if(isset($lecturers))
                        @foreach($tutors as $tutor)
                        <div class="form-group input_tutor">
                            <div class="input-group">
                                <input class="form-control" type="text" name="input_tutor[]" value="{{ $tutor }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger remove_input"><span class="glyphicon glyphicon-remove"></span></button>
                                </span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div> <!-- end .tutorial_section -->
                </div> <!-- end .col -->
            </div> <!-- end .row -->
        </div>
        <div class="panel-footer">
            <button type="submit" class="submit btn btn-warning" id="submit" data-method="PUT" data-url="{{ route('coordinator.manageunits.update', $unit->unitCode) }}">Edit</button>
            <a id="backToCreate" class="btn btn-info" href="{{ route('coordinator.manageunits.create') }}" role="button">Back To Previous Page</a>
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
            jsondata = [ {convenor}, {maxStudents}, {lectureDuration, lectureGroups, lecturers, lecturers_count},
                {tutorialDuration, tutorialGroups, tutors, tutors_count} ]
        } else {
            // Tutorial is Disabled
            jsondata = [ {convenor}, {maxStudents}, {lectureDuration, lectureGroups, lecturers, lecturers_count} ]
        }

        // stringify before return
        let information = JSON.stringify(jsondata)

        // for testing only
        // let parser = JSON.parse(information)
        // console.log(parser)

        return information
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
        max: 9999
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

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $('#unitCode').val(),
            unitName: $('#unitName').val(),
            courseCode: $('select[name=courseCode]').val(),
            prerequisite: $('select[name=prerequisite]').val(),
            corequisite: $('select[name=corequisite]').val(),
            antirequisite: $('select[name=antirequisite]').val(),
            minimumCompletedUnits: $('#minimumCompletedUnits').val(),
            information: getUnitInformation()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "PUT") {
                console.log("Updated")
                window.location = $('#backToCreate').attr('href')
            } else {
                // if another button is pressed
                window.location = $('#backToCreate').attr('href')
            }
        })
    })
})()
</script>
@stop
