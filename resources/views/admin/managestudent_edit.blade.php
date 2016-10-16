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

                            <div class="form-group{{ $errors->has('courseCode') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Course Code</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="courseCode" value="{{ $student->courseCode }}">
                                    @if ($errors->has('courseCode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('courseCode') }}</strong>
                                        </span>
                                    @endif
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

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function() {
            window.location.reload()
        })
    })
})()
</script>
@stop
