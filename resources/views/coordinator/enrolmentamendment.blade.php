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
                        <table class="table table-striped">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                            </tr>

                            <!-- Temporary Data -->
                            <tr>
                                <th>4318595</th>
                                <th>Mohamad Yuzrie Bin Khalid</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('extra_js')
@stop
