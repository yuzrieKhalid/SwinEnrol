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
                                <a class="btn btn-default" name="Edit"  href="{{ route('admin.managestudents.edit', $student->studentID) }}">
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
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Import from Eduversal</h4>
                            {{-- Import from Eduversal --}}
                            <a href="{{ url('/admin/managestudents/import/studentrecords') }}">
                                <button class="btn btn-primary">Import Student Records</button>
                            </a>
                            <a href="{{ url('/admin/managestudents/import/examunits') }}">
                                <button class="btn btn-primary">Import Exam Units</button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <h4>Download</h4>
                            {{-- Export into Excel --}}
                            <a href="{{ url('/admin/managestudents/downloadExcel/XLSX') }}">
                                <button class="btn btn-success">Export Student List</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- end .panel -->

            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    Bulk Import from Excel file
                </div>
                <div class="panel-body">
                    <form class="upload" action="{{ route('admin.managestudents.fileUpload') }}" method="POST" enctype="multipart/form-data">
                        <input id="upload" type="file">
                    </form>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success" id="processButton" role="button" data-toggle="modal" data-target="#processData" disabled>
                        Process Data
                    </button>
                </div>
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

            <!-- Modal: Bulk Import Data Processing -->
            <div class="modal fade" id="processData" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Bulk Import Student</h3>
                        </div>

                        <form class="form" method="POST">
                            <div class="modal-body">
                                <table class="table table-striped" id="students_table">
                                    <thead>
                                        <th>Student ID</th>
                                        <th>Surname</th>
                                        <th>Firstname</th>
                                        <th>Email</th>
                                        <th>Course Code</th>
                                    </thead>
                                    <!-- template row to be populated based on the input from the file -->
                                    <tr class="tr_template hidden">
                                        <td class="id">Student ID</td>
                                        <td class="surname">Surname</td>
                                        <td class="firstname">Firstname</td>
                                        <td class="dateOfBirth">Email</td>
                                        <td class="coursecode">Course Code</td>
                                    </tr>
                                </table>
                            </div> <!-- end modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success pull-right" id="import"
                                    data-method="POST" data-url="{{ route('admin.managestudents.fileUpload') }}">
                                    Import
                                </button>
                            </div>
                        </form>

                    </div> <!-- end. modal-content-->
                </div> <!-- end .modal-dialog -->
            </div> <!-- end .modal fade -->
            {{-- end .bulkimport --}}

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

        let message = ''

        if(data['studentID'] == '') {
            message = message + 'Please enter the student\'s Student ID.'
        }

        if(data['surname'] == '') {
            message = message + '\nPlease enter the student\'s Surname.'
        }

        if(data['givenName'] == '') {
            message = message + '\nPlease enter the student\'s Given Name.'
        }

        if(data['dateOfBirth'] == '') {
            message = message + '\nPlease enter the student\'s Date of Birth.'
        }

        if(message != '') {
            alert(message)
        }
        else {
            $.ajax({
                'url': url,
                'method': method,
                'data': data
            }).done(function(data) {
                window.location.reload()
            })
        }
    })

    // Uploading Section
    // -------------------
    // 3. Populate the template table with data from Workbook
    let populateTable = function(student) {
        let clone_tr = $('#students_table').find('.tr_template').clone()
        clone_tr.removeClass('hidden')
        clone_tr.removeClass('tr_template')
        // populate column by column [only get the respective column]
        clone_tr.children('td.id').html(student.stdid)
        clone_tr.children('td.surname').html(student.surname)
        clone_tr.children('td.firstname').html(student.firstname)
        clone_tr.children('td.dateOfBirth').html(student.dateofbirth)
        clone_tr.children('td.coursecode').html(student.coursecode)
        $('#students_table').append(clone_tr)
    }
    // 2(a) to JSON Array
    let to_json = function(workbook) {
        let result = {}
        // for (Type SheetNames as SheetName) : in most cases only one but they may separate the data in few sheets
        workbook.SheetNames.forEach(function(sheetName) {
            // get the row object array - data in every row (1 row = 1 student)
            let students = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName])
            if (students.length > 0) { result[sheetName] = students }
            students.forEach(function(student) {
                populateTable(student)
            })
        })
        return result
    }
    // 2. Process the workbook into JSON format
    let students = []
    let output = ""
    let process_workbook = function(workbook) {
        output = JSON.stringify(to_json(workbook), 2, 2)
        // store the output in JSON Object (Array) - students is an array
        students = $.parseJSON('[' + output + ']')
        // console.log(students[0].sheet1.length);
        $('#out').text(output)
    }
    // 1. read file
    let upload = $('#upload').change(function() {
        // get the file details (.files[0] since only one file)
        let file = document.querySelector('input[type=file]').files[0]
        // utility to read file
        let reader = new FileReader()
        reader.onload = function(event) {
            // 1. read file content
            let data = event.target.result
            // 2. Parsing the workbook in XLSX format. NOT for CSV or ODS
            let workbook = XLSX.read(data, {type: 'binary'})
            // 3. Handle the processing
            process_workbook(workbook)
        }
        reader.readAsBinaryString(file)
        // enable the button only if a file has been chosen
        $('#processButton').prop('disabled', false)
    })
    // Transferring the array into the database through AJAX
    let importData = $('#import').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        let data = {
            '_token': getToken(),
            'jsondata': output,
            'arrlength': students[0].data[0].length
        }
        $.ajax({
            'url': url,
            'method': method,
            'data': data,
            enctype: 'multipart/form-data'
        }).done(function(data) {
            window.location.reload()
        })
    })
}) ()
</script>
@stop
