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
                <a href="{{ url('/coordinator/manageunits') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/coordinator/resolveenrolmentissues') }}" class="list-group-item active">Resolve Enrolment Issues</a>
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
                                        <td>{{ $issue->studentID }}</td>
                                        <td>{{ $issue->givenName }} {{ $issue->surname }}</td>
                                        <td>{{ $issue->created_at }}</td>
                                        <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1"> + </button> </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>ID 2</td>
                                        <td>Name 2</td>
                                        <td> Date</td>
                                        <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2"> + </button> </td>
                                    </tr>
                                    <tr>
                                        <td>ID 3</td>
                                        <td>Name 3</td>
                                        <td>Date</td>
                                        <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal3"> + </button> </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Modal 1-->
                            <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title">Student Enrolment Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID 1</p>
                                        </div>
                                        <div class="modal-body">
                                            <p>Name 1</p>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 1End -->
                            <!-- Modal 2 -->
                            <div class="modal fade" id="myModal2" role="dialog">
                                <div class="modal-dialog">
                                      <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title">Student Enrolment Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID 2</p>
                                        </div>
                                        <div class="modal-body">
                                            <p>Name 2</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal End 2 -->
                            <!-- Modal 3 -->
                            <div class="modal fade" id="myModal3" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title">Student Enrolment Information</h2>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID 3</p>
                                        </div>
                                        <div class="modal-body">
                                            <p>Name 3</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal End 3 -->
                        </div> <!-- end .form-group -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
