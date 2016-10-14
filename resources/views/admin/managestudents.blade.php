@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <!-- @include('admin.menu') -->

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Manage Students</h1>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
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
                                    <button class="btn btn-success" id="processButton" role="button" data-toggle="modal" data-target="#processData" disable>
                                        Process Data
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-info">
                                <div class="panel-heading text-center">
                                    Add Student
                                </div>
                                <div class="panel-body">
                                    Adds one individual student
                                </div>
                                <div class="panel-footer">
                                    <!-- the modal is at the bottom of the page-->
                                    <a class="btn btn-info" href="#" role="button" data-toggle="modal" data-target="#adminAddStudent">
                                        Add Student
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-success">
                                <div class="panel-heading text-left">
                                    Upload Student Status (Result And Payment)
                                </div>
                                <div class="panel-body">
                                    <form class="upload" action="{{ route('admin.managestudents.fileUpload') }}" method="POST" enctype="multipart/form-data">
                                        <input id="uploadRP" type="file">
                                    </form>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-success" id="processButtonForStatus" role="button" data-toggle="modal" data-target="#processDataForStatus">
                                        Process Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Student List
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
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
                                    <td><a class="btn btn-default" href="#" role="button">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            Edit</a>
                                        <a class="btn btn-default" href="#" role="button">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            Delete
                                        </a>
                                      </td>

                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <a href="{{ url('/managestudents/downloadExcel/XLSX') }}">
                      <button class="btn btn-success">Download Excel</button></a>

                </div> <!-- end .panel-body -->
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
                                <button type="button" class="btn btn-default create"
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
                                        <th>Course Code</th>
                                    </thead>
                                    <!-- template row to be populated based on the input from the file -->
                                    <tr class="tr_template hidden">
                                        <td class="id">Student ID</td>
                                        <td class="surname">Surname</td>
                                        <td class="firstname">Firstname</td>
                                        <td class="coursecode">Course Code</td>
                                    </tr>
                                </table>
                              </div> <!-- end. modal-content-->
                        </form>



                      </div> <!-- end modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success pull-right" id="import"
                                    data-method="POST" data-url="{{ route('admin.managestudents.fileUpload') }}">
                                    Import
                                </button>
                            </div> <!-- end. modal-content-->
                    </div> <!-- end. modal-content-->
                </div> <!-- end .modal-dialog -->

            <div class="modal fade" id="processDataForStatus" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Student Status</h3>
                        </div>

                        <form class="form" method="POST">
                            <div class="modal-body">
                                <table class="table table-striped" id="students_table_status">
                                    <thead>
                                        <th>Student ID</th>
                                        <th>Surname</th>
                                        <th>Firstname</th>
                                        <th>Course Code</th>
                                        <tr class="tr_template hidden">
                                            <td class="id">Student ID</td>
                                            <td class="surname">Surname</td>
                                            <td class="firstname">Firstname</td>
                                            <td class="coursecode">Course Code</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                      </form>

                  </div> <!-- end. modal-content-->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-success pull-right" id="import"
                          data-method="POST" data-url="{{ route('admin.managestudents.fileUpload') }}">
                          Import</button>
                  </div>
              </div> <!-- end .modal-dialog -->
          </div>
        </div> <!-- end .modal fade -->
      </div> <!-- end .col-md-9 -->
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
    $('.create').click(function() {
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
            // window.location.reload()
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
//////
    // let populateTable2 = function(student) {
    //     let clone_tr = $('#students_table_status').find('.tr_template').clone()
    //     clone_tr.removeClass('hidden')
    //     clone_tr.removeClass('tr_template')
    //     // populate column by column [only get the respective column]
    //     clone_tr.children('td.id').html(student.stdID)
    //     clone_tr.children('td.surname').html(student.surname)
    //     clone_tr.children('td.firstname').html(student.firstname)
    //     clone_tr.children('td.coursecode').html(student.coursecode)
    //     clone_tr.children('td.paymentstatus').html(student.paymentstatus)
    //     //$('#students_table_status').append(clone_tr)
    //     $('#students_table_status').append(clone_tr)
    // }
///////



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
      //  $('#processButtonForStatus').prop('disabled', false)
        $('#processButton').prop('disabled', false)
    })
/////
// let upload = $('#uploadRP').change(function() {
//     // get the file details (.files[0] since only one file)
//     let file = document.querySelector('input[type=file]').files[0]
//     // utility to read file
//     let reader = new FileReader()
//     reader.onload = function(event) {
//         // 1. read file content
//         let data = event.target.result
//         // 2. Parsing the workbook in XLSX format. NOT for CSV or ODS
//         let workbook = XLSX.read(data, {type: 'binary'})
//         // 3. Handle the processing
//         process_workbook(workbook)
//     }
//     reader.readAsBinaryString(file)
//     // enable the button only if a file has been chosen
//   //  $('#processButtonForStatus').prop('disabled', false)
//     $('#processButtonForStatus').prop('disabled', false)
// })


/////

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
    // TODO: search the table for students
    $('#search').change(function() {
        console.log($(this).val());
    })
}) ()
</script>
@stop
