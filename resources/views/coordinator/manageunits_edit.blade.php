@extends('layouts.app')

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

        {{-- New Form - include the panel-body and panel-footer --}}
        <form class="form-horizontal" role="form" method="POST" action="/coordinator/manageunits/{{ $unit->unitCode }}">
            <div class="panel-body">
                {{-- Editting with PUT Method with CSRF Token --}}
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="form-group"> <!-- unitCode -->
                    <label class="col-md-2 control-label">Unit Code:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="unitCode" value="@if(isset($unit)){{ $unit->unitCode }}@endif">
                    </div>
                </div>

                <div class="form-group"> <!-- unitName -->
                    <label class="col-md-2 control-label">Unit Name:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="unitName" value="@if(isset($unit)){{ $unit->unitName }}@endif">
                    </div>
                </div>

                <div class="form-group"> <!-- creditPoints and studyLevel -->
                    <label class="col-md-2 control-label">Credit Points:</label>
                    <div class="col-md-4">
                        <input class="creditPoints" type="text" name="creditPoints" value="@if(isset($unit)){{ $unit->creditPoints }}@endif">
                    </div>

                    <label class="col-md-2 control-label">Study Level:</label>
                    <div class="col-md-4">
                        <select class="form-control" name="studyLevel">
                            @foreach($studyLevels as $studyLevel)
                                <option value="{{ $studyLevel->studyLevel }}" @if(isset($unit))@if($unit->studyLevel == $studyLevel->studyLevel)selected @endif @endif>{{ $studyLevel->studyLevel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> <!-- end unitName .form-group -->
            </div> <!-- end .panel-body -->

            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-danger" href="{{ route('coordinator.manageunits.create') }}" role="button">Cancel</a>
            </div>
        </form>
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
})()
</script>
@stop
