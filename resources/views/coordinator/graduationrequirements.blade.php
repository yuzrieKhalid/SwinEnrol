@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Graduation Requirements</h3>
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
                            <label class="col-sm-2 control-label">Core</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control numbers" name="core" value="{{ $core }}">
                                @if(isset($error['core']))
                                    <span id="helpBlock2" class="help-block">{{ $error['core'] }}</span>
                                @endif
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: Elective --}}
                        @if(isset($error['elective']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <label class="col-sm-2 control-label">Elective</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control numbers" name="elective" value="{{ $elective }}">
                                @if(isset($error['elective']))
                                    <span id="helpBlock2" class="help-block">{{ $error['elective'] }}</span>
                                @endif
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: Major --}}
                        @if(isset($error['major']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <label class="col-sm-2 control-label">Major</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control numbers" name="major" value="{{ $major }}">
                                @if(isset($error['major']))
                                    <span id="helpBlock2" class="help-block">{{ $error['major'] }}</span>
                                @endif
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: Minor --}}
                        @if(isset($error['minor']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <label class="col-sm-2 control-label">Minor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control numbers" name="minor" value="{{ $minor }}">
                                @if(isset($error['minor']))
                                    <span id="helpBlock2" class="help-block">{{ $error['minor'] }}</span>
                                @endif
                            </div>
                        </div> <!-- end .form-group / has-error -->

                        {{-- unit types: co_major --}}
                        @if(isset($error['co_major']))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            <label class="col-sm-2 control-label">Co-major</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control numbers" name="co_major" value="{{ $co_major }}">
                                @if(isset($error['co_major']))
                                    <span id="helpBlock2" class="help-block">{{ $error['co_major'] }}</span>
                                @endif
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
<script>
(function() {
    // prettify the numbers column
    $(".numbers").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })
}) ()
</script>
@stop
