@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        @include('coordinator.menu')

        <div class="col-md-9">
            <!-- To be fixed -->
            <p class="pull-left visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
            </p>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Resolve Enrolment Issues</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Date</th>
                                    </thead>
                                    @foreach ($issues as $issue)
                                    <tr class="clickable-row" data-toggle="modal" data-target="#{{ $issue->studentID }}">
                                        <td>{{ $issue->student->studentID }}</td>
                                        <td>{{ $issue->student->givenName }} {{ $issue->student->surname }}</td>
                                        <td>{{ $issue->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- Modal 1-->
                            @foreach ($issues as $issue)
                            <div class="modal fade" id="{{ $issue->studentID }}" role="dialog">
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
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Disapprove</button>
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
