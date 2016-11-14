@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        @if(isset($type))
                        <h3>Edit Unit Type</h3>
                        @else
                        <h3>Add Unit Type</h3>
                        @endif
                    </div>
                    <div class="panel-body">
                        {{-- start form --}}
                        @if(isset($type))
                            <form class="form-horizontal" role="form" method="POST" action="/super/manageunittype/{{ $type->unitType }}">
                        @else
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('super.manageunittype.store') }}">
                        @endif

                        {{-- csrf token --}}
                        {!! csrf_field() !!}

                        {{-- if Edit --}}
                        @if(isset($type))
                            <input type="hidden" name="_method" value="PUT">
                        @endif

                        {{-- create unit type with error chceking --}}
                        <div class="form-group{{ $errors->has('unitType') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                @if(isset($type))
                                    <input type="text" class="form-control" id="unitType" name="unitType" value="{{ $type->unitType }}">
                                @else
                                    <input type="text" class="form-control" id="unitType" name="unitType" value="">
                                @endif

                                @if ($errors->has('unitType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unitType') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- save button  --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary submit @if(!isset($type)) disabled @endif">
                                    Save
                                </button>
                                <a class="btn btn-danger" href="{{ url('/super/manageunittype') }}" role="button">Cancel</a>
                            </div>
                        </div>

                        </form> {{-- end form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra_js')
<script>
(function(){
    let inputValidate = function() {
        if($('#unitType').val() != '')
            return true
        else {
            return false
        }
    }

    $('#unitType').on('input', function() {
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
