@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link href="{{ asset('css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Update Unit Information <br>
                <small>[ {{ $unit->unitCode }} {{ $unit->unitName }} ]</small>
            </h2>
        </div>
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="unitCode">Unit Code:</label>
                    <div class="col-sm-6">
                        <input type="text" name="unitCode" class="form-control" id="unitCode" placeholder="{{ $unit->unitCode }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="unitName">Unit Name:</label>
                    <div class="col-sm-6">
                        <input type="text" name="unitName" class="form-control" id="unitName" placeholder="{{ $unit->unitName }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="courseCode">Course Code:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="courseCode">
                            <option value="{{ $unit->courseCode }}">{{ $unit->courseCode }} </option>

                            @foreach($courses as $course)

                            @if($unit->courseCode !== $course->courseCode)
                            <option value="{{ $course->courseCode }}">{{ $course->courseCode }} </option>
                            @endif

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="prerequisite">Prerequisite:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="prerequisite">
                            <option value="{{ $unit->prerequisite }}">{{ $unit->prerequisite }}</option>

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->prerequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="corequisite">Corequisite:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="corequisite">
                            <option value="{{ $unit->corequisite }}">{{ $unit->corequisite }}</option>

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->corequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        <select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="antirequisite">Antirequisite:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="antirequisite">
                            <option value="{{ $unit->antirequisite }}">{{ $unit->antirequisite }}</option>

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->antirequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="core">This is a Core:</label>
                    <div class="col-sm-1">
                        <input type="checkbox" autocomplete="off" name="core" id="core">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="minimumCompletedUnits">Minimum Completed Units:</label>
                    <div class="col-sm-1">
                        <input id="minimumCompletedUnits" type="text" name="minimumCompletedUnits" value="0">
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <button type="submit" class="submit btn btn-warning" id="submit" data-method="PUT" data-url="{{ route('coordinator.manageunits.update', $unit->unitCode) }}">Edit</button>
            <button type="submit" class="submit btn btn-danger" id="submit" data-method="DELETE" data-url="{{ route('coordinator.manageunits.destroy', $unit->unitCode) }}">Delete</button>
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
    console.log("need to implement the update method")
})()
</script>
@stop
