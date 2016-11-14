@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Manage Course</h3>
                    </div>
                    <div class="panel-body">
                      <table class="table" id="course_table" data-url="{{ route('super.managecourse.index') }}">
                            <thead>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th></th>
                                <th><span><a class="btn btn-default" href="#"
                                  role="button" name="Add Course" data-toggle="modal" data-target="#addCourse">
                                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>
                            @foreach($courses as $course)
                            <tr>
                                <td class="td_courseCode">{{ $course->courseCode }}</td>
                                <td class="td_courseName">{{ $course->courseName }}</td>
                                <td>
                                    <a class="btn btn-default pull-right" name="Edit"
                                    href="{{ route('super.managecourse.edit', $course->courseCode) }}"
                                    role="button">
                                        Edit
                                    </a>
                                </td>
                                <td class="td_courseDelete">
                                    <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $course->courseCode }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="delete_{{ $course->courseCode }}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title">Delete {{ $course->courseCode }}</h2>
                                        </div>

                                        <div class="modal-body">
                                            <p>Are you sure you want to delete {{ $course->courseCode }} {{ $course->courseName }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger submit" data-method="DELETE" data-url="{{ route('super.managecourse.destroy', $course->courseCode) }}">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DELETE
                                            </button>
                                            <button class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end .modal -->
                            @endforeach
                          </table>
                    </div>
                </div>

                <div class="modal fade" id="addCourse" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title">Create New Unit</h2>
                            </div>

                            <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label">Course Code:</label>
                                  <input class="form-control" id="courseCode">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Course Name:</label>
                                  <input class="form-control" id="courseName">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Semester Per Year:</label>
                                  <input class="form-control" id="semestersPerYear">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Study Period Semester Count:</label>
                                  <input class="form-control" id="semesterCount">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Study Level:</label>
                                  <select class="form-control" id="studyLevel">
                                      @foreach($studyLevel as $level)
                                      <option value="{{ $level->studyLevel }}">{{ $level->studyLevel }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="submit btn btn-default" id="submit"
                                data-method="POST" data-url="{{ route('super.managecourse.store') }}">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra_js')
<script>
(function(){
    $("#semesterCount").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })

    $("#semestersPerYear").TouchSpin({
        verticalbuttons: true,          // type of up and down buttons
        mousewheel: true,               // allow scrolling to increase/decrease value
        max: 9999                       // maximum number can be added
    })

    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            courseCode: $('#courseCode').val(),
            courseName: $('#courseName').val(),
            semestersPerYear: $('#semestersPerYear').val(),
            semesterCount: $('#semesterCount').val(),
            studyLevel: $('#studyLevel').val()
        }

        let message = ''

        if(data['courseCode'] == '') {
            message = message + 'Please enter the Course Code.'
        }

        if(data['courseName'] == '') {
            message = message + '\nPlease enter the Course Name.'
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
})()
</script>

@stop
