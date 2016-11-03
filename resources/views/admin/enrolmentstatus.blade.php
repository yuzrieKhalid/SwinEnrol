@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Student Enrolment Status</h3>
                </div>
                <div class="panel-body">

                    {{-- Search Bar --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-criteria" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="search">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- end Search Bar --}}

                    {{-- Students Table: populated with JS --}}
                    <div class="table-responsive" >
                        <table class="table table-striped" id="students_enrolmentstatus_table" data-url="{{ route('admin.enrolmentstatus.index') }}">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr_template clickable-row hidden student" data-toggle="modal" data-target="">
                                    <td class="td_studentID"></td>
                                    <td class="td_studentName"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- end Students Table --}}

                    {{-- Modal Template --}}
                    <div id="modal_placeholder">
                        <div class="modal fade modal_template hidden" id="" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">Student Enrolment Status</h3>
                                    </div>

                                    <!-- body -->
                                    <div class="modal-body">

                                        {{-- Student Detail Table --}}
                                        <h4>Student Details</h4>
                                        <div class="table-responsive">
                                            <table class="table borderless-table">
                                                <tbody class="student-details">
                                                    <tr><td>NAME</td>    <td class="td_studentName">name here</td>  </tr>
                                                    <tr><td>ID</td>      <td class="td_studentID">id here</td>      </tr>
                                                    <tr><td>SEMESTER</td><td class="td_semester">semester here</td> </tr>
                                                    <tr><td>YEAR</td>    <td class="td_year">year here</td>         </tr>
                                                    <tr><td>PROGRAM</td> <td class="td_course">course here</td>     </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- end Student Detail Table --}}

                                        <h4>Enrolled Units</h4>
                                        <div class="table-responsive">
                                            <table class="table enrolment_table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Unit Code</th>
                                                        <th>Unit Title</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="enrolled_tr_template hidden">
                                                        <td class="td_index">code</td>
                                                        <td class="td_unitCode">code</td>
                                                        <td class="td_unitStatus">status</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end .modal-body -->

                                </div> <!-- end .modal-content -->
                            </div> <!-- end .modal-dialog -->
                        </div> <!-- end .modal_template -->
                    </div> <!-- end .modal_placeholder-->
                    {{-- end Modal Template --}}

                </div> <!-- end .panel-body -->
            </div> <!-- end.panel -->
        </div> <!-- end .col -->
    </div> <!-- end .row -->
</div> <!-- end .container -->
@stop

@section('extra_js')
<script type="text/javascript">
(function() {
    // 4. Search box
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

    // 3. Create the modals
    let createModal = function(data) {
        let modal_template = $('#modal_placeholder').find('.modal_template').clone()
        modal_template.removeClass('hidden')
        modal_template.removeClass('modal_template')
        modal_template.attr('id', data.studentID)

        let student_details = modal_template.find('.student-details')
        student_details.find('.td_studentID').html(data.studentID)
        student_details.find('.td_studentName').html(data.givenName + " " + data.surname)
        student_details.find('.td_semester').html(data.term)
        student_details.find('.td_year').html(data.year)
        student_details.find('.td_course').html(data.courseCode + " " + data.course.courseName)

        let enrolled = data.enrolment_units
        let enrolment_table = modal_template.find('.enrolment_table')

        // check if student has already enrolled
        if (enrolled.length == 0) {
            let tr_template = enrolment_table.find('.enrolled_tr_template').clone()
            tr_template.removeClass('hidden')
            tr_template.removeClass('enrolled_tr_template')
            tr_template.find('.td_index').html('Not yet enrolled')
            tr_template.find('.td_unitCode').html('')
            tr_template.find('.td_unitStatus').html('')
            enrolment_table.append(tr_template)
        } else {
            // for every enrolled units, add into the enrolment_table
            for (var i = 0; i < enrolled.length; i++) {
                let tr_template = enrolment_table.find('.enrolled_tr_template').clone()
                tr_template.removeClass('hidden')
                tr_template.removeClass('enrolled_tr_template')
                tr_template.find('.td_index').html(i+1)
                tr_template.find('.td_unitCode').html(enrolled[i].unitCode)
                tr_template.find('.td_unitStatus').html(enrolled[i].status)

                // add text color depending on the status
                if (tr_template.find('.td_unitStatus').html() == 'pending'      ||
                    tr_template.find('.td_unitStatus').html() == 'pending_add'  ||
                    tr_template.find('.td_unitStatus').html() == 'pending_add') {
                    tr_template.addClass('text-warning')    // yellow
                } else if (tr_template.find('.td_unitStatus').html() == 'dropped') {
                    tr_template.addClass('text-danger')     // red
                } else { // if (tr_template.find('.td_unitStatus').html() == 'confirmed')
                    tr_template.addClass('text-success')    // green
                }

                // append to suitable parent tag
                enrolment_table.append(tr_template)
            }
        }

        $('#modal_placeholder').append(modal_template)
    }

    // 2. Populate students_enrolmentstatus_table
    let addStudentsData = function(data) {
        // find, clone, remove template properties and assign data-target
        let tr_template = $('#students_enrolmentstatus_table').find('.tr_template').clone()
        tr_template.removeClass('hidden')
        tr_template.removeClass('tr_template')
        tr_template.attr('data-target', "#" + data.studentID)

        // populate the related columns
        tr_template.children('.td_studentID').html(data.studentID)
        tr_template.children('.td_studentName').html(data.givenName + " " + data.surname)

        // append the information to the table
        $('#students_enrolmentstatus_table').append(tr_template)
    }

    // 1. fetch data from the controller
    let getStudentsData = function() {
        let url = $('#students_enrolmentstatus_table').data('url')
        $.get(url, function(students) {
            students.forEach(function(data) {
                addStudentsData(data)
                createModal(data)
            })
        })
    }
    getStudentsData()
}) ()
</script>
@endsection
