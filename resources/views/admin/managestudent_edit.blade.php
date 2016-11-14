@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Edit Student Info</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="">
                            <div class="form-group{{ $errors->has('studentID') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="studentID" value="{{ $student->studentID }}">
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
                                    <input type="text" class="form-control" id="givenName" value="{{ $student->givenName }}">
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
                                    <input type="text" class="form-control" id="surname" value="{{ $student->surname }}">
                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Course Code:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="courseCode" id="courseCode">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->courseCode }}" @if($course->courseCode == $student->courseCode) selected @endif>{{ $course->courseCode }} {{ $course->courseName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">New Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password">

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
                                    <input type="password" class="form-control" id="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary submit"
                                        data-method="PUT" data-url="{{ route('admin.managestudents.update', $student->studentID) }}">
                                        Save
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('admin.managestudents.index') }}" role="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end .panel-body -->
                </div> <!-- end .panel -->
            </div> <!-- end .col -->
        </div> <!-- end .row -->
    </div>
@stop

@section('extra_js')
<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function() {
        let url = $(this).data('url')
        let method = $(this).data('method')
        let data = {
            '_token' : getToken(),
            'studentID' : $('#studentID').val(),
            'givenName' : $('#givenName').val(),
            'surname' : $('#surname').val(),
            'courseCode' : $('#courseCode').val(),
            'password' : $('#password').val()
        }

        let message = ''

        if(data['studentID'] == '') {
            message = message + 'Please enter the student\'s Student ID.'
        }

        if(data['surname'] == '') {
            message = message + '\nPlease enter the student\'s Surname.'
        }

        if(data['givenName'] == '') {
            message = message + '\nPlease enter the student\'s Given Name.'
        }

        if(data['dateOfBirth'] == '') {
            message = message + '\nPlease enter the student\'s Date of Birth.'
        }

        if(data['password'] != $('#password_confirmation').val()) {
            message = message + '\nPassword does not match.'
        }

        if(message != '') {
            alert(message)
        }
        else {
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
