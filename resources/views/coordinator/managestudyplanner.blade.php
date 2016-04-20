@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Reserve 3 space for navigation column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('/coordinator') }}" class="list-group-item">Home</a>
                    <a href="{{ url('/coordinator/managestudyplanner') }}" class="list-group-item active">Manage Study Planner</a>
                    <a href="{{ url('/coordinator/manageunitlisting') }}" class="list-group-item">Manage Unit Listings</a>
                    <a href="{{ url('/coordinator/manageunits') }}" class="list-group-item">Manage Units</a>
                    <a href="{{ url('/coordinator/resolveenrolmentissues') }}" class="list-group-item">Resolve Enrolment Issues</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Study Planner</h1>
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <!-- Year Dropdown -->
                            <div class="btn-group" role="group">
                                <button type="button" id="dropdown-year" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Year
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-year">
                                    <li><a href="#">Year 1</a></li>
                                    <li><a href="#">Year 2</a></li>
                                    <li><a href="#">Year 3</a></li>
                                </ul>
                            </div>

                            <!-- Semester Dropdown -->
                            <div class="btn-group" role="group">
                                <button type="button" id="dropdown-semester" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Semester
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-semester">
                                    <li><a href="#">Semester 1</a></li>
                                    <li><a href="#">Semester 2</a></li>
                                    <li><a href="#">Semester 3</a></li>
                                </ul>
                            </div>

                            <!-- Course Dropdown -->
                            <div class="btn-group" role="group">
                                <button type="button" id="dropdown-course" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Course
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-course">
                                    <li><a href="#">Course 1</a></li>
                                    <li><a href="#">Course 2</a></li>
                                    <li><a href="#">Course 3</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <h2>
                            <small>Year 1 Sem 1</small>
                            <span class="pull-right"><a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
                        </h2>
                        <table class="table">
                            <thead>
                                <th>Unit Code</th>
                                <th colspan="2">Unit Title</th>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>Unit Title 1</td>
                                <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Unit Title 2</td>
                                <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Unit Title 3</td>
                                <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                            </tr>
                        </table>

                        <!-- Sample Content 2 -->
                        <h2>
                            <small>Year 1 Winter Sem</small>
                            <span class="pull-right"><a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
                        </h2>
                        <table class="table">
                            <thead>
                                <th>Unit Code</th>
                                <th colspan="2">Unit Title</th>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>Unit Title 1</td>
                                <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Unit Title 2</td>
                                <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Unit Title 3</td>
                                <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                            </tr>
                        </table>
                    </div>
                </div> <!-- end .panel -->
            </div>
        </div>
    </div>
@stop
