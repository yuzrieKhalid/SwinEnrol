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
                    {{-- give status if update successful or fail --}}
                    {{--
                    @if(isset($status))
                        @if($status == true)
                            <div class="panel panel-success">
                                <div class="panel-heading">Successfully updated configuration!</div>
                            </div>
                        @endif
                        @if($status == false)
                            <div class="panel panel-danger">
                                <div class="panel-heading">Failed to update configuration.</div>
                            </div>
                        @endif
                    @endif
                     --}}

                    {{-- unit types: Core --}}

                    {{-- unit types: Elective --}}

                    {{-- unit types: Major --}}

                    {{-- unit types: Minor --}}

                    {{-- unit types: Co-Major --}}

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
            'core': $('#core').val(),
            'elective': $('#elective').val(),
            'major': $('#major').val(),
            'minor': $('#minor').val(),
            'co-major': $('#co-major').val()
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
