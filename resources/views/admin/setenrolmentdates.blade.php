@extends('layouts.app')

@section('extra_head')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Enrolment Dates</h3>
                </div>

                <div class="panel-body" id="panelData" data-url="{{ route('admin.setenrolmentdates.index') }}">
                    @foreach($dates as $enrolment)
                    <div class="panel panel-default" id="enrolmentPanel_{{ $enrolment->id }}" data-id="{{ $enrolment->id }}">
                        <div class="panel-heading">
                            <h4>[<small>{{ $enrolment->year }}</small>] {{ $enrolment->level }} {{ $enrolment->term }} </h4>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Enrolment Period</label>
                                    <div>
                                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <input type="text" class="input-sm form-control" id="open_dates_{{ $enrolment->id }}" value="{{ $enrolment->reenrolmentOpenDate }}" />
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" id="close_dates_{{ $enrolment->id }}" value="{{ $enrolment->reenrolmentCloseDate }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Short Semester Commencement</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" id="short_commence_{{ $enrolment->id }}" value="{{ $enrolment->shortCommence }}" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Long Semester Commencement</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" id="long_commence_{{ $enrolment->id }}" value="{{ $enrolment->longCommence }}" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Final Exam Results Release</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" id="results_release_date_{{ $enrolment->id }}" value="{{ $enrolment->examResultsRelease }}" />
                                    </div>
                                </div>
                            </div> <!-- end row -->

                        </div> <!-- end panel-body -->

                        <div class="panel-footer">
                            <button disabled type="button" class="btn btn-default update" id="update" data-id="{{ $enrolment->id }}"
                                data-year="{{ $enrolment->year }}" data-term="{{ $enrolment->term }}" data-level="{{ $enrolment->level }}"
                                data-method="PUT" data-url="{{ route('admin.setenrolmentdates.update', $enrolment->id) }}">
                                Update
                            </button>

                            <button type="button" class="btn btn-danger pull-right delete" id="delete" data-id="{{ $enrolment->id }}"
                                data-method="DELETE" data-url="{{ route('admin.setenrolmentdates.destroy', $enrolment->id) }}">
                                Close Enrolment
                            </button>
                        </div>
                    </div>
                    @endforeach

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newEnrolment">Open New Enrolment</button>
                </div>
            </div> <!-- end .panel -->

            <!-- Modal 1-->
            <div class="modal fade" id="newEnrolment" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Open New Enrolment</h2>
                        </div>

                        <div class="modal-body">
                              <label class="control-label">Year:</label>
                              <input class="form-control" type="number" id="year" name="year" value="{{ $year }}"/>

                              <label class="control-label" for="studyLevel">Level:</label>
                              <select class="form-control" name="level" id="level">
                                  <option value="Foundation">Foundation</option>
                                  <option value="Diploma">Diploma</option>
                                  <option value="Degree">Degree</option>
                                  <option value="MA (TESOL)">MA (TESOL)</option>
                                  <option value="MBA">MBA</option>
                                  <option value="Intensive English">Intensive English</option>
                              </select>

                              <label class="control-label">Semester Term:</label>
                              <select class="form-control" name="term" id="term" name="term">
                                  <option value="Semester 1">Semester 1</option>
                                  @if($semester == 'Semester 1')
                                  <option value="Semester 2" selected>Semester 2</option>
                                  @else
                                  <option value="Semester 2">Semester 2</option>
                                  @endif
                              </select>

                              <!--  -->
                              <!--  -->
                              <!--  -->
                              <!--  -->
                              <form id="eventForm" method="post" class="form-horizontal">
                              <label>Enrolment Period</label>
                              <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
                                  <input type="text" class="input-sm form-control" id="enrolStart" name="reenrolmentCloseDate"/>
                                  <span class="input-group-addon">to</span>
                                  <input type="text" class="input-sm form-control" id="enrolEnd" name="reenrolmentOpenDate"/>                        
                              </div>

                              <label>Short Semester Commencement</label>
                              <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                  <input type="text" class="input-sm form-control" id="shortCommence" name="shortCommence"/>
                              </div>

                              <label>Long Semester Commencement</label>
                              <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                  <input type="text" class="input-sm form-control" id="longCommence" name="longCommence"/>
                              </div>

                              <label>Current Term Final Exams Result Release</label>
                              <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                  <input type="text" class="input-sm form-control" id="examResultsRelease" name="examResultsRelease"/>
                              </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default create" id="openEnrolment"
                                   data-method="POST" data-url="{{ route('admin.setenrolmentdates.store') }}">
                                   Open
                               </button>
                          </div>
                            </form>


                          </div>

                    </div>
                </div>
            </div>
            <!-- Modal 1End -->
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

    let valid = function(){
      $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          startDate: '-3d'
      }).on('changeDate', function(e){
          $('#eventForm').formValidation('revalidateField', 'reenrolmentCloseDate','reenrolmentOpenDate','shortCommence','longCommence','examResultsRelease');
    })
      $('#eventForm').formValidation({
            fields: {
                reenrolmentCloseDate: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'yyyy-mm-dd',
                            message: 'The date is not a valid'
                        }
                    }
                },
                reenrolmentOpenDate: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'yyyy-mm-dd',
                            message: 'The date is not a valid'
                        }
                    }
                },
                shortCommence: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'yyyy-mm-dd',
                            message: 'The date is not a valid'
                        }
                    }
                },
                longCommence: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'yyyy-mm-dd',
                            message: 'The date is not a valid'
                        }
                    }
                },
                examResultsRelease: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'yyyy-mm-dd',
                            message: 'The date is not a valid'
                        }
                    }
                }
            }
      })

    }

    // only for opening new enrolment
    $('.create').click(function() {
      if($('#enrolStart').val().length == 0){
            alert("Please enter Enrolment Start Date")
        }else if($('#enrolEnd').val().length == 0 ){
            alert("Please enter Enrolment End Date")
        }else{
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = {
            _token: getToken(),
            year: $('#year').val(),
            term: $('select[name=term]').val(),
            level: $('select[name=level]').val(),
            reenrolmentCloseDate: $('#reenrolmentCloseDate').val(),
            reenrolmentOpenDate: $('#reenrolmentOpenDate').val(),
            shortCommence: $('#shortCommence').val(),
            longCommence: $('#longCommence').val(),
            examResultsRelease: $('#examResultsRelease').val(),

        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) { window.location.reload() })
      }
    })

    // delete only
    $('.delete').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')
        data = { _token: getToken() }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) { window.location.reload() })
    })

    // update only
    let checkEnrolmentPanel = function() {
        let url = $('#panelData').data('url')
        $.get(url, function(obj) {
            obj.forEach(function(data) {
                // check the reenrolmentCloseDate field
                $('#close_dates_' + data.id).change(function() {
                    $('#enrolmentPanel_' + data.id).find('.update').prop('disabled', false)
                })

                // check the reenrolmentOpenDate field
                $('#open_dates_' + data.id).change(function() {
                    $('#enrolmentPanel_' + data.id).find('.update').prop('disabled', false)
                })

                // check the shortCommence field
                $('#short_commence_' + data.id).change(function() {
                    $('#enrolmentPanel_' + data.id).find('.update').prop('disabled', false)
                })

                // check the longCommence field
                $('#long_commence_' + data.id).change(function() {
                    $('#enrolmentPanel_' + data.id).find('.update').prop('disabled', false)
                })

                // check the examResultsRelease field
                $('#results_release_date_' + data.id).change(function() {
                    $('#enrolmentPanel_' + data.id).find('.update').prop('disabled', false)
                })
            })
        })
    }
    checkEnrolmentPanel()

    $('.update').click(function() {
        let method = $(this).data('method')
        let url = $(this).data('url')

        // need all fields to update
        let id = $(this).data('id')
        let theYear = $(this).data('year')
        let theTerm = $(this).data('term')
        let theLevel = $(this).data('level')

        data = {
            _token: getToken(),
            year: theYear,
            term: theTerm,
            level: theLevel,
            reenrolmentCloseDate: $('#close_dates_' + id).val(),
            reenrolmentOpenDate: $('#open_dates_' + id).val(),
            shortCommence: $('#short_commence_' + id).val(),
            longCommence: $('#long_commence_' + id).val(),
            examResultsRelease: $('#results_release_date_' + id).val()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) { window.location.reload() })
    })


}) ()
</script>
@stop
