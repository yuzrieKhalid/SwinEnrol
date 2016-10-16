@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
            <!-- Reserve 3 space for navigation column -->
        @include('coordinator.menu')

        <div class="col-md-9">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Graduation Requirements</h1>
                </div>

                <div class="panel-body">
                    {{-- give status if update successful or fail --}}
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

                    <form class="form-horizontal" method="POST" action="{{ route('coordinator.graduationrequirements.store') }}">

                        {{-- unit types: Core --}}
                        @if(isset($error['core']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <div class="row">
                                <label class="col-sm-2 control-label">Core</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="core" value="{{ $core }}">
                                    @if(isset($error['core']))
                                        <span id="helpBlock2" class="help-block">{{ $error['core'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: Elective --}}
                        @if(isset($error['elective']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <div class="row">
                                <label class="col-sm-2 control-label">Elective</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="elective" value="{{ $elective }}">
                                    @if(isset($error['elective']))
                                        <span id="helpBlock2" class="help-block">{{ $error['elective'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: Major --}}
                        @if(isset($error['major']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <div class="row">
                                <label class="col-sm-2 control-label">Major</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="major" value="{{ $major }}">
                                    @if(isset($error['major']))
                                        <span id="helpBlock2" class="help-block">{{ $error['major'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: Minor --}}
                        @if(isset($error['minor']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <div class="row">
                                <label class="col-sm-2 control-label">Minor</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="minor" value="{{ $minor }}">
                                    @if(isset($error['minor']))
                                        <span id="helpBlock2" class="help-block">{{ $error['minor'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: co_major --}}
                        @if(isset($error['co_major']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <div class="row">
                                <label class="col-sm-2 control-label">Co-major</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="co_major" value="{{ $co_major }}">
                                    @if(isset($error['co_major']))
                                        <span id="helpBlock2" class="help-block">{{ $error['co_major'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        <input class="hidden" name="user" value="{{ $user->username }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block submit" data-user="{{ $user->username }}"
                                    data-method="POST" data-url="{{ route('coordinator.graduationrequirements.store') }}">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end .panel-body -->
            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop

@section('extra_js')
@stop
