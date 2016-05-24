@extends('layouts.app')

@section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item">Home</a>
                <a href="{{ url('/student/manageunits/create') }}" class="list-group-item active">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer/create') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/contactcoordinator') }}" class="list-group-item">Contact Coordinator</a>
            </div>
        </div>

        <div class="col-md-9">
            <!-- Enrolled units -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Current Enrolment
                        <span class="pull-right">
                            <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span></a>
                            <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        </span>
                    </h1>
                </div>

                <div class="panel-body">
                    <table class="table" id="enrolled_table" data-url="{{ route('student.manageunits.index') }}">
                        <thead>
                            <th>Unit Code</th>
                            <th colspan="2">Unit Title</th>
                        </thead>

                        <tr class="hidden tr_template">
                            <td class="td_unitCode"></td>
                            <td class="td_unitName"></td>
                            <td class="td_unitDelete"><a class="pull-right" href="{{ route('student.manageunits.destroy', 'id') }}" role="button">
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
                            </td>
                        </tr>

                        @if (!empty($enrolled))
                            @foreach ($enrolled as $unit)
                            <tr>
                                <td>{{ $unit->unitCode }}</td>
                                <td>{{ $unit->unit->unitName }}</td>
                                <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                            </tr>
                            @endforeach
                        @else
                        <tr><td colspan="3">No units taken yet currently</td></tr>
                        @endif
                    </table>
                </div>
            </div> <!-- end .panel -->

            <!-- Available units -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Add Units
                        <span class="pull-right">
                            <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span></a>
                            <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        </span>
                    </h1>
                </div>

                <div class="panel-body">
                    <div class="btn-group btn-group-justified" role="group" style="margin-bottom:10px;">
                        <!-- On press will make one of them hiddden -->
                        <a id="core_group" class="btn btn-default" href="#" role="button">Core</a>
                        <a id="elective_group" class="btn btn-default" href="#" role="button">Elective</a>
                    </div>

                    <div class="core_group">
                        <table class="table">
                            <thead>
                                <th>Unit Code</th>
                                <th colspan="2">Unit Title</th>
                            </thead>

                            <!-- Check if already enrolled, don't add to this list -->
                            @foreach ($units as $unit)
                            <tr>
                                <td>{{ $unit->unitCode }}</td>
                                <td>{{ $unit->unitName }}</td>
                                <td>
                                    <button type="submit" class="submit btn btn-sm" data-method="POST" data-url="{{ route('student.manageunits.store') }}">
                                        <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                    </button>

                                    <!-- <a class="submit pull-right" href="{{ $unit->unitCode }}" role="button">
                                        <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                    </a> -->
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="elective_group hidden">
                        <table class="table">
                            <thead>
                                <th>Unit Code</th>
                                <th colspan="2">Unit Title</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop

@section ('extra_js')
<script>
// TODO: implement the '+' button

(function() {
    // csrf token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    // add another row in the enrolled unit panel
    let addUnit = function(unit) {
        if ($('#enrolled_table').find('.tr_template') == true) {
            let tr_template = $('#enrolled_table').find('.tr_template').clone()
            tr_template.removeClass('hidden')
            tr_template.removeClass('tr_template')

            let unitDelete = tr_template.children('.td_unitDelete').html()
            unitDelete = unitDelete.replace("id", unit.unitCode)
            tr_template.children('.td_unitCode').html(unit.unitCode)
            tr_template.children('.td_unitName').html(unit.unitName)
            tr_template.children('.td_unitDelete').html(`${unitDelete}`)

            $('#enrolled_table').append(tr_template)
        }
    }

    // fetch data from database through data-url
    let getUnits = function() {
        let url = $('#enrolled_table').data('url')
        $.get(url, function(data) {
            data.forEach(function(unit) {
                // add the unit to the data
                addUnit(unit)
            })
        })
    }

    // when clicking the '+' button
    $('.submit').click(function() {
        console.log('Adding')
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            // Dunno what to store~~~ (this reflects the one in controller)
            // LALALALALALALA
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "POST") {
                addUnit()
            } else {
                // if button method not as preset
                console.log('Something wrong, its not adding the data')
            }
        })
    })
}) ()
</script>
@stop
