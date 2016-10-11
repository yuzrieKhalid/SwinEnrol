@extends('layouts.app')

@section('extra_head')
    <!-- remember csrf token needs middleware -->
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
    <div class="container">
        <div class="row">
            @include('super.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Manage Course</h1>
                    </div>
                    <div class="panel-body">
                      <table class="table" id="course_table" data-url="{{ route('super.managecourse.index') }}">
                            <thead>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th></th>
                                <th><span><a class="btn btn-default" href="#"
                                  role="button" data-toggle="modal" data-target="#addCourse">
                                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>
                            @foreach($courses as $course)
                            <tr>
                                <td class="td_courseCode">{{ $course->courseCode }}</td>
                                <td class="td_courseName">{{ $course->courseName }}</td>
                                <td>
                                    <a class="btn btn-default pull-right"
                                    href="{{ route('super.managecourse.edit', $course->courseCode) }}"
                                    role="button">
                                        Edit
                                    </a>
                                </td>
                                <td class="td_courseDelete">
                                    <button id="submit" type="submit" class="btn btn-danger submit"
                                    data-method="DELETE" data-url="{{ route('super.managecourse.destroy', $course->courseCode) }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>

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
                                  <input type="text" class="form-control" id="coruseCode">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Course Name:</label>
                                  <input type="text" class="form-control" id="coruseName">
                              </div>
                              <!-- <div class="form-group">
                                  <label class="control-label">Semester:</label>
                                  <input type="text" class="form-control" id="semesterLevel">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Study Level:</label>
                                  <input type="text" class="form-control" id="studyLevel">
                              </div> -->
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

  let getToken = function() {
      return $('meta[name=_token]').attr('content')
  }



  let addCourse = function(course) {
      if ($('#course_table').find('.tr_template') == true) {
          let tr_template = $('#course_table').find('.tr_template').clone()
          tr_template.removeClass('hidden')
          tr_template.removeClass('tr_template')

          let courseEdit = tr_template.children('.td_courseEdit').html()
          courseEdit = courseEdit.replace("id", course.courseCode)
          let courseDelete = tr_template.children('.td_courseDelete').html()
          courseDelete = courseDelete.replace("id", course.courseCode)

          tr_template.children('.td_courseCode').html(course.courseCode)
          tr_template.children('.td_courseName').html(course.courseName)
          tr_template.children('.td_courseEdit').html(`${courseEdit}`)
          tr_template.children('.td_courseDelete').html(`${courseDelete}`)

          $('#course_table').append(tr_template)
      }
  }

  let getCourse = function() {
      let url = $('#course_table').data('url')
      $.get(url, function(data) {
          data.forEach(function(course) {
              addCourse(course);
          })
      })
  }

  $('.submit').click(function(){
      let method = $(this).data('method')
      let url = $(this).data('url')
      data = {
          _token: getToken(),
          courseCode: $('#courseCode').val(),
          courseName: $('#courseName').val(),
      }
      $.ajax({
          'url': url,
          'method': method,
          'data': data
      }).done(function(data) {
          addCourse(data)
          window.location.reload()
      })
  })


})()

</script>

@stop
