@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Reserve 3 space for navigation column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('/super') }}" class="list-group-item">Home</a>
                    <a href="{{ url('/super/config') }}" class="list-group-item">Configuration</a>
                    <a href="{{ url('/super/managestudentadmin') }}" class="list-group-item active">Manage Student Administrators</a>
                    <a href="{{ url('/super/managecoordinator') }}" class="list-group-item">Manage Course Coordinators</a>
                    <a href="{{ url('/super/managestudent') }}" class="list-group-item">Manage Students</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h1>Manage Student Admin</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="user_table">
                            <thead>
                                <th>Username</th>
                                <th><span class="pull-right"><a class="btn btn-default" href="{{ url('/super/managestudentadmin/create') }}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td class="td_username">{{ $user->username }}</td>
                                    <td>
                                        <div class="pull-right">
                                            <form method="POST" action="{{ route('super.managestudentadmin.destroy', $user->username) }}">
                                                <a class="btn btn-default" href="{{ route('super.managestudentadmin.edit', $user->username) }}" role="button">Edit</a>
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                            </form>
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
