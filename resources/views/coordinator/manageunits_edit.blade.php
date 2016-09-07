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
                            <option value="None">None</option>
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
                            <option value="None">None</option>
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
                            <option value="None">None</option>
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

            <div class="form-group">
                <label>UNIT CONVENOR</label>
                <input class="form-control" type="text" id="unitConvenor">
            </div>

            <div class="row">
                <div class="col-md-6 col_lecture">
                    <!-- Lecture Duration and Number of Group(s) -->
                    <h4>LECTURE</h4>
                    <div class="form-group">
                        <label class="control-label">Duration (Hours)</label>
                        <input class="numbers_duration" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Number of Groups</label>
                        <input class="numbers" type="text" value="0">
                    </div>
                    <div class="form-group">
                        <button id="addLecturer" type="button"><span class="glyphicon glyphicon-plus"></span> Add Lecturer</button>
                    </div>
                    <div class="form-group hidden lecturer_template">
                        <input class="form-control" type="text">
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
                            <input class="numbers_duration" type="text">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Number of Groups</label>
                            <input class="numbers" type="text" value="0">
                        </div>

                        <div class="form-group">
                            <button id="addTutor" type="button"><span class="glyphicon glyphicon-plus"></span> Add Tutors</button>
                        </div>
                        <div class="form-group hidden tutor_template">
                            <input class="form-control" type="text">
                        </div>
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

        $('.col_lecture').append(newLecturerTextbox)
    })

    // add tutors
    $('#addTutor').click(function() {
        let newTutorTextbox = $('.col_tutorial').find('.tutor_template').clone()
        newTutorTextbox.removeClass('tutor_template')
        newTutorTextbox.removeClass('hidden')

        $('.col_tutorial').append(newTutorTextbox)
    })

    // prettify the numbers column
    $(".numbers").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true                // allow scrolling to increase/decrease value
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
            core: $('#core').val()
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
