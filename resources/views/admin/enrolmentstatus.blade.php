@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        @include('admin.menu')

        <div class="col-md-9">
            <!-- To be fixed -->
            <p class="pull-left visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
            </p>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Student Enrolment Status</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                      <th>Student ID</th>
                                      <th>Student Name</th>
                                      </thead>
                                    @foreach($studentID as $var)
                                          <tr class="clickable-row" data-toggle="modal" data-target="#ad">
                                            <td>{{ $var->studentID }}</td>
                                            <td>{{ $var->givenName }} {{ $var->surname }} </td>
                                              <!-- <td>{{ $var->surname }} </td> -->

                                          </tr>
                                       @endforeach


                                    </table>
                              </div>

                          <div class="modal fade" id="ad" role="dialog">
                              <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h2 class="modal-title">Student Enrolment Information</h2>
                                      </div>
                                      <div class="modal-body">
                                        <table class="table">
                                            <caption><h3>Enrolled Unit</h3></caption>
                                            <thead>
                                                <th>Unit Code</th>
                                                <th>Unit Title</th>
                                                <th>Date</th>
                                            </thead>
                                            @if(empty($enrolled))
                                            <tr><td colspan="3">No Units Enrolled Yet</td></tr>
                                            @else
                                            @foreach ($enrolled as $unit)
                                            <tr>
                                                <td>{{ $unit->unitCode }}</td>
                                                <td>{{ $unit->unit->unitName }}</td>
                                                <td>Date</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
