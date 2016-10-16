@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Articulation</h3>
                </div>
                <div class="panel-body">
                    <p>Your foundation studies has been completed. Please select a course to articulate into.</p>
                    <form class="form-horizontal" method="POST" action="{{ route('student.articulate') }}">
                        {{-- Course Code --}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="courseCode">Course Code</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="courseCode">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->courseCode }}">{{ $course->courseCode }} - {{ $course->courseName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
