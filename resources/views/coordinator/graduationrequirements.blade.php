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

                    @if(!isset($gradreqs))
                        <h3>No graduation requirement has been set up yet. Click on the '+' button to start adding requirement</h3>
                    @else
                        <form class="form-horizontal">
                            @foreach($gradreqs as $requirement)
                                <div class="form-group">
                                    <label class="col-xs-3 col-sm-2 control-label">{{ $requirement->unitType }}</label>
                                    <div class="col-xs-3 col-sm-6">
                                        <input class="form-control count" type="text" name="{{ $requirement->unitType }}" value="{{ $requirement->unitCount }}">
                                    </div>

                                    <div class="col-xs-2 col-sm-1">
                                        <button class="delete btn btn-danger" data-method="DELETE"
                                            data-url="{{ route('coordinator.graduationrequirements.destroy', $requirement->unitType) }}">
                                                <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </div>

                                    <div class="col-xs-2 col-sm-1">
                                        <button class="update btn btn-success" data-method="PUT"
                                            data-type="{{ $requirement->unitType }}" data-count="{{ $requirement->unitCount }}"
                                            data-url="{{ route('coordinator.graduationrequirements.update', $requirement->unitType) }}">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    @endif

                </div> <!-- end .panel-body -->

                <div class="panel-footer">
                    <button class="add btn btn-primary" data-toggle="modal" data-target="#addType">
                        Add New Requirement
                    </button>
                </div>
            </div> <!-- end .panel -->

            <!-- Add Type Modal -->
            <div class="modal fade" id="addType" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="modal-title">Add Graduation Requirement</h2>
                        </div>

                        <div class="modal-body">
                            <form class="form-horizontal">

                                <div class="form-group">
                                    <label class="control-label col-sm-2">Type:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="unitType">
                                            @foreach($availablereqs as $requirement)
                                                <option value="{{ $requirement }}">{{ $requirement }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="control-label col-sm-2">Count:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control numbers" id="unitCount">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button class="create btn btn-default" id="submit" data-method="POST" data-url="{{ route('coordinator.graduationrequirements.store') }}">Create</button>
                        </div>
                    </div>
                </div>
            </div> <!-- end Add Type Modal -->

        </div>
    </div>
</div>
@stop

@section('extra_js')
<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // prettify the numbers column
    $(".numbers").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })

    $('.create').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        let data = {
            '_token': getToken(),
            'unitType': $('#unitType').val(),
            'unitCount': $('#unitCount').val()
        }

        $.ajax({
            'url'    : url,
            'method' : method,
            'data'   : data
        }).done(function() {
            window.location.reload()
        })
    })

    $('.update').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        let unitCount = $(this).parent().parent().find('.count').val()
        let data = {
            '_token': getToken(),
            'unitType': $(this).data('type'),
            'unitCount': unitCount
        }

        $.ajax({
            'url'    : url,
            'method' : method,
            'data'   : data
        }).done(function() {
            window.location.reload()
        })
    })

    $('.delete').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        let data = {
            '_token': getToken(),
            'unitType': $('#unitType').val()
        }

        $.ajax({
            'url'    : url,
            'method' : method,
            'data'   : data
        }).done(function() {
            window.location.reload()
        })
    })
}) ()
</script>
@stop
