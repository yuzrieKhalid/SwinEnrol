@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        @if(isset($user))
                        <h3>Edit Coordinator</h3>
                        @else
                        <h3>Add Coordinator</h3>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if(isset($user))
                            <form class="form-horizontal" role="form" method="POST" action="/super/managecoordinator/{{ $user }}">
                        @else
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('super.managecoordinator.store') }}">
                        @endif

                            {!! csrf_field() !!}

                            @if(isset($user))
                                <input type="hidden" name="_method" value="PUT">
                            @endif


                            <div class="form-group">
                                <label class="col-md-4 control-label">Username</label>
                                <div class="col-md-6">
                                    @if(isset($user))
                                        <input type="text" class="form-control" id="username" name="username" value="{{ $user }}">
                                    @else
                                        <input type="text" class="form-control" id="username" name="username" value="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Course Coordinator Name</label>
                                <div class="col-md-6">
                                    @if(isset($name))
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $name }}">
                                    @else
                                        <input type="text" class="form-control" id="name" name="name" value="">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Course</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="courseCode">
                                        @if(isset($courseCode))
                                        @foreach($courses as $course)
                                        <option value="{{ $course->courseCode }}" @if($course->courseCode == $courseCode) selected @endif>{{ $course->courseCode }} - {{ $course->courseName }}</option>
                                        @endforeach
                                        @else
                                        @foreach($courses as $course)
                                        <option value="{{ $course->courseCode }}">{{ $course->courseCode }} - {{ $course->courseName }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success submit @if(!isset($user)) disabled @endif">
                                        Save
                                    </button>
                                    <a class="btn btn-danger" href="{{ url('/super/managecoordinator') }}" role="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra_js')
<script>
(function(){
    let inputValidate = function() {
        if($('#password').val() != '' && $('#password').val() == $('#password_confirmation').val() && $('#name').val() != '' && $('#username').val() != '')
            return true
        else {
            if($('input[name="_method"]').val() != null && $('#password').val() == '' && $('#password').val() == $('#password_confirmation').val() && $('#name').val() != '' && $('#username').val() != '')
                return true
            else
                return false
        }
    }

    $('#username').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })

    $('#name').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })

    $('#password').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })

    $('#password_confirmation').on('input', function() {
        if(inputValidate()) {
            $('.submit').removeClass('disabled')
        }
        else {
            $('.submit').addClass('disabled')
        }
    })
})()
</script>
@stop
