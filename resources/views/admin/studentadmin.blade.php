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
                    <h3>Home</h3>
                </div>

                <div class="panel-body">
                    <!-- Shows which enrolment is already opened -->
                    <span><a class="btn btn-default" href="#" role="button" data-toggle="modal" title="Change Enrolment Phase" data-target="#phaseTrigger">Change Enrolment Phase</a></span>
                    <span><a class="btn btn-default" href="#" role="button" data-toggle="modal" title="Approve Units" data-target="#unitApprove">Approve Units</a></span>
                    <hr>
                    <h4>Current Enrolment Information</h4>
                    <p>Enrolment Phase: {{ $phase }}</p>
                    <p>Year: {{ $year }}</p>
                    <p>Semester: {{ $semester }}</p>
                    <hr>
                    <!-- Shows which enrolment is already opened -->
                    <p><strong>
                      Current Students: {{ count($studentID) }}
                      </strong>
                    </p>
                    <p><strong>
                      Estimated Next Semester Student: {{$fit}}
                      </strong>
                    </p>
                </div>
            </div>
            <!-- Approve Unit Modal -->
            <div class="modal fade" id="unitApprove" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Approve Units</h2>
                        </div>

                        <div class="modal-body">
                            <p>Are you sure you want to approve units?</p>
                            <p>Number of Students: {{ count($studentCount) }}</p>
                            <p>Number of Pending Units: {{ $unitCount }}</p>
                        </div> <!-- end .modal-body -->

                        <div class="modal-footer">
                            <button type="submit" class="submit btn btn-success" id="submit" data-type="unitApprove" data-method="POST" data-url="{{ route('admin.unitApprove') }}">Approve Units</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Change Phase Modal -->
            <div class="modal fade" id="phaseTrigger" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Approve Units</h2>
                        </div>

                        <div class="modal-body">
                            @if($phase == 8)
                            <p>The enrolment process is completed in this semester. Changing the phase will re-open the enrolment process for the next semester.</p>
                            <p>New Enrolment Phase: 1</p>
                                @if($semester == 'Semester 1')
                            <p>New Enrolment Semester: Semester 2</p>
                            <p>New Enrolment Year: {{ $year }}</p>
                                @else
                            <p>New Enrolment Semester: Semester 1</p>
                            <p>New Enrolment Year: {{ $year + 1 }}</p>
                                @endif
                            @else
                            <p>Are you sure you want to change the enrolment phase?</p>
                            <p>Current Phase: {{ $phase }}</p>
                            <p>Next Phase: {{ $phase + 1 }}</p>
                            @endif
                        </div> <!-- end .modal-body -->

                        <div class="modal-footer">
                            <button type="submit" class="submit btn btn-success" id="submit" data-type="phaseTrigger" data-method="POST" data-url="{{ route('admin.phaseTrigger') }}">Change Phase</button>
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
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function(){
        let method = $(this).data('method')
        let url = $(this).data('url')
        let type = $(this).data('type')
        data = { _token: getToken() }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            if(type == 'phaseTrigger') {
                alert('Enrolment Phase has been updated.')
            }
            else if(type == 'unitApprove') {
                alert('Enrolment Units have been approved.')
            }
            window.location.reload()
        })
    })
})()
</script>
@stop
