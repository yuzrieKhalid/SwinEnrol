@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/admin/managestudents') }}" class="list-group-item active">Manage Students</a>
                <a href="{{ url('/admin/setenrolmentdates') }}" class="list-group-item">Set Enrolment Dates</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Manage Students</h1>
                </div>

                <div class="panel-body">
                    <h3>
                        <span class="pull-right">
                        <a class="btn btn-default" href="#" role="button">Import File</a>
                        <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                        </span>
                        <label for="search">Search Students:</label>
                        <input type="search" name="search" id="search">
                    </h3>
                    <table class="table">
                        <thead>
                            <th>Student ID</th>
                            <th colspan="2">Student Name</th>
                            <td>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Student Name 1</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Student Name 2</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Student Name 3</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </span></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop
