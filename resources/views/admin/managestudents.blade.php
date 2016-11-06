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
                    @if(Session::has('message'))
                        <div class="panel panel-success">
                            <div class="panel-heading">{{ Session::get('message') }}</div>
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <td style="width: 250px"> <!-- search bar -->
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search-criteria" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="search">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </td> <!-- end search bar -->
                        </thead>
                        @foreach ($students as $student)
                        <tr class="student">
                            <td>{{ $student->studentID }}</td>
                            <td>{{ $student->givenName }} {{ $student->surname }}</td>
                            <td>
                                <a class="btn btn-default submit" name="Edit"  href="{{ route('admin.managestudents.edit', $student->studentID) }}">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    Edit
                                </a>
                                <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $student->studentID }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </td>
                        </tr>

                        {{-- Delete Confirmation Modal --}}
                        <div class="modal fade" id="delete_{{ $student->studentID }}" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title">Delete {{ $student->studentID }}</h2>
                                    </div>

                                    <div class="modal-body">
                                        <p>Are you sure you want to delete {{ $student->studentID }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger submit" data-url="{{ route('admin.managestudents.destroy', $student->studentID) }}" data-method="DELETE">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            Delete
                                        </button>
                                        <button class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end .modal -->
                        @endforeach
                    </table>
                </div> <!-- end .panel-body -->
                <div class="panel-footer">
                    <a href="{{ url('/admin/managestudents/downloadExcel/XLSX') }}">
                        <button class="btn btn-success">Export Student List</button>
                    </a>
                    <a href="{{ url('/admin/managestudents/import/studentrecords') }}">
                        <button class="btn btn-primary">Import Student Records</button>
                    </a>
                    <a href="{{ url('/admin/managestudents/import/examunits') }}">
                        <button class="btn btn-primary">Import Exam Units</button>
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
                                    <input class="form-control" id="studentID">
                                </div>

                                <div class="form-group">
                                    <label>Family Name / Surname:</label>
                                    <input type="text" class="form-control" id="surname">
                                </div>

                                <div class="form-group">
                                    <label>Given Name:</label>
                                    <input type="text" class="form-control" id="givenName">
                                </div>

                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yymmdd" data-viewMode="years">
                                        <input type="text" class="input-sm form-control" id="dateOfBirth" name="dateOfBirth"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Course Code:</label>
                                    <select class="form-control" name="courseCode" id="courseCode">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->courseCode }}">{{ $course->courseCode }} {{ $course->courseName }}</option>
                                        @endforeach
                                    </select>
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
    // Search
    $("#search-criteria").keyup(function() {
        // when something is typed in the box, it will hide all
        let searchvalue = $(this).val().toLowerCase()
        $('.student').hide()

        // if the text from the tr matches any part of the search value (indexOf), show
        $('.student').each(function() {
            let text = $(this).text().toLowerCase()
            if (text.indexOf(searchvalue) != -1)
                $(this).show()
        })
    })

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
}) ()
</script>
@stop
