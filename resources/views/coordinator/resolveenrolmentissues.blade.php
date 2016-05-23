@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/coordinator') }}" class="list-group-item">Home</a>
                <a href="{{ url('/coordinator/managestudyplanner/create') }}" class="list-group-item">Manage Study Planner</a>
                <a href="{{ url('/coordinator/manageunitlisting/create') }}" class="list-group-item">Manage Unit Listings</a>
                <a href="{{ url('/coordinator/manageunits/create') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/coordinator/resolveenrolmentissues/create') }}" class="list-group-item active">Resolve Enrolment Issues</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Resolve Enrolment Issues</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Date</th>
                                        <th></th>
                                    </thead>
                                    @foreach ($issues as $issue)
                                    <tr>
                                        <td>{{ $issue->student->studentID }}</td>
                                        <td>{{ $issue->student->givenName }} {{ $issue->student->surname }}</td>
                                        <td>{{ $issue->created_at }}</td>
                                        <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $issue->studentID }}"> + </button> </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- Modal 1-->
                            @foreach ($issues as $issue)
                            <div class="modal fade" id="myModal{{ $issue->studentID }}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title">Student Enrolment Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{ $issue->student->givenName }} {{ $issue->student->surname }}, ({{ $issue->student->studentID }})</p>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{ $issue->enrolment_issues->issueMessage }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Modal 1End -->
                        </div> <!-- end .form-group -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
