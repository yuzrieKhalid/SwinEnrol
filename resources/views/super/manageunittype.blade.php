@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Manage Unit Types</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Types</th>
                                    <th><span class="pull-right">
                                        <a class="btn btn-default" href="{{ url('/super/manageunittype/create') }}" role="button">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </a></span>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->unitType }}</td>
                                        <td>
                                            <div class="pull-right">
                                                <a class="btn btn-default" href="{{ route('super.manageunittype.edit', $type->unitType) }}" role="button">Edit</a>
                                                <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $type->unitType }}">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_{{ $type->unitType }}" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h2 class="modal-title">Delete {{ $type->unitType }}</h2>
                                                </div>

                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete {{ $type->unitType }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="{{ route('super.manageunittype.destroy', $type->unitType) }}">
                                                        {!! csrf_field() !!}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DELETE</a>
                                                    </form>
                                                    <button class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end .modal -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
