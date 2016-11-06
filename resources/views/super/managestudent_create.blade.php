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
                                    <input type="text" class="form-control" name="studentID" value="">
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
                                    <input type="text" class="form-control" name="givenName" value="">
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
                                    <input type="text" class="form-control" name="surname" value="">
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
                                    <input type="text" class="form-control" name="courseCode" value="">
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
                                    <input type="text" class="form-control" name="year" value="{{ $year }}">
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
                                    <input type="text" class="form-control" name="semester" value="{{ $semester }}">
                                    @if ($errors->has('semester'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('semester') }}</strong>
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
                                    <button type="submit" class="btn btn-primary submit" data-method="POST" data-url="{{ route('super.managestudent.store') }}">Save</button>
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
