@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        @if(isset($user))
                        <h3>Edit Student</h3>
                        @else
                        <h3>Add Student</h3>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if(isset($user))
                            <form class="form-horizontal" role="form" method="POST" action="/super/managestudent/{{ $user->username }}">
                        @else
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('super.managestudent.store') }}">
                        @endif

                            {!! csrf_field() !!}

                            @if(isset($user))
                                <input type="hidden" name="_method" value="PUT">
                            @endif

                            <div class="form-group{{ $errors->has('studentID') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    @if(isset($user))
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                    @else
                                    <input type="text" class="form-control" id="username" name="username" value="">
                                    @endif
                                    @if ($errors->has('studentID'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('studentID') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('givenName') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Given Name</label>

                                <div class="col-md-6">
                                    @if(isset($student))
                                    <input type="text" class="form-control" id="givenName" name="givenName" value="{{ $student->givenName }}">
                                    @else
                                    <input type="text" class="form-control" id="givenName" name="givenName" value="">
                                    @endif
                                    @if ($errors->has('givenName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('givenName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Surname</label>

                                <div class="col-md-6">
                                    @if(isset($student))
                                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $student->surname }}">
                                    @else
                                    <input type="text" class="form-control" id="surname" name="surname" value="">
                                    @endif
                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('courseCode') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Course Code</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="courseCode">
                                        @if(isset($student))
                                        @foreach($courses as $course)
                                        <option value="{{ $course->courseCode }}" @if($course->courseCode == $student->courseCode) selected @endif>{{ $course->courseCode }} - {{ $course->courseName }}</option>
                                        @endforeach
                                        @else
                                        @foreach($courses as $course)
                                        <option value="{{ $course->courseCode }}">{{ $course->courseCode }} - {{ $course->courseName }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('courseCode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('courseCode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Year</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="year" name="year" value="{{ $year }}">
                                    @if ($errors->has('year'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Semester</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="semester">
                                        @if(isset($student))
                                        <option>Semester 1</option>
                                        <option @if($student->term == 'Semester 2') selected @endif>Semester 2</option>
                                        @else
                                        <option>Semester 1</option>
                                        <option>Semester 2</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('semester'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('semester') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary submit @if(!isset($user)) disabled @endif" data-method="POST" data-url="{{ route('super.managestudent.store') }}">Save</button>
                                    <a class="btn btn-danger" href="{{ route('super.managestudent.index') }}" role="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra_js')
<script>
(function(){
    $('#year').TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })

    let inputValidate = function() {
        if($('#password').val() != '' && $('#password').val() == $('#password_confirmation').val() && $('#surname').val() != '' && $('#givenName').val() != '' && $('#username').val() != '')
            return true
        else {
            if($('input[name="_method"]').val() != null && $('#password').val() == '' && $('#password').val() == $('#password_confirmation').val() && $('#surname').val() != '' && $('#givenName').val() != '' && $('#username').val() != '')
                return true
            else
                return false
        }
    }

    $('#username').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })

    $('#givenName').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })

    $('#surname').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })

    $('#password').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })

    $('#password_confirmation').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })
})()
</script>
@stop
