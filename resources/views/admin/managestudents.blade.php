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
                            <!-- the modal is at the bottom of the page-->
                            <a class="btn btn-default" href="#" role="button" data-toggle="modal" data-target="#adminAddStudent">
                                Add Student
                            </a>
                            <a class="btn btn-default" href="#" role="button">Import File</a>
                            <a class="btn btn-default" href="#" role="button">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </a>
                        </span>
                        <label for="search">Search Students:</label>
                        <input type="search" name="search" id="search"></input>
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

                <!-- Modal: Add Student -->
                <div class="modal fade" id="adminAddStudent" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Add a Student</h2>
                            </div>

                            <form>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="studentID">Student ID</label>
                                        <input type="text" class="form-control" id="studentID" placeholder="Student ID">
                                        <!-- for now, assuming ID is stored as text -->
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="John">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Doe">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">Course Level</label>
                                        <!-- select to be populated from database -->
                                        <select class="form-control">
                                            <option value="1">Foundation</option>
                                            <option value="2">Diploma</option>
                                            <option value="3">Degree</option>
                                            <option value="4">Masters (by Coursework)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">Course</label>
                                        <!-- select to be populated from database -->
                                        <select class="form-control">
                                            <option value="1">Course 1</option>
                                            <option value="2">Course 2</option>
                                            <option value="3">Course 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                </div>
                            </form>
                        </div> <!-- end. modal-content-->
                    </div> <!-- end .modal-dialog -->
                </div> <!-- end .modal fade -->

            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop
