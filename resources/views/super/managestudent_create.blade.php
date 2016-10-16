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

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    @if(isset($user))
                                        <input type="text" class="form-control" name="username" value="{{ $user[0]->username }}">
                                    @else
                                        <input type="text" class="form-control" name="username" value="">
                                    @endif

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

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
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    <a class="btn btn-danger" href="{{ url('/super/managestudent') }}" role="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
