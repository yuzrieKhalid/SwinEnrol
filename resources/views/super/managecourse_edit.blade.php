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
    <div class="panel panel-success">
          <div class="panel-heading">
              <h2>Update Course Information <br>
                  <small>[ {{ $courses->courseCode }} {{ $courses->courseName }} ]</small>
              </h2>
          </div>
          <div class="panel-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Course Code</label>
                        <input type="text" class="form-control" id="courseCode" value="{{ $courses->courseCode }}">
                    </div>

                    <div class="form-group"> <!-- unitName -->
                        <label class="control-label">Course Name:</label>
                        <input type="text" class="form-control" id="courseName" value="{{ $courses->courseName }}">
                    </div>

                    <div class="form-group"> <!-- unitName -->
                        <label class="control-label">Semseter (Per Year):</label>
                        <input type="text" class="form-control" id="semestersPerYear" value="{{ $courses->semestersPerYear }}">
                    </div>

                    <div class="form-group"> <!-- unitName -->
                        <label class="control-label">Semester (Total):</label>
                        <input type="text" class="form-control" id="semesterCount" value="{{ $courses->semesterCount }}">
                    </div>

                    <div class="form-group"> <!-- unitName -->
                        <label class="control-label">Study Level:</label>
                        <input type="text" class="form-control" id="studyLevel" value="{{ $courses->studyLevel }}">
                    </div>


                </div>
              </div>

              <div class="panel-footer">
                  <button type="submit" class="submit btn btn-warning" id="submit"
                   data-method="PUT" data-url="{{ route('super.managecourse.update', $courses->courseCode) }}">
                   Edit</button>
                  <a id="backToCreate" class="btn btn-info"
                  href="{{ route('super.managecourse.create') }}"
                   role="button">Back To Previous Page</a>
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
          courseName: $('#semestersPerYear').val(),
          courseName: $('#semesterCount').val(),
          courseName: $('#studyLevel').val(),
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
