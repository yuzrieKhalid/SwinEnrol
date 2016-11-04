@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edit Unit Information</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" method="POST" action="{{ route('adminofficer.manageunitinfo.edit', $unit->unitCode) }}">
                        <!-- Year Selection -->
                        <div class="form-group">
                            <select class="form-control" name="year" id="year" onchange="this.form.submit()">
                                @for($n = $year - 5; $n < $year + 2; $n++)
                                    @if($n == $selectedYear)
                                        <option value="{{ $n }}" selected>{{ $n }}</option>
                                    @else
                                        <option value="{{ $n }}">{{ $n }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>

                        <!-- Semester Selection -->
                        <div class="form-group">
                            <select class="form-control" name="semester" id="semester" onchange="this.form.submit()">
                                @if($semester == "Semester 1")
                                    <option value="Semester 1" selected>Semester 1</li>
                                @else
                                    <option value="Semester 1">Semester 1</li>
                                @endif

                                @if($semester == "Semester 2")
                                    <option value="Semester 2" selected>Semester 2</li>
                                @else
                                    <option value="Semester 2">Semester 2</li>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default" data-toggle="modal" data-target="#importUnitInfo" role="button">Import Unit Information</a>
                            <a class="btn btn-danger submit" data-method="DELETE" data-url="{{ route('adminofficer.manageunitinfo.destroy', $unit->unitCode) }}" role="button">Delete Unit Information</a>
                        </div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"> <!-- unitCode -->
                                <label class="control-label">Unit Code:</label>
                                <input type="text" class="form-control" id="unitCode" value="{{ $unit->unitCode }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> <!-- unitName -->
                                <label class="control-label">Unit Name:</label>
                                <input type="text" class="form-control" id="unitName" value="{{ $unit->unitName }}" disabled>
                            </div>
                        </div>
                    </div> <!-- end .row -->
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>UNIT CONVENOR</label>
                                <input class="form-control" type="text" id="unitConvenor" value="@if(isset($unitInfo)){{ $unitInfo->convenor }}@endif">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>MAXIMUM NUMBER OF STUDENTS FOR UNIT</label>
                                <input class="numbers" type="text" value="@if(isset($unitInfo)){{ $unitInfo->maxStudentCount }}@endif" id="maxStudents">
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
                                <input class="numbers_duration" type="text" value="@if(isset($unitInfo)){{ $unitInfo->lectureDuration }}@endif" id="lectureDuration">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Number of Groups</label>
                                <input class="numbers" type="text" value="@if(isset($unitInfo)){{ $unitInfo->lectureGroupCount }}@endif" id="lectureGroups">
                            </div>
                            <div class="form-group">
                                <button id="addLecturer" type="button"><span class="glyphicon glyphicon-plus"></span> Add Lecturer</button>
                            </div>
                            <div class="form-group hidden lecturer_template">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="input_lecturer[]">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger remove_input">
                                          <span class="glyphicon glyphicon-remove"></span></button>
                                    </span>
                                </div>
                            </div>

                            <!-- fetch from database if got -->
                            @if(isset($unitInfo))
                            @foreach($unitInfo->lecturers as $lecturer)
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
                                    <input class="numbers_duration" type="text" value="@if(isset($unitInfo)) {{ $unitInfo->tutorialDuration }} @endif" id="tutorialDuration">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Number of Groups</label>
                                    <input class="numbers" type="text" value="@if(isset($unitInfo)) {{ $unitInfo->tutorialGroupCount }} @endif" id="tutorialGroups">
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
                                @if(isset($unitInfo))
                                @foreach($unitInfo->tutors as $tutor)
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
                    <button type="submit" class="submit btn btn-warning" id="submit" data-method="PUT" data-url="{{ route('adminofficer.manageunitinfo.update', $unit->unitCode) }}">Edit</button>
                    <a id="backToCreate" class="btn btn-info" href="{{ route('adminofficer.manageunitinfo.index') }}" role="button">Back To Previous Page</a>
                </div>
            </div>

            <!-- Import Unit Info Modal-->
            <div class="modal fade" id="importUnitInfo" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Import Unit Information</h2>
                        </div>
                        <div class="modal-body">
                            <!-- Form -->
                            <form class="form-horizontal">
                                <!-- Year Selection -->
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="importYear">Year:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="importYear" id="importYear">
                                            @for($n = $year - 5; $n < $year + 2; $n++)
                                                @if($n == $selectedYear)
                                                    <option value="{{ $n }}" selected>{{ $n }}</option>
                                                @else
                                                    <option value="{{ $n }}">{{ $n }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <!-- Semester Selection -->
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="importSemester">Semester:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="importSemester" id="importSemester">
                                            <option value="Semester 1" selected>Semester 1</li>
                                            <option value="Semester 2">Semester 2</li>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="submit btn btn-default" id="submit" data-method="PUT" data-button="import" data-url="{{ route('adminofficer.manageunitinfo.update', $unit->unitCode) }}">Import</button>
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
    let getLecturers = function() {
        // get the value for each inputboxes including the first hidden input box
        let lecturers_inputs = $('input[name^=input_lecturer]').map(function(id, element)  { return $(element).val() }).get()

        // get the array that skips the first empty/hidden element
        let lecturers = []
        for (let i = 0; i < $('.input_lecturer').length; i++) { lecturers[i] = lecturers_inputs[i+1] }

        return JSON.stringify(lecturers)
    }

    let getTutors = function() {
        // get the value for each inputboxes including the first hidden input box
        let tutors_inputs    = $('input[name^=input_tutor]').map(function(id, element)     { return $(element).val() }).get()

        // get the array that skips the first empty/hidden element
        let tutors = []
        for (let i = 0; i < $('.input_tutor').length; i++)    { tutors[i] = tutors_inputs[i+1] }

        return JSON.stringify(tutors)
    }

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

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $('#unitCode').val(),
            year: $('#year').val(),
            semester: $('#semester').val(),
            convenor: $('#unitConvenor').val(),
            maxStudentCount: $('#maxStudents').val(),
            lectureDuration: $('#lectureDuration').val(),
            lectureGroupCount: $('#lectureGroups').val(),
            tutorialDuration: $('#tutorialDuration').val(),
            tutorialGroupCount: $('#tutorialGroups').val(),
            lecturers: getLecturers(),
            tutors: getTutors()
        }

        if($(this).data('button') == 'import') {
            data['importYear'] = $('#importYear').val()
            data['importSemester'] = $('#importSemester').val()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            console.log(JSON.stringify(data))
            window.location.reload()
        })
    })
})()
</script>
@stop
