@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        <!-- @include('coordinator.menu') -->

        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Resolve Enrolment Amendment</h1>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" data-url="{{ route('coordinator.enrolmentamendment.index') }}" id="enrolment_amendment_table">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Unit Code</th>
                                <th>Unit Name</th>
                                <th>Status</th>
                            </tr>

                            @foreach($amendments as $amendment)
                            <tr data-target="#{{ $amendment->studentID }}_{{ $amendment->attachmentData }}" data-toggle="modal">
                                <td>{{ $amendment->studentID }}</td>
                                <td>{{ $amendment->student->givenName }} {{ $amendment->student->surname }}</td>
                                <td>{{ $amendment->attachmentData }}</td>
                                <td>{{ $amendment->studentID }}</td>
                                @if($amendment->status == 'pending_add')
                                    <td class="text-primary">Pending Unit Add</td>
                                @else
                                    <td class="text-danger">Pending Unit Drop</td>
                                @endif
                            </tr>

                            <div id="{{ $amendment->studentID }}_{{ $amendment->attachmentData }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- header -->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title">Student Enrolment Amendment</h3>
                                        </div>

                                        <!-- body -->
                                        <div class="modal-body">
                                            <div class="enrolment_amendment">
                                                <p>Student ID : <span class="text-warning studentID">{{ $amendment->studentID }}</span></p>
                                                <p>Student Name : <span class="text-warning studentName">{{ $amendment->student->givenName }} {{ $amendment->student->surname }}</span></p>

                                                <h3>Unit Details</h3>
                                                <p>Unit Code : <span class="text-primary unitCode">{{ $amendment->attachmentData }}</span></p>
                                                @foreach($units as $unit)
                                                    @if($unit->unitCode == $amendment->attachmentData)
                                                        <p>Unit Name : <span class="text-primary unitName">{{ $unit->unitName }}</span></p>

                                                        @foreach($requisites as $requisite)
                                                            @if($unit->unitCode == $requisite->unitCode)
                                                                @if($requisite->type == "prerequisite")
                                                                    <p>Prerequisite : <span class="text-primary prerequisite"> {{ $requisite->requisite }} </span></p>
                                                                @endif
                                                                @if($requisite->type == "antirequisite")
                                                                    <p>Antirequisite : <span class="text-primary antirequisite"> {{ $requisite->requisite}} </span></p>
                                                                @endif
                                                                @if($requisite->type == "corequisite")
                                                                    <p>Corequisite : <span class="text-primary corequisite"> {{ $requisite->corequisite }} </span></p>
                                                                @endif
                                                            @endif {{-- endif unitCode == requisite.unitCode --}}
                                                        @endforeach {{-- endforeach requisites --}}

                                                    @endif {{-- endif unitCode == attachmentData --}}
                                                @endforeach {{-- endforeach units --}}

                                                <h3>Reason</h3>
                                                <p>{{ $amendment->submissionData }}</p>
                                            </div>
                                        </div>

                                        <!-- footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success approve" data-method="PUT" data-pending-status="{{ $amendment->status }}"
                                                data-url="{{ route('coordinator.enrolmentamendment.approve', ['studentID' => $amendment->studentID, 'unitCode' => $amendment->attachmentData]) }}">
                                                Approve</button>
                                            <button type="button" class="btn btn-danger disapprove" data-method="DELETE" data-pending-status="{{ $amendment->status }}"
                                                data-url="{{ route('coordinator.enrolmentamendment.approve', ['studentID' => $amendment->studentID, 'unitCode' => $amendment->attachmentData]) }}">
                                                Disapprove</button>
                                        </div>
                                    </div> <!-- .modal-content -->
                                </div> <!-- end .modal-dialog -->
                            </div> <!--  end .modal -->
                            @endforeach

                            {{-- @foreach($amendment as $enrolment)
                            <!-- modal -->


                            <!-- table-row -->
                            <tr class="" data-target="#{{ $enrolment->studentID }}_{{ $enrolment->unitCode }}" data-toggle="modal">
                                <td>{{ $enrolment->studentID }}</td>
                                <td>{{ $enrolment->student->givenName }} {{ $enrolment->student->surname }}</td>
                                <td>{{ $enrolment->unitCode }}</td>
                                <td>{{ $enrolment->unit->unitName }}</td>
                            </tr>
                            @endforeach
                             --}}
                        </table> <!-- #studentEnrolmentAmendmentTable -->
                    </div> <!-- end .table-responsive -->
                </div> <!-- end .panel -->
            </div>
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script type="text/javascript">
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.approve').click(function() {
        let url = $(this).data('url')
        let method = $(this).data('method')
        let pendingstatus = $(this).data('pending-status');

        let data = {
            '_token': getToken(),
            'status': pendingstatus
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function() {
            window.location.reload()
        })
    }) // approve

    $('.disapprove').click(function() {
        let url = $(this).data('url')
        let method = $(this).data('method')
        let pendingstatus = $(this).data('pending-status');

        let data = {
            '_token': getToken(),
            'status': pendingstatus
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function() {
            window.location.reload()
        })
    }) // disapprove
}) ()
</script>
@stop
