@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Reserve 3 space for navigation column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('/super') }}" class="list-group-item">Home</a>
                    <a href="{{ url('/super/config') }}" class="list-group-item active">Configuration</a>
                    <a href="{{ url('/super/managestudentadmin') }}" class="list-group-item">Manage Student Administrators</a>
                    <a href="{{ url('/super/managecoordinator') }}" class="list-group-item">Manage Course Coordinators</a>
                    <a href="{{ url('/super/managestudent') }}" class="list-group-item">Manage Students</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Config</h1>
                    </div>
                    <div class="panel-body">

                        @if(isset($status))
                            @if($status == true)
                                <div class="panel panel-success">
                                    <div class="panel-heading">Successfully updated configuration!</div>
                                </div>
                            @endif
                            @if($status == false)
                                <div class="panel panel-danger">
                                    <div class="panel-heading">Failed to update configuration.</div>
                                </div>
                            @endif
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('super.config.store') }}">
                            @if(isset($epMessage))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-2 control-label" for="{{ $config[0]->id }}">Enrolment Phase</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="{{ $config[0]->id }}" value="{{ $config[0]->value }}">
                                    @if(isset($epMessage))
                                        <span id="helpBlock2" class="help-block">Enrolment Phase must be between values 1 and 3.</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="{{ $config[1]->id }}">Semester</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                        <option>Semester 1</option>
                                        @if($config[1]->value == 'Semester 1')
                                            <option>Semester 2</option>
                                        @else
                                            <option selected>Semester 2</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            @if(isset($slMessage))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-2 control-label" for="{{ $config[2]->id }}">Semester Length</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="{{ $config[2]->id }}" value="{{ $config[2]->value }}">
                                    @if(isset($slMessage))
                                        <span id="helpBlock2" class="help-block">Semester Length must be a number greater than 0.</span>
                                    @endif
                                </div>
                            </div>
                            @if(isset($yMessage))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-2 control-label" for="{{ $config[3]->id }}">Year</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="{{ $config[3]->id }}" value="{{ $config[3]->value }}">
                                    @if(isset($yMessage))
                                        <span id="helpBlock2" class="help-block">Year must be a number greater than 0.</span>
                                    @endif
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
