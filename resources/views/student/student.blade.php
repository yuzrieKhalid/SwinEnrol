@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Student Information</h3>
                </div>
                <div class="panel-body">
                    <h4>Name: {{ $student->givenName }} {{ $student->surname }} </h4>
                    <h4>ID: {{{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->email }}} </h4>
                    <h4>Term: {{ $student->term }}</h4>
                    <h4>Year: {{ $student->year }}</h4>
                    <h4>Program: {{ $course->courseName }} ({{ $course->courseCode }})</h4>
                </div>
            </div> <!-- end .panel -->
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <caption><h3>Enrolled Unit</h3></caption>

                </div>
                  @include('student.phaseNotification')
                <div class="panel-body">
                  <table class="table">
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
            </div>
        </div>

    </div>

</div>

@stop
