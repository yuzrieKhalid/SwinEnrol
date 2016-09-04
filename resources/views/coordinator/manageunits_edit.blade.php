@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link href="{{ asset('css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h2>Update Unit Information <br>
                <small>[ {{ $unit->unitCode }} {{ $unit->unitName }} ]</small>
            </h2>
        </div>
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="unitCode">Unit Code:</label>
                    <div class="col-sm-6">
                        <input type="text" name="unitCode" class="form-control" id="unitCode" value="{{ $unit->unitCode }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="unitName">Unit Name:</label>
                    <div class="col-sm-6">
                        <input type="text" name="unitName" class="form-control" id="unitName" value="{{ $unit->unitName }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="prerequisite">Prerequisite:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="prerequisite">
                            <option value="{{ $unit->prerequisite }}">{{ $unit->prerequisite }}</option>

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->prerequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="corequisite">Corequisite:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="corequisite">
                            <option value="{{ $unit->corequisite }}">{{ $unit->corequisite }}</option>

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->corequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        <select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="antirequisite">Antirequisite:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="antirequisite">
                            <option value="{{ $unit->antirequisite }}">{{ $unit->antirequisite }}</option>

                            @foreach($units as $aUnit)
                            @if($aUnit->unitCode !== $unit->antirequisite)
                                <option value="{{ $aUnit->unitCode }}">{{ $aUnit->unitCode }} {{ $aUnit->unitName }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="minimumCompletedUnits">Minimum Completed Units:</label>
                    <div class="col-sm-1">
                        <input id="minimumCompletedUnits" type="text" name="minimumCompletedUnits" value="0">
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <button type="submit" class="submit btn btn-warning" id="submit" data-method="PUT" data-url="{{ route('coordinator.manageunits.update', $unit->unitCode) }}">Edit</button>
            <a id="backToCreate" class="btn btn-info" href="{{ route('coordinator.manageunits.create') }}" role="button">Back To Previous Page</a>
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script src="{{ asset('js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script>
$("input[name='minimumCompletedUnits']").TouchSpin({
    verticalbuttons: true
});
</script>

<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $('#unitCode').val(),
            unitName: $('#unitName').val(),
            courseCode: $('select[name=courseCode]').val(),
            prerequisite: $('select[name=prerequisite]').val(),
            corequisite: $('select[name=corequisite]').val(),
            antirequisite: $('select[name=antirequisite]').val(),
            minimumCompletedUnits: $('#minimumCompletedUnits').val(),
            core: $('#core').val()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "PUT") {
                console.log("Updated")
                window.location = $('#backToCreate').attr('href')
            } else {
                // if another button is pressed
                window.location = $('#backToCreate').attr('href')
            }
        })
    })
})()
</script>
@stop
