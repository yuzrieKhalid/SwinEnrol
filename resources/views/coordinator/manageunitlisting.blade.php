@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <!-- <div class="row"> -->
     <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
         <!-- @include('coordinator.menu') -->

        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Manage Unit Listings</h1>
                </div>

                <div class="panel-body">
                    <h2>
                        <small>Enrolment Units</small>
                    </h2>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th><a class="pull-right" data-toggle="modal" title="Add Unit" data-target="#addUnit" role="button" id="addLong"><span class="btn-default glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
                        </thead>
                        {{-- Fetch data for unit listing (long semester) --}}
                        @foreach ($semesterUnits as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td>
                                <a id="submit" data-unit-code="{{ $unit->unitCode }}" data-semester-length="{{ $unit->semesterLength }}"
                                    data-method="DELETE" data-url="{{ route('coordinator.manageunitlisting.destroy', $unit->unitCode) }}" class="submit pull-right" href="" role="button">
                                    <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <h2>
                        <small>Short Term Units</small>
                    </h2>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th><a class="pull-right" data-toggle="modal" title="Add Unit" data-target="#addUnit" role="button" id="addShort"><span class="btn-default glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
                        </thead>
                        {{-- Fetch data for unit listing (short semester) --}}
                        @foreach ($semesterUnitsShort as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td>
                                <a id="submit" data-unit-code="{{ $unit->unitCode }}" data-semester-length="{{ $unit->semesterLength }}"
                                    data-method="DELETE" data-url="{{ route('coordinator.manageunitlisting.destroy', $unit->unitCode) }}" class="submit pull-right" href="" role="button">
                                    <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- Add Unit Modal -->
        <div class="modal fade" id="addUnit" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Add Unit</h2>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="unitCode">Unit:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="unitCode">
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} - {{ $unit->unitName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group hidden">
                                <label class="control-label col-sm-2" for="semesterLength">Semester Length:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="semesterLength" disabled value="0">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="submit btn btn-default" id="submit" data-method="POST" data-url="{{ route('coordinator.manageunitlisting.store') }}">Create</button>
                    </div>
                </div>
            </div>
        </div> <!-- end Add Unit Modal -->
    </div> <!-- end .row -->
</div> <!-- end .container -->
@stop

@section('extra_js')

<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        if(method == "POST")
        {
            data = {
                _token: getToken(),
                unitCode: $('select[name=unitCode]').val(),
                semesterLength: $('#semesterLength').val(),
            }
        }
        if(method == "DELETE")
        {
            data = {
                _token: getToken(),
                unitCode: $(this).data('unit-code'),
                semesterLength: $(this).data('semester-length'),
            }
        }



        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            window.location.reload()
        })
    })

    $('#addLong').click(function(){
        $('#semesterLength').val('long')
    })

    $('#addShort').click(function(){
        $('#semesterLength').val('short')
    })

})()
</script>
@stop
