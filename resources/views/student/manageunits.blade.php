@extends('layouts.app')

<!-- @section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop -->

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

        <div class="col-md-9">
            <div class="panel panel-primary">
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
                            <td class="td_unitDelete">

                            </td>
                        </tr>

                        @if (!empty($enrolled))
                            @foreach ($enrolled as $unit)
                            <tr>
                                <td>{{ $unit->unitCode }}</td>
                                <td>{{ $unit->unit->unitName }}</td>
                                <td>
                                    <button type="submit" class="submit btn btn-sm" data-method="DELETE" data-url="{{ route('student.manageunits.destroy', $unit->unitCode) }}">
                                        <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr><td colspan="3">No units taken yet currently</td></tr>
                        @endif
                    </table>
                </div>
            </div> <!-- end .panel -->

            <!-- Available units -->
            <div class="panel panel-primary">
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
                        <table class="table" id="core-table">
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
                                    <button type="submit" id="{{ $unit->unitCode }}" class="submit btn btn-sm" data-method="POST" data-url="{{ route('student.manageunits.store') }}">
                                        <span class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span>
                                    </button>


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
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            unitCode: $(this).attr('id')
        }
            $(this).parent().parent().remove();

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if (method == "POST") {
                addUnit(data)
                //$('#addUnit').modal().hide()
                window.location.reload()
                // $(this).closest('tr').revmove()

            } else {
                // if button method not as preset
                console.log('It is of unknown method')
                window.location.reload()
            }
        })


        // $(document).on("click", "remove" , function() {
        //     $(this).parent().remove();
        // });
    })
}) ()
</script>
@stop
