@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Add Coordinator</h3>
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
                                        <input type="text" class="form-control" name="username" value="{{ $user }}">
                                    @else
                                        <input type="text" class="form-control" name="username" value="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Course Coordinator Name</label>
                                <div class="col-md-6">
                                    @if(isset($name))
                                        <input type="text" class="form-control" name="name" value="{{ $name }}">
                                    @else
                                        <input type="text" class="form-control" name="name" value="">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Assign Course Code</label>
                                <div class="col-md-6">
                                  <select class="form-control" name="courseCode" id="courseCode" onchange="this.form.submit()">
                                    @foreach($course as $course)
                                        @if($course->courseCode == $courseCode)
                                            <option value="{{ $course->courseCode }}">{{ $course->courseCode }}</option>
                                        @endif
                                    @endforeach




                                    </select>
                                </div>
                            </div>


                            <select class="form-control" name="courseCode" id="courseCode" onchange="this.form.submit()">
                                @foreach($courses as $course)
                                    @if($course->courseCode == $courseCode)
                                        <option value="{{ $course->courseCode }}">{{ $course->courseCode }} - {{ $course->courseName }}</li>
                                    @endif
                                @endforeach

                                @foreach($courses as $course)
                                    @if($course->courseCode != $courseCode)
                                        <option value="{{ $course->courseCode }}">{{ $course->courseCode }} - {{ $course->courseName }}</li>
                                    @endif
                                @endforeach
                            </select>




                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
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
