@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Add Student</h3>
                    </div>
                    <div class="panel-body">
                        @if(isset($user))
                            <form class="form-horizontal" role="form" method="POST" action="/super/managestudent/{{ $user[0]->username }}">
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
                                    <input type="text" class="form-control" name="studentID" value="{{ $student->studentID }}">
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
                                    <input type="text" class="form-control" name="givenName" value="{{ $student->givenName }}">
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
                                    <input type="text" class="form-control" name="surname" value="{{ $student->surname }}">
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
                                    <input type="text" class="form-control" name="courseCode" value="{{ $student->courseCode }}">
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
                                    <input type="password" class="form-control" name="password">

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
                                    <input type="password" class="form-control" name="password_confirmation">

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
                                        data-method="PUT" data-url="{{ route('super.managestudent.update', $student->studentID) }}">
                                        Save
                                    </button>
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
