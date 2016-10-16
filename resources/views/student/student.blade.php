@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Enrolment Status

                      <button type="button" name="button" data-target="rR"></button>
                    </h1>
                </div>
                <div class="panel-body">
                    <h3>{{{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->year }}}</h3>

                    @foreach($enrolled as $st)
                    <p>
                      {{ $st->semester }}
                    </p>
                    <p>
                      {{ $st->year }}
                    </p>

                    @endforeach

                  @include('student.phaseNotification')

                    <table class="table">
                        <caption><h3>Enrolled Unit</h3></caption>
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Status</th>
                        </thead>
                        @if(empty($enrolled))
                        <tr><td colspan="3">No Units Enrolled Yet</td></tr>
                        @else

                        @foreach ($enrolled as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            @if($unit->status == 'confirmed')
                            <!-- Successfully Enrolled -->
                            <td><span class="glyphicon glyphicon glyphicon-ok" data-toggle="tooltip" title="Enrolled" aria-hidden="true"></span></td>
                            @elseif($unit->status == 'dropped')
                            <!-- Dropped -->
                            <td><span class="glyphicon glyphicon glyphicon-remove" data-toggle="tooltip" title="Dropped" aria-hidden="true"></span></td>
                            @else
                            <!-- Waiting to be approved -->
                            <td><span class="glyphicon glyphicon glyphicon-alert" data-toggle="tooltip" title="Pending" aria-hidden="true"></span></td>
                            @endif
                        </tr>
                        @endforeach

                        @endif

                    </table>
                </div>
            </div> <!-- end .panel -->

            <div class="modal fade" id="rR" role="dialog">
              <div class="panel-body">
                  <form class="form-horizontal" role="form">
                      <div class="form-group">
                          <div class="panel-body">
                              <table class="table table-hover table-striped">
                                  <thead>
                                      <th>Student ID</th>
                                      <th>Student Name</th>
                                      <th>Issue Type</th>
                                      <th>Date</th>
                                  </thead>

                                  @foreach($issues as $issue)
                                  <tr>
                                      <td class="td_studentID">{{ $issue->studentID }}</td>
                                      <td class="td_studentName">{{ $issue->student->givenName }} {{ $issue->student->surname }}</td>
                                      <td class="td_issueType">{{ $issue->enrolment_issues->issueType }}</td>
                                      <td class="td_date">{{ $issue->created_at }}</td>
                                  </tr>
                                  @endforeach
                              </table>
                          </div>
                      </div> <!-- end .form-group -->
                  </form>
              </div>
            </div>

        </div>

    </div>

</div>

@stop

@section ('extra_js')
<script>
(function() {
      $('[data-toggle="tooltip"]').tooltip();
}) ()
</script>

@stop
