@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
        @include('admin.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Home</h1>
                </div>

                <div class="panel-body">
                    <!-- Shows which enrolment is already opened -->
                    Student Admin Homepage. This page will display which enrolment are opened and show the time remaining until the enrolment is closed. We will use a time counter for this.
                </div>
            </div>
        </div>
    </div>
</div>
@stop
