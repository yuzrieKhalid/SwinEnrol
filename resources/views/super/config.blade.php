@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                            {{-- Enrolment Phase --}}
                            @if(isset($error['enrolmentPhase']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $enrolmentPhase->id }}">
                                    <abbr title="Enrolment Phases values are between 1-8">Enrolment Phase</abbr>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $enrolmentPhase->id }}" value="{{ $enrolmentPhase->value }}">
                                    @if(isset($error['enrolmentPhase']))
                                        <span id="helpBlock2" class="help-block">{{ $error['enrolmentPhase'] }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Semester --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="{{ $semester->id }}">Semester</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="{{ $semester->id }}">
                                        <option>Semester 1</option>
                                        <option @if($semester->value == 'Semester 2') selected @endif>Semester 2</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Year --}}
                            @if(isset($error['year']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $year->id }}">Year</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $year->id }}" value="{{ $year->value }}">
                                    @if(isset($error['year']))
                                        <span id="helpBlock2" class="help-block">{{ $error['year'] }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Semester Length --}}
                            @if(isset($error['semesterLength']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $semesterLength->id }}">Semester Length</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $semesterLength->id }}" value="{{ $semesterLength->value }}">
                                    @if(isset($error['semesterLength']))
                                        <span id="helpBlock2" class="help-block">{{ $error['semesterLength'] }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Approval (Short) --}}
                            @if(isset($error['approvalShort']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $approvalShort->id }}">
                                    <abbr title="Days before semester commences">Approval (Short Semester)</abbr>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $approvalShort->id }}" value="{{ $approvalShort->value }}">
                                    @if(isset($error['approvalShort']))
                                        <span id="helpBlock2" class="help-block">{{ $error['approvalShort'] }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- Add Close (Short) --}}
                            @if(isset($error['addCloseShort']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $addCloseShort->id }}">
                                    <abbr title="Days after semester commences">Add Close (Short Semester)</abbr>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $addCloseShort->id }}" value="{{ $addCloseShort->value }}">
                                    @if(isset($error['addCloseShort']))
                                        <span id="helpBlock2" class="help-block">{{ $error['addCloseShort'] }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- Drop Close (Short) --}}
                            @if(isset($error['dropCloseShort']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $dropCloseShort->id }}">
                                    <abbr title="Days after semester commences">Drop Close (Short Semester)</abbr>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $dropCloseShort->id }}" value="{{ $dropCloseShort->value }}">
                                    @if(isset($error['dropCloseShort']))
                                        <span id="helpBlock2" class="help-block">{{ $error['dropCloseShort'] }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- Approval (Long) --}}
                            @if(isset($error['approvalLong']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $approvalLong->id }}">
                                    <abbr title="Days before semester commences">Approval (Long Semester)</abbr>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $approvalLong->id }}" value="{{ $approvalLong->value }}">
                                    @if(isset($error['approvalLong']))
                                        <span id="helpBlock2" class="help-block">{{ $error['approvalLong'] }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- Add Close (Long) --}}
                            @if(isset($error['addCloseLong']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $addCloseLong->id }}">
                                    <abbr title="Days after semester commences">Add Close (Long Semester)</abbr>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $addCloseLong->id }}" value="{{ $addCloseLong->value }}">
                                    @if(isset($error['addCloseLong']))
                                        <span id="helpBlock2" class="help-block">{{ $error['addCloseLong'] }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- Drop Close (Long) --}}
                            @if(isset($error['dropCloseLong']))
                                <div class="form-group has-error">
                            @else
                                <div class="form-group">
                            @endif
                                <label class="col-sm-3 control-label" for="{{ $dropCloseLong->id }}">
                                    <abbr title="Days before drop period closes">Drop Close (Long Semester)</abbr>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="{{ $dropCloseLong->id }}" value="{{ $dropCloseLong->value }}">
                                    @if(isset($error['dropCloseLong']))
                                        <span id="helpBlock2" class="help-block">{{ $error['dropCloseLong'] }}</span>
                                    @endif
                                </div>
                            </div>

                            {!! csrf_field() !!}

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
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
