@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        Manage Students
                        <button class="btn btn-default pull-right" href="#" role="button" name="Add Student" data-toggle="modal" data-target="#adminAddStudent">
                            <span class="glyphicon glyphicon-plus"></span>
                            Add Student
                        </button>
                    </h3>
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <td style="width: 250px"> <!-- search bar -->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Student Name/ID">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </td> <!-- end search bar -->
                        </thead>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->studentID }}</td>
                            <td>{{ $student->givenName }} {{ $student->surname }}</td>
                            <td>
                                <button class="btn btn-default submit" name="Edit"  href="{{ route('admin.managestudents.edit', $student->studentID) }}">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    Edit
                                </button>
                                <button class="btn btn-default submit" data-url="{{ route('admin.managestudents.destroy', $student->studentID) }}" data-method="DELETE">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Delete
                                </button>
                              </td>

                        </tr>
                        @endforeach
                    </table>
                </div> <!-- end .panel-body -->
                <div class="panel-footer">
                    <a href="{{ url('/admin/managestudents/downloadExcel/XLSX') }}">
                        <button class="btn btn-success">Export Student List</button>
                    </a>
                </div>
            </div> <!-- end .panel -->

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
                                    <label>Date of Birth:</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yymmdd" data-viewMode="years">
                                        <input type="text" class="input-sm form-control" id="dateOfBirth" name="dateOfBirth"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Course Code:</label>
                                    <input type="text" class="form-control" id="courseCode" placeholder="IO47">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default submit"
                                    data-method="POST" data-url="{{ route('admin.managestudents.store') }}">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div> <!-- end. modal-content-->
                </div> <!-- end .modal-dialog -->
            </div> <!-- end .modal fade -->
      </div> <!-- end .col-md-12 -->
</div> <!-- end .row -->
@stop

@section('extra_js')
<script src="{{ asset('js/xlsx.min.js') }}"></script>
<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }
    // Normal CRUD Section
    // -------------------
    // add one student
    $('.submit').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            studentID: $('#studentID').val(),
            surname: $('#surname').val(),
            givenName: $('#givenName').val(),
            courseCode: $('#courseCode').val(),
            dateOfBirth: $('#dateOfBirth').val()
          }
        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            window.location.reload()
        })
    })
    // Uploading Section
    // -------------------
    // 3. Populate the template table with data from Workbook
    let populateTable = function(student) {
        let clone_tr = $('#students_table').find('.tr_template').clone()
        clone_tr.removeClass('hidden')
        clone_tr.removeClass('tr_template')
        // populate column by column [only get the respective column]
        clone_tr.children('td.id').html(student.stdID)
        clone_tr.children('td.surname').html(student.surname)
        clone_tr.children('td.firstname').html(student.firstname)
        clone_tr.children('td.coursecode').html(student.coursecode)
        //clone_tr.children('td.paymentstatus').html(student.coursecode)
        //$('#students_table_status').append(clone_tr)
        $('#students_table').append(clone_tr)
    }

    $('#search').change(function() {
        console.log($(this).val());
    })
}) ()
</script>
@stop
