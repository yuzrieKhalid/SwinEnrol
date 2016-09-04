@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        @include('student.menu')

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Enrolment Status</h1>
                </div>
                <div class="panel-body">
                    <h3>{{ Auth::user()->name }} <small>{{ Auth::user()->username }}</small></h3>

                    {{--
                        @foreach( $students as $student)
                        <h2>{{ $student->givenName }} {{ $student->surname }} <small>{{ $student->studentID }}</small></h2>
                        @endforeach
                    --}}

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
                </div>
            </div> <!-- end .panel -->
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
