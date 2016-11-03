@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Manage Unit Information</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" method="GET" action="{{ route('adminofficer.manageunitinfo.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name='search' placeholder="Search" @if(isset($search)) value="{{ $search }}" @endif>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                        <div class="input-group">
                            <a class="btn btn-default" href="{{ route('adminofficer.manageunitinfo.index') }}" role="button">Reset</a>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                        </thead>
                        @foreach($units as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>
                                {{ $unit->unitName }}
                                <div class="pull-right">
                                    <a class="btn btn-default" href="{{ route('adminofficer.manageunitinfo.edit', $unit->unitCode) }}" role="button">Edit</a>
                                    <button id="submit" type="submit" class="btn btn-danger submit" data-method="DELETE" data-url="{{ route('adminofficer.manageunitinfo.destroy', $unit->unitCode) }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
