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
                    <h1>Graduation Requirements</h1>
                </div>

                <div class="panel-body">

                </div> <!-- end .panel-body -->
            </div> <!-- end .panel -->

        </div>
    </div>
</div>
@stop

@section('extra_js')
<script>
(function() {
    // Get CSRF token
    let getToken = function() {
        return $('meta[name=_token]').attr('content')
    }

    $('.submit').click(function() {
        // AJAX Parameters
        let method = $(this).data('method')
        let url = $(this).data('url')
        let data = {
            '_token': getToken(),
            'unitCode': $('#selectedUnit').val()
        }

        $.ajax({
            'url': url,
            'method': method,
            'data': data
        }).done(function(data) {
            window.location.reload()
        })
    })
})()
</script>
@stop
