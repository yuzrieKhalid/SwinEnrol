@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link href="{{ asset('css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="container">
    <div class="form-group">
        <label class="control-label" for="unitCode">Unit Code:</label>
        <input type="text" name="unitCode" class="form-control" id="unitCode">

        <label class="control-label" for="unitName">Unit Name:</label>
        <input type="text" name="unitName" class="form-control" id="unitName">

        <label class="control-label" for="courseCode">Course Code:</label>
        <!-- <input type="text" name="courseCode" class="form-control" id="courseCode"> -->
        <select class="form-control" name="courseCode">
            <option value="0">None</option>

            @foreach($courses as $course)
            <option value="{{ $course->courseCode }}">{{ $course->courseCode }}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="prerequisite">Prerequisite</label>
            <!-- <input type="text" name="prerequisite" class="form-control" id="prerequisite"> -->
            <select class="form-control" name="prerequisite">
                <option value="None">None</option>
                <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="corequisite">Corequisite</label>
            <!-- <input type="text" name="corequisite" class="form-control" id="corequisite"> -->
            <select class="form-control" name="corequisite">
                <option value="None">None</option>
                <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
            <select>
        </div>

        <div class="form-group">
            <label for="antirequisite">Antirequisite</label>
            <!-- <input type="text" name="antirequisite" class="form-control" id="antirequisite"> -->
            <select class="form-control" name="antirequisite">
                <option value="None">None</option>
                <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
            </select>
        </div>

        <label class="control-label" for="minimumCompletedUnits">Minimum Completed Units:</label>
        <input id="minimumCompletedUnits" type="text" name="minimumCompletedUnits" value="0">

        <label class="control-label" for="core">This is a Core:
            <input type="checkbox" autocomplete="off" name="core" id="core">
        </label>

        <button type="submit" class="submit btn btn-warning" id="submit" data-method="POST" data-url="{{ route('coordinator.manageunits.update') }}">Edit</button>
        <button type="submit" class="submit btn btn-danger" id="submit" data-method="POST" data-url="{{ route('coordinator.manageunits.destroy') }}">Delete</button>
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
@stop
