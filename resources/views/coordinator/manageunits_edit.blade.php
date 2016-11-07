@extends('layouts.app')

@section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            @if(isset($unit))
            <h3>Update Unit Information <br>
                <small>[ {{ $unit->unitCode }} {{ $unit->unitName }} ]</small>
            </h3>
            @else
            <h3>Add Unit</h3>
            @endif
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"> <!-- unitCode -->
                        <label class="control-label">Unit Code:</label>
                        <input type="text" class="form-control" id="unitCode" value="@if(isset($unit)){{ $unit->unitCode }}@endif">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group"> <!-- creditPoints -->
                        <label class="control-label">Credit Points:</label>
                        <input class="creditPoints" type="text" value="@if(isset($unit)){{ $unit->creditPoints }}@endif" id="creditPoints">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group"> <!-- studyLevel -->
                        <label class="control-label">Study Level:</label>
                        <select class="form-control" name="studyLevel" id="studyLevel">
                            @foreach($studyLevels as $studyLevel)
                                <option value="{{ $studyLevel->studyLevel }}" @if(isset($unit))@if($unit->studyLevel == $studyLevel->studyLevel)selected @endif @endif>{{ $studyLevel->studyLevel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group"> <!-- unitName -->
                        <label class="control-label">Unit Name:</label>
                        <input type="text" class="form-control" id="unitName" value="@if(isset($unit)){{ $unit->unitName }}@endif">
                    </div>
                </div>
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
                window.location.reload()
            })
        }
    })
})()
</script>
@stop
