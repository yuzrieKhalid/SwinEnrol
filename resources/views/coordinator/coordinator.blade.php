@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">
            <!-- Reserve 3 space for navigation column -->
        @include('coordinator.menu')

        <div class="col-md-9">
            <!-- To be fixed -->
            <p class="pull-left visible-xs">
                <button type="button" id="offcanvas_btn" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
            </p>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Home</h1>
                </div>

                <div class="panel-body">
                    Coordinator Homepage
                </div> <!-- end .panel-body -->
            </div> <!-- end .panel -->

        </div>
    </div>
</div>
@stop

@section('extra_js')
<script>
(function() {
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });
})()
</script>
@stop
