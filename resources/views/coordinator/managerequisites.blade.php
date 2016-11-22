@extends('layouts.app')

@section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3>Update Requisite Information<br>
                <small>[ {{ $unit->unitCode }} {{ $unit->unitName }} ]</small>
            </h3>
        </div>
        <div class="panel-body">
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
                        <input type="text" class="form-control" id="unitName" value="@if(isset($unit)){{ $unit->unitName }}@endif" disabled>
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
                @if(isset($prerequisites))
                @for($i = 0; $i < count($prerequisites); $i++)
                <div class="panel panel-default panel-body prerequisite_group">
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
                            <input type="text" class="form-control prerequisiteGroupCount" id="prerequisiteGroupCount" @if(count($prerequisites[$i][0]['type']) > 1) value="{{ $prerequisites[$i][0]['type'][1] }}" @endif>
                        </div>
                    </div>
                    <hr>
                    <div class="prerequisites">
                        @foreach($prerequisites[$i] as $prerequisite)
                        <div class="row input_prerequisite">
                            <div class="col-md-11">
                                <div class="form-group prerequisite">
                                    <select class="form-control" name="prerequisite[]">
                                        <option value="None">Select one</option>
                                        @foreach($units as $requisiteUnit)
                                        <option value="{{ $requisiteUnit->unitCode }}" @if($prerequisite->requisite == $requisiteUnit->unitCode) selected @endif>{{ $requisiteUnit->unitCode }} {{ $requisiteUnit->unitName }}</option>
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
                        @endforeach
                    </div>
                </div>
                @endfor
                @endif
            </div>
            <!-- Templates -->
            <div class="hidden templates">
                <div class="panel panel-default panel-body prerequisite_group_template">
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
                            <input type="text" class="form-control prerequisiteGroupCount">
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row prerequisite_template">
                    <div class="col-md-11">
                        <div class="form-group prerequisite">
                            <select class="form-control" name="prerequisite[]">
                                <option value="None">Select one</option>
                                @foreach($units as $requisiteUnit)
                                <option value="{{ $requisiteUnit->unitCode }}">{{ $requisiteUnit->unitCode }} {{ $requisiteUnit->unitName }}</option>
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
                                @foreach($units as $requisiteUnit)
                                <option value="{{ $requisiteUnit->unitCode }}">{{ $requisiteUnit->unitCode }} {{ $requisiteUnit->unitName }}</option>
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
                @if(isset($corequisites))
                @foreach($corequisites as $corequisite)
                <div class="row input_corequisite">
                    <div class="col-md-11">
                        <div class="form-group corequisite">
                            <select class="form-control" name="corequisite[]">
                                <option value="None">Select one</option>
                                @foreach($units as $requisiteUnit)
                                <option value="{{ $requisiteUnit->unitCode }}" @if($corequisite->requisite == $requisiteUnit->unitCode) selected @endif>{{ $requisiteUnit->unitCode }} {{ $requisiteUnit->unitName }}</option>
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
                @endforeach
                @endif
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
                                @foreach($units as $requisiteUnit)
                                <option value="{{ $requisiteUnit->unitCode }}">{{ $requisiteUnit->unitCode }} {{ $requisiteUnit->unitName }}</option>
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
                @if(isset($antirequisites))
                @foreach($antirequisites as $antirequisite)
                <div class="row input_antirequisite">
                    <div class="col-md-11">
                        <div class="form-group antirequisite">
                            <select class="form-control" name="antirequisite[]">
                                <option value="None">Select one</option>
                                @foreach($units as $requisiteUnit)
                                <option value="{{ $requisiteUnit->unitCode }}" @if($antirequisite->requisite == $requisiteUnit->unitCode) selected @endif>{{ $requisiteUnit->unitCode }} {{ $requisiteUnit->unitName }}</option>
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
                @endforeach
                @endif
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="submit btn btn-warning" id="submit" data-method="PUT" data-url="{{ route('coordinator.managerequisites.update', $unit->unitCode) }}">Edit</button>
            <a id="backToCreate" class="btn btn-info" href="{{ route('coordinator.manageunits.index') }}" role="button">Back To Previous Page</a>
        </div>
    </div>
</div>

@stop

@section('extra_js')
<script>
(function() {
    // get prerequisite information
    let getPrerequisite = function() {

        // get number of prerequisites in each group
        let requisite_count = []
        $('.prerequisite_group').each(function(id, element) {
            requisite_count.push($(this).find('.prerequisite').length)
            // console.log(requisite_count)
        })

        // get the values in each selection
        let requisite_inputs = $('select[name^=prerequisite]').map(function(id, element) { return $(element).val() }).get()

        // get the array without the template
        let all_requisites = []
        for (let i = 0; i < $('.prerequisite').length; i++) {
            all_requisites[i] = requisite_inputs[i]
        }

        // sort requisites into groups
        let requisite = []
        let all_requisites_count = 0
        for(let i = 0; i < requisite_count.length; i++) {
            let array = []
            // push to temporary array
            for(let j = 0; j < requisite_count[i]; j++) {
                array.push(all_requisites[all_requisites_count])
                all_requisites_count++
            }
            requisite.push(array) // push array to requisite
        }

        return requisite
    }

    // get prerequisite minimum unit count
    let getMinimumUnitCount = function() {
        let input = $('input[class*=prerequisiteGroupCount]').map(function(id, element) { return $(element).val() }).get()
        // get the values in each selection

        // get the array without the template
        let minimum_units = []
        for (let i = 0; i < input.length - 1; i++) {
            minimum_units[i] = input[i]
        }

        return minimum_units
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
        let newRequisiteGroup = $('.templates').find('.prerequisite_group_template').clone()
        newRequisiteGroup.removeClass('prerequisite_group_template')
        newRequisiteGroup.addClass('prerequisite_group')

        $('.prerequisite_groups').append(newRequisiteGroup)
    })

    // add prerequisite
    $('.prerequisite_groups').on('click', '.addPrerequisite', function() {
        let newRequisiteTextbox = $('.templates').find('.prerequisite_template').clone()
        newRequisiteTextbox.removeClass('prerequisite_template')
        newRequisiteTextbox.addClass('input_prerequisite')

        $(this).parent().parent().parent().append(newRequisiteTextbox)
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

    // remove requisite group when pressing the x button
    $('.prerequisite_groups').on('click', '.remove_group', function() {
        $(this).parent().parent().parent().remove()
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

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $('#unitCode').val(),
            prerequisite: getPrerequisite(),
            corequisite: getCorequisite(),
            antirequisite: getAntirequisite(),
            minimumUnits: getMinimumUnitCount()
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

        if(method == 'PUT' && inputCheck != '')
            alert(inputCheck)
        else
        {
            // console.log(data)
            $.ajax({
                'url': url,
                'method': method,
                'data': data
            }).done(function(data) {
                window.location.reload()
            })
        }
    })
})()
</script>
@stop
