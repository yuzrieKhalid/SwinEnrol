@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Manage Coordinators</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="user_table">
                            <thead>
                                <th>Username</th>
                                <th><span class="pull-right"><a class="btn btn-default" name="AddCor" id="AddCor" href="{{ url('/super/managecoordinator/create') }}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td class="td_username">{{ $user->username }}</td>
                                    <td>
                                        <div class="pull-right">
                                            <a class="btn btn-default" href="{{ route('super.managecoordinator.edit', $user->username) }}" role="button">Edit</a>
                                            <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $user->username }}">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="delete_{{ $user->username }}" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title">Delete {{ $user->username }}</h2>
                                            </div>

                                            <div class="modal-body">
                                                <p>Are you sure you want to delete {{ $user->username }} {{ $user->username }}?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('super.managecoordinator.destroy', $user->username) }}">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
