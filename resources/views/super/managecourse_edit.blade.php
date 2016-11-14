@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3>Update Course Information <br>
                        <small>[ {{ $courses->courseCode }} {{ $courses->courseName }} ]</small>
                    </h3>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="/super/managecourse/{{ $courses->courseCode }}">

                    {{-- Editting with PUT Method with CSRF Token --}}
                    <input type="hidden" name="_method" value="PUT">
                    {!! csrf_field() !!}

                    <div class="panel-body">
                        <div class="form-group"> <!-- course code -->
                            <label class="col-md-2 control-label">Course Code</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="courseCode" name="courseCode" value="{{ $courses->courseCode }}">
                            </div>
                        </div>

                        <div class="form-group"> <!-- course name -->
                            <label class="col-md-2 control-label">Course Name:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="courseName" name="courseName" value="{{ $courses->courseName }}">
                            </div>
                        </div>

                        <div class="form-group"> <!-- semesters per year -->
                            <label class="col-md-2 control-label">Semester (Per Year):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="semestersPerYear" name="semestersPerYear" value="{{ $courses->semestersPerYear }}">
                            </div>
                        </div>

                        <div class="form-group"> <!-- semester count in total -->
                            <label class="col-md-2 control-label">Semester (Total):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="semesterCount" name="semesterCount" value="{{ $courses->semesterCount }}">
                            </div>
                        </div>

                        <div class="form-group"> <!-- study level -->
                            <label class="col-md-2 control-label">Study Level:</label>
                            <div class="col-md-10">
                                <select class="form-control" id="studyLevel" name="studyLevel">
                                    @foreach($studyLevel as $level)
                                    <option value="{{ $level->studyLevel }}" @if($level->studyLevel == $courses->studyLevel) selected @endif>{{ $level->studyLevel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> <!-- end .panel-body -->

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary edit">Edit</button>
                        <a class="btn btn-danger" href="{{ route('super.managecourse.create') }}" role="button">Cancel</a>
                    </div> <!-- end .panel-footer -->
                </form>
            </div> <!-- end .panel -->
        </div> <!-- end .col -->
    </div> <!-- end .row -->
</div> <!-- end .container -->
@stop

@section('extra_js')
<script>
(function(){
    $('#semesterCount').TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })

    $('#semestersPerYear').TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })

    $('#courseCode').on('input', function() {
        if($(this).val() == '') {
            $('.edit').addClass('disabled')
        }
        else {
            $('.edit').removeClass('disabled')
        }
    })

    $('#courseName').on('input', function() {
        if($(this).val() == '') {
            $('.edit').addClass('disabled')
        }
        else {
            $('.edit').removeClass('disabled')
        }
    })
})()
</script>
@stop
