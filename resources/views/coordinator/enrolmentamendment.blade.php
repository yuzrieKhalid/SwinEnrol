@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        @include('coordinator.menu')

        <div class="col-md-9">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Resolve Enrolment Amendment</h1>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" data-url="{{ route('coordinator.enrolmentamendment.index') }}" id="enrolment_amendment_table">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Unit Code</th>
                                <th>Unit Name</th>
                            </tr>

                            @foreach($amendment as $enrolment)
                            <!-- modal -->
                            <div id="{{ $enrolment->studentID }}_{{ $enrolment->unitCode }}" class="modal fade" role="dialog">
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
                                                <p>Student ID : <span class="text-warning studentID">{{ $enrolment->studentID }}</span></p>
                                                <p>Student Name : <span class="text-warning issue">{{ $enrolment->student->givenName }} {{ $enrolment->student->surname }}</span></p>

                                                <h3>Unit Details</h3>
                                                <p>Unit Code : <span class="text-primary yearOfRequestedTransfer">{{ $enrolment->unitCode }}</span></p>
                                                <p>Unit Name : <span class="text-primary currentProgram">{{ $enrolment->unit->unitName }}</span></p>
                                            </div>
                                        </div>

                                        <!-- footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success approve" data-method="PUT"
                                                data-url="{{ route('coordinator.enrolmentamendment.approve', ['studentID' => $enrolment->studentID, 'unitCode' => $enrolment->unitCode]) }}">
                                                Approve</button>
                                            <button type="button" class="btn btn-danger disapprove" data-method="DELETE"
                                                data-url="{{ route('coordinator.enrolmentamendment.approve', ['studentID' => $enrolment->studentID, 'unitCode' => $enrolment->unitCode]) }}">
                                                Disapprove</button>
                                        </div>
                                    </div> <!-- .modal-content -->
                                </div> <!-- end .modal-dialog -->
                            </div> <!--  end .modal -->

                            <!-- table-row -->
                            {{-- <tr class="" data-target="#{{ $enrolment->studentID }}_{{ $enrolment->unitCode }}" data-toggle="modal"> --}}
                            <tr class="" data-target="#{{ $enrolment->studentID }}_{{ $enrolment->unitCode }}" data-toggle="modal">
                                <td>{{ $enrolment->studentID }}</td>
                                <td>{{ $enrolment->student->givenName }} {{ $enrolment->student->surname }}</td>
                                <td>{{ $enrolment->unitCode }}</td>
                                <td>{{ $enrolment->unit->unitName }}</td>
                            </tr>
                            @endforeach
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
    // $('.approve').click(function() {
    //     // btn > modal-footer > modal-content > modal-dialog > modal : attr('id')
    //     let theID = $(this).parent().parent().parent().parent().attr('id')
    //     window.location = $(this).data('url')
    // })

    $('.approve').click(function() {
        let url = $(this).data('url')
        let method = $(this).data('method')
        let data = {
            '_token': getToken(),
            'status': 'confirmed'
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function() {
            // window.location.reload()
        })
    }) // approve

    $('.disapprove').click(function() {
        let url = $(this).data('url')
        let method = $(this).data('method')
        let data = {
            '_token': getToken(),
            'status': 'dropped'
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function() {
            // window.location.reload()
        })
    }) // disapprove
}) ()
</script>
@stop
