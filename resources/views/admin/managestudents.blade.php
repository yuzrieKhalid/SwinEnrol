@extends('layouts.app')

@section('extra_head')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/admin') }}" class="list-group-item">Home</a>
                <a href="{{ url('/admin/managestudents') }}" class="list-group-item active">Manage Students</a>
                <a href="{{ url('/admin/setenrolmentdates/create') }}" class="list-group-item">Set Enrolment Dates</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Manage Students</h1>
                </div>

                <div class="panel-body">
                    <!-- maybe should use a <form> -->
                    <h3>Add Student</h3><hr>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <form class="upload" action="{{ route('admin.managestudents.fileUpload') }}" method="POST" enctype="multipart/form-data">
                                <label>Bulk Import from Excel file</label>
                                <input id="upload" type="file">
                            </form>
                        </div>
                        <div class="col-md-6 text-center">
                            <label>Add Student (1 Person)</label>
                            <!-- the modal is at the bottom of the page-->
                            <a class="form-control btn btn-default" href="#" role="button" data-toggle="modal" data-target="#adminAddStudent">
                                Add Student
                            </a>
                        </div>
                    </div>

                    <h3>Student List</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>
                                <input type="search" id="search" placeholder="Search Student">
                            </th>
                        </thead>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->studentID }}</td>
                            <td>{{ $student->givenName }} {{ $student->surname }}</td>
                            <td>
                                <a class="btn btn-default" href="#" role="button">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    Edit
                                </a>
                                <a class="btn btn-default" href="#" role="button">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
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

                            <form class="form" method="POST" action="{{ url('/admin/managestudents') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Student ID:</label>
                                        <input class="form-control" id="studentID" placeholder="4318595">
                                    </div>

                                    <div class="form-group">
                                        <label>Family Name / Surname:</label>
                                        <input type="text" class="form-control" id="surname" placeholder="Doe">
                                    </div>

                                    <div class="form-group">
                                        <label>Given Name:</label>
                                        <input type="text" class="form-control" id="givenName" placeholder="John">
                                    </div>

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="example.com">
                                    </div>

                                    <div class="form-group">
                                        <label>Course Code:</label>
                                        <input type="text" class="form-control" id="courseCode" placeholder="IO47">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default create"
                                        data-method="POST" data-url="{{ route('admin.managestudents.store') }}">
                                        Submit
                                    </button>
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

@section('extra_js')
<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.create').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            studentID: $('#studentID').val(),
            surname: $('#surname').val(),
            givenName: $('#givenName').val(),
            email: $('#email').val(),
            courseCode: $('#courseCode').val()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) { window.location.reload() })
    })

    $('#upload').change(function() {
        // TODO: Upload file logic in JS
        console.log($(this).val());
    })

    $('#search').change(function() {
        // TODO: search the table for students
        console.log($(this).val());
    })
}) ()
</script>
@stop
