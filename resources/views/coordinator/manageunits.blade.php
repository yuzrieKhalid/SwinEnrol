@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/coordinator') }}" class="list-group-item">Home</a>
                <a href="{{ url('/coordinator/managestudyplanner') }}" class="list-group-item">Manage Study Planner</a>
                <a href="{{ url('/coordinator/manageunitlisting') }}" class="list-group-item">Manage Unit Listings</a>
                <a href="{{ url('/coordinator/manageunits') }}" class="list-group-item active">Manage Units</a>
                <a href="{{ url('/coordinator/resolveenrolmentissues') }}" class="list-group-item">Resolve Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Manage Units</h1>
                </div>

                <div class="panel-body">

                    <table class="table">
                        <thead>
                            <th>Unit ID</th>
                            <th>Unit Name</th>
                            <th></th>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Unit Name 1</td>
                            <td>
                                <a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Unit Name 2</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Unit Name 3</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </span></a>
                            </td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addUnit">Create New Unit </button>
                </div>
            </div>

            <!-- Modal 1-->
            <div class="modal fade" id="addUnit" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Create New Unit</h2>
                        </div>

                        <div class="modal-body">
                            <label class="control-label" for="unitCode">Unit Code:</label>
                            <input type="text" name="unitCode" class="form-control" id="unitCode">

                            <label class="control-label" for="unitName">Unit Name:</label>
                            <input type="text" name="unitName" class="form-control" id="unitName">

                            <label class="control-label" for="courseCode">Course Code:</label>
                            <input type="text" name="courseCode" class="form-control" id="courseCode">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Create</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal 1End -->

        </div>
    </div>
</div>
@stop
