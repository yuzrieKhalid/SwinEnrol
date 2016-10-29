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
                    <div class="table-responsive">
                        <table class="table borderless-table">
                            <tbody>
                                <tr>
                                    <td>NAME</td>
                                    <td>{{ $student->givenName }} {{ $student->surname }}</td>
                                </tr>
                                <tr>
                                    <td>ID</td>
                                    <td>{{{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->email }}}</td>
                                </tr>
                                <tr>
                                    <td>SEMESTER</td>
                                    <td>{{ $student->term }}</td>
                                </tr>
                                <tr>
                                    <td>YEAR</td>
                                    <td>{{ $student->year }}</td>
                                </tr>
                                <tr>
                                    <td>PROGRAM</td>
                                    <td>{{ $course->courseCode }} {{ $course->courseName }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end .panel -->
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <caption><h3>Enrolled Unit</h3></caption>

                </div>
                <div class="panel-body">
                    @include('student.phaseNotification')
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

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Enrolment History</h3>
                </div>
                <div class="panel-body">
                    <!-- Completed Units Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Unit Code</th>
                                <th>Unit Title</th>
                                <th>Status</th>
                            </thead>

                            @if(empty($history))
                                <tr><td colspan="3">No Units Enrolled Yet</td></tr>
                            @else
                                @foreach ($history as $unit)
                                    <tr>
                                        <td>{{ $unit->unitCode }}</td>
                                        <td>{{ $unit->unit->unitName }}</td>
                                        @if($unit->status == 'confirmed')
                                            <!-- Has already passed -->
                                            <td><span class="glyphicon glyphicon glyphicon-ok" data-toggle="tooltip" title="Enrolled" aria-hidden="true"></span></td>
                                        @elseif($unit->status == 'pending')
                                            <!-- Waiting to be approved (Phase 2) -->
                                            <td><span class="glyphicon glyphicon glyphicon-alert" data-toggle="tooltip" title="Pendding" aria-hidden="true"></span></td>
                                        @else
                                            <!-- Is currently taken -->
                                            <td><span class="glyphicon glyphicon glyphicon-remove" data-toggle="tooltip" title="Remove" aria-hidden="true"></span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        <a href="{{ url('/enrolmenthistory/downloadExcel/xlsx') }}">
                            <button class="btn btn-success">Download Unit List</button>
                        </a>
                    </div>



                    <!-- Exempted Units -> only for students who applied for exemption -->
                    <div class="table-responsive">
                        <table class="table">
                            <caption><h3>Advanced Standing (Exemption)</h3></caption>
                            <thead>
                                <th>Unit Code</th>
                                <th>Unit Title</th>
                            </thead>

                            @if(empty($exempted))
                                <tr><td colspan="2">No Units Exempted</td></tr>
                            @else
                                @foreach ($exempted as $unit)
                                    <tr>
                                        <td>{{ $unit->unitCode }}</td>
                                        <td>{{ $unit->unit->unitName }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>


                </div>
            </div> <!-- end .panel -->
        </div>
    </div>

</div>

@stop
