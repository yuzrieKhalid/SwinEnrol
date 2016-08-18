@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Reserve 3 space for navigation column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('/super/managestudentadmin') }}" class="list-group-item">Manage Student Administrators</a>
                    <a href="{{ url('/super/managecoordinator') }}" class="list-group-item active">Manage Course Coordinators</a>
                    <a href="{{ url('/super/managestudent') }}" class="list-group-item">Manage Students</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h1>Manage Coordinators</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="user_table">
                            <thead>
                                <th>Username</th>
                                <th><span class="pull-right"><a class="btn btn-default" href="{{ url('/super/managecoordinator/create') }}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td class="td_username">{{ $user->username }}</td>
                                    <td>
                                        <div class="pull-right">
                                            <a class="btn btn-default" href="#" role="button">Edit</a>
                                            <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
